<?php
// get needed classes
$classes = 'acidcode  acidcode__heading article__headline';

// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';

//make the first subtitle letter special
if ( ! empty( $subtitle ) ) {
	$subtitle   = esc_html( $subtitle );
	$first_char = mb_substr( $subtitle, 0, 1 );
	$subtitle   = '<span class="first-letter">' . $first_char . '</span>' . mb_substr( $subtitle, 1 );
}

echo '<hgroup ' . $classes . '>
	<h1 class="acidcode__heading--headline-primary">' . $title . '</h1>
	<h2 class="acidcode__heading--headline-secondary">' . $subtitle . '</h2>
</hgroup>';