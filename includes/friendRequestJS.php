<?php

require_once ('config.php');
?>


<script>

    //using the url to decide which listesters to add to which buttons
    var url = window.location.href;

    if (url.includes("profile-info.php")) {

        if (document.getElementById("add-friend-button")!== null){
            var sendRequestButtonProfile = document.getElementById("add-friend-button");
            var cancelRequestButtonProfile = document.getElementById("cancel-friend-button");
            sendRequestButtonProfile.addEventListener("click", sendFriendRequestFromProfile);
            cancelRequestButtonProfile.addEventListener("click", cancelFriendRequestFromProfile);
        } else {console.log("addfriendbutton")};

        if (document.getElementById("remove-friend-button")!== null){
            console.log("arrived");
            var deleteFriendButtonProfile = document.getElementById("remove-friend-button");
            deleteFriendButtonProfile.addEventListener("click",deleteFriendFromProfile);
        } else console.log("xyolo");

    } else if (url.includes("search.php")) {

        var sendRequestButtonSearch = document.getElementsByClassName("send-request-button");
        var cancelRequestButtonSearch = document.getElementsByClassName("cancel-request-button");

        for (i = 0; i < sendRequestButtonSearch.length; i++) {
            sendRequestButtonSearch.item(i).addEventListener("click",sendFriendRequestFromSearch);
            cancelRequestButtonSearch.item(i).addEventListener("click",cancelFriendRequestFromSearch);
        }

    }

    //======= from friendrecommendation.php ==============

    function sendFriendRequestFromCollFilter() {

        // gets the friend ID from the
        var friendID = this.id;
        var childRequestButton = this;
        var childCancelButton = childRequestButton.nextElementSibling;
        sendFriendRequest(friendID, childRequestButton, childCancelButton);
    }

    function cancelFriendRequestFromCollFilter() {

        // gets the friend ID from the
        var friendID = this.id;
        var childCancelButton = this;
        var childRequestButton = childCancelButton.previousElementSibling;
        cancelFriendRequest(friendID,childCancelButton,childRequestButton);
    }



    //======= from search.php ==============

    function sendFriendRequestFromSearch() {

        // gets the friend ID from the
        var friendID = this.id;
        var childRequestButton = this;
        var childCancelButton = childRequestButton.nextElementSibling;
        sendFriendRequest(friendID, childRequestButton, childCancelButton);
    }

    function cancelFriendRequestFromSearch() {

        // gets the friend ID from the
        var friendID = this.id;
        var childCancelButton = this;
        var childRequestButton = childCancelButton.previousElementSibling;
        cancelFriendRequest(friendID,childCancelButton,childRequestButton);
    }




    //======= from profile-header.php ==============


  function sendFriendRequestFromProfile() {


        var friendID = this.parentElement.parentElement.parentElement.id;
        var childRequestButton = this;
        var childCancelButton = childRequestButton.nextElementSibling;
        sendFriendRequest(friendID, childRequestButton, childCancelButton);
    }

    function cancelFriendRequestFromProfile() {

        var friendID = this.parentElement.parentElement.parentElement.id;
        var childCancelButton = this;
        var childRequestButton = childCancelButton.previousElementSibling;
        cancelFriendRequest(friendID, childRequestButton, childCancelButton);
    }

    function deleteFriendFromProfile() {

        var friendID = this.parentElement.parentElement.parentElement.id;
        var childDeleteFriendButton = this;
        var childConfirmDeleteFriendButton = childDeleteFriendButton.nextElementSibling;
        deleteFriend(friendID, childDeleteFriendButton, childConfirmDeleteFriendButton);

    }







    //=========== deleting a friend===============

    function deleteFriend(friendID, childConfirmDeleteFriendButton, childDeleteFriendButton) {

        //setting up the data to be passed through to the php page to process the database updating
        var xhr = new XMLHttpRequest();
        var data = "postFriendID=" + friendID;
        xhr.open('POST', '<?=SITE_ROOT?>/includes/deletefriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                //console.log("Result" + result);

                childDeleteFriendButton.classList.add("deleted");
                childConfirmDeleteFriendButton.classList.add("deleted");

            } else {
                //alert("There was a problem with the request.");
            }
        }
    }

    //=========== sending a friend request ===============


    function sendFriendRequest(friendID, childRequestButton, childCancelButton) {

        //setting up the data to be passed through to the php page to process the database updating
        var xhr = new XMLHttpRequest();
        var data = "postFriendID=" + friendID;
        xhr.open('POST', '<?=SITE_ROOT?>/includes/requestfriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                //console.log("Result" + result);

                childRequestButton.classList.add("requested");
                childCancelButton.classList.add("requested");

            } else {
                //alert("There was a problem with the request.");
            }
        }
    }


    //=========== cancelling a friend===============



    function cancelFriendRequest(friendID, childCancelButton, childRequestButton) {

        //setting up the data to be passed through to the php page to process the database updating
        var xhr = new XMLHttpRequest();
        var data = "postFriendID=" + friendID;
        xhr.open('POST', '<?=SITE_ROOT?>/includes/deletefriend-request.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                //console.log("Result" + result);

                childRequestButton.classList.remove("requested");
                childCancelButton.classList.remove("requested");

            } else {
                //alert("There was a problem with the request.");
            }
        }
    }

</script>
