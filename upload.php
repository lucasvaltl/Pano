<?php
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

include('includes/config.php');

if (isset($_SESSION['UserID'])) {
  $UserID = $_SESSION['UserID'];
  $UserName = $_SESSION['UserName'];
  $real_name = $UserID . time();
  $blob_name = hash('sha256',$real_name);
}


  include('includes/dbconnect.php');
  include('includes/upload-post.php');

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://use.fontawesome.com/ed51c90fe4.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2qniLS_JRqdMIDCuy0L3ac7usMi6fbi4&v=3.exp&sensor=false&libraries=places"></script>
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="dropzone.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Upload</title>
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

<body id="gradhome">
    <?php
        include('includes/header.php');
    ?>
    <main class="add-padding">

        <div class="drag-in row text-center">

          <!-- Include dropzone -->
          <script src="dropzone.js"></script>
          <form action="includes/upload.php" class="dropzone dropzone-panorama" type="post">
              <input type="hidden" name="hashname" value="<?= $blob_name ?>">
              <input type="hidden" name="picType" value="panoramas">
              <div class="dz-message data-dz-message profile-pic-message"><span>Drag your panorama into here. Or just click.</span></div>
          </form>
        </div>
        <br />
        <br />
        <form  action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row meta-data form-group">
          <input type="hidden" name="PostID" value="<?= $blob_name ?>">
          <input type="hidden" name="CreatorID" value="<?= $UserID ?>">
            <label class="upload-form" for="ShortDescrip">Please describe the Picture</label>
            <textarea type="textarea" class="form-control" rows="5" maxlength="150" name="ShortDescrip" placeholder="You can use hashtags if you like ;) "></textarea>
            <br />
            <label  class="upload-form" for="Location">Where was the picture taken?</label>
            <input id="searchTextField" type="text" class="form-control" size="50" name="Location" placeholder="In what awesome place did you take this?"></input>
            <script type="text/javascript">
            function initialize() {

            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            }

            google.maps.event.addDomListener(window, 'load', initialize);
            </script>
            <br />

            <input type="submit" name="submit" class="btn btn-default lv-button create-post-btn" value="Upload" />
        </div>
      </form>
    </main>

    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
