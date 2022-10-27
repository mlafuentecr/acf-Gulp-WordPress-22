<?php
/**
 * The sidebar containing the main widget area
 * Sidebar is call  inc/template-parts/sidebar-general.php 
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
