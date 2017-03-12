<?php

$missing = [];

if (isset($_POST['create'])) {

  $expected = ['CreatorID', 'PhotoID', 'GroupName', 'ShortDescrip'];
  $required = ['CreatorID', 'PhotoID', 'GroupName', 'ShortDescrip'];
  $CreatorID= mysqli_real_escape_string($conn, $_POST['CreatorID']);
  $PhotoID= mysqli_real_escape_string ($conn, $_POST['PhotoID']);
  $GroupName= mysqli_real_escape_string ($conn, $_POST['GroupName']);
  $ShortDescrip = mysqli_real_escape_string ($conn, $_POST['ShortDescrip']);

//convert the the keys  from the post array that store the postIDs into an array of members. This is a hack that needed to be done given in order to make the front end look pretty and in order to have several independent checkboxes in the form.
  $keys = array_keys($_POST);
  $count = 5;
  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $members[] = $_POST[$keys[$count]];
    $count++;
  }
  $members[] = $CreatorID;
  // check for errors
  if (!isset($CreatorID) || $CreatorID == '' || !isset($PhotoID) || $PhotoID == '' ||  !isset($GroupName) ||$GroupName == '' || !isset($ShortDescrip) || $ShortDescrip == ''  ) {
    //needs to be improved
    $error = "Not all required fields have been filled in";
    header("Location: circle-creation.php?error=" . urlencode($error));
    exit();
  }
  // If no errors detected, insert message into database
  else{
      $_SESSION['PhotoID']= $PhotoID;
    $query = "INSERT INTO groups (CreatorID, PhotoID, GroupName, ShortDescrip ) VALUES ('$CreatorID', '$PhotoID', '$GroupName', '$ShortDescrip')";
    if (!mysqli_query($conn, $query)) {
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
