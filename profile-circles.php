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

<body>
    <?php
        include('includes/header.php');
     ?>
    <main>


      <div class="profile-header">
        <?php
        if (isset($_GET['id'])) {
            $profileUserName = $_GET['id'];
            include('includes/profile-header.php');
        }
         ?>
      </div>

      <div class="content circles-content container">


        <h2><?= $profileUserName ?>'s Circles</h2>
        <br />

        <?php
        include('includes/circle-cover.php');

        require_once('includes/dbconnect.php');
        //queries for all circles that the user is in
        $query = "SELECT g.GroupID, g.GroupName, g.ShortDescrip, g.PhotoID  FROM groups AS g INNER JOIN usergroupmapping AS u ON g.GroupID=u.GroupID WHERE u.UserID=(SELECT UserID from user WHERE UserName='$profileUserName')";

        $groups = mysqli_query($conn, $query);

        if ($groups->num_rows != 0){

        while($row = mysqli_fetch_assoc($groups)){
          $collections[] = new circle('circle-messages.php?GroupID=' . $row['GroupID'] , $row['PhotoID'], $row['GroupName']);
        }

        $count = 1;
        //insert the collections into the page
        foreach($collections as $collection){

          // insert a new row every two elements
          if($count % 2 != 0){
            echo '<div class="row"> ';
          }
          //insert post
          $collection->returnHTML();
          //close row every two elements and insert a dividor
          if($count % 2 == 0){
            echo '</div>';
          }
          $count += 1;

        }
} else {
  echo '
  <h2 class="center-center">'.$profileUserName.' is not in any groups yet</h2>';
}
        ?>

      </div>




    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
