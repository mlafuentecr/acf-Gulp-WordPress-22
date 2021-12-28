<?php
/*
Template Name: About 
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$banner = $pageFields['banner_image'];

?>
<div id="about" class="intern-pg">

  <!-- 0 banner -->
  <?php get_template_part( '/inc/parts/banner-top-2section' ); ?>


  <!-- 2 social boxes -->
  <?php if ($pageFields['boxes']): ?>
  <section class="content-list social-box block shadow-bottom ">
    <div class="container-xl">

      <?php 
      $boxes = $pageFields['boxes']['box'];
      foreach( $boxes as  $box ) {
          if($box['box_image_or_box_content'] === "image"){
            echo ' <section class="box_content random-img" style="background-color:'.$box["color"].'">
          
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
      <div class="title "><?php echo $pageFields['sec_4_title']; ?></div>
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
        <div class="title title-purple"><?php echo $pageFields['sec_5_title']; ?></div>
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
        <div class="title"><?php echo $pageFields['net_title']; ?></div>
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


  <!-- 5 footer-banner  -->
  <?php get_template_part( '/inc/parts/banner-footer-intern' ); ?>







</div>

<?php get_footer(); ?>
