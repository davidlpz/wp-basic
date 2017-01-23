<?php get_header(); ?>

	<section id="main" role="main">

		<?php if (have_posts()): ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('content'); ?>

			<?php endwhile; ?>

			<?php pagination(); ?>

		<?php else: ?>

			<h1 class="entry-title">Sorry, nothing to display.</h1>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>