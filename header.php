<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">

	<?php do_action( 'before' ); ?>

	<header class="header" role="banner">

		<h1>
			<a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a>
		</h1>

		<nav class="nav" role="navigation">
			<?php wp_nav_menu(array('container' => false)); ?>
		</nav>

		<?php get_search_form(); ?>

	</header>