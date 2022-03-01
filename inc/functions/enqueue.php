<?php

// /*-----------------------------------------------------------------------------------*/
// /* FRONT-END ENQUEUE FUNCTIONS
// /*-----------------------------------------------------------------------------------*/

function enqueue_header()
{
  
  /*******************  enqueue_header   ********************/
  if ( is_front_page() ) {
    wp_enqueue_style('index',         $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/homepage.min.css', array(), $GLOBALS['THEME_MLM_VER']);
  }
  else {
    wp_enqueue_style('internal',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/internal.css', array(), $GLOBALS['THEME_MLM_VER']);
  }


  /*******************  enqueue_footer   ********************/
  //I used DIst direct bc if I put them on src will created a loop on gulp file
  /******************* LOAD JS ?defer  ********************/
  if ( is_front_page() ) {
   wp_enqueue_script('main',      $GLOBALS["THEME_MLM_PATH"] .  '/dist/js/bundle_home.js?defer', array(), $GLOBALS['THEME_MLM_VER']);
  }elseif(is_page( $GLOBALS['careerPg']  )){
   wp_enqueue_script('block_jobs',   $GLOBALS["THEME_MLM_PATH"].  '/dist/js/block_jobs.js?defer', array(), $GLOBALS['THEME_MLM_VER']);
  }else {
    wp_enqueue_script('intern',   $GLOBALS["THEME_MLM_PATH"] .  '/dist/js/bundle_intern.js?defer', array(), $GLOBALS['THEME_MLM_VER']);
  }


  /*******************  bootstrap CSS  ********************/
  wp_enqueue_script('bootstrapjs', $GLOBALS["THEME_MLM_PATH"] .  '/dist/js/bootstrap.bundle.min.js', array(), $GLOBALS['THEME_MLM_VER']);
  wp_enqueue_style('bootstrap',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/bootstrap.min.css', array(), $GLOBALS['THEME_MLM_VER']);
  //'http://roostrapdev-new-vr1.local/wp-includes/css/dist/block-library/style.min.css?ver=5.9' type='text/css' media='all' /
}

add_action('wp_enqueue_scripts', 'enqueue_header');
