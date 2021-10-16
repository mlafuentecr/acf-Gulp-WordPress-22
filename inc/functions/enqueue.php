<?php

// /*-----------------------------------------------------------------------------------*/
// /* FRONT-END ENQUEUE FUNCTIONS
// /*-----------------------------------------------------------------------------------*/
/**
 * aca hago el ruter para cada file pero boostrap css en layout es lo unico de boostra que cargo
 * todos los de registros de css y js los hago en cleanup
 */



function enqueue_header()
{
    
      /******************* LOAD CSS homepage.min.css********************/
if ( is_front_page() ) {
  //wp_enqueue_script('jQuery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
  if($GLOBALS['THEME_MLM_ENV'] === 'dist'){ $type = '.min'; }else{ $type = ''; }
  wp_enqueue_style('index',      $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/homepage.min.css', array(), $GLOBALS['THEME_MLM_VER']);
        
 } elseif ( is_page( 'integrations' ) ) {
  wp_enqueue_style('internal',   $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/internal.css', array(), $GLOBALS['THEME_MLM_VER']);
  wp_enqueue_style('animationMachine',   $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/integrations.css', array(), $GLOBALS['THEME_MLM_VER']);
}elseif (  !is_front_page() ) {
  wp_enqueue_style('internal',   $GLOBALS["THEME_MLM_PATH"]. '/'.$GLOBALS['THEME_MLM_ENV'].'/css/internal.css', array(), $GLOBALS['THEME_MLM_VER']);
}


}

add_action('wp_enqueue_scripts', 'enqueue_header');




function enqueue_footer() {

        /******************* LOAD JS ?defer  ********************/
      //BOOSTRAP JS lo voy a meter el js lo meto en gulp para dist aca para local  // 'handle', 'src', 'deps', 'ver', 'in_footer'
      if ( is_front_page() ) {
        wp_enqueue_script('main',        $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_home.js?defer', array('admin-bar' ), $GLOBALS['THEME_MLM_VER'], true );
      }elseif ( is_page( 'products' ) ) {
        wp_enqueue_script('intern',        $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_intern.js?defer', array('admin-bar' ), $GLOBALS['THEME_MLM_VER'], true );
        wp_enqueue_script('animate',        $GLOBALS["THEME_MLM_PATH"]. '/dist/js/animate.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
      }elseif ( is_page( 'integrations' ) ) {
        wp_enqueue_script('intern',        $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_intern.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
        wp_enqueue_script('svg-integrations', $GLOBALS["THEME_MLM_PATH"]. '/dist/js/integrations-svg-animation.js?defer', array(), $GLOBALS['THEME_MLM_VER'], true );
      }elseif (  !is_front_page() ) {
        wp_enqueue_script('intern',        $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_intern.js?defer', array('admin-bar' ), $GLOBALS['THEME_MLM_VER'], true );
      }
      else{
        wp_enqueue_script('intern',        $GLOBALS["THEME_MLM_PATH"]. '/dist/js/bundle_intern.js?defer', array('admin-bar' ), $GLOBALS['THEME_MLM_VER'], true );
      }
 
    
    }
add_action( 'wp_enqueue_scripts', 'enqueue_footer' );
