<?php
  /*
  Template Name: Contact Us
  */
?>

<?php 
    $contact_info = get_field('contact_info');
    $deep_links = get_field('deep_links');
    $image = get_the_post_thumbnail_url();
?>

<?php get_header();?>
<main class="border-side">
    <section id="contact-us-hero">
        <div class="hero-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top hero-inner-container">
                <div class="cell vert-pad-bottom-expanded">
                    <h1>
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="cell background-cover hero-image" style="background-image:url(<?php print $image; ?>)"></div>
            </div>
        </div>
    </section>

    <section id="contact-us-form" class="bg-color-gray">
        <div class="form-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vert-pad-top-expanded vert-pad-bottom-expanded border-top form-inner-container">
                <div class="cell medium-3 medium-offset-3 vert-margin-top vert-margin-bottom">
                    <div class="h3-style">
                        Receive News and Updates From Four Freedoms Park Conservancy
                    </div>
                </div>
                <div class="cell medium-6 vert-margin-top vert-margin-bottom">
                    <?php print do_shortcode( '[gravityform id="1" ajax=true]' );?>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-us-info">
        <div class="info-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vert-pad-top-expanded vert-pad-bottom-expanded border-top info-inner-container">
                <?php foreach($contact_info as $key => $item): ?>
                    <?php 
                        $cell_class = "";
                        if ($key == 0) {
                            $cell_class = "vert-margin-top";
                        }
                    ?>
                    <div class="cell medium-3 cancel-padding-top <?php print ($key == 0) ? '' : 'show-for-medium' ; ?> <?php print $cell_class; ?>">
                        <?php if($key == 0) : ?>
                            <h1>
                                Contact Information
                            </h1>
                        <?php endif; ?>
                    </div>
                    <div class="cell medium-3 vert-margin-bottom <?php print $cell_class; ?>">
                        <div class="h3-style">
                            <?php print do_shortcode( '[deck]'.$item['title'].'[/deck]' ); ?>
                        </div>
                    </div>
                    <div class="cell medium-6 vert-margin-bottom <?php print $cell_class; ?>">
                        <?php print $item['info'] ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact-us-links" class="bg-color-gray">
        <div class="links-container">
            <?php foreach($deep_links as $key => $item): ?>
                <?php 
                    $image = get_the_post_thumbnail_url($item->ID);
                    $title = get_the_title($item->ID);
                    $permalink = get_the_permalink($item->ID);

                    $image_class = "vert-margin-top";
                    $desc_class = "vert-margin-top vert-margin-bottom";
                ?>
                <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded vert-pad-bottom-expanded border-top links-inner-container">
                    <div class="cell medium-3 show-for-medium <?php print $image_class; ?>"></div>
                    <div class="cell small-11 medium-6 background-cover links-image <?php print $image_class; ?>" style="background-image: url(<?php print $image; ?>)"></div>
                    <div class="cell medium-6 medium-offset-3 <?php print $desc_class; ?>">
                        <div class="h1-style links-title">
                            <?php print $title; ?>
                        </div>
                        <?php print do_shortcode( '[link-with-arrow title="View More" url="'.$permalink.'"]' ); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php get_footer();?>