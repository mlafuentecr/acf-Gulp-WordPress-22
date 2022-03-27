<?php 
  //Logo
  $logo = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $logo , 'full' );
?>

<!-- Menu -->
<nav id="menu-top" class="navbar d-flex navbar-expand-md align-items-center p-3  navbar-light bg-light ">
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
    <?php get_template_part( '/inc/parts/content', 'menuPrimary'); ?>
    <a class='phone' href="tel:1-212-234-0814"><img
        src="<?php echo get_stylesheet_directory_uri(); ?>/inc/images/phone-icon.svg"
        title="Call Rootstrap - Get in touch" alt="Rootstrap Phone" width="16" height="16">
      +1 (310) 907-9210
    </a>
    <a class="btn btn-cta rounded-pill d-none d-md-flex"
      href="<?php echo get_permalink( get_page_by_title( 'Contact' ) ); ?>">Get
      Started</a>
  </div>
</nav>
