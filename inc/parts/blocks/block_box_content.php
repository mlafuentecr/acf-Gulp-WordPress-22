<?php
// Load values and assign defaults.

  $box_col_size = get_field('box_col_size') ?: '100';
  //If content_type is null then get content_type_100
  $content_type = get_field('block_content_type') ?: get_field('block_content_type_100');
  $content_reverse  =get_field('reverse');
  $image = get_field('image');
  $text1 = get_field('text1');
  $text2 = get_field('text2');
  $div ='';
  $col='';
  $reverse = '';
  if($box_col_size === '30-70'){ $col = '30';}
  if($box_col_size === '70-30'){ $col = '30';}
  if($box_col_size === '50-50'){ $col = '50';}
  if( $content_reverse || $box_col_size === '70-30'){$reverse = ' reverse';}

  ///IF IS 100%
  if($box_col_size === '100'){
    $div .= '<section class="block-box-content  block-box-content-100  d-flex  '.$block["className"].' ">';

    if($content_type === 'text'){
      $div .= '<div class="block-content_text title col-12 '.$block["className"].'">'.  $text1 .'</div>';
    }if ($content_type === 'image') {
      $div .= '<div class="block-content_img col-12 '.$block["className"].'">
      <img class="lazyload" src="'. $image['url'] .'" alt="'. $image['title'] .'" />
      </div>';
    } 
    $div .= '</section>';

    
}else{
   
    if($content_type === 'text&image'){
      $div .='<section class="block-box-content '.$block["className"].'  block-box-content_'.$col.$reverse.'  d-flex ">';
      $div .= '<div class="block-box-content_text title col-12 col-md-3">'.  $text1 .'</div>';
      $div .= '<div class="block-box-content_img col-12 col-md-7"> 
      <img class="lazyload" src="'. $image['url'] .'" alt="'. $image['title'] .'" />
      </div>';
    }if ($content_type === 'text&text') {
      $div .='<section class="block-box-content '.$block["className"].' block-box-content_'.$col.$reverse.' d-flex  ">';
      $div .= '<div class="block-box-content_text title col-12 col-md-3">'.  $text1 .'</div>';
      $div .= '<div class="block-box-content_text-2 descrip col-12 col-md-7">'.  $text2 .' </div>';
    } 
    
  $div .= '</section>';
}

//Print the contennt
 echo $div; 
 ?>


<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block-box-content {
  width: 100%;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

.block-box-content-100>div {
  min-width: 100%;
  padding: 15px;
}

.block-box-content>div {
  background-color: white;
  padding: 5px;
}

.block-box-content.reverse {
  display: flex;
  flex-direction: row-reverse;
}

.block-box-content_30>.block-box-content_text {
  flex: 3;
}

.block-box-content_30>.block-box-content_img {
  flex: 7;
}

.block-box-content_30>.block-box-content_text-2 {
  flex: 7;
}

.block-box-content_50>.block-box-content_text {
  flex: 1
}

.block-box-content_50>.block-box-content_img {
  flex: 1
}

.block-box-content_50>.block-box-content_text-2 {
  flex: 1
}

</style>
<?php } ?>
