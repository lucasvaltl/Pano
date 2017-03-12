<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');

if(isset($_GET['CollectionID'])){
  $CollectionID = $_GET['CollectionID'];
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
    <title>Pano - Profile</title>
</head>

<body ng-app="">
    <?php
        include('includes/header.php');
     ?>
    <main>

      <div class="profile-header">
      </div>
      <div class="content collection-content">
        <div class="row collection-identifier">
          Collection:
        </div>
      <div class="row collection-header">
        <div class="col col-md-1">
        </div>
        <div class="col col-md-2">
        </div>
        <div class="col col-md-6 collection-name">
          <?php
          $query = "SELECT  c.Caption, u.UserName, c.SettingID, c.GroupID, c.OwnerID  FROM collections AS c LEFT JOIN user AS u on c.OwnerID = u.UserID WHERE c.CollectionID='$CollectionID'";
          if($result = mysqli_query($conn, $query)){
            if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_array($result);
            }
          }
           ?>
          <h2><?= $row['Caption'] ?> by  <?= $row['UserName'] ?></h2>
        </div>
        <div class="col col-md-2">
          <?php
          //display an edit button if the user is the owner of the collection
          if ($_SESSION['UserID'] == $row['OwnerID']) : ?>
              <a href="<?=SITE_ROOT?>/collection-edit.php?CollectionID=<?=$CollectionID?>"><button type="button" class="btn btn-default edit-button collection-edit-button" ><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit </button></a>
            <?php endif; ?>
        </div>
        <div class="col col-md-1">
        </div>

      </div>
        <br />
        <hr />

        <div  id="feed-container" >

        </div>

        <button id="load-more-button" data-page="0" type="button">Load More</button>

        <div id="loader">
          <img class="loading" src="<?=SITE_ROOT?>/images/loading.gif" width="50" height="50" />
        </div>

      </div>

    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
    include('includes/commentlikejs.php');
    include('includes/footer.php');
?>
</html>
