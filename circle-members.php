<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');

$filename = basename(__FILE__, '.php');

if(isset($_SESSION['UserID'])){
  $UserID = $_SESSION['UserID'];
}

if (isset($_GET['GroupID'])) {
    $GroupID = $_GET['GroupID'];
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
  <title>Pano - <?php echo $circleName;?></title>
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
    <div class="circle-members-content" >
      <div class="content friends-content container">
        <h2><?= $circleName ?>'s Members</h2>
        <br />
        <hr />

        <?php

          //$query = "SELECT UserID FROM friends WHERE UserID = '$profileUserID' OR FriendID = '$profileUserID'";
  $query = "SELECT CreatorID  FROM groups  WHERE GroupID='$GroupID'";
$CreatorID = mysqli_fetch_assoc(mysqli_query($conn, $query));

          $query = "SELECT u.UserName, u.UserID  FROM usergroupmapping AS ugm JOIN user AS u ON ugm.UserID = u.UserID WHERE ugm.GroupID='$GroupID'";
          $members= mysqli_query($conn, $query);
         ?>

         <?php while($row = mysqli_fetch_assoc($members)) :
//PictureID placeholder
           $PictureID = '3';
           ?>
           <div class="row friend-content">
           <div class="col-md-3 col-xs-3">
           <img src="<?=SITE_ROOT?>/images/profilepics/<?= $PictureID ?>.jpg" class="img-circle friend-picture" />
            </div>
           <div class="col-md-5 col-xs-4 name-column ">
<div class="friend-name">
    <?= $row['UserName']?>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
if($row['UserID']=== $CreatorID['CreatorID']){
echo '<div class="admin-icon">
Admin
  </div>';
}
 ?>

    </div>
           <div class="col col-md-4 col-xs-3 friending-icon">
            <input type="checkbox" class="create-circle-check" name="<?= $row['UserID']?>" value="<?= $row['UserID']?>" >
             </div>
             </div>
             <hr>

         <?php endwhile; ?>

      </div>


    </div>
  </main>
  <?php
  include('includes/footer.php');
  ?>

</body>

</html>
