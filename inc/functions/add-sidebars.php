<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function director_widgets_init(){
 /* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => esc_html__( 'Sidebar', 'director' ),
			'description'   => esc_html__( 'Add widgets here.', 'director' ),
			'before_widget' => '<aside id="sidebarMenu" class=" col-md-3 col-lg-2 d-md-block bg-light sidebar mr-4 ">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'director_widgets_init' );
