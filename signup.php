<?php
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

if(isset($_SESSION['UserName'])) { //if not yet logged in
   header("Location: home.php");// send to login page
   exit;
   }
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2qniLS_JRqdMIDCuy0L3ac7usMi6fbi4&v=3.exp&sensor=false&libraries=places"></script>
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Pano - Sign Up</title>
</head>

<body id="gradhome">

    <?php

    require_once('includes/dbconnect.php');

    //contains the form validation logic for sign up
    require_once('includes/validatesignup.php');


    ?>


    <div id="left"></div>
    <div id="right"></div>
    <div id="top"></div>
    <div id="bottom"></div>
    <br />
    <br />
    <div class="container content">
        <div>
            <div class="row vertical-align">
                <div class="logo animated zoomIn">
                    <img src="images/logo.png" class="png" id="signuplogo">
                </div>
                <br />

                <div class="form-group questionnaire">
                    <h3>Welcome to Pano! </h3>

                    <h3>  Please answer these questions to get started:</h3>
                    <br />
                    <div class="row">

                        <br>

                        <?php if ($errors || $missing) : ?>
                        <p class="alert alert-danger">Please fix the item(s) indicated</p>
                        <?php endif; ?>

                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="form-group">
                            <label class="signupform" for="usr">What  do you want to be called on Pano?
                                <?php if ($missing && in_array('UserName', $missing)) : ?>
                                    <div class="alert alert-danger">Please enter a User Name!</div>
                                <?php endif;

                                if ($userNameAlreadyExists) : ?>
                                    <div class="alert alert-danger">The User Name you have chosen already exists!</div>
                                <?php elseif ($isUserNameInvalid) : ?>
                                    <div class="alert alert-danger">The User Name you have chosen is invalid. It must be 5-20 characters long, and consist of alphanumeric characters and underscores only.</div>
                                <?php endif; ?>
                            </label>
                            <input type="text" class="form-control" id="usr" name="UserName" placeholder="User Name"
                                <?php
                                if ($errors || $missing) {
                                    echo 'value="' . htmlentities($UserName) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label for="pwd">Please enter a password!
                                <?php if ($missing && in_array('Password', $missing)) : ?>
                                    <div class="alert alert-danger">You forgot to create a password!</div>
                                <?php endif; ?>
                            </label>
                            <input type="password" class="form-control" id="pwd" name="Password" placeholder="Password"
                                <?php
                                if ($errors || $missing) {
                                    echo 'value="' . htmlentities($Password) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label class="signupform" for="usr">What  is you email address?
                                <?php if ($missing && in_array('EmailAddress', $missing)) : ?>
                                    <div class="alert alert-danger">You forgot to add your email address!</div>
                                <?php

                                elseif ($isEmailAddressInvalid) : ?>
                                    <div class="alert alert-danger">This email address is in an invalid format!</div>
                                <?php endif;

                                if ($emailAddressAlreadyExists) : ?>
                                    <div class="alert alert-danger">This email address is already associated with an account!</div>
                                <?php endif; ?>
                            </label>
                            <input type="text" class="form-control" id="usr" name="EmailAddress" placeholder="Email Address"
                                <?php
                                if ($errors || $missing) {
                                    echo 'value="' . htmlentities($EmailAddress) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label class="signupform" for="fname">What  is your first name?
                                <?php if ($missing && in_array('FirstName', $missing)) : ?>
                                    <div class="alert alert-danger">You forgot to add enter your first name!!</div>
                                <?php endif; ?>
                            </label>
                            <input type="text" class="form-control" id="fname" name="FirstName" placeholder="First Name"
                                <?php
                                if ($errors || $missing) {
                                    echo 'value="' . htmlentities($FirstName) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label class="signupform" for="lname">What  is your last name?
                                <?php if ($missing && in_array('LastName', $missing)) : ?>
                                    <div class="alert alert-danger">You forgot to add your last name!</div>
                                <?php endif; ?>
                            </label>
                            <input type="text" class="form-control" id="lname" name="LastName" placeholder="Last Name"
                                <?php
                                if ($errors || $missing) {
                                    echo 'value="' . htmlentities($LastName) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label class="signupform" for="location">Where do you live?
                                <?php if ($missing && in_array('Location', $missing)) : ?>
                                    <div class="alert alert-danger">You forgot to add your location!</div>
                                <?php endif; ?>
                            </label>
                            <input id="searchTextField" type="text" class="form-control" id="location" name="Location" placeholder="Location"
                                <?php
                                if ($errors || $missing) {
                                    echo 'value="' . htmlentities($Location) . '"';
                                }
                                ?>
                            >
                            <br />
                            <label class="signupform" for="description">Tell us a bit about yourself:
                                <?php if ($missing && in_array('ShortDescrip', $missing)) : ?>
                                    <div class="alert alert-danger">Say something!</div>
                                <?php endif; ?>
                            </label>
                            <textarea type="selection" class="form-control" rows="5" maxlength="150" id="description" name="ShortDescrip" placeholder="Who are you? What is it that makes you you?"><?php
                                if ($errors || $missing) {
                                    echo htmlentities($ShortDescrip);
                                }
                                ?></textarea>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default lv-button" value="Sign Up" />
                        </form>

                        <br>
                        <div class="login-help">
                            <a href="login.php">Already a member? Log in over <div class="underline">
                              here!
                            </div></a>
                        </div>
                        <script type="text/javascript">
                        function initialize() {

                        var input = document.getElementById('searchTextField');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
