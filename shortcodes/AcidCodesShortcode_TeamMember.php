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
                'admin_class' => 'col s6 acid_media_uploader'
            ),
            'name' => array(
                'type' => 'text',
                'name' => 'Name',
                'admin_class' => 'col s6',
                'help-text'   => 'eg Team member name'
            ),
            'imagelink' => array(
                'type' => 'text',
                'name' => 'Image Link',
                'admin_class' => 'col s6 align-clear'
            ),
            'title' => array(
                'type' => 'text',
                'name' => 'Title',
                'admin_class' => 'col s6',
                'help-text'   => 'eg Fontend Developer, SEO '
            ),
            'content' => array(
                'type' => 'textarea',
                'name' => 'Description',
                'admin_class' => 'input-field col s12',
                'is_content' => true
            ),
            'social' => array(
                'type' => 'social-label',
                'name' => 'Social Media',
                'admin_class' => 'col s12 social-media',
            ),
            'social_twitter' => array(
                'value'       => 'https://',
                'type' => 'text',
                'name' => 'Twitter Link',
                'admin_class' => 'col s6'
            ),
            'social_facebook' => array(
                'value'       => 'https://',
                'type' => 'text',
                'name' => 'Facebook Link',
                'admin_class' => 'col s6'
            ),
            'social_linkedin' => array(
                'value'       => 'https://',
                'type' => 'text',
                'name' => 'LinkedIn Link',
                'admin_class' => 'col s6'
            ),
            'social_pinterest' => array(
                'value'       => 'https://',
                'type' => 'text',
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