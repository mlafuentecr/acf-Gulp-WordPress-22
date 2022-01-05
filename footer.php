<!-- footer -->

<?php     
/*-----------------------------------------------------------------------------------*/
/*  ACF footer
/*-----------------------------------------------------------------------------------*/
$logo     = get_field('footer_logo', 'options');
$size      = 'full'; // (thumbnail, medium, large, full or custom size)
$social = get_field('social', 'options');

?>

</main>
<footer>
  <!-- footer -->
  <section class="footer footer-ver2">
    <div class="container">
      <div class="row m-0 p-0 mb-5 ">
        <section class="menu logo col-12 col-md-6 text-center  text-md-start text-sm-center mb-5 mb-md-0">
          <img class='lazyload' src='<?php echo $logo['url']; ?>' alt='Laika Logo' width='128px' height='61px' />
        </section>
        <div class="col-12 col-md-6 d-flex justify-content-end m-0 p-0">
          <!-- REQUES DEMO BTN -->
          <?php get_template_part( '/inc/parts/btn-request-demo' );  ?>
        </div>
      </div>

      <div class=" d-flex flex-wrap flex-md-nowrap col-12 col-md-10 gap-3">
        <!-- 1Menus -->
        <?php
              if( have_rows('menus', 'options') ):
              while( have_rows('menus', 'options') ) : the_row();
                $title = get_sub_field('title');
                $menus = get_sub_field('menu');
              ?>
        <!-- 2Menus -->
        <section class="col-12 col-md-3">
          <div class="subtitle"><?php echo $title; ?></div>

          <?php
                if( $menus)
                {
                  echo '<ul class="links">';
                  foreach(  $menus as $row ) {
                      $link = $row['link'];
                      if($row['link']):
                      echo '<li class="menuItem">';
                          echo '<a rel="noreferrer" target="'.$link["target"].'" href="'.$link["url"].'">'.$link["title"].'</a>';
                      echo '</li>';
                      endif;
                  }
                  echo '</ul>';
                }
              ?>
        </section>

        <?php
                endwhile;
                else :
              endif;
              ?>
      </div>

      <div class="second-level mt-5 pb-5">
        <div class="container m-0 p-0 d-flex flex-wrap">
          <div class="logos-so col-12 d-flex gap-3 mb-3  justify-content-center justify-content-md-start">
            <img class='lazyload' src='<?php echo get_template_directory_uri(); ?>/inc/images/soc_aicpa.png'
              alt='soc_aicpa' />
            <img class='lazyload ml-2' src='<?php echo get_template_directory_uri(); ?>/inc/images/soc_type_2.png'
              alt='soc_aicpa' />
          </div>
          <!-- copyright -->
          <div class="copyright col-12 col-md-6">
            <span>&copy; Copyright <?php echo date('Y'); ?> Laika Inc.</span>

            <!-- Links -->
            <?php if (have_rows('legal_link_repeater', 'options')): ?>
            <ul class="links">
              <?php while (have_rows('legal_link_repeater', 'options')): the_row(); 
                    $link = get_sub_field('link'); 
                ?>
              <li>
                <a rel="noopener" href="<?php echo $link['url']; ?>"
                  target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </div>
          <div class="social col-12 col-md-2">
            <?php
                if($social)
                {
                  echo '<ul class="social-icons d-flex justify-content-center justify-content-md-end">';
                  foreach(  $social as $row ) {
                    
                      $link = $row['link'];
                      $name = $row['social'];


                      if($row['link']):
                      echo '<li>';
                      echo '<a class="linkSocial '.$name.'"  rel="noreferrer" target="_blank" href="'.$link["url"].'">follow us on'.$name.'</a>';
                      echo '</li>';
                      endif;
                  }
                  echo '</ul>';
                }
              ?>
          </div>
        </div>
      </div>

    </div>
  </section>
</footer>
</div>

<?php wp_footer(); ?>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/7851520.js"></script>
<!-- End of HubSpot Embed Code -->

</body>

</html>
