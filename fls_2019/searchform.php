<?php
echo '<form role="search" method="get" id="searchform" class="d-none" action="';
bloginfo('url');
echo '">'.PHP_EOL;
echo '<label class="sr-only" for="s">Search for:</label>'.PHP_EOL;
echo '<input type="text" value="" name="s" id="s" placeholder="Search...">'.PHP_EOL;
// echo '<button type="submit" id="searchsubmit"><i class="im im-magnifier"></i><span class="sr-only">Search</span></button>'.PHP_EOL;
echo '<input type="submit" id="searchsubmit" value="Search">'.PHP_EOL;
echo (!is_404()?'<button type="button" id="searchClose"><i class="im im-x-mark"></i></button>'.PHP_EOL:'');
echo '</form>'.PHP_EOL;
?>
