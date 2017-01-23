<?php

require get_template_directory() . '/inc/customizer.php';

add_action('init', 'wp_head_cleanup');
function wp_head_cleanup(){
	add_filter('show_admin_bar','__return_false');
	// Remove comments feed
	// Remove link to the Really Simple Discovery service endpoint, EditURI link
	remove_action('wp_head', 'rsd_link');
	// Remove XHTML generator that is generated on the wp_head hook, WP version
	remove_action('wp_head', 'wp_generator');
	// remove link to index page
	remove_action('wp_head', 'index_rel_link');
	// Remove link to the Windows Live Writer manifest file
	remove_action('wp_head', 'wlwmanifest_link');
	// Remove short link
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	// Remove start link
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	// Remove prev link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	// Remove relational links for the posts adjacent to the current post
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	// Remove the new WordPress Emoji support
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	// Turn off oEmbed auto discovery.
	// Don't filter oEmbed results.
	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
	// Remove oEmbed discovery links.
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action('wp_head', 'wp_oembed_add_host_js');
	// Remove the REST API
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	// Remove the dns-prefetch code
	remove_action('wp_head', 'wp_resource_hints', 2);
}
add_action( 'after_setup_theme', 'theme_setup' );
if ( ! function_exists( 'theme_setup' ) ) :
	function theme_setup() {
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Enable support for custom menus
		add_theme_support( 'menus' );
	}
endif;

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
function theme_scripts() {
	wp_register_style('theme_style', get_stylesheet_uri(), array(), null);
	wp_enqueue_style('theme_style');

	wp_register_script('main', get_template_directory_uri() . '/js/main.js', false, null, true);
	wp_enqueue_script('main');
}

/**
 * Filters wp_title to print a <title> tag based on what is being viewed
 */
add_filter( 'wp_title', 'theme_wp_title', 10, 2 );
function theme_wp_title( $title, $sep ) {
	global $page, $paged;
	if (is_feed()) return $title;
	// Blog name
	$title .= get_bloginfo( 'name' );
	// Add a page number if necessary:
	if ($paged >= 2 || $page >= 2  && ! is_404())
		$title .= " $sep " . sprintf( __( 'Page %s' ), max( $paged, $page ) );

	return $title;
}

/**
 * Integrate facebook opengraph
 */
add_action( 'wp_head', 'insert_fb_in_head');
function insert_fb_in_head(){
global $post;
if (is_single()) { ?>
<!-- Google Authorship and Publisher Markup -->
<link rel="author" href=""/>
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php single_post_title(''); ?>">
<meta itemprop="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
<meta itemprop="image" content="<?php if (has_post_thumbnail($post->ID)) { echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); } else { echo get_template_directory_uri() . '/img/logo.png'; } ?>">
<!-- Open Graph data -->
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:image" content="<?php if (has_post_thumbnail($post->ID)) { echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); } else { echo get_template_directory_uri() . '/img/logo.png'; } ?>" />
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php } else { ?>
<!-- Google Authorship and Publisher Markup -->
<link rel="author" href=""/>
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php bloginfo('name'); ?>">
<meta itemprop="description" content="<?php bloginfo('description'); ?>">
<meta itemprop="image" content="<?php echo get_template_directory_uri(); ?>/img/logo.png">
<!-- Open Graph data -->
<meta property="og:title" content="<?php bloginfo('name'); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo home_url( '/' ); ?>"/>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php }
}

/**
 * Add google analytics code before </head>
 */
add_action('wp_head', 'add_google_analytics');
function add_google_analytics() {
	if ($code = get_theme_mod('analytics_code')){
		echo $code;
	}
}


/**
 * Add class to the next and previous buttons
 */
add_filter('next_posts_link_attributes', 'posts_next_attributes');
function posts_next_attributes() {
    return 'class="next"';
}

add_filter('previous_posts_link_attributes', 'posts_previous_attributes');
function posts_previous_attributes() {
	return 'class="previous"';
}

/**
 * Add pagination
 */
function pagination($prev_next = false) {
	global $wp_query;
	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1) {
		$big = 99999999;
		$list = paginate_links(array(
			'base' => str_replace($big, '%#%', get_pagenum_link($big)),
			'format' => 'page/%#%/',
			'current' => max(1, get_query_var('paged')),
			'total' => $total_pages,
			'prev_next' => $prev_next,
			'type' => 'list',
			'prev_text' => __('«'),
			'next_text' => __('»')
		));
		echo $list;
	}
}

/**
 * Minify the output
 */
if (!is_admin()){
	function minify_output($buffer){
		$search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
		$replace = array('>','<','\\1');
		if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
			$buffer = preg_replace($search, $replace, $buffer);
		}
		return $buffer;
	}
	ob_start('minify_output');
}