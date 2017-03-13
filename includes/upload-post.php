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



    //TODO the tags are not being uploaded

    /*

    SELECT * FROM posts WHERE CONTAINS(PostID, 'b9c1dd335f17a1f092df68bb066fafff699c5136aa162efd8d');


    SELECT * FROM posts WHERE CONTAINS(UserID, '1');

    SELECT * FROM table WHERE Column LIKE '%test%';


    SELECT PostText, PostID FROM posts
        WHERE PostID ='00bd6689e6d0cf8d800cec0b837367722c0f4294cf3120434718f9e78b2ee2aa'
        AND PostText REGEXP '^#[[:alnum:]]' OR PostText REGEXP ' #[[:alnum:]]'

        */

    $query = "INSERT INTO posts (PostID, UserID, PostText, PostLocation ) VALUES ('$PostID', '$CreatorID', '$ShortDescrip', '$Location')";
    if ($result = mysqli_query($conn, $query)) {

        //getting all the hashtags from the PostText from the Post
        $query2 = "SELECT PostText, PostID FROM posts
        WHERE PostText REGEXP '^#[[:alnum:]]' OR PostText REGEXP ' #[[:alnum:]]'
        AND PostID = $PostID";

        if ($result2 = mysqli_query($conn, $query2)){
            $row2 = mysqli_fetch_array($result2);

            $string = strtolower($row['PostText']);
            $PostID = $row['PostID'];
            $hashtags= FALSE;
            preg_match_all("/(#\w+)/u", $string, $matches);

            if ($matches) {
               $hashtagsArray = array_count_values($matches[0]);
               $hashtags = array_keys($hashtagsArray);
            }

            for ($i=0; $i<sizeof($hashtags); $i++){
                print_r($hashtags[$i]);
                print_r($PostID);
                $query3 = "INSERT INTO tags (TagName)
                             VALUES ('$hashtags[$i]')";
            }

            if ($result3 = mysqli_query($conn, $query3)) {
                $query4 = "SELECT * FROM tags WHERE TagName = ('$hashtags[$i]')";

                if ($result4 = mysqli_query($conn, $query4)) {
                    $row4 = mysqli_fetch_array($result4);
                    $TagID = $row4['TagID'];

                    $query5 = "INSERT INTO tagspostsmapping (TagID, PostID) VALUES ('$TagID', '$PostID')";
                    if ($result5 = mysqli_query($conn, $query5)){
                         echo "yolo";
                    } else {
                         echo "Error: " . $query5 . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo "Error: " . $query4 . "<br>" . mysqli_error($conn);
                }
            } else {
                 echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
        }

        header("Location: profile-info.php?id=". urlencode($UserName));

    } else {
       die('Error: ' . mysqli_error($conn));
    }
}
