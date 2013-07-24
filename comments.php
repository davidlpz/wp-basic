<?php if (post_password_required()) return; ?>

<?php if (have_comments()) : ?>
	
	<section id="comments">

		<h2><?php comments_number(); ?></h2>

		<p class="leave-comment"><a href="#respond">Leave a comment »</a></p>

		<ol>
			<?php wp_list_comments(); ?>
		</ol>

	</section>

<?php endif; ?>

<?php comment_form(); ?>