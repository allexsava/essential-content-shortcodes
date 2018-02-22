<?php

if ( function_exists('display_acidfields') ) {

	global $acidfields_plugin;

	if ( isset( $acidfields_plugin->plugin_settings['display_place'] ) ) { // && $acidfields_plugin::$plugin_settings['display_place'] == 'shortcode' ) {
		display_acidfields();
	}
}