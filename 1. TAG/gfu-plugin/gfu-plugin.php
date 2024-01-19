<?php
/*
Plugin Name:  GFU Plugin
Plugin URI:   https://gfu.de
Description:  Unser kleines Plugin
Version:      1.0
Author:       Adrian Lambertz
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  gfu-plugin
Domain Path:  /languages
*/




function gfu_greetings_nach_content($content) {
	if ( is_single() ) { 
 		$content .= '<div class="greeting"><i>Hallo! Wie gehts?</i></div>';
	} 

	return $content;
}
add_filter('the_content', 'gfu_greetings_nach_content'); 
