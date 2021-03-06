<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF
/*-----------------------------------------------------------------------------------*/
 $pageFields = get_fields();
 $cols = $pageFields['col'];

 if (is_admin() ) { 
  $css_correction = ' rows-col-2';
 }

 ?>

<div class="what_we_do <?php echo $block['className']; ?>">
  <div class="container">

    <div class="row g-3 ">
      <div class=" col-12 col-lg-2  subtitle"><?php echo $pageFields['title']; ?></div>
      <div class=" col-12 col-lg-10 ">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 <?php echo $css_correction; ?> ">
          <?php 
      if(  $cols ) {
          foreach( $cols as $row ) {
              $image = $row['title'];
          
              $link = $row['link'] ?  $link = $row['link']['url'] : $link = '';
              echo '<div class="col m-0 p-0"> <div class="m-2"> ';
                if($link){echo '<a class="link_main_style" href="'.$link.'">';}
                echo '<div class="title small-arrow">'.$row['title'].'</div>';
                echo '<div class="body text-gray">'.$row['body'].'</div>';
                if($link){echo '</a>';}
              echo '</div></div>';
           
          }
      }
      ?>

        </div>
      </div>
    </div>

  </div>
</div>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.what_we_do {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;
}

.subtitle {
  margin: 40px 0px;
  color: white;
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
  margin: 5px;
  padding: 10px;
}

.col>div {
  background: white;
  min-height: 160px;
  padding: 5px;
}

</style>
<?php } ?>
