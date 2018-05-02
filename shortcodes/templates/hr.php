<?php

// get needed classes
$classes = 'acidcode  acidcode__separator';
$classes .= ! empty( $style ) ? ' acidcode__separator--style-' . $style : '';
$classes .= ! empty( $align ) ? ' acidcode__separator--align-' . $align : '';
$classes .= ! empty( $weight ) ? ' acidcode__separator--weight-' . $weight : '';
$classes .= ! empty( $color ) ? ' acidcode__separator--color-' . $color : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';

$width = !empty($width) ? $width : 100;
$margin = !empty($margin) ? $margin : '';

echo '<hr ' . $classes . ' style="width: '.$width.'%; margin-top:'.$margin.'px; margin-bottom:'.$margin.'px;"/>';