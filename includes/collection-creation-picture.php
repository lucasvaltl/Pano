<?php

class picture{
    private $collectionImageID;
     private $collectionName;
     private $borderRight = '';

public function __construct($collectionImageID){
$this->collectionImageID = $collectionImageID;
}


public function returnHTML(){

$output =  ' <div class="col col-sm-4 picture-list-col picture-list-picture-container">
    <a href="" class="picture-list-picture" ng-click="toggleSelected'.$this->collectionImageID.' = !toggleSelected'.$this->collectionImageID.'" ng-model="toggleSelected'.$this->collectionImageID.'">
          <img src="'.SITE_ROOT.'/images/panoramas/'.$this->collectionImageID.'.jpg" class="img-responsive  picture-list-picture" ng-class="(toggleSelected'.$this->collectionImageID.' )? \'picture-list-picture-selected\':\'\' " name="'.$this->collectionImageID.'"/>
        </a>
        <i class="fa fa-check fa-4x" ng-show="toggleSelected'.$this->collectionImageID.'"></i>
  </div>
  ';

echo $output;
}

}



 ?>
