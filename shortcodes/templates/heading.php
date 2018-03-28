<?php
// get needed classes
$classes = 'acidcode  acidcode__heading';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';
echo '<hgroup ' . $classes . '>
	<h1 class="acidcode__heading-title">' . $title . '</h1>
	<h2 class="acidcode__heading-subtitle">' . $subtitle . '</h2>
</hgroup>';