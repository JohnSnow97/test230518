<?php
/**
 * Home block one widget.
 *
 * @package    enjoynews
 * @author     WPEnjoy
 * @copyright  Copyright (c) 2020, WPEnjoy
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class EnjoyNews_Home_Content_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-enjoynews-home-content',
			'description' => __( 'Display content block on homepage. Only use for the "Home Content" widget area.', 'enjoynews' )
		);

		// Create the widget.
		parent::__construct(
			'enjoynews-home-content',          // $this->id_base
			__( '&raquo; Home Content', 'enjoynews' ), // $this->name
			$widget_options                    // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo wp_kses_post( $before_widget );

			// Default value.
			$defaults = array(
				'title' => '',
				'limit' => 5,
				'cat'   => ''
			);

			$instance = wp_parse_args( (array) $instance, $defaults );
		
			// Theme prefix
			$prefix = 'enjoynews-';

			// Pull the selected category.
			$cat_id = isset( $instance['cat'] ) ? absint( $instance['cat'] ) : 0;

			// Get the category.
			$category = get_category( $cat_id );

			// Get the category archive link.
			$cat_link = get_category_link( $cat_id );

			// Posts query arguments.
			$args = array(
				'post_type'      => 'post',
				'ignore_sticky_posts' => 1,
				'post__not_in' => get_option( 'sticky_posts' ),					
				'posts_per_page' => ( ! empty( $instance['limit'] ) ) ? absint( $instance['limit'] ) : 5
			);

			// Limit to category based on user selected tag.
			if ( ! $cat_id == 0 ) {
				$args['cat'] = $cat_id;
			}

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'enjoynews_home_content_args', $args );

			// The post query.
			$posts = new WP_Query( $query );

			$i = 1;

			if ( $posts->have_posts() ) : ?>

				<div class="content-block content-block-1 clear">

					<div class="section-heading">

					<?php
						if ( ( ! empty( $instance['title'] ) ) && ( $cat_id != 0 ) ) {
							echo '<h3 class="section-title"><a href="' . esc_url( $cat_link ) . '">' . wp_kses_post( apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) ) . '</a></h3>';
							echo '<span class="section-more-link"><a href="' . esc_url( $cat_link ) . '">more</a></span>';							
						} elseif ( $cat_id == 0 ) {
							echo '<h3 class="section-title">' . esc_html( 'Latest Posts', 'enjoynews' ) . '</h3>';
						} else {
							echo '<h3 class="section-title"><a href="' . esc_url( $cat_link ) . '">' . esc_attr( $category->name ) . '</a></h3>';
							echo '<span class="section-more-link"><a href="' . esc_url( $cat_link ) . '">'. esc_html( 'More', 'enjoynews' ) . '</a></span>';
						}
					?>

					</div><!-- .section-heading -->			

					<?php 
						while ( $posts->have_posts() ) : $posts->the_post(); 

						if ($i == 1) { 
					?>

					<div class="post-big hentry">

						<?php if ( has_post_thumbnail() ) { ?>
							<a class="thumbnail-link" href="<?php the_permalink(); ?>">
								<div class="thumbnail-wrap">
									<?php 
										the_post_thumbnail('enjoynews_block_large_thumb');  
									?>
								</div><!-- .thumbnail-wrap -->
							</a>
						<?php } ?>

						<div class="entry-header">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div><!-- .entry-header -->

						<div class="entry-meta">
							<span class="entry-date"><?php echo get_the_date(); ?></span>
							<span class="sep">&middot;</span>
							<span class="entry-comment"><?php comments_popup_link( __('0 Comment','enjoynews'), __('1 Comment','enjoynews'), __('% Comments','enjoynews'), 'comments-link', __('comments off','enjoynews')); ?></span>
						</div><!-- .entry-meta -->

						<div class="entry-summary">
							<?php echo esc_html( wp_trim_words(get_the_excerpt(),'20') ); ?>
						</div><!-- .entry-summary -->

					</div><!-- .hentry -->

					<?php } else { ?>

					<div class="post-small hentry <?php echo( $posts->current_post + 1 === $posts->post_count ) ? 'last' : ''; ?>">

						<?php if ( has_post_thumbnail() ) { ?>
							<a class="thumbnail-link" href="<?php the_permalink(); ?>">
								<div class="thumbnail-wrap">
									<?php 
										the_post_thumbnail('enjoynews_post_thumb');  
									?>
								</div><!-- .thumbnail-wrap -->
							</a>
						<?php } ?>

						<div class="entry-header">

							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

							<div class="entry-meta">
								<span class="entry-date"><?php echo get_the_date(); ?></span>
								<span class="sep">&middot;</span>
								<span class="entry-comment"><?php comments_popup_link( esc_html('0 Comment','enjoynews'), esc_html('1 Comment','enjoynews'), esc_html('% Comments','enjoynews'), 'comments-link', esc_html('comments off','enjoynews')); ?></span>
							</div><!-- .entry-meta -->

						</div><!-- .entry-header -->

					</div><!-- .hentry -->

					<?php 
						}
						$i++;
						endwhile; 
					?>
				</div><!-- .content-block-1 -->

			<?php endif;

			// Restore original Post Data.
			wp_reset_postdata();

		// Close the theme's widget wrapper.
		echo wp_kses_post( $after_widget );

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = (int) $new_instance['limit'];
		$instance['cat']   = (int) $new_instance['cat'];

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title' => '',
			'limit' => 5,
			'cat'   => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'enjoynews' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'cat' ) ); ?>"><?php esc_html_e( 'Choose category', 'enjoynews' ); ?></label>
			<select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'cat' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'cat' ) ); ?>" style="width:100%;">
				<?php $categories = get_terms( 'category' ); ?>
				<option value="0"><?php esc_html_e( 'All categories &hellip;', 'enjoynews' ); ?></option>
				<?php foreach( $categories as $category ) { ?>
					<option value="<?php echo esc_attr( $category->term_id ); ?>" <?php selected( $instance['cat'], $category->term_id ); ?>><?php echo esc_html( $category->name ); ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'limit' ) ); ?>">
				<?php esc_html_e( 'Number of posts to show', 'enjoynews' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'limit' ) ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['limit'] ); ?>" />
		</p>		

	<?php

	}

}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function enjoynews_home_content_meta() {

	// Set up empty html
	$html = '';

	// Open wrapper
	$html = '<div class="entry-meta">';
		$category = get_the_category( get_the_ID() );
		if ( $category && enjoynews_categorized_blog() ) {
			$html .= '<span class="entry-category">' . esc_attr( $category[0]->name ) . '</span>';
		}
		$html .= ' <span class="sep">|</span> ';
		$html .= '<span class="entry-date"><time class="published" datetime="' . esc_html( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></span>';
	$html .= '</div>';

	return $html;

}