<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(array($width,$height)); // Set a size for the thumbnail ?>
			</a>
		<?php endif; ?>

		<header class="entry-header">
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

			<span class="date"><?php the_time('j/m/Y'); ?></span>
			<span class="author"><?php _e( 'Published by' ); ?> <?php the_author_posts_link(); ?></span>
			<?php if ( comments_open() ) : ?>
				<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts' ), __( '1 Comment' ), __( '% Comments' )); ?></span>
			<?php endif; ?>
		</header>

		<div class="entry-summary"><?php custom_excerpt(50); ?></div>

	</article>

<?php endwhile; ?>

<?php else: ?>

	<article>
		<h1><?php _e( 'Sorry, nothing to display.' ); ?></h1>
	</article>

<?php endif; ?>