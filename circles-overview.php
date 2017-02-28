<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');

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
      <?php
      if (isset($_GET['id'])) {
        $profileUserName = $_GET['id'];
      }
      ?>
    </div>
    <div class="popup" id="gradhome" ng-hide="newCollectionPopup">
      <div class="create-circle-link">
        <a href="circle-creation.php?id=<?=$profileUserName?>">&nbsp;  &nbsp; &nbsp;  Create new Circle</a>
      </div>
      <div class="create-circle-close">

        <a lass="create-circle-close" href="" ng-click="newCollectionPopup = !newCollectionPopup">X &nbsp;  &nbsp;</a>
      </div>
    </div>
    <div class="content circles-overview container">

      <div class="circles-overview-header">
        Your  Circles
        <br />
      </div>
      <div class="circles-overview-content">


        <?php
        include('includes/circle-cover.php');

        require_once('includes/dbconnect.php');
//queries for all circles that a user is in
        $query = "SELECT g.GroupID, g.GroupName, g.ShortDescrip, g.PhotoID  FROM groups AS g INNER JOIN usergroupmapping AS u ON g.GroupID=u.GroupID WHERE u.UserID=" . $_SESSION['UserID'];

        $groups = mysqli_query($conn, $query);

//creates interface for each circle
        while($row = mysqli_fetch_assoc($groups)){
          $collections[] = new circle('circle-messages.php?GroupID=' . $row['GroupID'] , $row['PhotoID'], $row['GroupName']);
        }

        $count = 1;
        echo '<hr/> ';
        //insert the collections into the page
        foreach($collections as $collection){

          // insert a new row every two elements
          if($count % 2 != 0){
            echo '<div class="row"> ';
            $collection->setBorderRight();
          }
          //insert post
          $collection->returnHTML();
          //close row every two elements and insert a dividor
          if($count % 2 == 0){
            echo '</div> <hr/> ';
          }
          $count += 1;

        }

        ?>
      </div>

    </div>



  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>

</html>
