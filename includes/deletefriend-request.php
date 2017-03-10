<?php

ob_start();

session_start();

include('config.php');

require_once('dbconnect.php');

$postFriendID = $_POST['postFriendID'];


$query = "DELETE FROM `friendrequests` WHERE FriendID='$postFriendID' AND UserID='{$_SESSION['UserID']}'";

if (mysqli_query($conn, $query)) {
    echo 'true';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}

?>
