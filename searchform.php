<?php
/*-- tamplate for custom searchform --*/
?>
<form role="search" method="get" class="cst-search" action="<?php echo home_url( '/' ) ?>" >
	<input type="text" placeholder="Click enter to search..." value="<?php echo get_search_query() ?>" name="s" id="s" required/>
	<button type="submit" class="cst-search__subm">
	    <img src="<?php echo get_template_directory_uri();?>/images/search-icon.svg" alt="search-icon" title="search-icon">
	</button>
</form>