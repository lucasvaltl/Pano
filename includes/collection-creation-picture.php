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



          <img src="'.SITE_ROOT.'/images/panoramas/'.$this->collectionImageID.'.jpg" class="img-responsive  picture-list-picture"/>

        <input type="checkbox" class="create-collection-check" value="checked" name="'.$this->collectionImageID.'" id="'.$this->collectionImageID.'"/>
  </div>
  ';

echo $output;
}

}



 ?>
