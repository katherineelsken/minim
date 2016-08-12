<?php

//Output layout options
add_filter( 'body_class', 'minim_layout_class' );
function minim_layout_class( $classes ) {
	
	$classes[] = get_theme_mod('layout_setting');
	   

	return $classes;
}

function minim_customize_css(){
    ?>
         <style type="text/css">
              a, a:link, a:visited{ color:<?php echo get_theme_mod('link_color_setting', '#9D81A5');?>;}
              
              .site-main a:hover,
              .widget-area a:hover,
              .main-navigation .sub-menu a:hover,
              .main-navigataion .sub-menu a:active { 
                  color:<?php echo get_theme_mod('link_color_hover_setting', '#c4b3c8');?>!important;
                  }
            .button:hover,
              button:hover,
              input[type="button"]:hover {
                  background-color:<?php echo get_theme_mod('link_color_hover_setting', '#c4b3c8');?>!important;
              }
         </style>
    <?php
}
add_action( 'wp_head', 'minim_customize_css');