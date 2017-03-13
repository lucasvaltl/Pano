<?php

//include_once('exit-group.php'); //?GroupID='.$GroupID

$isPartOfCircle = false;
    //Query for general group info
  $query = "SELECT g.GroupID, g.GroupName, g.ShortDescrip, g.PhotoID  FROM groups AS g WHERE g.GroupID=" . $GroupID;
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);

    $circleName = $row ['GroupName'];
    $circleProfilePictureID = $row ['PhotoID'];
    $circleDescription = $row ['ShortDescrip'];

//Query to see if user is part of the group
  $query = "SELECT g.GroupID,  u.UserID  FROM groups AS g INNER JOIN usergroupmapping AS u ON g.GroupID=u.GroupID WHERE u.UserID='" . $_SESSION['UserID'] . "'AND u.GroupID='". $GroupID . "'";

  $results = mysqli_query($conn, $query);

    $count = mysqli_num_rows($results);
    $row = mysqli_fetch_array($results);

    if(isset($row['GroupID']) && $count === 1){
      $isPartOfCircle = true;
          //implement is administrator
          //$isAdmin = ;
    }

 ?>

<div class="container profile-info">
    <div class="row ">
        <div class="col col-md-3 col-xs-3 profile-info-row">
            <img src="https://apppanoblob.blob.core.windows.net/circlepics/<?=$circleProfilePictureID?>.jpg" class="img-responsive circle-cover " />
        </div>
        <div class="col col-md-6  col-xs-6 container">
            <p class="profile-info-name">
                <?=$circleName?>
            </p>
            <p class="profile-info-description">
                <?=$circleDescription  ?>
            </p>
        </div>
        <div class="col col-md-3 col-xs-3 profile-info-row">
            <?php
            $query = "SELECT CreatorID  FROM groups  WHERE GroupID='$GroupID'";
            $CreatorID = mysqli_fetch_assoc(mysqli_query($conn, $query));
            $CreatorID = $CreatorID['CreatorID'];
            $UserID = $_SESSION['UserID'];
            if ($isPartOfCircle && ($CreatorID != $UserID)):
              ?>
            <form action="<?=SITE_ROOT?>/circle-members.php?GroupID=<?= $GroupID;?>" method="post" class="form-group">
                <button type="submit"  name="submit" class="btn btn-default pull-right" Value="Exit Circle"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Exit Circle</button>
            </form>
          <?php elseif($CreatorID != $UserID) :?>
            <form action="<?=SITE_ROOT?>/circle-members.php?GroupID=<?= $GroupID;?>" method="post" class="form-group">
                <button type="submit"  name="submit" class="btn btn-default pull-right" Value="Enter Circle"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Enter Circle</button>
            </form>
            <?php endif;?>
        </div>
    </div>
    <hr class="grey-hr" />
</div>
<div class="container profile-options">
    <div class="row">
        <div class="col-md-4 col-xs-4   lv-icons-unclicked border-right <?php echo ($filename == 'circle-messages' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/circle-messages.php?GroupID=<?php echo $GroupID;?>"> <i class="fa  fa-paper-plane-o fa-3x"></i></a>
        </div>
        <div class="col-md-4  col-xs-4  lv-icons-unclicked  border-right <?php echo ($filename == 'circle-collections' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/circle-collections.php?GroupID=<?php echo $GroupID;?>"> <i class="fa fa-folder fa-3x"></i></a>
        </div>
        <div class="col-md-4  col-xs-4  lv-icons-unclicked  <?php echo ($filename == 'circle-members' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/circle-members.php?GroupID=<?php echo $GroupID;?>"> <i class="fa fa-users fa-3x"></i></a>
        </div>
    </div>
    <hr class="grey-hr" />
</div>
