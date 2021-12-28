<?php
/*
Template Name: Integrated Audit
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-------------------------------------------*/
/*  ACF Page our-value
/*-------------------------------------------*/
$pageFields = get_fields();


?>




<div id="integrated-audit" class="intern-pg">
  <!-- 0 banner -->
  <?php get_template_part( '/inc/parts/banner-top-2section' ); ?>

  <!--1 subbanner -->

  <?php if($pageFields['subbanner']): ?>
  <section class="subbanner shadow-bottom">
    <div class="container-xl">
      <?php echo $pageFields['subbanner']; ?>
    </div>
  </section>
  <?php endif; ?>


  <!-- 2  why-laika -->
  <section class="sec_2  horizontal__block horizontal__block-lines mt-5 mb-5">
    <div class="container-xl">
      <div class="headline">
        <div class="title title-purple mb-5"><?php echo $pageFields['sec_two_ltitle']; ?></div>
        <div class="text"><?php echo $pageFields['sec_two_lsubtitle']; ?></div>
      </div>

      <div class="contentWrap">
        <?php 
        $sec2 = $pageFields['sec_two_list']; 
        foreach( $sec2 as $item ) {
      ?>
        <item class="icons">
          <img class='lazyload' src='<?php echo $item['image']['url'] ?>' alt='<?php echo $item['image']['title'] ?>'
            width='auto' height='60' />
          <span class="sub-title"><?php echo $item['heading']; ?></span>
          <p><?php echo $item['text']; ?></p>
        </item>
        <?php }  ?>
      </div>

    </div>
  </section>




  <!-- sec_4 integrated-audit -->
  <?php if (get_field('sec_three_title')):  ?>
  <section class="full-bar  bg-gray sec_3  text-center text-purple block-padding ">
    <div class="container-xl">

      <h2><?php echo get_field('sec_three_title'); ?></h2>
      <div class="content">
        <?php  
          $img1 = get_field('part-1'); 
          ?>
        <img class='lazyload' src='<?php echo $img1['url']; ?>' alt='<?php echo $img1['title']; ?>' width='33%'
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
