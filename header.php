<!DOCTYPE html>
<?php 
    //Logo
    $ond_logo = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $ond_logo , 'full' );

?>

<html <?php language_attributes();?>>

  <head name="top">


    <!-- - Google Analytics in enqueud -->
    <meta charset="<?php bloginfo('charset');?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <?php wp_head();?>
    <!-- favicons -->
    <!--[if IE]><link rel="shortcut icon" href="favicon.ico" /><![endif]-->
    <link rel="apple-touch-icon" sizes="180x180"
      href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
      href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
      href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" crossorigin="use-credentials"
      href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- no-cache -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />




    <?php 
  $post = get_post();
  $slugname = get_post_field( 'post_name', $post );
  ?>

  </head>

  <body id="<?php echo $slugname; ?>" <?php body_class();?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9GVHWG" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">

      <!--[if lt IE 8]>
			<p class="browserupgrade">
      You are using an <strong>outdated</strong> browser. 
      Please <a href="http://browsehappy.com/">upgrade your browser</a> 
      to improve your experience.</p>
		<![endif]-->


      <!-- Banner announcement-->
      <?php get_template_part( '/inc/parts/banner','announcements'); ?>

      <header id='header-top'>
        <div class='container  d-flex'>

          <?php if($image[0]) : ?>
          <section class='logo'>
            <a href="/"> <img loading=“lazy” width="180" height="106.3" src=" <?php echo $image[0]; ?>"
                alt="<?php bloginfo( 'name' ) ?>"></a>
          </section>
          <?php endif; ?>

          <!-- menu Primary list DESKTOP-->
          <?php get_template_part( '/inc/parts/menu','primary'); ?>



          <!-- mobile part 2 hamburger-->
          <section id="menu-button">
            <div class="button-inner-wrapper">
              <span class="icon menu-icon"></span>
              <span class="icon menu-icon"></span>
            </div>
          </section>
        </div>
      </header>



      <main role="main">

        <!-- menu for mobile -->
        <section class="menuMobile">

          <div class='container  d-flex'>
            <?php if($image[0]) : ?>
            <section class='logo'><a href="/"> </a></section>
            <?php endif; ?>
            <!-- mobile part 2 hamburger-->
            <section class=" closeMenu" id="menu-button"></section>
          </div>

          <!-- menu Primary list MOBILE-->
          <div class="wrapper mobile-menu">
            <?php get_template_part( '/inc/parts/menu','primary'); ?>
          </div>
        </section>
