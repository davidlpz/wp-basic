<?php get_header(); ?>

	<section id="main" role="main">

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">

				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

			</header>

			<div class="entry-content"><?php the_content(); ?></div>

		</article>

	<?php endwhile; ?>

	</section>

<?php get_footer(); ?>