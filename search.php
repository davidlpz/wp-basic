<?php get_header(); ?>

	<section id="main" role="main">

		<header class="entry-header">

			<h1 class="entry-title">
				<?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h1>

			<span class="results-number">
				<?php echo $wp_query->found_posts . ' results'; ?>
			</span>

		</header>

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