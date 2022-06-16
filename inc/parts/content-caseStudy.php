<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
  $pageFields = get_fields();
  $header     = $pageFields['header'];

  //Get featrure image
  $feature_a_post = $pageFields['feature_a_post'];
  $postId         = $feature_a_post[0];
  $feaure_post    = get_fields($postId);
  $small_desc     = $feaure_post['small_description'];

  //Get fields from case study
  $pageFields     = get_fields(570);
  $header         = $pageFields['header'];

  //image
  $image          = $feaure_post['headline']['headline_image'];
  $thumb          = $feaure_post['small_description']['thumbnail']; //
  //Get thumbnail image if is not then take the other image
  $thumbnail      = $thumb ? $thumbnail = $thumb['url'] : $thumbnail = $image['url'];

  $bg_color       = $small_desc['background_color'];
  $color          = $small_desc['header_font_color'];
  $excerpt        = $small_desc['excerpt'];

  //Switchs
  $cols           = $pageFields['cols'];
  $margen         = $pageFields['margen'];
  $add_title      = $pageFields['add_title'];
  $add_excerpt    = $pageFields['add_excerpt'];
  $add_author     = $pageFields['add_author'];
  $quantity       = $pageFields['quantity'];


  //Slider
  $slider_size    = $pageFields['slider_size']; 
  $title          = $pageFields['title']; 
  $slider         = $pageFields['slider']; //repeter

  // get Term from url
  $terms          = $_GET['terms'];

  /*---------------------------------------------------------*/
  /*  args 
  /*---------------------------------------------------------*/
  //$quantity if is 0 then make it -1 this bring all the post else get epecific number of post
  $quantity === 0 ? $quantity = -1 : $quantity;

  if($terms){
  
    //Query by term
    $args = array(
      'post_type'       => 'case_study',
      'post_status'     => 'publish',
      'post__not_in'    => array($postId),
      'posts_per_page'  => $quantity ,
      'orderby'         => 'title',
      'order'           => 'ASC',
          'tax_query' => array(
            array (
                'taxonomy' => 'type_of_business',
                'field' => 'slug',
                'terms' => $terms,
            )
        ),
      );

  }else{
  
    //QUery all
    $args = array(
      'post_type'       => 'case_study',
      'post_status'     => 'publish',
      'post__not_in'    => array($postId),
      'posts_per_page'  => $quantity ,
      'orderby'         => 'title',
      'order'           => 'ASC',
      );

  }

  $loop = new WP_Query( $args );

  $catArr     = array();


  //get all terms in taxonomy from case of study
  
  function categoriesName(){
   //Get all type of business names  for MENU
    $args = array(
      'post_type'       => 'case_study',
      'post_status'     => 'publish',
      'posts_per_page'  => -1,
      'orderby'         => 'title',
      'order'           => 'ASC',
      );
  
   $catsLoop = new WP_Query( $args );
  
  
   /* FIll the menu of taxonomy terms */
    /// foreach posts get_the_terms 
    if ( $catsLoop->have_posts() ) :
      
      while ( $catsLoop->have_posts() ) : $catsLoop->the_post();
      $terms = get_the_terms( get_the_ID(), 'type_of_business' );
      global $catArr;
      
      if (is_array($terms) || is_object($terms))
          {
            foreach($terms as $type){
              $name =  $type->name;
              $slug =  $type->slug;
              $catArr[$slug] = $name;
            }
        
          }
  
    endwhile; 
    endif;
  }
  categoriesName();
  
 function getCat(){
  //Bring global cat array
 global $catArr;
 //look for unique names
 $array = array_unique($catArr, SORT_REGULAR);

 //Add all
 echo '<button data-name="all" class="all my-2">All</button>';
 //print uniques names
 foreach($array as  $key=>$type){
   if($type){ echo '<button data-name="' . $key . '" class=" mb-2 '. $key .'">' . $type . '</button>';}
 }
}

?>

<header class=" my-0 my-md-5">
  <div class="container ">
    <div class="row my-0  my-md-5">
      <div class="col my-5 my-md-0">
        <?php echo $header; ?>
      </div>
      <div class="submenu d-flex  flex-column justify-content-center align-content-between hide col-3 my-5 my-md-0">
        <?php echo getCat(); ?>
      </div>
    </div>
  </div>
</header>

<?php  if(!$terms): ?>
<!-- feature post Only first screen-->
<section class="block_caseStudy_post feature_post py-5 <?php echo $block['className']; ?>   my-5"
  style="background-color: <?php  echo $bg_color; ?>">
  <div class="container  my-5 ">
    <a class="card-link" href="<?php echo get_permalink( $postId ); ?>" rel="noopener noreferrer">
      <div class="d-flex flex-wrap ">
        <div class="col-12 col-md-7 block_caseStudy_imgBg zoom_img"
          style="background-image: url(<?php  echo $thumbnail; ?>);">
        </div>
        <div class="col-12 col-md-5  p-4 d-flex justify-content-center flex-column align-content-center">
          <?php  echo $excerpt; ?>
        </div>
      </div>
    </a>
  </div>
</section>
<?php  endif; ?>

<!-- Case studies -->
<section class="case_study text-black">
  <div class="container  <?php echo $margen; ?>">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-<?php echo $cols; ?> g-5  ">

      <?php 
      if ( $loop->have_posts() ) :
      while ( $loop->have_posts() ) : $loop->the_post();
      $postid = get_the_ID();
      $image_id = get_post_thumbnail_id( $postid );
     $alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
      ?>

      <div class="col my-0 my-md-5">
        <a class="card-link" href="<?php echo get_the_permalink( $postid ); ?>" rel="noopener noreferrer">
          <div class='card bg-transparent case-<?php echo $post->ID; ?>'>
            <div class="card-img mb-4 zoom_img" role="img" aria-label="<?php echo $alt_text; ?>"
              style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>);">
            </div>
            <div class="card-body  p-0  ">
              <!-- Show Categories -->
              <div class="categories ">
                <?php 
                $categories = get_field( 'small_description', $post->ID );
                $term  = $categories['type_of_business'];
                
                if ( $term ) {
                    foreach( $term as $category ) {
                      echo '<h3 class="cs_category_subtitle">'.$category->name .'</h3>';
                    }
                  }
                ?>
              </div>

              <?php 
                  $pageFields   = get_fields($postid);
                  echo '<span class="title">' . $pageFields['headline']['headline_title'] . '</span>';
                  echo ' <div class="text-gray">';
                    if( $pageFields['small_description']['excerpt'] ){
                      echo $pageFields['small_description']['excerpt'];
                    }else{
                      echo $excerpt;
                    }

                echo '</div>'
            ?>
            </div>
          </div>
        </a>
      </div>

      <?php endwhile; ?>


      <?php wp_reset_postdata(); ?>
      <?php else : ?>
      <p><?php _e( 'Sorry, no news events posts at this time.', 'theme' ); ?></p>
      <?php endif; ?>



    </div>

  </div>
</section>
