<?php

if (!defined('ABSPATH')) die('-1');

class AcidCodesShortcode_Icon extends  AcidCodesShortcode {

    public function __construct($settings = array()) {
        $this->self_closed = true;
        $this->name = "Icon";
        $this->code = "icon";
        $this->icon = "fas fa-magic";
        $this->direct = false;

        $this->backend_assets["js"] = array(
            "icons" => array(
                'name' => 'icons',
                'path' => 'assets/js/shortcodes/backend_icons.js',
                'deps'=> array( 'jquery' )
            )
        );

        // load backend assets only when an editor is present
        add_action( 'mce_buttons_2', array( $this, 'load_backend_assets' ) );

        $this->params = array(
            'type' => array(
                'type' => 'select',
                'name' => 'Background Shape',
                'options' => array('' => '-- Select Type --', 'circle' => 'Circle', 'rectangle' => 'Rectangle'),
                'admin_class' => 'span6'
            ),
            'size' => array(
                'type' => 'select',
                'name' => 'Icon Size',
                'options' => array('' => '-- Select Size --', 'small' => 'Small', 'medium' => 'Medium', 'big' => 'Big'),
                'admin_class' => 'span5 push1'
            ),
	        'class' => array(
		        'type' => 'tags',
		        'name' => 'Custom CSS Class',
		        'admin_class' => 'span12',
		        'options' => array('icon-border', 'pull-right', 'pull-left', 'icon-spin', 'icon-rotate-90', 'icon-rotate-180', 'icon-rotate-270', 'icon-flip-horizontal', 'icon-flip-vertical', 'icon-2x', 'icon-3x', 'icon-4x' ),
		        'value' => array( '' )
	        ),
            'name'=> array(
              'type'=> 'icon_list',
              'name' => 'Select icon:',
              'icons' => array(
                  //Font Awesome
                  'fab fa-500px'
                )
            )
        );

	    // allow the theme or other plugins to "hook" into this shortcode's params
	    $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('icon', array( $this, 'add_shortcode') );
    }

    public function add_shortcode($atts, $content){
		//create an array with only the registered params - dynamic since we filter them and have no way of knowing for sure
	    $extract_params = array();
	    if (isset($this->params)) {
		    foreach ($this->params as $key => $value) {
			    $extract_params[$key] = '';
		    }
	    }
	    extract( shortcode_atts( $extract_params, $atts ) );

		// replace the , with a space
	    $classes = explode(',',$class);
	    $class = implode(' ', $classes);
		
		// make sure that there is no icon- in front
		$prefix = 'icon-';
		if (substr($name, 0, strlen($prefix)) == $prefix) {
			$name = substr($name, strlen($prefix));
		}

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
