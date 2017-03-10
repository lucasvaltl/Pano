<?php

ob_start();

session_start();

include('config.php');

require_once('dbconnect.php');

$postFriendID = $_POST['postFriendID'];


$query = "DELETE FROM `friends` WHERE FriendID='$postFriendID' AND UserID='{$_SESSION['UserID']}' ";
$query2 = "DELETE FROM `friends` WHERE FriendID='{$_SESSION['UserID']}' AND UserID='$postFriendID' ";

if (mysqli_query($conn, $query) && mysqli_query($conn,$query2)) {
    echo 'true';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}

?>
