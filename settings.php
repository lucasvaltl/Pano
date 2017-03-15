<?php
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <link rel="stylesheet" href="css/offset.css">
        <link rel="stylesheet" href="dropzone.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Settings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://apppanoblob.blob.core.windows.net/assets/favicon.ico">
    <meta property="og:title" content="Pano" />
    <meta property="og:image" content="https://apppanoblob.blob.core.windows.net/assets/ogimage.jpg" />
    <meta property="og:description" content="The social network taking a wider perspective " />
</head>


<body id="gradhome">

    <?php
        require_once('includes/dbconnect.php');
        include('includes/header.php');
        include('includes/validatesettingchange.php');
        include('includes/updateprofilepic.php');

     ?>

    <main>
        <div >
            <br />
            <p>
                <h2>Change Profile Picture:</h2>
            </p>
<div class="drag-in">
            <form action="<?=SITE_ROOT?>/includes/upload.php" class="dropzone dropzone-profilepic" type="post">
                <input type="hidden" name="hashname" value="<?=$_SESSION['UserID']?>">
                <input type="hidden" name="picType" value="profilepics">
                  <div class="dz-message data-dz-message"><span>Drag your new profile picture into here - or click to select</span></div><br>
            </form>
            </div>
            <form action="<?= $_SERVER['PHP_SELF'];?>" method="post" class="padding-top-20 larger-font">
                 <input type="submit" name="confirmPic" class="btn btn-default lv-button" value="Confirm Pic" />
             </form>
<div class="seperator-settings">
      <hr/>
  <div class="seperator-settings-inner">

  </div>
</div>

    <h2>Change Settings:</h2>

<div class="privacy-options drag-in">



                <h3>Privacy Options:</h3>

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group">

                <br />
                <p>
                    <label class="radio-inline"><input type="radio" name="SettingID" value="1"
                        <?php if ($_SESSION['SettingID'] == 1) : ?>checked<?php endif; ?>
                    > &nbsp; &nbsp; Friends Only</label>
                </p>
                <br />
                <p>
                    <label class="radio-inline"><input type="radio" name="SettingID" value="2"
                        <?php if ($_SESSION['SettingID'] == 2) : ?>checked<?php endif; ?>
                    >&nbsp; &nbsp; Friends of Friends</label>
                </p>
                <br />
                <p>
                    <label class="radio-inline"><input type="radio" name="SettingID" value="3"
                        <?php if ($_SESSION['SettingID'] == 3) : ?>checked<?php endif; ?>
                    >&nbsp;  &nbsp; Public</label>
                </p>

                <div class="row">


                    <?php if ($invalid_credentials) : ?>
                    <p class="alert alert-danger">Invalid credentials. Please try again.</p>
                    <?php endif;
                        if ($successful_change) : ?>
                            <p class="alert alert-success fade in">Successfully changed settings.</p>

                    <?php endif;?>

                        <br />
                        <label for="pwd">Please type your password for confirmation:</label>
                        <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password">
                        <br>
                        <h3>Change Password:</h3>
                        <label for="pwd">New Password: (Only type something if you wish to change your password)</label>
                        <input type="password" class="form-control" id="pwd" name="NewPassword" placeholder="Password">
                        <br>
                        <input type="submit" name="submit" class="btn btn-default lv-button" value="Save Settings" />
                        <br />
</div>
                </div>
            </form>

            <div class="larger-font">
                <br />
                <a href="logout.php" type="button" class="btn btn-default lv-button">Sign Out</a>
            </div>



    </main>

    <?php
        include('includes/footer.php');
    ?>

</body>
<script src="dropzone.js"></script>

</html>
