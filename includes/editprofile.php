<?php

ob_start();

session_start();

require_once('dbconnect.php');

require_once('config.php');

$ShortDescrip = $_POST['ShortDescrip'];

$Location = $_POST['Location'];

$profilePictureID = $_POST['profilePictureID'];

echo '
<div class="row ">
    <div class="col col-md-3 col-xs-3 profile-info-row">
        <img src="https://apppanoblob.blob.core.windows.net/profilepics/'.$profilePictureID.'.jpg" class="img-circle img-responsive profile-user-picture " />
    </div>
    <div class="col col-md-6  col-xs-6 container">
        <p class="profile-info-name">
            <h3>' . $_SESSION['UserName']. '</h3>
        </p>

        <i class="fa fa-map-marker fa-lg"></i>&nbsp;
        <input class="profile-info-location location form-control profile-edit-input  profile-edit-location"  type="text" name="Location" value="' .$Location . '" id="location" placeholder="Location e.g. (London, England)"
        />

        <input class="profile-info-description descripton-text-box form-control profile-edit-input" size="50%" type="text" name="ShortDescrip" value="' .$ShortDescrip . '" placeholder="Description (140 characters max)"
         />

    </div>


    <div class="col col-md-3 col-xs-3 profile-info-row">
            <button type="submit" class="btn btn-default pull-right save-button" id="'.$profilePictureID .'"><span class="glyphicon glyphicon-floppy-save "></span>&nbsp;&nbsp;Save Changes </button>
    </div>
</div>

'

?>
