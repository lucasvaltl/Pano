<?php

$missing = [];
$errors = [];
$fail_count = 0;

if (isset($_POST['create'])) {

  $expected = ['CreatorID', 'PhotoID', 'GroupName', 'ShortDescrip'];
  $required = ['CreatorID', 'PhotoID', 'GroupName', 'ShortDescrip'];
  $CreatorID= mysqli_real_escape_string($conn, $_POST['CreatorID']);
  $PhotoID= mysqli_real_escape_string ($conn, $_POST['PhotoID']);
  $GroupName= mysqli_real_escape_string ($conn, $_POST['GroupName']);
  $ShortDescrip = mysqli_real_escape_string ($conn, $_POST['ShortDescrip']);


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

  //refrain from uploading a post without a picture. Variable pictureUploaded is set to true if the uploading worked
  if(!isset($_SESSION['uploadSuccessful'] ) && $_SESSION['uploadSuccessful'] != true){
  $missing[]  = 'Picture';
  $fail_count++;
  }

  //reset upload successfull if  the picture actually uploaded
  $_SESSION['uploadSuccessful'] = false;




//convert the the keys  from the post array that store the postIDs into an array of members. This is a hack that needed to be done given in order to make the front end look pretty and in order to have several independent checkboxes in the form.
  $keys = array_keys($_POST);
  $count = 5;
  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $members[] = $_POST[$keys[$count]];
    $count++;
  }
  $members[] = $CreatorID;



  // If no errors detected, insert message into database
if ($fail_count == 0){
      $_SESSION['PhotoID']= $PhotoID;

    if(!$stmt = $conn->prepare("INSERT INTO groups (CreatorID, PhotoID, GroupName, ShortDescrip ) VALUES (?,?,?,?)")){
        echo "Prepare failed: (". $conn->errno .")" . $conn->error;
    }

    if(!$stmt->bind_param("isss", $CreatorID, $PhotoID, $GroupName, $ShortDescrip)){
        echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
    }

    if (!$stmt->execute()) {
      die('Error: ' . mysqli_error($conn));
    }  else {

      //look for groupID of newly created group
      $query = "SELECT MAX(GroupID) as GroupID FROM groups WHERE CreatorID='$CreatorID' ";
      $result =  mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
      $row =  mysqli_fetch_array($result);
      if($count === 1){
        $GroupID = $row['GroupID'];
        foreach ($members as $member){
          $query= "INSERT INTO usergroupmapping (GroupID, UserID) VALUES ('$GroupID', '$member')";
          if(!mysqli_query($conn, $query)){
            die('Error in accessing the groups page' . mysqli_error($conn));
            exit();
          }

        }
              header("Location: circle-messages.php?GroupID=". urlencode($GroupID));
      } else {
        die('Error in accessing the groups page' . mysqli_error($conn));
              exit();


      exit();
    }
  }
}
}

?>
