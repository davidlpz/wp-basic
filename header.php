<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
<?php wp_head(); ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed">
	
	<?php do_action( 'before' ); ?>

	<header class="header" role="banner">

		<div>
			<a class="logo" href="<?php echo  home_url( '/' ); ?>" 
				title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a>
		</div>
		
		<nav class="nav" role="navigation">
			<ul>
				<li><a href="<?php echo home_url( '/' ); ?>">Home</a></li>
				<li><a href="<?php echo home_url( '/' ); ?>about/">About</a></li>
				<li><a href="<?php echo home_url( '/' ); ?>contact/">Contact</a></li>
			</ul>
		</nav>

		<aside id="search" role="complementary">
			<?php get_search_form(); ?>
		</aside>

	</header>