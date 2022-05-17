    <!-- Show Author info -->

    <div class="author mt-3 py-4 d-flex borderY-2">
      <?php  
        //$post_id = $row->ID;
           //Author
        $authorId             = get_post_field('post_author' , $id);
        $user                 = get_userdata($authorId);
        $data                 = get_field('author_info', 'user_'. $authorId);
        
        $name                 = $data['data']['author_name_and_lastname'];
        $author_profession    = $data['data']['author_profession'];
        $author_description   = $data['data']['author_description'];
        $author_picture       = $data['author_picture'];
        $author_url           = get_author_posts_url($authorId);
      

      
      ?>
      <div class="author_pic px-2" role="img" aria-label='<?php $author_picture['alt']; ?>'
        style='background-image: url("<?php echo $author_picture['url']; ?>");'>
      </div>

      <div class="px-2 flex-grow-1 ">

        <div class="col-12 author_name">
          <a href="<?php echo $author_url;  ?>" target="_blank" rel="noopener noreferrer"><?php echo $name; ?>
          </a>
        </div>

        <div class="author_data d-flex  flex-row ">
          <div class="author_date ">
            <?php echo date("F j", strtotime($post->post_date)) . "<br>"; ?>
          </div>
          <div class="author_time_reading ">
            <?php echo get_field( 'time_estimation', $id) ?: '5'; ?> min read
          </div>
        </div>

      </div>

    </div>
