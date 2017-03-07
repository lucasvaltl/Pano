<?php
if(isset($_POST['Submit'])){
if($_POST['submit'] === 'Delete'){

  $expected = ['submit'];
  $required = ['submit'];

  $keys = array_keys($_POST);
  $count = 1;
  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $membersToDelete[] = $_POST[$keys[$count]];
    $count++;
  }

foreach ($membersToDelete as $member) {
  $query = "DELETE from usergroupmapping WHERE GroupID='$GroupID' and UserID='$member' ";
  if (!mysqli_query($conn, $query)) {
    die('Error: ' . mysqli_error($conn));
          exit();
  } else {
  header("Location: circle-members.php?GroupID=". urlencode($GroupID));
  }
}


}elseif ($_POST['submit'] === 'Add Members') {

  $keys = array_keys($_POST);
  $count = 1;
  $sizeOfPost = count($_POST);
  while($count <  $sizeOfPost){
    $membersToAdd[] = $_POST[$keys[$count]];
    $count++;
  }

  foreach ($membersToAdd as $member){
    $query= "INSERT INTO usergroupmapping (GroupID, UserID) VALUES ('$GroupID', '$member')";
    if(!mysqli_query($conn, $query)){
      die('Error in accessing the groups page' . mysqli_error($conn));
      exit();
    }

  }

} 
}
