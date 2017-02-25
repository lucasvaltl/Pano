<?php
// COMMENTED OUT FOR DEVELOPMENT - NEEDS TO BE ADAPTED TO CIRCLES
    // //loads up the user information for the current profile page
    // $query = "SELECT * FROM user WHERE UserName = '$circleName'";
    //
    // if ($result = mysqli_query($conn, $query)) {
    //
    //     $count = mysqli_num_rows($result);
    //     $row = mysqli_fetch_array($result);
    //
    //     if ($count == 1 ){
    //         $profilePictureID = 1;
    //         $profileUserID = $row['UserID'];
    //         $profileUserFirstName = $row['FirstName'];
    //         $profileUserLastName = $row['LastName'];
    //         $profileUserLocation = $row['Location'];
    //         $profileUserDescription = $row['ShortDescrip'];
    //
    //     } else {
    //
    //         header("Location: 404.php");
    //     }
    // }
    //
    // //checks to see if the logged in user is friends with the page of the current user profile,
    // //as long as not viewing own profile page. Subsequently affects visibility of either add or remove friend buttons
    // $are_we_friends = false;
    //
    // if ($_SESSION['UserName'] != $circleName) {
    //
    //     $query = "SELECT * FROM friends WHERE
    //                 UserID = '$profileUserID' AND FriendID = '{$_SESSION['UserID']}'
    //                 OR
    //                 UserID = '{$_SESSION['UserID']}' AND FriendID = '$profileUserID'";
    //
    //     if ($result = mysqli_query($conn, $query)) {
    //         $count = mysqli_num_rows($result);
    //         $row = mysqli_fetch_array($result);
    //
    //         if ($count == 1) {
    //             $are_we_friends = true;
    //         } else {
    //             $are_we_friends = false;
    //         }
    //     }
    //
    // }

    //PLACEHOLDER VARIABLES
    $circleName = 'Besties';
    $circleProfilePictureID = '2';
    $isPartOfCircle = true;
    $circleDescription = 'This is for the best friends in the world! I love you guys #squadgoals #pussyterror'
 ?>

<div class="container profile-info">
    <div class="row ">
        <div class="col col-md-3 col-xs-3 profile-info-row">
            <img src="<?=SITE_ROOT?>/images/profilepics/<?=$circleProfilePictureID?>.jpg" class="img-circle img-responsive profile-user-picture " />
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
            <?php if ($isPartOfCircle) :?>
                <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Exit Circle</button>
            <?php else :?>
                <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Enter Circle </button>
            <?php endif;?>
        </div>
    </div>
    <hr />
</div>
<div class="container profile-options">
    <div class="row">
        <div class="col-md-4 col-xs-4   lv-icons-unclicked border-right <?php echo ($filename == 'circle-messages' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/circle-messages.php?id=<?php echo $circleName;?>"> <i class="fa  fa-paper-plane-o fa-3x"></i></a>
        </div>
        <div class="col-md-4  col-xs-4  lv-icons-unclicked  border-right <?php echo ($filename == 'circle-collections' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/circle-collections.php?id=<?php echo $circleName;?>"> <i class="fa fa-folder fa-3x"></i></a>
        </div>
        <div class="col-md-4  col-xs-4  lv-icons-unclicked  <?php echo ($filename == 'circle-members' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/circle-members.php?id=<?php echo $circleName;?>"> <i class="fa fa-users fa-3x"></i></a>
        </div>
    </div>
    <hr />
</div>
