<?php
	/*
	Template Name: Learn The Four Freedom Speech
	*/
?>

<?php 
    $intro = get_field('intro');
    $sections = get_field('sections');
    $featured_blogs = get_field('featured_blogs');

    /* var_dump($intro); */
?>

<?php get_header();?>

<main class="border-side">
    <section id="hero-section">
        <div class="hero-container">
            <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top">
                <div class="cell">
                    <div class="h1-style vert-pad-bottom">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="cell hero-image background-cover show-for-medium" style="background-image:url(<?php print $intro['hero_image']; ?>)"></div>
                <div class="cell hero-image background-cover show-for-small-only" style="background-image:url(<?php print ($intro['mobile_hero_image'] != null) ? $intro['mobile_hero_image'] : $intro['hero_image']; ?>)"></div>
            </div>
        </div>
    </section>

    <section id="intro-section">
        <div class="intro-container bg-color-gray">
            <?php 
                $title = $intro['title'];
                $image = $intro['intro_image'];
                $text = $intro['text'];
                set_query_var( 'part_params', array(
                    'title' => $title,
                    'image' => $image,
                    'text' => $text,
                    'border_class' => 'vb-1 vb-2 vb-3',
                    'additional_class' => 'grid-padding-y vert-pad-top-expanded vert-pad-bottom-expanded border-bottom',
                    'less_padding' => true,
                    'link' => '/learn/timeline',
                    'link_text' => 'View Timeline'
                ));
                get_template_part( 'parts/panel-content' );
            ?>
        </div>
    </section>

    <section id="sections-section">
        <div class="sections-container">
            <?php foreach($sections as $key => $item) : ?>
                <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vert-pad-top-expanded sections-inner-container <?php print ($key == count($sections)-1) ? 'border-bottom vert-pad-bottom-expanded' : '' ?>">
                    <div class="cell medium-3">
                        <?php print $item['first_column']; ?>
                    </div>
                    <div class="cell medium-3">
                        <?php print $item['second_column']; ?>
                    </div>
                    <div class="cell medium-6">
                        <?php print $item['third_column']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="featured-blogs-section">
        <div class="featured-blogs-container">
            <?php foreach($featured_blogs as $key => $item) : ?>
                <?php 
                    $cat = get_the_category($item->ID);
                    $image = get_the_post_thumbnail_url($item->ID);
                    $post = get_post($item->ID);
                    $catName = '';
                    foreach($cat as $catKey => $catItem) {
                        if ($catKey == 0) {
                            $catName = $catItem->name;
                        } else {
                            $catName.=', '.$catItem->name;
                        }
                    }
                    $even = false;
                    $border_class = 'vb-1 vb-3';
                    if (($key+1) % 2 == 0) {
                        $even = true;
                        $border_class = 'vb-1 vb-2';
                    }
					set_query_var( 'part_params', array(
						'eyebrow' => $catName,
                        'title' => get_the_title(),
                        'image' => $image,
                        'text' => get_the_content(),
                        'border_class' => $border_class,
                        'additional_class' => 'vert-pad-top-expanded vert-pad-bottom-expanded border-bottom',
                        'less_padding' => false,
                        'text_with_image' => true,
                        'empty_first_cell' => $even,
                        'eyebrow_color' => 'color-black'
                    ));
                    get_template_part( 'parts/panel-content' );
                ?>
                <!-- <div class="grid-x grid-padding-x pos-relative vb-1 <?php print ($odd) ? 'vb-3' : 'vb-2' ?> vert-pad-top-expanded sections-inner-container border-bottom vert-pad-bottom-expanded">
                    <?php if (!$odd) : ?>
                        <div class="cell medium-3"></div>
                    <?php endif; ?>
                    <div class="cell medium-3">
                        <div class="p-style featured-category">
                            <?php print $catName; ?>
                        </div>
                        <div class="h1-style featured-title">
                            <?php the_title(); ?>
                        </div>
                    </div>
                    <div class="cell medium-6">
                        <img class="featured-image" src="<?php print $image; ?>">
                        <div class="featured-desc">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div> -->

            <?php endforeach; ?>
        </div>
    </section>

    <section id="see-all-section">
        <div class="see-all-container">
            <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vert-pad-top vert-pad-bottom-expanded">
                <div class="cell medium-3">
		            <?php print do_shortcode( '[link-with-arrow title="See All Post" url="/learn/blogs" ]' ); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer();?>