<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('config.php');

require_once('dbconnect.php');

$PostID = $_POST['PostID'];

$query = "DELETE FROM `likes` WHERE `likes`.`PostID` = '$PostID';
DELETE FROM `comments` WHERE `comments`.`PostID` = '$PostID';
DELETE FROM `tagspostsmapping` WHERE `tagspostsmapping`.`PostID` = '$PostID';
DELETE FROM `posts` WHERE `posts`.`PostID` = '$PostID'";

if (mysqli_multi_query($conn, $query)) {
    echo 'true';
} else {
    //echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}


?>
