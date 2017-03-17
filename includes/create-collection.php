<?php


$errors = [];
$missing = [];

//sign up only goes through initial check if there are no errors or missing fields
$fail_count = 0;

if (isset($_POST['create'])) {

  $count = 4;   //for later access to the pictures stored in the POST array - they come after all of the other fields
  $expected = ['OwnerName',  'GroupID', 'Caption', 'PrivacySetting'];
  $required = ['OwnerName',   'Caption', 'PrivacySetting'];
  $OwnerName = mysqli_real_escape_string($conn, $_POST['OwnerName']);
  if(isset($_POST['GroupID'])){
      $GroupID= mysqli_real_escape_string ($conn, $_POST['GroupID']);
        $count = 5; //change the count given that now there is another variable before the pictures in the POST array
  }
  $Caption = mysqli_real_escape_string ($conn, $_POST['Caption']);
  $PrivacySetting = mysqli_real_escape_string ($conn, $_POST['PrivacySetting']);

  //make sure that the GroupID is only allowed if if privacy setting is set to groups
  if($PrivacySetting != 4){
    $GroupID = null;
  }

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

  //convert the the keys  from the post array that store the postIDs into an array of pictures. This is a hack that needed to be done given in order to make the front end look pretty and in order to have several independent checkboxes in the form.
    $keys = array_keys($_POST);

    $sizeOfPost = count($_POST);
    while($count <  $sizeOfPost){
      $photos[] = $keys[$count];
      $count++;
    }

  //checking if privacy setting is valid
  if(!($PrivacySetting==1 || $PrivacySetting==2 || $PrivacySetting==3 || $PrivacySetting==4 )){
    $missing[] = 'PrivacySetting';
    $fail_count++;
  }


if($fail_count === 0){
//get user ID which is needed to create cction
$query ="SELECT UserID from user WHERE UserName='$OwnerName'";

if($result = mysqli_query($conn, $query)){
  $row =  mysqli_fetch_array($result);
  $OwnerID = $row['UserID'];
} else {
  die('Error: ' . mysqli_error($conn));
}



    //if the group privacy option was selected, insert into the db with the GroupID
      if($GroupID != null){

          if(!$stmt = $conn->prepare("INSERT INTO collections (OwnerID, GroupID, Caption, SettingID ) VALUES (?,?,?,?)")){
              echo "Prepare failed: (". $conn->errno .")" . $conn->error;
          }

          if(!$stmt->bind_param("iisi", $OwnerID, $GroupID, $Caption, $PrivacySetting)){
              echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
          }


      } else{

            if(!$stmt = $conn->prepare("INSERT INTO collections (OwnerID, Caption, SettingID ) VALUES (?,?,?)")){
                echo "Prepare failed: (". $conn->errno .")" . $conn->error;
            }

            if(!$stmt->bind_param("isi", $OwnerID, $Caption, $PrivacySetting)){
                echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
            }

      }

    if (!$stmt->execute()) {
      die('Error: ' . mysqli_error($conn));
    }  else {


      //look for groupID of newly created group and add all pictures to the collection
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
              header("Location: profile-collection.php?CollectionID=". urlencode($CollectionID));
      } else {
        die('Error looking for the newly created collection' . mysqli_error($conn));
              exit();
    }
  }

}
}
?>
