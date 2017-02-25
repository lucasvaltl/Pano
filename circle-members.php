<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');

$filename = basename(__FILE__, '.php');

if (isset($_GET['id'])) {
  $circleName = $_GET['id'];

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
  <link rel="stylesheet" href="css/offset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Pano - <?php echo $circleName;?></title>
</head>

<body ng-app="">
  <?php
  include('includes/header.php');
  ?>
  <main>
    <div class="circle-profile-header">
      <?php
      include('includes/circle-header.php');
      ?>
    </div>
    <div class="circle-members-content" >
      <div class="content friends-content container">
        <h2><?= $circleName ?>'s Members</h2>
        <br />
        <hr />

      <?php
        include('includes/friends-list.php');

        //$query = "SELECT UserID FROM friends WHERE UserID = '$profileUserID' OR FriendID = '$profileUserID'";

        $query = ("SELECT
                    user.`UserName` AS UserName, user.`UserID` AS UserID
                    FROM friends LEFT JOIN user
                    ON user.`UserID` = friends.`UserID`
                    OR user.`UserID` = friends.`FriendID`
                    AND user.`UserID` != '$profileUserID'
                    WHERE friends.`UserID` = '$profileUserID'
                    OR friends.`FriendID` = '$profileUserID'");


        if ($result = mysqli_query($conn, $query)) {
            //$count = mysqli_num_rows($result);

            $isFriendOfUser = false;

            while ($row = mysqli_fetch_array($result)) {

                $friendName = $row['UserName'];
                $friendUserID = $row['UserID'];

                //if the friend is yourself, skip the iteration
                if ($friendName == $circleName || $friendName == $_SESSION['UserName']){
                    continue;
                } else {

                    //otherwise check to see if the logged in user is friends with this user's friends
                    $query2 = "SELECT * FROM friends
                                WHERE UserID = '$friendUserID' AND FriendID = '{$_SESSION['UserID']}'
                                OR FriendID = '$friendUserID' AND UserID = '{$_SESSION['UserID']}'";

                    if ($result2 = mysqli_query($conn, $query2)) {
                        $count = mysqli_num_rows($result2);

                        //if friends, display tick, otherwise an add friend icon will appear
                        if ($count == 1) {
                            $isFriendOfUser = true;
                        }
                    }
                }

                //create a frienditem and allow the returnHTML function to run with the parameters
                $row = new frienditem($friendName, $friendName, '3', $isFriendOfUser);
                echo $row->returnHTML();
            }
        }

        /*
        $friends = [
        new frienditem('JudgyJudy', 'profile-info', '3', False),
        new frienditem('Carl', 'profile-info', '4', True),
        new frienditem('Johnson', 'profile-info', '5', False),
        new frienditem('JakeJohnson', 'profile-info', '2', False),
        new frienditem('MrVanDenBorn', 'profile-info', '1', true)
        ];


        foreach($friends as $friend){
          echo $friend->returnHTML();
        }
        */

       ?>

      </div>


    </div>
  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>

</html>