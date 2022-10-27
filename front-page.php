<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package director
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="front-page" class="container ">
	<?php
        if ( have_posts() ) : 
          while ( have_posts() ) : the_post(); 
 
			the_post();
			get_template_part( 'inc/template-parts/content', get_post_type() );

			if ( comments_open() || get_comments_number() ) { comments_template();	}
		endwhile; 
	else:
		get_template_part( 'inc/template-parts/content', 'none' );
	endif; 
	?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
