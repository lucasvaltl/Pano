<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('config.php');

require_once('dbconnect.php');

$commentID = $_POST['commentID'];


$query = "DELETE FROM comments
            WHERE commentID = '$commentID'
            LIMIT 1";

if (mysqli_query($conn, $query)) {
    echo 'true';
} else {
    //echo "Error: " . $query . "<br>" . mysqli_error($conn);
    echo 'false';
}

?>
