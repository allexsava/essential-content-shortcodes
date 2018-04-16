<?php

// get needed classes
$classes = 'acidcode  acidcode__separator';
$classes .= ! empty( $style ) ? ' acidcode__separator--style-' . $style : '';
$classes .= ! empty( $align ) ? ' acidcode__separator--align-' . $align : '';
$classes .= ! empty( $weight ) ? ' acidcode__separator--weight-' . $weight : '';
$classes .= ! empty( $color ) ? ' acidcode__separator--color-' . $color : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';

echo '<hr ' . $classes . '/>';