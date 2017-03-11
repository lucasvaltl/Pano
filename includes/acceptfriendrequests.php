<?php

    require_once('config.php');

    $query = "SELECT * FROM friendrequests
                LEFT JOIN user ON user.`UserID` = friendrequests.`UserID`
                WHERE FriendID = '{$_SESSION['UserID']}'";

    if ($result = mysqli_query($conn, $query)){
        $numRequests = mysqli_num_rows($result);

        if ($numRequests != 0) : ?>
            <br>
            <div class="row notification-title grad animated slideInLeft">
                Hey! Some people want to be your friends:
            </div>
        <?php endif;



        while ($row = mysqli_fetch_array($result)){
            $friendID = $row['UserID'];
            $friendUserName = $row['UserName'];
            //$profilePicture = //TBD

            ?>
            <div class="row notification grad animated slideInRight" id="<?=$friendID?>">
                <div class="col-xs-1">

                </div>
                <div class="col-xs-2">
                    <a href="<?=SITE_ROOT?>/profile-info.php?id=<?=$friendUserName?>">
                        <img src="images/profilepics/2.jpg" class="img-circle notification-picture">
                    </a>
                </div>
                <div class="col-xs-3 notification-request-name">
                    <a href="<?=SITE_ROOT?>/profile-info.php?id=<?=$friendUserName?>" style="color:white"><?=$friendUserName;?></a>
                </div>
                <div class="notification-request-name col-xs-2">
                    <div class="request-accept-message">Friendship Accepted!</div>
                    <div class="request-reject-message">Friendship Rejected!</div>
                </div>
                <div class="col-xs-1 notification-request-icon">
                    <button class="request-accept-button"><i class="fa fa-user-plus fa-2x"></i></button>
                </div>
                <div class="col-xs-1 notification-request-icon">
                    <button class="request-reject-button"><i class="fa fa-user-times fa-2x"></i></button>
                </div>
                <div class="col-xs-2">

                </div>
            </div>
            <?php


            /*<a href="'. SITE_ROOT .'/profile-info.php?id='. $this->postUserName .'" >&nbsp;
              <img src="images/profilepics/'.$this->postUserPictureID.'.jpg" class="img-circle profile-picture" /> &nbsp; &nbsp; &nbsp; '.$this->postUserName.'
            </a>
*/

        }

    }

 ?>

 <br>

 <script>

    var requestAcceptButtons = document.getElementsByClassName("request-accept-button");
    var requestRejectButtons = document.getElementsByClassName("request-reject-button");

    for (i=0; i < requestAcceptButtons.length; i++){
        requestAcceptButtons.item(i).addEventListener("click", acceptRequest);
        requestRejectButtons.item(i).addEventListener("click", rejectRequest);
    }

    function acceptRequest(){
        var requestAcceptButton = this;
        console.log("AcceptButton: " + requestAcceptButton);
        var requestRejectButton = this.parentElement.nextElementSibling.firstElementChild;
        console.log("RejectButton: " + requestRejectButton);
        var FriendID = requestAcceptButton.parentElement.parentElement.id;
        console.log(FriendID);

        var Message = this.parentElement.previousElementSibling.firstElementChild;
        console.log("message:" + Message);


        var xhr = new XMLHttpRequest();
        var data = "FriendID=" + FriendID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/processaddfriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                requestAcceptButton.classList.add('pressed');
                requestRejectButton.classList.add('pressed');
                Message.classList.add('pressed');
            } else {
            //    alert("There was a problem with the request.");
            }
        }
    }

    function rejectRequest(){
        console.log("rejected");
        var requestRejectButton = this;
        console.log("RejectButton: " + requestRejectButton);
        var requestAcceptButton = this.parentElement.previousElementSibling.firstElementChild;
        console.log("AcceptButton: " + requestAcceptButton);
        var FriendID = requestRejectButton.parentElement.parentElement.id;
        console.log("FriendID" + FriendID);


        //var Message = this.parentElement.previousElementSibling.firstElementChild;
        var Message = this.parentElement.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;
        console.log("message:" + Message);

        var xhr = new XMLHttpRequest();
        var data = "FriendID=" + FriendID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/processrejectfriend.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                console.log("result:" + result);
                //TODO FRIEND REQUEST NOT ACCEPTED
                //get rid of the two buttons and change it to text saying friendship accepted!
                requestAcceptButton.classList.add('pressed');
                requestRejectButton.classList.add('pressed');
                Message.classList.add('pressed');
            } else {
            //    alert("There was a problem with the request.");
            }
        }
    }

 </script>
