<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF
/*-----------------------------------------------------------------------------------*/
$form_title                 = get_field('form_title', 'option');
$form_script                 = get_field('form_script', 'option');

 ?>

<?php 
  if (!empty($block['data']['_is_preview']) ) :
    echo '<div class="block_image  h-100 col-12 d-flex flex-wrap  justify-content-center">
      <div class="h-100 col-12 flex-column text-center">
          <img src="'.$block['data']['pic'].'">
      </div>
    </div>
    ';
   else :
    ?>
<div id='main-form' class="block_form pt-5 pb-5 bg-black <?php echo $block['className']; ?>">
  <div class="container">

    <div class=" col-12  subtitle"><?php echo $form_title; ?></div>
    <div class=" col-12 ">
      <?php echo $form_script; ?>
    </div>

  </div>
</div>
<?php 
endif;
?>







<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block_form {
  margin: 10px;
  padding: 10px;
  background-color: black;
  min-height: 100px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.col-2 {
  width: 20%;
}

.col-10 {
  width: 80%;
}

.col {
  max-width: 45%;
  background: white;
  margin: 5px;
  padding: 10px;
}

.bg-black {
  color: white;
  background-color: black;
}

</style>
<?php } ?>
