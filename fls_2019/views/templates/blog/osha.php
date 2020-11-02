<?
echo '<div class="osha">'.PHP_EOL;
echo '<h3 class="osha__title blog__side--title">';
_e('osha news feed', 'fc_core');
echo '</h3>'.PHP_EOL;
echo do_shortcode('[wp_rss_retriever url="https://www.osha.gov/news/newsreleases.xml" items="2" excerpt="20" read_more="true" new_window="true" cache="12 hours"]');
echo '</div>'.PHP_EOL;
