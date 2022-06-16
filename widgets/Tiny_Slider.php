<?php

/*
Here is the necessary constructors for the development of the plugin 
are instantiated, in the Widget base you
can find the methods that load the data of the widgets in Elementor
*/
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

//Run Widget Base Class
class Tiny_slider_widget extends Widget_Base{

  //Widget Name
  public function get_name(){
    return 'Tiny slider';
  }

  //Widget box tittle
  public function get_title(){
    return 'Tiny slider';
  }

  //Widget ico from the elementor library
  public function get_icon(){
    return 'fas fa-columns';
  }

  //Widget category
  public function get_categories(){
    return ['general'];
  }

  /*This the controller function, this is the real widget here you can
  add the functionalities*/ 
  protected function _register_controls(){

    //Create de label
    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',//Label Name
      ]
    );

    //Create de content
    $this->add_control(
      'gallery', //Box content name
			[
				'label' => esc_html__( 'Add Images', 'plugin-name' ), //Box content types
				'type' => \Elementor\Controls_Manager::GALLERY, //Defaul content
				'default' => [],
			]
    );

    $this->end_controls_section(); //You need declare a final control section
  }
  
  //This function render the backend widget in elementor, you can insert html code
  protected function render(){
    $settings = $this->get_settings_for_display();
  
    foreach ( $settings['gallery'] as $image ) {
			echo '<img src="' . esc_attr( $image['url'] ) . '">';
		} 
    //Read the url img and insert in a "img" html tag
  }

  protected function content_template() {
		?>
		<# _.each( settings.gallery, function( image ) { #>
			<img src="{{ image.url }}">
		<# }); #>
		<?php
	}
}
