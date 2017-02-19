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
    <!--<title>Pano - Settings</title>-->
</head>

<head>
<title>Pano yolo</title>
</head>

<body id="gradhome">

    <?php
        require_once('includes/dbconnect.php');
        include('includes/header.php');
     ?>

    <main>

        <div class="center-center">
            <div class="form-group">
                <p>
                    <h2>Privacy Options:</h2>
                </p>
                <br />
                <p>
                    <label class="checkbox-inline"><input type="checkbox" value=""> &nbsp; &nbsp; Option 1</label>
                </p>
                <br />
                <p>
                    <label class="checkbox-inline"><input type="checkbox" value="">&nbsp; &nbsp; Option 1</label>
                </p>
                <br />
                <p>
                    <label class="checkbox-inline"><input type="checkbox" value="">&nbsp;  &nbsp; Option 1</label>
                </p>

                <br />
                <br />
                <br />
                <div class="submitt-buttons">
                    <a href="#" type="button" class="btn btn-default lv-button">Save Settings</a>
                    <br />
                    <br />
                    <br />
                    <a href="logout.php" type="button" class="btn btn-default lv-button">Sign Out</a>
                </div>
            </div>
        </div>

    </main>

    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
