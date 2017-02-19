<?php

$missing = [];
$invalid_credentials = false;

if (isset($_POST['submit'])) {

    $expected = ['UserName', 'Password'];
    $required = ['UserName', 'Password'];
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $Password = mysqli_real_escape_string ($conn, $_POST['Password']);

    $query = "SELECT * FROM user WHERE UserName = '$UserName'";

    if ($result = mysqli_query($conn, $query)) {

        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        //if there is only one entry matching a username (sanity check) and the password matches
        if ($count == 1 && password_verify($Password, $row['Password'])){
            $_SESSION['UserName'] = $UserName;
            $invalid_credentials = true;
            header("Location: home.php");
        } else {
            $invalid_credentials = true;
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

 ?>
