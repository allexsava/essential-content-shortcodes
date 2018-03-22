<?php
$class= "span12";
if ( isset($param['admin_class'] ) ) $class = $param['admin_class']; ?>

    <span class="<?php echo $class; ?>" >
        <label for="<?php echo $param['param_key'] ?>"></label>
        <select name="<?php echo $param['param_key'] ?>" required="" aria-required="true">
            <?php
            $options = $param['options'];
            foreach ( $options as $i => $opt ) { ?>
                <option value="<?php echo $i ?>"><?php echo $opt ?></option>
            <?php } ?>
        </select>
        <label><?php echo $param['name'] ?></label>
        <span class="help-text"><?php echo $param['help-text'] ?></span>
    </span>