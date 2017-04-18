<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('config.php');

require_once('dbconnect.php');

$Comment = $_POST['Comment'];
$postPictureID = $_POST['postPictureID'];


if(!$stmt = $conn->prepare("INSERT INTO comments (UserID, PostID, Comment) VALUES (?,?,?)")){
    echo "Prepare failed: (". $conn->errno .")" . $conn->error;
}

if(!$stmt->bind_param("iss", $_SESSION['UserID'], $postPictureID, $Comment)){
    echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
}

if ($stmt->execute()) {

    $query2 = "SELECT * FROM comments
                LEFT JOIN user ON user.`UserID` = comments.`UserID`
                WHERE PostID = '$postPictureID'
                ORDER BY CommentTime DESC
                LIMIT 1";

    if ($result2 = mysqli_query($conn, $query2)) {
        $comment = mysqli_fetch_array($result2);

        $commentID = $comment['CommentID'];
        $commentUserName = $comment['UserName'];
        $commentUserPictureID = $comment['ProfilePictureID'];
        $commentContent = $comment['Comment'];
        $commentTimeStamp = $comment['CommentTime'];



            echo                 ' <div class= "row post-comment" id="' . $commentID .'">

                                 <a href="'. SITE_ROOT .'/profile-info.php?id='. $commentUserName .'" >&nbsp;
                  <div class="col-md-1 col-xs-1 comment-picture-col">
                                   <img src="'. SITE_ROOT .'/AzureBackups/profilepics/' . $commentUserPictureID . '.jpg" class="img-circle comment-picture" />
                                        </div>
                <div class="post-comment-content col-md-7 col-xs-7">
                                   ' . $commentUserName . '
                                 </a>:
                                 <div class="post-comment-content">
                                   &nbsp;    ' . $commentContent . '
                                 </div>
                               </div>
                               <div class="col-md-3 col-xs-3 comment-timestamp">
                       '. $commentTimeStamp . '
                     </div>
                      <div class="col-md-1 col-xs-1 ">


                      </div>

                              </div>
                                <hr class="comment-hr">';

    }
}


?>
