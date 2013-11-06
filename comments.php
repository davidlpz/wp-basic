<?php if (post_password_required()) return; ?>

<section id="comments" class="comments-area">

	<?php if (have_comments()) : ?>

		<h2><?php comments_number(); ?></h2>

		<p class="leave-comment"><a href="#respond">Leave a comment »</a></p>

		<ol class="comment-list">
			<?php wp_list_comments(); ?>
		</ol>

	<?php endif; ?>

</section>

<?php comment_form(); ?>