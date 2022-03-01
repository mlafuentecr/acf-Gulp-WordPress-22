<?php
/*
Template Name: Our Work
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
$pageFields = get_fields();
$header     = $pageFields['header'];
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
  echo '<button data-name="all" class="all mb-2">All</button>';
  //print uniques names
  foreach($array as  $key=>$type){
    if($type){ echo '<button data-name="' . $key . '" class=" mb-2 '. $key .'">' . $type . '</button>';}
  }
 }

?>
<main class="main-content our-work">

  <header class=" my-0 my-md-5">
    <div class="container ">
      <div class="row my-0 my-md-5">
        <div class="col my-5 my-md-0">
          <?php echo $header; ?>
        </div>
        <div class="submenu d-flex  flex-column justify-content-center align-content-between hide col-3 my-5 my-md-0">
          <?php echo getCat(); ?>
        </div>
      </div>
    </div>
  </header>


  <!-- case_study loop -->
  <?php include_once(get_template_directory() . '/inc/parts/loops/loop_case_study.php'); ?>


  <!-- testimonials -->
  <?php include_once(get_template_directory() . '/inc/parts/testimonial.php'); ?>


  <!-- GET FORM -->
  <?php if ( is_active_sidebar( 'form' ) ) : ?>
  <section class="form">
    <?php dynamic_sidebar( 'form' ); ?>
  </section>
  <?php endif; ?>

</main>
