<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<?php get_template_part('content'); ?>

<?php endwhile; ?>

<?php else: ?>

	<article>
		<h1><?php _e( 'Sorry, nothing to display.' ); ?></h1>
	</article>

<?php endif; ?>