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
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Settings</title>
</head>


<body id="gradhome">

    <?php
        require_once('includes/dbconnect.php');
        include('includes/header.php');
        include('includes/validatesettingchange.php');

     ?>

    <main>
        <div class="center-center">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group">
                <p>
                    <h2>Privacy Options:</h2>
                </p>
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


                <br />
                <br />
                <br />

                <div class="row">

                    <br>

                    <?php if ($invalid_credentials) : ?>
                    <p class="alert alert-danger">Invalid credentials. Please try again.</p>
                    <?php endif;
                        if ($successful_change) : ?>
                            <p class="alert alert-success fade in">Successfully changed settings.</p>

                    <?php endif;?>

                        <br />
                        <label for="pwd">Please Confirm your Current Password for Settings to Update:</label>
                        <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password">
                        <br>
                        <label for="pwd">New Password: (Only type something if you wish to change your password)</label>
                        <input type="password" class="form-control" id="pwd" name="NewPassword" placeholder="Password">
                        <br>
                        <input type="submit" name="submit" class="btn btn-default lv-button" value="Save Settings" />
                        <br />

                </div>
            </form>

            <div class="submitt-buttons">
                <br />
                <a href="logout.php" type="button" class="btn btn-default lv-button">Sign Out</a>
            </div>



    </main>

    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
