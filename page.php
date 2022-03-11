<?php get_header(); ?>
<main class="main-content bg-white page intern-pg" role='main'>
  <?php 

      if ( have_posts() ) : 
        while ( have_posts() ) : 
          the_post(); 

            if ( is_page( array( 'latest-post' ) ) ) {
              echo get_template_part('/inc/parts/content', 'allPost'); 
            } else {
              echo '<div class="container my-5">';
              the_content(); 
              echo '</div>';
            }
        
          if ( comments_open() || get_comments_number() ) { comments_template();	}
        endwhile; 
      else:
        //Dosent have post
        echo '<div class="container dosent-have-post my-5">';
        the_content(); 
        echo '</div>';
      endif; 
    ?>

</main>
<?php get_footer(); ?>
