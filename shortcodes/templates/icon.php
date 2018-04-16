<?php
$shape = '';
if ($type === 'no-shape') {$shape = '';} else {$shape = 'shrink-8 ';}

$output = '<i class="acidcode  acidcode__icon '. $name . ' acidcode__icon--type-' . $type . ' ' . $size . ' ' . $class . '" data-fa-transform="'.$shape . $transform .'"></i>';

if ( ! empty( $link ) ) {
	$link = ' href="' . esc_attr( $link ) . '" ';

	if ( ! empty( $link_target_blank ) ) {
		$link .= ' target="_blank" ';
	}

	$output = '<a class="acidcode__icon-link" ' . $link . '">' . $output . '</a>';
}

echo $output;