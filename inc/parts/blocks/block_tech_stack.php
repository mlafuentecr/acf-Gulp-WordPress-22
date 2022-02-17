<?php
// Load values and assign defaults.
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields = get_fields();
$title      = $pageFields['title'];
$margen     = $pageFields['margen'];
$category   = $pageFields['category'];

 ?>


<section class="block_tech_stack tech_stack <?php echo $block['className'].' '.$margen; ?>">
  <div class="container">
    <div class="row row-cols-3">

      <h2 class="tech_stack-title col-12 my-2"><?php echo $title; ?></h2>

      <nav class="tech_stack-menu d-flex flex-wrap col-3 bg-danger">
        <?php 
            if( $category )
            {
              foreach( $category as $row ) {
                  $title = $row['category_title'];
                  echo '<button class="col-12 '. $title .'">'. $title .'</button>';
              }
          }
        ?>
      </nav>

      <div class="tech_stack-logos flex-grow-1 row row-cols-md-2 row-cols-md-6 bg-light">
        <?php 
            if( $category )
            {
              foreach( $category as $logos ) {
                $logosObj = $logos['logos'];
                foreach($logosObj as $logo ) {
                  echo "<figure class='col d-flex  flex-column justify-content-center'>";
                  echo '<div class="img"><img src="'.$logo['url'].'" alt="'.$logo['alt'].'"></div>';
                  echo "<figcaption class='text-truncate font-weight-light'>".$logo['alt']."</figcaption>";
                  echo "</figure>";
             }
        }
        }
        ?>


      </div>
    </div>

  </div>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.tech_stack {
  width: 100%;
  min-height: 200px;
  background-color: #f3f3f3;
  padding: 20px;
  display: flex;
  flex-direction: row;
  gap: 10px;
}

.tech_stack .row {
  display: flex;
  flex-wrap: wrap;
}

.tech_stack-title {
  min-width: 100%;
}

.tech_stack-logos {
  max-width: 70%;
  padding-left: 10px;
}

.tech_stack-menu {
  display: flex;
  flex-wrap: wrap;
  width: 30%;
}

.tech_stack-menu button {
  min-width: 100%;
}

</style>
<?php } ?>
