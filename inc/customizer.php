<?php

/**
 * Enqueue script for custom customize control.
 */
add_action('customize_controls_enqueue_scripts', 'custom_customize_enqueue');
function custom_customize_enqueue() {
	wp_enqueue_script('custom-customize', get_stylesheet_directory_uri() . '/inc/custom-customize.js', array( 'jquery', 'customize-controls' ), false, true );
}

add_action('customize_register', 'theme_customizer', 20);
function theme_customizer($wp_customize){
	// SECTION SOCIAL NETWORKS
	$wp_customize->add_section('social_networks', array(
		'title'       => 'Redes sociales'
	));

	// Facebook
	$wp_customize->add_setting('facebook_link');
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'facebook_link', array(
		'label'    => 'Facebook',
		'type'     => 'text',
		'section'  => 'social_networks',
		'settings' => 'facebook_link',
	)));

	// Instagram
	$wp_customize->add_setting('instagram_link');
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'instagram_link', array(
		'label'    => 'Instagram',
		'type'     => 'text',
		'section'  => 'social_networks',
		'settings' => 'instagram_link',
	)));

	// Pinterest
	$wp_customize->add_setting('pinterest_link');
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'pinterest_link', array(
		'label'    => 'Pinterest',
		'type'     => 'text',
		'section'  => 'social_networks',
		'settings' => 'pinterest_link',
	)));

	// Tumblr
	$wp_customize->add_setting('tumblr_link');
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'tumblr_link', array(
		'label'    => 'Tumblr',
		'type'     => 'text',
		'section'  => 'social_networks',
		'settings' => 'tumblr_link',
	)));

	// Twitter
	$wp_customize->add_setting('twitter_link');
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'twitter_link', array(
		'label'    => 'Twitter',
		'type'     => 'text',
		'section'  => 'social_networks',
		'settings' => 'twitter_link',
	)));

	// Analytics
	$wp_customize->add_setting('analytics_code');
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'analytics_code', array(
		'label'    => 'Google Analytics',
		'type'     => 'text',
		'section'  => 'social_networks',
		'settings' => 'analytics_code',
	)));
}