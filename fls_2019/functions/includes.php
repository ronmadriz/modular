<?php
include (get_stylesheet_directory().'/includes/core/extended-cpts.php');
include (get_stylesheet_directory().'/includes/core/extended-taxos.php');
foreach (glob(get_stylesheet_directory().'/includes/cpt_files/*.php') as $filename) {include $filename;}
foreach (glob(get_stylesheet_directory().'/includes/customizers/*.php') as $customizers) {include $customizers;}
require_once (get_stylesheet_directory().'/includes/options/default.php');