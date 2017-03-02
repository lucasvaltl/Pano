<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('config.php');

require_once('dbconnect.php');

$Comment = $_POST['Comment'];
$postPictureID = $_POST['postPictureID'];


$query = "INSERT INTO comments (UserID, PhotoID, Comment)
            VALUES ('{$_SESSION['UserID']}', '$postPictureID', '$Comment')";

if (mysqli_query($conn, $query)) {

    $query2 = "SELECT * FROM comments
                LEFT JOIN user ON user.`UserID` = comments.`UserID`
                WHERE PhotoID = $postPictureID
                ORDER BY CommentTime DESC
                LIMIT 1";

    if ($result2 = mysqli_query($conn, $query2)) {
        $comment = mysqli_fetch_array($result2);

        $commentID = $comment['CommentID'];
        $commentUserName = $comment['UserName'];
        $commentUserPictureID = 2;
        $commentContent = $comment['Comment'];
        $commentTimeStamp = $comment['CommentTime'];



            echo ' <div class= "row post-comment id="' . $commentID .'"">
               <div class="comment-user-picture col-md-9 col-xs-9">
                 <a href="'. SITE_ROOT .'/profile-info.php?id='. $commentUserName .'" >&nbsp;
                   <img src="images/profilepics/' . $commentUserPictureID . '.jpg" class="img-circle comment-picture" /> &nbsp; &nbsp; &nbsp; ' . $commentUserName . '
                 </a>:
                  &nbsp;    ' . $commentContent . '
               </div>
               <div col-md-3 col-xs-3">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               '. $commentTimeStamp . '




               </div>
              </div>
                <hr>';

    }

} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>
