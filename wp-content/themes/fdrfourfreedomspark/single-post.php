<?php
  /*
  Template Name: Single Post
  */
?>

<?php 
	$hero_image = get_field('hero_image');
	$intro = get_field('intro');
	$first_section = get_field('first_section');
    $middle_image = get_field('middle_image');
	$second_section = get_field('second_section');
	$related_blogs = get_field('related_blogs');
?>

<?php get_header();?>

<main class="border-side">
    <div class="single-post-container">
        <div class="grid-x grid-padding-x vert-pad-bottom-expanded">
            <div class="cell backgroud-cover hero-image" style="backgroud-image:url(<?php print $hero_image ?>)"></div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell main-title">
                <div class="h1-style">
                    <?php the_title(); ?>
                </div>
            </div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell medium-3"></div>
            <div class="cell medium-9"></div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded">
            <div class="cell medium-3 show-for-medium"></div>
            <div class="cell medium-9">
                <?php print $first_section; ?>
            </div>
        </div>
        <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded align-center border-bottom">
            <div class="cell small-11">
                <img src="<?php print $middle_image ?>">
            </div>
            <div class="cell medium-3">
                <div class="image-eyebrow"></div>
                <div class="image-caption"></div>
            </div>
            <div class="cell medium-12 show-for-medium"></div>
            <div class="cell medium-3 show-for-medium"></div>
            <div class="cell medium-9">
                <?php print $second_section; ?>
            </div>
        </div>
        <div class="related-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-bottom-expanded align-center border-bottom">
            </div>
        </div>
    </div>
</main>

<?php get_footer();?>