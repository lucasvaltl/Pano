<?php

ob_start();

session_start();

include('config.php');

require_once('dbconnect.php');

$FriendID = $_POST['FriendID'];


$query = "DELETE FROM `friendrequests` WHERE UserID='$FriendID' AND FriendID='{$_SESSION['UserID']}' ";

if (mysqli_query($conn, $query) && mysqli_query($conn,$query2)) {
    echo 'true';
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}

?>
