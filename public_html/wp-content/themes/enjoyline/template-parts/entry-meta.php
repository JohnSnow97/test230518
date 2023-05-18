<div class="entry-meta">

	<span class="entry-author"><?php esc_html_e('By', 'enjoyline'); ?> <?php the_author_posts_link(); ?></span> 

	<span class="sep sep1">&bullet;</span>

	<span class="entry-date"><?php echo get_the_date(); ?></span>

	<span class="sep sep2">&bullet;</span>

	<span class="entry-comment"><?php comments_popup_link( __('0 Comment','enjoyline'), __('1 Comment', 'enjoyline'), '% Comments', 'comments-link', __('comments off', 'enjoyline'));?></span>

</div><!-- .entry-meta -->
