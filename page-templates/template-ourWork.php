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
$header = $pageFields['header'];

//reduce name a simple format
function makeSimplename($name){
  $nameSimple =  strtolower($name);
  $nameSimple =  str_replace(" ","", $nameSimple);
  return $nameSimple;
}
//get all terms in taxonomy from case of study
function categoriesName($name){

  /*---------------------------------------------------------*/
  /*  Get all type of business names  
  /*---------------------------------------------------------*/
  $args = array(
    'post_type'       => 'case_study',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'orderby'         => 'title',
    'order'           => 'ASC',
    );

 $catsLoop = new WP_Query( $args );

 
  /// foreach posts get_the_terms 
  if ( $catsLoop->have_posts() ) :
    echo '<button data-name="all" class="all">All</button>';
    while ( $catsLoop->have_posts() ) : $catsLoop->the_post();
    $terms = get_the_terms( get_the_ID(), 'type_of_business' );

    if (is_array($terms) || is_object($terms))
        {
            foreach ( $terms as $type ) {
              if($type->name){ echo '<button data-name="' . __( $type->name ) . '" class="'. makeSimplename($type->name) .'">' . __( $type->name ) . '</button>';}
            }

        }
  endwhile; 
  endif;
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
          <?php echo categoriesName($name); ?>
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
