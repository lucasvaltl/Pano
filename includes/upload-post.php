<?

//sign up only goes through initial check if there are no errors or missing fields
$fail_count = 0;

$errors = [];
$missing = [];

if(isset($_POST['submit'])){
    $expected = ['PostID', 'CreatorID', 'ShortDescrip', 'Location'];
    $required = ['PostID', 'CreatorID', 'ShortDescrip', 'Location'];
    $PostID = mysqli_real_escape_string($conn, $_POST['PostID']);
    $CreatorID= mysqli_real_escape_string ($conn, $_POST['CreatorID']);
    $ShortDescrip= mysqli_real_escape_string ($conn, $_POST['ShortDescrip']);
    $Location = mysqli_real_escape_string ($conn, $_POST['Location']);

//refrain from uploading a post without a picture. Variable pictureUploaded is set to true if the uploading worked
if(!isset($_SESSION['uploadSuccessful'] ) && $_SESSION['uploadSuccessful'] != true){
$missing[]  = 'Picture';
$fail_count++;
}

//reset upload successfull if  the picture actually uploaded
$_SESSION['uploadSuccessful'] = false;

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


//perform query if nothing is missing
if($fail_count == 0){
    //insert the post data into post table
    $query = "INSERT INTO posts (PostID, UserID, PostText, PostLocation ) VALUES ('$PostID', '$CreatorID', '$ShortDescrip', '$Location')";
    if ($result = mysqli_query($conn, $query)) {

        //take the text from the post just submitted
        $query2 = "SELECT PostText, PostID FROM posts
        WHERE PostID ='$PostID'";

        if ($result2 = mysqli_query($conn, $query2)){
            $row2 = mysqli_fetch_array($result2);

            //convert post to all lower string and isolate the hashtags
            $string = strtolower($row2['PostText']);
            $PostID = $row2['PostID'];
            $hashtags= FALSE;
            preg_match_all("/(#\w+)/u", $string, $matches);

            if ($matches) {
               $hashtagsArray = array_count_values($matches[0]);
               $hashtags = array_keys($hashtagsArray);
            }
            // for each hashtag in the post (if present), store into the tags table of Database
            //if the tag is a duplicate, ignore
            for ($i=0; $i<sizeof($hashtags); $i++){
                print_r($hashtags[$i]);
                print_r($PostID);
                $query3 = "INSERT INTO tags (TagName)
                             VALUES ('$hashtags[$i]')";


                $result3 = mysqli_query($conn, $query3);

                //take the tag's associated TagID and use it for the tagspostsmapping with the current PostID
                $query4 = "SELECT * FROM tags WHERE TagName = ('$hashtags[$i]')";

                if ($result4 = mysqli_query($conn, $query4)) {
                    $row4 = mysqli_fetch_array($result4);
                    $TagID = $row4['TagID'];

                    $query5 = "INSERT INTO tagspostsmapping (TagID, PostID) VALUES ('$TagID', '$PostID')";
                    if ($result5 = mysqli_query($conn, $query5)){
                         echo "yolo";
                    } else {
                         echo "Error: " . $query5 . "<br>" . mysqli_error($conn);
                    } //$query5
                } else {
                    echo "Error: " . $query4 . "<br>" . mysqli_error($conn);
                } // $query4
            } //forloop
        } else {
            echo "Error: " . $query2 . "<br>" . mysqli_error($conn);
        } //$query2

        //redirect to user's profile feed
        header("Location: profile-info.php?id=". urlencode($UserName));

    } else {
       die('Error: ' . mysqli_error($conn));
    }

}
}
