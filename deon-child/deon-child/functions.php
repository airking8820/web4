<?php

if ( ! function_exists( 'deon_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function deon_child_theme_enqueue_scripts() {
		$main_style = 'deon-main';

		wp_enqueue_style( 'deon-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'deon_child_theme_enqueue_scripts' );
}
