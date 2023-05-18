<?php
/**
 * enjoynews Theme Customizer.
 *
 * @package enjoynews
 */
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function enjoynews_customize_preview_js() {
	wp_enqueue_script( 'enjoynews_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'enjoynews_customize_preview_js' );

function enjoynews_reset_mytheme_options() { 
    remove_theme_mods();
}
add_action( 'after_switch_theme', 'enjoynews_reset_mytheme_options' );