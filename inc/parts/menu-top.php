<?php 
  //Logo
  $logo = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $logo , 'full' );
?>


<nav class="navbar d-flex navbar-expand-md px-3 navbar-dark fixed-top bg-dark">

  <section class='logo d-flex justify-content-start flex-grow-1'>
    <?php if($image[0]) : ?>
    <a class="d-flex justify-content-between align-center" href="<?php echo home_url(); ?>">
      <img loading=“lazy” width="180" height="106.3" src=" <?php echo $image[0]; ?>"
        alt="<?php bloginfo( 'name' ) ?>"></a>
    <?php endif; ?>
  </section>

  <button class="navbar-toggler  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarCollapse">

    <?php get_template_part( '/inc/parts/menu', 'primary'); ?>

    <form role="search" method="get" id="searchform" class="search-box searchform d-none d-md-flex"
      action="<?php echo site_url()?>">
      <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/inc/'images/navbar_search_white.svg'"
        alt="search button">
      <input class="search-input" type="text" name="s" id="s" placeholder="Search">
    </form>

    <a class="btn btn-cta d-none d-md-flex" href="<?php echo get_permalink( get_page_by_title( 'Contact' ) ); ?>">Get
      In Touch</a>

  </div>

</nav>










</div>
