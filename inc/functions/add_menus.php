<?php
/*-----------------------------------------------------------------------------------*/
/* Register menus for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(array(
 'primary' => __('Primary Menu', 'mlm'),
));
register_nav_menus(array(
 'mobile' => __('Mobile Menu', 'mlm'),
));
register_nav_menus(array(
 'footer' => __('Footer Menu', 'mlm'),
));
register_nav_menus(array(
 'social' => __('Social Media', 'mlm'),
));

/*-----------------------------------------------------------------------------------*/
/* add active
/*-----------------------------------------------------------------------------------*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
