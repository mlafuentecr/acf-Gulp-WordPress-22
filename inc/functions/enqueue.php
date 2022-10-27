<?php

// /*-----------------------------------------------------------------------------------*/
// /* FRONT-END ENQUEUE FUNCTIONS
// /*-----------------------------------------------------------------------------------*/
function enqueue_header() {

	$path = get_template_directory_uri() . '/dist';

	// if ( is_front_page() ) {
	// 	/******************* IF IS HOME PAGE ********************/
	// 	wp_enqueue_style('index', $path . '/css/style.min.css?defer', array(), _S_VERSION); //css
	// 	wp_enqueue_script('index', $path . '/js/mainBundle.js?defer', array(), _S_VERSION); //js
	// } elseif ( is_page( 'blog' ) || is_single() && get_post_type() !== 'case_study' || is_page('latest-post') ){
	// 	/******************* IF IS blog single ********************/
	// 	wp_enqueue_style('intern', $path . '/css/style.min.css?defer', array(), _S_VERSION);
	// 	wp_enqueue_script('intern', $path . '/js/mainBundle.js?defer', array(), _S_VERSION); //js
	// } else {
	// 	/******************* IF IS Regular PAGE ********************/
	// 	wp_enqueue_style('intern', $path . '/css/style.min.css?defer', array(), _S_VERSION);
	// 	wp_enqueue_script('intern', $path . '/js/mainBundle.js?defer', array(), _S_VERSION); //js
	// }

		wp_enqueue_style('intern', $path . '/css/style.min.css?defer', array(), _S_VERSION);
		wp_enqueue_script('intern', $path . '/js/mainBundle.js?defer', array(), _S_VERSION); //js

	/******************* ALWAYS bootstrap CSS ********************/
	wp_enqueue_script('bootstrap', $path . '/js/bootstrap.bundle.min.js?defer', array(), _S_VERSION);
	wp_enqueue_style('bootstrap', $path . '/css/bootstrap.min.css?defer', array(), _S_VERSION);

}
add_action('wp_enqueue_scripts', 'enqueue_header');

/******************* Make defer ********************/
function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
//add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


