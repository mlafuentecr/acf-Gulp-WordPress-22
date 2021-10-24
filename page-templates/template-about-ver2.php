<?php
/*
Template Name: About ver2
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$banner = $pageFields['banner_image'];

?>
<div id="about-ver2" class="intern-pg">

  <!-- 0 banner -->
  <section class="intro-banner" style="background-image: url(<?php echo $pageFields['banner_background']; ?>);">
    <div class="container-xl">

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

        <img src="<?php echo $banner['image'] ?>" class="block-picture__img"
          alt="<?php echo $banner['description_image'] ?>">
      </div>
      <?php endif; ?>

    </div>
  </section>


  <!-- 2 social boxes -->
  <?php if ($pageFields['boxes']): ?>
  <section class="content-list social-box block shadow-bottom ">
    <div class="container-xl">

      <?php 
      $boxes = $pageFields['boxes']['box'];
      foreach( $boxes as  $box ) {
          if($box['box_image_or_box_content'] === "image"){
            echo ' <section class="box_content random-img " >
            <img class="random-img" src="https://picsum.photos/350/350" alt="">
            </section>';
          }else{
            echo '<section class="box_content" style="background-color:'.$box["color"].'">
            <h3>'.$box['title'].'</h3>
            <div class="content">'.$box['content'].'</div>
            </section>
            ';
          }
      }
    ?>
    </div>
  </section>
  <?php endif; ?>



  <!-- 3 founders -->
  <?php if ($pageFields['sec_three_list']): ?>
  <section class="content-list  founders block ">
    <div class="container-xl">

      <div class="headline">
        <h2><?php echo $pageFields['sec_3_title']; ?></h2>
        <div class="text"><?php echo $pageFields['sec_3_title_content']; ?></div>
      </div>


      <?php foreach ($pageFields['sec_three_list'] as $founder): ?>
        <article class="item">

          <div class="imgWrap">
            <img class='lazyload' src='<?php echo $founder['image']['url']; ?>' alt='' width='auto' height='310' />
          </div>

          <div class="content">
            <h3><?php echo $founder['content']['title']; ?></h3>
            <?php echo $founder['content']['content']; ?>
            <a class='linkedin' href="<?php echo $founder['linkedin']; ?>"></a>
          </div>

        </article>
      <?php endforeach; ?>




    </div>
  </section>
  <?php endif; ?>



  <!-- 4 Careers -->
  <?php if ($pageFields['sec_4_title']): ?>
  <section class="careers full-bar bg-purple ">
    <div class="container-xl">
      <h4><?php echo $pageFields['sec_4_title']; ?></h4>
      <div class="content">
        <?php echo $pageFields['sec_4_subtitle']; ?>
        <a href="<?php echo $pageFields['sec_4_link']['url']; ?>"
          class="arrow"><?php echo $pageFields['sec_4_link']['title']; ?></a>
      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- 5 investors  -->
  <?php if ($pageFields['sec_5_title']): ?>
  <section class="investors full-bar ">
    <div class="container-xl">

      <div class="headline">
        <h4><?php echo $pageFields['sec_5_title']; ?></h4>
      </div>

      <div class="content">
        <?php foreach ($pageFields['logos'] as $logo): ?>
        <img class='lazyload' src='<?php echo $logo['logo']['url']; ?>' alt='<?php echo $logo['logo']['title']; ?>'
          width='auto' height='80' />
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>




  <!-- 4 network -->
  <?php if ($pageFields['net_title']): ?>
  <section class="networks full-bar bg-darkGray ">
    <div class="container-xl">

      <div class="headline">
        <h4><?php echo $pageFields['net_title']; ?></h4>
        <div class="subttile"><?php echo $pageFields['net_subtitle']; ?></div>
      </div>




      <div class="content">

        <?php foreach ($pageFields['net_logos2'] as $logo): ?>

        <img class='lazyload' src='<?php echo $logo['logo']['url']; ?>' alt='<?php echo $logo['logo']['title']; ?>'
          width='auto' height='200' />
        <?php endforeach; ?>

      </div>
    </div>
  </section>
  <?php endif; ?>



  <!-- 5 footer-banne  -->
  <?php if (get_field('sec_6_title')):  ?>
  <?php $bg_sec6 =  get_field('sec_6_bg'); ?>
  <section class="sec_4 footer-banner" style="background-image: url(<?php echo $bg_sec6['url']; ?>);">
    <div class="container">
      <?php 
        $title = get_field('sec_6_title'); 
        $link_sec5 = get_field('sec_6_link'); 
    
      ?>
      <article>
        <h4><?php echo $title; ?></h4>

        <a rel="noopener" class='arrow arrow-center '
          href="<?php echo $link_sec5['url']; ?>"><?php echo $link_sec5['title']; ?></a>

      </article>

    </div>
  </section>
  <?php endif; ?>






</div>

<?php get_footer(); ?>
