<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once ('post.php');




$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$posts = findPosts($page);

//for each post:
function findPosts($page) {

    require_once('config.php');

    require_once('dbconnect.php');


    $query = "SELECT * FROM posts
                LEFT JOIN user ON user.`UserID` = posts.`UserID`
                ORDER BY PostTime DESC";

    if ($result = mysqli_query($conn, $query)) {
        $count = mysqli_num_rows($result);

    //    $first_post = $row;
        $per_page = 3;
        $offset = (($page - 1) * $per_page) + 1;

        $posts = [];
        //while ($post = mysqli_fetch_array($result)) {
        for ($i=0; $i < $per_page; $i++) {
            $post = mysqli_fetch_array($result);
            $postID = $post['PostID'];
            $numComments; //calculated in query 2
            $numLikes = 0; //calculated in query 3
            $hasUserLiked = false;
            $postUserName = $post['UserName'];
            $postPictureID = $post['PhotoID'];
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
                        WHERE PhotoID = $postPictureID
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
                        WHERE PhotoID = $postPictureID";

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

            $post = new post($postPictureID, $postUserPictureID, $postUserName, $numLikes, $hasUserLiked, $numComments, $postDescription, $postLocation, $postTimeStamp);

            echo $post->addComments($comments);
            $posts[] = $post;
            echo $post->returnHTML();
        }
    }
}
?>
