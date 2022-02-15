<?php 
$args = array(
  'post_type' => 'case_study',
  'post_status' => 'publish',
  'posts_per_page' => 20,
  'orderby' => 'title',
  'order' => 'ASC',
  );
  $loop = new WP_Query( $args );
  
?>



<section class="case_study text-black">
  <div class="container  <?php echo $margen; ?>">
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-5  ">

      <?php 
      while ( $loop->have_posts() ) : $loop->the_post();
      $postid = get_the_ID();
     
      ?>

      <div class="col my-5">
        <a class="card-link" href="<?php echo get_the_permalink(); ?>" rel="noopener noreferrer">
          <div class='card bg-transparent case-<?php echo $post->ID; ?>'>
            <div class="card-img mb-4 zoom_img"
              style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID ); ?>);">
            </div>
            <div class="card-body  p-0  ">
              <!-- Show Categories -->
              <div class="categories ">
                <?php 
            
          $categories = get_field( 'small_description', $post->ID );
          $term  = $categories['type_of_business'];
          
          if ( $term ) {
              foreach( $term as $category ) {
                echo '<span class="cs_category_subtitle">'.$category->name .'</span>';
              }
            }
          ?>
              </div>

              <?php 
            $pageFields   = get_fields($postid);
          
            echo '<span class="title">' . $pageFields['headline']['headline_title'] . '</span>';
             echo ' <div class="text-gray">';

              if( $pageFields['small_description']['excerpt'] ){
                echo $pageFields['small_description']['excerpt'];
              }else{
                echo $excerpt;
              }

           echo '</div>'
          ?>
            </div>
          </div>
        </a>
      </div>




      <?php 
endwhile;
wp_reset_postdata();  ?>



    </div>

  </div>
</section>
