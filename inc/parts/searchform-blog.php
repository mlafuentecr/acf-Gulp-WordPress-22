<?php
/**
 * The template for displaying search form for Blog
 */
?>

<form method="get" class="search-form" action="<?php echo get_permalink($pageId) ?>">
  <label>
    <span class="screen-reader-text"><?php echo _x('', 'label', 'jointswp') ?></span>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'jointswp') ?>"
      value="<?php echo get_search_query() ?>" name="search" title="<?php echo esc_attr_x('', 'jointswp') ?>" />
  </label>
  <input type="submit" class="search-submit button" value="<?php echo esc_attr_x('Search', 'jointswp') ?>" />
</form>
