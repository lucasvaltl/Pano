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
    <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Upload</title>
</head>

<body id="gradhome">
    <?php
        include('includes/header.php');
    ?>
    <main class="add-padding">

        <div class="drag-in row text-center">

          <!-- Include dropzone -->
          <script src="dropzone.js"></script>
          <link rel="stylesheet" href="dropzone.css">
          <form action="includes/upload.php" class="dropzone" type="post">
          <input type="hidden" name="hashname" value="<?= $blob_name ?>">
          <input type="hidden" name="picType" value="panoramas">
          </form>

            <p>
                <br />
                <h2>Drag your panorama here please!</h2>
            </p>
            <p class="lv-bigplus">
                +
            </p>
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
            <label class="upload-form" for="Location">Where was the picture taken?</label>
            <textarea type="textarea" class="form-control" rows="5" maxlength="150" name="Location" placeholder="In what awesome place did you take this?"></textarea>
            <br />

            <input type="submit" name="submit" class="btn btn-default lv-button create-collection-btn" value="Upload" />
        </div>
      </form>
      <?php var_dump($_POST) ?>
    </main>

    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
