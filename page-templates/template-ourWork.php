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



?>
<main class="main-content our-work">



  <!-- case_study loop -->
  <?php get_template_part("/inc/parts/content", "caseStudy"); ?>

  <!-- testimonials -->
  <?php get_template_part("/inc/parts/content", "testimonial"); ?>

  <!-- form -->
  <?php get_template_part("/inc/parts/content", "form"); ?>



</main>

<?php get_footer(); ?>
