<?php 


  //Variable = $block data comming from acf when you register if there isn not( ACF yet put a defulth)
  $cols = get_field('cols');
  $add_container = get_field('add_container');
  $fit_obecjts = get_field('fit_obecjts');
  $item_class = get_field('item_class');
  $total_cols =  $block['data']['cols'];
  $total_cols > 6 ? $total_cols = 6 : $total_cols;
  $total_cols = round( $total_cols );
  
  $add_container ? $container="container" : $container="col-12";
  $fit_obecjts ? $rowStyle =  'row-cols-md-' .$total_cols : $rowStyle ='row-cols-md-auto';
  //if we are in previewmode css is col-6
 // if( $block['data']['cols'] ) { $css_correction = 'col-'.$total_cols; }else{ $css_correction = 'col-12'; }
 if (!empty($block['data']['_is_preview']) ) :
  echo '<div class="block-col h-100 col-12 d-flex flex-wrap justify-content-center align-content-center block_cols ">
  <div class="h-100 col-3 px-2 "> Text 1 </div>
  <div class="h-100 col-3 px-2 "> Text 2 </div>
  <div class="h-100 col-3 px-2 "> Text 3 </div>
  </div>
  ';
  else :
      if( $cols ) {
        echo  '<div class="'.$container.'"> 
        <div class="m-0 p-0  d-flex flex-wrap  block_cols h-100    '.$block['className'].' row row-cols-1 '.$rowStyle.'  ">';
        foreach( $cols as  $i => $row ) {
          $n = $i+1;
            echo '<div class="m-0 p-0  block-col-'. $n .'  h-100 col total-'. $total_cols.' '.$item_class.' '. $css_correction .'  ">
              '. $row['col'] .'
            </div>';
        }
        echo '
        </div>
        </div>';
    }
   /* Render HTML for block */
  endif;

  ?>


<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.acf-block-component {
  min-width: 100% !important;
}

.col {
  background: transparent !important;
}

</style>
<?php } ?>
