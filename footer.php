<footer class="footer" role="contentinfo">
	<div class="social">
		<?php if ($link = get_theme_mod('facebook_link')){ ?>
			<a href="<?php echo $link; ?>" target="_blank">Facebook</a>
		<?php } ?>
		<?php if ($link = get_theme_mod('instagram_link')){ ?>
			<a href="<?php echo $link; ?>" target="_blank">Instagram</a>
		<?php } ?>
		<?php if ($link = get_theme_mod('pinterest_link')){ ?>
			<a href="<?php echo $link; ?>" target="_blank">Pinterest</a>
		<?php } ?>
		<?php if ($link = get_theme_mod('tumblr_link')){ ?>
			<a href="<?php echo $link; ?>" target="_blank">Tumblr</a>
		<?php } ?>
		<?php if ($link = get_theme_mod('twitter_link')){ ?>
			<a href="<?php echo $link; ?>" target="_blank">Twitter</a>
		<?php } ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>