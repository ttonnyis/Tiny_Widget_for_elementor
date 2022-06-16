<?php
/**
 * Plugin Name: Tiny Widgets
 * Description: Another Widgets Addon for elementor
 * Version:     0.1.35
 * Author:      Antonio Manuel Vilches Cárdenas
 * Author URI:  https://github.com/ttonnyis/Tiny_Widget_for_elementor
 */

//Require files loader, set the widgets files

function register_require_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/Tiny_link.php' );
	require_once( __DIR__ . '/widgets/Tiny_Text_Box.php' );
	require_once( __DIR__ . '/widgets/Tiny_Slider.php' );
	require_once( __DIR__ . '/widgets/Tiny_Media.php' );



//Class Loader insert here the first class from the widgets



	$widgets_manager->register( new \Tiny_Link_Widget() );
	$widgets_manager->register( new \Tiny_text_box_widget() );
	$widgets_manager->register( new \Tiny_slider_widget() );
	$widgets_manager->register( new \Tiny_Media_widget() );

}

//Register the widgest in the elementor widgets folder
add_action( 'elementor/widgets/register', 'register_require_widgets' );
