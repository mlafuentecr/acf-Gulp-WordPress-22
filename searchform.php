<?php $value = ( isset( $_GET['s'] ) ) ? $_GET['s'] : ''; ?>
<form role='search' class='searchform' action='/' method='get'>
	<div id="search-main">
		<input class="search-input" name="s" type="text" placeholder="Enter Search..." value="<?php echo $value; ?>">
		<button class="search-btn" style="background-image: url(<?php echo get_template_directory_uri() . '/inc/images/icon-magnifying-glass-solid2.svg' ?>);" type="submit"></button>
	</div>
</form>
