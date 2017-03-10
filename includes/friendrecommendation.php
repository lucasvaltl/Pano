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

    for ($i = 0; $i < 5; $i++) {
        $query2 = "SELECT * FROM user
                    WHERE UserID = '$friendRecommendations[$i]'";

        if ($result2 = mysqli_query($conn, $query2)) {
            $friendUserName = mysqli_fetch_array($result2);
            $friendRecommendations[$i] = $friendUserName['UserName'];
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
                      <div class="row recommendation-picture">
                        <img src="images/profilepics/2.jpg" class="img-circle friend-recommendation-picture" />
                      </div>
                      <div class="row recommendation-friend-name">
                '.$friendRecommendations[$i].'
                      </div>
                      <div class=" row recommendation-friending-icon">
                        <a href=""><i class="fa fa-3x fa-user-plus recommendation-friending-icon smallscreen-smaller"></i></a>
                      </div>
                    </div>';
    }

    echo '
                  </div>
              </div>
              <br></div>';

} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn) . "<br>";
}

?>
