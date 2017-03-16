<?php
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('includes/config.php');

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
    <title>Pano - Newsfeed</title>
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
        require_once('includes/dbconnect.php');
        include('includes/header.php');
      ?>

    <main>

        <?php
            include('includes/acceptfriendrequests.php');
         ?>

        <div id="feed-container">
            <!--LOADING OF POSTS GO IN HERE, FROM loadpost.php via commentlikejs.php -->
        </div>



        <button id="load-more-button" data-page="0" type="button">Load More</button>

        <div id="loader">
            <img class="loading" src="<?=SITE_ROOT?>/images/loading.gif" />
        </div>

    </main>
</body>


<!-- jquery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<?php
    include('includes/commentlikejs.php');
    include('includes/footer.php');
//    include('knn/knn-data.php');
?>

</html>
