<?php get_header(); ?>
	
	<section id="main" role="main">

		<?php get_template_part('loop'); ?>

		<?php pagination(); ?>

	</section>

<?php get_footer(); ?>