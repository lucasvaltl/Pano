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
    <div>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="logo center-center">
        <a href="home.html" ><img src="images/gradient-logo.png" class="png" id="homepagelogo"></a>
        </div>
      </div>
    </nav>
    </header>

  </div>

<main>

  <?php
include 'includes/post.php';



$posts= [

new post("IMG_8937", "1", "curious_clark", "656", "1", "#bestintheworld", "Bergen, Austria" ),
new post("IMG_2821", "2", "judgyjudy", "2134", "1", "#justWOW", "Iguacu Falls, Brazil" ),
new post("IMG_6346", "3", "classy_claire", "33", "1", "This is the best city in the world! Who Aggrees?", "London, UK" )
];

$comments=[
new comment("LikelyLucy","3","wow amazing stuff here"),
new comment("judgyjudy","2","Great Work"),
new comment("GrannyGiu","5","Not so sure...I would add more color")
];

foreach ($posts as $post){
  $post->addComments($comments);
}

foreach ($posts as $post){
  $post->returnHTML();
}
  ?>


  </div>


</main>

<footer>
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid">

  <div class="row">
    <div class="col-md-15 col-xs-15   lv-icons">
      <a href="home.html">     <i class="fa fa-newspaper-o fa-3x"></i></a>
    </div>
    <div class="col-md-15  col-xs-15  lv-icons">
        <a href="circles.html">   <i class="fa fa-circle-thin fa-3x"></i></a>
    </div>
    <div class="col-md-15  col-xs-15  lv-icons">
        <a href="upload.html">   <i class="fa fa-camera fa-3x"></i></a>
    </div>
    <div class="col-md-15  col-xs-15 lv-icons">
        <a href="profile.html">   <i class="fa fa-user-o fa-3x"></i></a>
    </div>
    <div class="col-md-15  col-xs-15 lv-icons">
        <a href="settings.html"> <i class="fa fa-sliders fa-3x"></i></a>
    </div>
    </div>
  </div>
</nav>
</footer>

  </body>

</html>
