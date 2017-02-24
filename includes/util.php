<?php
/**
 * Created by PhpStorm.
 * User: johanneslandgraf
 * Date: 24/02/2017
 * Time: 19:10
 */


function friendRequest($friendID, $userID) {

    include('dbconnect.php');

    $sql = "INSERT INTO `friendrequests` ('UserID', 'FriendID') VALUES ('" . $userID . "', '" . $friendID . "');";

    if (isset($conn)) {
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
