<?php


//ob_start needed to allow redirecting after login
ob_start();




$query = "SELECT * FROM friendrecommendations
            WHERE UserID = '{$_SESSION['UserID']}'";

if ($result = mysqli_query($conn, $query)) {
    $recommendations = mysqli_fetch_array($result);

    $friend1 = $recommendations['FriendID1'];
    $friend2 = $recommendations['FriendID2'];
    $friend3 = $recommendations['FriendID3'];
    $friend4 = $recommendations['FriendID4'];
    $friend5 = $recommendations['FriendID5'];



    $friendRecommendations = array($friend1, $friend2, $friend3, $friend4, $friend5);

//TODO li double check this
    $friendIDs = $friendRecommendations;

    $friendProfilePictureIDs = [];


    for ($i = 0; $i < 5; $i++) {
        $query2 = "SELECT UserName, ProfilePictureID FROM user
                    WHERE UserID = '$friendRecommendations[$i]'";

        if ($result2 = mysqli_query($conn, $query2)) {
            $friendUserName = mysqli_fetch_array($result2);
            $friendRecommendations[$i] = $friendUserName['UserName'];

            $friendProfilePictureIDs[$i] = $friendUserName['ProfilePictureID'];

        }
    }



    echo '      <div class="friend-recommendations-container"><br>
                <div class="friend-recommendations " id="gradhome">
                  <div class="row recommendations-title">
                    These are some people that share your interests:
                  </div>
                  <div class="row">
                  ';

    for ($i=0; $i<5; $i++){

    echo '
                    <div class="col-xs-15  border-right margin-10">
                        <a href="'. SITE_ROOT .'/profile-info.php?id='. $friendRecommendations[$i] .'" >&nbsp;
                          <div class="row recommendation-picture">
                            <img src="https://apppanoblob.blob.core.windows.net/profilepics/' . $friendProfilePictureIDs[$i].'.jpg" class="img-circle friend-recommendation-picture" />
                          </div>
                          <div class="row recommendation-friend-name" style="color:white">
                            '.$friendRecommendations[$i].'
                          </div>
                        </a>
                      <div class=" row recommendation-friending-icon">
                      <button class="send-request-button-coll" id="'.$friendIDs[$i].'"> <i class="fa fa-3x fa-user-plus friending-icon" ></i> </button>
                      <button class="cancel-request-button-coll" id="'.$friendIDs[$i].'">  <i class="fa fa-3x fa-user-times friending-icon" ></i>

                      </div>

                    </div>';
    }


    include('friendRequestJS.php');


    echo '
                  </div>
              </div>
              <br></div>';



} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn) . "<br>";
}



?>
