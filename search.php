<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package director
 */
get_header();
set_query_var( 'title', 'Search Results' );
get_template_part("/inc/template-parts/content","header-feature");

?>
<main class=" container-fluid container-md mt-5 position-relative ">
	<div class="bg-white util__move-up util__move-up-2  px-4  px-lg-0  util__extraBorder  util__extraBorder__t-10">
		<!-- the_breadcrumb Desktop -->
		<div class="d-none d-md-flex my-md-3">
			<?php if ( function_exists( 'the_breadcrumb' ) ) { the_breadcrumb(); } ?>
		</div>

		 <div class="main-content d-flex  flex-column flex-lg-row">
			<section class="d-flex d-flex flex-column flex-lg-row content-section">
				<div class="me-lg-3  d-flex flex-column  flex-grow-1 ">
					<?php

					if ( have_posts() ) {

						get_search_form();

						$i = 0;

						global $wp_query;

						while ( have_posts() ) {
							the_post();
							$i++;
							$last_item = ( $wp_query->post_count == $i ) ? 'last-item' : '';

							$title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-title">\0</strong>', $title);
							$excerpt = get_the_excerpt(); $keys= explode(" ",$s); $excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $excerpt);

							?>
							<div class="entry-content border-bottom search-item <?php echo $last_item; ?>">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h2><?php echo $title; ?></h2></a>
								<?php echo $excerpt; ?>
							</div>
							<?php
						}

						// pagination
						$args = array(
							'prev_text'          => __( '<' ),
							'next_text'          => __( '>' ),
							'orderby'            => array(
								'date'               =>'ASC',
								),
							'post_status'        => 'publish',
							'screen_reader_text' => 'Post navigation'
						);

						echo "<div class='pagination mt-4 mb-4 pb-3 pt-4'>" . paginate_links( $args ) . "</div>";

					} else {
						get_template_part("/inc/template-parts/content","none");
					}

					// restore original Post Data
					wp_reset_postdata();
					?>
				</div>
			</section>

			<!-- SIDEBAR -->
			<?php
			set_query_var( 'position_1', 'form' );
			set_query_var( 'position_2', 'ad-sidebar' );
			set_query_var( 'position_3', 'calendar' );
			get_template_part( "/inc/template-parts/sidebar", "general" );
			?>


		</div>
	</div>
</main>

<?php
get_footer();
