<?php

class collections{
  private $collectionLink;
    private $collectionImageID;
     private $collectionName;
     private $borderRight = '';

public function __construct($collectionLink, $collectionImageID, $collectionName){
$this->collectionLink = $collectionLink;
$this->collectionImageIDA = $collectionImageID;
$this->collectionNameA = $collectionName;
}

public function setBorderRight(){
  $this->borderRight = 'border-right';
}


public function returnHTML(){


$output =  ' <div class="col col-sm-6 ' . $this->borderRight . '">
    <a href="'.SITE_ROOT.'/' . $this->collectionLink . '">
    <p>
          <img src="'.SITE_ROOT.'/images/panoramas/'.$this->collectionImageIDA.'.jpg" class="img-responsive  profile-collections-title" />
    </p>
    <p>
          <h4>'.$this->collectionNameA.'</h4>
    </p>
        </a>
  </div>
  ';

echo $output;
}

}



 ?>
