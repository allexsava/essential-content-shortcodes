<?php
// get needed classes
$classes = 'acidcode acidcode__heading';
$classes.= !empty($alignment) ? '  acidcode__heading--alignment-'.$alignment : '';
$subh_color= !empty($subheading_color) ? $subheading_color : '';
$h_color= !empty($heading_color) ? $heading_color : '';
// create class attribute
$classes = $classes !== '' ? 'class="' . $classes . '"' : '';
echo '<hgroup ' . $classes . '>
    <h2 class="acidcode__heading-subtitle '.$subh_color.'">' . $subtitle . '</h2>
	<h1 class="acidcode__heading-title '.$h_color.'">' . $title . '</h1>
</hgroup>';