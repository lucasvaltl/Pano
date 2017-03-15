<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('includes/config.php');
require_once('includes/dbconnect.php');

$filename = basename(__FILE__, '.php');

if (isset($_GET['id'])) {
    $profileUserName = $_GET['id'];
}


?>
<!DOCTYPE html>
<html>

<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

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
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title>Pano - <?php echo $profileUserName;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://apppanoblob.blob.core.windows.net/assets/favicon.ico">
    <meta property="og:title" content="Pano" />
    <meta property="og:image" content="https://apppanoblob.blob.core.windows.net/assets/ogimage.jpg" />
    <meta property="og:description" content="The social network taking a wider perspective " />
</head>

<body ng-app="">
    <?php
        include('includes/header.php');
     ?>
     <div class="profile-header">
       <?php
       if (isset($_GET['id'])) {
         include('includes/profile-header.php');
       }
       ?>
     </div>


    <main>

    <?php if ($display_page) : ?>

      <div class="profile-content" id="feed-container" >

      </div>

  <?php else : ?>
      <div class="container content center-center profile-privacy animated zoomIn ">

          <h2>Sorry!</h2>

          <br>

          <h3><?=$profileUserName?>'s Pano Feed is not visible to you!</h3>

          <br>

      </div>


  <?php endif ?>

      <button id="load-more-button" data-page="0" type="button">Load More</button>

      <div id="loader">
        <img class="loading" src="<?=SITE_ROOT?>/images/loading.gif" width="50" height="50" />
      </div>




    </main>

</body>

<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
    include('includes/commentlikejs.php');
    include('includes/footer.php');
?>

</html>
