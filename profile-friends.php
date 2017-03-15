<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');

if (isset($_GET['id'])) {
    $profileUserName = $_GET['id'];
}

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2qniLS_JRqdMIDCuy0L3ac7usMi6fbi4&v=3.exp&sensor=false&libraries=places"></script>
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://apppanoblob.blob.core.windows.net/assets/favicon.ico">
    <meta property="og:title" content="Pano" />
    <meta property="og:image" content="https://apppanoblob.blob.core.windows.net/assets/ogimage.jpg" />
    <meta property="og:description" content="The social network taking a wider perspective " />
</head>

<body ng-app="">
    <?php
        include('includes/header.php');
     ?>
     <div class="profile-header">
       <?php
       if (isset($_GET['id'])) {
         include('includes/profile-header.php');
       }
       ?>
     </div>
    <main>
      <div class="profile-header">

      </div>
      <div class="content friends-content container">
        <h2><?= $profileUserName ?>'s Friends</h2>
        <br />
        <hr />



      <?php
        include('includes/friends-list.php');


        //join query to associate a UserID with their UserName.
        $query = ("SELECT
                    user.`UserName` AS UserName, user.`UserID` AS UserID, user.`ProfilePictureID` AS ProfilePictureID
                    FROM friends LEFT JOIN user
                    ON user.`UserID` = friends.`UserID`
                    AND user.`UserID` != '$profileUserID'
                    WHERE friends.`FriendID` = '$profileUserID'");


        if ($result = mysqli_query($conn, $query)) {
            $count = mysqli_num_rows($result);

            if ($count == 0){
                  echo '<h2 class="center-center">'.$profileUserName.' does not have any friends yet!</h2>';
            } else {
                while ($row = mysqli_fetch_array($result)) {

                    $isFriendOfUser = false;

                    $friendName = $row['UserName'];
                    $friendUserID = $row['UserID'];
                    $friendProfilePictureID = $row['ProfilePictureID'];

                    //if the friend is yourself, skip the iteration
                    if ($friendName == $profileUserName || $friendName == $_SESSION['UserName']){
                        continue;
                    }

                    //otherwise check to see if the logged in user is friends with this user's friends
                    $query2 = "SELECT * FROM friends
                                WHERE UserID = '$friendUserID' AND FriendID = '{$_SESSION['UserID']}'";

                    if ($result2 = mysqli_query($conn, $query2)) {
                        $count = mysqli_num_rows($result2);

                        //if friends, display tick, otherwise an add friend icon will appear
                        if ($count != 0) {
                            $isFriendOfUser = true;
                        }
                    }

                    //create a frienditem and allow the returnHTML function to run with the parameters
                    $row = new frienditem($friendName, $friendName, $friendProfilePictureID, $isFriendOfUser);
                    echo $row->returnHTML();
                }
            }
        }


       ?>

      </div>

    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
