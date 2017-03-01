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
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group">
      <div class="row collection-creation-header">
        <div class="create-collection-name row">
<div class="col col-sm-9 add-padding-40">
  <input type="text" class="form-control collection-name-input" id="usr" name="CollectionName" placeholder="Insert Awesome Name Here" ng-style="{'width': (CollectionName.length == 0 ? '320': ((CollectionName.length*13))) + 'px'}" ng-model="CollectionName">


by  <?= $profileUserName ?>
</div>
              <div class="col col-sm-2 add-padding-30">
                           <input type="submit" name="create" class="btn btn-default lv-button create-collection-btn" value="Create" />
              </div>
<div class="col col-sm-1">

</div>
        </div>
        <br />
        <hr />
      </div>
      <div class="content collection-creation">
<h4>Please choose the picture(s) you want to add to this album</h4>
        <?php
          include('includes/collection-creation-picture.php');

        //create an array of collections - will need to be redone with php when the database is ready

        for ($i=0; $i <3 ; $i++) {
          $pictures[] = new picture('IMG_8937');
          $pictures[] = new picture('IMG_2821');
          $pictures[] = new picture('IMG_6346');

        }


        $count = 1;
        //insert the collections into the page
        foreach($pictures as $picture){

          // insert a new row every two elements
        if($count % 3 == 0){
          echo '<div class="row picture-list-row"> ';
        }
        //insert post
          $picture->returnHTML();
          //close row every two elements and insert a dividor
          if($count % 3 == 0){
            echo '</div>';
          }
          $count += 1;

        }

         ?>

      </div>

</form>

    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
