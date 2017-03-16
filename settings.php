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
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
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
<br />
<br />
<h4>About:</h4>
<div class="container about">
  <p>
  Pano is a social network that takes a wider perspective. It is specifically tailerd towards enjoying panoaramic pictures in a desktop environment.  This website was created by Johannes Landgraf, Florian Obst, Li Xie and Lucas Valtl as part of a coursework requirement for the COMPGC06 Course taken at University College London. It is currently in a proof of concept stage. None of the features, or the site itself, are guaranteed to work. Should the site be unexpectedly be down, it is presumably because we have run out hosting credits..;)
  </p>
</div>
<br />
<h5> Disclaimer: </h5>

<div class="container">

<div class="legal-policy">

<p>
  The information contained in this website is for general information purposes only. The information is provided by Johannes Landgraf, Florian Obst, Li Xie and Lucas Valtl ("we", "us") and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.
</p>
<p>
  In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.
  Through this website you are able to link to other websites which are not under the control of us We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
</p>
<p>
    Every effort is made to keep the website up and running smoothly. However, we take no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues.
</p>

</div>
</div>


    </main>

    <?php
        include('includes/footer.php');
    ?>

</body>
<script src="dropzone.js"></script>

</html>
