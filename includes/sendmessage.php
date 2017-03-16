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

    if(!$stmt = $conn->prepare("INSERT INTO messages (UserID, GroupID, Content ) VALUES (?,?,?)")){
        echo "Prepare failed: (". $conn->errno .")" . $conn->error;
    }

    if(!$stmt->bind_param("iis", $UserID, $GroupID, $Content)){
        echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
    }

    if (!$stmt->execute()) {
      die('Error: ' . mysqli_error($conn)); }
      else {
        $stmt->close();
        header("Location: circle-messages.php?GroupID=". urlencode($GroupID));
        exit();
      }
    }
  }

    ?>
