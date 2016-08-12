<?php
/**
 * minim Theme Customizer.
 *
 * @package minim
 */

function minim_customize_register( $wp_customize ) {
	
	//Layout options
	$wp_customize->add_section( 'layout_section', array(
            'title' => 'Layout',
            'priority' => 35,
            
        ));
        
        $wp_customize->add_setting( 'layout_setting', array(
        'default' => 'content-sidebar',
        'transport'=> 'refresh'
    	));
    


    $wp_customize->add_control('layout_control',  array(
        'type' => 'radio',
        'label' => 'Layout',
        'section' => 'layout_section',
        'settings'=> 'layout_setting',
        'choices' => array(
            'content-sidebar' => 'Content Sidebar',
            'sidebar-content' => 'Sidebar Content',
            'full-width' => 'Full Width',
        ),
    )
);
	
	//Color Options
        
	/*Link Color */
	$wp_customize->add_setting( 'link_color_setting', array(
        'default' => '#9D81A5',
        'transport'=> 'refresh'
    	));
    	
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'        => __( 'Link Color', 'minim' ),
	'section'    => 'colors',
	'settings'   => 'link_color_setting',
	
	) ) );
	
	/*Link Color Hover */
	
	$wp_customize->add_setting( 'link_color_hover_setting', array(
        'default' => '#d1bcd6',
        'transport'=> 'refresh'
    	));
    	
   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color_hover', array(
		'label'        => __( 'Hover Link Color', 'minim' ),
		'section'    => 'colors',
		'settings'   => 'link_color_hover_setting',
		
		) ) );

        
    //default customizer settings
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	


}
add_action( 'customize_register', 'minim_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function minim_customize_preview_js() {
	wp_enqueue_script( 'minim_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'minim_customize_preview_js' );
