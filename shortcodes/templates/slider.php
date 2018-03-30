<?php
$classes = !empty($type) ? $type : '';
$return_string = '<div class="acidcode__carousel carousel '. $classes . '">';

$new_stringed_array = rtrim($url,',');

$arr = explode(',', $new_stringed_array);

foreach($arr as $item){
    $return_string .= '<a class="carousel-item acidcode__carousel-item"><img class="acidcode__carousel-img" src="'.$item.'"></a>';
}
$return_string .= '</div>';
echo $return_string;
