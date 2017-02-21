<?php
$profilePictureID = '1';
$profileUserName = 'GreatGeorge';
$profileUserLocation= 'Dublin, Ireland';
$profileUserDescription='Working class citizen obsessed with photography! Working class citizen obsessed with photography! Working class citizen obsessed with photography!haha';

 ?>

<div class="container profile-info">
  <div class="row ">
    <div class="col col-md-3 col-xs-3 profile-info-row">
      <img src="<?=SITE_ROOT?>/images/profilepics/<?=$profilePictureID?>.jpg" class="img-circle img-responsive profile-user-picture " />
    </div>
    <div class="col col-md-9  col-xs-9 container">
      <p class="profile-info-name">
          <h3><?=$profileUserName?></h3>
      </p>
      <p class="profile-info-location location">
        <i class="fa fa-map-marker fa-lg"></i>&nbsp;
        <?=$profileUserLocation?>
      </p>
      <p class="profile-info-description">
<?=$profileUserDescription  ?>
      </p>
    </div>
  </div>
  <hr />
</div>
<div class="container profile-options">
  <div class="row">
    <div class="col-md-3 col-xs-3   lv-icons-unclicked border-right <?php echo ($filename == 'profile-info' ? 'lv-icons-clicked': '' )?>">
      <a href="<?=SITE_ROOT?>/profile-info.php">     <i class="fa  fa-picture-o fa-3x"></i></a>
    </div>
    <div class="col-md-3  col-xs-3  lv-icons-unclicked  border-right <?php echo ($filename == 'profile-collections' ? 'lv-icons-clicked': '' )?>">
        <a href="<?=SITE_ROOT?>/profile-collections.php">   <i class="fa fa-folder fa-3x"></i></a>
    </div>
    <div class="col-md-3  col-xs-3  lv-icons-unclicked  border-right <?php echo ($filename == 'profile-friends' ? 'lv-icons-clicked': '' )?>">
        <a href="<?=SITE_ROOT?>/profile-friends.php">   <i class="fa fa-users fa-3x"></i></a>
    </div>
    <div class="col-md-3  col-xs-3 lv-icons-unclicked <?php echo ($filename == 'profile-circles' ? 'lv-icons-clicked': '' )?>">
        <a href="<?=SITE_ROOT?>/profile-circles.php">   <i class="fa fa-circle-o fa-3x"></i></a>
    </div>
    </div>
  <hr />
</div>
