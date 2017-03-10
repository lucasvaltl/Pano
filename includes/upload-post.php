<?

if(isset($_POST['submit'])){


$expected = ['PostID', 'CreatorID', 'ShortDescrip', 'Location'];
$required = ['PostID', 'CreatorID', 'ShortDescrip', 'Location'];
$PostID = mysqli_real_escape_string($conn, $_POST['PostID']);
$CreatorID= mysqli_real_escape_string ($conn, $_POST['CreatorID']);
$ShortDescrip= mysqli_real_escape_string ($conn, $_POST['ShortDescrip']);
$Location = mysqli_real_escape_string ($conn, $_POST['Location']);



if (!isset($CreatorID) || $CreatorID == ''|| !isset($PostID) || $PostID == ''||  !isset($Location) || $Location == '' || !isset($ShortDescrip) || $ShortDescrip == ''  ) {
  //needs to be improved
  $error = "Not all required fields have been filled in";
  header("Location: upload.php?error=" . urlencode($error));
  exit();
}



$query = "INSERT INTO posts (PostID, UserID, PostText, PostLocation ) VALUES ('$PostID', '$CreatorID', '$ShortDescrip', '$Location')";
if (!mysqli_query($conn, $query)) {
  die('Error: ' . mysqli_error($conn));
} else{
  header("Location: profile-info.php?id=". urlencode($UserName));
}
}
