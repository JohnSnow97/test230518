<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package enjoyline
 */

get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">

			<div class="breadcrumbs clear">					
				<h1>
					<span class="archive-title"><?php printf( esc_html( 'Search Results for %s', 'enjoyline' ), '"' . get_search_query() . '"' ); ?></span>			
				</h1>	
			</div><!-- .breadcrumbs -->
				
			<div id="recent-content" class="content-loop">

				<?php

				if ( have_posts() ) :	
							
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'search' );

					endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					?>

				<?php endif; ?>

			</div>

			<?php get_template_part( 'template-parts/pagination', '' ); ?>

		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

