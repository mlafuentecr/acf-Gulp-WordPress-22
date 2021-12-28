<?php
/*
Template Name: Customer Success
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page Customer Success
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

?>
<div id="customer-success" class="intern-pg">

  <!-- 0 banner -->
  <?php get_template_part( '/inc/parts/banner-top-2section' ); ?>


  <!-- 2 content list -->
  <section class="sec2 content-list shadow-bottom  block">
    <div class="container">


      <?php if ($pageFields['sec_two_title']): ?>
      <div class="headline">
        <div class="title title-purple"><?php echo $pageFields['sec_two_title']; ?></div>
        <div class="text"><?php echo $pageFields['sec_two_content']; ?></div>
      </div>
      <?php endif; ?>




    </div>
  </section>


  <!-- 3 Manage and automate -->
  <section class="manage-automate  horizontal__block horizontal__block-lines horizontal-list">
    <div class="container">

      <?php if ($pageFields['sec_three_heading']): ?>
      <div class="headline">
        <div class="title title-purple"><?php echo $pageFields['sec_three_heading']; ?></div>
        <div class="text"><?php echo $pageFields['sec_three_content']; ?></div>
      </div>

      <div class="contentWrap">
        <?php 
      $sec = get_field('sec_three_list'); 
      if( $sec ) :
        foreach( $sec as $item ) {
      ?>
        <item>
          <span class="sub-title"><?php echo $item['title']; ?></span>
          <p><?php echo $item['content']; ?></p>
        </item>
        <?php } endif; endif; ?>
      </div>


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
        <div class="title "><?php echo $item['title']; ?></div>
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
