<?php

/*-----------------------------------------------------------------------------------*/
/*
si es develop ponga unas funciones si no ponga otras .$GLOBALS['THEME_MLM_ENV'].
* Register Custom Navigation Walker new version is call class- old wp-bootstrap
*/
function register_navwalker()
{
require_once get_template_directory() .'/assets/includes/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

// Incluir Bootstrap CSS
function bootstrap_css()
{
  wp_enqueue_style('bootstrap_css',
  get_stylesheet_directory_uri() . '/assets/src/boostrap/css/bootstrap.css', array(), '4.1.3');
}

// Incluir Bootstrap JS
function bootstrap_js()
{
  wp_enqueue_script('bootstrap_js',
  get_stylesheet_directory_uri().'/assets/src/boostrap/js/bootstrap.js', array('jquery'), '4.1.3', true);
}

//solo agregelo si estamos en Development sino lo toma del css principal
if($GLOBALS['THEME_MLM_ENV'] 	=== '1src'){
  add_action('wp_enqueue_scripts', 'bootstrap_css');
  add_action('wp_enqueue_scripts', 'bootstrap_js');
}




/*----------------------------------- HOW ------------------------------------------------*/
/* Meter en Header
<nav class="navbar navbar-expand-md navbar-light bg-light"
role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<button class="navbar-toggler"
type="button"
data-toggle="collapse"
data-target="#bs-example-navbar-collapse-1"
aria-controls="bs-example-navbar-collapse-1"
aria-expanded="false"
aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug');?>">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#">Navbar</a>
<?php
wp_nav_menu(array(
'theme_location' => 'primary',
'depth' => 2,
'container' => 'div',
'container_class' => 'collapse navbar-collapse',
'container_id' => 'bs-example-navbar-collapse-1',
'menu_class' => 'nav navbar-nav',
'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
'walker' => new WP_Bootstrap_Navwalker(),
));
?>
*/
