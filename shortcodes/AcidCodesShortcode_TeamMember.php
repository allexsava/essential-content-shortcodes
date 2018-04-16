<?php

if (!defined('ABSPATH')) die('-1');

class AcidCodesShortcode_TeamMember extends  AcidCodesShortcode {

    public function __construct($settings = array()) {
        $this->self_closed = false;
        $this->name = "Team Member";
        $this->code = "team-member";
        $this->icon = "fas fa-user";
        $this->direct = false;

        $this->params = array(
            'image' => array(
                'type' => 'image',
                'name'        => 'Image',
                'required' => true,
                'admin_class' => 'col s6',
                'image_uploader' => 'image__uploader--tm'
            ),
            'name' => array(
                'type' => 'text',
                'name' => 'Name',
                'required' => true,
                'admin_class' => 'col s6',
                'help-text'   => 'eg Team member name',
                'is_text_tooltip' => true
            ),
            'title' => array(
                'type' => 'text',
                'name' => 'Title',
                'admin_class' => 'col s6 second-child',
                'help-text'   => 'eg Frontend Developer, CEO',
                'is_text_tooltip' => true
            ),
            'imagelink' => array(
                'value'       => 'https://',
                'type' => 'url',
                'name' => 'Image Link',
                'admin_class' => 'col s6 third-child'
            ),
            'content' => array(
                'type' => 'textarea',
                'name' => 'Description',
                'required' => true,
                'admin_class' => 'input-field col s12 fourth-child',
                'is_content' => true
            ),
            'social' => array(
                'type' => 'social-label',
                'name' => 'Social Media',
                'admin_class' => 'col s12 social-media',
            ),
            'social_twitter' => array(
                'value'       => 'https://',
                'type' => 'url',
                'name' => 'Twitter Link',
                'admin_class' => 'col s6'
            ),
            'social_facebook' => array(
                'value'       => 'https://',
                'type' => 'url',
                'name' => 'Facebook Link',
                'admin_class' => 'col s6'
            ),
            'social_linkedin' => array(
                'value'       => 'https://',
                'type' => 'url',
                'name' => 'LinkedIn Link',
                'admin_class' => 'col s6'
            ),
            'social_pinterest' => array(
                'value'       => 'https://',
                'type' => 'url',
                'name' => 'Pinterest Link',
                'admin_class' => 'col s6'
            ),
        );

	    // allow the theme or other plugins to "hook" into this shortcode's params
	    $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('team-member', array( $this, 'add_shortcode') );
    }

    public function add_shortcode($atts, $content){

        extract( shortcode_atts( array(
            'name' => '',
            'title' => '',
            'image' => '',
            'imagelink' => '',
            'content' => '',
            'social_twitter' => '',
            'social_facebook' => '',
            'social_linkedin' => '',
            'social_pinterest' => '',
            'class' => '',
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