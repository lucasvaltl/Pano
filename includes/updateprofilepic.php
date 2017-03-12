<?php

    if(isset($_POST['confirmPic'])){

        echo"yolo";

        $profilePictureID = $_SESSION['UserID'];


        $query = "UPDATE user SET ProfilePictureID='$profilePictureID'
                    WHERE UserID = '{$_SESSION['UserID']}'";

        if (!mysqli_query($conn, $query)) {
          die('Error: ' . mysqli_error($conn));
        } else{
          header("Location: profile-info.php?id=". urlencode($_SESSION['UserName']));
        }
    }
