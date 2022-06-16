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
class Tiny_Link_widget extends Widget_Base{

  //Widget Name
  public function get_name(){
    return 'Tiny Link';
  }

  //Widget box tittle
  public function get_title(){
    return 'Tiny Link';
  }

  //Widget ico from the elementor library
  public function get_icon(){
    return 'fas fa-code';
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
        'label' => 'Settings',
      ]
    );

    //Create de content
    $this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,  //This is the block that you are going to add, Elementor gives a series of blocks with a data control already predefined 
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				], //This array content the  url dates
				'label_block' => true,
			]
    );

    $this->end_controls_section();//You need declare a final control section
  }
  
  //This function render the backend widget in elementor, you can insert html code
  protected function render(){
    $settings = $this->get_settings_for_display();
    
    $settings = $this->get_settings_for_display();
    //If the website link is empty add the url from the add control
		if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] );
		}
		?>
		<a <?php echo $this->get_render_attribute_string( 'website_link' ); ?>>
			...
		</a>
		<?php

  }
    
  //This function render the website link in to "a" html tag
  protected function content_template() {
		?>
		<a href="{{ settings.website_link.url }}">
			...
		</a>
		<?php

  }
}
