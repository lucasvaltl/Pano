<?php


class frienditem{
    private $friendID;
    private $friendName;
    private $friendLink;
    private $friendPictureID;
    private $isFriendOfUser;
    private $friendRequestSent;
    private $mutualFriends;

    public function __construct($friendID, $friendName, $friendLink, $friendPictureID,  $isFriendOfUser, $friendRequestSent, $mutualFriends){
        $this->friendID =$friendID;
        $this->friendName =$friendName;
        $this->friendLink =$friendLink;
        $this->friendPictureID =$friendPictureID;
        $this->isFriendOfUser =$isFriendOfUser;
        $this->friendRequestSent=$friendRequestSent;
        $this->mutualFriends =$mutualFriends;
    }



public function returnHTML(){

    $typeOfRequestIcon = ($this->friendRequestSent ? 'requested' :'');

    $output = '<div class="row search-content">
    <div class="col-md-1 col-xs-1 friend-name">
    </div>
    <div class="col-md-3 col-xs-3 friend-name">
        <a href="'.SITE_ROOT.'/profile-info.php?id='.$this->friendLink.'">&nbsp;
            <img src="'. SITE_ROOT .'/AzureBackups/profilepics/'.$this->friendPictureID.'.jpg" class="img-circle friend-picture" /> &nbsp; &nbsp; &nbsp; &nbsp; '.$this->friendName.'
        </a>
    </div>

    <div class="col-md-5 col-xs-5 friend-name">
        <br> '.$this->mutualFriends.' Mutual Friends </br>
    </div>
    <div class="col col-md-3 col-xs-3 friending-icon">';
        if($this->isFriendOfUser){
            $output .= '<!-- need to implement friending here! -->
        <i  class="fa fa-3x fa-check friending-icon" ></i>
    </div>
    </div>
    <hr>';

        }else{

            $output .= '
      <button class="send-request-button '.$typeOfRequestIcon.'" id="'.$this->friendID.'"> <i class="fa fa-3x fa-user-plus friending-icon " ></i> </button>
      <button class="cancel-request-button '.$typeOfRequestIcon.'" id="'.$this->friendID.'">  <i class="fa fa-3x fa-user-times friending-icon" ></i>  </button>
      </div>
      </div>
      <hr>';
        }
        return $output;
    }
}
