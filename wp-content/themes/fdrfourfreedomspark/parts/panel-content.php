<?php
    $eyebrow = $part_params['eyebrow'];
    $title = $part_params['title'];
    $image = $part_params['image'];
    $text = $part_params['text'];
    $border_class = $part_params['border_class'];
    $additional_class = $part_params['additional_class'];
    $less_padding = $part_params['less_padding'];
    $text_with_image = $part_params['text_with_image'];
    $empty_first_cell = $part_params['empty_first_cell'];
?>
<div class="grid-x grid-padding-x pos-relative <?php print $border_class; ?> content-inner-container <?php print $additional_class; ?>">
    <?php if($empty_first_cell != null && $empty_first_cell == true) : ?>
        <div class="cell medium-3 show-for-medium"></div>
    <?php endif; ?>
    <div class="cell medium-3 <?php print ($less_padding != null && $less_padding == true) ? 'cancel-padding-top' : ''; ?>">
        <?php if($eyebrow != null):?>
            <div class="p-style content-eyebrow">
                <?php print $eyebrow; ?>
            </div>
        <?php endif; ?>
        <div class="h3-style content-title">
            <?php print $title; ?>
        </div>
    </div>
    <?php if($less_padding != null && $less_padding == true) : ?>
        <div class="cell small-11 medium-6 background-cover content-image-background" style="background-image:url(<?php print $image; ?>)"></div>
    <?php else : ?>
        <div class="cell medium-6">
            <img class="content-image" src="<?php print $image; ?>">
            <?php if($text_with_image != null && $text_with_image == true) : ?>
                <?php print apply_filters('the_content', $text); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if($text_with_image == null || $text_with_image == false) : ?>
        <div class="cell medium-3 <?php print ($less_padding != null && $less_padding == true) ? 'cancel-padding-top' : ''; ?>">
            <?php print apply_filters('the_content', $text); ?>
        </div>
    <?php endif; ?>
</div>