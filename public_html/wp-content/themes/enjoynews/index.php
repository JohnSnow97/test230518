<?php get_header(); ?>

	<div id="primary" class="content-area clear">

		<main id="main" class="site-main clear">


			<?php if ( is_active_sidebar( 'home-content' ) ) { ?>

			<div id="recent-content">

				<?php dynamic_sidebar( 'home-content' ); ?>

			</div><!-- #recent-content -->

			<?php } else { ?>

			<div id="recent-content" class="content-loop">

				<?php
				
				if ( have_posts() ) :	
				
				$i = 1;		
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'loop');

					if ( $i == 2 ) {
						dynamic_sidebar( 'archive-ad' );
					}

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->		

			<?php get_template_part( 'template-parts/pagination', '' ); ?>

			<?php } ?>							
			
		</main><!-- .site-main -->

	</div><!-- #primary -->

<?php get_template_part('sidebar', 'home'); ?>
<?php get_footer(); ?>