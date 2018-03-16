<?php

// get needed classes
$classes = 'acidcode  acidcode--separator  separator';
$classes .= ! empty( $style ) ? ' separator_style--' . $style : '';
$classes .= ! empty( $align ) ? ' separator_align--' . $align : '';
$classes .= ! empty( $size ) ? ' separator_size--' . $size : '';
$classes .= ! empty( $weight ) ? ' separator_weight--' . $weight : '';
$classes .= ! empty( $color ) ? ' separator_color--' . $color : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';

echo '<hr ' . $classes . '/>';