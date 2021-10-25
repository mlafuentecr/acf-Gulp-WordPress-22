<?php 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$banner = $pageFields['banner_image'];

?>
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
