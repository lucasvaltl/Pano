<?php
//same page as create-collection.php but all attributes of the collection are pre seleted


//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');


$profileUserName = $_SESSION['UserName'];


if(isset($_POST['edit']) || isset($_POST['delete'])  ){
  include('includes/edit-collection.php');
}

if(isset($_GET['CollectionID'])){
  $CollectionID = $_GET['CollectionID'];
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
  <link rel="shortcut icon" href="https://apppanoblob.blob.core.windows.net/assets/favicon.ico">
  <meta property="og:title" content="Pano" />
  <meta property="og:image" content="https://apppanoblob.blob.core.windows.net/assets/ogimage.jpg" />
  <meta property="og:description" content="The social network taking a wider perspective " />
</head>

<body ng-app="">

  <?php
  include('includes/header.php');
  ?>
  <main>
    <?=  $CollectionID ?>
    <?php
    $query1= "SELECT  c.Caption, u.UserName, c.SettingID, c.GroupID  FROM collections AS c LEFT JOIN user AS u on c.OwnerID = u.UserID WHERE c.CollectionID='$CollectionID'";
    if($result1 = mysqli_query($conn, $query1)){
      if(mysqli_num_rows($result1) == 1){
        $row1 = mysqli_fetch_array($result1);
      }
    }
    ?>
    <div class="row collection-identifier">
      Collection:
    </div>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group">
      <input type="hidden" name="OwnerName" value="<?=$profileUserName?>">
      <input type="hidden" name="CollectionID" value="<?=$CollectionID?>">
      <div class="row collection-creation-header">
        <div class="create-collection-name row">
          <div class="col col-sm-12 add-padding-30">
            <input type="text" class="form-control collection-name-input" id="usr" name="Caption"placeholder="Insert Awesome Name Here" ng-style="{'width': (CollectionName.length == 0 ? '360': ((CollectionName.length*18))) + 'px'}" ng-model="CollectionName" ng-init="CollectionName='<?=$row1['Caption']?>'">
            by  <?= $profileUserName ?>
          </div>
        </div>
        <div class="row  add-padding-20">
          <p class="privacy-setting-description">
            Who do you want to share this collection with?
          </p>
          <select class="privacy-setting" name="PrivacySetting" ng-model="PrivacySetting" ng-init="PrivacySetting = '<?=$row1['SettingID'] ?>'">
            <?php
            $query = "SELECT * from privacysettings";
            $results = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results)):
              ?>
              <option value="<?=$row['SettingID'] ?>"><?=$row['Description'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="row group selection add-padding-20" ng-show="PrivacySetting == '4'">
          <p class="privacy-group-description">
            Which group do you want to share this collection with?
          </p>
          <select class="privacy-group-setting" name="GroupID" ng-model="GroupSelection" ng-init="GroupSelection='<?= $row1['GroupID']?>'">
            <?php
            //  query for groups that the user is in
            $query = "SELECT g.GroupID, g.GroupName, g.ShortDescrip, g.PhotoID  FROM groups AS g INNER JOIN usergroupmapping AS u ON g.GroupID=u.GroupID WHERE u.UserID=" . $_SESSION['UserID'];
            $results = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($results)):
              ?>
              <option value="<?=$row['GroupID'] ?>" ><?=$row['GroupName'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="row add-padding-30">
          <input type="submit" name="edit" class="btn btn-default lv-button create-collection-btn" value="Edit" />
        </div>
        <div class="row add-padding-20">
          <input type="submit" name="delete" class="btn btn-default lv-button delete-collection-btn" value="Delete Collection" />
        </div>
      </div>
      <br />
      <hr />
    </div>
    <div class="content collection-creation">
      <h4>Please select the pictures which should be in this collection. All pictures that are currently in the album are pre-selected.</h4>
      <?php
      //query for all pictures in the collection to later mark them as checked
      $query = "SELECT PostID FROM photocollectionsmapping
      WHERE photocollectionsmapping.`CollectionID` = '$CollectionID'";
      $results = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($results)){
        $picturesInCollection[] = $row['PostID'];
      }



      //create an array of collections
      $query="SELECT PostID from posts WHERE UserID=(SELECT UserID from user WHERE UserName='$profileUserName')";


      if($pictures = mysqli_query($conn, $query)){

        $count = 1;
        //insert the collections into the page
        foreach($pictures as $picture){
          $isInCollection = '';
          //check if picture was already in collection
          if(isset($picturesInCollection) && in_array($picture['PostID'],$picturesInCollection)){
            $isInCollection = 'checked';
          }
          // insert a new row every two elements
          if($count % 3 == 0){
            echo '<div class="row picture-list-row"> ';
          }
          echo '
          <div class="col col-sm-4 picture-list-col picture-list-picture-container">
          <img src="https://apppanoblob.blob.core.windows.net/panoramas/'.$picture['PostID'].'.jpg" class="img-responsive  picture-list-picture"/>

          <input type="checkbox" class="create-collection-check" value="checked"  name="'.$picture['PostID'].'" id="'.$picture['PostID'].'" '.$isInCollection.'/>
          </div>
          ';
          //close row every two elements and insert a dividor
          if($count % 3 == 0){
            echo '</div>';
          }
          $count += 1;

        }
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
