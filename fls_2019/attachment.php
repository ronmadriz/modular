<?php
$pageID = get_the_id();
$pageCF = get_post_custom($pageID);
get_header();
?>
<?php if (have_posts()):while (have_posts()):the_post();?>
<section id="main-content">
  <div class="container">
    <div class="row">
      <div id="title"><?php $queried_object = get_queried_object();
echo '<h1 class="page-title">Document Category - '.$queried_object->name.'</h1>';
?></div>
    </div>
    <div class="row">
      <div id="image" class="col-12"><?php $image_size = apply_filters('wporg_attachment_size', 'large');
echo wp_get_attachment_image(get_the_ID(), $image_size);
?></div>
    </div>
<?php if (has_excerpt()):?>
    <div class="row">
      <div id="content" class="col-12"><?php the_content();?></div>
    </div>
<?php endif;?>
</div>
</section>
<?php endwhile;
endif;
?>
<?php get_footer();?>
