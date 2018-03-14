<?php

if (!defined('ABSPATH')) die('-1');

class AcidCodesShortcode_Slider extends  AcidCodesShortcode {

    public function __construct($settings = array()) {

        $this->backend_assets["js"] = array(
            'slider' => array(
                'name' => 'slider',
                'path' => 'assets/js/shortcodes/backend_slider.js',
                'deps'=> array( 'jquery' )
            )
        );

        // load backend assets only when an editor is present
        add_action( 'mce_buttons_2', array( $this, 'load_backend_assets' ) );

        $this->self_closed = false;
        $this->direct = false;
        $this->name = "Carousel";
        $this->code = "slider";
        $this->icon = "fas fa-images";

        $this->params = array(
            'image' => array(
                'type' => 'image',
                'admin_class' => 'col s6 acid_media_uploader'
            ),

            'type' => array(
                'type' => 'select',
                'name' => 'Slider Type',
                'options' => array(
                    '' => 'Select Slider',
                    'carousel' => 'Carousel',
                    'width' => 'Full-width',
                ),
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg carousel, full-width'
            ),
            'social' => array(
                'type' => 'social-label',
                'name' => 'Slider Options',
                'admin_class' => 'col s12 social-media',
            ),
            'slider_duration' => array(
                'value'       => '200',
                'type' => 'text',
                'name' => 'Slider Duration',
                'admin_class' => 'col s6',
                'help-text'   => 'Transition duration in milliseconds. (Default: 200)'
            ),
            'slider_padding' => array(
                'value'       => '0',
                'type' => 'text',
                'name' => 'Slider Padding',
                'admin_class' => 'col s6',
                'help-text'   => 'Set the padding between non center items. (Default: 0)'
            ),
            'shift'    => array(
                'type'        => 'range',
                'name'        => __( 'Slider Shift'),
                'admin_class' => 'range-field col s6',
                'help-text'   => 'Set the spacing of the center item. (Default: 0)'
            ),
            'navigation'    => array(
                'type'        => 'switch',
                'name'        => __( 'Slider Navigation', 'acidcodes_txtd' ),
                'admin_class' => 'col s6 shame-margin'
            ),
            'loop'    => array(
                'type'        => 'switch',
                'name'        => __( 'Slider Loop', 'acidcodes_txtd' ),
                'admin_class' => 'col s6'
            )
//            'slider' => array(
//                'type' => 'slider',
//                'name' => 'Slider',
//            ),
            //            'navigation_style' => array(
//                'type' => 'select',
//                'name' => 'Navigation Style',
//                'options' => array('arrows' => 'Arrows', 'bullets' => 'Bullets', 'both' => 'Arrows and Bullets', 'none' => 'None'),
//                'admin_class' => 'span10 push2'
//            ),
//            'custom_slider_transition' => array(
//                'type' => 'select',
//                'name' => 'Slider transition',
//                'options' => array('move' => 'Move/Drag', 'fade' => 'Fade'),
//                'admin_class' => 'span10 push2'
//            ),
//            'autoheight' => array(
//                'type' => 'switch',
//                'name' => 'Let slider autoheight?',
//                'admin_class' => 'span10 push2'
//            ),

        );

        // allow the theme or other plugins to "hook" into this shortcode's params
        $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('slider', array( $this, 'add_slider_shortcode') );
        add_shortcode('slide', array( $this, 'add_slide_shortcode') );

        // frontend assets needs to be loaded after the add_shortcode function
//        $this->frontend_assets["js"] = array(
//            'tabs' => array(
//                'name' => 'frontend_tabs',
//                'path' => 'js/shortcodes/frontend_tabs.js',
//                'deps'=> array( 'jquery' )
//            )
//        );
//        add_action('wp_footer', array($this, 'load_frontend_assets'));

    }

    public function add_slider_shortcode( $atts, $content ) {

         extract( shortcode_atts( array(
             'navigation_style' => 'arrow',
             'bullets' => 'true',
             'autoheight' => 'true',
             'custom_slider_transition' => 'move'
         ), $atts ) );

        if ( $navigation_style == 'arrows' ) {
            $navigation_style = 'data-arrows';
        } elseif ( $navigation_style == 'bullets' ) {
            $navigation_style = 'data-bullets';
        }elseif ( $navigation_style == 'both' ) {
            $navigation_style = 'data-arrows data-bullets';
        }

        $navigation_style .= ' data-autoheight';

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

    public function add_slide_shortcode( $atts, $content ) {
//        $title = '';
//      $icon = '';
//         extract( shortcode_atts( array(
//             'title' => '',
//             'icon' => ''
//         ), $atts ) );

        /**
         * Template localization between plugin and theme
         */
        $located = locate_template("templates/shortcodes/slide.php", false, false);
        if(!$located) {
            $located = dirname(__FILE__).'/templates/slide.php';
        }
        // load it
        ob_start();
        require $located;
        return ob_get_clean();
    }
}