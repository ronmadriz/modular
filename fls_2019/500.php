<?php get_header();?>
<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
?>
<section id="main-content">
		<div class="wrapper">
			<div class="row">
				<div class="col-lg-12">
				    <h1>Oops!</h1>
				    <p>Something seems to be wrong.</p>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();?>
