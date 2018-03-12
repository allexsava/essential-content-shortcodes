<?php
$class = "span12";

if (isset($param['admin_class'])) $class = $param['admin_class']; ?>

<span class="<?php echo $class; ?>">
    <label for="<?php echo $param['param_key'] ?>"><?php echo $param['name'] ?></label>
    <ul class="acid_icon_list">
        <input type="hidden" name="<?php echo $param['param_key'] ?>" class="selected_icon"/>
        <div class="row">
        <?php foreach ($param["icons"] as $icon) { ?>
            <li class="col s1 icon" data-icon="<?php echo $icon; ?>"><i class="<?php echo $icon; ?>"></i></li>
        <?php } ?>
        </div>
    </ul>
</span>
