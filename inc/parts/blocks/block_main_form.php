<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF
/*-----------------------------------------------------------------------------------*/
 $pageFields = get_fields();

 ?>

<div class="block_form pt-5 pb-5 <?php echo $block['className']; ?>">
  <div class="container">

    <div class=" col-12  subtitle"><?php echo $pageFields['subtitle']; ?></div>
    <div class=" col-12 ">
      <?php echo $pageFields['form_script']; ?>
    </div>

  </div>
</div>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block_form {
  margin: 10px;
  padding: 10px;
  background-color: #e7e7e7;
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

</style>
<?php } ?>
