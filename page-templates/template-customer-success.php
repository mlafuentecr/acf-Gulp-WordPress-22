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

  <!-- 0 banner  -->
  <?php 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$banner_content = $pageFields['banner_content'];
$banner_media_content = $pageFields['banner_media_content'];
$featuredstory = $pageFields['featured_story'];
?>
  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container">

      <?php if ($pageFields['banner_title']): ?>
      <div class="row col-12">
        <div class="col-md-6 col-12">
          <p class='customer_banner_title'><?php echo $banner_content['banner_title']; ?></p>
          <div class="customer_banner_subtitle"><?php echo $banner_content['banner_subtitle']; ?> </div>
          <div class="customer_banner_content"><?php echo $banner_content['banner_content']; ?> </div>
          <a class="button button-purple" rel="noopener" href="http://heylaikadev.local/request-demo/"><span>Request
              Demo</span>
          </a>
        </div>
        <div class="col-md-6 col-12">

          <!-- If if image or if  -->
          <?php //var_dump($banner_media_content); ?>

          <?php 
         
          if($banner_media_content['type'] === "Video") : 
            $videoDiv = '<div class="video"> <a href="'.$banner_media_content['video'].'" >';
            $videoDiv .= '<img class="lazyload" src="'.$banner_media_content['video_thumbnail']['url'].'" alt="'.$banner_media_content['video_thumbnail']['title'].'" />';
            $videoDiv .= '</a></div>';
            echo $videoDiv;
          endif;
          ?>


        </div>

      </div>
      <?php endif; ?>

      <?php if ($banner['url']): ?>
      <div class="hero">
        <img src="<?php echo $banner['url'] ?>" class="block-picture__img" alt="<?php echo $banner['title'] ?>">
      </div>
      <?php endif; ?>

    </div>
  </section>



  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade modal-dialog modal-dialog-centered" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>





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
