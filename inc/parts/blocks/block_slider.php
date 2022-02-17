<?php 


  /*---------------------------------------------------------*/
  /*  ACF Page our-value
  /*---------------------------------------------------------*/
  $pageFields                 = get_fields();
  $description                = $pageFields['description'];
  $slider_size                = $pageFields['slider_size'];
  $slider                     = $pageFields['slider'];
  $GLOBALS['slider_subtitle'] = $pageFields['title'];
 

?>


<!-- carousel-fade-->
<section class="block_slider">
  <div class="container">
    <header class="row">
      <h2 class="col-12 col-md-4  p-2 text-white ">
        <?php echo $GLOBALS['slider_subtitle']; ?>
      </h2>
      <div class="col  col-xl-6 p-2   text-white d-flex  justify-content-start align-items-center">
        <div class="col-12 m-0 p-0 ">
          <?php echo $description; ?>
        </div>
      </div>
    </header>
  </div>

  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="min-height:<?php echo $slider_size; ?>px">

      <?php 
   
   if( $slider ) {
    
      $total = count($slider);
     
       foreach( $slider as $index => $testimonial ) {
         
           $type      = $testimonial['type'];
           $bg_color  = $testimonial['background_color'] ?: 'black';
           $video     = $testimonial['video'];
           $image     = $testimonial['image'];
           $content   = $testimonial['content'];
           $author    = $testimonial['author'];
           $position  = $testimonial['position'];
           $text_color = $testimonial['text_color'];
           $reverse   = $testimonial['direcction'];
           $obj       = $testimonial;
           $index++;

           $state = $index === 1 ? "active" : "";
          
            echo "<div style='background-color:".$bg_color." ' class='carousel-item ".$state." '>";
            echo "<div class='container '> ";
            echo "<div class='mt-5' style='color: ".$text_color."!important;'> ";
            echo '<span class="title"> '. $GLOBALS['slider_subtitle']  .' </span>';
            echo "<div class='slideNumber'> " .  $index.' - '. $total  .  "</div>";
          
              if($type === 'text'){ 
                
                echo  '<div class="row text-wrap">';
                echo  '<div class="col-12 ">
                <div class="col-12 content">'. $obj['content'] .'</div>
                <div class="col-12 author">'. $obj['author'] .'</div>
                <div class="col-12 position">'. $obj['position'] .'</div>
                </div>';
              echo  '</div>';

              }elseif($type === 'video and text'){
                echo $reverse ;
                echo  '<div class="row image_text  '.$reverse.' ">';
                echo  '<div class="col-12 col-md-6 mt-3 mt-md-0 ">
                <div class="col-12 content">'. $obj['content'] .'</div>
                <div class="col-12 author">'. $obj['author'] .'</div>
                <div class="col-12 position">'. $obj['position'] .'</div>
                </div>';

                echo  '<div class="col-12 col-md-6">';
                echo  '<iframe width="100%" height="375" src="https://www.youtube.com/embed/'.$obj['video'].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                echo  '</div>';
                
              echo  '</div>';

              }else{
               
                echo  '<div class="row image_text '.$reverse.'">';
                echo  '<div class="col-12 col-md-6 mt-3 mt-md-0  ">
                <div class="col-12 content">'. $obj['content'] .'</div>
                <div class="col-12 author">'. $obj['author'] .'</div>
                <div class="col-12 position">'. $obj['position'] .'</div>
                </div>';

                echo  '<div class="col-12 col-md-6 text-center">';
                echo  '<img class="m-auto" src="'. $obj['image']['url'] .'" alt="'. $obj['title'] .'"  >';
                echo  '</div>';

                echo  '</div>';

              }

          echo '</div>';
          echo '</div>';
          echo '</div>';

         
       }

   }
  ?>

    </div>
    <div class="buttons">
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>




<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.slider-wrap {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;
}

.container {
  padding: 20px;
}

.row {
  display: flex;
}

.row .col-6 {
  width: 50% !important;
}

.row .col-6 img {
  width: 100%;
  height: auto;
}

</style>
<?php } ?>
