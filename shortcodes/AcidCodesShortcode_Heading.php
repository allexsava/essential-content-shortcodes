<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

class AcidCodesShortcode_Heading extends AcidCodesShortcode {

	public function __construct( $settings = array() ) {
		$this->self_closed = true;
		$this->name        = "Heading";
		$this->code        = "heading";
		$this->icon        = "fas fa-heading";
		$this->direct      = false;

		$this->params = array(
            'subtitle' => array(
                'type'        => 'text',
                'name'        => 'Subheading',
                'required' => true,
                'admin_class' => 'col s6 span7 push1'
            ),
            'title' => array(
                'type'        => 'text',
                'name'        => 'Heading',
                'required' => true,
                'admin_class' => 'col s6 span7 push1'
            ),
            'subheading_color' => array(
                'type' => 'select',
                'name' => 'Subheading Color',
                'options' => array(
                    '' => 'Select Color',
                    'theia-color-text' => 'Theia Color',
                    'red-text' => 'Red',
                    'pink-text' => 'Pink',
                    'purple-text' => 'Purple',
                    'deep-purple-text' => 'Deep Purple',
                    'indigo-text' => 'Indigo',
                    'blue-text' => 'Blue',
                    'light-blue-text' => 'Light Blue',
                    'cyan-text' => 'Cyan',
                    'teal-text' => 'Teal',
                    'green-text' => 'Green',
                    'light-green-text' => 'Light Green',
                    'lime-text' => 'Lime',
                    'yellow-text' => 'Yellow',
                    'amber-text' => 'Amber',
                    'orange-text' => 'Orange',
                    'deep-orange-text' => 'Deep Orange',
                    'brown-text' => 'Brown',
                    'grey-text' => 'Grey',
                    'blue-grey-text' => 'Blue Gray',
                    'black-text' => 'Black',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'heading_color' => array(
                'type' => 'select',
                'name' => 'Heading Color',
                'options' => array(
                    '' => 'Select Color',
                    'theia-color-text' => 'Theia Color',
                    'red-text' => 'Red',
                    'pink-text' => 'Pink',
                    'purple-text' => 'Purple',
                    'deep-purple-text' => 'Deep Purple',
                    'indigo-text' => 'Indigo',
                    'blue-text' => 'Blue',
                    'light-blue-text' => 'Light Blue',
                    'cyan-text' => 'Cyan',
                    'teal-text' => 'Teal',
                    'green-text' => 'Green',
                    'light-green-text' => 'Light Green',
                    'lime-text' => 'Lime',
                    'yellow-text' => 'Yellow',
                    'amber-text' => 'Amber',
                    'orange-text' => 'Orange',
                    'deep-orange-text' => 'Deep Orange',
                    'brown-text' => 'Brown',
                    'grey-text' => 'Grey',
                    'blue-grey-text' => 'Blue Gray',
                    'black-text' => 'Black',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'alignment'      => array(
                'type'        => 'select',
                'name'        => __( 'Alignment', 'acidcodes_txtd' ),
                'options'     => array(
                    '' => 'Select Alignment',
                    'left' => __( 'Left', 'acidcodes_txtd' ),
                    'center'  => __( 'Center', 'acidcodes_txtd' ),
                    'right'  => __( 'Right', 'acidcodes_txtd' )
                ),
                'admin_class' => 'input-field hide-list tm-color scroll-height-separator col s6',
                'required' => true
            )
		);

		// allow the theme or other plugins to "hook" into this shortcode's params
		$this->params = apply_filters( 'acidcodes_filter_params_for_' . strtolower( $this->name ), $this->params );

		add_shortcode( 'heading', array( $this, 'add_shortcode' ) );
	}

	public function add_shortcode( $atts, $content ) {
		//create an array with only the registered params - dynamic since we filter them and have no way of knowing for sure
		$extract_params = array();
		if (isset($this->params)) {
			foreach ($this->params as $key => $value) {
				$extract_params[$key] = '';
			}
		}
		extract( shortcode_atts( $extract_params, $atts ) );

		/**
		 * Template localization between plugin and theme
		 */
		$located = locate_template( "templates/shortcodes/{$this->code}.php", false, false );
		if ( ! $located ) {
			$located = dirname( __FILE__ ) . '/templates/' . $this->code . '.php';
		}
		// load it
		ob_start();
		require $located;

		return ob_get_clean();
	}
}
