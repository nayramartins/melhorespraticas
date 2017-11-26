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

	$wp_customize->add_section( 'footer' , array(
        'title'    => __( 'Footer', 'starter' ),
        'priority' => 300
    ) );

	$wp_customize->add_setting( 'logo_footer' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh',
	    'sanitize_callback'	=> 'esc_url_raw'
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logofooter', array(
        'label'    	=> __('Logo Footer', 'melhorespraticas-theme'),
        'section'  	=> 'footer',
        'settings' 	=> 'logo_footer',
		'priority'  => 14
    ) ) );

	$wp_customize->add_setting( 'endereco1' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enderecofooter1', array(
        'label'    	=> __('Endereço Linha 1', 'melhorespraticas-theme'),
        'section'  	=> 'footer',
        'settings' 	=> 'endereco1',
		'type'		=> 'text',
		'priority'  => 15
	) ) );
	
	$wp_customize->add_setting( 'sobre' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sobrefooter', array(
        'label'    	=> __('Sobre', 'melhorespraticas-theme'),
        'section'  	=> 'footer',
        'settings' 	=> 'sobre',
		'type'		=> 'text',
		'priority'  => 15
    ) ) );

	$wp_customize->add_setting( 'endereco2' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enderecofooter2', array(
        'label'    	=> __('Endereço Linha 2', 'melhorespraticas-theme'),
        'section'  	=> 'footer',
        'settings' 	=> 'endereco2',
		'type'		=> 'text',
		'priority'  => 16
    ) ) );

	$wp_customize->add_setting( 'telefone' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'telefonefooter', array(
        'label'    	=> __('Telefone Footer', 'melhorespraticas-theme'),
        'section'  	=> 'footer',
        'settings' 	=> 'telefone',
		'type'		=> 'text',
		'priority'  => 17
    ) ) );

	$wp_customize->add_setting( 'email' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh',
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'emailooter', array(
        'label'    	=> __('Email Footer', 'melhorespraticas-theme'),
        'section'  	=> 'footer',
        'settings' 	=> 'email',
		'type'		=> 'text',
		'priority'  => 18
	) ) );

	$wp_customize->add_section( 'sessoes' , array(
        'title'    => __( 'Sessões', 'starter' ),
        'priority' => 400
	) );

	$wp_customize->add_setting( 'entrevistas' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'entrevistassessoes', array(
        'label'    	=> __('Entrevistas', 'melhorespraticas-theme'),
        'section'  	=> 'sessoes',
        'settings' 	=> 'entrevistas',
		'type'		=> 'text',
		'priority'  => 17
    ) ) );

	$wp_customize->add_setting( 'videos' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'videossessoes', array(
        'label'    	=> __('Videos', 'melhorespraticas-theme'),
        'section'  	=> 'sessoes',
        'settings' 	=> 'videos',
		'type'		=> 'text',
		'priority'  => 17
    ) ) );

	$wp_customize->add_setting( 'radar' , array(
	    'default'   		=> '',
	    'type'				=> 'theme_mod',
	    'transport'			=> 'refresh'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'radarsessoes', array(
        'label'    	=> __('Radar', 'melhorespraticas-theme'),
        'section'  	=> 'sessoes',
        'settings' 	=> 'radar',
		'type'		=> 'text',
		'priority'  => 17
    ) ) );

}
add_action( 'customize_register', 'melhorespraticas_customize_register' );