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

    function checkQueryExistence($conn, $query){
        if ($result = mysqli_query($conn, $query)) {
            if ($count = mysqli_num_rows($result) > 0){
                return true;
            }
        }
    }


      $query= "SELECT CollectionID, Caption, SettingID, GroupID
                FROM collections
                WHERE OwnerID=(SELECT UserID FROM user WHERE UserName='$profileUserName')";

      //create an array of collections
      if($collections = mysqli_query($conn, $query)) {

            $count = 1;
            //insert the collections into the page
            while($collection = mysqli_fetch_array($collections)) {

                $collectionSettingID = $collection['SettingID'];
                  //add first picture as cover to every collection
                  $query="SELECT PostID from photocollectionsmapping WHERE CollectionID=$collection[CollectionID] LIMIT 1";

                  if($result = mysqli_query($conn, $query) ){
                    $cover = mysqli_fetch_array($result);
                  }

                  $display_collection = false;
                  if ($_SESSION['UserID'] == $profileUserID || $collectionSettingID == 3) {
                      $display_collection = true;
                  } else if ($collectionSettingID == 4) {

                      $groupID = $collection['GroupID'];
                      $groupQuery = "SELECT * from usergroupmapping WHERE GroupID = '$groupID' AND UserID = '{$_SESSION['UserID']}'";
                      $display_collection = checkQueryExistence($conn, $groupQuery);

                  } else if ($collectionSettingID == 2) {

                      $friendshipQuery = "SELECT my.FriendID
                            FROM friends AS my
                            JOIN friends AS their USING (FriendID)
                            WHERE  (my.UserID = '{$_SESSION['UserID']}' AND their.UserID = '$profileUserID')";
                      $display_collection = checkQueryExistence($conn, $friendshipQuery);

                  } else if ($collectionSettingID == 1){
                      $friendshipQuery = "SELECT * FROM friends WHERE UserID = '{$_SESSION['UserID']}' AND FriendID = '$profileUserID'";
                      $display_collection = checkQueryExistence($conn, $friendshipQuery);
                  }

                  // insert a new row every two elements
                  if($count % 2 != 0 && $display_collection){
                    echo '<div class="row"> ';
                    $borderRight = 'border-right';
                  }

                  if ($display_collection){

                      //insert post
                      echo  ' <div class="col col-sm-6 soft-shadow collection-object">
                      <a href="'.SITE_ROOT.'/profile-collection.php?CollectionID='.$collection['CollectionID'].'">
                      <p>
                      <img src="'. SITE_ROOT .'/AzureBackups/panoramas/'  . $cover['PostID'] . '.jpg" class="img-responsive  profile-collections-title" alt="Collection does not contain Images"/>
                      </p>
                      <p>
                      <h4>'.$collection['Caption'].'</h4>
                      </p>
                      </a>
                      </div>';
                  }

                  //close row every two elements and insert a dividor
                  if($count % 2 == 0){
                    echo '</div>  ';
                  }

                  if ($display_collection) {
                    $count += 1;
                  }
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
