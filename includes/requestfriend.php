<?php

ob_start();

session_start();

include('config.php');

require_once('dbconnect.php');

$postFriendID = $_POST['postFriendID'];


$query = "INSERT INTO `friendrequests` (UserID, FriendID) VALUES ('{$_SESSION['UserID']}','" . $postFriendID. "');";

if (mysqli_query($conn, $query)) {
    echo 'true';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}

?>
