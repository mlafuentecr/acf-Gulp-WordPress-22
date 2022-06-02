<?php 
  //Logo
  $logo = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $logo , 'full' );

  //Get menu object
  $locations = get_nav_menu_locations();
  $menu_id   = $locations[ 'top' ] ;
  $menu = wp_get_nav_menu_object( $menu_id );
  $contactus = get_field( "contact_us",  $menu);
  $get_started = get_field( "get_started",  $menu);
  
?>

<!-- Menu -->
<nav id="main-menu-top" class="navbar d-flex navbar-expand-md align-items-center p-3  navbar-dark ">
  <section class='logo d-flex justify-content-start '>
    <?php if($image[0]) : ?>
    <a class="d-flex justify-content-between align-center" href="<?php echo home_url(); ?>">
      <img loading=“lazy” width="180" height="106.3" src=" <?php echo $image[0]; ?>" alt="Rootstrap Home page"></a>
    <?php endif; ?>
  </section>
  <button class="navbar-toggler  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <div class="bar bar1"></div>
    <div class="bar bar2"></div>
    <div class="bar bar3"></div>
  </button>
  <div class="justify-content-end navbar-collapse collapse" id="navbarCollapse">
    <?php get_template_part( '/inc/parts/content', 'menuPrimary'); ?>
    <form role="search" method="get" id="searchform" class="search-box searchform d-none d-md-flex"
      action="<?php echo site_url()?>">
      <img class="search-icon" height='32'
        src="<?php echo get_template_directory_uri(); ?>/inc/'images/navbar_search_white.svg'" alt="Search ">
      <input tabindex="-1" class="search-input" type="text" name="s" id="s" value="<?php the_search_query(); ?>"
        placeholder="Search">
    </form>
    <a class="contactUs btn btn-cta  border-0 "
      href="<?php echo $contactus['url']; ?>"><?php echo $contactus['title']; ?></a>
  </div>
</nav>
