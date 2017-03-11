<?php

//take this out when its live on the azure server
sleep(1);

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('post.php');

require_once('config.php');

require_once('dbconnect.php');


//gets the username from the URL of the page.
$profileUserName = substr(strchr($_SERVER['HTTP_REFERER'], 'id='), 3);
//gets the collectionIDfrom the URL of the page.
$CollectionID = substr(strchr($_SERVER['HTTP_REFERER'], 'CollectionID='),13 );

$displayRecommendations = false;

//query to pick based on which page called loadposts.php
//query tailored for the home feed
if (strpos($_SERVER['HTTP_REFERER'],'home.php')){
  $displayRecommendations = true;
    $query = "SELECT * FROM posts
                LEFT JOIN user ON user.`UserID` = posts.`UserID`
                ORDER BY PostTime DESC";

//query tailored for the profile-info page
} else if (strpos($_SERVER['HTTP_REFERER'],'profile-info.php')){
  $displayRecommendations = true;
    $query = "SELECT * FROM posts
                LEFT JOIN user ON user.`UserID` = posts.`UserID`
                WHERE user.`UserName` = '$profileUserName'
                ORDER BY PostTime DESC";
    //query tailored for a collection
} else if (strpos($_SERVER['HTTP_REFERER'],'profile-collection.php')){
    $query = "SELECT * FROM posts
                LEFT JOIN photocollectionsmapping
                  ON posts.`PostID` = photocollectionsmapping.`PostID`
                JOIN user
                  ON user.`UserID` = posts.`UserID`
                WHERE photocollectionsmapping.`CollectionID` = '$CollectionID'
                ORDER BY PostTime DESC";
}


$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$posts = findPosts($page, $query, $conn, $displayRecommendations);

//display friend requests only if on profile or home

function addRecommendedFriendsRow($conn) {
    require_once('dbconnect.php');
    include('friendrecommendation.php');
}


function findPosts($page, $query, $conn, $displayRecommendations) {

//display recommendations only when on home or profile
    if ($page == 2 && $displayRecommendations){
        addRecommendedFriendsRow($conn);
    }

    if ($result = mysqli_query($conn, $query)) {
        $total_posts = mysqli_num_rows($result);

        $per_page = 8;
        $offset = (($page - 1) * $per_page) + 1;

        $post_counter = 1;

        //skips over the posts already put on the feed
        while ($post_counter < $offset ) {
            $post = mysqli_fetch_array($result);
            $post_counter++;
        }

        //if there are less posts than posts per page, set $per_page to how many are remaining
        if (($total_posts - $offset) < $per_page) {
            $per_page = $total_posts-$offset + 1;
        }

        for ($i=0; $i < $per_page; $i++) {

            $post = mysqli_fetch_array($result);


            $postID = $post['PostID'];
            $numComments = 0; //calculated in query 2
            $numLikes = 0; //calculated in query 3
            $hasUserLiked = false;
            $postUserName = $post['UserName'];
            $postUserPictureID = 1;
            $postDescription = $post['PostText'];
            $postLocation = $post['PostLocation'];
            $postTimeStamp = $post['PostTime'];
            //arrays store all necessary comments and likes data from the second and third query
            $comments = [];
            $likes = [];

            //gathers all the comments data for a photo
            $query2 = "SELECT * FROM comments
                        LEFT JOIN user ON user.`UserID` = comments.`UserID`
                        WHERE PostID = '$postID'
                        ORDER BY CommentTime ASC";

            if ($result2 = mysqli_query($conn, $query2)) {
                $numComments = mysqli_num_rows($result2);

                while ($comment = mysqli_fetch_array($result2)) {

                    $commentID = $comment['CommentID'];
                    $commentUserID = $comment['UserID'];
                    $commentUserName = $comment['UserName'];
                    $commentUserPictureID = 2;
                    $commentContent = $comment['Comment'];
                    $commentTimeStamp = $comment['CommentTime'];

                    $comment = new comment($commentID, $commentUserID, $commentUserName, $commentUserPictureID, $commentContent, $commentTimeStamp);

                    $comments[] = $comment;

                }
            }

            //gathers all the like data for a photo
            $query3 = "SELECT * FROM likes
                        LEFT JOIN user ON user.`UserID` = likes.`UserID`
                        WHERE likes.`PostID` = '$postID'";

            if ($result3 = mysqli_query($conn, $query3)) {
                $numLikes = mysqli_num_rows($result3);

                while($like = mysqli_fetch_array($result3)) {
                    $LikeUserName = $like['UserName'];
                    if ($like['UserID'] == $_SESSION['UserID']) {
                        $hasUserLiked = true;
                    }
                    $likes[] = $like;
                }
            }

            $post = new post($postID, $postUserPictureID, $postUserName , $numLikes, $hasUserLiked, $numComments, $postDescription, $postLocation, $postTimeStamp);

            echo $post->addComments($comments);
            echo $post->returnHTML();


        }

    }
}
?>
