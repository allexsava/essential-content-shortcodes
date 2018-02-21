<?php

$output = '<i class="acidcode  acidcode--icon  icon-' . $name . '  ' . $type . '  ' . $size . '  ' . $class . '"></i>';

if ( ! empty( $link ) ) {
	$link = ' href="' . esc_attr( $link ) . '" ';

	if ( ! empty( $link_target_blank ) ) {
		$link .= ' target="_blank" ';
	}

	$output = '<a class="acidcode-icon-link" ' . $link . '">' . $output . '</a>';
}

echo $output;