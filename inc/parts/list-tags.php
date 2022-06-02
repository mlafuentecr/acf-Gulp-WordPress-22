<?php
$postId                     = get_query_var('postId');
$postId ? $postId : $postId = get_the_ID();
$tags                       = get_the_terms($postId, "post_tag");

?>
<?php if ($tags): ?>
<div class="tags my-3">
  <?php foreach ($tags as $tag) { ?>
  <a href="<?php echo get_tag_link($tag->term_id); ?> " rel="nofollow"><?php echo $tag->name; ?></a>
  <?php } ?>
</div>
<?php endif ?>
