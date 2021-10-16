<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); 
?>
<div id="index" class="intern-pg indexphp">

  <?php
   $url = 'inc/parts/loop';

        if ( have_posts() ) : 
          while ( have_posts() ) : the_post(); 

             if ( is_home('blog') ) { 
               get_template_part( $url.'', 'blog' );
             } 

            //  if ( is_page('blog') ) { 
            //   echo 'blogo page <br>';
            //  $pageFields = get_fields();
            //  var_dump($pageFields);
            // // get_template_part( $url.'', 'blog' );
            // } 

          if ( comments_open() || get_comments_number() ) { comments_template();	}
          endwhile; 
        else:
          the_content(); 
        endif; 
				?>

</div>
<?php get_footer(); ?>
