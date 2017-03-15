<?php

    ob_start();

    session_start();

    require_once('dbconnect.php');


    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $isThereHashTag = $_GET['hashtag'];

    $suggestions = [];

    if ($isThereHashTag == 'true') { // found hashtag(s)

        $query = "SELECT TagName FROM tags
                  WHERE TagName LIKE  '%$search%'
                  LIMIT 5";

        if ($result = mysqli_query($conn, $query)){
            while ($row = mysqli_fetch_array($result)){
                $suggestion = $row['TagName'];
                $suggestion = substr($suggestion, 1);
                $suggestions [] = $suggestion;


                echo '<li><a href="search.php?search=%23'.$suggestion.'">#'.$suggestion.'</a></li>';

            }
        }
    } else {

        $query = "SELECT UserName, ProfilePictureID FROM user
                  WHERE FirstName LIKE  '%$search%'
                  OR LastName LIKE '%$search%'
                  OR UserName LIKE '%$search%'
                  LIMIT 5";
        if ($result = mysqli_query($conn, $query)){
            while ($row = mysqli_fetch_array($result)){
                $UserName = $row['UserName'];
                $ProfilePictureID = $row['ProfilePictureID'];
                //    $profilePictureIDs [] = $profilePictureID;
                $suggestions [] = array($UserName, $ProfilePictureID);

                echo '<li><a href="profile-info.php?id='.$UserName.'"><img class="comment-picture img-circle" src="https://apppanoblob.blob.core.windows.net/profilepics/'.$ProfilePictureID.'.jpg">&nbsp;&nbsp;&nbsp;&nbsp;'.$UserName.'</a></li>';
            }
        }


    }



?>
