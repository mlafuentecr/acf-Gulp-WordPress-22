<?php
/*
Template Name: Landing Quality assurannce  
*/
defined( 'ABSPATH' ) || exit;
get_header();

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

?>
<main class="landing-pg text-white">


  <!-- headline -->

  <header class="headline  py-5 text-white">
    <div class="container py-5">
      <div class="content d-flex flex-wrap  ">
        <h1 class="title col-12 col-md-7  me-auto "><?php echo $pageFields['headline']; ?></h1>
        <div class="col-12 col-md-3 "><?php echo $pageFields['headline_content']; ?></div>
      </div>
    </div>
  </header>

  111111


</main>



<?php get_footer(); ?>
