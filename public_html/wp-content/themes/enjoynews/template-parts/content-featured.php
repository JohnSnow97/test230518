<?php		
	$args = array( 
	    'posts_per_page' => 5,
		'ignore_sticky_posts' => 1,
		'post__not_in' => get_option( 'sticky_posts' ),		    
		'meta_query' => array(
                array(
                'key' => 'enjoynews-featured',
                'value' => 'yes'
        	)
    	)
	);  

	// The Query
	$the_query = new WP_Query( $args );

	$i = 1;

	if ( $the_query->have_posts() && (!get_query_var('paged')) ) {	
?>

	<div id="featured-content" class="container clear">

	<?php
		while ( $the_query->have_posts() ) : $the_query->the_post();
	?>	

	<?php if ($i == 1) { ?>

	<div class="featured-large hentry">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('enjoynews_featured_large_thumb');  
					} else {
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/img/featured-large-thumb.png" alt="" />';
					}
					?>
				</div><!-- .thumbnail-wrap -->
				<span class="gradient"></span>
			</a>

			<div class="entry-header">
				<div class="entry-category">
					<?php enjoynews_first_category(); ?>
				</div>						
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>					
			</div><!-- .entry-header -->	
		
	</div><!-- .featured-large -->			

	<?php } else { ?>

	<div class="featured-small hentry <?php echo( $the_query->current_post + 1 === $the_query->post_count ) ? 'last' : ''; ?>">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('enjoynews_featured_small_thumb');  
					} else {
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/img/featured-small-thumb.png" alt="" />';
					}
					?>
				</div><!-- .thumbnail-wrap -->
				<span class="gradient"></span>
			</a>

		<div class="entry-header">
			<div class="entry-category">
				<?php enjoynews_first_category(); ?>
			</div>			
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>		
		</div><!-- .entry-header -->	

	</div><!-- .featured-small -->

	<?php

		}
		$i++;
		endwhile;
	?>

	</div><!-- #featured-content -->

<?php
	}
	wp_reset_postdata();	
?>
	