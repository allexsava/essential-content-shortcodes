<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://pixelgrade.com
 * @since      1.0.0
 *
 * @package    Acidcodes
 * @subpackage Acidcodes/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Acidcodes
 * @subpackage Acidcodes/public
 * @author     Pixelgrade <contact@pixelgrade.com>
 */
class AcidCodesShortcodes_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $acidcodes The ID of this plugin.
     */
    private $acidcodes;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     *
     * @param      string $gridable The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct( $acidcodes, $version ) {
        $this->acidcodes = $acidcodes;
        $this->version  = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {
        // @TODO Write documentation for this
        if ( ! apply_filters( 'acidcodes_load_public_style', '__return_true' ) ) {
            return;
        }

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Gridable_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gridable_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->acidcodes, plugin_dir_url( __FILE__ ) . '../assets/css/materialize/frontend.css', array(), $this->version, 'all' );
    }

    public function enqueue_scripts() {
        wp_enqueue_script( $this->acidcodes, plugin_dir_url( __FILE__ ) . '../assets/js/materialize/materialize.min.js', array(), $this->version, 'all' );
        wp_register_script( 'fontawesome-script', plugin_dir_url( __FILE__ ) . '../assets/js/font-awesome/fontawesome-all.min.js', array(), $this->version, 'all' );
        wp_enqueue_script('fontawesome-script');
    }

}

