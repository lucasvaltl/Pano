<?php
    require_once('includes/config.php');
 ?>

<script>
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
      var commentRow = parent.parentElement;
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

              //simple test to see if comment is plural or singular
              if (commentNumber == 1){
                  counterUpdater.firstChild.innerHTML = commentNumber + " comment";
              } else {
                  counterUpdater.firstChild.innerHTML = commentNumber + " comments";
              }


            //need to remove commentRow's html

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


  //assigning an event listener to each of the buttons
  var likeButtons = document.getElementsByClassName("like-button");
  var unlikeButtons = document.getElementsByClassName("unlike-button");
  var commentButtons = document.getElementsByClassName("comment-button");
  for (i=0; i<likeButtons.length; i++) {
      likeButtons.item(i).addEventListener("click" , registerLike);
      unlikeButtons.item(i).addEventListener("click" , unregisterLike);
      commentButtons.item(i).addEventListener("click", sendComment);
  }

  var deleteButtons = document.getElementsByClassName("delete-comment-button");
  for (i=0; i<deleteButtons.length; i++) {
      deleteButtons.item(i).addEventListener("click", deleteComment);
  }

  </script>
