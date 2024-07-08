<?php
if ( ! function_exists( 'gfu_assets' ) ) :
	function gfu_assets() {

		wp_dequeue_style('gfu-style');
		wp_deregister_style('gfu-style');

		wp_enqueue_style( 'gfu', get_template_directory_uri() . '/css/gfu.css', array(), '1.0', 'all' );
		
	}
	add_action( 'wp_enqueue_scripts', 'gfu_assets' );
endif;
