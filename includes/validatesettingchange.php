<?php

$invalid_credentials = false;
$successful_change = false;

if (isset($_POST['submit'])) {

    $Password = mysqli_real_escape_string ($conn, $_POST['Password']);
    $NewPassword = mysqli_real_escape_string($conn, $_POST['NewPassword']);
    $SettingID = $_POST['SettingID'];

    //Extracting relevant data for the logged in user
    $query = "SELECT * FROM user WHERE UserName = '{$_SESSION['UserName']}'";

    if ($result = mysqli_query($conn, $query)) {

        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        //if there is only one entry matching a username (sanity check) and the password matches
        if ($count == 1 && password_verify($Password, $row['Password'])){

            //Different queries depending on whether user decides to change their password
            if (!empty($NewPassword)){
                $NewPassword = password_hash($NewPassword, PASSWORD_DEFAULT);
                $query = "UPDATE user SET Password='$NewPassword' AND SettingID='$SettingID' WHERE UserName='{$_SESSION['UserName']}'";
            } else {
                $query = "UPDATE user SET SettingID='$SettingID' WHERE UserName='{$_SESSION['UserName']}'";
            }

            if ($SettingChange = mysqli_query($conn, $query)) {
                $successful_change = true;
                $_SESSION['SettingID'] = $SettingID;
            } else {
                $successful_change = false;
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }

            $invalid_credentials = false;

        } else {
            $invalid_credentials = true;
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

 ?>