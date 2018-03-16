<div class="acidcode  acidcode--progressbar  progressbar">
	<?php if ($title): ?>
		<div class="progressbar__title"><?php echo $title; ?></div>
	<?php endif; ?>
	<div class="progress">
		<div class="determinate" style="width: <?php echo $progress ?>"></div>
        <div class="progressbar__tooltip"><?php echo $progress ?></div>
    </div>
</div>