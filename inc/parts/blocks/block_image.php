<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
/*---------------------------------------------------------*/
/*  ACF Page our-value
/*---------------------------------------------------------*/
  $pageFields     = get_fields();
  $desktopImg1    = get_field('desktop_image');
  $add_container  = $pageFields['add_container'];
  $desktopClass   = $pageFields['desktop_class'];
  $mobileClass    = $pageFields['mobile_class'];


  $desktopImg     = $pageFields['desktop_image'];
  $mobileImg      = $pageFields['mobile_image'];
  $desktopUrl     = $desktopImg['url'] ?: 'https://picsum.photos/1400/400';
  $mobileUrl      = $mobileImg['url'] ?: 'https://picsum.photos/400/800';
 

  ?>

<?php 
  if (!empty($block['data']['_is_preview']) ) :
    echo '<div class="block_image  h-100 col-12 d-flex flex-wrap  justify-content-center">
      <div class="h-100 col-12 flex-column text-center">
          <img src="https://picsum.photos/200/100?blur">
      </div>
    </div>
    ';
   else :
    if( $add_container) {echo '<div class="conteiner">';}
    echo ' <div class="block-image block-image-desktop d-none d-md-block '. $desktopClass .'"><img src="'.$desktopUrl.'">  </div>';
    echo ' <div class="block-image block-image-mobile d-md-none '. $mobileClass .'"><img src="'.$mobileUrl.'">  </div>';
    if( $add_container) {echo '</div>';}
endif;
?>


<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
</style>
<?php } ?>
