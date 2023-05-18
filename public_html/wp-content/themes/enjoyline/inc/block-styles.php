<?php
/**
 * Block Styles
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 */
	function enjoyline_register_block_styles() {
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'enjoyline-border',
				'label' => esc_html__( 'Borders', 'enjoyline' ),
			)
		);
	}
	add_action( 'init', 'enjoyline_register_block_styles' );
}
