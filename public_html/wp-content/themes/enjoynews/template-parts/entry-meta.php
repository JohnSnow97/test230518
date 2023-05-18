<div class="entry-meta clear">
	<span class="entry-category"><?php enjoynews_first_category(); ?></span>
	<span class="entry-author">
		<?php the_author_posts_link(); ?>
	</span>
	<span class="sep date-sep">&middot;</span>
	<span class="entry-date"><?php echo get_the_date(); ?></span>
	<span class="sep comment-sep">&middot;</span>
	<span class='entry-comment'><?php comments_popup_link( __('0 Comment','enjoynews'), __('1 Comment','enjoynews'), __('% Comments','enjoynews'), 'comments-link', __('comments off','enjoynews')); ?></span>
	
</div><!-- .entry-meta -->