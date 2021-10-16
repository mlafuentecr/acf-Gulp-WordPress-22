<?php
/*
Template Name: Integrated Audit ver2
*/
defined( 'ABSPATH' ) || exit;
get_header(); 

/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$bannerGroup = $pageFields['banner_audit_left_col'];//
$bannerBtn  = $pageFields['banner_button_audit'];
?>
<div id="integrated-audit" class="intern-pg">
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

  <!--4 solution -->
  <section class="solution">
    <div class="container">


      <h2><?php echo $four_heading; ?></h2>
      <div class="contentWrap">
        <?php 
        if( $fourth_content ) {
        echo '<ul  class="icons">';
        foreach( $fourth_content as $img ) {
          echo '<li>
          <img loading=“lazy” width="93px"  height="93px" src="'. $img["icon"]["url"] .'" alt="'. $img["icon"]["name"] .'">
          <span class="number">'.$img["number"].'</span>
          <span class="content">'.$img["text"].'</span>
          </li>';
          }
        echo '</ul>';
        }
        ?>


      </div>
    </div>
  </section>


  <!--4 solution -->
  <section class="integrations">
    <div class="container">


      <?php if ($pageFields['banner_title']): ?>
      <header>
        <h1><?php echo $pageFields['banner_title']; ?></h1>
        <div class="text"><?php echo $pageFields['banner_content']; ?></div>
        <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
      </header>
      <?php endif; ?>

      <div class="contentWrap">
        <?php 
        if( $fourth_content ) {
        echo '<ul  class="icons">';
        foreach( $fourth_content as $img ) {
          echo '<li>
          <img loading=“lazy” width="93px"  height="93px" src="'. $img["icon"]["url"] .'" alt="'. $img["icon"]["name"] .'">
          <span class="number">'.$img["number"].'</span>
          <span class="content">'.$img["text"].'</span>
          </li>';
          }
        echo '</ul>';
        }
        ?>
      </div>


    </div>
  </section>


</div>


<?php get_footer(); ?>
