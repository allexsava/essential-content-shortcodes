<?php
$content = !empty($content) ? $this->get_clean_content($content) : '';
?>

<div class="acidcode  acidcode__team-member <?php echo $class ?>">

	<?php if ( !empty($image) ) : ?>

		<div class="acidcode__team-member--image">

    		<?php if ( !empty($imagelink) ) : ?>

                <a href="<?php echo $imagelink ?>" class="acidcode__team-member--image-link" title="More about <?php echo !empty($name) ? $name : ''; ?>">
                    <div class="acidcode__team-member--image-container">
                        <img src="<?php echo $image; ?>" alt="<?php echo !empty($name) ? $name : ''; ?>">
                    </div>
                    <div class="acidcode__team-member--profile">
                        <div class="acidcode__team-member--profile-table">
                            <span class="acidcode__team-member--profile-cell">
                               <i class="shc big icon-link"></i>
                            </span>
                        </div>
                    </div>
                </a>

        	<?php else: ?>

                <div class="acidcode__team-member--image-link">
                    <div class="acidcode__team-member--image-container">
                        <img src="<?php echo $image; ?>" alt="<?php echo !empty($name) ? $name : ''; ?>">
                    </div>
                </div>

            <?php endif; ?>

        </div>
    <?php endif; ?>

    <div class="acidcode__team-member--header">
		<?php if ( !empty($name) ) : ?>
    	   <h5 class="acidcode__team-member--name"><?php echo $name; ?></h5>
    	<?php endif; ?>
    	<?php if ( !empty($title) ) : ?>
            <h6 class="acidcode__team-member--position"><?php echo $title; ?></h6>
    	<?php endif;?>
    </div>

    <div class="acidcode__team-member--description">
        <?php echo $this->get_clean_content($content); ?>
    </div>

    <hr class="separator separator--striped"/>

    <div class="acidcode__team-member--footer">
        <ul class="acidcode__team-member--social-links-list">
        	<?php if ( !empty($social_twitter) ) : ?>
                <li class="acidcode__team-member--social-link">
                    <a class="acidcode__team-member--social-link__link" href="<?php echo $social_twitter; ?>" target="_blank">
                        <i class="shc  shc--icon  fab fa-twitter"></i>
                    </a>
                </li>
        	<?php endif; ?>
        	<?php if ( !empty($social_facebook) ) : ?>
                <li class="acidcode__team-member--social-link">
                    <a class="acidcode__team-member--social-link__link" href="<?php echo $social_facebook; ?>" target="_blank">
                        <i class="shc  shc--icon  fab fa-facebook-f"></i>
                    </a>
                </li>
        	<?php endif; ?>
        	<?php if ( !empty($social_linkedin) ) : ?>
                <li class="acidcode__team-member--social-link">
                    <a class="acidcode__team-member--social-link__link" href="<?php echo $social_linkedin; ?>" target="_blank">
                        <i class="shc  shc--icon  fab fa-linkedin-in"></i>
                    </a>
                </li>
        	<?php endif; ?>
        	<?php if ( !empty($social_pinterest) ) : ?>
                <li class="acidcode__team-member--social-link">
                    <a class="acidcode__team-member--social-link__link" href="<?php echo $social_pinterest; ?>" target="_blank">
                        <i class="shc  shc--icon  fab fa-pinterest-p"></i>
                    </a>
                </li>
        	<?php endif; ?>
        </ul>
    </div>
</div>