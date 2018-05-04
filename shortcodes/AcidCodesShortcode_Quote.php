<?php

if (!defined('ABSPATH')) die('-1');

class AcidCodesShortcode_Quote extends  AcidCodesShortcode {

    public function __construct($settings = array()) {
        $this->self_closed = false;
        $this->name = "Quote";
        $this->code = "quote";
        $this->icon = "fas fa-quote-right";
        $this->direct = false;

        $this->params = array(
            'quote_type' => array(
                'type' => 'select',
                'name' => 'Quote type',
                'options' => array(
                    '' => 'Select Type',
                    'blockquote' => 'Block Quote',
                    'quote' => 'Quote'
                ),
                'required' => true,
                'tooltip'  => true,
                'tooltip-position' => 'right',
                'admin_class' => 'input-field hide-list col s6'
            ),

            'text_size' => array(
                'type' => 'select',
                'name' => 'Text size',
                'options' => array(
                    '' => 'Select Size',
                    'regular' => 'Regular',
                    'small' => 'Small',
                    'medium' => 'Medium',
                    'big' => 'Big'
                ),
                'required' => true,
                'admin_class' => 'input-field hide-list col s6'
            ),
            'content_text' => array(
                'type' => 'textarea',
                'name' => 'Text',
                'required' => true,
                'admin_class' => 'input-field col s12',
                'is_content' => true,
            ),
            'text_color' => array(
                'type' => 'select',
                'name' => 'Text Color',
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
                    'gray-text' => 'Grey',
                    'blue-gray-text' => 'Blue Gray',
                    'black-text' => 'Black',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'element_color' => array(
                'type' => 'select',
                'name' => 'Element Color',
                'options' => array(
                    '' => 'Select Color',
                    'theia-color' => 'Theia Color',
                    'red' => 'Red',
                    'pink' => 'Pink',
                    'purple' => 'Purple',
                    'deep-purple' => 'Deep Purple',
                    'indigo' => 'Indigo',
                    'blue' => 'Blue',
                    'light-blue' => 'Light Blue',
                    'cyan' => 'Cyan',
                    'teal' => 'Teal',
                    'green' => 'Green',
                    'light-green' => 'Light Green',
                    'lime' => 'Lime',
                    'yellow' => 'Yellow',
                    'amber' => 'Amber',
                    'orange' => 'Orange',
                    'deep-orange' => 'Deep Orange',
                    'brown' => 'Brown',
                    'grey' => 'Grey',
                    'blue-grey' => 'Blue Grey',
                    'black' => 'Black',
                    'white' => 'White',
                ),
                'admin_class' => 'input-field hide-list col s6 scroll-height'
            ),
            'author' => array(
                'type' => 'text',
                'name' => 'Author',
                'admin_class' => 'col s6',
            ),

            'link' => array(
                'type' => 'url',
                'value'       => 'https://',
                'name' => 'Author link',
                'admin_class' => 'col s6'
            ),
        );

	    // allow the theme or other plugins to "hook" into this shortcode's params
	    $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('quote', array( $this, 'add_shortcode') );
    }

    public function add_shortcode($atts, $content){
        extract( shortcode_atts( array(
            'quote_type' => '',
			'content_text' => '',
            'text_size' => 'medium',
			'text_color' => '',
            'element_color' => '',
			'author' => '',
            'author_title' => '',
			'link' => '',
            'predefined' => ''
        ), $atts ) );

	    /**
	     * Template localization between plugin and theme
	     */
	    $located = locate_template("templates/shortcodes/{$this->code}.php", false, false);
	    if(!$located) {
		    $located = dirname(__FILE__).'/templates/'.$this->code.'.php';
	    }
	    // load it
	    ob_start();
	    require $located;
	    return ob_get_clean();
    }
}
