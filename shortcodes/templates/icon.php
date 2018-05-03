<?php
$shape = '';
$bg_color= !empty($background_color) ? $background_color : '';
$icon_color= !empty($color) ? $color : '';

if ($type === 'no-shape') {$shape = '';} else {$shape = 'shrink-8 ';}

$output = '<i class="acidcode  acidcode__icon '. $name . ' acidcode__icon--type-' . $type . ' acidcode__icon--color-'.$icon_color.' ' . $size . ' ' . $class .' '. $bg_color . '" data-fa-transform="'.$shape . $transform .' style"></i>';

if ( ! empty( $link ) ) {
	$link = ' href="' . esc_attr( $link ) . '" ';

	if ( ! empty( $link_target_blank ) ) {
		$link .= ' target="_blank" ';
	}

	$output = '<a class="acidcode__icon-link" ' . $link . '">' . $output . '</a>';
}

echo $output;