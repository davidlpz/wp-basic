<?php get_header(); ?>
	
	<section id="main" role="main">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php edit_post_link(); ?>
			
			<?php if (comments_open()) comments_template(); ?>

		<?php endwhile; ?>

		<?php else: ?>

			<article>
				<h1><?php _e( 'Sorry, nothing to display.' ); ?></h1>
			</article>

		<?php endif; ?>	

	</section>

<?php get_footer(); ?>