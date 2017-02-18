<?php


$errors = [];
$missing = [];

//will be used to toggle check email address and username validity
$isEmailAddressInvalid = false;
$emailAddressAlreadyExists = false;
$userNameAlreadyExists = false;


//sign up only goes through initial check if there are no errors or missing fields
$fail_count = 0;


//this part runs when the user clicks the sign up button at the bottom of page
if (isset($_POST['submit'])) {


    //the expected and required fields

    $expected = ['FirstName', 'LastName', 'UserName', 'EmailAddress', 'Password', 'Location', 'ShortDescrip'];
    $required = ['FirstName', 'LastName', 'UserName', 'EmailAddress', 'Password', 'Location', 'ShortDescrip'];


    //mysqli_real_escape_string for safety measures against SQL injection
    $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $EmailAddress = mysqli_real_escape_string($conn, $_POST['EmailAddress']);
    $Password = mysqli_real_escape_string ($conn, $_POST['Password']);
    $Location = mysqli_real_escape_string($conn, $_POST['Location']);
    $ShortDescrip = mysqli_real_escape_string($conn, $_POST['ShortDescrip']);


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

    //checking if email address is valid
    if (!filter_var($EmailAddress, FILTER_VALIDATE_EMAIL)) {
        $isEmailAddressInvalid = true;
        $fail_count++;
        $errors[] = $EmailAddress;
    } else {
        $isEmailAddressValid = false;
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

    $query = "INSERT INTO user (FirstName, LastName, UserName, EmailAddress, Password, Location, ShortDescrip)
    VALUES ('$FirstName', '$LastName', '$UserName', '$EmailAddress', '$Password', '$Location', '$ShortDescrip')";

    if (mysqli_query($conn, $query)) {
        echo "New record created successfully";

        header("Location: home.php");

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

 ?>
