<?php

    if(isset($_POST['confirmPic'])){
      //refrain from uploading a post without a picture. Variable pictureUploaded is set to true if the uploading worked
if(isset($_SESSION['uploadSuccessful'] ) && $_SESSION['uploadSuccessful'] != true){
        $error = 'upload-error';
        header("Location: settings.php?error=". urlencode($error));
die('should work');
}

//reset upload successfull if  the picture actually uploaded
$_SESSION['uploadSuccessful'] = false;

        $profilePictureID = $_SESSION['UserID'];

        $query = "UPDATE user SET ProfilePictureID='$profilePictureID'
                    WHERE UserID = '{$_SESSION['UserID']}'";

        if (!mysqli_query($conn, $query)) {
          die('Error: ' . mysqli_error($conn));
        } else{
            $_SESSION['ProfilePictureID'] = $profilePictureID;
          header("Location: profile-info.php?id=". urlencode($_SESSION['UserName']));
        }
    }
