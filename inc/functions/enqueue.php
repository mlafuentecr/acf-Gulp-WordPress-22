<?php

// /*-----------------------------------------------------------------------------------*/
// /* FRONT-END ENQUEUE FUNCTIONS
// /*-----------------------------------------------------------------------------------*/


function enqueue_header()
{

  if ( is_front_page() ) {
    wp_enqueue_style('index',         $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/homepage.min.css', array(), $GLOBALS['THEME_MLM_VER']); 
  }
   else {
    wp_enqueue_style('internal',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/internal.css', array(), $GLOBALS['THEME_MLM_VER']);
  }
  /*******************  JavaScript Bundle with Popper  CDN vr5  ********************/
  wp_enqueue_style('bootstrap',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/bootstrap.min.css', array(), $GLOBALS['THEME_MLM_VER']);
}

add_action('wp_enqueue_scripts', 'enqueue_header');




function enqueue_footer() {
  //I used DIst direct bc if I put them on src will created a loop on gulp file
  /******************* LOAD JS ?defer  ********************/
  if ( is_front_page() ) {
  wp_enqueue_script('main',      $GLOBALS["THEME_MLM_PATH"].  '/dist/js/bundle_home.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
  }else {
  wp_enqueue_script('intern',   $GLOBALS["THEME_MLM_PATH"].  '/dist/js/bundle_intern.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
  }
  /*******************  JavaScript Bundle with Popper  CDN vr5  ********************/
  wp_enqueue_script( 'bootstrap', $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bootstrap.bundle.min.js?defer', array(), $GLOBALS['THEME_MLM_VER'],  true);

  // // wp_register_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
  // // wp_enqueue_style('Font_Awesome');

    }
add_action( 'wp_enqueue_scripts', 'enqueue_footer' );






//add_action('wp_head','header_enqueud', 20);
 
function header_enqueud() {
  ?>
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
})(window, document, 'script', 'dataLayer', 'GTM-M9GVHWG');
</script>
<!-- End Google Tag Manager -->
<?php
  }
  
  
  
  
