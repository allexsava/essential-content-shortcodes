<?php

    // create id attribute
    $id = !empty($id) ? 'id="'.$id.'"' : '';

    // get needed classes
    $classes = 'acidcode acidcode--btn  btn';
    $classes.= !empty($size) ? '  btn_size-'.$size : '';
    $classes.= !empty($shape) ? '  btn_shape-'.$shape : '';
    $classes.= !empty($class) ? '  '.$class : '';
    $classes.=!empty($waves_color) ? '  '.$waves_color : '';
    $classes.=!empty($waves_effect) ? ' waves-effect ' : '';
    // create class attribute
    $classes = $classes !== '' ? 'class="'.$classes.'"' : '';

    // create href attribute
    $href = !empty($link) ? 'href="'.$link.'"' : '';

    // get content
    $content = !empty($content) ? $this->get_clean_content($content) : '';

    // get target
    $target = !empty($newtab) ? 'target="_blank"' : '';

echo '<a '.$id.' '.$classes.' '.$href.' '.$target.'>'.$content.'</a>';