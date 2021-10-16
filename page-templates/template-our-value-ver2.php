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
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container">
      <article class="headline">

        <?php if ($pageFields['banner_title']): ?>
        <div class="content">
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <div class="text"><?php echo $pageFields['banner_content']; ?></div>
          <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
        </div>
        <?php endif; ?>

        <?php if ($pageFields['banner_image']['image']): ?>
        <div class="hero">
          <span class="text"><?php echo $pageFields['banner_image']['description_image'] ?></span>
          <img src="<?php echo $pageFields['banner_image']['image'] ?>" class="block-picture__img"
            alt="<?php echo $pageFields['banner_image']['description_image'] ?>">
        </div>
        <?php endif; ?>

      </article>
    </div>
  </section>



  <!-- 2 content list -->
  <section class="content-list shadow-bottom  block">
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
  <section class="manage-automate">
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



  <!-- 5 sec_five_titler  -->
  <?php if (get_field('sec_five_title')):  ?>
  <section class="enterprise-ready footer-banner">
    <div class="container">
      <?php 
        $title = get_field('sec_five_title'); 
        $link = get_field('sec_five_link'); 
    
      ?>
      <article>
        <h4><?php echo $title; ?></h4>
        <a rel="noopener" class='arrow ' href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
      </article>

    </div>
  </section>
  <?php endif; ?>


</div>


<?php get_footer(); ?>
