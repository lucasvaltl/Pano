<?php


$errors = [];
$missing = [];

//will be used to toggle check email address and username validity
$isEmailAddressInvalid = false;
$emailAddressAlreadyExists = false;
$isUserNameInvalid = false;
$userNameAlreadyExists = false;


//sign up only goes through initial check if there are no errors or missing fields
$fail_count = 0;


//this part runs when the user clicks the sign up button at the bottom of page
if (isset($_POST['submit'])) {


    //the expected and required fields

    $expected = ['FirstName', 'LastName', 'UserName', 'EmailAddress', 'Password', 'Location', 'ShortDescrip', 'LegalCheck'];
    $required = ['FirstName', 'LastName', 'UserName', 'EmailAddress', 'Password', 'Location', 'ShortDescrip', 'LegalCheck'];


    //mysqli_real_escape_string for safety measures against SQL injection
    $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $EmailAddress = mysqli_real_escape_string($conn, $_POST['EmailAddress']);
    $Password = mysqli_real_escape_string ($conn, $_POST['Password']);
    $Location = mysqli_real_escape_string($conn, $_POST['Location']);
    $ShortDescrip = mysqli_real_escape_string($conn, $_POST['ShortDescrip']);
    if(isset($_POST['LegalCheck'])){
          $LegalCheck = mysqli_real_escape_string($conn, $_POST['LegalCheck']);
    }



    //TODO come back when server is up
    /*
    $to = $EmailAddress;
    $subject = "Welcome to Pano!";
    $message = "Why are you reading this email for? Get uploading your amazing Panorama photos and find your friends!";



    $headers = [];
    $headers[] = 'From: likoxie@gmail.com';
    $headers[] = 'Cc: likoxie@gmail.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    */



    //checking if fields are missing
    foreach ($_POST as $key => $value) {
        $value = is_array($value) ? $value : trim($value);

        if (empty($value) && in_array($key, $required)) {
            $missing[] = $key;
            $$key = '';
            $fail_count++;
        } elseif (in_array($key, $expected)) {
            $$key = $value;
        }
    }

//add legal check to missing if it is not set - due to nature of how php POST processes checkboxes
    if(!isset($LegalCheck)){
      $missing[] = 'LegalCheck';
      $fail_count++;
    }

    //checking if email address is valid
    if (!filter_var($EmailAddress, FILTER_VALIDATE_EMAIL)) {
        $isEmailAddressInvalid = true;
        $fail_count++;
        $errors[] = $EmailAddress;
    } else {
        $isEmailAddressValid = false;
    }

    //checking if username is validation

    if (preg_match('/^[a-z\d_]{4,20}$/i', $UserName)) {
        $isUserNameInvalid = false;
    } else {
        $isUserNameInvalid = true;
        $fail_count++;
        $errors [] = $UserName;
    }

    //checking if username is already taken or not by a different user
    if (!empty($EmailAddress)) {
        $query = mysqli_query($conn, "SELECT * FROM user WHERE EmailAddress = '$_POST[EmailAddress]'");
        if (!$row = mysqli_fetch_assoc($query)) {
            $emailAddressAlreadyExists = false;
        } else {
            //var_dump($row);
            $emailAddressAlreadyExists = true;
            $fail_count++;
            $errors[] = $EmailAddress;
        }
    }


    //checking if username is already taken or not by a different user
    if (!empty($UserName)) {
        $query = mysqli_query($conn, "SELECT * FROM user WHERE UserName = '$_POST[UserName]'");
        if (!$row = mysqli_fetch_assoc($query)) {
            $userNameAlreadyExists = false;
        } else {
            //var_dump($row);
            $userNameAlreadyExists = true;
            $fail_count++;
            $errors[] = $UserName;
        }
    }

    if ($fail_count == 0){
        AddNewUser($conn, $FirstName, $LastName, $UserName, $EmailAddress, $Password, $Location, $ShortDescrip);
    }

}

function AddNewUser($conn, $FirstName, $LastName, $UserName, $EmailAddress, $Password, $Location, $ShortDescrip) {

    //hashing the passwords so that they are stored securely
    $Password = password_hash($Password, PASSWORD_DEFAULT);

    //prepared statement to handle queries containing user input properly

    if(!$stmt = $conn->prepare("INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip) VALUES (?,?,?,?,?,?,?)")){
        echo "Prepare failed: (". $conn->errno .")" . $conn->error;
    }

    if(!$stmt->bind_param("sssssss", $FirstName, $LastName, $UserName, $EmailAddress, $Password, $Location, $ShortDescrip)){
        echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
    }

    if ($stmt->execute()) {
        echo "New record created successfully";


        //welcome email can be sent
        //TODO MAKE SURE TO DO THIS WHEN THE SERVER IS ONLINE
        //mail($to, $subject, $message, implode("\r\n", $headers));


        $_SESSION['UserName'] = $UserName;

        $query = "SELECT * FROM user WHERE UserName = '{$_SESSION['UserName']}'";
        //SettingID set to 3 to correspond with the default SettingID upon creation of new user

        if ($result = mysqli_query($conn, $query)) {

            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);

            //if there is only one entry matching a username (sanity check) and the password matches
            if ($count == 1){
                $_SESSION['UserID'] = $row['UserID'];
                $_SESSION['FirstName'] = $row['FirstName'];
                $_SESSION['LastName'] = $row['LastName'];
                $_SESSION['Location'] = $row['Location'];
                $_SESSION['ShortDescrip'] = $row['ShortDescrip'];
                $_SESSION['SettingID'] = $row['SettingID'];
                $_SESSION['ProfilePictureID'] = $row['ProfilePictureID'];
                $_SESSION['SearchTerm'] = null;

                $query2 = "INSERT INTO friendrecommendations (UserID) VALUES ('{$_SESSION['UserID']}')";

                if ($result2 = mysqli_query($conn, $query2)) {
                    header("Location: home.php");
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }

            }
            $stmt->close();
        }

    } else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
}

 ?>
