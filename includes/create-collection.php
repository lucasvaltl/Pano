<?php

$missing = [];

if (isset($_POST['create'])) {

  $expected = ['OwnerName',  'GroupID', 'Caption'];
  $required = ['OwnerName',   'Caption'];
  $OwnerName = mysqli_real_escape_string($conn, $_POST['OwnerName']);
  if(isset($_POST['GroupID'])){
      $GroupID= mysqli_real_escape_string ($conn, $_POST['GroupID']);
  }
  $Caption = mysqli_real_escape_string ($conn, $_POST['Caption']);

$query ="SELECT UserID from user WHERE UserName='$OwnerName'";

if($result = mysqli_query($conn, $query)){
  $row =  mysqli_fetch_array($result);
  $OwnerID = $row['UserID'];
} else {
  die('Error: ' . mysqli_error($conn));
}


  $keys = array_keys($_POST);
  $count = 3;
  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $photos[] = $keys[$count];
    $count++;
  }

  // check for errors
  if (!isset($OwnerID) || $OwnerID == '' ||  !isset($Caption) ||$Caption == ''  ) {
    //TODO needs to be improved
    $error = "Not all required fields have been filled in";
    header("Location: collection-creation.php?error="  . urlencode($error));
    exit();
  }
  // If no errors detected, insert message into database
  else{

      if(isset($GroupID)){
          $query = "INSERT INTO collections (OwnerID, GroupID, Caption ) VALUES ('$OwnerID', '$GroupID', '$Caption')";
      } else{
            $query = "INSERT INTO collections (OwnerID, Caption ) VALUES ('$OwnerID',  '$Caption')";
      }

    if (!mysqli_query($conn, $query)) {
      die('Error: ' . mysqli_error($conn));
    }  else {


      //look for groupID of newly created group
      $query = "SELECT MAX(CollectionID) as CollectionID FROM collections WHERE OwnerID='$OwnerID' ";
      $result =  mysqli_query($conn, $query);
      $count = mysqli_num_rows($result);
      $row =  mysqli_fetch_array($result);
      if($count === 1){
        $CollectionID = $row['CollectionID'];
        foreach ($photos as $photo){
          echo $photo;
          $query= "INSERT INTO photocollectionsmapping (CollectionID, PostID) VALUES ('$CollectionID', '$photo')";
          if(!mysqli_query($conn, $query)){
            die('Error in inserting the photos into the collection ' . mysqli_error($conn));
            exit();
          }

        }
              header("Location: profile-collection.php?GroupID=". urlencode($CollectionID));
      } else {
        die('Error looking for the newly created collection' . mysqli_error($conn));
              exit();
    }
  }
}
}

?>
