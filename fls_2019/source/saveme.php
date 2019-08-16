<header>
      <nav class="navbar navbar-expand-md container">
<?php if (!empty($site_logo_header)):?><a href="/" class="navbar-brand"><img src="<?php echo esc_url($site_logo_header);?>" alt="<?php bloginfo('name');?>" class="img-fluid"></a>
<?php  else :?><h1><a href="/" class="navbar-brand"><?php bloginfo('name');
?><?php echo (!empty($slogan))?'<br><small>'.$slogan.'</small>':'';
?></a></h1>
<?php endif;?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Menu">
        <span class="menu-text"><?php _e('Menu', 'ronmadriz_core');?></span>
        <span class="menu-icon">
          <span class="nav-bar"></span>
          <span class="nav-bar"></span>
          <span class="nav-bar"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
<?php
$args = array(
	'theme_location' => 'main-navigation',
	'menu'           => 'main-nav',
	'container'      => false,
	'menu_class'     => 'nav navbar-nav ml-md-auto',
	'menu_id'        => 'main-navigation',
	'container'      => false,
	'depth'          => 2,
	'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
	'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
);
wp_nav_menu($args);
?>
      </div>
      </nav>
    </header>
