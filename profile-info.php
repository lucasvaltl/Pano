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
    include('includes/profile-header.php');
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
    <title>Pano - <?php echo $profileUserName;?></title>
</head>

<body ng-app="">
    <?php
        include('includes/header.php');
     ?>
    <main>

      <div class="profile-content" id="feed-container" >

      </div>

      <button id="load-more-button" data-page="0" type="button">Load More</button>

      <div id="loader">
        <img class="loading" src="<?=SITE_ROOT?>/images/loading.gif" width="50" height="50" />
      </div>



    </main>
    <?php
    include('includes/header.php');



  include('includes/commentlikejs.php');
        include('includes/footer.php');
    ?>

</body>

</html>
