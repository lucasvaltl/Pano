<?php
//ob_start needed to allow redirecting after login
ob_start();

    session_start();
    session_destroy();

    $date_of_expiry = time() - 60;
    setcookie("userlogin", "anon", $date_of_expiry, "/", "panoapp.co.uk");

    include('includes/config.php');

    header("Location:" . SITE_ROOT . "/login.php");
    exit;
 ?>
