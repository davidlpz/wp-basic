<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail()) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	<?php endif; ?>

	<header class="entry-header">

		<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

		<div class="meta">
			<span class="date updated"><?php the_time('j/F/Y'); ?></span>
			<span class="author vcard">Published by <?php the_author_posts_link(); ?></span>
			<?php if ( comments_open() ) : ?>
				<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts' ), __( '1 Comment' ), __( '% Comments' )); ?></span>
			<?php endif; ?>
			<span class="cat"><?php the_category(', '); ?></span>
		</div>

	</header>

	<div class="entry-summary"><?php the_excerpt(); ?></div>

</article>