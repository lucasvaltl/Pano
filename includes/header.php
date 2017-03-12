<div>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">


<!-- search box -->
            <div class="pull-left">
                <div class="search-box">
                    <form action="search.php" method="post">
                      &nbsp;
                       <i class="fa fa-search search-icon"></i>
                         &nbsp;
                        <input type="text" class="search-input" name="search" placeholder="Search for users..." />
                        <input class="search-btn" type="submit" value=">" />
                    </form>
                </div>
            </div>

<!-- logo -->
                <div class="logo center-center">
                    <a href="<?=SITE_ROOT?>/home.php"><img src="<?=SITE_ROOT?>/images/gradient-logo.png" class="png" id="homepagelogo"></a>
                </div>

<!-- Profile -->
            <?php if (isset($_SESSION['UserName'])) : ?>
            <div class="pull-right navbar-text">
                <img class="comment-picture img-circle" src="http://lorempixel.com/40/40/people">
                &nbsp; &nbsp;
                <?=$_SESSION['UserName'];?>
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
