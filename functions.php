<?php

/*-----------------------------------------------------------------------------------*/
//     defines
/*-----------------------------------------------------------------------------------*/
$GLOBALS['THEME_MLM_PATH'] 	= get_template_directory_uri();
$GLOBALS['THEME_MLM_VER'] 	= '3';
$GLOBALS['THEME_SETTING_PG'] 	= 2994;
$GLOBALS['THEME_MLM_ENV'] = '';

/*-----------------------------------------------------------------------------------*/
//     Variables LOCAL OR DIST
/*-----------------------------------------------------------------------------------*/
// Get the hostname
$http_host      = $_SERVER['HTTP_HOST'];
$ENV            = '';
$local          = 'heylaikacomnewver5.local';
$staging        = 'destiny.kinsta.cloud';
$production     = 'heylaika.com';

$environments = array(
  'local'       => $local,
  'staging'     => $staging,
  'production'  => $production
);


foreach($environments as $environment => $hostname) {
  if (stripos($http_host, $hostname) !== FALSE) {
    //     Set Enviroment
    if($environment === 'local' ){
      $GLOBALS['THEME_MLM_ENV'] 	= 'src';
    }else{
      $GLOBALS['THEME_MLM_ENV'] 	= 'dist';
    }
    break;
  }
}


/*-----------------------------------------------------------------------------------*/
//     1) Array of files to include.
/*-----------------------------------------------------------------------------------*/

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() ;

$understrap_includes = array(
   //'/inc/functions/cleanup.php', // clean all website code elements from wp
   '/inc/functions/enqueue.php', // Enqueue scripts and styles.
   '/inc/functions/add_menus.php', // define menus
  '/inc/functions/custom_dashboard.php', // add new look to dashboad
  '/inc/functions/dashboad_menu.php', // add my menu for client use to dashboar
  '/inc/functions/custom_login_look.php', // re look the loging
  '/inc/functions/wp_support.php', // add wp supporth has thumbnails ect
  '/inc/functions/acfAdmin.php', // Theme Settings tab
  '/inc/functions/acfToJson.php', // save acf data and load it
  '/inc/functions/add_widgets.php', // widgets support
 
);

foreach ($understrap_includes as $file) {
 require_once $understrap_inc_dir . $file;
}
