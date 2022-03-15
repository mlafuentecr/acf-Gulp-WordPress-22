<?php 
function loadmore_posts(){
  $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
  $posts_per_page = !empty($_POST['posts_per_page']) ? $_POST['posts_per_page'] : 1;
    $paged++;

 $args = array(
        'paged' => 1,
        'posts_per_page' =>-1,
        'post_type'      => 'post',
        'post_status' => 'publish'
  );

    $the_query = new WP_Query( $args );
 
    if ( $the_query->have_posts() ) :

      // run the loop
      while ( $the_query->have_posts() ) : $the_query->the_post(); 

          // look into your theme code how the posts are inserted, but you can use your own HTML of course
          // do you remember? - my example is adapted for Twenty Seventeen theme

          the_title();

          // for the test purposes comment the line above and uncomment the below one
          // the_title();

      endwhile;
      wp_reset_postdata(); 
  endif;
  die; // here we exit the script and even no wp_reset_query() required!..



  
}
add_action('wp_ajax_loadmore_posts', 'loadmore_posts');
add_action('wp_ajax_nopriv_loadmore_posts', 'loadmore_posts');
?>
