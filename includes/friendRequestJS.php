<?php

require_once ('config.php');
?>


<script>

    var url = window.location.href;


    if (url.includes("profile-info.php")) {


        if (document.getElementById("add-friend-button")!== null){
            var sendRequestButtonProfile = document.getElementById("add-friend-button")
            sendRequestButtonProfile.addEventListener("click", sendFriendRequestFromProfile);
        } else {console.log("addfriendbutton")};


        if (document.getElementById("remove-friend-button")!== null){
            console.log("arrived");
            var cancelRequestButtonProfile = document.getElementById("remove-friend-button")
            cancelRequestButtonProfile.addEventListener("click",deleteFriendFromProfile);
        } else console.log("xyolo");



    } else if (url.includes("search.php")) {

        var sendRequestButtonSearch = document.getElementsByClassName("send-request-button");
        var cancelRequestButtonSearch = document.getElementsByClassName("cancel-request-button");

        for (i = 0; i < sendRequestButtonSearch.length; i++) {
            sendRequestButtonSearch.item(i).addEventListener("click",sendFriendRequestFromSearch);
            cancelRequestButtonSearch.item(i).addEventListener("click",cancelFriendRequestFromSearch);
    }



    }

    function sendFriendRequestFromSearch()
    {

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


  function sendFriendRequestFromProfile() {

        // gets the friend ID from the
        var friendID = this.id;
        var childRequestButton = this;
        var childCancelButton = childRequestButton.nextElementSibling;
        sendFriendRequest(friendID, childRequestButton, childCancelButton);

    }

    function cancelFriendRequestFromProfile() {

        console.log("cancelled");

        // gets the friend ID from the
        var friendID = this.parentElement.parentElement.parentElement.id;

        console.log("FriendID : " + friendID);


        var childRequestButton = this;
        var childCancelButton = childRequestButton.nextElementSibling;

        console.log(childRequestButton);

        cancelFriendRequest(friendID, childRequestButton, childCancelButton);

    }

    function deleteFriendFromProfile() {

        console.log("cancelled");

        // gets the friend ID from the
        var friendID = this.parentElement.parentElement.parentElement.id;

        console.log("FriendID : " + friendID);


        var childRequestButton = this;
        var childCancelButton = childRequestButton.nextElementSibling;

        console.log(childRequestButton);

        cancelFriendRequest(friendID, childRequestButton, childCancelButton);

    }


    function sendFriendRequest(friendID, childRequestButton, childCancelButton) {

        console.log(childRequestButton);

        console.log(friendID);

        //setting up the data to be passed through to the php page to process the database updating
        var xhr = new XMLHttpRequest();
        var data = "postFriendID=" + friendID;
        xhr.open('POST', '<?=SITE_ROOT?>/includes/requestfriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        //upon return, the 'liked' class is added to the parent class list,
        //which drives the toggling functionality of the two different like buttons
        //and also the dynamic updating of number of likes
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log("Result" + result);
                //this 'liked' class will allow the like-button and unlike-button to toggle on and off
                //in terms of their individual visiblity, based on the presence of 'liked'
                childRequestButton.classList.add("requested");
                childCancelButton.classList.add("requested");

            } else {
                //alert("There was a problem with the request.");
            }
        }
    }


    function deleteFriend(friendID, childCancelButton, childRequestButton) {


        console.log(childCancelButton);

        console.log(friendID);

        //setting up the data to be passed through to the php page to process the database updating
        var xhr = new XMLHttpRequest();
        var data = "postFriendID=" + friendID;
        xhr.open('POST', '<?=SITE_ROOT?>/includes/deletefriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        //upon return, the 'liked' class is added to the parent class list,
        //which drives the toggling functionality of the two different like buttons
        //and also the dynamic updating of number of likes
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log("Result" + result);
                //this 'liked' class will allow the like-button and unlike-button to toggle on and off
                //in terms of their individual visiblity, based on the presence of 'liked'
                childRequestButton.classList.remove("requested");
                childCancelButton.classList.remove("requested");

            } else {
                //alert("There was a problem with the request.");
            }
        }
    }



    function cancelFriendRequest(friendID, childCancelButton, childRequestButton) {


        console.log(childCancelButton);

        console.log(friendID);

        //setting up the data to be passed through to the php page to process the database updating
        var xhr = new XMLHttpRequest();
        var data = "postFriendID=" + friendID;
        xhr.open('POST', '<?=SITE_ROOT?>/includes/deletefriend-request.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        //upon return, the 'liked' class is added to the parent class list,
        //which drives the toggling functionality of the two different like buttons
        //and also the dynamic updating of number of likes
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log("Result" + result);
                //this 'liked' class will allow the like-button and unlike-button to toggle on and off
                //in terms of their individual visiblity, based on the presence of 'liked'
                childRequestButton.classList.remove("requested");
                childCancelButton.classList.remove("requested");

            } else {
                //alert("There was a problem with the request.");
            }
        }
    }

</script>