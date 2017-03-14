<?php

    if(isset($_POST['confirmPic'])){


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
