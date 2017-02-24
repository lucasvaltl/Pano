<?php

class comment{
    public $userName;
    public $commentUserPictureID;
    public $commentContent;
    public $commentTimeStamp;

    public function __construct ( $userName, $commentUserPictureID, $commentContent, $commentTimeStamp ){
        $this->userName = $userName;
        $this->commentUserPictureID = $commentUserPictureID;
        $this->commentContent = $commentContent;
        $this->commentTimeStamp = $commentTimeStamp;
    }
}

class post{

    public $numComments;
    public $numLikes;
    public $userName = "";
    public $postPictureID;
    public $postUserPictureID;
    public $postDescription;
    public $postLocation;
    public $postTimeStamp;
    public $comments = array();

    public function __construct ($postPictureID, $postUserPictureID, $userName, $numLikes, $numComments, $postDescription, $postLocation, $postTimeStamp){
      $this->numComments = $numComments;
      $this->numLikes = $numLikes;
      $this->userName = $userName;
      $this->postPictureID = $postPictureID;
      $this->postUserPictureID = $postUserPictureID;
      $this->postDescription = $postDescription;
      $this->postLocation = $postLocation;
      $this->postTimeStamp = $postTimeStamp;
    }

    public function addComments($comments ){
    foreach($comments as $comment){
        $this->comments[] = $comment;
    }
    }

    public function returnHTML(){
    $currentComments = "";
      foreach ($this->comments as $comment){
        $currentComments .= ' <div class= "row post-comment">
           <div class="comment-user-picture col-md-10 col-xs-10">
             <a href="profile.php" >&nbsp;
               <img src="images/profilepics/' . $comment->commentUserPictureID . '.jpg" class="img-circle comment-picture" /> &nbsp; &nbsp; &nbsp; ' . $comment->userName . '
             </a>:
              &nbsp;    ' . $comment->commentContent . '
           </div>
           <div col-md-2 col-xs-2">'
           . $comment->commentTimeStamp . '
           </div>
          </div>
             <hr>';
      }
      //$typeOfStar = ($userHasLiked ? 'fa-star' : 'fa-star-o');
      $commentWithAnS =  (sizeof($this->comments) == 1 ? '' : 's');

      echo '<div class="post continer">
        <div class="post-picture">
          <img src="images/panoramas/' . $this->postPictureID . '.jpg" class="panorama">
        </div>

        <div class="row ">
          <div class="container post-meta vertical-center">
            <div class="post-user-picture col-md-3 col-xs-3">
              <a href="profile.php" >&nbsp;
                <img src="images/profilepics/'.$this->postUserPictureID.'.jpg" class="img-circle profile-picture" /> &nbsp; &nbsp; &nbsp; '.$this->userName.'
              </a>
            </div>
            <div class="post-like-comment col-md-1 col-xs-1 " >
              <p class="lv-icons lv-top-padding">
                <a href="#"><i class="fa fa-star fa-2x "></i></a>
                <h5>' . $this->numLikes . ' likes</h5>
              </p>
            </div>
            <div class="post-like-comment col-md-2 col-xs-2 " >
              <p class="lv-icons lv-top-padding">
                <a href="" ng-click="showcomments' . $this->postPictureID . ' = !showcomments' . $this->postPictureID . '"><i class="fa fa-comment-o fa-2x " ></i>
                <h5>' . sizeof($this->comments) . ' comment'.$commentWithAnS.'</h5>
                </a>
              </p>
            </div>
            <div class="post-content col-md-4  col-xs-4 ">
              <div class="location lv-top-padding" >
                <p>
                  <i class="fa fa-map-marker fa-lg"></i>&nbsp;  ' . $this->postLocation . '
                </p>
              </div>
              <div class="post-description">
                <p>
                  ' . $this->postDescription . '
                </p>
              </div>
            </div>
            <div col-md-2 col-xs-2">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $this->postTimeStamp . '
            </div>
          </div>
             <hr>
        </div>
        <div class="row  animated" ng-class="\'showcomments' . $this->postPictureID . '\' ? \'slideInLeft\' : \'slideOutRight\'" ng-show="showcomments' . $this->postPictureID . '">
      ' . $currentComments . '
             <div class="row user-comment">
        <input type="text" class="form-control actual-comment" placeholder="What do you want to say about it?">
          <a href="home.php" type="button" class="btn btn-default comment-button ">comment</a>
             </div>
             <hr>
      </div>
      </div>
    ';
    }

}

?>
