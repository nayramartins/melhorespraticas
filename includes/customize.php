<?php
/**
 * Melhores Praticas Theme Customizer
 *
 */

function melhorespraticas_customize_register( $wp_customize ) {
 	$wp_customize->add_setting( 'melhorespraticas_logo' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh',
	    'sanitize_callback'	=> 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label'      => __('Logo', 'melhorespraticas'),
		'section'    => 'title_tagline',
		'settings'   => 'melhorespraticas_logo',
	    'priority'   => 11
	) ) );


    $wp_customize->add_section( 'social' , array(
        'title'    => __( 'Social', 'starter' ),
        'priority' => 200
    ) );

	$wp_customize->add_setting( 'url_facebook' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh',
	    'sanitize_callback'	=> 'esc_url_raw'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'urlfacebook', array(
        'label'    	=> __('Facebook url', 'melhorespraticas-theme'),
        'section'  	=> 'social',
        'settings' 	=> 'url_facebook',
		'type'		=> 'text',
		'priority'  => 12
    ) ) );

	$wp_customize->add_setting( 'url_linkedin' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh',
	    'sanitize_callback'	=> 'esc_url_raw'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'urllinkedin', array(
        'label'    	=> __('Linkedin url', 'melhorespraticas-theme'),
        'section'  	=> 'social',
        'settings' 	=> 'url_linkedin',
		'type'		=> 'text',
		'priority'  => 13
    ) ) );
}
add_action( 'customize_register', 'melhorespraticas_customize_register' );