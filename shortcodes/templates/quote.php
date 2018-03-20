<?php
    // get needed classes
    $classes = 'acidcode  acidcode__quote';
    $classes.= !empty($text_size) ? ' acidcode__quote--size-'.$text_size : '';
    $classes.= !empty($quote_type) ? ' acidcode__quote--type-'.$quote_type : '';
    // create class attribute
    $classes = $classes !== '' ? 'class="'.$classes.'"' : '';

?>
<blockquote <?php echo $classes; ?>>
    <div class="quote__content"><?php echo $this->get_clean_content($content); ?></div>

    <?php if(!empty($author)) : ?>

        <?php if(!empty($link)) : ?>
            <a href="<?php echo $link; ?>">
        <?php endif ?>

            <div class="quote__author-name"><?php echo $author; ?></div>
        
        <?php if(!empty($link)) : ?>
            </a>
        <?php endif ?>

        <?php if(!empty($author_title)) : ?>
            <div class="quote__author-title"><?php echo $author_title; ?></div>
        <?php endif; ?>

    <?php endif; ?>
</blockquote>
