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
  <title>Pano - <?php echo $profileUserName;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    $thisGroupID = '12345';
$query = "SELECT * FROM messages  WHERE '$thisGroupID' = groupID ORDER BY messageTime ASC";
$messages = mysqli_query($conn, $query);

 ?>

 <?php while($row = mysqli_fetch_assoc($messages)) :
   ?>

   <div class="row">
 <div class=" <?php echo (( $row['UserID'] ===$_SESSION['UserID']) ? 'circle-message-right' : 'circle-message-left'); ?>">
   <div class="message-sender">
     <?= $row['UserID'] ?> @ <?= $row['MessageTime'] ?>
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
      <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline submit message">
        <div class="col col-xs-11">
            <input type="text" class="form-control create-message-content" id="msg" name="messageContent" placeholder="What would you like to respond?"/>
        </div>
      <div class="col col-xs-1">
        <!-- TODO will this work? using a button isntead of input tag (see other forms) -->
          <button type="submit" name="submit" class="btn btn-default airplane-btn create-message-send" value="Send"><i class="fa fa-paper-plane-o fa-3x"></i></button>
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
