<?php
/*
	php-javascript graph adapted from:
	@author Daniel Moxon
	@web 	www.moxyphp.com
	@desc 	Classifies X based on k-nearest points
*/
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('../includes/config.php');
require_once('../includes/dbconnect.php' );
include('knn.php');


//Where the dataset of each user will be stored.
$data = [];

//===========================================================================
//Find out how many likes the user has
$query = "SELECT PhotoID FROM likes WHERE UserID  = '{$_SESSION['UserID']}'";

//$numTotalLikes is the total number of likes of the logged in user
$numTotalLikes;
$photosLiked = [];

if ($result = mysqli_query($conn, $query)) {
	$numTotalLikes = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		$photosLiked[] = $row['PhotoID'];
	}
}

//===========================================================================
//$numTotalFriends is number of total friends of the logged in user

$query = "SELECT UserID from friends
			WHERE UserID = '{$_SESSION['UserID']}'";

$numTotalFriends;

if ($result = mysqli_query($conn, $query)) {
	$numTotalFriends = mysqli_num_rows($result);
}

//===========================================================================
//Gets a list of users who are not friends with the logged in user
$query = "SELECT UserID from user
			WHERE UserID != '{$_SESSION['UserID']}'
			AND UserID NOT IN
			(SELECT UserID from friends
						WHERE FriendID = '{$_SESSION['UserID']}'
						UNION ALL
						SELECT FriendID from friends
						WHERE UserID = '{$_SESSION['UserID']}')";

//$sampleSize is how many users are not friends with the user,
// and $usersInSample is an array of UserIDs of those users
$sampleSize;
$usersInSample = [];
if ($result = mysqli_query($conn, $query)) {
	$sampleSize = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		$usersInSample[] = $row['UserID'];
	}
}

//in each loop of the different user in the sample:


//===========================================================================

foreach ($usersInSample as $key => $userID) {

	//	get the associated userName of this particular user - can problably reposition this query later for when we have recieved the top 5 in similarity
	$query = "SELECT UserName FROM user WHERE UserID = '$userID'";

	if ($result2 = mysqli_query($conn, $query)) {
		while($user = mysqli_fetch_array($result2)){
			$userName = $user['UserName'];
		}
	}

	//===========================================================================

	//	get number of common likes between these two particular users

	$query = "SELECT *
		FROM likes t1, likes t2
		WHERE t1.PhotoID = t2.PhotoID AND t1.UserID = '{$_SESSION['UserID']}' AND t2.UserID = $userID
		AND t1.UserID <> t2.UserID";

	$numSharedLikes;

	if ($result = mysqli_query($conn, $query)){
		$numSharedLikes = mysqli_num_rows($result);
	}

	//$likeRate is parameter 'X' in the comparison of data array
	$likeRate = ($numSharedLikes == 0 ) ? 0 : ($numSharedLikes / $numTotalLikes) * 1000;

	//===========================================================================

	//get the number of mutual friends you have with this particular user
	$query = "SELECT my.FriendID
			FROM friends AS my
			JOIN friends AS their USING (FriendID)
			WHERE  (my.UserID = '{$_SESSION['UserID']}' AND their.UserID = '$userID')";

		/*

		SELECT my.FriendID
			FROM friends AS my
			JOIN friends AS their USING (FriendID)
			WHERE  (my.UserID = 12399 AND their.UserID = 12400)
			AND my.FriendID NOT IN (
			SELECT UserID from user WHERE UserID = 12400)

			*/

	$numMutualFriends=0;

	if ($result = mysqli_query($conn, $query)){
		$numMutualFriends = mysqli_num_rows($result);
	}

	//$mutualFriendRate is parameter 'Y' in the comparison of data array
	$mutualFriendRate = ($numMutualFriends == 0 ) ? 0 : ($numMutualFriends / $numTotalFriends) * 1000 ;

	//===========================================================================

	//add the data for this user to the dataset
	$data[] = array($likeRate, $mutualFriendRate, $userName, $userName);

}



//gets number of common likes between 2 users (the user and the potential friend)
$query = "SELECT COUNT(*)
	FROM likes t1, likes t2
	WHERE t1.PhotoID = t2.PhotoID AND t1.UserID = 12399 AND t2.UserID = 12401
	AND t1.UserID <> t2.UserID";



if (isset($_GET['x']))
	$currentUserPoint = array(intval($_GET['x']),intval($_GET['y']),'','');
else
	$currentUserPoint = array(150,125,'','');


//random data generator
//$data = [];
/*
for ($i=0; $i < 50; $i++){
	$rX = rand(0, 1000);
	$rY = rand(0, 1000);
	$user = 'user' . $i;

	$data[] = array($rX, $rY, $user, $user);

}
*/


$kNN = new kNN($data, $currentUserPoint, 5, array(2,3));

//$kNN->standardize();

$cx = $kNN->calculate();

$yolos = $kNN->classify(2);

echo  "Hi there " . $_SESSION['UserName'] . ", your recommended friends are: ";
foreach ($yolos as $yolo){
	echo $yolo . ', ';
}

echo "<br><br>X-axis: Like Rate. Y-axis: Mutual Friend Rate.";

//echo "Classified as: <b>" . $determineType . "</b>";

echo "<br ><br >";



$cx = array_column($cx, 'result');

echo "<div id=\"map\">";

echo "<span title=\"{$currentUserPoint[2]} c: {$currentUserPoint[0]}, {$currentUserPoint[1]}\" class=\"currentUserPoint\" style=\"left:{$currentUserPoint[0]}px;top:{$currentUserPoint[1]}px;\"></span>";

foreach ($data as $pt)
{
	if (in_array($pt, $cx) == $pt)
	{
		echo "<span title=\"{$pt[2]} c: {$pt[0]}, {$pt[1]}\" class=\"nearest point\" style=\"left:{$pt[0]}px;top:{$pt[1]}px;\">{$pt[2]}</span>";
	}
	else
	{
		echo "<span title=\"{$pt[2]} c: {$pt[0]}, {$pt[1]}\" class=\"point\" style=\"left:{$pt[0]}px;top:{$pt[1]}px;\">{$pt[2]}</span>";
	}
}


echo "</div>";

echo "<pre>";
print_r($data);
echo "</pre>";

?>

<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
$(document).ready(function(){

	$('#map').click(function(e){
		var x = e.clientX - $(this).offset().left;
		var y = e.clientY - $(this).offset().top;
		window.location.href = '/panoapp/knn/knn-data.php?x=' + x + '&y=' + y;
	});


});
</script>

<style>
#map{position:relative; border: 1px solid #aaa; width: 1000px; height: 1000px;}
.point{text-indent: 10px;}
.point,.currentUserPoint{position: absolute; border-radius: 10px; width: 10px;
height: 10px; background-color: green; display: block;}
.currentUserPoint{background-color:red;}
.nearest{background-color:blue;}
</style>
