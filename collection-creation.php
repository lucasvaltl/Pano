<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');


$profileUserName = $_SESSION['UserName'];

include('includes/create-collection.php');


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
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group" autocomplete="off" role="presentation">
      <?php
      if ($errors || $missing) : ?>
      <p class="alert alert-danger">Please fix the item(s) indicated</p>
    <?php endif; ?>
    <input type="hidden" name="OwnerName" value="<?=$profileUserName?>">
    <div class="row collection-creation-header">

      <div class="create-collection-name row">
        <div class="row add-padding-40">
          <input type="text" class="form-control collection-name-input <?php     if ($missing && in_array('Caption', $missing)){
            echo 'collection-name-input-error';
          }?>" id="usr" name="Caption" placeholder="<?php if ($missing && in_array('Caption', $missing)){echo 'You have to give it a name!';}else{echo 'Insert awsome name here';}?>" ng-style="{'width': (CollectionName.length == 0 ? '360': ((CollectionName.length*16))) + 'px'}" ng-model="CollectionName" <?php
          if ($errors || $missing) {
            echo 'ng-init="CollectionName=\'' . htmlentities($Caption) . '\'"';
          }?>required>
            by  <?= $profileUserName ?>
          </div>
          <div class="row  add-padding-30">
            <p class="privacy-setting-description">
              Who do you want to share this collection with?
            </p>
            <select class="privacy-setting" name="PrivacySetting" ng-model="PrivacySetting" <?php
            if ($errors || $missing) {
              echo 'ng-init="PrivacySetting=\'' . htmlentities($PrivacySetting) . '\'"';
            }?>>
              <?php
              $query = "SELECT * from privacysettings";
              $results = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($results)):
                ?>
                <option value="<?=$row['SettingID'] ?>" ><?=$row['Description'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="row group selection add-padding-30" ng-show="PrivacySetting == '4'"  >
            <p class="privacy-group-description">
              Which group do you want to share this collection with?
            </p>
            <select class="privacy-group-setting" name="GroupID" ng-model="GroupID"  <?php if ($errors || $missing) {
                echo 'ng-init="GroupID=\'' . htmlentities($GroupID) . '\'"';
              }?>>
              <option selected value></option>
              <?php
              $query = "SELECT g.GroupID, g.GroupName, g.ShortDescrip, g.PhotoID  FROM groups AS g INNER JOIN usergroupmapping AS u ON g.GroupID=u.GroupID WHERE u.UserID=" . $_SESSION['UserID'];
              $results = mysqli_query($conn, $query);
              while($row = mysqli_fetch_array($results)):
                ?>
                <option value="<?=$row['GroupID'] ?>" ><?=$row['GroupName'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="row add-padding-30">
            <input type="submit" name="create" class="btn btn-default lv-button create-collection-btn" value="create" />
          </div>
          <div class="col col-sm-1">
          </div>
        </div>
        <br />
        <hr />
        <?php var_dump($photos); ?>
      </div>
      <div class="content collection-creation">
        <h4>Please choose the picture(s) you want to add to this album</h4>
        <?php


        //create an array of collections - will need to be redone with php when the database is ready
        $query="SELECT PostID from posts WHERE UserID=(SELECT UserID from user WHERE UserName='$profileUserName')";


        if($pictures = mysqli_query($conn, $query)){

          $count = 1;
          //insert the collections into the page
          foreach($pictures as $picture){
            //check if error occured while submiting form and restore selected images
            $checked = '';
            if ($errors || $missing) {
              if(isset($photos) && in_array($picture['PostID'], $photos)){
                        $checked = 'checked';
              }
            }


            // insert a new row every two elements
            if($count % 3 == 0){
              echo '<div class="row picture-list-row"> ';
            }
            echo '
            <div class="col col-sm-4 picture-list-col picture-list-picture-container">
            <img src="https://apppanoblob.blob.core.windows.net/panoramas/'.$picture['PostID'].'.jpg" class="img-responsive  picture-list-picture"/>

            <input type="checkbox" class="create-collection-check" value="checked" name="'.$picture['PostID'].'" id="'.$picture['PostID'].'" '.$checked.'/>
            </div>
            ';
            //close row every two elements and insert a dividor
            if($count % 3 == 0){
              echo '</div>';
            }
            $count += 1;

          }
        }
        ?>

      </div>

      <?php var_dump($_POST); ?>
    </form>

  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>

</html>
