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
        include('includes/header.php');
     ?>
    <main>

    <h2>Privacy Policy</h2>
    <div class="privacy-policy">
      Last updated: March 15, 2017
      Pano (&quot;us&quot;, &quot;we&quot;, or &quot;our&quot;) operates the www.panoapp.co.uk website (the &quot;Service&quot;). It was created as part of a coursework for a course taken at University College London. The site  is maintained by Johannes Landgraf, Florian Obst, Li Xie and Lucas Valtl
      This page informs you of our policies regarding the collection, use and disclosure of Personal Information when you use our Service.
      We will not use or share your information with anyone except as described in this Privacy Policy. This Privacy Policy is licensed by TermsFeed to Pano.
      We use your Personal Information for providing and improving the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible at www.panoapp.co.uk
      <h4>Information Collection And Use</h4>
      While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to, your name, email address and location (&quot;Personal Information&quot;).
      <h4>Log Data</h4>
      We collect information that your browser sends whenever you visit our Service (&quot;Log Data&quot;). This Log Data may include information such as your computer's Internet Protocol (&quot;IP&quot;) address, browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages and other statistics.
      <h4>Cookies</h4>
      Cookies are files with small amount of data, which may include an anonymous unique identifier. Cookies are sent to your browser from a web site and stored on your computer's hard drive.
      We use &quot;cookies&quot; to collect information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.
      <h4>Service Providers</h4>
      We may employ third party companies and individuals to facilitate our Service, to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.
      These third parties have access to your Personal Information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.
      Security</h4>
      The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.
      <h4>Links To Other Sites</h4>
      Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.
      We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites or services.
      <h4>Children's Privacy</h4>
      Our Service does not address anyone under the age of 13 (&quot;Children&quot;).
      We do not knowingly collect personally identifiable information from children under 13. If you are a parent or guardian and you are aware that your Children has provided us with Personal Information, please contact us. If we discover that a Children under 13 has provided us with Personal Information, we will delete such information from our servers immediately.
      <h4>Changes To This Privacy Policy</h4>
      We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
      You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
      <h4>Contact Us</h4>
      If you have any questions about this Privacy Policy, please contact us under
      connectwithpano@gmail.com
    </div>



    </main>
    <?php
        include('includes/footer.php');
    ?>

</body>

</html>
