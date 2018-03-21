<?php
$class = "span12";
if (isset($param['admin_class'])) $class = $param['admin_class']; ?>

<div class="acidcode acidcode__tabs row">
    <ul class="tabs">
        <li class="tab" data-index="1"><a href="#t1">Tab 1</a></li>
        <li class="tab" data-index="0"><a href="#t-last">New Tab</a></li>
    </ul>

    <div id="t1" class="row" data-tab="1">
        <span class="col s6">
            <input type="text" class="acidcode__tabs--tab-title" placeholder="Title"/>
        </span>
        <span class="col s6">
        <input type="text" class="acidcode__tabs--tab-icon" placeholder="Font Awesome Icon Class"/>
            <a class="tip_icon" title="See the list with all icons classes" href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">
                <i class="icon-external-link"></i>
            </a>
        </span>
        <textarea class="materialize-textarea acidcode__tabs--tab-content" placeholder="Content" rows="10"></textarea>
    </div>

    <div id="t-last" class="tab" data-tab="0">
        <p>Plast</p>
    </div>

</div>
<input type="hidden" name="<?php //echo $param['param_key'] ?>"/>