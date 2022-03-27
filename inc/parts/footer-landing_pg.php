<?php  $bg_img =  get_field('footer_background_image', 'option'); ?>
<footer class="d-flex pt-4 footer_landing" style="background-image: url(<?php echo $bg_img['url']; ?>);">



  <div class="container ">
    <div class="row text-center">
      <div id="main" class="col col-12 text-center my-5">
        <a class="btn-contact btn btn-success mt-5 py-3 px-5" href="/contact/">CONTACT US </a>
        <div class="col-12 text-white message my-3">
          <?php the_field( 'message', 'option' ); ?>
        </div>
      </div>

      <div id="social-menu" class="col-12 col-md-8 mb-5 mb-md-0   d-flex  flex-wrap text-white">
        <div class="mb-3 mb-md-0 call col-12 col-md-6"> CALL US <a
            href="tel:+<?php the_field( 'phone_number', 'option' ); ?>"><?php the_field( 'phone_number', 'option' ); ?></a>
        </div>
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        <div class=" col-6 m-auto col-md-6 widget-area  " role="social icons">
          <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        <?php endif; ?>
      </div>
      <div id="copyright" class=" col-12 col-md-6 col-md-4">
        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
        <div class="widget-area" role="logo">
          <?php dynamic_sidebar( 'footer-3' ); ?>
        </div>
        <?php endif; ?>

      </div>


    </div>

  </div>



</footer>
<?php wp_footer(); ?>
</body>

</html>
