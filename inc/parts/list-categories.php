<div class="categories tags my-3">
  <?php $postId = get_query_var('postId'); ?>
    <div class="tags">
    <?php 
      $categories = get_the_category( $postId );
        if ( ! empty( $categories ) ) {
          foreach( $categories as $category ) {
            echo '<a href="'. get_category_link( $category->term_id ) .'"  alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"target="_blank" rel="noopener noreferrer">' . esc_html( $category->name ) . '</a>';
          }
        }
    ?>
    </div>
</div>


