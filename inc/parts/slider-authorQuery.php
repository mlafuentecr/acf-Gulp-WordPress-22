<?php 
      //IMAGES FOR SLIDER
      $imagesToSHow     =  10;
      $imgNumber          = 1;
      $authorsArr         = array();


      
    function wrapImages($i, $pics,  $divCounter ){

      $authorId =  $pics[$i];
      $user         = get_userdata($authorId);
      $link         = home_url().'/blog/author/'.$user->user_nicename;
      
      $avatar       = get_field('author_picture', 'user_'. $authorId);
      $data         = get_field('author_info', 'user_'. $authorId);

      $name                 = $data['data']['author_name_and_lastname'];
      $author_profession    = $data['data']['author_profession'];
      $author_description   = $data['data']['author_description'];
      $author_picture       = $data['author_picture'];
      
      $avatar ? $img = $avatar['url'] : $img= esc_url( get_avatar_url( $authorId ) ); 
     

      
      $picWrap .= '
      <figure >
      <a href="'.  $link .'">
      <img width="185px" src="'. $author_picture['url'] .'" alt="'. $author_picture['alt'] .'" class="slider_author">
      <figcaption> 
      <span class="title mt-2">'. $name  .'</span>
      <span class="profession">'. $author_profession.'</span>
      </figcaption>
      </a>
      </figure> ';
     
      
    return $picWrap ;
    }


   //Insert 5 pics 
   function insertPics($pics, $slidernumber, $imgNumber, $imagesToSHow){
    //varoiable holder 
    $picWrap ='';
    //max of images to have
    $maxOfImages = $imagesToSHow * $slidernumber; //10*1 = 10
    //min of images to have
    $globals['minOfImages'] = $maxOfImages - $imagesToSHow ; //10-10 = 0
     
    $divCounter = 1;
    //IMAGES OF SLIDER
      foreach( $pics as $i => $userid ) {
      
        //number of image is 10 +  minOfImages of last slider 
          $i = $i + $minOfImages;
          $globals['imagesWidth'] = $imagesToSHow / 100*100*2;
        
    
        if( $imgNumber > $globals['minOfImages'] && $imgNumber <= $maxOfImages   ){
          //put images 2 by 2 
          if( $divCounter <= 2){
            if( $divCounter ===1){ echo '<div class="imgHolder" style="width: '. $globals['imagesWidth'] .'%">';}
              echo wrapImages($i, $pics,  $divCounter );
              if( $divCounter ===2){echo  '</div> ';}
              }
            }
            $imgNumber++;
            $divCounter++;
            //if $divCounter is higher put it in 1
        $divCounter > 2 ? $divCounter = 1 : $divCounter;
      }
      return $picWrap ;
    }
  



    
    //GET ALL PUBLISH POST TO GET AUTHORS
    $user_query = new WP_User_Query( array ( 
      'posts_per_page' => -1,
      //'role'    => 'Author',
      'orderby' => 'post_count', 
      'order'   => 'DESC'
      ) );

    // User Loop
    if ( ! empty( $user_query->results ) ) {
      foreach ( $user_query->results as $user ) {
        //Check if author have post
            $postCount = count_user_posts( $user->ID );
            if($postCount>0):
            array_push($authorsArr, $user->ID);
            endif;
      }
    }
   ?>


<div id="carouselAuthors" class="carousel carousel-dark slide" data-bs-ride="carousel">

  <header class="headline">
    <div class="container">
      <div class="col-12 col-md-8">
        <?php echo get_field('headline', $GLOBALS['blog']); ?>
      </div>
    </div>
  </header>
  <!-- header -->
  <div class="carousel-inner">
    <?php 
      if( $authorsArr ) {

        //I put a slider for each 10 pics numberOfImages
        //I count how many images are and / that by the number of pic I want to show
        $numberOfSlider= round( count($authorsArr) / $imagesToSHow );
   
        //SLIDER ONLY 
          for ($slidernumber = 0; $slidernumber <= $numberOfSlider; $slidernumber++) {
            //set the slider to 1 and not 0
            $slidernumber === 0 ?  $slidernumber = 1 : $slidernumber;
            //always first slider is active
            $slidernumber === 1 ? $status = 'active' : $status = '';
            
          //IMAGES OF SLIDER
          echo '<div class="carousel-item '.$status.'" data-bs-interval="10000"> ';
            echo '<div class="images-wrapper masonry-with-columns">';
            echo  insertPics($authorsArr, $slidernumber, $imgNumber, $imagesToSHow);
            echo '</div>';
          echo '</div>';
        }

      }

      ?>
  </div>

  <div class="buttons">
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselAuthors" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselAuthors" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- buttons -->
</div>
</div>
<!-- carouselAuthors -->
