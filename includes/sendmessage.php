<?php

$missing = [];
$invalid_credentials = false;

if (isset($_POST['submit'])) {

  $expected = ['UserID', 'GroupID', 'Content'];
  $required = ['UserID', 'GroupID', 'Content'];
  $UserID= mysqli_real_escape_string($conn, $_POST['UserID']);
  $GroupID= mysqli_real_escape_string ($conn, $_POST['GroupID']);
  $Content= mysqli_real_escape_string ($conn, $_POST['Content']);

// check for errors
  if (!isset($UserID) || $UserID == '' || !isset($Content) || $Content == '' ||  !isset($GroupID) ||$GroupID == '' ) {
    $error = "Please fill in a message"; header("Location: circle-messages.php?error=" . urlencode($error) . "&GroupID=". urlencode($GroupID));
    exit();
  }
// If no errors detected, insert message into database
  else{
    $query = "INSERT INTO messages (UserID, GroupID, Content ) VALUES ('$UserID', '$GroupID', '$Content')";
    if (!mysqli_query($conn, $query)) {
      die('Error: ' . mysqli_error($conn)); }
      else {
        header("Location: circle-messages.php?GroupID=". urlencode($GroupID));
        exit();
      }
    }
  }

    ?>
