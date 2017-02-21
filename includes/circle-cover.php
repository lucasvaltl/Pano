<?php

class circle{
  private$collectionLinkA;
    private $collectionImageIDA;
     private$collectionNameA;
   private  $collectionLinkB;
   private  $collectionImageIDB;
     private$collectionNameB;
     private $borderRight = '';

public function __construct($collectionLinkA, $collectionImageIDA, $collectionNameA){
$this->collectionLinkA = $collectionLinkA;
$this->collectionImageIDA = $collectionImageIDA;
$this->collectionNameA = $collectionNameA;
}

public function setBorderRight(){
  $this->borderRight = 'border-right';
}


public function returnHTML(){


$output =  ' <div class="col col-sm-6 mask-container ' . $this->borderRight . '">
    <a href="'.SITE_ROOT.'/' . $this->collectionLinkA . '">

    <p>
          <img src="'.SITE_ROOT.'/images/panoramas/'.$this->collectionImageIDA.'.jpg" class="img-responsive  circle-cover circle-cover" />
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
