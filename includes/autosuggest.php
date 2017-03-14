<?php

    ob_start();

    session_start();

    require_once('dbconnect.php');


    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $isHashtag = false;
    if ($search[0] == '#'){
        $isHashtag = true;
    }

    $suggestions = [];

    if ($isHashtag){
        $query = "SELECT TagName FROM tags
                  WHERE TagName LIKE  '%$search%'
                  LIMIT 5";

        if ($result = mysqli_query($conn, $query)){
            while ($row = mysqli_fetch_array($result)){
                $suggestion = $row['TagName'];
                $suggestions [] = $suggestion;
            }
        }
    } else {
        $query = "SELECT UserName FROM user
                  WHERE FirstName LIKE  '%$search%'
                  OR LastName LIKE '%$search%'
                  OR UserName LIKE '%$search%'
                  LIMIT 5";
        if ($result = mysqli_query($conn, $query)){
            while ($row = mysqli_fetch_array($result)){
                $suggestion = $row['UserName'];
                $suggestions [] = $suggestion;
            }
        }
    }

    foreach ($suggestions as $suggestion){
        echo '<li><a href="search.php?search='.$suggestion.'">'.$suggestion.'</a></li>';
    }

?>
