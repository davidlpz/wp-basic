<?php

function wp_head_cleanup() {
	// Remove link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// Remove link to the Windows Live Writer manifest file
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove index link
	remove_action( 'wp_head', 'index_rel_link' );
	// Remove short link
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	// Remove start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// Remove prev link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// Remove relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	// Remove XHTML generator that is generated on the wp_head hook, WP version
	remove_action( 'wp_head', 'wp_generator' );
	// Recent comments sidebar widget inline css
	global $wp_widget_factory;
	remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
add_action('init', 'wp_head_cleanup');

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
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Enqueue scripts and styles
 */
function theme_scripts() {
	wp_register_style('theme_style', get_stylesheet_uri(), array(), null);
	wp_enqueue_style('theme_style');

	// Load jQuery from Google CDN
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js", false, null, true);
		wp_enqueue_script('jquery');
	}

	wp_register_script('library', get_template_directory_uri() . '/js/library.js', false, null, true);
	wp_enqueue_script('library');
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Get current url
 */
function current_url() {
	global $wp;
	return add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
}

/**
 * Remove words with less than 3 characteres
 */
function remove_short_words($slug) {
    if (!is_admin()) return $slug;
    $slug = explode('-', $slug);
    foreach ($slug as $k => $word) {
        if (strlen($word) < 3) {
            unset($slug[$k]);
        }
    }
    return implode('-', $slug);
}
add_filter('sanitize_title', 'remove_short_words');

/**
 * Filters wp_title to print a <title> tag based on what is being viewed
 */
function theme_wp_title( $title, $sep ) {

	global $page, $paged;

	if ( is_feed() ) return $title;

	// Blog name
	$title .= get_bloginfo( 'name' );

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'theme_wp_title', 10, 2 );

/**
 * Integrate facebook opengraph
 */
function insert_fb_in_head(){
global $post;
if (is_single()) { ?>
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php if (has_post_thumbnail($post->ID)) { echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); } else { echo get_template_directory_uri() . '/img/logo.png'; } ?>" />
<?php } else { ?>
<meta property="og:url" content="<?php echo home_url( '/' ); ?>"/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:title" content="<?php bloginfo('name'); ?>" />
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
<?php }
}
add_action( 'wp_head', 'insert_fb_in_head');

/**
 * Custom excerpt
 */
function custom_excerpt($length) {
	global $post;

	if ($post->post_excerpt) {
		$output = $post->post_excerpt;
	} else if ($post->post_content) {
		$output = strip_tags(get_the_content());
	} else return;

	$array = explode(" ", $output, $length+1);

	if (count($array) > $length) {
		unset($array[$length]);
		echo implode(" ", $array) . '...';
	} else echo implode(" ", $array);
}

/**
 * Add class to the next and previous buttons
 */
function posts_next_attributes() {
    return 'class="next"';
}
add_filter('next_posts_link_attributes', 'posts_next_attributes');

function posts_previous_attributes() {
    return 'class="previous"';
}
add_filter('previous_posts_link_attributes', 'posts_previous_attributes');

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
 * Enable threaded comments
 */
function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments'))) {
       wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');

/**
 * Integrate facebook opengraph
 */
function insert_fb_in_head(){
global $post;
if (is_single()) { ?>
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php if (has_post_thumbnail($post->ID)) { echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); } else { echo get_template_directory_uri() . '/img/logo.png'; } ?>" />
<?php } else { ?>
<meta property="og:url" content="<?php echo home_url( '/' ); ?>"/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:title" content="<?php bloginfo('name'); ?>" />
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/logo.png" />
<?php }
}
add_action( 'wp_head', 'insert_fb_in_head');

/**
 * Ajax method
 */
function do_ajax(){
	global $post;
	die();
}
add_action('wp_ajax_nopriv_do_ajax', 'do_ajax');
add_action('wp_ajax_do_ajax', 'do_ajax');

?>