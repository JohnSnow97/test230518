<?php
/**
 * Block Styles
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 */
	function enjoynews_register_block_styles() {
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'enjoynews-border',
				'label' => esc_html__( 'Borders', 'enjoynews' ),
			)
		);
	}
	add_action( 'init', 'enjoynews_register_block_styles' );
}
