<?php
$authorId     = $post->post_author; 
$user         = get_userdata($authorId);
$data         = get_field('author_info', 'user_'. $authorId);

$name                 = $data['data']['author_name_and_lastname'];
$author_profession    = $data['data']['author_profession'];
$author_description   = $data['data']['author_description'];
$author_picture       = $data['author_picture'];

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
  
  ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <header class="entry-header d-flex flex-column justify-content-center align-content-center align-items-center">
    <div class="categories  text-center text-white mt-3">
      <?php 
          $categories = get_the_category( $post->ID );
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                echo ' <a aria-label="' . esc_html( $category->name ) . ' " href="'. get_category_link( $category->term_id ) .'"  alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"target="_blank" rel="noopener noreferrer"> ' . esc_html( $category->name ) . ' </a> ';
              }
            }
          ?>
    </div>
    <?php the_title( '<h1 class="entry-title mx-auto mt-2 mb-3 text-center">', '</h1>' ); ?>
    <div class="entry-meta d-flex flex-column text-center text-white">

      <div class="col-12 author_name">
        <a aria-label="<?php echo $name; ?>" href="<?php echo get_author_posts_url($authorId); ?>" target="_blank"
          rel="noopener noreferrer"><?php echo $name; ?>
        </a>

      </div>
      <div class="author_date"><?php echo date("F j, Y", strtotime($post->post_date)) . "<br>"; ?></div>
      <div class="author_time_reading"> <?php echo get_field( 'time_estimation', $post->ID) ?: '5'; ?> min
        read
      </div>

      <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->



  <div class="entry-content">
    <?php the_content(); ?>


  <?php 
  //  <!-- Show TAGS NEW -->
  get_template_part( 'inc/parts/list', 'tags' );
  ?>

  <?php 
  // Show Categories 
  // set_query_var( 'postId', absint( $post->ID ) ); 
  // get_template_part( 'inc/parts/list', 'categories' ); 
  ?> 

    <!-- Show Author info -->
    <div class="wantToWork mt-4 py-3 d-flex borderY-2">
      <div class="wantToWork_pic px-2 col-12" style='background-image: url("<?php echo $author_picture['url']; ?>");'>
      </div>
      <div class="ps-3">
        <div class=" wantToWork_name">
          <a aria-label="<?php echo get_the_author_meta( 'display_name',  $authorId);  ?>"
            href="<?php echo get_author_posts_url($authorId); ?>" target="_blank"
            rel="noopener noreferrer"><?php echo get_the_author_meta( 'display_name',  $authorId);  ?>
          </a>
        </div>
        <p class="wantToWork_hiring">Want to work with <?php echo $name; ?>?</br><a href="/careers/#career-block"
            class="underline">We are hiring :)</a></p>
      </div>
    </div>



    <?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rootstrap' ),
				'after'  => '</div>',
			)
		);
		?>
  </div><!-- .entry-content -->


</article><!-- #post-## -->
