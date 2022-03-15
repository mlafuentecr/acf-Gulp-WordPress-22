<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
// <?php echo $block['className'] this add additional css from gutember
$pageFields = get_fields();
$content = $pageFields['text'];
$gradient = $pageFields['gradient_color'];
$image = $pageFields['image'];
$height = $pageFields['height'];
 ?>

<section style="height:<?php echo $height; ?>px;"
  class="block-bg-image mt-5 mb-5 ignore-container text-white <?php echo $block['className'] ?>">
  <div class='bg-image' style="  background-size: cover; background-image:url('<?php echo $image; ?>')">
    <div class="container m-auto">
      <div style="height:<?php echo $height; ?>px;" class="row align-items-end ">
        <div class="col bg-image-col">
          <?php echo $content; ?>
        </div>
      </div>

    </div>
  </div>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.block-bg-image {
  width: 100%;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
  height: 400px;
}



.bg-image {
  min-width: 100%;

}

.bg-image-col {
  max-width: 45%;
  background: white;
  margin: 5px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  justify-content: end;
  background: #0000007a;
  color: white;
  min-width: 100%;
}

.d-flex {
  display: flex;
  flex-direction: row;
}

.block-case-study-headline div:nth-child(1) {
  background-color: white;
  flex: 7;
  padding: 5px;
  font-size: 36px;
  font-weight: 500;
}

.block-case-study-headline div:nth-child(2) {
  background-color: white;
  flex: 3;
  padding: 5px;
}

.item {
  display: flex;
  flex-direction: column;
}

.item .title {
  min-width: 100%;
  text-transform: uppercase;
  font-size: 21px;
}

.item .descrip {
  min-width: 100%;
  text-transform: capitalize;
  font-size: 18px;
}

</style>
<?php } ?>
