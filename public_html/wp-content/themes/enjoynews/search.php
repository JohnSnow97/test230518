<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package enjoynews
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

		<div id="recent-content" class="content-loop">

			<div class="breadcrumbs clear">
				<span class="breadcrumbs-nav">
					<a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Home', 'enjoynews'); ?></a>
					<span class="post-category"><?php printf( esc_html( 'Search Results for %s', 'enjoynews' ), '"' . get_search_query() . '"' ); ?></span>
				</span>							
				<h1>
					<?php printf( esc_html( 'Search Results for %s', 'enjoynews' ), '"' . get_search_query() . '"' ); ?>			
				</h1>	
			</div><!-- .breadcrumbs -->
				
			<?php

			if ( have_posts() ) :	
						
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				get_template_part( 'template-parts/content', 'search' );

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php endif; ?>

		</div>

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

