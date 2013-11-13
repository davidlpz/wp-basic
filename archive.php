<?php get_header(); ?>

	<section id="main" role="main">

		<header class="archive-header">

			<h1 class="archive-title">
				<?php
					if ( is_category() ) :
						printf('Category: %s', single_cat_title('',false));

					elseif ( is_tag() ) :
						printf('Tag: %s', single_tag_title('',false));

					elseif ( is_author() ) :
						the_post();
						printf('Author: %s', get_the_author());
						rewind_posts();

					elseif ( is_day() ) :
						printf('Day: %s', get_the_date());

					elseif ( is_month() ) :
						printf('Month: %s', get_the_date( 'F Y' ));

					elseif ( is_year() ) :
						printf('Year: %s', get_the_date( 'Y' ));

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