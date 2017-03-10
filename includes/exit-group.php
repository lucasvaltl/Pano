<?php
if(isset($_POST['submit'])){

if ($_POST['submit'] === 'Exit Circle') {

$query = "DELETE from usergroupmapping WHERE GroupID='$GroupID' and UserID='$UserID' ";
if (!mysqli_query($conn, $query)) {
  die('Error: ' . mysqli_error($conn));
        exit();
} else {
header("Location: circle-overview.php");
}
}
}
