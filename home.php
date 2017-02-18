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
    <title>Pano - Newsfeed</title>
</head>

<body>


    <?php
        require_once('includes/dbconnect.php');

        //of user is not uet logged in, redirect them to the login page
        if(!isset($_SESSION['UserName'])) { //if not yet logged in
           header("Location: login.php");// send to login page
           exit;
        }
      ?>
    <div>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">

                <!-- profile picture top left corner -->
                <div class="pull-left navbar-text">
                    <img class="profile-picture" src="http://lorempixel.com/40/40/people">
                    <?= $_SESSION['UserName'];?>
                </div>


                <div class="container">
                    <div class="logo center-center">
                        <a href="home.php"><img src="images/gradient-logo.png" class="png" id="homepagelogo"></a>
                    </div>
                </div>
            </nav>
        </header>

    </div>
    <main>

        <div class="post">
            <div class="post-picture row">
                <img src="images/panoramas/IMG_8937.jpg" class="panorama">
            </div>

            <div class="post-meta row">
                <div class="post-user-picture col-md-2 col-xs-2">
                    <a href="profile.php"><img src="images/profilepics/1.jpg" class="profile-picture" /> </a>
                </div>
                <div class="post-user-name col-md-2 col-xs-2">
                    <a href="profile.php"><h3>theodor_92</h3></a>
                </div>
                <div class="post-content col-md-7 col-md-offset-1 col-xs-6 col-xs-offset-2">
                    <div class="post-location">
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>&nbsp; Austria
                        </p>
                    </div>
                    <div class="post-description">
                        <p>
                            Just wow - #sunset #blownaway
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="post">
            <div class="post-picture row">
                <img src="images/panoramas/IMG_2821.jpg" class="panorama">
            </div>

            <div class="post-meta row">
                <div class="post-user-picture col-md-2 col-xs-2">
                    <a href="profile.php"><img src="images/profilepics/2.jpg" class="profile-picture" /> </a>
                </div>
                <div class="post-user-name col-md-2 col-xs-2">
                    <a href="profile.php"><h3>clairethemayor<?php echo $_SERVER['HTTP_HOST'];?></h3></a>
                </div>
                <div class="post-content col-md-7 col-md-offset-1 col-xs-6 col-xs-offset-2">
                    <div class="post-location">
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>&nbsp; Iguaçu, Brazil
                        </p>
                    </div>
                    <div class="post-description">
                        <p>
                            haha love going into the wild!!!!! #neverlookback
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="post continer">
            <div class="post-picture">
                <img src="images/panoramas/IMG_6346.jpg" class="panorama">
            </div>

            <div class="post-meta row align-items-center">
                <div class="post-user-picture col-md-2 col-xs-2">
                    <a href="profile.php"><img src="images/profilepics/3.jpg" class="profile-picture" /> </a>
                </div>
                <div class="post-user-name col-md-2 col-xs-2">
                    <p class="user-name-text">
                        <a href="profile.php"><h3>averagejudy</h3></a>
                    </p>
                </div>
                <div class="post-content col-md-7 col-md-offset-1 col-xs-6 col-xs-offset-2">
                    <div class="post-location">
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>&nbsp; London, UK
                        </p>
                    </div>
                    <div class="post-description">
                        <p>
                            My favorite City!
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <footer>
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-15 col-xs-15   lv-icons">
                        <a href="home.php"> <i class="fa fa-newspaper-o fa-3x"></i></a>
                    </div>
                    <div class="col-md-15  col-xs-15  lv-icons">
                        <a href="circles.php"> <i class="fa fa-circle-thin fa-3x"></i></a>
                    </div>
                    <div class="col-md-15  col-xs-15  lv-icons">
                        <a href="upload.php"> <i class="fa fa-camera fa-3x"></i></a>
                    </div>
                    <div class="col-md-15  col-xs-15 lv-icons">
                        <a href="profile.php"> <i class="fa fa-user-o fa-3x"></i></a>
                    </div>
                    <div class="col-md-15  col-xs-15 lv-icons">
                        <a href="settings.php"> <i class="fa fa-sliders fa-3x"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </footer>

</body>

</html>
