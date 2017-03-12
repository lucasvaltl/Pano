<?php

ob_start();

session_start();

require_once('dbconnect.php');

require_once('config.php');

$profileUserDescription = $_POST['ShortDescrip'];

$profileUserLocation = $_POST['Location'];

$profilePictureID = $_POST['profilePictureID'];

$query= "UPDATE user
            SET ShortDescrip = '$profileUserDescription',
            Location = '$profileUserLocation'
            WHERE userID = '{$_SESSION['UserID']}'";

if (mysqli_query($conn, $query)) {
    echo '
    <div class="row ">
        <div class="col col-md-3 col-xs-3 profile-info-row">
            <img src="https://apppanoblob.blob.core.windows.net/profilepics/'.$profilePictureID.'.jpg" class="img-circle img-responsive profile-user-picture " />
        </div>
        <div class="col col-md-6  col-xs-6 container">
            <p class="profile-info-name">
                <h3>'.$_SESSION['UserName'].'</h3>
            </p>
            <p class="profile-info-location location"><i class="fa fa-map-marker fa-lg"></i>&nbsp;' .$profileUserLocation.'</p>
            <p class="profile-info-description"> '.$profileUserDescription.'</p>
        </div>

        <div class="col col-md-3 col-xs-3 profile-info-row" id="'.$profilePictureID.'">

                <button type="button" class="btn btn-default pull-right edit-button"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Edit Profile </button>

        </div>
    </div>';

} else {
    //echo "Error: " . $query . "<br>" . mysqli_error($conn);

}




?>
