<?php

    //loads up the user information for the current profile page
    $query = "SELECT * FROM user WHERE UserName = '$profileUserName'";

    if ($result = mysqli_query($conn, $query)) {

        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($count == 1 ){
            $profilePictureID = 1;
            $profileUserID = $row['UserID'];
            $profileUserFirstName = $row['FirstName'];
            $profileUserLastName = $row['LastName'];
            $profileUserLocation = $row['Location'];
            $profileUserDescription = $row['ShortDescrip'];

        } else {
            header("Location: 404.php");
        }
    }

    //checks to see if the logged in user is friends with the page of the current user profile,
    //as long as not viewing own profile page. Subsequently affects visibility of either add or remove friend buttons
    $are_we_friends = false;

    if ($_SESSION['UserName'] != $profileUserName) {

        $query = "SELECT * FROM friends WHERE
                    UserID = '$profileUserID' AND FriendID = '{$_SESSION['UserID']}'
                    OR
                    UserID = '{$_SESSION['UserID']}' AND FriendID = '$profileUserID'";

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
 ?>

<div class="container profile-info">

    <div class="row ">
        <div class="col col-md-3 col-xs-3 profile-info-row">
            <img src="<?=SITE_ROOT?>/images/profilepics/<?=$profilePictureID?>.jpg" class="img-circle img-responsive profile-user-picture " />
        </div>
        <div class="col col-md-6  col-xs-6 container">
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



        <div class="col col-md-3 col-xs-3 profile-info-row" id="<?=$profilePictureID?>">
            <?php if ($_SESSION['UserName'] == $profileUserName) : ?>
                <button type="button" class="btn btn-default pull-right edit-button"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit Profile </button>
            <?php elseif ($are_we_friends) :?>
                <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Remove Friend </button>
            <?php else :?>
                <button type="button" class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add Friend </button>
            <?php endif;?>
        </div>
    </div>






    <hr />
</div>

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
    function editProfileClick () {

        var profilePictureID = this.parentElement.id;
        console.log("profilePictureID:" + profilePictureID);

        //contains the bulk of the info needed, from the header
        var profileInfo = document.getElementsByClassName("container profile-info")[0].firstChild;
        console.log("profileInfo:" + profileInfo);

        //contains the Location string
        var locationText = document.getElementsByClassName("profile-info-location")[0].innerHTML.split('&nbsp;');
        console.log("locationField: " + locationText[1]);

        //contains the Description string
        var descriptionText = document.getElementsByClassName("profile-info-description")[0].innerHTML;
        console.log("descriptionText: " + descriptionText);

        var xhr = new XMLHttpRequest();
        var data = "Location=" + locationText + "&ShortDescrip=" + descriptionText + "&profilePictureID=" + profilePictureID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/editprofile.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {




                profileInfo.removeChild(profileInfo);

                var editProfileForm = xhr.responseText;
                console.log(editProfileForm);



                profileInfo.insertAdjacentHTML('beforeend', editProfileForm);
                var saveButton = document.getElementsByClassName("save-button");
                saveButton.item(0).addEventListener("click", saveProfileClick);

            //    profileInfo.replaceChild(profileInfo, editProfileForm);
                //profileInfo.insertAdjacentHTML('beforeend', editProfileForm);

            } else {
            //    alert("There was a problem with the request.");
            }

        }


    }

    function saveProfileClick(){
        console.log('yolo');
    }

    var editButton = document.getElementsByClassName("edit-button");
    editButton.item(0).addEventListener("click", editProfileClick);

</script>
