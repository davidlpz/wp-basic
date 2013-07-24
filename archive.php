<?php get_header(); ?>

	<section id="main" role="main">

		<h1><?php
			if ( is_category() ) : single_cat_title();

			elseif ( is_tag() ) : single_tag_title();

			elseif ( is_day() ) :
				printf( __( 'Day: %s' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Month: %s' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Year: %s' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			else :
				_e( 'Archives' );

			endif;
		?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<?php pagination(); ?>

	</section>

<?php get_footer(); ?>