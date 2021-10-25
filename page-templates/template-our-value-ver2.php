<?php
/*
Template Name: Our Value ver2
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

?>
<div id="our-value-ver2" class="intern-pg">

  <!-- 0 banner -->
  <?php get_template_part( '/inc/parts/banner-top-2section' ); ?>


  <!-- 2 content list -->
  <section class="sec2 content-list shadow-bottom  block">
    <div class="container">


      <?php if ($pageFields['sec_two_title']): ?>
      <div class="headline">
        <h2><?php echo $pageFields['sec_two_title']; ?></h2>
        <div class="text"><?php echo $pageFields['sec_two_content']; ?></div>
      </div>
      <?php endif; ?>


      <?php foreach ($pageFields['sec_two_list'] as $secTwoListValue): ?>

      <article class="item">

        <div class="imgWrap">
          <img class='lazyload' src='<?php echo $secTwoListValue['image'] ?>' alt='' width='auto' height='300' />
        </div>

        <div class="content">
          <h3><?php echo $secTwoListValue['heading'] ?></h3>
          <p class="items_paragraph"><?php echo nl2br($secTwoListValue['text']) ?></p>
        </div>
      </article>

      <?php endforeach; ?>



    </div>
  </section>


  <!-- 3 Manage and automate -->
  <section class="manage-automate horizontal-list">
    <div class="container">

      <?php if ($pageFields['sec_three_heading']): ?>
      <div class="headline">
        <h2><?php echo $pageFields['sec_three_heading']; ?></h2>
        <div class="text"><?php echo $pageFields['sec_three_content']; ?></div>
      </div>


      <?php 
      $sec = get_field('sec_three_list'); 
      if( $sec ) :
        foreach( $sec as $item ) {
      ?>
      <article>
        <h4><?php echo $item['title']; ?></h4>
        <p><?php echo $item['content']; ?></p>
      </article>

      <?php } endif; endif; ?>
    </div>
  </section>


  <!-- 4 before-after  -->
  <?php if (have_rows('sec_four_list')):  ?>
  <section class="before-after ">
    <div class="container">
      <?php 
        $sec = get_field('sec_four_list'); 
        if( $sec ) : 
          foreach( $sec as $item ) {
      ?>
      <article>
        <h4><?php echo $item['title']; ?></h4>
        <div class="text"><?php echo $item['content']; ?></div>
      </article>
      <?php } endif;  ?>
    </div>
  </section>
  <?php endif; ?>



  <!-- 5 sec_five-better experience  -->
  <?php get_template_part( '/inc/parts/banner-footer-intern' ); ?>


</div>


<?php get_footer(); ?>
