<div class="entry-meta">

	<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?></a> <?php the_author_posts_link(); ?></span> 

	<span class="entry-date"><?php echo get_the_date(); ?></span>

	<span class="sep">&bullet;</span>

	<span class="entry-comment"><?php comments_popup_link( __('0 Comment','enjoyline'), __('1 Comment', 'enjoyline'), '% Comments', 'comments-link', __('comments off', 'enjoyline'));?></span>

</div><!-- .entry-meta -->
