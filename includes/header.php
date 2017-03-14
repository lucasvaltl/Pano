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
                    <form id="search-form" action="search.php" method="get">
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
            <div class="pull-right navbar-text">
                <a href="<?=SITE_ROOT?>/profile-info.php?id=<?php echo $_SESSION['UserName'];?>">
                    <img class="comment-picture img-circle" src="https://apppanoblob.blob.core.windows.net/profilepics/<?=$_SESSION['ProfilePictureID']?>.jpg">
                    &nbsp; &nbsp;<?=$_SESSION['UserName'];?>
                </a>
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

        function showSuggestions(json) {
            suggestions.style.display = 'block';
         }

         function getSuggestions() {
           var search = this.value;

           console.log(search);

           if (search.length < 3) {
               suggestions.style.display= 'none';
               return;
           }

           var xhr = new XMLHttpRequest();
           xhr.open('GET', 'includes/autosuggest.php?search=' + search, true);
           xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
           xhr.onreadystatechange = function () {
             if(xhr.readyState == 4 && xhr.status == 200) {
               var result = xhr.responseText;
               console.log('Result: ' + result);
               suggestions.innerHTML = result;

               showSuggestions(result);
             }
           };
           xhr.send();
         }

         //input listens for every key press
         search.addEventListener("input", getSuggestions);

    });

</script>
