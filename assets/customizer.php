<?php

function buildx_customizer( $wp_customize ){

	$wp_customize-> add_setting( 'buildx_heading_color', array(
		'type' => 'theme_mod',
		'default' => '#f9b701',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_heading_color',
			array(
				'label' => esc_html__( 'Heading Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_heading_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_heading_hover_color', array(
		'type' => 'theme_mod',
		'default' => '#3a4050',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_heading_hover',
			array(
				'label' => esc_html__( 'Heading:hover Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_heading_hover_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_text_color', array(
		'type' => 'theme_mod',
		'default' => '#595b59',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_text_color_control',
			array(
				'label' => esc_html__( 'Text Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_text_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_link_color', array(
		'type' => 'theme_mod',
		'default' => '#303842',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_link_color_control',
			array(
				'label' => esc_html__( 'Link Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_link_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_link_hover_color', array(
		'type' => 'theme_mod',
		'default' => '#f9b701',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_link_hover_color_control',
			array(
				'label' => esc_html__( 'Link:hover Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_link_hover_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_icon_color', array(
		'type' => 'theme_mod',
		'default' => '#7c81a0',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_icon_color_control',
			array(
				'label' => esc_html__( 'Icon Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_icon_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_footer_background_color', array(
		'type' => 'theme_mod',
		'default' => '#252d3a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_footer_background_color_control',
			array(
				'label' => esc_html__( 'Footer Background Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_footer_background_color'
			)
		)
	);

	$wp_customize-> add_setting( 'buildx_footer_color', array(
		'type' => 'theme_mod',
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buildx_footer_text_color_control',
			array(
				'label' => esc_html__( 'Footer Color', 'buildx' ),
				'section' => 'colors',
				'settings' => 'buildx_footer_color'
			)
		)
	);

}
add_action( 'customize_register', 'buildx_customizer' );
