<?php
/**
 * Rico-Amber Theme Customizer.
 *
 * @package Rico-Amber
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rico_amber_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*======================================
		company info section
	======================================*/

	$wp_customize->add_section( 'address_section', array(
		'title' => "Company Info",
		'priority' => 0,
	));

	/*======================================
		address info
	======================================*/
	$wp_customize->add_setting( 'address_setting', array(
		'default'  => 'enter your address here',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'address_text', array(
		'label'    => __( 'Enter your address', 'rico-amber' ),
		'section'  => 'address_section',
		'settings' => 'address_setting',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	$wp_customize->get_setting( 'address_setting')->transport = 'postMessage';

	/*======================================
		phone info
	======================================*/

	$wp_customize->add_setting( 'phone_setting', array(
		'default' => '555-555-555',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'phone_text', array(
		'label' => __( 'Enter your phone number', 'rico-amber' ),
		'section'  => 'address_section',
		'settings' => 'phone_setting',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	$wp_customize->get_setting( 'phone_setting')->transport = 'postMessage';

	/*======================================
		email info
	======================================*/

	$wp_customize->add_setting( 'email_setting', array(
		'default' => 'name@mail.com',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod'
	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'email_text', array(
		'label' => __( 'Enter your email address', 'rico-amber' ),
		'section'  => 'address_section',
		'settings' => 'email_setting',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	$wp_customize->get_setting( 'email_setting')->transport = 'postMessage';
}
add_action( 'customize_register', 'rico_amber_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rico_amber_customize_preview_js() {
	wp_enqueue_script( 'rico_amber_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rico_amber_customize_preview_js' );