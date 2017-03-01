<?php

ob_start();

session_start();

require_once('dbconnect.php');

$postPictureID = $_POST['postPictureID'];

$query = "INSERT INTO likes (PhotoID, UserID)
            VALUES ('$postPictureID','{$_SESSION['UserID']}')";

if (mysqli_query($conn, $query)) {
    echo 'true';
} else {
    //echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}

?>
