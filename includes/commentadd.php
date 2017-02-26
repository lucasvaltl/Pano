<?php

ob_start();

session_start();

require_once('dbconnect.php');

$Comment = $_POST['Comment'];
$postPictureID = $_POST['postPictureID'];


$query = "INSERT INTO comments (UserID, PhotoID, Comment)
            VALUES ('{$_SESSION['UserID']}', '$postPictureID', '$Comment')";

if (mysqli_query($conn, $query)) {
    echo $Comment;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>
