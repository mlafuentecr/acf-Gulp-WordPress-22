<?php
/*
Template Name: request demo
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$content = $pageFields['content'];

?>


<div class="intern-pg">
  <div class="container requesDemo">
    <?php if ($content['title']): ?>
    <h1><?php echo $content['title']; ?></h1>
    <div class="text"><?php echo $content['content']; ?></div>
    <?php endif; ?>

    <section class="form"><?php echo $pageFields['form'];?></section>
  </div>
</div>


<?php get_footer(); ?>
