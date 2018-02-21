<?php

// get needed classes
$classes = 'acidcode  acidcode--separator  separator';
$classes .= ! empty( $style ) ? ' separator--' . $style : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';

echo '<hr ' . $classes . '/>';