<?php
/**
 * EnjoyNews Theme page
 *
 * @package EnjoyNews
 */

function enjoynews_about_admin_style( $hook ) {
	if ( 'appearance_page_enjoynews-about' === $hook ) {
		wp_enqueue_style( 'enjoynews-about-admin', get_theme_file_uri( 'assets/css/about-admin.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'enjoynews_about_admin_style' );

/**
 * Add theme page
 */
function enjoynews_menu() {
	add_theme_page( esc_html__( 'About EnjoyNews', 'enjoynews' ), esc_html__( 'About EnjoyNews', 'enjoynews' ), 'edit_theme_options', 'enjoynews-about', 'enjoynews_about_display' );
}
add_action( 'admin_menu', 'enjoynews_menu' );

/**
 * Display About page
 */
function enjoynews_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( $theme->get( 'ThemeURI' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Demo', 'enjoynews' ); ?></a>

					<a href="<?php echo esc_url( $theme->get( 'AuthorURI' ) . '/documentation/enjoynews' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Documentation', 'enjoynews' ); ?></a>

					<a href="<?php echo esc_url( $theme->get( 'AuthorURI' ) . '/themes' ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'More Themes', 'enjoynews' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

	</div>
	<?php
}


