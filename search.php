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

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <title> Pano - Search Page</title>
</head>


<body ng-app="">
<?php
include('includes/header.php');
?>
<main>

    <div class="friend-search-results container">

        <p>
        </p>

        <p>
        </p>

        <br />
            <hr />

        <?php

        include('includes/search-list.php');

        // collect input from typesearch form and ensure correctness

        $term = mysqli_real_escape_string($conn, $_POST['search']);

        if (isset($term)){
            $sql = "SELECT * FROM user WHERE FirstName LIKE  '%" . $term . "%' OR LastName LIKE '%". $term ."%' OR UserName LIKE '%". $term ."%'";

            // Attempt select query execution
            if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){


                    while($row = mysqli_fetch_array($result)){

                        $isFriendOfUser = false;

                        $friendName = $row['UserName'];
                        $friendUserID = $row['UserID'];

                        //if the friend is yourself, skip the iteration
                        if ($friendName == $profileUserName || $friendName == $_SESSION['UserName']){
                            continue;
                        } else {

                            //otherwise check to see if the logged in user is friends with this user's friends
                            $sql2 = "SELECT * FROM friends
                                WHERE UserID = '$friendUserID' AND FriendID = '{$_SESSION['UserID']}'
                                OR FriendID = '$friendUserID' AND UserID = '{$_SESSION['UserID']}'";

                            if ($result2 = mysqli_query($conn, $sql2)) {
                                $count = mysqli_num_rows($result2);

                                //if friends, display tick, otherwise an add friend icon will appear
                                if ($count == 1) {
                                    $isFriendOfUser = true;
                                }
                            }
                        }

                        //create a frienditem and allow the returnHTML function to run with the parameters
                        $row = new frienditem($friendUserID, $friendName, $friendName, '3', $isFriendOfUser);
                        echo $row->returnHTML();
                    }

                    }

                // Close result set
                mysqli_free_result($result);
                mysqli_free_result($result2);

                } else{
                    echo "<p>No matches found</p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        // close connection
        mysqli_close($conn);

        ?>

    </div>
</main>
<?php
include('includes/footer.php');
?>

</body>

</html>
