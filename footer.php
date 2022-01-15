<!-- footer -->

<?php     
/*-----------------------------------------------------------------------------------*/
/*  ACF footer
/*-----------------------------------------------------------------------------------*/


?>


<footer class="d-flex pt-4">

  <div class="container-fluid ">
    <div class="d-flex flex-wrap align-content-stretch">

      <div id="secundary-menu" class="col flex-grow-1 order-1 order-md-2 links-with-underline">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <div class="widget-area" role="secundary menu">
          <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        <?php endif; ?>
      </div>

      <div id="social-menu" class="col  order-2 order-md-3 links-with-underline ">
        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
        <div class="widget-area" role="social icons">
          <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        <?php endif; ?>
      </div>

      <div id="copyright" class="col col-12 col-md-4 d-flex flex-column order-3  order-md-1">
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
