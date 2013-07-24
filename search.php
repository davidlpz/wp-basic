<?php get_header(); ?>
	
	<section id="main" role="main">

		<header class="entry-header">
			<h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<span class="results-number"><?php echo $wp_query->found_posts . ' results'; ?></span>
		</header>
	
		<?php get_template_part('loop'); ?>
		
		<?php pagination(); ?>
	
	</section>

<?php get_footer(); ?>