<?php

$missing = [];
$invalid_credentials = false;

if (isset($_POST['submit'])) {

    $expected = ['UserName', 'Password'];
    $required = ['UserName', 'Password'];
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $Password = mysqli_real_escape_string ($conn, $_POST['Password']);


    if(!$stmt = $conn->prepare("SELECT * FROM user WHERE UserName = ?")){
        echo "Prepare failed: (". $conn->errno .")" . $conn->error;
    }

    if(!$stmt->bind_param("s", $UserName)){
        echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
    }

    if ($stmt->execute()) {

        $result = $stmt->get_result();



        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        //if there is only one entry matching a username (sanity check) and the password matches
        if ($count == 1 && password_verify($Password, $row['Password'])){
            $_SESSION['UserID'] = $row['UserID'];
            $_SESSION['UserName'] = $UserName;
            $_SESSION['FirstName'] = $row['FirstName'];
            $_SESSION['LastName'] = $row['LastName'];
            $_SESSION['Location'] = $row['Location'];
            $_SESSION['ShortDescrip'] = $row['ShortDescrip'];
            $_SESSION['SettingID'] = $row['SettingID'];
            $_SESSION['ProfilePictureID'] = $row['ProfilePictureID'];
            $_SESSION['SearchTerm'] = null;
            $invalid_credentials = false;

            $date_of_expiry = time() + (60 * 60 * 24 * 30);
            setcookie("userlogin", "anon", $date_of_expiry, "/", "panoapp.co.uk");

            header("Location: home.php");
        } else {
            $invalid_credentials = true;
        }

        $stmt->close();
    } else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
}

 ?>
