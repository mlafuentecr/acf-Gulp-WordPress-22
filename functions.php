<?php
/**
 * director functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package director
 */


/*-----------------------------------------------------------------------------------*/
//     VERSION
/*-----------------------------------------------------------------------------------*/
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '0.0.3' );
}

define( 'THEME_PATH', get_template_directory_uri() );


/*-----------------------------------------------------------------------------------*/
//     Variables LOCAL OR DIST
/*-----------------------------------------------------------------------------------*/
// Get the hostname
$http_host  = $_SERVER['HTTP_HOST'];
$ENV        = '';
$local      = 'localhost:10018';
$staging    = 'localhost:10018';
$production = 'director.com';


$environments = array(
	'local'      => $local,
	'staging'    => $staging,
	'production' => $production,
);


/*-----------------------------------------------------------------------------------*/
//     defines
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ENVIROMENT' ) ) {
	foreach ( $environments as $environment => $hostname ) {
		if ( stripos( $http_host, $hostname ) !== false ) {
			//     Set Enviroment
			if ( $environment === 'local' ) {
				define( 'ENVIROMENT', 'src' );
			} else {
				define( 'ENVIROMENT', 'dist' );
			}
			break;
		}
	}
}


/*-----------------------------------------------------------------------------------*/
//     1) Array of files to include.
/*-----------------------------------------------------------------------------------*/

// UnderStrap's includes directory.
$director_inc_dir = get_template_directory().'/inc/functions/';

$director_includes = array(
	'enqueue.php', // Enqueue scripts and styles.
	'add-menus.php',
	'add-sidebars.php',
	'theme-support.php',
	'add_acf_theme_options.php',
	'add_custom_post_type.php',
	'add_taxonomy.php',
	'add-breadcrumb.php',
	'add_helpers.php', //Any othe function we need
	'add_richText.php',
	'add_blocks.php',
	'advertising.php',
);

foreach ($director_includes as $file) {
	require_once $director_inc_dir . $file;
}

