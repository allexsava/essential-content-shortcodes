<?php

if (!defined('ABSPATH')) {
    die('-1');
}

class AcidCodesShortcode_Separator extends AcidCodesShortcode
{

    public function __construct($settings = array())
    {
        $this->self_closed = true;
        $this->name = "Separator";
        $this->code = "hr";
        $this->icon = "fas fa-minus-square";
        $this->direct = false;

        $this->direct = apply_filters('acidcodes_filter_direct_for_' . strtolower($this->name), $this->direct);

        $this->params = array(
            'align' => array(
                'type' => 'select',
                'name' => 'Alignment',
                'options' => array(
                    '' => 'Select Alignment',
                    'no-alignment' => 'No Alignment',
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right'
                ),
                'required' => true,
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg center, left, right'
            ),
            'style' => array(
                'type' => 'select',
                'name' => 'Style',
                'options' => array(
                    '' => 'Select Style',
                    'regular' => 'Regular',
                    'double' => 'Double',
                    'dotted' => 'Dotted',
                    'striped' => 'Striped'
                ),
                'required' => true,
                'admin_class' => 'scroll-height input-field hide-list col s6',
                'tooltip'  => true,
                'tooltip-position' => 'left',
                'help-text'   => 'eg regular, dotted, striped'
            ),
            'weight' => array(
                'type' => 'select',
                'name' => 'Weight',
                'options' => array(
                    '' => 'Select Weight',
                    'thin' => 'Thin',
                    'thick' => 'Thick'
                ),
                'required' => true,
                'admin_class' => 'input-field hide-list col s6',
                'help-text'   => 'eg thin, thick',
                'tooltip'  => true,
                'tooltip-position' => 'right'
            ),
            'color' => array(
                'type' => 'select',
                'name' => 'Color',
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
                'required' => true,
                'admin_class' => 'scroll-height-separator input-field hide-list col s6',
                'help-text'   => 'eg dark, light, color'
            ),
            'width'    => array(
                'type'        => 'range',
                'name'        => __( 'Slider Width'),
                'admin_class' => 'range-field col s6 special-margin--bottom'
            ),
            'margin'    => array(
                'type'        => 'range',
                'name'        => __( 'Top & Bottom Spacing'),
                'admin_class' => 'range-field col s6 special-margin--bottom'
            )
        );


        // allow the theme or other plugins to "hook" into this shortcode's params
        $this->params = apply_filters('acidcodes_filter_params_for_' . strtolower($this->name), $this->params);

        add_shortcode('hr', array($this, 'add_shortcode'));
    }


    public function add_shortcode($atts, $content)
    {

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
        if (!$located) {
            $located = dirname(__FILE__) . '/templates/' . $this->code . '.php';
        }
        // load it
        ob_start();
        require $located;

        return ob_get_clean();
    }
}
