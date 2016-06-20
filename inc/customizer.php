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
	$wp_customize->add_panel('front_page_comp_info', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __('Amber Front Page Options', 'rico-amber'),
		'description' => __('Several settings')
	));

	$wp_customize->add_panel('portfolio_cat', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __('Portfolio Category Options', 'rico-amber'),
		'description' => __('Several settings')
	));



	$wp_customize->add_section( 'company_info', array(
		'title' => "Company Info in Footer",
		'priority' => 0,
		'panel' => 'front_page_comp_info'
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
		'section'  => 'company_info',
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
		'section'  => 'company_info',
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
		'section'  => 'company_info',
		'settings' => 'email_setting',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	$wp_customize->get_setting( 'email_setting')->transport = 'postMessage';

	/*======================================
		logo image
	======================================*/

	$wp_customize->add_section('company_logo', array(
		'title' => "Company Info in Footer",
		'priority' => 0,
		'panel' => 'front_page_comp_info'
	));


	$wp_customize->add_setting( 'logo_image');

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_image', array(
		'label' => __( 'Upload Logo', 'rico-amber' ),
		'section'  => 'company_logo',
		'settings' => 'logo_image',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	$wp_customize->get_setting( 'logo_image')->transport = 'postMessage';

	/*======================================
		company info section
	======================================*/
	$wp_customize->add_section( 'front_page_info', array(
		'title' => "Front Page Info",
		'priority' => 1,
		'panel' => 'front_page_comp_info'
	));

	/*======================================
		first info
	======================================*/
	$wp_customize->add_setting( 'info_header', array(
		'default'  => 'enter header text',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'info_header_text', array(
		'label'    => __( 'Enter header text for info section', 'rico-amber' ),
		'section'  => 'front_page_info',
		'settings' => 'info_header',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	$wp_customize->get_setting( 'info_header')->transport = 'postMessage';
	// ============================================
	// 	paragraph

	$wp_customize->add_setting( 'info_paragraph', array(
		'default'  => 'enter text here',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'info_paragraph_text', array(
		'label'    => __( 'Enter info text for info section', 'rico-amber' ),
		'section'  => 'front_page_info',
		'settings' => 'info_paragraph',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
		'type' => 'textarea'
	)));

	$wp_customize->get_setting( 'info_paragraph')->transport = 'postMessage';

	/*======================================
		Portfolio section
	======================================*/
	//portfolio section
	$wp_customize->add_section( 'portfolio_section', array(
		'title' => "Portfolio Section",
		'priority' => 0,
		'panel' => 'front_page_comp_info'
	));

	//portfolio header
	$wp_customize->add_setting( 'portfolio_header', array(
		'default'  => 'Portfolio Section',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	//portfolio header control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_header_text', array(
		'label'    => __( 'Enter header text for portfolio section', 'rico-amber' ),
		'section'  => 'portfolio_section',
		'settings' => 'portfolio_header',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	//portfolio paragraph
	$wp_customize->add_setting( 'portfolio_desc', array(
		'default'  => 'Portfolio Section',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	//portfolio paragraph control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_desc_text', array(
		'label'    => __( 'Enter information text for portfolio section', 'rico-amber' ),
		'section'  => 'portfolio_section',
		'settings' => 'portfolio_desc',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
		'type' => 'textarea'
	)));

	//add default image to portfolio section
	$defaultBGImage = get_bloginfo('template_url') . '/images/portfolio-bg.jpg';
	//portfolio background
	$wp_customize->add_setting( 'portfolio_bg', array(
		'default'  => $defaultBGImage,
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	//portfolio paragraph control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'portfolio_bg_control', array(
		'label'    => __( 'Select background image for portfolio section', 'rico-amber' ),
		'section'  => 'portfolio_section',
		'settings' => 'portfolio_bg',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
		// 'type' => 'textarea'
	)));

	$wp_customize->get_section('portfolio_bg')->transport = 'postMessage';
	/*======================================
			features section
		======================================*/
	//portfolio section
	$wp_customize->add_section( 'features_section', array(
		'title' => "Features Section",
		'priority' => 0,
		'panel' => 'front_page_comp_info'
	));

	//portfolio header
	$wp_customize->add_setting( 'features_header', array(
		'default'  => 'Superb Features',
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	//portfolio header control
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'features_header_control', array(
		'label'    => __( 'Enter header text for features section', 'rico-amber' ),
		'section'  => 'features_section',
		'settings' => 'features_header',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	/*======================================
			quotes section
		======================================*/
	//portfolio section
	$wp_customize->add_section( 'quotes_section', array(
		'title' => "Quote Section",
		'priority' => 0,
		'panel' => 'front_page_comp_info'
	));

	//add default image to portfolio section
	$defaultQuoteBGImage = get_bloginfo('template_url') . '/images/quote-bg.jpg';
	//portfolio background
	$wp_customize->add_setting( 'quote_bg_setting', array(
		'default'  => $defaultQuoteBGImage,
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	//portfolio header control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'quote_bg_control', array(
		'label'    => __( 'Chose background image for quote section', 'rico-amber' ),
		'section'  => 'quotes_section',
		'settings' => 'quote_bg_setting',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));

	/*======================================
			portfolio-cat section
		======================================*/
	//portfolio section
	$wp_customize->add_section( 'portfolio_cat_section', array(
		'title' => "Company Info in Footer",
		'priority' => 0,
		'panel' => 'portfolio_cat'
	));

	//add default image to portfolio section
	$defaultQuoteBGImage = get_bloginfo('template_url') . '/images/quote-bg.jpg';
	//portfolio background
	$wp_customize->add_setting( 'portfolio_cat_header', array(
		'default'  => $defaultQuoteBGImage,
		'transport' => 'postMessage',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
	));

	//portfolio header control
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'quote_bg_control', array(
		'label'    => __( 'Chose background image for quote section', 'rico-amber' ),
		'section'  => 'quotes_section',
		'settings' => 'quote_bg_setting',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	)));
}

add_action( 'customize_register', 'rico_amber_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rico_amber_customize_preview_js() {
	wp_enqueue_script( 'rico_amber_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rico_amber_customize_preview_js' );