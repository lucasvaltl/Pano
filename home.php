<?php
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');

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
    <title>Pano - Newsfeed</title>
</head>

<body ng-app="">

    <?php
        require_once('includes/dbconnect.php');
        include('includes/header.php');
      ?>

    <main>

        <?php
        include 'includes/post.php';

        $query = "SELECT * FROM posts
                    LEFT JOIN user ON user.`UserID` = posts.`UserID`";

        //for each post:
        if ($result = mysqli_query($conn, $query)) {
            $count = mysqli_num_rows($result);
            while ($post = mysqli_fetch_array($result)) {

                $postID = $post['PostID'];
                $numComments; //calculated in query 2
                $numLikes = 0; //calculated in query 3
                $hasUserLiked = false;
                $postUserName = $post['UserName'];
                $postPictureID = $post['PhotoID'];
                $postUserPictureID = 1;
                $postDescription = $post['PostText'];
                $postLocation = $post['PostLocation'];
                $postTimeStamp = $post['PostTime'];
                //arrays store all necessary comments and likes data from the second and third query
                $comments = [];
                $likes = [];

                //gathers all the comments data for a photo
                $query2 = "SELECT * FROM comments
                            LEFT JOIN user ON user.`UserID` = comments.`UserID`
                            WHERE PhotoID = $postPictureID
                            ORDER BY CommentTime ASC";

                if ($result2 = mysqli_query($conn, $query2)) {
                    $numComments = mysqli_num_rows($result2);

                    while ($comment = mysqli_fetch_array($result2)) {

                        $commentID = $comment['CommentID'];
                        $commentUserName = $comment['UserName'];
                        $commentUserPictureID = 2;
                        $commentContent = $comment['Comment'];
                        $commentTimeStamp = $comment['CommentTime'];

                        $comment = new comment($commentUserName, $commentUserPictureID, $commentContent, $commentTimeStamp);

                        $comments[] = $comment;

                    }
                }

                //gathers all the like data for a photo
                $query3 = "SELECT * FROM likes
                            LEFT JOIN user ON user.`UserID` = likes.`UserID`
                            WHERE PhotoID = $postPictureID";

                if ($result3 = mysqli_query($conn, $query3)) {
                    $numLikes = mysqli_num_rows($result3);

                    while($like = mysqli_fetch_array($result3)) {
                        $LikeUserName = $like['UserName'];
                        if ($like['UserID'] == $_SESSION['UserID']) {
                            $hasUserLiked = true;
                        }
                        $likes[] = $like;
                    }
                }

                $post = new post($postPictureID, $postUserPictureID, $postUserName, $numLikes, $hasUserLiked, $numComments, $postDescription, $postLocation, $postTimeStamp);

                echo $post->addComments($comments);
                echo $post->returnHTML();
            }
        }


        /*if (isset($_POST['submit'])) {
            $Comment = mysqli_real_escape_string($conn, $_POST['Comment']);
            $postPictureID = $_POST['postPictureID'];

            $query = "INSERT INTO comments (UserID, PhotoID, Comment)
                        VALUES ('{$_SESSION['UserID']}', '$postPictureID', '$Comment')";

            if (mysqli_query($conn, $query)) {
                echo "yolo";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }*/



/*
        function submitComment(){

            $Comment = mysqli_real_escape_string($conn, $_POST['Comment']);
            $postPictureID = 123;

            $query = "INSERT INTO comments (UserID, PhotoID, Comment)
                        VALUES ('{$_SESSION['UserID']}', '$postPictureID', '$Comment')";

            if (mysqli_query($conn, $query)) {
                echo "yolo";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
*/

/*
        $posts= [
        new post("IMG_8937", "1", "curious_clark", "234", "1", "#bestintheworld", "Bergen, Austria", "12/02/17 10:45" ),
        new post("IMG_2821", "2", "judgyjudy", "2134", "1", "#justWOW", "Iguacu Falls, Brazil", "11/02/17 12:04" ),
        new post("IMG_6346", "3", "classy_claire", "33", "1", "This is the best city in the world! Who Aggrees?", "London, UK", "10/02/17 15:45" )
        ];

        $comments=[
        new comment("LikelyLucy","3","wow amazing stuff here", "12/02/17 13:45"),
        new comment("judgyjudy","2","Great Work", "12/02/17 15:23"),
        new comment("GrannyGiu","5","Not so sure...I would add more color", "13/02/17 17:02")
        ];

        foreach ($posts as $post){
          $post->addComments($comments);
        }

        foreach ($posts as $post){
          $post->returnHTML();
        }

*/
          ?>

          <script>
            function sendComment() {
                var parent  = this.parentElement;
                var postPictureID = parent.id;
                var Comment = parent.childNodes[1].value;
                //console.log(parent);
                //console.log(postPictureID);
                //console.log(Comment);
                var xhr = new XMLHttpRequest();
                var data = "Comment=" + Comment + "&postPictureID=" + postPictureID;
                xhr.open('POST',  '<?=SITE_ROOT?>/includes/commentadd.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send(data);

                console.log(data);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                    //    document.getElementById("currentComments").innerHTML = xhr.responseText;
                        var result = xhr.responseText;
                        console.log(result);
                    } else {
                        alert("There was a problem with the request.");
                    }
                }
            }

            var commentButtons = document.getElementsByClassName("comment-button");
            for (i=0; i<commentButtons.length; i++) {
                commentButtons.item(i).addEventListener("click", sendComment);
            }

            function registerLike() {

                //accessing the parent element, to gain access to the data
                //corresponding to the one being clicked
                var parent = this.parentElement;
                var postPictureID = parent.id;

                //accessing variables needed to alter the like count
                var likePhrase = parent.nextSibling.innerHTML;
                //splicing the likes to just get the number of likes,
                //then adding 1 to represent the user liking it
                var regex = new RegExp(/^\d+/);
                var likeNumber = parseInt(likePhrase[0]) + 1;


                //setting up the data to be passed through to the php page to process the database updating
                var xhr = new XMLHttpRequest();
                var data = "postPictureID=" + postPictureID;
                xhr.open('POST',  '<?=SITE_ROOT?>/includes/liketoggleon.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send(data);

                //upon return, the 'liked' class is added to the parent class list,
                //which drives the toggling functionality of the two different like buttons
                //and also the dynamic updating of number of likes
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var result = xhr.responseText;
                        //this 'liked' class will allow the like-button and unlike-button to toggle on and off
                        //in terms of their individual visiblity, based on the presence of 'liked'
                        parent.classList.add("liked");
                        //special case that if likeNumber = 2, then the singular for 1 like rather than 1 likes
                        if (likeNumber == 2){
                            parent.nextSibling.innerHTML = likeNumber + " likes";
                        } else {
                            parent.nextSibling.innerHTML = likeNumber + " like";
                        }
                    } else {
                        //alert("There was a problem with the request.");
                    }
                }
            }

            function unregisterLike() {
                var parent = this.parentElement;
                var postPictureID = parent.id;
                var likePhrase = parent.nextSibling.innerHTML;
                var regex = new RegExp(/^\d+/);
                var likeNumber = parseInt(likePhrase[0]) - 1;

                var xhr = new XMLHttpRequest();
                var data = "postPictureID=" + postPictureID;
                xhr.open('POST',  '<?=SITE_ROOT?>/includes/liketoggleoff.php', true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send(data);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var result = xhr.responseText;
                        console.log(result);
                        parent.classList.remove("liked");
                        if (likeNumber == 0){
                            parent.nextSibling.innerHTML = likeNumber + " likes";
                        } else {
                            parent.nextSibling.innerHTML = likeNumber + " like";
                        }
                    } else {
                    //    alert("There was a problem with the request.");
                    }
                }
            }


            //assigning an event listener to each of the like-buttons and unlike-buttons
            var likeButtons = document.getElementsByClassName("like-button");
            var unlikeButtons = document.getElementsByClassName("unlike-button");
            for (i=0; i<likeButtons.length; i++) {
                likeButtons.item(i).addEventListener("click" , registerLike);
                unlikeButtons.item(i).addEventListener("click" , unregisterLike);
            }

            </script>

    </main>
</body>

<?php
    include('includes/footer.php');
?>

</html>
