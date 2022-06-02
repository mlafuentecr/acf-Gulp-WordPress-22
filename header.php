  <!DOCTYPE html>
  <html class="h-100" <?php language_attributes();?>>

    <head id="header-top" name="top">

      <!-- Google Tag Manager -->
      <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-NV5QQ2');
      </script>
      <!-- End Google Tag Manager -->

      <!--=== META TAGS ===-->
      <meta charset="<?php bloginfo('charset');?>" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="author" content="Name">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="ahrefs-site-verification" content="0b9562a2d0aadf12aeef9882336237ead90ff952810b53e14829c7acdb1f1992">

      <!--=== LINK TAGS ===-->
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
      <!-- <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="0" /> -->
      <!--=== TITLE ===-->
      <!-- <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title> -->


      <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed"
        href="<?php echo esc_url(get_feed_link()); ?>">

      <!--=== WP_HEAD() ===-->
      <?php wp_head(); ?>
    </head>

    <body id="<?php echo get_post_field( 'post_name', get_post() ); ?>"
      <?php body_class('d-flex flex-column justify-content-center  bg-black ');?>>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NV5QQ2" height="0" width="0"
          style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

      <?php  get_template_part( '/inc/parts/menu','top'); ?>



      <!--[if lt IE 8]>
  <p class="browserupgrade">
  You are using an <strong>outdated</strong> browser. 
  Please <a href="http://browsehappy.com/">upgrade your browser</a> 
  to improve your experience.</p>
  <![endif]-->
