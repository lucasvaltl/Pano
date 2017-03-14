<?php

ob_start();

session_start();



require_once('includes/config.php');
require_once('includes/dbconnect.php' );

//=============BE CAREFUL WHEN RUNNING THE PAGE - ONLY REFRESH OR OPEN THE PAGE WHEN YOU HAVE CHOSEN THE CORRECT SETTINGS=========



// =============Creating a bunch of random users and registering them to Pano ========================

/*


$rFirstNames = array("John", "Jess", "Sarah", "Sally", "Andrew", "Harry", "Daniel", "Michelle", "Tommy", "Maisie", "Claire", "Peter", "Jonathan", "Drew", "Gunther");

$rLastNames = array("Walker", "Jones", "Johnson", "Gunaydin", "Hernandez", "Andersen", "Zhao", "Wu", "Ling", "Kauffmann", "Gonzalez", "Garcia", "Nguyen", "Smirnov", "Muller", "Lee", "Smith", "Thompson", "Ivanov", "Park", "Kuznetzov", "Martina", "Singh");

$rUserName1 = array("Super", "Great", "Sneaky", "Silly", "Lazy", "Crazy", "Angry", "Sleepy", "Awesome", "Faulted", "Special", "Fried", "Dragon", "TheReal", "TheOneAndOnly", "TheUndisputed", "The", "A", "aSmall", "mega", "silly", "amazing", "troubled");
$rUserName2 = array("Potato", "Zebra", "Dinosaur", "Bowl", "Elephant", "Tuna", "Bottle", "Speaker", "Orangutan", "Monkey", "_Snake", "Monster", "monster", "Book", "Ant", "AntEater", "Player", "Legend", "Pro");
$rUserName3 = array("123", "", "246", "1", "_dude", "_gal", "_fan", "master", "666", "", "", "", "Master", "Fan", "Dude", "Man", "Girl", "King", "Kid", "_kid", "Lad", "Lass");

$rEmailAddress = array("@lol.com", "@mail.com", "@panoapp.com", "@supermail.com", "@panoapp.com", "@ok.com", "@master.com", "@ucl.ac.uk");

$password = 'password';

$rLocations = array("Manchester", "London", "Birmingham", "Dublin", "Berlin", "Madrid", "Paris", "Milan", "Munich", "Barcelona", "Belfast", "Edinburgh", "Newcastle", "Marseille", "Montpellier", "Hong Kong", "New York", "Washington DC", "Toronto", "Montreal", "Vancouver", "Chicago", "San Francisco");


$userCount = 3;

for ($i = 0; $i < $userCount; $i++){

    $FirstName = (array_random($rFirstNames));
    $LastName = (array_random($rLastNames));

    $UserName = (array_random($rUserName1)) . (array_random($rUserName2)) . (array_random($rUserName3));
    $EmailAddress = $UserName . (array_random($rEmailAddress));
    $Password = "password";
    $Location = (array_random($rLocations));
    $ShortDescrip = 'Hi Im ' . $FirstName . ' ' . $LastName . ', and I love photography. Pano is great!';

    $data = array($FirstName, $LastName, $UserName, $EmailAddress, $Password, $Location, $ShortDescrip);

    //print_r($data);
    //echo '<br>';

    $Password = password_hash($Password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip)
    VALUES ('$FirstName', '$LastName', '$UserName', '$EmailAddress', '$Password', '$Location', '$ShortDescrip')";

    if (mysqli_query($conn, $query)) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }


}
*/

// ===================Getting random users to like random posts =========================

/*
//query to get all ids of users
$query = "SELECT UserID FROM user";

if ($result = mysqli_query($conn, $query)) {
    $userIDs = [];

    while ($user = mysqli_fetch_array($result)){
        $userID = $user['UserID'];
        $userIDs [] = $userID;
    }
    //print_r($userIDs);
}
*/
/*
//query to get all PostIDs of the different posts
$query = "SELECT PostID FROM posts";

if ($result = mysqli_query($conn, $query)) {
    $PostIDs = [];

    while ($photo = mysqli_fetch_array($result)){
        $PostID = $photo['PostID'];
        $PostIDs[] = $PostID;
    }
    //print_r($PostIDs);
}

$likeCount = 10;

for ($i = 0; $i < $likeCount; $i++) {
    $chosenUserID = (array_random($userIDs));
    $chosenPostID = (array_random($PostIDs));

    $query = "INSERT INTO likes (PostID, UserID) VALUES ('$chosenPostID', $chosenUserID)";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn) . "<br>";
    }
}
*/


//=========================Getting random users to friend eachother ========================

/*
$friendCount = 20;

for ($i = 0; $i < $friendCount; $i++) {
    $chosenUserID = (array_random($userIDs));
    $chosenFriendID = (array_random($userIDs));

    $query = "INSERT INTO `friends` (`UserID`, `FriendID`) VALUES ('$chosenUserID', '$chosenFriendID'), ('$chosenFriendID', '$chosenUserID')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn) . "<br>";
    }
}
*/



//==================Adding all users to the friendrecommendations table====================

/*
//query to get all ids of users
$query = "SELECT UserID FROM user";

if ($result = mysqli_query($conn, $query)) {
    $userIDs = [];

    while ($user = mysqli_fetch_array($result)){
        $userID = $user['UserID'];
        $userIDs [] = $userID;
    }
    //print_r($userIDs);

    foreach ($userIDs as $userID){
        echo " $userID";
        $query = "INSERT INTO friendrecommendations (UserID) VALUES ('$userID')";

        if ($result = mysqli_query($conn, $query)) {
            echo "success bro";
        }
    }
}

*/
/*
function array_random($arr, $num = 1) {
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}
*/


//===========================Adding all hashtags from posts into the tags table ======

//get all posts with hashtags in them
/*$query = "SELECT PostText, PostID FROM posts
WHERE PostText REGEXP '^#[[:alnum:]]' OR PostText REGEXP ' #[[:alnum:]]'";


if ($result = mysqli_query($conn, $query)){

//for each post, match all hashtags and put them into an array, so they can be fed into the tags table (if they are unique hashtags)
    while ($row = mysqli_fetch_array($result)){
        $string = strtolower($row['PostText']);
        $PostID = $row['PostID'];
        $hashtags= FALSE;
        preg_match_all("/(#\w+)/u", $string, $matches);
        if ($matches) {
           $hashtagsArray = array_count_values($matches[0]);
           $hashtags = array_keys($hashtagsArray);

       }

       for ($i=0; $i<sizeof($hashtags); $i++){
           print_r($hashtags[$i]);
           print_r($PostID);
           $query2 = "INSERT INTO tags (TagName)
                        VALUES ('$hashtags[$i]')";


            if ($result2 = mysqli_query($conn, $query2)) {
                echo "yolo";
            } else {
                echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
            }


       }
       echo"<br>";
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
*/

//=========================Mapping Tags and Post together in tagspostsmapping ========
/*
$query = "SELECT PostText, PostID FROM posts
WHERE PostText REGEXP '^#[[:alnum:]]' OR PostText REGEXP ' #[[:alnum:]]';";

if ($result = mysqli_query($conn, $query)){

    while ($row = mysqli_fetch_array($result)){
        $string = strtolower($row['PostText']);
        $PostID = $row['PostID'];
        $hashtags= FALSE;
        preg_match_all("/(#\w+)/u", $string, $matches);
        if ($matches) {
           $hashtagsArray = array_count_values($matches[0]);
           $hashtags = array_keys($hashtagsArray);

       }

       $query2 = "SELECT * FROM tags";

       if ($result2 = mysqli_query($conn, $query2)){
           while ($row2 = mysqli_fetch_array($result2)){
               $TagID = $row2['TagID'];
               $TagName = $row2['TagName'];

               for ($i=0; $i<sizeof($hashtags); $i++){
                   print_r($hashtags[$i]);
                   echo "<br>";
                   print_r($PostID);
                   echo "<br><br>";

                   if ($hashtags[$i] == $TagName){
                       $query3 = "INSERT INTO tagspostsmapping (TagID, PostID) VALUES ('$TagID', '$PostID')";
                        if ($result3 = mysqli_query($conn, $query3)){
                            echo "yolo";
                        }else {
                            echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
                        }
                   }
               }
           }
       }else {
           echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
       }
   }

}else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
*/


 ?>
