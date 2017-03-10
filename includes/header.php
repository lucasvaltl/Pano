<div>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">

            <!-- profile picture top left corner -->

            <?php if (isset($_SESSION['UserName'])) : ?>
            <div class="pull-left navbar-text">
                <img class="comment-picture" src="http://lorempixel.com/40/40/people">
                <?=$_SESSION['UserName'];?>
            <?php else : ?>
            <div class="pull-left navbar-text">
                <a href="<?=SITE_ROOT?>/login.php">Log in!</a>
                &nbsp;
                <a href="<?=SITE_ROOT?>/signup.php">Sign up!</a>
            <?php endif;?>
            </div>

            <div class="pull-right navbar-text">
                <div class="search-box">
                    <form class="form-group" action="search.php" method="post">
                        <input type="text" name="search" placeholder="Search for users..." />
                        <input type="submit" value=">>" />
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="logo center-center">
                    <a href="<?=SITE_ROOT?>/home.php"><img src="<?=SITE_ROOT?>/images/gradient-logo.png" class="png" id="homepagelogo"></a>
                </div>
            </div>

        </nav>
    </header>

</div>
