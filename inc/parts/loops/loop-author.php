<?php
/**
 * 
 * @package Rootstrap_Blog
 */
/* Get last three posts */
$the_query = new WP_Query( array(
     'author'          => $author_ID,
  )); 

while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
<div class="col">

  <div class="card  bg-transparent  ">

    <a class="card-link" href="<?php echo get_permalink(); ?>">
      <div class="card-img mb-4 zoom_img"
        style="background-image: url(<?php   echo get_the_post_thumbnail_url( get_the_ID() ); ?>);">
      </div>
    </a>

    <div class="card-body  p-0  ">
      <a class="card-link" href="<?php echo get_permalink(); ?>">
        <div class="title link_main_style text-white">
          <?php echo get_the_title(); ?>
        </div>
      </a>
      <p class="card-text  text-gray"><?php echo get_the_excerpt(); ?></p>


      <!-- Show Author info -->

      <div class="author mt-3 py-3 d-flex borderY-2">

        <?php $authorId = get_the_author_meta('ID'); ?>

        <div class="author_pic px-2" style='background-image: url("<?php echo get_avatar_url($authorId); ?>");'>
        </div>
        <div class="px-2 flex-grow-1 ">
          <div class="col-12 author_name"><a href="<?php echo get_author_posts_url($authorId); ?>" target="_blank"
              rel="noopener noreferrer"><?php echo get_the_author_meta( 'display_name');  ?></a>
          </div>

          <div class="author_data d-flex">
            <div class="author_date"><?php echo date("F j, Y", strtotime($post->post_date)) . "<br>"; ?></div>
            <div class="author_time_reading"> <?php echo get_field( 'time_estimation', $post->ID) ?: '5'; ?> min
              read
            </div>

          </div>
        </div>
      </div>

      <!-- Show Categories -->
      <div class="categories mt-3">
        <?php 
  $categories = get_the_category( $post->ID );
  if ( ! empty( $categories ) ) {
      foreach( $categories as $category ) {
        echo '<a href="'. get_category_link( $category->term_id ) .'"  alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"target="_blank" rel="noopener noreferrer">' . esc_html( $category->name ) . '</a>';
      }
    }
  ?>
      </div>


    </div>
  </div>



</div>
<?php 
    endwhile; 
    wp_reset_postdata();
?>
