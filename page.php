<?php get_header(); ?>

<section class="page intern-pg">
  <?php 
   $url = '/inc/parts/loop';

      if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
        
				get_template_part( $url.'', 'page' );
       
        if ( comments_open() || get_comments_number() ) { comments_template();	}
        endwhile; 
      else:
        the_content(); 
      endif; 
    ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
