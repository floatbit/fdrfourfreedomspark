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
    $date = get_the_date( 'j F Y');
    $cat_names = ffp_get_post_categ_urls($post, 'category', 'blogs');

    //var_dump($middle_image);
?>

<?php get_header();?>

<main class="border-side">
    <div class="single-post-container">
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell cancel-padding-x vert-margin-bottom-expanded background-cover hero-image" style="background-image:url(<?php print $hero_image ?>)"></div>
            <div class="cell vert-pad-bottom-expanded main-title">
                <div class="hor-pad-left-expanded">
                    <a href="/learn/blog" class="btn-with-back bold" alt="Link of Blogs Page" title="Link of Blogs Page">The Blog</a>
                    <div class="h1-style">
                        <?php the_title(); ?>
                    </div>
                </div>
            </div>
            <div class="cell medium-3 left-intro-container">
                <div class="hor-pad-left-expanded">
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
                        <?php print $cat_names['names']; ?>
                    </div>
                    <div class="flex-container social-media-container">
                        <a class="icon-item" href="https://twitter.com/intent/tweet?url=<?php print get_the_permalink(); ?>" title="Share on Twitter" target="_blank" alt="Link of Share on Twitter"><span class="fab fa-twitter color-black"></span></a>
                        <a class="icon-item" href="https://www.facebook.com/sharer/sharer.php?u=<?php print get_the_permalink(); ?>" title="Share on Facebook" target="_blank" alt="Link of Share on Facebook"><span class="fab fa-facebook-square color-black"></span></a>
                    </div>
                </div>
            </div>
            <div class="cell medium-9 vert-pad-bottom-expanded">
                <div class="hor-pad-right-expanded">
                    <div class="intro-container">
                        <?php print $intro; ?>
                    </div>
                    <div class="first-section-container">
                        <?php print $first_section; ?>
                    </div>
                </div>
            </div>
            <div class="cell vert-pad-bottom">
                <img src="<?php print $middle_image['url'] ?>" class="middle-image" alt="<?php print $middle_image['alt']; ?>">
            </div>
            <div class="cell medium-3 vert-pad-bottom middle-image-title">
                <div class="image-eyebrow color-spanish-gray">
                    <?php print $middle_image['title'] ?>
                </div>
                <?php if ($middle_image['caption'] != '') : ?>
                    <div class="image-caption">
                        <?php print $middle_image['caption'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="cell medium-9 medium-offset-3">
                <div class="hor-pad-right-expanded">
                    <?php print $second_section; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if($related_blogs != null): ?>
        <div class="related-blog-container">
            <div class="grid-x pos-relative vb-1 vb-2 border-top">
                <div class="cell medium-3 padding-all">
                    <div class="h1-style vert-pad-top">
                        Other Stories from the Blog
                    </div>
                </div>
                <div class="cell medium-9">
                    <?php foreach($related_blogs as $item): ?>
                        <?php 
                            $cat = get_the_category($item->ID);
                            $image = get_the_post_thumbnail_url($item->ID);
                            $date = get_the_date( 'd M Y', $item->ID);
                            $post = get_post($item->ID);
                            $cat_names = ffp_get_post_categ_urls($item, 'category', 'blogs');
                            ?>
                        <?php 
                            set_query_var( 'part_params', array(
                                'link' 		 => get_permalink( $item->ID ),
                                'post_title' => get_the_title(),
                                'image' => $image,
                                'text' => get_the_excerpt(),
                                'tax' => $cat_names['names'],
                                'start_date' => $date,
                                'cell_wide'  => true,
                                'small_title_first' => true
                            ));
                            get_template_part( 'parts/panel-item-data' );
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer();?>