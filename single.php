<?php get_header(); ?>

	<section id="main" role="main">

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			<?php endif; ?>

			<header class="entry-header">

				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>

				<div class="meta">
					<span class="author vcard">Published by <?php the_author_posts_link(); ?></span>
					<span class="date updated"><?php the_time('j/F/Y'); ?></span>
					<span class="cat"><?php the_category(', '); ?></span>
					<?php if ( comments_open() ) : ?>
						<span class="comments"><?php comments_popup_link( __( 'Leave your thoughts' ), __( '1 Comment' ), __( '% Comments' )); ?></span>
					<?php endif; ?>
				</div>

			</header>

			<div class="entry-content"><?php the_content(); ?></div>

		</article>

		<?php if (comments_open()) comments_template(); ?>

	<?php endwhile; ?>

	</section>

<?php get_footer(); ?>