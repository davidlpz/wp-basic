<?php get_header(); ?>

	<section id="main" role="main">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<h1><?php _e( 'Page not found' ); ?></h1>
			<h2>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?' ); ?></a>
			</h2>
			
		</article>
		
	</section>
	
<?php get_footer(); ?>