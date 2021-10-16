<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 


?>
<div id="none" class="intern-pg">
  <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h1>
  <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			$kses = array( 'a' => array( 'href' => array() ) );
			printf(
				/* translators: 1: Link to WP admin new post page. */
				'<p>' . wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'understrap' ), $kses ) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :

			printf(
				'<p>%s<p>',
				esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' )
			);
			get_search_form();

		else :

			printf(
				'<p>%s<p>',
				esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'understrap' )
			);
			get_search_form();

		endif;
		?>
</div>
<?php   edit_post_link(__('Edit This page'));  ?>

<?php get_footer(); ?>
