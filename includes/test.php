

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
                <input class="form-control collection-name-input" type='text' name="Location" value="<?=$profileUserLocation?>" placeholder="Location e.g. (London, England)"
                ng-style="{'width': (Location.length == 0 ? '320': ((Location.length*9))) + 'px'}" ng-model="Location"/>
            </p>
            <p class="profile-info-description">
                <input class="descripton-text-box form-control collection-name-input" width="50%" type='text' name="ShortDescrip" value="<?=$profileUserDescription?>" placeholder="Description (140 characters max)"
                ng-style="{'width': (ShortDescrip.length == 0 ? '320': ((ShortDescrip.length*9))) + 'px'}" ng-model="ShortDescrip" />
            </p>
        </div>


        <div class="col col-md-3 col-xs-3 profile-info-row">
                <button type="submit" class="btn btn-default pull-right edit-button"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;Save Changes </button>
        </div>
    </div>
