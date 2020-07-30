<?php
require_once (get_template_directory().'/includes/core/extended-cpts.php');
require_once (get_template_directory().'/includes/core/extended-taxos.php');
foreach (glob(get_template_directory().'/includes/cpt_files/*.php') as $filename) {include $filename;}
foreach (glob(get_template_directory().'/includes/customizers/*.php') as $customizers) {include $customizers;}
require_once (get_template_directory().'/includes/options/default.php');