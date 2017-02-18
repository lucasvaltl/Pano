<?php
//ob_start needed to allow redirecting after login
ob_start();

    session_start();
    session_destroy();

    include('includes/config.php');

    header("Location:" . SITE_ROOT . "/login.php");
    exit;
 ?>
