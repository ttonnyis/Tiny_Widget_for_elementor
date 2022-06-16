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
class Tiny_text_box_widget extends Widget_Base{

  //Widget Name
  public function get_name(){
    return 'Tiny Text Box';
  }

  //Widget box tittle
  public function get_title(){
    return 'Tiny Text Box';
  }

  //Widget ico from the elementor library
  public function get_icon(){
    return 'far fa-clipboard';
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
        'label' => 'Settings', //Label Name
      ]
    );

    //Create de content
    $this->add_control(
      'content',
      [
        'label' => 'Content',//Box content name
        'type' => \Elementor\Controls_Manager::WYSIWYG, //This is the block that you are going to add, Elementor gives a series of blocks with a data control already predefined 
        'default' => 'Type your text here.' //Defaul content
      ]
    );

    $this->end_controls_section(); //You need declare a final control section
  }
  
  //This function render the backend widget in elementor, you can insert html code
  protected function render(){
    $settings = $this->get_settings_for_display();
  
    echo $settings['content'];
  }
}
