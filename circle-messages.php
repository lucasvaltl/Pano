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

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_GET['GroupID'])) {
    $GroupID = $_GET['GroupID'];
}

//TODO check if user is boss of group
// require_once('includes/dbconnect.php');
//
// $query = "SELECT g.GroupID, g.GroupName, g.ShortDescrip, g.PhotoID  FROM groups AS g INNER JOIN usergroupmapping AS u ON g.GroupID=u.GroupID WHERE u.UserID=" . $_SESSION['UserID'];
//
// $groups = mysqli_query($conn, $query);


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
  <title>Pano - Messages</title>
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
    <div class="circle-profile-header">
      <?php
      include('includes/circle-header.php');
      ?>
    </div>
    <div class=" circles-main-content ">
    <div class="container circle-messages-content" id="messages">

<?php
    require_once('includes/dbconnect.php');
    require_once('includes/sendmessage.php');


$query = 'SELECT Content, MessageTime, Username, m.UserID FROM messages AS m JOIN user AS u WHERE m.UserID = u.UserID AND '.$GroupID.'=m.groupID ORDER BY MessageTime ASC';
$messages = mysqli_query($conn, $query);

 ?>

 <?php while($row = mysqli_fetch_assoc($messages)) :
   ?>

   <div class="row">
 <div class=" <?php echo (( $row['UserID'] ==$_SESSION['UserID']) ? 'circle-message-right' : 'circle-message-left' ); ?> soft-shadow">
   <div class="message-sender">
     <?= $row['Username'] ?> @ <?= $row['MessageTime'] ?>
   </div>
   <div class="message-content">
           <?= $row['Content'] ?>
   </div>
 </div>
   </div>

 <?php endwhile; ?>

    </div>
<div class="container">

    <div class="row circle-create-message">
      <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group form-inline submit message" autocomplete="off" role="presentation">
        <input type="hidden" name="GroupID" value="<?= $GroupID ?>"/>
        <input type="hidden" name="UserID"  value="<?= $_SESSION['UserID'] ?>"/>
        <div class="col col-xs-11">
            <input type="text" class="form-control create-message-content" id="msg" name="Content" placeholder="<?php echo (( isset($error) && $error === 'Please fill in a message') ? 'Please fill in a message - you can\'t send nothing!' : 'What would you like to say?'); ?> "/>
        </div>
        <div class="col col-xs-1">
          <button type="submit" name="submit" class="btn btn-default airplane-btn create-message-send" value="Submit"><i class="fa fa-paper-plane-o fa-3x"></i></button>
      </div>
    </form>
</div>
    </div>
  </div>
  <script type="text/javascript">
  var myDiv = document.getElementById("messages");
  myDiv.scrollTop = myDiv.scrollHeight;
  </script>
  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>

</html>
