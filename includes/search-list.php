<?php


class frienditem{
    private $friendID;
    private $friendName;
    private $friendLink;
    private $friendPictureID;
    private $isFriendOfUser;
    private $friendRequestSent;

    public function __construct($friendID, $friendName, $friendLink, $friendPictureID,  $isFriendOfUser, $friendRequestSent){
        $this->friendID =$friendID;
        $this->friendName =$friendName;
        $this->friendLink =$friendLink;
        $this->friendPictureID =$friendPictureID;
        $this->isFriendOfUser =$isFriendOfUser;
        $this->friendRequestSent=$friendRequestSent;
    }


public function returnHTML(){

    $typeOfRequestIcon = ($this->friendRequestSent ? 'requested' :'');

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
