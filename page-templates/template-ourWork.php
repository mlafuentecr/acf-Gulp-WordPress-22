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

//get a number of post

//I filter just on type of post 

// Get feature post

?>
<main class="main-content our-work">

  <header class=" my-5">
    <div class="container ">
      <div class="row my-5">
        <div class="col">
          <?php echo $header; ?>
        </div>
        <div class="submenu col-3">
          menu
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
