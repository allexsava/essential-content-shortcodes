<?php
// get needed classes
$classes = 'acidcode acidcode__heading';
$classes.= !empty($alignment) ? '  acidcode__heading--alignment-'.$alignment : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';
echo '<hgroup ' . $classes . '>
    <h2 class="acidcode__heading-subtitle">' . $subtitle . '</h2>
	<h1 class="acidcode__heading-title">' . $title . '</h1>
</hgroup>';