<?php

    require_once('config.php');

    $query = "SELECT * FROM friendrequests
                LEFT JOIN user ON user.`UserID` = friendrequests.`UserID`
                WHERE FriendID = '{$_SESSION['UserID']}'";

    if ($result = mysqli_query($conn, $query)){
        $numRequests = mysqli_num_rows($result);

        if ($numRequests != 0) : ?>
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
        var requestRejectButton = this.parentElement.nextElementSibling.firstElementChild;
        var FriendID = requestAcceptButton.parentElement.parentElement.id;
        var Message = this.parentElement.previousElementSibling.firstElementChild;

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
        var requestRejectButton = this;
        var requestAcceptButton = this.parentElement.previousElementSibling.firstElementChild;
        var FriendID = requestRejectButton.parentElement.parentElement.id;
        var Message = this.parentElement.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling;


        var xhr = new XMLHttpRequest();
        var data = "FriendID=" + FriendID;
        xhr.open('POST',  '<?=SITE_ROOT?>/includes/processrejectfriend.php', true);
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

 </script>
