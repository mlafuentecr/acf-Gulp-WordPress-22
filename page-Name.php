<?php

/**
 * 
 * The template for displaying the Name
 *
 */

defined('ABSPATH') || exit;
get_header();
/*-----------------------------------------------------------------------------------*/
/*  ACF advertisement
/*-----------------------------------------------------------------------------------*/


?>
<section id="page-staff" class="page staff container-fluid container-md mt-md-5 p position-relative mb-5">
  <div class="bg-white util__move-up util__move-up-2 pt-2 pt-md-5 px-4  px-lg-0  util__extraBorder  util__extraBorder__t-10">
    <div class="main-content d-flex  flex-column flex-lg-row justify-content-between">

      <!-- main-content -->
      <section class="main-content d-flex flex-column flex-lg-row flex-wrap justify-content-start align-content-start">

        <?php
        $postNum = 0;
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
            $postNum++;
            //ACF FIELDS
            $fields             = get_fields();
            $staff_image        = $fields['staff_image'] ??  array();
            $staff_image_url    = $staff_image['url'] ?? '';
            $staff_image_alt    = $staff_image['alt'] ?? '';
            $staff_info         = $fields['staff_information'] ??  array();
            $staff_name         = $staff_info['staff_name'] ?? '';
            $staff_position     = $staff_info['staff_position'] ?? '';
            $staff_description  = $staff_info['staff_description'] ?? '';
            $staff_type         = $staff_info['staff_type'] ??  '';
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');

        ?>

            <div class="staff__item d-flexflex-column col-12 col-lg-6 mb-4">

              <div class="staff__item_person d-flex flex-row ">

                <img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>" class='rounded-circle'>
                <div class="staff__item_info d-flex flex-column w-100  ms-3  ">
                  <span class="staff__item_name text-blue"><?php the_title(); ?></span>
                  <span class="staff__item_position text-gray"><?php echo $staff_position; ?></span>
                </div>
              </div>

              <div class="staff__description text-gray mt-3"><?php echo the_content(); ?></div>
            </div>

          <?php endwhile; ?>


          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p><?php _e('Sorry, no news events posts at this time.', 'theme'); ?></p>
        <?php endif; ?>


        <!-- PAGINATION -->
        <?php
        set_query_var('per_page', $per_page);
        set_query_var('the_query', $the_query);
        set_query_var('postype', 'staff');
        get_template_part('inc/template-parts/menu', 'pagination');

        ?>

      </section>



      <!-- SIDEBAR -->
      <?php
      set_query_var('position_1', 'inThisSection_staff');
      set_query_var('position_2', 'calendar');
      set_query_var('position_3', 'form');
      // set_query_var( 'position_4', '' );
      // set_query_var( 'position_5', '' );
      // set_query_var( 'position_6', '' );
      get_template_part("/inc/template-parts/sidebar", "general");
      ?>

    </div>
  </div>
</section>





<?php
get_footer();
