<?php get_header(); ?>

	<?php
		// Thumbnail size
		$width = 250; $height = 250;
		// Custom excerpt length
		$length = 50;
	?>

	<section id="main" role="main">

		<?php if (have_posts()): ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('content'); ?>

			<?php endwhile; ?>

			<?php pagination(); ?>

		<?php else: ?>

			<?php get_template_part('no-results'); ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>