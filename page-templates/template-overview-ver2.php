<?php
/*
Template Name: Overview ver2
*/
defined( 'ABSPATH' ) || exit;
get_header(); 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$banner = $pageFields['banner_image'];

?>
<div id="overview-ver2" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container-xl">
      <article class="headline">

        <?php if ($pageFields['banner_title']): ?>
        <div class="content">
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <div class="text">
            <?php echo $pageFields['banner_content']; ?>
          </div>
          <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
        </div>
        <?php endif; ?>

        <?php if ($banner['image']): ?>
        <div class="hero">
          <span class="text"><?php echo $banner['description_image'] ?></span>
          <img src="<?php echo $banner['image'] ?>" class="block-picture__img"
            alt="<?php echo $banner['description_image'] ?>">
        </div>
        <?php endif; ?>

      </article>
    </div>
  </section>



  <!-- 2  -->
  <?php if ($pageFields['sec_two_title']): ?>
  <section class="sec_2 content-list block">
    <div class="container-xl">

      <div class="headline">
        <h2><?php echo $pageFields['sec_two_title']; ?></h2>
        <div class="text"><?php echo $pageFields['sec_two_content']; ?></div>
      </div>

      <?php foreach ($pageFields['sec_two_list'] as $secTwoListValue): ?>
      <article class="item">
        <div class="imgWrap">
          <img class='lazyload' src='<?php echo $secTwoListValue['image']['url']; ?>' alt='' width='auto'
            height='300' />
        </div>
        <div class="content">
          <h3><?php echo $secTwoListValue['heading']; ?></h3>
          <?php echo $secTwoListValue['text']; ?>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
  </section>
  <?php endif; ?>

  <!-- 3 list   -->
  <?php if (get_field('sec_three_title')):  ?>
  <section class="sec_3 full-bar bg-purple block-padding">
    <div class="container-xl">
      <?php 
        $title = get_field('sec_three_title'); 
        $content = get_field('sec_three_content'); 
      ?>

      <?php if ($title): ?>
      <header>
        <h2><?php echo $title; ?></h2>
        <div class="text"><?php echo  $content; ?></div>
      </header>
      <?php endif; ?>


      <?php foreach ($pageFields['sec_three_list'] as $sec3ListValue): ?>
      <article class="item">
        <img class='lazyload' src='<?php echo $sec3ListValue['icon']; ?>' alt='' width='auto' height='300' />
        <div class="content">
          <?php echo $sec3ListValue['content']; ?>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
  </section>
  <?php endif; ?>


  <!-- 4 sec_four_list -->
  <?php if ($pageFields['sec_four_list']): ?>
  <section class="sec_2 content-list block">
    <div class="container-xl">

      <?php foreach ($pageFields['sec_four_list'] as $secfourListValue): ?>
      <article class="item">
        <div class="imgWrap">
          <img class='lazyload' src='<?php echo $secfourListValue['image'] ?>' alt='' width='auto' height='300' />
        </div>
        <div class="content">
          <h3><?php echo $secfourListValue['heading'] ?></h3>
          <?php echo $secfourListValue['text']; ?>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
  </section>
  <?php endif; ?>



  <!-- 5 sec_five-better experience  -->
  <?php if (get_field('sec_five_title')):  ?>
  <section class="sec_4 footer-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container-xl">
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
</div>




</div>


<?php get_footer(); ?>
