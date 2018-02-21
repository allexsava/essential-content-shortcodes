<?php
$output = '';
$output .= '<div class="acidcode  acidcode--row  row  '.$class.'">'.PHP_EOL;
$output .= $this->get_clean_content( $content ).PHP_EOL;
$output .= '</div>'.PHP_EOL;
echo $output;