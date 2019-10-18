<?php
echo '<form role="search" method="get" id="searchform"'.(!is_404() || !(is_search() && 0 === $wp_query->found_posts)?' class="d-none"':'').' action="';
bloginfo('url');
echo '">'.PHP_EOL;
echo '<label class="sr-only" for="s">Search for:</label>'.PHP_EOL;
echo '<input type="text" value="" name="s" id="s" placeholder="Search...">'.PHP_EOL;
echo '<button type="submit" id="searchsubmit"><i class="fas fa-search"></i><span class="sr-only">Search</span></button>'.PHP_EOL;
echo (!is_404()?'<button type="button" id="searchClose"><i class="fas fa-times"></i></button>'.PHP_EOL:'');
echo '</form>'.PHP_EOL;
?>
