<?php
$classes = !empty($type) ? ' '.$type : '';
$return_string = '<div class="carousel '. $classes . '">';
$return_string .= do_shortcode($content);

$return_string .= '</div>';
echo $return_string;

