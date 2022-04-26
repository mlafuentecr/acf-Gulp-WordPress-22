<?php
  // Load values and assign defaults.
  $pageFields       = get_fields();
  $get_latest_post  = get_field('get_latest_post'); 
  ?>

<?php
echo '<div class="get_post">';

  if( $get_latest_post ){
    get_template_part("/inc/parts/content", "latespost"); 
  }else{
    get_template_part("/inc/parts/content/getpost");
   }
echo '</div>';
?>







<?php if (is_admin() ) { ?>
<!-- Only show this to admin -->
<style type="text/css">
.get_post {
  margin: 10px;
  padding: 10px;
  background-color: #e7e7e7;
  min-height: 100px;
}

.get-posts {
  margin: 10px;
  padding: 10px;
  background-color: gray;
  min-height: 100px;
  width: 100%;
  background-color: red;
  display: flex;
}

.row-cols-md-2 {
  display: flex;
}

.d-flex {
  display: flex;
}

.fit-background {
  width: 50%;
  background-position: center;
  background-size: cover;
  height: 300px;
}

.col-md-5 {
  width: 50%;
  margin-left: 20px;
}

.card-link {
  text-decoration: none;
  color: black;

  &:hover {
    text-decoration: none;
    color: black;
  }
}

</style>
<?php } ?>
