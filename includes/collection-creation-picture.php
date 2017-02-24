<?php

class picture{
    private $collectionImageID;
     private $collectionName;
     private $borderRight = '';

public function __construct($collectionImageID){
$this->collectionImageIDA = $collectionImageID;
}


public function returnHTML(){

$output =  ' <div class="col col-sm-4 picture-list-col">
    <a href="">
          <img src="'.SITE_ROOT.'/images/panoramas/'.$this->collectionImageIDA.'.jpg" class="img-responsive  picture-list-picture" />
        </a>
  </div>
  ';

echo $output;
}

}



 ?>
