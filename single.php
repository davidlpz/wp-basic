<?php get_header(); ?>

	<section id="main" role="main">

		<?php while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php if (comments_open()) comments_template(); ?>

		<?php endwhile; ?>

	</section>

<?php get_footer(); ?>