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
class Tiny_Media_widget extends Widget_Base{

  //Widget Name
  public function get_name(){
    return 'Tiny Media';
  }

  //Widget box tittle
  public function get_title(){
    return 'Tiny Media';
  }

  //Widget ico from the elementor library
  public function get_icon(){
    return 'fas fa-database';
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
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),//Box content name
				'type' => \Elementor\Controls_Manager::MEDIA, //This is the block that you are going to add, Elementor gives a series of blocks with a data control already predefined 
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				], //Defaul content
			]
    );

    $this->end_controls_section(); //You need declare a final control section
  }
  
  //This function render the backend widget in elementor, you can insert html code
  protected function render(){
    $settings = $this->get_settings_for_display();
    
    // Get image URL
		echo '<img src="' . $settings['image']['url'] . '">';

		// Get image 'thumbnail' by ID
		echo wp_get_attachment_image( $settings['image']['id'], 'thumbnail' );

		// Get image HTML
		$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
		$this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
		$this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
		$this->add_render_attribute( 'image', 'class', 'my-custom-class' );
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
	

  }
    
  protected function content_template() {
		?>
    <#
		if ( settings.image.url ) {
			var image = {
				id: settings.image.id,
				url: settings.image.url,
				size: settings.image_size,
				dimension: settings.image_custom_dimension,
				model: view.getEditModel()
			};

			var image_url = elementor.imagesManager.getImageUrl( image );

			if ( ! image_url ) {
				return;
			}
		}
		#>
		<img src="{{ image_url }}">
		<?php

  }
}
