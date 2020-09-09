<?
echo '<div class="osha">'.PHP_EOL;
echo '<h3 class="osha__title blog__side--title">';
_e('osha news feed', 'fc_core');
echo '</h3>'.PHP_EOL;
echo do_shortcode('[wp-rss-aggregator]');
echo '</div>'.PHP_EOL;