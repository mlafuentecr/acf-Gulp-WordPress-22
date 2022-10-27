<?php
/*-----------------------------------------------------------------------------------*/
/* Register menus for Wordpress use
// This theme uses wp_nav_menu() in one location.
/*-----------------------------------------------------------------------------------*/
register_nav_menus( array( 'position_top' => __('Primary', 'director' ), ) );
register_nav_menus( array( 'social' => __('Social', 'director' ), ) );
// register_nav_menus( array( 'mobile'  => __( 'Mobile', 'director' ), ) );
// register_nav_menus( array( 'footer' => __( 'Footer', 'director' ), ) );
// register_nav_menus( array( 'social' => __( 'Social', 'director' ), ) );

/*-----------------------------------------------------------------------------------*/
/* add nav-item to li for boostrap
/*-----------------------------------------------------------------------------------*/

//Add nav-item to li for boostrap
function clear_nav_menu_item_class( $classes, $item, $args ) {
	if( $args->theme_location == 'position_top' ) {
	$classes[] = 'nav-link dropdown';
	}
	return $classes;
	//Remove Class from li
	//return array();
}
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);


$randomNumber = rand(15,35);

//Add nav-link to the link for boostrap
function director_add_specific_menu_location_atts( $atts, $item, $args ) {
	// check if the item is in the primary menu
	if( $args->theme_location == 'position_top' ) {
		// add the desired attributes:
		$atts['class'] = 'nav-link';
	}
	if (in_array('menu-item-has-children', $item->classes)) {
		$atts['class'] = 'nav-link dropdown-toggle';
		$atts['aria-expanded'] = 'false';
		$atts['id'] = 'navbarDropdownMenuLink' ;
		$atts['role'] ='button';
		$atts['data-bs-toggle'] ='dropdown';
  }
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'director_add_specific_menu_location_atts', 10, 3 );


function director_change_submenu_class($menu) {  
	$menu = preg_replace('/class="sub-menu"/', '/class="dropdown-menu"/ /aria-labelledby="navbarDropdownMenuLink"/', $menu);
	return $menu;  
}  
add_filter('wp_nav_menu','director_change_submenu_class');

/*-----------------------------------------------------------------------------------*/
/* add Quote to top menu
/*-----------------------------------------------------------------------------------*/

function director_add_search_and_quote( $items, $args ) {
	// get menu
	$menu = wp_get_nav_menu_object( $args->menu );

	// modify primary only
	if ( $args->theme_location == 'position_top' ) {

		$is_wp_user = is_user_logged_in();
		$is_imis_user = ( function_exists( 'imis_token' ) && imis_token() ) ? true : false;

		// append html
		$items = "<i class='menu-item quote p-0 me-lg-auto'>Grain Elevator and Processing Society</i>" . $items;
		$items .= "<li id='menu-item-9' class='menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-9 nav-item menu-top-primary_link'>";
		if ( $is_imis_user ) {
			$items .= "<a href='https://members.director.com/iMIS/director/MyAccount' aria-current='page' class='nav-link'>My Account</a>";
		} else {
			if ( $is_wp_user ) {
				//$items .= "<a href='/wp/wp-admin/index.php' aria-current='page' class='nav-link'>WP</a>&nbsp;-&nbsp;";
				$items .= "<a href='http://members.director.com/iMIS/director/SignIn' aria-current='page' class='nav-link'>iMIS Login</a>";
			} else {
				$items .= "<a href='http://members.director.com/iMIS/director/SignIn' aria-current='page' class='nav-link'>Sign in / Join</a>";
			}
		}
		$items .= "</li>";
		$items .= "<form class='form-top d-flex' role='search' action='/' method='get'>";
		$items .= "<input class='searchBtn' type='submit' id='searchsubmit' value='" . esc_attr__('Search') . "' />";
		$items .= "<input class='form-top__input  rounded-pill '   placeholder='Enter Search…' aria-label='Search' type='text' name='s' id='search' />";
		$items .= "</form>";
	}

	// return
	return $items;
}
//add_filter('wp_nav_menu_items', 'director_add_search_and_quote', 10, 2);
