<?php
    require_once('includes/config.php');
    include('friendRequestJS.php');
 ?>



<script>

    window.onload = loadMorePosts;

    var feedContainer = document.getElementById("feed-container");
    var loadMore = document.getElementById("load-more-button");
    loadMore.addEventListener("click", loadMorePosts);
    var loader = document.getElementById("loader");
    var request_in_progress = false;
    var end_of_feed = false;



    //  Scroll to Top (adapted from https://codepen.io/rdallaire/pen/apoyx)
    $(window).scroll(function() {
         // If page is scrolled more than 500px, fade in arrow
        if ($(this).scrollTop() >= 500) {
            $('#return-to-top').fadeIn(400);
        } else { //else fade out arrow
            $('#return-to-top').fadeOut(400);
        }

    //    var content_height = feedContainer.offsetHeight;
        var content_height = $(document).height();
        var adjusted_height = content_height - 120 ;
        var current_y = window.innerHeight + window.pageYOffset;
        var current_x =  ($(document).width() / 2)-25;

    //    console.log(current_y);
    //    console.log(content_height);
    //    console.log(current_x);

        if (current_y >= content_height - 100  && end_of_feed){

              $('#return-to-top').css({top: adjusted_height, right: current_x, position:'absolute'});
        } else {
              $('#return-to-top').css({top: "", right: "", position:""});
        }
    });
    //when arrow is clicked, scroll to top
    $('#return-to-top').click(function() {
        $('body,html').animate({
            scrollTop : 0
        }, 1000);
    });


    //whenever user scrolls, scrollReaction called (which follows the position of user on page)
    window.onscroll = function () {
        scrollReaction();
    }

    function toggleComment() {

        commentList = this.parentElement.parentElement.parentElement.parentElement.nextElementSibling;

        if (commentList.style.display=='none'){
            commentList.style.display='inline';
            commentList.classList.add("animated");
            commentList.classList.add("slideInLeft")
        } else {
            commentList.style.display='none';
        }
    }


    //if the user has scrolled to almost bottom of the page, then call loadMorePosts
    function scrollReaction() {
        var content_height = feedContainer.offsetHeight;
        var current_y = window.innerHeight + window.pageYOffset;


        if(current_y >= content_height - 8000 && !end_of_feed) {
            loadMorePosts();
        }
    }

    //if loading more pages, let the loader show, otherwise hide it
    function showLoader() {
        loader.style.display = 'block';
    }

    function hideLoader() {
        loader.style.display = 'none';
    }

    //appends the loaded posts onto the end of the current set of posts
    function appendToFeedContainer(div, new_posts) {

        //putting new HTML into a temp div causes browser to parse it as elements
        var temp = document.createElement('div');
        temp.innerHTML = new_posts;


        //firstElementChild due to how DOM treats whitespace
        var class_name = temp.firstElementChild.className;


        if (class_name == 'friend-recommendations-container'){
            var items = temp.getElementsByClassName(class_name);
            var length = items.length;
            for (i=0; i < length; i++){
                div.appendChild(items[0]);
            }

            var sendRequestButtonCollFilter = document.getElementsByClassName("send-request-button-coll");
            var cancelRequestButtonCollFilter = document.getElementsByClassName("cancel-request-button-coll");

            for (i = 0; i < sendRequestButtonCollFilter.length; i++) {
                sendRequestButtonCollFilter.item(i).addEventListener("click",sendFriendRequestFromCollFilter);
                cancelRequestButtonCollFilter.item(i).addEventListener("click",cancelFriendRequestFromCollFilter);
            }


            var class_name = temp.firstElementChild.nextElementSibling.className;

        }



        var items = temp.getElementsByClassName(class_name);

        var length = items.length;
        for (i=0; i < length; i++){
            div.appendChild(items[0]);
        }

        //assigning an event listener to each of the buttons
        var likeButtons = document.getElementsByClassName("like-button");
        var unlikeButtons = document.getElementsByClassName("unlike-button");
        var commentButtons = document.getElementsByClassName("comment-button");
        var commentToggles = document.getElementsByClassName("comment-toggle");

        for (i=0; i <commentToggles.length; i++){
            commentToggles.item(i).addEventListener("click", toggleComment);
        }

        for (i=0; i<likeButtons.length; i++) {
          likeButtons.item(i).addEventListener("click" , registerLike);
          unlikeButtons.item(i).addEventListener("click" , unregisterLike);
          commentButtons.item(i).addEventListener("click", sendComment);
        }

        var deleteButtons = document.getElementsByClassName("delete-comment-button");
        for (i=0; i<deleteButtons.length; i++) {
          deleteButtons.item(i).addEventListener("click", deleteComment);
        }

        var deletePostButtons = document.getElementsByClassName("delete-post-button");
        for (i=0; i<deletePostButtons.length; i++) {
          deletePostButtons.item(i).addEventListener("click", deletePost);
        }

        var commentRows = document.getElementsByClassName('currentComments');
        for (var i = 0; i < commentRows.length; i++){
            commentRows[i].style.display='none';
        }

    }

    function setCurrentPage(page) {
        //console.log('Incrementing page to: ' + page);
        loadMore.setAttribute('data-page', page);
    }


    function loadMorePosts () {
        if (request_in_progress) {
            return;
        }
        request_in_progress = true;
        showLoader ();

        var page = parseInt(loadMore.getAttribute('data-page'));
        var next_page = page + 1;

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'includes/loadposts.php?page=' + next_page, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
            //     console.log('Result: ' + result);

                hideLoader();
                setCurrentPage(next_page);
                //if statement to prevent appendFeedClassNameError
                if (result.length > 10){
                    appendToFeedContainer(feedContainer, result);
                } else {
                    end_of_feed = true;
            //        console.log(end_of_feed);
                }

                request_in_progress = false;

            }
        };
        xhr.send();
    }



    function sendComment() {
      //parent gives access to the postPictureID and Comment fields necessary
      var parent  = this.parentElement;
      var postPictureID = parent.id;

      var Comment = parent.childNodes[1].value;

      if (Comment == ""){
            parent.childNodes[1].placeholder = 'Type Something!';
      } else {

          //these statements allow the manipulation of the comment counter
          var commentCounter = "counter" + postPictureID;
          var counterUpdater = document.getElementById(commentCounter);
          var commentPhrase = counterUpdater.firstChild.innerHTML;
          var commentNumber = parseInt(commentPhrase) + 1;

          //setting up the ajax necessary to process the comment request
          var xhr = new XMLHttpRequest();
          var data = "Comment=" + Comment + "&postPictureID=" + postPictureID;
          xhr.open('POST',  '<?=SITE_ROOT?>/includes/commentadd.php', true);
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.send(data);

          //on the click of the comment button, this function happens
          xhr.onreadystatechange = function() {
              if (xhr.readyState == 4 && xhr.status == 200) {

                  //newCommentRow contains the HTML to form a new row of comment
                  var newCommentRow = xhr.responseText;
                  var currentCommentID = "currentComments" + postPictureID;
                  var commentInsertion = document.getElementById(currentCommentID);

                  //ensures that the comment is inserted at the end of the comments
                  commentInsertion.insertAdjacentHTML('beforeend', newCommentRow);

                  var deleteButtons = document.getElementsByClassName("delete-comment-button");
                  for (i=0; i<deleteButtons.length; i++) {
                      deleteButtons.item(i).addEventListener("click", deleteComment);
                  }

                  //clears the comment field and placeholder changed to allow user
                  //to see that comment has been posted successfully
                  parent.childNodes[1].value = '';
                  parent.childNodes[1].placeholder = 'Comment Posted!';

                  //simple test to see if comment is plural or singular
                  if (commentNumber == 1){
                      counterUpdater.firstChild.innerHTML = commentNumber + " comment";
                  } else {
                      counterUpdater.firstChild.innerHTML = commentNumber + " comments";
                  }


              } else {
              //    alert("There was a problem with the request.");
              }
          }
      }
    }

    function deleteComment() {

      var parent = this.parentElement;
      //must delete both the comment and the divider
      var commentRow = parent.parentElement;
      var divider = commentRow.nextElementSibling;

      var postRow = commentRow.parentElement;
      var postPictureID = postRow.parentElement.id;
      var commentID = commentRow.id;

      var commentCounter = "counter" + postPictureID;
      var counterUpdater = document.getElementById(commentCounter);
      var commentPhrase = counterUpdater.firstChild.innerHTML;
      var commentNumber = parseInt(commentPhrase) - 1;

      var xhr = new XMLHttpRequest();
      var data = "commentID=" + commentID;
      xhr.open('POST',  '<?=SITE_ROOT?>/includes/commentdelete.php', true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(data);

      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              commentRow.remove();
              divider.remove();

              //simple test to see if comment is plural or singular
              if (commentNumber == 1){
                  counterUpdater.firstChild.innerHTML = commentNumber + " comment";
              } else {
                  counterUpdater.firstChild.innerHTML = commentNumber + " comments";
              }


          } else {
          //    alert("There was a problem with the request.");
          }
      }

    }

    function deletePost() {

      var postContainer = this.parentElement.parentElement.parentElement.parentElement;
      var postID = postContainer.id;

     // console.log(postContainer);
      //console.log(postID);

      var xhr = new XMLHttpRequest();
      var data = "PostID=" + postID;
      xhr.open('POST',  '<?=SITE_ROOT?>/includes/postdelete.php', true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(data);

      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              var result = xhr.responseText;
             // console.log(result);
              postContainer.remove();

          } else {
          //    alert("There was a problem with the request.");
          }
      }
    }


    function registerLike() {

      //accessing the parent element, to gain access to the data
      //corresponding to the one being clicked
      var parent = this.parentElement;
      var postPictureID = parent.id;

      //accessing variables needed to alter the like count
      var likePhrase = parent.nextSibling.innerHTML;
      //splicing the likes to just get the number of likes,
      //then adding 1 to represent the user liking it
      var likeNumber = parseInt(likePhrase) + 1;


      //setting up the data to be passed through to the php page to process the database updating
      var xhr = new XMLHttpRequest();
      var data = "postPictureID=" + postPictureID;
      xhr.open('POST',  '<?=SITE_ROOT?>/includes/liketoggleon.php', true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(data);

      //upon return, the 'liked' class is added to the parent class list,
      //which drives the toggling functionality of the two different like buttons
      //and also the dynamic updating of number of likes
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              var result = xhr.responseText;
              //this 'liked' class will allow the like-button and unlike-button to toggle on and off
              //in terms of their individual visiblity, based on the presence of 'liked'
              parent.classList.add("liked");
              //special case that if likeNumber = 2, then the singular for 1 like rather than 1 likes
              if (likeNumber == 1){
                  parent.nextSibling.innerHTML = likeNumber + " like";
              } else {
                  parent.nextSibling.innerHTML = likeNumber + " likes";
              }
          } else {
              //alert("There was a problem with the request.");
          }
      }
    }

    function unregisterLike() {
      var parent = this.parentElement;
      var postPictureID = parent.id;
      var likePhrase = parent.nextSibling.innerHTML;
      var likeNumber = parseInt(likePhrase) - 1;

      var xhr = new XMLHttpRequest();
      var data = "postPictureID=" + postPictureID;
      xhr.open('POST',  '<?=SITE_ROOT?>/includes/liketoggleoff.php', true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.send(data);

      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              var result = xhr.responseText;
              parent.classList.remove("liked");
              if (likeNumber == 1){
                  parent.nextSibling.innerHTML = likeNumber + " like";
              } else {
                  parent.nextSibling.innerHTML = likeNumber + " likes";
              }
          } else {
          //    alert("There was a problem with the request.");
          }
      }
    }

  </script>
