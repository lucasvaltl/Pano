<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
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
        include('includes/profile-header.php')
         ?>
      </div>
      <div class="content friends-content container">
        <h2><?= $profileUserName ?>'s Friends</h2>
        <br />
        <hr />
        <div class="row friend-content">
          <div class="col-md-6 col-xs-6 friend-name">
            <a href="profile.php">&nbsp;
              <img src="images/profilepics/2.jpg" class="img-circle friend-picture" /> &nbsp; &nbsp; &nbsp; &nbsp; JudgyJudy
            </a>
          </div>

               <div class="col col-md-6 col-xs-6 friending-icon">
                 <!-- need to implement friending here! -->
                 <a href="" class="" ng-click="isfriend = !isfriend"> <i  class="fa fa-3x fa-check friending-icon" ng-show="isfriend" ng-model="isfriend"></i>
                   <i  class="fa fa-3x fa-user-plus friending-icon" ng-hide="isfriend"></i>
                 </a>  
               </div>

        </div>
         <hr>



      </div>



    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
