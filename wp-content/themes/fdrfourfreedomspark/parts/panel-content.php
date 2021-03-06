<?php
    $eyebrow = $part_params['eyebrow'];
    $title = $part_params['title'];
    $addtn_left_content = $part_params['addtn_left_content'];
    $image = $part_params['image'];
    $text = $part_params['text'];
    $border_class = $part_params['border_class'];
    $additional_class = $part_params['additional_class'];
    $less_padding = $part_params['less_padding'];
    $text_with_image = $part_params['text_with_image'];
    $empty_first_cell = $part_params['empty_first_cell'];
    $link = $part_params['link'];
    $link_text = $part_params['link_text'];
    $title_size = $part_params['title_size'];
    $title_tag = $part_params['title_tag'] ? $part_params['title_tag'] : 'h2';
    $cell_class = $part_params['cell_class'];
    $less_padding_class = '';

    if ($title_size != null) {
        $title_size.='-style';
    }

    if ($link_text == null) {
        $link_text = 'Read More';
    }

    if ($less_padding == true) {
        $less_padding_class = 'cancel-padding-top';
    }
?>

<div class="grid-x grid-padding-x pos-relative <?php print $border_class; ?> content-inner-container <?php print $additional_class; ?>" >
    <?php if ($empty_first_cell == true): ?>
        <div class="cell medium-3 show-for-medium"></div>
    <?php endif; ?>

    <div class="cell medium-3 <?php print $less_padding_class.' '.$cell_class; ?> trim-headings flex-container flex-dir-column align-justify">
        <div>
            <?php if ($eyebrow): ?>
                <div class="p-style content-eyebrow">
                    <?php print $eyebrow; ?>
                </div>
            <?php endif; ?>
            <<?php print $title_tag; ?> class="<?php print $title_size; ?> content-title">
                <?php print $title; ?>
            </<?php print $title_tag; ?>>
        </div>
        <?php if ($addtn_left_content) : ?>
            <div class="addtn-left-content"><?php print $addtn_left_content; ?></div>
        <?php endif; ?>
    </div>
    
    <?php if ($less_padding == true): ?>
        <div class="cell small-11 medium-6 background-cover content-image-background <?php print $cell_class;?>" style="background-image:url(<?php print $image; ?>)">
        <?php if ($link): ?>
            <a href="<?php print $link; ?>" alt="<?php print $title; ?>" title="<?php print $title; ?>"></a>
        <?php endif; ?>
        </div>
    <?php else : ?>
        <div class="cell medium-6 <?php print $cell_class;?>">
            <?php if ($link): ?>
                <a href="<?php print $link; ?>" alt="<?php print $title; ?>" title="<?php print $title; ?>"><img class="content-image" src="<?php print $image; ?>" alt="Link of <?php print $title; ?> Post"></a>
            <?php else: ?>
                <img class="content-image" src="<?php print $image; ?>" alt="Thumbnail for <?php print $title; ?> Post">
            <?php endif; ?>
            
            <?php if ($text_with_image == true): ?>
                <?php print apply_filters('the_content', $text); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if($text_with_image == null || $text_with_image == false) : ?>
        <div class="cell medium-3 <?php print $less_padding_class.' '. $cell_class; ?> flex-container flex-dir-column">
            <div class="content-container vert-margin-bottom">
                <?php print apply_filters('the_content', $text); ?>
            </div>
            
            <?php if ($link): ?>
                <div class="link-container">
			    	<?php print do_shortcode( '[link-with-arrow title="'.$link_text.'" alt="'.$title.'" url="'.$link.'" target="new"]' ); ?>		
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>