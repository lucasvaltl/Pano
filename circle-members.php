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

include_once('includes/edit-circle-members.php');

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
    <title>Pano -
        <?php echo $GroupID;?>
    </title>
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
        <div class="circle-profile-header">
            <?php
      include('includes/circle-header.php');
      ?>
        </div>
        <div class="circle-members-content">
            <form action="<?= $_SERVER['PHP_SELF'] . '?GroupID='.$GroupID; ?>" method="post">
                <div class="content friends-content container form-group">
                    <div class="row">
                        <div class="col col-sm-2">
                        </div>
                        <div class="col col-sm-6 col-sm-offset-1">
                            <h2><?= $circleName ?>'s Members</h2>
                        </div>
                        <div class="col col-sm-3  delete-circle-members">
                            <?php
                                //$query = "SELECT UserID FROM friends WHERE UserID = '$profileUserID' OR FriendID = '$profileUserID'";
                                $query = "SELECT CreatorID  FROM groups  WHERE GroupID='$GroupID'";
                                $CreatorID = mysqli_fetch_assoc(mysqli_query($conn, $query));
                                $CreatorID = $CreatorID['CreatorID'];

                                if($UserID == $CreatorID):

                            ?>
                            <input type="submit" name="submit" class="btn btn-default lv-button delete-circle-members" value="Delete" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <br />
                    <hr />
                    <?php
                        $query = "SELECT u.UserName, u.UserID, u.ProfilePictureID  FROM usergroupmapping AS ugm JOIN user AS u ON ugm.UserID = u.UserID WHERE ugm.GroupID='$GroupID'  ORDER BY u.UserName";
                        $members= mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($members)) :
                            //create isadmin for alter use - assume false at start of every loop
                            $isAdmin = false;
                            $PictureID = $row['ProfilePictureID'];

                     ?>
                    <div class="row friend-content">
                        <div class="col col-sm-3 col-xs-3">
                            <img src="https://apppanoblob.blob.core.windows.net/profilepics/<?= $PictureID ?>.jpg" class="img-circle friend-picture" />
                        </div>
                        <div class="col  col-sm-5 col-xs-4 name-column ">
                            <div class="friend-name">
                                <?= $row['UserName']?>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <?php
                              if($row['UserID'] == $CreatorID){
                                $isAdmin = true;
                                echo '<div class="admin-icon">
                                Admin
                                </div>';
                              }
                             ?>

                        </div>

                        <div class="col col-sm-3 col-md-offset-1 col-xs-3 friending-icon">
                            <?php
                              // only display unfriending options when user is admin
                                if($UserID == $CreatorID && !$isAdmin):
                              ?>
                            <input type="checkbox" class="inverted-create-circle-check" name="<?= $row['UserID']?>" value="<?= $row['UserID']?>">
                            <?php endif; ?>
                        </div>

                    </div>
                    <hr>
                    <?php endwhile; ?>
                </div>
            </form>


            <form action="<?= $_SERVER['PHP_SELF'] . '?GroupID='.$GroupID; ?>" method="post">

                <div class="content friends-content container form-group">

                    <?php
                        if($UserID == $CreatorID):
                     ?>
                    <div class="row">
                        <div class="col col-sm-2">
                        </div>
                        <div class="col col-sm-6 col-sm-offset-1">
                            <h2>Add new Members</h2>
                        </div>
                        <div class="col col-sm-3  delete-circle-members">
                            <input type="submit" name="submit" class="btn btn-default lv-button add-circle-members" value="Add Members" />
                        </div>
                    </div>
                    <br />
                    <hr />

                    <div class="potential-members">
                        <?php

                        //$query = "SELECT UserID FROM friends WHERE UserID = '$profileUserID' OR FriendID = '$profileUserID'";
                //TODO delete the or when merging into master - not needed anymore due to database change...
                        $query = "SELECT user.`UserName` AS UserName, user.`UserID` AS UserID, user.`ProfilePictureID` AS ProfilePictureID
                                    FROM friends LEFT JOIN user ON user.`UserID` = friends.`UserID` OR user.`UserID` = friends.`FriendID`
                                    AND user.`UserID` != '$UserID' WHERE (friends.`UserID` = '$UserID')
                                    AND (user.`UserID` NOT IN (SELECT u.`UserID` FROM usergroupmapping AS ugm JOIN `user` AS u ON ugm.`UserID` = u.`UserID`
                                    WHERE ugm.`GroupID`='$GroupID'))";

                            $friends = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($friends)) :
                              if($row['UserID'] === $UserID){
                              continue;
                            }
                         $PictureID = $row['ProfilePictureID'];
                         ?>
                            <div class="row friend-content">
                                <div class="col-md-3 col-xs-3">
                                    <img src="https://apppanoblob.blob.core.windows.net/profilepics/<?= $PictureID ?>.jpg" class="img-circle friend-picture" />
                                </div>
                                <div class="col  col-sm-5 col-xs-4 name-column ">
                                    <div class="friend-name">
                                        <?= $row['UserName']?>
                                    </div>
                                </div>

                                <div class="col col-sm-3 col-md-offset-1 col-xs-3 friending-icon">
                                    <input type="checkbox" class="create-circle-check" name="<?= $row['UserID']?>" value="<?= $row['UserID']?>">
                                </div>
                            </div>
                            <hr>

                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </form>

        </div>
    </main>
    <?php
  include('includes/footer.php');
  ?>

</body>

</html>
