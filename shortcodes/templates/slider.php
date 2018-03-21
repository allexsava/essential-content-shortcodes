<?php
$classes = !empty($type) ? 'acidcode__carousel--type-'.$type : '';
$return_string = '<div class="acidcode  acidcode__carousel '. $classes . '">';
$return_string .= do_shortcode($content);

$return_string .= '</div>';
echo $return_string;
