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
  $UserName = $_SESSION['UserName'];
  $real_name = $UserID . time();
  $blob_name = hash('sha256',$real_name);
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
    <link rel="stylesheet" href="dropzone.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Pano - Circle Creation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
      <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
      <link rel="manifest" href="/manifest.json">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="theme-color" content="#ffffff">
  <meta property="og:title" content="Pano" />
  <meta property="og:image" content="https://apppanoblob.blob.core.windows.net/assets/ogimage.jpg" />
  <meta property="og:description" content="The social network taking a wider perspective " />
</head>

<body ng-app="">
  <?php
  include('includes/header.php');
  ?>
  <main>
<div class="create-circle container">
      <div class="row">
        <h2>Create a new Circle!</h2>
      </div>

      <div class="row">
        <div class="col-sm-3 create-circle-picID">
            <form action="<?=SITE_ROOT?>/includes/upload.php" class="dropzone dropzone-circle-creation <?php     if ($missing){
              echo 'inputbox-error';
            }?> " type="post">
                <input type="hidden" name="hashname" value="<?= $blob_name ?>">
                <input type="hidden" name="picType" value="circlepics">
                  <div class="dz-message data-dz-message"><?php if ($missing && in_array('Picture', $missing)) : ?>
                    <span class="alert alert-danger">Please add a cover picture. Only jpg files of less than 6mb are allowed.</span>
                  <?php elseif ($missing): ?>
                    <span class="alert alert-danger">Unfortunately you need to re-upload your picture</span>
                  <?php else: ?>
                    <span>Drag a cover picture into here - Or just click*</span>
                  <?php endif; ?></div>
            </form>
        </div>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group create-circle container">
          <input type="hidden" name="CreatorID" value="<?= $UserID ?>">
          <input type="hidden" name="PhotoID" value="<?= $blob_name ?>">
          <div class="row">

        <div class="col-sm-6 create-circle-name">
          <input type="text" class="form-control collection-name-input <?php     if ($missing && in_array('GroupName', $missing)){
            echo 'collection-name-input-error';
          }?>"  name="GroupName" placeholder="<?php if ($missing && in_array('GroupName', $missing)){echo 'You have to give it a name!';}else{echo 'Insert awsome name here';}?>" ng-style="{'width': (CollectionName.length == 0 ? '360': ((CollectionName.length*16))) + 'px'}" ng-model="CollectionName" autocomplete="off" role="presentation" <?php
          if ($errors || $missing) {
            echo 'ng-init="CollectionName=\'' . htmlentities($GroupName) . '\'"';
          }?> required>
        </div>

        <div class="col-sm-3 create-circle-button">
          <input type="submit" name="create" class="btn btn-default lv-button create-collection-btn" value="Create" />
        </div>

      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6 create-circle-shortdescrip">
          <textarea type="textarea" class="form-control circle-create-input circle-create-input-textarea <?php     if ($missing && in_array('ShortDescrip', $missing)){
            echo 'inputbox-error';
          }?>" placeholder="What will the circle be about? Please write a short description." wrap="soft" name="ShortDescrip"><?php
          if ($errors || $missing) {
            echo htmlentities($ShortDescrip);
          }
          ?></textarea>
        </div>
        <div class="col-sm-3">

        </div>
      </div>
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
                    user.`UserName` AS UserName, user.`UserID` AS UserID, user.`ProfilePictureID` AS ProfilePictureID
                    FROM friends LEFT JOIN user
                    ON user.`UserID` = friends.`UserID`
                    AND user.`UserID` != '$UserID'
                    WHERE friends.`FriendID` = '$UserID'
                    ");
        $friends = mysqli_query($conn, $query);
       ?>

       <?php while($row = mysqli_fetch_assoc($friends)) :
            if($row['UserID'] === $UserID){
              continue;
            }
            $profilePictureID = $row['ProfilePictureID'];
         ?>
         <div class="row friend-content">
         <div class="col-md-3 col-xs-3">
         <img src="https://apppanoblob.blob.core.windows.net/profilepics/<?= $profilePictureID ?>.jpg" class="img-circle friend-picture" />
          </div>
         <div class="col  col-sm-5 col-xs-4 name-column ">
           <div class="create-circle-friend-name ">
             <?= $row['UserName']?>
           </div>
         </div>

         <div class="col col-sm-3 col-md-offset-1 col-xs-3 create-circle-friending-icon">
          <input type="checkbox" class="create-circle-check" name="<?= $row['UserID']?>" value="<?= $row['UserID']?>" >
           </div>
           </div>
           <hr>

       <?php endwhile; ?>

    </form>
</div>
  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>
<script src="dropzone.js"></script>

</html>
