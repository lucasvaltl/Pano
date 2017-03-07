<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');

if (isset($_SESSION['UserID'])) {
  $UserID = $_SESSION['UserID'];
}

include_once('includes/createcircle.php');
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
  <title>Pano - Profile</title>
</head>

<body ng-app="">
  <?php
  include('includes/header.php');
  ?>
  <main>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group create-circle container">
      <input type="hidden" name="CreatorID" value="<?= $UserID ?>">
      <div class="row">
        <h2>Create a new Circle!</h2>

      </div>
      <div class="row">
        <div class="col-sm-3 create-circle-picID">
          <input type="text" class="form-control circle-create-input"  name="PhotoID" placeholder="PhotoID" ng-style="{'width': (PhotoID.length == 0 ? '30': ((PhotoID.length*14.5))) + 'px'}" ng-model="PhotoID">
        </div>

        <div class="col-sm-6 create-circle-name">
          <input type="text" class="form-control collection-name-input"  name="GroupName" placeholder="Insert Awesome Name Here" ng-style="{'width': (CollectionName.length == 0 ? '360': ((CollectionName.length*14.5))) + 'px'}" ng-model="CollectionName">
        </div>

        <div class="col-sm-3 create-circle-button">
          <input type="submit" name="create" class="btn btn-default lv-button create-collection-btn" value="Create" />
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6 create-circle-shortdescrip">
          <textarea type="textarea" class="form-control circle-create-input circle-create-input-textarea" placeholder="What will the circle be about? Please write a short description." wrap="soft" name="ShortDescrip"></textarea>
        </div>
        <div class="col-sm-3">

        </div>
      </div>
      <hr />
      <div class="row">
        <h3>Please select the friends that you want to add to the circle:</h3>
      </div>
      <br />

      <?php

        //$query = "SELECT UserID FROM friends WHERE UserID = '$profileUserID' OR FriendID = '$profileUserID'";

        $query = ("SELECT
                    user.`UserName` AS UserName, user.`UserID` AS UserID
                    FROM friends LEFT JOIN user
                    ON user.`UserID` = friends.`UserID`
                    OR user.`UserID` = friends.`FriendID`
                    AND user.`UserID` != '$UserID'
                    WHERE friends.`UserID` = '$UserID'");
        $friends = mysqli_query($conn, $query);
       ?>

       <?php while($row = mysqli_fetch_assoc($friends)) :
if($row['UserID'] === $UserID){
  continue;
}
         $PictureID = '3';
         ?>
         <div class="row friend-content">
         <div class="col-md-3 col-xs-3">
         <img src="<?=SITE_ROOT?>/images/profilepics/<?= $PictureID ?>.jpg" class="img-circle friend-picture" />
          </div>
         <div class="col-md-3 col-xs-3 friend-name">
            <h3><?= $row['UserName']?></h3>
         </div>

         <div class="col col-md-6 col-xs-6 friending-icon">
          <input type="checkbox" class="create-circle-check" name="<?= $row['UserID']?>" value="<?= $row['UserID']?>" >
           </div>
           </div>
           <hr>

       <?php endwhile; ?>

    </form>
  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>

</html>
