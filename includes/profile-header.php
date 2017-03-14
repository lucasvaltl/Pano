<?php

    //loads up the user information for the current profile page
    $query = "SELECT * FROM user WHERE UserName = '$profileUserName'";

    if ($result = mysqli_query($conn, $query)) {

        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($count == 1 ){
            $profileUserID = $row['UserID'];
            $profileUserFirstName = $row['FirstName'];
            $profileUserLastName = $row['LastName'];
            $profileUserLocation = $row['Location'];
            $profileUserDescription = $row['ShortDescrip'];
            $profileSettingID = $row['SettingID'];
            $profilePictureID = $row['ProfilePictureID'];

        } else {
            header("Location: 404.php");
        }
    }

    //checks to see if the logged in user is friends with the page of the current user profile,
    //as long as not viewing own profile page. Subsequently affects visibility of either add or remove friend buttons
    $are_we_friends = false;
    $friendRequestSent = false;
    $friendRequestReceived = false;

    if ($_SESSION['UserName'] != $profileUserName) {

        $query = "SELECT * FROM friends WHERE
                    UserID = '$profileUserID' AND FriendID = '{$_SESSION['UserID']}'";

        if ($result = mysqli_query($conn, $query)) {
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);

            if ($count == 1) {
                $are_we_friends = true;
            } else {
                $are_we_friends = false;
            }
        }
    }

    $sql3 = "SELECT * FROM `friendrequests` WHERE FriendID='$profileUserID' AND UserID='{$_SESSION['UserID']}'";

    if ($result3 = mysqli_query($conn, $sql3)) {
        $count2 = mysqli_num_rows($result3);

        //if friends, display tick, otherwise an add friend icon will appear
        if ($count2 == 1) {
            $friendRequestSent = true;
        }

        $typeOfRequestIcon = ($friendRequestSent ? "requested" : "");
    }

    $sql4 = "SELECT * FROM `friendrequests` WHERE UserID='$profileUserID' AND FriendID='{$_SESSION['UserID']}'";

    if ($result4 = mysqli_query($conn, $sql4)) {
        $count3 = mysqli_num_rows($result4);

        //if friends, display tick, otherwise an add friend icon will appear
        if ($count3 == 1) {
            $friendRequestReceived = true;
        }

        $typeOfRequestIcon = ($friendRequestSent ? "requested" : "");
    }
 ?>


<div class="container profile-info" id="<?=$profileUserID?>">

    <div class="row">
        <div class="col col-md-3 col-xs-3 profile-info-row">
            <img src="https://apppanoblob.blob.core.windows.net/profilepics/<?=$profilePictureID?>.jpg" class="img-circle img-responsive profile-user-picture " />
        </div>
        <div class="col col-md-6  col-xs-6 container">
            <p class="profile-info-name">
                <h3 id="profile-username"><?=$profileUserName?></h3>
            </p>
            <p class="profile-info-location location"><i class="fa fa-map-marker fa-lg"></i>&nbsp;<?=$profileUserLocation?></p>
            <p class="profile-info-description"><?=$profileUserDescription?></p>
        </div>

        <div class="col col-md-3 col-xs-3 profile-info-row" id="<?=$profilePictureID?>">
            <?php if ($_SESSION['UserName'] == $profileUserName) : ?>
                <button type="button" class="btn btn-default pull-right edit-button" ><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit Profile </button>
            <?php elseif ($are_we_friends) :?>
                <button id="remove-friend-button" type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Remove Friend </button>
                <button id="confirm-remove-friend-button" type="button" class="btn btn-default pull-right "><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Friend Removed </button>
            <?php elseif ($friendRequestReceived) :?>
                <button id="accept-friend-button" type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Accept Request </button>
                <button id="accepted-friend-button" type="button" class="btn btn-default pull-right "><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Request Accepted </button>
            <?php else :?>
                <button id="add-friend-button" type="button" class="btn btn-default pull-right  <?=$typeOfRequestIcon?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add Friend </button>
                <button id="cancel-friend-button" type="button" class="btn btn-default pull-right <?=$typeOfRequestIcon?>"><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Cancel Request </button>
            <?php endif;?>
        </div>
    </div>


    <?php

     include('includes/friendRequestJS.php');

    ?>

    <hr />
</div>


<?php

    $display_page = false;
    if ($_SESSION['UserID'] == $profileUserID || $profileSettingID == 3){
        $display_page = true;
    } else if ($profileSettingID == 2){
        $friendshipQuery = "SELECT my.FriendID
          FROM friends AS my
          JOIN friends AS their USING (FriendID)
          WHERE  (my.UserID = '{$_SESSION['UserID']}' AND their.UserID = '$profileUserID')";

        if ($result = mysqli_query($conn, $friendshipQuery)){
            if ($count = mysqli_num_rows($result) > 0){
                $display_page = true;
            }
        }
    } else if ($profileSettingID == 1){
        $friendshipQuery = "SELECT * FROM friends WHERE UserID = '{$_SESSION['UserID']}' AND FriendID = '$profileUserID'";

        if ($result = mysqli_query($conn, $friendshipQuery)){
            if ($count = mysqli_num_rows($result) > 0){
                $display_page = false;
            }
        }
    }

 ?>
<div class="container profile-options">
    <div class="row">
        <div class="col-md-3 col-xs-3   lv-icons-unclicked border-right <?php echo ($filename == 'profile-info' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/profile-info.php?id=<?php echo $profileUserName;?>"> <i class="fa  fa-picture-o fa-3x"></i></a>
        </div>
        <div class="col-md-3  col-xs-3  lv-icons-unclicked  border-right <?php echo ($filename == 'profile-collections' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/profile-collections.php?id=<?php echo $profileUserName;?>"> <i class="fa fa-folder fa-3x"></i></a>
        </div>
        <div class="col-md-3  col-xs-3  lv-icons-unclicked  border-right <?php echo ($filename == 'profile-friends' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/profile-friends.php?id=<?php echo $profileUserName;?>"> <i class="fa fa-users fa-3x"></i></a>
        </div>
        <div class="col-md-3  col-xs-3 lv-icons-unclicked <?php echo ($filename == 'profile-circles' ? 'lv-icons-clicked': '' )?>">
            <a href="<?=SITE_ROOT?>/profile-circles.php?id=<?php echo $profileUserName;?>"> <i class="fa fa-circle-o fa-3x"></i></a>
        </div>
    </div>
    <hr />
</div>

<script>


    var acceptButton = document.getElementById('accept-friend-button');
    if (acceptButton != null){
        acceptButton.addEventListener("click", acceptFriendRequest);
    }

        //listener attached to the edit button on load
    var editButton = document.getElementsByClassName("edit-button");
    if (editButton.length > 0){
        editButton.item(0).addEventListener("click", editProfileClick);
    }

    function acceptFriendRequest () {

        var FriendID = this.parentElement.parentElement.parentElement.id;
        //console.log("friend:" + FriendID);
        var requestAcceptButton = this;
        var requestAcceptedButton = requestAcceptButton.nextElementSibling;


        var xhr = new XMLHttpRequest();
        var data = "FriendID=" + FriendID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/processaddfriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                requestAcceptButton.classList.add('accepted');
                requestAcceptedButton.classList.add('accepted');
            } else {
            //    alert("There was a problem with the request.");
            }
        }
    }

    function editProfileClick () {

        //contains the bulk of the info needed, from the header
        var profileInfo = document.getElementsByClassName("container profile-info")[0];

        //contains the Location,Description and ID items
        var locationText = document.getElementsByClassName("profile-info-location")[0].innerHTML.split('&nbsp;');
        locationText = locationText[1];
        var descriptionText = document.getElementsByClassName("profile-info-description")[0].innerHTML;
        var profilePictureID = this.parentElement.id;

        var xhr = new XMLHttpRequest();
        var data = "Location=" + locationText + "&ShortDescrip=" + descriptionText + "&profilePictureID=" + profilePictureID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/editprofile.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        //on edit profile button press, form becomes editable.
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {

                var editProfileForm = xhr.responseText;

                profileInfo.removeChild(profileInfo.childNodes[1]);
                profileInfo.insertAdjacentHTML('afterbegin', editProfileForm);

                //new listener attached to the save button
                var saveButton = document.getElementsByClassName("save-button");
                saveButton.item(0).addEventListener("click", saveProfileClick);

            } else {
            //    alert("There was a problem with the request.");
            }
        }
    }

    function saveProfileClick(){
        //contains the bulk of the info needed, from the header
        var profileInfo = document.getElementsByClassName("container profile-info")[0];

        //contains the required details
        var locationText = document.getElementsByClassName("profile-info-location")[0].value;
        var descriptionText = document.getElementsByClassName("profile-info-description")[0].value;
        var profilePictureID = this.id;

        //console.log("profilePictureID: " + profilePictureID + "\nprofileInfo: " + profileInfo + "\nlocation: " + locationText + "\nDescription:" + descriptionText );

        var data = "Location=" + locationText + "&ShortDescrip=" + descriptionText + "&profilePictureID=" + profilePictureID;

        var xhr = new XMLHttpRequest();
        var data = "Location=" + locationText + "&ShortDescrip=" + descriptionText + "&profilePictureID=" + profilePictureID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/saveprofile.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        //on save, changes are saved to DB and page reverts to original layout with new changes in info
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {

                var savedProfileForm = xhr.responseText;

                profileInfo.removeChild(profileInfo.childNodes[1]);
                profileInfo.insertAdjacentHTML('afterbegin', savedProfileForm);

                //new listener attached to the edit button
                var editButton = document.getElementsByClassName("edit-button");
                editButton.item(0).addEventListener("click", editProfileClick);

            } else {
            //    alert("There was a problem with the request.");
            }
        }
    }


</script>
