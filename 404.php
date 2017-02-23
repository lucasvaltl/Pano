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
    include('includes/header.php');
     ?>


    <div id="left"></div>
    <div id="right"></div>
    <div id="top"></div>
    <div id="bottom"></div>
    <div class="container content center-center ">


        <h2>404 Page Not Found!</h2>

        <br>

        <h3>Oops!</h3>

        <br>

        <h4>Nothing Panoramic to see here!</h4>

        <br>

        <button class="btn btn-primary btn-info" onclick="goBack()"><span class="glyphicon glyphicon-hand-left"></span>&nbsp;&nbsp;Go Back</button>

        <script>
        function goBack() {
            window.history.back();
        }
        </script>


    </div>
</body>

<?php
include('includes/footer.php');
 ?>



</html>
