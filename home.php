<?php
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Newsfeed</title>
</head>

<body ng-app="">

    <?php
        require_once('includes/dbconnect.php');
        include('includes/header.php');
      ?>

    <main>

        <?php
        include 'includes/post.php';

        $query = "SELECT * FROM posts
                    LEFT JOIN user ON user.`UserID` = posts.`UserID`
                    ORDER BY PostTime DESC";

        //for each post:
        if ($result = mysqli_query($conn, $query)) {
            $count = mysqli_num_rows($result);
            while ($post = mysqli_fetch_array($result)) {

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
                echo $post->returnHTML();
            }
        }

        include('includes/commentlikejs.php');

          ?>

    </main>
</body>

<?php
    include('includes/footer.php');
?>

</html>
