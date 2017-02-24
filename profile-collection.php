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
      <div class="content collection-content">
        <?php
$thisCollection ='Outside';
         ?>
        <h2><?= $thisCollection ?> by  <?= $profileUserName ?></h2>

        <br />
        <hr />


        <?php
      include 'includes/post.php';

      $posts= [

      new post("IMG_8937", "1", "curious_clark", "234", "1", "#bestintheworld", "Bergen, Austria" ),
      new post("IMG_2821", "2", "judgyjudy", "2134", "1", "#justWOW", "Iguacu Falls, Brazil" ),
      new post("IMG_6346", "3", "classy_claire", "33", "1", "This is the best city in the world! Who Aggrees?", "London, UK" )
      ];

      $comments=[
      new comment("LikelyLucy","3","wow amazing stuff here"),
      new comment("judgyjudy","2","Great Work"),
      new comment("GrannyGiu","5","Not so sure...I would add more color")
      ];

      foreach ($posts as $post){
        $post->addComments($comments);
      }

      foreach ($posts as $post){
        $post->returnHTML();
      }
        ?>

      </div>



    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
