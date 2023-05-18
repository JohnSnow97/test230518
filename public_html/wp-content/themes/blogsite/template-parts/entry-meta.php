<div class="entry-meta">

	<span class="entry-author"><?php esc_url( the_author_posts_link() ); ?></span>
	<span class="sep author-sep">&middot;</span>	
	<span class="entry-date"><?php echo get_the_date(); ?></span>
	<span class="sep">&middot;</span>
	<span class='entry-comment'><?php comments_popup_link( __('0 Comment','blogsite'), __('1 Comment','blogsite'), __('% Comments','blogsite'), 'comments-link', __('Comments off','blogsite')); ?></span>
	
</div><!-- .entry-meta -->
