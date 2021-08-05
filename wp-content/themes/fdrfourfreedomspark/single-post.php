<?php
  /*
  Template Name: Single Post
  */
?>

<?php 
	$hero_image = get_field('hero_image');
    if ($hero_image == null) {
        $hero_image = get_the_post_thumbnail_url();
    }
	$intro = get_field('intro');
	$first_section = get_field('first_section');
    $middle_image = get_field('middle_image');
	$second_section = get_field('second_section');
	$related_blogs = get_field('related_blogs');
    $cat = get_the_category();
    $date = get_the_date( 'd F Y');
    $catName = '';
    foreach($cat as $catKey => $catItem) {
        if ($catKey == 0) {
            $catName = $catItem->name;
        } else {
            $catName.=', '.$catItem->name;
        }
    }

    //var_dump($middle_image);
?>

<?php get_header();?>

<main class="border-side">
    <div class="single-post-container">
        <div class="">
            <div class="grid-x grid-padding-x pos-relative vb-1">
                <div class="cell cancel-padding-x vert-margin-bottom-expanded background-cover hero-image" style="background-image:url(<?php print $hero_image ?>)"></div>
                <div class="cell vert-pad-bottom-expanded main-title">
                    <div class="h1-style">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="cell medium-3 left-intro-container">
                    <div class="date-container">
                        <div class="p-style color-spanish-gray post-text">
                            POSTED
                        </div>
                        <div class="p-style post-date">
                            <?php print $date; ?>
                        </div>
                    </div>
                    <div class="category-container">
                        <div class="p-style color-spanish-gray category-text">
                            CATEGORY
                        </div>
                        <?php foreach($cat as $catItem) : ?>
                            <div class="p-style color-blue category-name">
                                <?php print $catItem->name; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex-container social-media-container">
                        <a class="icon-item" href="<?php print $social_media['twitter']; ?>"><i class="fab fa-twitter color-black"></i></a>
                        <a class="icon-item" href="<?php print $social_media['facebook']; ?>"><i class="fab fa-facebook-square color-black"></i></a>
                    </div>
                </div>
                <div class="cell medium-9 vert-pad-bottom-expanded">
                    <div class="intro-container">
                        <?php print $intro; ?>
                    </div>
                    <div class="first-section-container">
                        <?php print $first_section; ?>
                    </div>
                </div>
                <div class="cell vert-pad-bottom cancel-padding-x">
                    <img src="<?php print $middle_image['url'] ?>" class="middle-image">
                </div>
                <div class="cell medium-3 vert-pad-bottom border-bottom middle-image-title">
                    <div class="image-eyebrow color-spanish-gray">
                        <?php print $middle_image['title'] ?>
                    </div>
                    <?php if ($middle_image['caption'] != '') : ?>
                        <div class="image-caption">
                            <?php print $middle_image['caption'] ?> anjay
                        </div>
                    <?php endif; ?>
                </div>
                <div class="cell medium-9 medium-offset-3 border-bottom">
                    <?php print $second_section; ?>
                </div>
                <?php foreach($related_blogs as $key => $item): ?>
                    <?php 
                        $cat = get_the_category($item->ID);
                        $image = get_the_post_thumbnail_url($item->ID);
                        $date = get_the_date( 'd M Y', $item->ID);
                        $post = get_post($item->ID);
                        $catName = '';
                        foreach($cat as $catKey => $catItem) {
                            if ($catKey == 0) {
                                $catName = $catItem->name;
                            } else {
                                $catName.=', '.$catItem->name;
                            }
                        }
                    ?>
                    <div class="cell medium-3 vert-pad-top-expanded">
                        <?php if ($key == 0) : ?>
                            <div class="h1-style">
                                Other Stories from the Blog
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php 
                        set_query_var( 'part_params', array(
                            'tax' => $catName,
                            'post_title' => get_the_title(),
                            'image' => $image,
                            'text' => get_the_content(),
                            'start_date' => $date,
                            'cell_wide' => true,
                        ));
                        get_template_part( 'parts/panel-item-data' );
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell background-cover hero-image" style="background-image:url(<?php print $hero_image ?>)"></div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell main-title">
                <div class="h1-style">
                    <?php the_title(); ?>
                </div>
            </div>
        </div>
        <div class="grid-container pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="grid-x grid-padding-x intro-container">
                <div class="cell medium-3">
                    <div class="date-container">
                        <div class="p-style color-spanish-gray post-text">
                            POSTED
                        </div>
                        <div class="p-style post-date">
                            <?php print $date; ?>
                        </div>
                    </div>
                    <div class="category-container">
                        <div class="p-style color-spanish-gray category-text">
                            CATEGORY
                        </div>
                        <?php foreach($cat as $catItem) : ?>
                            <div class="p-style color-blue category-name">
                                <?php print $catItem->name; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex-container social-media-container">
                        <a class="icon-item" href="<?php print $social_media['twitter']; ?>"><i class="fab fa-twitter color-black"></i></a>
                        <a class="icon-item" href="<?php print $social_media['facebook']; ?>"><i class="fab fa-facebook-square color-black"></i></a>
                    </div>
                </div>
                <div class="cell medium-9">
                    <?php print $intro; ?>
                </div>
            </div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell medium-3 show-for-medium"></div>
            <div class="cell medium-9">
                <?php print $first_section; ?>
            </div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom">
            <div class="cell">
                <img src="<?php print $middle_image['url'] ?>" class="middle-image">
            </div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom middle-image-title">
            <div class="cell medium-3">
                <div class="image-eyebrow color-spanish-gray">
                    <?php print $middle_image['title'] ?>
                </div>
                <?php if ($middle_image['caption'] != '') : ?>
                    <div class="image-caption">
                        <?php print $middle_image['caption'] ?> anjay
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded border-bottom">
            <div class="cell medium-3 show-for-medium"></div>
            <div class="cell medium-9">
                <?php print $second_section; ?>
            </div>
        </div>
        <div class="related-container">
            <?php foreach($related_blogs as $key => $item): ?>
                <?php 
                    $cat = get_the_category($item->ID);
                    $image = get_the_post_thumbnail_url($item->ID);
                    $date = get_the_date( 'd M Y', $item->ID);
                    $post = get_post($item->ID);
                    $catName = '';
                    foreach($cat as $catKey => $catItem) {
                        if ($catKey == 0) {
                            $catName = $catItem->name;
                        } else {
                            $catName.=', '.$catItem->name;
                        }
                    }
                ?>
                <div class="grid-x grid-padding-x pos-relative vb-1">
                    <div class="cell medium-3 vert-pad-top-expanded">
                        <?php if ($key == 0) : ?>
                            <div class="h1-style">
                                Other Stories from the Blog
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php 
                        set_query_var( 'part_params', array(
                            'tax' => $catName,
                            'post_title' => get_the_title(),
                            'image' => $image,
                            'text' => get_the_content(),
                            'start_date' => $date,
                            'cell_wide' => true,
                        ));
                        get_template_part( 'parts/panel-item-data' );
                    ?>
                </div>
            <?php endforeach; ?>
        </div> -->
    </div>
</main>

<?php get_footer();?>