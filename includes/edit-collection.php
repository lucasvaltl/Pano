<?php

$missing = [];

if(isset($_POST['edit'])){
  $count = 5;   //for later access to the pictures stored in the POST array - they come after all of the other fields
  $expected = ['OwnerName',  'GroupID', 'Caption', 'PrivacySetting', 'CollectionID'];
  $required = ['OwnerName',   'Caption', 'PrivacySetting', 'CollectionID'];
  $OwnerName = mysqli_real_escape_string($conn, $_POST['OwnerName']);
  if(isset($_POST['GroupID'])){
    $GroupID= mysqli_real_escape_string ($conn, $_POST['GroupID']);
    $count = 6; //change the count given that now there is another variable before the pictures in the POST array
  }
  $Caption = mysqli_real_escape_string ($conn, $_POST['Caption']);
  $PrivacySetting = mysqli_real_escape_string ($conn, $_POST['PrivacySetting']);
  $CollectionID = mysqli_real_escape_string ($conn, $_POST['CollectionID']);


  //make sure that the GroupID is only selected if privacy setting is set to groups
  if($PrivacySetting != 4){
    $GroupID = null;
  }

  //get user ID which is needed to create cction
  $query ="SELECT UserID from user WHERE UserName='$OwnerName'";

  if($result = mysqli_query($conn, $query)){
    $row =  mysqli_fetch_array($result);
    $OwnerID = $row['UserID'];
  } else {
    die('Error: ' . mysqli_error($conn));
  }

  //convert the the keys  from the post array that store the postIDs into an array of pictures. This is a hack that needed to be done given in order to make the front end look pretty and in order to have several independent checkboxes in the form.
  $keys = array_keys($_POST);

  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $photos[] = $keys[$count];
    $count++;
  }

  // check for errors
  if (!isset($OwnerID) || $OwnerID == '' ||  !isset($Caption) ||$Caption == ''  || !isset($PrivacySetting) || $PrivacySetting == '' ) {
    //TODO needs to be improved
    $error = "All fields are required to be filled in";
    header("Location: collection-edit.php?CollectionID=".$CollectionID."&error="  . urlencode($error));
    exit();
  }
  // If no errors detected, insert message into database
  else{
    //if the group privacy option was selected, insert into the db with the GroupID
    if(isset($GroupID)){

      if(!$stmt = $conn->prepare("UPDATE collections SET  GroupID = ?, Caption = ?, SettingID = ? WHERE CollectionID=?")){
          echo "Prepare failed: (". $conn->errno .")" . $conn->error;
      }

      if(!$stmt->bind_param("isii", $GroupID, $Caption, $PrivacySetting, $CollectionID)){
          echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
      }
    } else{

      if(!$stmt = $conn->prepare("UPDATE collections SET  GroupID = Null, Caption = ?, SettingID = ? WHERE CollectionID=?")){
          echo "Prepare failed: (". $conn->errno .")" . $conn->error;
      }

      if(!$stmt->bind_param("sii", $Caption, $PrivacySetting, $CollectionID)){
          echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
      }
    }


    if (!$stmt->execute()) {
      die('Error when updating collection in database ' . mysqli_error($conn));
      exit();
    }  else {
      //drop all photos from collection before re-inserting them
      $query = "DELETE FROM photocollectionsmapping
      WHERE photocollectionsmapping.`CollectionID` = '$CollectionID'";

      if(!mysqli_query($conn, $query)){
        die('Error looking for the newly created collection' . mysqli_error($conn));
        exit();
      } else {
        foreach ($photos as $photo){
          $query= "INSERT INTO photocollectionsmapping (CollectionID, PostID) VALUES ('$CollectionID', '$photo')";
          if(!mysqli_query($conn, $query)){
            die('Error in inserting the photos into the collection ' . mysqli_error($conn));
            exit();
          }

        }
        header("Location: profile-collection.php?CollectionID=". urlencode($CollectionID));

      }
    }
  }
  //if delete was set, delete collection
} elseif(isset($_POST['delete'])){
    $expected = ['OwnerName',  'CollectionID'];
    $required = ['OwnerName',  'CollectionID'];
    $OwnerName = mysqli_real_escape_string($conn, $_POST['OwnerName']);
    $CollectionID = mysqli_real_escape_string($conn, $_POST['CollectionID']);

    //delete all associated pictures
    $query = "DELETE FROM photocollectionsmapping
    WHERE photocollectionsmapping.`CollectionID` = '$CollectionID'";

    if(!mysqli_query($conn, $query)){
      die('Error when deleting pictures from collection' . mysqli_error($conn));
      exit();
    }

    //delece collection
    $query = "DELETE FROM collections  WHERE CollectionID = '$CollectionID'";

    if(!mysqli_query($conn, $query)){
      die('Error when deleting collection' . mysqli_error($conn));
      exit();
  } else {
    header("Location: profile-collections.php?id=" . $profileUserName);
  }
}


?>
