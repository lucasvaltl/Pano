<?php

//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');
require_once('includes/dbconnect.php');
$filename = basename(__FILE__, '.php');

if (isset($_GET['id'])) {
    $profileUserName = $_GET['id'];
}

?>
<!DOCTYPE html>
<html>

<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <title> Pano - Search Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="Pano" />
    <meta property="og:image" content="https://apppanoblob.blob.core.windows.net/assets/ogimage.jpg" />
    <meta property="og:description" content="The social network taking a wider perspective " />
</head>


<body ng-app="">
<?php
include('includes/header.php');
?>
<main>

        <?php

        include('includes/search-list.php');

        // collect input from typesearch form and ensure correctness

        $_SESSION['SearchTerm'] = mysqli_real_escape_string($conn, $_GET['search']);

        if (isset($_SESSION['SearchTerm'])){

            if ($_SESSION['SearchTerm'][0] == '#'){

                $popularTagQuery = "SELECT TagName, COUNT(TagName) AS TagNameOccurence
                                    FROM tags AS t
                                    LEFT JOIN tagspostsmapping AS tpm ON tpm.TagID = t.TagID
                                    GROUP BY TagName
                                    ORDER BY TagNameOccurence DESC
                                    LIMIT 5";

                if ($result = mysqli_query($conn, $popularTagQuery)){
                    $tagNames = [];
                    while ($row = mysqli_fetch_array($result)){
                        $tagName = $row['TagName'];
                        $tagNames [] = $tagName;
                    }
                }
                ?>
                <h1 class="search-results-text">Search results for: <?=$_SESSION['SearchTerm']?></h1>
                <h3 class="search-results-text">
                    Popular hashtags:
                    <?php
                        for ($i = 0; $i < sizeof($tagNames); $i++) {
                            echo '<a href="'. SITE_ROOT .'/search.php?search=%23'. substr($tagNames[$i],1) .'"> '.$tagNames[$i].'&nbsp;&nbsp;</a>';
                        }
                    ?>
                </h3>
                <br>

                <?php
                include('includes/loadposts.php');
                ?>

                <div id="feed-container" class="search-panoramas">
                    <!-- posts go in here -->
                </div>

                <button id="load-more-button" data-page="0" type="button">Load More</button>

                <div id="loader">
                    <img class="loading" src="<?=SITE_ROOT?>/images/loading.gif" width="50" height="50" />
                </div>

                <?php
            } else {
                ?>

                <h1 class="search-results-text">
                    Search results for: <?=$_SESSION['SearchTerm']?>
                </h1>
                <br>

                <?
                //for the prepared statement
                $_SESSION['SearchTerm'] = "%{$_SESSION['SearchTerm']}%";

                if (!$stmt = $conn->prepare(
                    "SELECT * FROM user
                    WHERE FirstName LIKE ?
                    OR UserName LIKE ?
                    LIMIT 10")){
                        echo "Prepare failed: (". $conn->errno .")" . $conn->error;
                }

                if(!$stmt->bind_param("ss", $_SESSION['SearchTerm'], $_SESSION['SearchTerm'])){
                    echo "Binding parameters failed: (".$stmt->errno . ")".$stmt->error;
                }

                // Attempt select query execution
                if ($stmt->execute()) {

                    $result = $stmt->get_result();

                    if(mysqli_num_rows($result) > 0){

                        $rows = [];


                        while($row = mysqli_fetch_array($result)){

                            $isFriendOfUser = false;
                            $friendRequestSent= false;

                            $friendName = $row['UserName'];
                            $friendUserID = $row['UserID'];
                            $friendProfilePictureID = $row['ProfilePictureID'];

                            //if the friend is yourself, skip the iteration
                            if ($friendName == $_SESSION['UserName']){
                                continue;
                            }

                            //otherwise check to see if the logged in user is friends with this user's friends
                            $sql2 = "SELECT * FROM friends
                                WHERE UserID = '$friendUserID' AND FriendID = '{$_SESSION['UserID']}'";

                            if ($result2 = mysqli_query($conn, $sql2)) {
                                $count = mysqli_num_rows($result2);

                                //if friends, display tick, otherwise an add friend icon will appear
                                if ($count == 1) {
                                    $isFriendOfUser = true;
                                }
                            }

                            $sql3 = "SELECT * FROM `friendrequests` WHERE FriendID='$friendUserID' AND UserID='{$_SESSION['UserID']}'";

                            if ($result3 = mysqli_query($conn, $sql3)) {
                                $count2 = mysqli_num_rows($result3);

                                //if friends, display tick, otherwise an add friend icon will appear
                                if ($count2 == 1) {
                                    $friendRequestSent = true;
                                }
                            }

                            $sql4 = "SELECT my.FriendID
                              FROM friends AS my
                              JOIN friends AS their USING (FriendID)
                              WHERE  (my.UserID = '{$_SESSION['UserID']}' AND their.UserID = '$friendUserID')";

                            $mutualFriends = 0;

                            if ($result4 = mysqli_query($conn, $sql4)) {
                                $mutualFriends = mysqli_num_rows($result4);
                            }


                            //create a frienditem and allow the returnHTML function to run with the parameters
                            $row = array($friendUserID, $friendName, $friendName, $friendProfilePictureID, $isFriendOfUser,$friendRequestSent, $mutualFriends);
                            $rows[] = $row;

                        }//while fetching rows

                        // Define the custom sort function
                        function custom_sort($a,$b) {
                             return $a[6]<$b[6];
                        }
                        // Sort the multidimensional array
                          usort($rows, "custom_sort");

                        foreach ($rows as $row) {
                            $row = new frienditem($row[0],$row[1],$row[2],$row[3], $row[4],$row[5],$row[6]);
                            echo $row->returnHTML();
                        }//foreachloop

                    // Close result set
                    mysqli_free_result($result);
                    mysqli_free_result($result2);

                    //needed to clear the SearchTerm session variable so home feed etc can be viewed
                    $_SESSION['SearchTerm'] = null;
                    }
                    } else{
                        echo "<p>No matches found</p>";
                    }
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            } // search term
        // close connection
        mysqli_close($conn);

        ?>


</main>

</body>

<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
include('includes/footer.php');
include('includes/friendRequestJS.php');
include('includes/commentlikejs.php');
?>

</html>
