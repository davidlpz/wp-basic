<?php get_header(); ?>

	<section id="main" role="main">

		<header class="archive-header">
			<?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
		</header>

		<?php if (have_posts()): ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('content'); ?>

			<?php endwhile; ?>

			<?php pagination(); ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>