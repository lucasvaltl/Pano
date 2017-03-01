<?php


class frienditem{
    private $friendID;
    private $friendName;
    private $friendLink;
    private $friendPictureID;
    private $isFriendOfUser;

    public function __construct($friendID, $friendName, $friendLink, $friendPictureID,  $isFriendOfUser){
        $this->friendID =$friendID;
        $this->friendName =$friendName;
        $this->friendLink =$friendLink;
        $this->friendPictureID =$friendPictureID;
        $this->isFriendOfUser =$isFriendOfUser;
    }



    function friendRequest($friendID,$userID) {

        include('dbconnect.php');

        $sql = "INSERT INTO `friendrequests` ('UserID', 'FriendID') VALUES ('" . $userID . "', '" . $friendID . "');";
        if (isset($conn)) {
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }


public function returnHTML(){

        $output = '<div class="row search-content">
    <div class="col-md-6 col-xs-6 friend-name">
    <a href="'.SITE_ROOT.'/profile-info.php?id='.$this->friendLink.'">&nbsp;
    <img src="'.SITE_ROOT.'/images/profilepics/'.$this->friendPictureID.'.jpg" class="img-circle friend-picture" /> &nbsp; &nbsp; &nbsp; &nbsp; '.$this->friendName.'
    </a>
    </div>
    <div class="col col-md-6 col-xs-6 friending-icon">';
        if($this->isFriendOfUser){
            $output .= '<!-- need to implement friending here! -->
      <i  class="fa fa-3x fa-check friending-icon" ></i>
      </div>
      </div>
      <hr>';


        }else{

            //add dummy functionality to "friend". needs to be enhanced once connected to the database. Currently based on angular
            $output .= '<!-- need to implement friending here! -->
      <a href="" class="" onclick= "friendRequest()" ng-click="isfriend'.$this->friendName.' = !isfriend'.$this->friendName.'"> <i  class="fa fa-3x fa-check friending-icon" ng-show="isfriend'.$this->friendName.'" ></i>
      <i  class="fa fa-3x fa-user-plus friending-icon" ng-hide="isfriend'.$this->friendName.'"></i>
      </a>
      </div> 
      
      
      
<script> function friendRequest(){<?php friendRequest($this->friendID,$_SESSION[\'UserID\']) ?>
</script>



      </div>
      <hr>';

        }
        return $output;

    }
}




