<?php

$missing = [];

if (isset($_POST['create'])) {

  $expected = ['CreatorID', 'PicID', 'GroupName', 'ShortDescrip'];
  $required = ['CreatorID', 'PicID', 'GroupName', 'ShortDescrip'];
  $CreatorID= mysqli_real_escape_string($conn, $_POST['CreatorID']);
  $PicID= mysqli_real_escape_string ($conn, $_POST['PicID']);
  $GroupName= mysqli_real_escape_string ($conn, $_POST['GroupName']);
  $ShortDescrip = mysqli_real_escape_string ($conn, $_POST['ShortDescrip']);

  $keys = array_keys($_POST);
  $count = 5;
  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $members[] = $_POST[$keys[$count]];
    $count++;
  }
  $members[] = $CreatorID;
  // check for errors
  if (!isset($CreatorID) || $CreatorID == '' || !isset($PicID) || $PicID == '' ||  !isset($GroupName) ||$GroupName == '' || !isset($ShortDescrip) || $ShortDescrip == ''  ) {
    //needs to be improved
    $error = "Not all required fields have been filled in";
    header("Location: circle-creation.php?error=" . urlencode($error));
    exit();
  }
  // If no errors detected, insert message into database
  else{
    $query = "INSERT INTO groups (CreatorID, PhotoID, GroupName, ShortDescrip ) VALUES ('$CreatorID', '$PicID', '$GroupName', '$ShortDescrip')";
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
