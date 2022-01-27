<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$title = $pageFields['title'];
$objectives = $pageFields['objectives'];
 ?>

<section class="block-objectives d-flex flex-wrap  <?php echo $block['className'] ?>">
  <div class="title col-12 col-md-2 col-md-3 ">
    <?php echo $title; ?>
  </div>
  <div class="col-12 col-md-7 d-flex flex-wrap ">


    <?php


if( $objectives ) {
  $i = 1;
  
    foreach( $objectives as $item ) {
      count($objectives) >= 2 ? $col = (12 / count($objectives)) : $col ='';
      $i < 10 ? $i = '0'. $i : $i;
        echo '<div class="item px-2 col-12 col-md-'. $col .'">';
        echo '<div class="number">'. $i .'</div>';
            echo '<span class="title">'.$item['title'].'</span>';
            echo '<span class="descrip">'.$item['objective'].'</span>';
        echo '</div>';
        $i++;
    }
}
?>






  </div>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block-objectives {
  width: 100%;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

</style>
<?php } ?>
