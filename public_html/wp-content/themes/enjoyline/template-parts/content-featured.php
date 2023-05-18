<?php		
	$args = array( 
	    'posts_per_page' => 8,
		'ignore_sticky_posts' => 1,
		'post__not_in' => get_option( 'sticky_posts' ),	
		'meta_query' => array(
            array(
            'key' => 'enjoyline-featured',
            'value' => 'yes'
        )
    )
	);  

	$wp_query = new WP_Query($args);	

	if ( $wp_query->have_posts() && (!get_query_var('paged')) ) {	
?>

	<div id="featured-content" class="clear">

		<div class="featured-wrap owl-carousel clear">

		<?php
			// The Loop
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
		?>	

		<div class="hentry hover-up">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();  
					} else {
						echo '<img src="' . esc_url( get_template_directory_uri() ). '/assets/img/featured-default.png" alt="" />';
					}
					?>
				</div><!-- .thumbnail-wrap -->
				<div class="gradient">
				</div>
			</a>

			<div class="entry-header">		
				<div class="entry-category">
					<?php enjoyline_first_category(); ?>
				</div>					
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>			
			</div><!-- .entry-header -->

		</div><!-- .hentry -->

		<?php
			endwhile;
		?>

		</div><!-- .featured-wrap -->

	</div><!-- #featured-content -->

<?php 
	} 
	wp_reset_postdata();
?>