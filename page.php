<?php get_header(); ?>
<main class="main-content page intern-pg">
  <?php 
   $url = '/inc/parts/loops/loop';

      if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
        
				get_template_part( $url.'', 'page' );
       
        if ( comments_open() || get_comments_number() ) { comments_template();	}
        endwhile; 
      else:
        the_content(); 
      endif; 
    ?>

</main>
<?php get_footer(); ?>
