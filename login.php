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
    <title>Pano - Log In</title>
</head>

<body id="gradhome">

    <?php

    require_once('includes/dbconnect.php');
    require_once('includes/validatelogin.php');

//THIS IF STATEMENT IS TEMPORARY

    if (isset($_SESSION['UserName'])) {
        $UserName = $_SESSION['UserName'];
        echo "Hi there $UserName";
    }

     ?>


    <div id="left"></div>
    <div id="right"></div>
    <div id="top"></div>
    <div id="bottom"></div>
    <div class="container content center-center ">
        <div>
            <div class="row vertical-align">
                <div class="logo">
                    <img src="images/logo.png" class="png" id="loginlogo">
                </div>
                <br />
                <br />
                <br />
                <div class="form-group">
                    <h2>Login to your account:</h2>
                    <br />
                    <div class="row">

                        <br>

                        <?php if ($invalid_credentials) : ?>
                        <p class="alert alert-danger">Invalid credentials. Please try again.</p>
                        <?php endif; ?>

                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group">
                            <label for="usr">User Name:</label>
                            <input type="text" class="form-control" id="usr" name="UserName" placeholder="User Name"
                                <?php
                                if ($invalid_credentials) {
                                    echo 'value="' . htmlentities($UserName) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password">
                            <br>
                            <input type="submit" name="submit" class="btn btn-default lv-button" value="Log In" />
                        </form>

                        <br />
                        <div class="login-help">
                            <a href="signup.php">Not a member yet? <div class="underline">
                              Sign Up!
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
