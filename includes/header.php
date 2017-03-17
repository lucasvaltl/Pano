<?php
if(!isset($_SESSION['UserName'])) { //if not yet logged in
   header("Location: login.php");// send to login page
   exit;

//prevents lingering / buildup of unwanted search terms
if(isset($_SESSION['SearchTerm'])) {
    $_SESSION['SearchTerm'] = null;
}
}

 ?>

<div>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">


<!-- search box -->
            <div class="pull-left">
                <div class="search-box">
                    <!-- autocomplete="off" role="presentation" required to disable browser autofill -->
                    <form id="search-form" action="search.php" method="get" autocomplete="off" role="presentation">
                      &nbsp;
                       <i class="fa fa-search search-icon"></i>
                         &nbsp;
                         <?php $search = isset($_GET['search']) ? $_GET['search'] : ''; ?>
                        <input type="text" class="search-input" id="search" name="search" placeholder="Search users or #tags" value="<?php echo htmlspecialchars($search); ?>" />
                        <button class="search-btn" type="submit" value=""><i class="fa fa-chevron-right"></i> </button>
                    </form>
                    <ul id="suggestions">
                        <!-- suggestions will fill in here -->
                    </ul>
                </div>
            </div>

<!-- logo -->
                <div class="logo center-center">
                    <a href="<?=SITE_ROOT?>/home.php"><img src="<?=SITE_ROOT?>/images/gradient-logo.png" class="png" id="homepagelogo"></a>
                </div>

<!-- Profile -->
            <?php if (isset($_SESSION['UserName'])) : ?>
            <div class="pull-right navbar-text dropdown">
                <button class="dropdown-header" href="<?=SITE_ROOT?>/profile-info.php?id=<?php echo $_SESSION['UserName'];?>">
                    <img class="comment-picture img-circle" src="https://apppanoblob.blob.core.windows.net/profilepics/<?=$_SESSION['ProfilePictureID']?>.jpg">
                    &nbsp; &nbsp;<?=$_SESSION['UserName'];?>
                    &nbsp; &nbsp;
                </button>
                <ul class="dropdown-content">
                    <li> Image Scaling<hr></li>
                    <li><a id="ratio-default">Default</a></li>
                    <li><a id="ratio-wide">Wide</a></li>
                    <li><a id="ratio-narrow">Narrow</a></li>
                </ul>
            <?php else : ?>
            <div class="pull-right navbar-text">
                <a href="<?=SITE_ROOT?>/login.php">Log in!</a>
                &nbsp;
                <a href="<?=SITE_ROOT?>/signup.php">Sign up!</a>
            <?php endif;?>
            &nbsp;
            </div>

        </nav>
    </header>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var suggestions = document.getElementById("suggestions");
        var form = document.getElementById("search-form");
        var search = document.getElementById("search");


         function getSuggestions() {
           var search = this.value;

           var isThereHashTag = isThereHashTag(search);

           if (isThereHashTag){
               var search = search.substring(1);
           }

           function isThereHashTag(search){
               return (search.indexOf("#") != -1) ? true : false;
           }

           if (search.length < 3) {
               suggestions.style.display= 'none';
               return;
           }

           var xhr = new XMLHttpRequest();
           xhr.open('GET', 'includes/autosuggest.php?hashtag='+isThereHashTag+'&search=' + search, true);
           xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
           xhr.onreadystatechange = function () {
             if(xhr.readyState == 4 && xhr.status == 200) {
               var result = xhr.responseText;
               //console.log('Result: ' + result);
               suggestions.innerHTML = result;
               suggestions.style.display = 'block';
             }
           };
           xhr.send();
         }

         //input listens for every key press
         search.addEventListener("input", getSuggestions);

    });

    var toggleDefaultButton = document.getElementById("ratio-default");
    var toggleWideButton = document.getElementById("ratio-wide");
    var toggleNarrowButton = document.getElementById("ratio-narrow");
    toggleDefaultButton.addEventListener("click", toggleDefault);
    toggleWideButton.addEventListener("click", toggleWide);
    toggleNarrowButton.addEventListener("click", toggleNarrow);

    function toggleDefault () {
        var desiredRatio = "default";
        var undesiredRatio1 = "narrow";
        var undesiredRatio2 = "wide";
        togglePanoRatio(desiredRatio, undesiredRatio1 ,undesiredRatio2);
    }
    function toggleWide () {
        var desiredRatio = "wide";
        var undesiredRatio1 = "narrow";
        var undesiredRatio2 = "default";
        togglePanoRatio(desiredRatio, undesiredRatio1 ,undesiredRatio2);
    }
    function toggleNarrow () {
        var desiredRatio = "narrow";
        var undesiredRatio1 = "wide";
        var undesiredRatio2 = "default";
        togglePanoRatio(desiredRatio, undesiredRatio1 ,undesiredRatio2);
    }

    function togglePanoRatio(desiredRatio, undesiredRatio1 ,undesiredRatio2) {
        var panoramas = document.getElementsByClassName("panorama");
        console.log(desiredRatio);
        for (i=0; i<panoramas.length; i++){
            panoramas.item(i).classList.add(desiredRatio);
            panoramas.item(i).classList.remove(undesiredRatio1);
            panoramas.item(i).classList.remove(undesiredRatio2);
        }
    }



</script>
