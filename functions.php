<?php

/*-----------------------------------------------------------------------------------*/
//     defines
/*-----------------------------------------------------------------------------------*/
$GLOBALS['THEME_MLM_PATH'] = get_template_directory_uri();
$GLOBALS['THEME_MLM_VER']  = '0.0.7';
$GLOBALS['careerPg']       = 9682;
$GLOBALS['blog']           = 10020;
$GLOBALS['THEME_MLM_ENV']  = '';

/*-----------------------------------------------------------------------------------*/
//     Variables LOCAL OR DIST
/*-----------------------------------------------------------------------------------*/
// Get the hostname
$http_host  = $_SERVER['HTTP_HOST'];
$ENV        = '';
$local      = 'clientName.local';
$staging    = 'clientName.kinsta.cloud';
$production = 'clientName.com';

$environments = array(
 'local'      => $local,
 'staging'    => $staging,
 'production' => $production,
);

foreach ($environments as $environment => $hostname) {
 if (stripos($http_host, $hostname) !== false) {
  //     Set Enviroment
  if ($environment === 'local') {
   $GLOBALS['THEME_MLM_ENV'] = 'src';
  } else {
   $GLOBALS['THEME_MLM_ENV'] = 'dist';
  }
  break;
 }
}

/*-----------------------------------------------------------------------------------*/
//     1) Array of files to include.
/*-----------------------------------------------------------------------------------*/

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory();

$understrap_includes = array(
 '/inc/functions/cleanup.php', // clean all website code elements from wp
  '/inc/functions/enqueue.php', // Enqueue scripts and styles.
  '/inc/functions/add_menus.php', // define menus
  '/inc/functions/custom_dashboard.php', // add new look to dashboad
  '/inc/functions/dashboad_menu.php', // add my menu for client use to dashboar
  '/inc/functions/custom_login_look.php', // re look the loging
  '/inc/functions/wp_support.php', // add wp supporth has thumbnails ect
  '/inc/functions/acfToJson.php', // save acf data and load it
  '/inc/functions/add_acf_theme_options.php', // save acf data and load it
  '/inc/functions/add_widgets.php', // widgets support
 '/inc/functions/add_blocks.php', // blocks support
  '/inc/functions/add_richText.php',
 '/inc/functions/add_tiny_mce.php',
 '/inc/functions/add_taxonomy.php', // Theme taxonomy
  '/inc/functions/helpers.php', //
  '/inc/functions/load-more-ajax.php',
 //'/inc/functions/add_shortcuts.php',
 '/inc/functions/custom-post-type.php',

);

foreach ($understrap_includes as $file) {
 require_once $understrap_inc_dir . $file;
}
