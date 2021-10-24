<?php
/*
Template Name: Integrated Audit ver2
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-------------------------------------------*/
/*  ACF Page our-value
/*-------------------------------------------*/
$pageFields = get_fields();
$banner = $pageFields['banner_image'];

?>
<div id="integrated-audit-ver2" class="intern-pg">
  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container-xl">
      <article class="headline">
        <?php if ($pageFields['banner_title']): ?>
        <div class="content">
          <h1><?php echo $pageFields['banner_title']; ?></h1>
          <div class="text"><?php echo $pageFields['banner_content']; ?></div>
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


  <!--1 subbanner -->

  <?php if($pageFields['subbanner']): ?>
  <section class="subbanner shadow-bottom">
    <div class="container-xl">
      <?php echo $pageFields['subbanner']; ?>
    </div>
  </section>
  <?php endif; ?>


  <!-- 2  why-laika -->
  <section class="sec_2 why-laika  horizontal-list block">
    <div class="container-xl">


      <div class="headline">
        <h2><?php echo $pageFields['sec_title']; ?></h2>
        <div class="text"><?php echo $pageFields['subtitle']; ?></div>
      </div>


      <?php 
        $sec2 = $pageFields['sec_two_list']; 
        foreach( $sec2 as $item ) {
      ?>
      <article>
        <img class='lazyload' src='<?php echo $item['image']['url'] ?>' alt='<?php echo $item['image']['title'] ?>'
          width='auto' height='60' />
        <h4><?php echo $item['heading']; ?></h4>
        <p><?php echo $item['text']; ?></p>
      </article>

      <?php }  ?>
    </div>
  </section>




  <!-- sec_4 integrated-audit -->
  <?php if (get_field('sec_three_title')):  ?>
  <section class="full-bar faq bg-purple sec_3 integrated-audit  block-padding ">
    <div class="container-xl">

      <h2><?php echo get_field('sec_three_title'); ?></h2>
      <div class="content">
        <?php  
          $img1 = get_field('part-1'); 
          $img2 = get_field('part-2'); 
          $img3 = get_field('part-3'); 
          ?>
        <img class='lazyload' src='<?php echo $img1['url']; ?>' alt='<?php echo $img1['title']; ?>' width='33%'
          height=' auto' />
        <img class='lazyload' src='<?php echo $img2['url']; ?>' alt='<?php echo $img2['title']; ?>' width='33%'
          height=' auto' />
        <img class='lazyload' src='<?php echo $img3['url']; ?>' alt='<?php echo $img3['title']; ?>' width='33%'
          height=' auto' />
      </div>

    </div>
  </section>
  <?php endif; ?>



  <!-- 4 sec_four_list  why-laika-->
  <?php if ($pageFields['articles']): ?>
  <section class="sec_4 content-list  block">
    <div class="container-xl">

      <?php foreach ($pageFields['articles'] as $articles): ?>

      <article class="item">

        <div class="headline">
          <h2><?php echo $articles['title']; ?></h2>
          <div class="text"><?php echo $articles['subtitle']; ?></div>
        </div>


        <div class="imgWrap">
          <img class='lazyload' src='<?php echo $articles['image']['url'] ?>' alt='' width='auto' height='160' />
        </div>
        <div class="content">
          <?php echo $articles['content']; ?>

          <?php if($articles['link']): ?>
          <a href="<?php echo $articles['link']['url']; ?>" class="arrow"><?php echo $articles['link']['title']; ?></a>
          <?php endif;?>
        </div>
      </article>
      <?php endforeach; ?>



    </div>
  </section>
  <?php endif; ?>

  <!-- 5 -->
  <?php if ($pageFields['sec_five_title']): ?>
  <section class="full-bar faq bg-purple sec_5 integrated-audit  block-padding ">
    <div class="container-xl">

      <div class="headline">
        <h2><?php echo $pageFields['sec_five_title']; ?></h2>
      </div>

      <div class=" two-block">

        <?php 
           $post_id = $pageFields['post']->ID;
           $fields = get_fields($post_id );
          echo ' <section>'.get_the_post_thumbnail( $post_id, 'large' ).'</section>';
         ?>

        <section>
          <h4><?php echo $pageFields['post']->post_title; ?> </h4>
          <?php if($fields['preview_content']): ?>
          <div class="content"><?php echo $fields['preview_content']; ?> </div>
          <div class="date less-important"> <?php echo $fields['post_creation_date']; ?> .
            <?php echo $fields['author']['name']; ?> .
            <?php echo $fields['reading_time']; ?> </div>
          <?php endif; ?>
        </section>
      </div>

    </div>
  </section>
  <?php endif; ?>



</div>


<?php get_footer(); ?>
