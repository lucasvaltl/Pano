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
  <link rel="stylesheet" href="css/offset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Pano - Profile</title>
</head>

<body ng-app="">

  <?php
  include('includes/header.php');
  ?>
  <main>
    <div class="new-collection" id="gradhome" ng-hide="newCollectionPopup">
      <?php if ($_SESSION['UserName'] == $profileUserName) : ?>
        <a href="collection-creation.php?id=<?=$profileUserName?>">Add a new Collection +</a>
        <span class="alignright">
          <a href="" ng-click="newCollectionPopup = !newCollectionPopup">X</a>
        </span>
      <?php endif; ?>
    </div>
    <div class="profile-header">
      <?php
      if (isset($_GET['id'])) {
        include('includes/profile-header.php');
      }
      ?>
    </div>

    <div class="content container collections-content">
      <h2><?= $profileUserName ?>'s Collections</h2>
      <br />
      <?php
      $query="SELECT CollectionID, Caption from collections WHERE OwnerID=(SELECT UserID from user WHERE UserName='$profileUserName')";

      //create an array of collections
      if($collections = mysqli_query($conn, $query)){

        $count = 1;
        echo '<hr/> ';
        //insert the collections into the page
        while($collection = mysqli_fetch_array($collections)){
          //add first picture as cover to every collection
          $query="SELECT  PostID from photocollectionsmapping WHERE CollectionID=$collection[CollectionID] LIMIT 1";
          if($result = mysqli_query($conn, $query) ){
            $cover = mysqli_fetch_array($result);
          }
          // insert a new row every two elements
          if($count % 2 != 0){
            echo '<div class="row"> ';
            $borderRight = 'border-right';
          }
          //insert post
          echo  ' <div class="col col-sm-6 ' . $borderRight . '">
          <a href="'.SITE_ROOT.'/profile-collection.php?CollectionID='.$collection['CollectionID'].'">
          <p>
          <img src="https://apppanoblob.blob.core.windows.net/panoramas/' . $cover['PostID'] . '.jpg" class="img-responsive  profile-collections-title" alt="Collection does not contain Images"/>
          </p>
          <p>
          <h4>'.$collection['Caption'].'</h4>
          </p>
          </a>
          </div>';

          //close row every two elements and insert a dividor
          if($count % 2 == 0){
            echo '</div> <hr/> ';
          }
          $count += 1;
          //reset variables do default
          $borderRight = '';
          $cover = null;
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
