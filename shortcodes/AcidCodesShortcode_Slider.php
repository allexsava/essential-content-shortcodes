<?php

if (!defined('ABSPATH')) die('-1');

class AcidCodesShortcode_Slider extends  AcidCodesShortcode {

    public function __construct($settings = array()) {

        // load backend assets only when an editor is present
        add_action( 'mce_buttons_2', array( $this, 'load_backend_assets' ) );

        $this->self_closed = false;
        $this->direct = false;
        $this->name = "Carousel";
        $this->code = "slider";
        $this->icon = "fas fa-images";

        $this->params = array(
            'number' => array(
                'type' => 'select',
                'name' => 'Number of images',
                'options' => array(
                    '' => 'Select Number',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ),
                'admin_class' => 'input-field hide-list col s6',
                'required' => true,
                'help-text'   => '1, 2...'
            ),
            'type' => array(
                'type' => 'select',
                'name' => 'Slider Type',
                'options' => array(
                    '' => 'Select Slider',
                    'carousel' => 'Carousel',
                    'carousel-slider' => 'Full-width',
                ),
                'admin_class' => 'input-field hide-list col s6',
                'required' => true,
                'tooltip'  => true,
                'tooltip-position' => 'left'
            ),
            'image' => array(
                'type' => 'image',
                'name' => 'Image',
                'admin_class' => 'col s6 acid_media_uploader',
                'number' => 5,
                'required' => true,
            ),
            'url' => array(
                'type' => 'hidden'
            ),
            'social' => array(
                'type' => 'social-label',
                'name' => 'Slider Options',
                'admin_class' => 'col s12 social-media',
            ),
            'slider_duration' => array(
                'value'       => '200',
                'type' => 'number',
                'name' => 'Slider Duration',
                'min'  => '0',
                'max'  => '5000',
                'admin_class' => 'col s6 slider__fix-margin',
                'help-text'   => 'Transition duration in milliseconds.',
                'is_text_tooltip' => true,
                'tooltip-position' => 'bottom'
            ),
            'slider_padding' => array(
                'value'       => '0',
                'type' => 'number',
                'name' => 'Slider Padding',
                'min'  => '0',
                'max'  => '100',
                'admin_class' => 'col s6 slider__fix-margin',
                'tooltip-position' => 'left'
            ),
            'shift'    => array(
                'type'        => 'range',
                'name'        => __( 'Slider Shift'),
                'admin_class' => 'range-field col s6',
                'tooltip-position' => 'right'
            ),
            'autoplay'    => array(
                'value' => 'off',
                'type'        => 'switch',
                'name'        => __( 'Slider Autoplay', 'acidcodes_txtd' ),
                'admin_class' => 'col s6 checkbox-special-margin',
                'is_text_tooltip' => true
            )

        );

        // allow the theme or other plugins to "hook" into this shortcode's params
        $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('slider', array( $this, 'add_slider_shortcode') );
        //add_shortcode('slide', array( $this, 'add_slide_shortcode') );

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

//         extract( shortcode_atts( array(
//             'navigation_style' => 'arrow',
//             'bullets' => 'true',
//             'autoheight' => 'true',
//             'custom_slider_transition' => 'move'
//         ), $atts ) );
//
//        if ( $navigation_style == 'arrows' ) {
//            $navigation_style = 'data-arrows';
//        } elseif ( $navigation_style == 'bullets' ) {
//            $navigation_style = 'data-bullets';
//        }elseif ( $navigation_style == 'both' ) {
//            $navigation_style = 'data-arrows data-bullets';
//        }
//
//        $navigation_style .= ' data-autoheight';

        //create an array with only the registered params - dynamic since we filter them and have no way of knowing for sure
        $extract_params = array();
        if (isset($this->params)) {
            foreach ($this->params as $key => $value) {
                $extract_params[$key] = '';
            }
        }
        extract(shortcode_atts($extract_params, $atts));

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

//    public function add_slide_shortcode( $atts, $content ) {
//        $title = '';
//      $icon = '';
//         extract( shortcode_atts( array(
//             'title' => '',
//             'icon' => ''
//         ), $atts ) );
//
//
//        /**
//         * Template localization between plugin and theme
//         */
//        $located = locate_template("templates/shortcodes/slide.php", false, false);
//        if(!$located) {
//            $located = dirname(__FILE__).'/templates/slide.php';
//        }
//        // load it
//        ob_start();
//        require $located;
//        return ob_get_clean();
//    }
}