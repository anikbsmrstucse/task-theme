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
function themetask_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function themetask_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function themetask_customize_preview_js()
{
	wp_enqueue_script('themetask-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'themetask_customize_preview_js');

// add theme customizer register
function anik_customizer_register($wp_customize)
{
	/** this code change logo from header area **/
	$wp_customize->add_section('logo_header_area', array(
		'title' => esc_html__('Header Area', 'tasktheme'),
		'description' => 'If you change your logo you can change your logo from here',
	));
	$wp_customize->add_setting('anik_logo', array(
		'default' => get_bloginfo('template_directory') . '/assests/images/logo.png',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anik_logo', array(
		'label' => 'Upload Your Logo',
		'description' => 'If you upload your logo you can change your logo',
		'section' => 'logo_header_area',
		'control' => 'anik_logo',
	)));
	/**this code is using to change herobanner**/
	$wp_customize->add_section('change_hero_image', array(
		'title' => esc_html__('Change Hero Area', 'themetask'),
		'description' => esc_html__('if you change your hero image , you can change your hero image from here', 'newtheme'),
		'priority' => 160,
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_setting('anik_hero_image1', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'anik_hero_image1', array(
		'label'  	=> __('Upload First Image', 'tasktheme'),
		'description' => 'Please Upload High Quality Image',
		'section'    => 'change_hero_image',
		'height' => 700, // cropper Height
		'width' => 1920, // Cropper Width
		'flex_width' => true, //Flexible Width
		'flex_height' => true, // Flexible Heiht
	)));
	/** second image upload functiontionality **/
	$wp_customize->add_setting('anik_hero_image2', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'anik_hero_image2', array(
		'label'  	=> __('Upload Second Image', 'themetask'),
		'description' => 'Please Upload High Quality Image',
		'section'    => 'change_hero_image',
		'height' => 700, // cropper Height
		'width' => 1920, // Cropper Width
		'flex_width' => true, //Flexible Width
		'flex_height' => true, // Flexible Heiht
	)));
	/** third image upload functiontionality **/
	$wp_customize->add_setting('anik_hero_image3', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'anik_hero_image3', array(
		'label'  	=> __('Upload Third Image', 'themetask'),
		'description' => 'Please Upload High Quality Image',
		'section'    => 'change_hero_image',
		'height' => 700, // cropper Height
		'width' => 1920, // Cropper Width
		'flex_width' => true, //Flexible Width
		'flex_height' => true, // Flexible Heiht
	)));

	/** hero title text functionality **/
	$wp_customize->add_setting('hero_text1', array(
		'default' => 'Write Your First Slug',
	));
	$wp_customize->add_control('hero_text1', array(
		'label' => esc_html__('Change Your First Hero Text', 'themetask'),
		'description' => esc_html__('Please Write your text'),
		'section' => 'change_hero_image',
		'setting' => 'hero_text',
	));
	$wp_customize->add_setting('hero_text2', array(
		'default' => 'Write Your Second Slug',
	));
	$wp_customize->add_control('hero_text2', array(
		'label' => esc_html__('Change Your Second Hero Text', 'themetask'),
		'description' => esc_html__('Please Write your text'),
		'section' => 'change_hero_image',
		'setting' => 'hero_text',
	));
	$wp_customize->add_setting('hero_text3', array(
		'default' => 'Write Your Third Slug',
	));
	$wp_customize->add_control('hero_text3', array(
		'label' => esc_html__('Change Your Third Hero Text', 'themetask'),
		'description' => esc_html__('Please Write your text'),
		'section' => 'change_hero_image',
		'setting' => 'hero_text',
	));

	/** this code change the footer area dynamically **/
	$wp_customize->add_section('change_footer_area', array(
		'title' => esc_html__('Footer Area', 'tasktheme'),
		'description' => 'if you change your footer you can change your footer from here',
	));
	$wp_customize->add_setting('footer_paragraph', array(
		'default' => '&copy; Copyright 2023 | Anik Themes BD',
	));
	$wp_customize->add_control('footer_paragraph', array(
		'label' => 'Write your Footer',
		'description' => 'if you change your footer you can change your footer area',
		'section' => 'change_footer_area',
		'setting' => 'footer_paragraph'
	));
	/** custom post heading title change functionality **/
	$wp_customize->add_section('custom_post_header', array(
		'title' => esc_html__('Custom Post Header', 'tasktheme'),
		'description' => esc_html__('If you change your Custom Post Header, you can change your header from here'),
	));
	$wp_customize->add_setting('custom_header', array(
		'default' => esc_html__('Latest Post', 'tasktheme')
	));
	$wp_customize->add_control('custom_header', array(
		'label' => esc_html__('Write Your Text', 'tasktheme'),
		'description' => esc_html__('If you change your Custom Post Header, you can change your header from here', 'tasktheme'),
		'section' => 'custom_post_header',
		'control' => 'custom_header',
	));

	/** change theme color **/
	$wp_customize->add_section('anik_colors', array(
		'title' => __('Theme Color', 'anikislam'),
		'description' => 'You can change your color from here',
	));
	$wp_customize->add_setting('anik_primary_color', array(
		'default' => '#ff0090',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anik_primary_color', array(
		'label' => 'Primary Color',
		'section' => 'anik_colors',
		'setting' => 'anik_primary_color',
	)));
	//secondary color
	$wp_customize->add_setting('anik_secondary_color', array(
		'default' => '#4f4c4c',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anik_secondary_color', array(
		'label' => 'Secondary Color',
		'section' => 'anik_colors',
		'setting' => 'anik_secondary_color',
	)));
	//white color
	$wp_customize->add_setting('anik_white_color', array(
		'default' => '#fff',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anik_white_color', array(
		'label' => 'White Color',
		'section' => 'anik_colors',
		'setting' => 'anik_white_color',
	)));

	/** Button text edit functionality **/
	$wp_customize->add_setting('button_text', array(
		'default' => esc_html__('See All Post', 'tasktheme')
	));
	$wp_customize->add_control('button_text', array(
		'label' => esc_html__('Write Your Text', 'tasktheme'),
		'description' => esc_html__('If you change your Button text, you can change your Button text from here', 'tasktheme'),
		'section' => 'custom_post_header',
		'control' => 'button_text',
	));

	// get in touch alignment change functionality
	// add menu position function
	$wp_customize->add_section('touch_align_option', array(
		'title' => __('Chnage Get In Touch Option', 'tasktheme'),
		'description' => 'If you want to change your Get In Touch Alignment position , you can change you Get In Touch Alignment position from here',
	));

	$wp_customize->add_setting('anik_touch_alignment', array(
		'default' => 'Left Menu',
	));

	$wp_customize->add_control('anik_touch_alignment', array(
		'label' => "Alignment Position",
		'description' => 'If you want to change your Get In Touch Alignment position , you can change you Get In Touch Alignment position from here',
		'setting' => 'anik_touch_alignment',
		'section' => 'touch_align_option',
		'type' => 'radio',
		'choices' => array(
			'align-left' => "Left Menu",
			'align-center' => 'Center Menu',
			'align-right' => 'Right Menu',
		)
	));

	// change get touch image option
	$wp_customize->add_setting('anik_img1', array(
		'default' => get_bloginfo('template_directory') . '/assests/images/background-image.jpg',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anik_img1', array(
		'label' => 'Upload Your Image',
		'description' => 'If you upload your image you can change your image',
		'section' => 'touch_align_option',
		'control' => 'anik_img1',
	)));
	$wp_customize->add_setting('anik_img2', array(
		'default' => get_bloginfo('template_directory') . '/assests/images/background-image.jpg',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anik_img2', array(
		'label' => 'Upload Your Second Image',
		'description' => 'If you upload your image you can change your image',
		'section' => 'touch_align_option',
		'control' => 'anik_img2',
	)));
}

add_action('customize_register', 'anik_customizer_register');


//theme color change css functionality
function anik_theme_color_cus()
{
?>
	<style>
		:root {
			--primary-color: <?php echo get_theme_mod('anik_primary_color') ?>;
			--secondary-color: <?php echo get_theme_mod('anik_secondary_color') ?>;
			--white-color: <?php echo get_theme_mod('anik_white_color') ?>;
		}
	</style>
<?php
}

add_action('wp_head', 'anik_theme_color_cus');
