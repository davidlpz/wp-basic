<?php get_header(); ?>

	<?php
		// Thumbnail size
		$width = 250; $height = 250;
		// Custom excerpt length
		$length = 50;
	?>

	<section id="main" role="main">

		<?php get_template_part('loop'); ?>

		<?php pagination(); ?>

	</section>

<?php get_footer(); ?>