<?php

class frienditem{
  private $friendName;
  private $friendLink;
  private $friendPictureID;
  private $isFriendOfUser;

  public function __construct($friendName, $friendLink, $friendPictureID,  $isFriendOfUser){
    $this->friendName =$friendName;
    $this->friendLink =$friendLink;
    $this->friendPictureID =$friendPictureID;
    $this->isFriendOfUser =$isFriendOfUser;
  }

  public function returnHTML(){
    $output = '<div class="row friend-content">
    <div class="col-md-6 col-xs-6 friend-name">
    <a href="'.SITE_ROOT.'/'.$this->friendLink.'.php">&nbsp;
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
      <a href="" class="" ng-click="isfriend'.$this->friendName.' = !isfriend'.$this->friendName.'"> <i  class="fa fa-3x fa-check friending-icon" ng-show="isfriend'.$this->friendName.'" ></i>
      <i  class="fa fa-3x fa-user-plus friending-icon" ng-hide="isfriend'.$this->friendName.'"></i>
      </a>
      </div>
      </div>
      <hr>';
    }

    return $output;
  }
}
