<?php 
/*-----------------------------------------------------------------------------------*/
/*  ACF Page our-value
/*-----------------------------------------------------------------------------------*/
$pageFields       = get_fields();
$add_container    = $pageFields['add_container']; 
$add_headline     = $pageFields['add_headline']; 
$margen           = $pageFields['margen']; 
$headline         = $pageFields['headline'];
$add_excerpt      = $pageFields['add_excerpt'];
$cols             = $pageFields['cols'];
$getPosts         = $pageFields['get_posts'];
$posts            = $pageFields['choose_posts'] ?: $pageFields['choose_other'];


?>
<div class="get_posts">
  <div class="container  <?php echo $margen; ?>">
    <!-- Add a text for gutenber only if im on admin -->
    <?php if (is_admin() ) { echo 'Edit Post click the pencil to edit';} ?>

    <!-- if have headline on -->
    <?php if($add_headline): ?> <header class='col-12 text-white'> <?php echo $headline; ?> </header><?php  endif; ?>

    <div
      class="row row-cols-1 row-cols-sm-1 row-cols-md-<?php echo $cols; ?> g-3  <?php echo  $getPosts ?   'get_posts_wrap' :  'get_pages_wrap'  ?>">
      <?php if($posts) {
          foreach( $posts as $post ) {   
            $excerpt                 = get_the_excerpt();
            $add_title               = $pageFields['add_title'];
            $add_excerpt             = $pageFields['add_excerpt'];
            $add_author              = $pageFields['add_author_info']; 
      ?>

      <div class="col my-5">

        <div class="card mb-4 post-<?php echo $post->ID; ?> bg-transparent ">
          <a class="card-link" href="<?php echo  get_permalink(  $post->ID ); ?>" rel="noopener noreferrer">
            <div class="card-img mb-4 zoom_img"
              style="background-image: url(<?php   echo get_the_post_thumbnail_url( $post->ID ); ?>);">
            </div>
          </a>

          <div class="card-body  p-0  ">

            <?php if($add_title): ?>
            <a class="card-link text-gray" href="<?php  get_permalink(  $post->ID ); ?>" rel="noopener noreferrer">
              <div class="title link_style_white text-white">
                <?php  echo $post->post_title; ?>
              </div>
            </a>
            <?php endif; ?>

            <!-- Show excerpt -->
            <div class="content text-gray">
              <?php 
              if($add_excerpt):
              if( $pageFields['small_description']['excerpt'] ){
                echo $pageFields['small_description']['excerpt'];
              }else{
                echo $excerpt;
              }
              endif;
              ?>
            </div>

            <!-- Show Author info -->
            <?php  if($add_author): ?>
            <div class="author mt-3 py-3 d-flex borderY-2">
              <?php  $authorId = $post->post_author; ?>

              <div class="author_pic px-2"
                style='background-image: url("<?php echo get_avatar_url($authorId, array('size' => 450)); ?>");'>
              </div>
              <div class="px-2 flex-grow-1 bd-highlight">
                <div class="col-12 author_name"><a href="<?php echo get_author_posts_url($authorId); ?>" target="_blank"
                    rel="noopener noreferrer"><?php echo get_the_author_meta( 'display_name',  $authorId);  ?></a>
                </div>
                <div class="author_data d-flex">
                  <div class="author_date"><?php echo date("F j, Y", strtotime($post->post_date)) . "<br>"; ?></div>
                  <div class="author_time_reading"> <?php echo get_field( 'time_estimation', $post->ID) ?: '5'; ?> min
                    read
                  </div>

                </div>
              </div>
            </div>

            <?php endif; ?>

            <!-- Show Categories -->
            <div class="categories mt-3">
              <?php 
          $categories = get_the_category( $post->ID );
          if ( ! empty( $categories ) ) {
              foreach( $categories as $category ) {
                echo '<a href="'. get_category_link( $category->term_id ) .'"  alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '"target="_blank" rel="noopener noreferrer">' . esc_html( $category->name ) . '</a>';
              }
            }
          ?>
            </div>

          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end card col -->

      <?php }  //end foreach ?>
      <?php } //end if choosePost ?>
      <!-- end row -->


    </div>
    <!--end Row -->
  </div>
</div>
