<?php
/**
 * themetask Theme Customizer
 *
 * @package themetask
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function themetask_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function themetask_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themetask_customize_preview_js() {
	wp_enqueue_script( 'themetask-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'themetask_customize_preview_js' );

// add theme customizer register
function anik_customizer_register($wp_customize){
	/** this code change logo from header area **/
	$wp_customize->add_section('logo_header_area',array(
		'title' => esc_html__('Header Area','tasktheme'),
		'description' => 'If you change your logo you can change your logo from here',
	));
	$wp_customize->add_setting('anik_logo',array(
		'default' => get_bloginfo('template_directory').'/assests/images/logo.png',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'anik_logo',array(
		'label' => 'Upload Your Logo',
		'description' => 'If you upload your logo you can change your logo',
		'section' => 'logo_header_area',
		'control' => 'anik_logo',
	)));
	/**this code is using to change herobanner**/
	$wp_customize->add_section('change_hero_image',array(
		'title' => esc_html__('Change Hero Area','tasktheme'),
		'description' => esc_html__('if you change your hero image , you can change your hero image from here','newtheme'),
		'priority' => 160,
		'capability' => 'edit_theme_options', 
	));
	$wp_customize->add_setting('anik_hero_image',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'anik_hero_image',array(
		'label'  	=> __( 'Upload a Image', 'tasktheme' ),
		'description' => 'Please Upload High Quality Image',
		'section'    => 'change_hero_image',
		'height'=> 1200, // cropper Height
		'width'=> 1920, // Cropper Width
		'flex_width'=>true, //Flexible Width
		'flex_height'=>true, // Flexible Heiht
	)));

	/** hero title text functionality **/
	$wp_customize->add_setting('hero_text',array(
		'default' => 'Make a Blog',
	));
	$wp_customize->add_control('hero_text',array(
		'label' => esc_html__('Change Your Hero Text'),
		'description' => esc_html__('Please Write your text'),
		'section' => 'change_hero_image',
		'setting' => 'hero_text',
	));

	/** this code change the footer area dynamically **/
	$wp_customize->add_section('change_footer_area',array(
		'title' => esc_html__('Footer Area','tasktheme'),
		'description' => 'if you change your footer you can change your footer from here',
	));
	$wp_customize->add_setting('footer_paragraph',array(
		'default' => '&copy; Copyright 2023 | Anik Themes BD',
	));
	$wp_customize->add_control('footer_paragraph',array(
		'label' => 'Write your Footer',
		'description' => 'if you change your footer you can change your footer area',
		'section' => 'change_footer_area',
		'setting' => 'footer_paragraph'
	));
}

add_action('customize_register','anik_customizer_register');

