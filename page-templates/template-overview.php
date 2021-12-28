<?php
/*
Template Name: Overview
*/
defined( 'ABSPATH' ) || exit;
get_header(); 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value Overview o Laika products
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();

?>
<div id="overview" class="intern-pg">


  <!-- 0 banner -->
  <?php get_template_part( '/inc/parts/banner-top-2section' ); ?>




  <!-- 2  -->
  <?php if ($pageFields['sec_two_title']): ?>
  <section class="sec_2 content-list block">
    <div class="container-xl">

      <div class="headline">
        <div class="title title-purple"><?php echo $pageFields['sec_two_title']; ?></div>
        <div class="text"><?php echo $pageFields['sec_two_content']; ?></div>
      </div>

      <?php foreach ($pageFields['sec_two_list'] as $secTwoListValue): ?>
      <article class="item">
        <div class="imgWrap">
          <img class='lazyload' src='<?php echo $secTwoListValue['image']['url']; ?>' alt='' width='auto'
            height='300' />
        </div>
        <div class="content">
          <div class="title title-purple"><?php echo $secTwoListValue['heading']; ?></div>
          <?php echo $secTwoListValue['text']; ?>
          <?php if($secTwoListValue['link']): ?>
          <a href="<?php echo $secTwoListValue['link']['url']; ?>"
            class="arrow"><?php echo $secTwoListValue['link']['title']; ?></a>
          <?php endif;?>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
  </section>
  <?php endif; ?>




  <!-- 3 list   -->
  <?php if (get_field('sec_three_title')):  ?>
  <section class="sec_3 full-bar horizontal__block  bg-purple block-padding">
    <div class="container-xl">
      <?php 
        $title = get_field('sec_three_title'); 
        $content = get_field('sec_three_content'); 
      ?>

      <?php if ($title): ?>
      <header>
        <div class="title"><?php echo $title; ?></div>
        <div class="text"><?php echo  $content; ?></div>
      </header>
      <?php endif; ?>

      <div class="contentWrap">
        <?php foreach ($pageFields['sec_three_list'] as $sec3ListValue): ?>
        <item class="icons">
          <img class='lazyload' src='<?php echo $sec3ListValue['icon']; ?>' alt='' width='auto' height='300' />
          <div class="content">
            <?php echo $sec3ListValue['content']; ?>

          </div>
        </item>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
  <?php endif; ?>


  <!-- 4 sec_four_list -->
  <?php if ($pageFields['sec_four_list']): ?>
  <section class="sec_4 content-list block">
    <div class="container-xl">

      <?php foreach ($pageFields['sec_four_list'] as $secfourListValue): ?>

      <article class="item">
        <div class="imgWrap">
          <img class='lazyload' src='<?php echo $secfourListValue['image'] ?>' alt='' width='auto' height='300' />
        </div>
        <div class="content">
          <div class="title title-purple"><?php echo $secfourListValue['heading'] ?></div>
          <?php echo $secfourListValue['text']; ?>

          <?php if($secfourListValue['link']): ?>
          <a href="<?php echo $secfourListValue['link']['url']; ?>"
            class="arrow"><?php echo $secfourListValue['link']['title']; ?></a>
          <?php endif;?>
        </div>
      </article>
      <?php endforeach; ?>

    </div>
  </section>
  <?php endif; ?>




  <!-- 5 sec_five-better experience  -->
  <?php get_template_part( '/inc/parts/banner-footer-intern' ); ?>


</div>
</div>




</div>


<?php get_footer(); ?>
