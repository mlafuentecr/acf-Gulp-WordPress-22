<?php 




function loadmore_posts(){
  
  $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
  $posts_per_page = !empty($_POST['posts_per_page']) ? $_POST['posts_per_page'] : 1;


  $args = array(
          'paged'           => $_POST['current_page'] + 1,
          'posts_per_page'  => 3,
          'post_type'       => 'post',
          'post_status'     => 'publish',
          'order'          => 'DESC',
          'offset'         => 3
    );



    $the_query = new WP_Query( $args );



    if ( $the_query->have_posts() ) {
      ob_start();
      // run the loop
      while ( $the_query->have_posts() ) : $the_query->the_post(); 
      $post     = get_post();
      echo  $_POST['current_page'];
      echo get_template_part('/inc/parts/card', 'getlatespost'); 
      endwhile; 
      wp_send_json_success(ob_get_clean());
      //wp_reset_postdata(); 
    }else{
      echo '<h1>ERROR NOTHING</h1>';
    }
  die; // here we exit the script and even no wp_reset_query() required!..
}
add_action('wp_ajax_nopriv_loadmore_posts', 'loadmore_posts');
add_action('wp_ajax_loadmore_posts', 'loadmore_posts');

?>
