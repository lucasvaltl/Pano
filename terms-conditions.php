<?php
//ob_start needed to allow redirecting after login
ob_start();

//session_start() needed to use global session variabls $_SESSION etc
session_start();

require_once('includes/config.php');

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
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Profile</title>
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
    if (isset($_SESSION['UserID'])) {
        include('includes/header.php');

      }else{
        echo '    <div id="left"></div>
            <div id="right"></div>
            <div id="top"></div>
            <div id="bottom"></div>';
      }
     ?>
    <main>
    <div class="container">
    <h2>Terms &amp; Conditions</h2>

    <div class="legal-policy">
      Last updated: March 15, 2017
<p>
  Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern Pano’s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.
</p>
<p>
  The term ‘Pano’ or ‘us’ or ‘we’ refers to the owners Johannes Landgraf, Florian Obst, Li Xie and Lucas Valtl of the website. The term ‘you’ refers to the user or viewer of our website.
</p>
<p>
  The use of this website is subject to the following terms of use:
</p>
<ul>
  <li>
    The content of the pages of this website is for your general information and use only. It is subject to change without notice.
  </li>
  <li>
    This website uses cookies to monitor browsing preferences and storing session information.
  </li>
  <li>
    Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
  </li>
  <li>
    Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
  </li>
  <li>
    This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.
  </li>
  <li>
    All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.
  </li>
  <li>
    Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.
  </li>
  <li>
    From time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).
  </li>
</ul>

      <h4>Contact Us</h4>
      If you have any questions about these Terms &amp; Conditions, please contact us under
      connectwithpano@gmail.com
    </div>
    <br>

    <button class="btn btn-primary btn-info" onclick="goBack()">

        <span class="glyphicon glyphicon-hand-left"></span>&nbsp;&nbsp;Go Back</button>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
  </div>


    </main>
    <?php
        if (isset($_SESSION['UserID'])) {
        include('includes/footer.php');
      }
    ?>

</body>

</html>
