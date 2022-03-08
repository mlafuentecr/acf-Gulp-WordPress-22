<?php get_header(); ?>
<main class="main-content page intern-pg">
  <?php 
      if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
        the_content(); 
        if ( comments_open() || get_comments_number() ) { comments_template();	}
        endwhile; 
      else:
        the_content(); 
      endif; 
    ?>

</main>
<?php get_footer(); ?>
