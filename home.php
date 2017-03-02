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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link rel="stylesheet" href="css/offset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Pano - Newsfeed</title>
</head>

<body ng-app="">

    <?php
        require_once('includes/dbconnect.php');
        include('includes/header.php');
      ?>

    <main>
        <div id="feed-container">

            <?php
//          COMMENTS ARE BROKEN RIGHT NOW!!!!!
            include('includes/commentlikejs.php');

              ?>

      </div>

      <button id="load-more-button" data-page="0" type="button">Load More</button>

      <div id="loader">
        <img class="loading" src="<?=SITE_ROOT?>/images/loading.gif" width="50" height="50" />
      </div>
    </main>
</body>

<script>

    var feedContainer = document.getElementById("feed-container");
    var loadMore = document.getElementById("load-more-button");
    loadMore.addEventListener("click", loadMorePosts);
    var loader = document.getElementById("loader");


    function showLoader() {
        loader.style.display = 'block';
    }

    function hideLoader() {
        loader.style.display = 'none';
    }

    function showLoadMore() {
        loader.style.display = 'inline';
    }

    function hideLoadMore() {
        loader.style.display = 'none';
    }

    function appendToFeedContainer(div, new_html) {
        //putting new HTML into a temp div causes browser to parse it as elements
        var temp = document.createElement('div');
        temp.innerHTML = new_html;

        //firstElementChild due to how DOM treats whitespace
        var class_name = temp.firstElementChild.className;
        var items = temp.getElementsByClassName(class_name);

        var len = items.length;
        for (i=0; i < len; i++){
            div.appendChild(items[0]);
        }
    }

    function setCurrentPage(page) {
        console.log('Incrementing page to: ' + page);
        loadMore.setAttribute('data-page', page);
    }

    function loadMorePosts () {
        showLoader ();
        hideLoadMore();

        var page = parseInt(loadMore.getAttribute('data-page'));
        var next_page = page + 1;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'includes/loadposts.php?page=' + next_page, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log('Result: ' + result);

                hideLoader();
                setCurrentPage(next_page);

                appendToFeedContainer(feedContainer, result);

                showLoadMore();
            }
        };
        xhr.send();
    }

</script>

<?php
    include('includes/footer.php');
?>

</html>
