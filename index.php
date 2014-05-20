<?php get_header(); ?>

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