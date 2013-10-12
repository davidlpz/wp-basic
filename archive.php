<?php get_header(); ?>

	<section id="main" role="main">

		<header class="entry-header">

			<h1 class="entry-title">
				<?php
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
				?>
			</h1>

		</header>

		<?php if (have_posts()): ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php get_template_part('content'); ?>

			<?php endwhile; ?>

			<?php pagination(); ?>

		<?php else: ?>

			<?php get_template_part('no-results'); ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>