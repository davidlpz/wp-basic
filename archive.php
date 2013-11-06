<?php get_header(); ?>

	<section id="main" role="main">

		<header class="archive-header">

			<h1 class="archive-title">
				<?php
					if ( is_category() ) :
						printf( __( 'Category: %s' ), '<span>' . single_cat_title('',false) . '</span>' );

					elseif ( is_tag() ) :
						printf( __( 'Tag: %s' ), '<span>' . single_tag_title('',false) . '</span>' );

					elseif ( is_author() ) :
						the_post();
						printf( __( 'Author: %s' ), '<span>' . get_the_author() . '</span>' );
						rewind_posts();

					elseif ( is_day() ) :
						printf( __( 'Day: %s' ), '<span>' . get_the_date() . '</span>' );

					elseif ( is_month() ) :
						printf( __( 'Month: %s' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

					elseif ( is_year() ) :
						printf( __( 'Year: %s' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

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