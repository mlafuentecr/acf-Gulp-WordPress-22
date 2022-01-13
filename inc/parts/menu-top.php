<?php 
  //Logo
  $logo = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $logo , 'full' );
?>

<div
  class='d-flex container-fluid  flex-column  flex-md-row text-center text-md-left justify-content-between my-3 mx-3 bg-danger'>

  <section class='logo my-5  m-auto m-md-0  float-md-center m-0 p-0 d-flex  justify-content-between align-center'>
    <?php if($image[0]) : ?>
    <a class="d-flex justify-content-between align-center" href="<?php echo home_url(); ?>">
      <img loading=“lazy” width="180" height="106.3" src=" <?php echo $image[0]; ?>"
        alt="<?php bloginfo( 'name' ) ?>"></a>
    <?php endif; ?>
  </section>

  <?php get_template_part( '/inc/parts/menu', 'primary'); ?>

  <form role="search" method="get" id="searchform" class="search-box searchform d-none d-md-flex"
    action="<?php echo site_url()?>">
    <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/inc/'images/navbar_search_white.svg'"
      alt="search button" onclick="search_click()">
    <input class="search-input" type="text" name="s" id="s" placeholder="Search">
  </form>

  <a class="btn btn-cta" href="<?php echo get_permalink( get_page_by_title( 'Contact' ) ); ?>">Get In Touch</a>


</div>
