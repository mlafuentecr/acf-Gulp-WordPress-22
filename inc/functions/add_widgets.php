<?php
/**
 * Register widget area.
* <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
* <div id="secondary" class="widget-area" role="complementary">
  * <?php dynamic_sidebar( 'sidebar-1' ); ?>
  * </div>
*<?php endif; ?>
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/


function wp_bootstrap_starter_widgets_init() {

register_sidebar( array(
'name' => esc_html__( 'Footer 1', 'wp-bootstrap-starter' ),
'id' => 'footer-1',
'description' => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );

register_sidebar( array(
'name' => esc_html__( 'Footer 2', 'wp-bootstrap-starter' ),
'id' => 'footer-2',
'description' => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );



register_sidebar( array(
'name' => esc_html__( 'Footer 3', 'wp-bootstrap-starter' ),
'id' => 'footer-3',
'description' => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );


register_sidebar( array(
'name' => esc_html__( 'form', 'wp-bootstrap-starter' ),
'id' => 'form',
'description' => esc_html__( 'Add widgets here.', 'wp-bootstrap-starter' ),
'before_widget' => '<section id="%1$s" class="widget %2$s">',
  'after_widget' => '</section>',
'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
) );


}
add_action( 'widgets_init', 'wp_bootstrap_starter_widgets_init' );





//By default, shortcodes are not allowed to be executed in a custom HTML widget. this change it
add_filter( 'widget_text', 'do_shortcode' );



?>
