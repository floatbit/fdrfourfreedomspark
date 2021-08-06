<?php
  /*
  Template Name: About Park
  */
?>

<?php 
    $intro_image = get_field('intro_image');
    $content_rows = get_field('content_rows');

    if ($intro_image == null) {
        $intro_image = get_the_post_thumbnail_url();
    }
?>

<?php get_header();?>

<main class="border-side">
  
    <section id="park-intro">
        <div class="intro-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-2-small vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
                <div class="cell">
                    <div class="h1-style"><?php the_title(); ?></div>
                </div>
            </div>
			<div class="intro-image background-cover" style="background-image:url(<?php print $intro_image ?>)"></div>
        </div>
    </section>

    <section id="park-content">
        <div class="content-container bg-color-gray">
            <?php foreach($content_rows as $item) : ?>
                <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 border-top vert-pad-top-expanded vert-pad-bottom-expanded content-inner-container">
                    <div class="cell medium-3 background-cover content-image" style="background-image:url(<?php print $item['image']; ?>)"></div>
                    <div class="cell medium-3 flex-container align-justify flex-dir-column middle-content">
                        <div class="h3-style">
                            <?php print $item['title'] ?>
                        </div>
                        <?php print do_shortcode( '[quote by="'.$item['quote_person'].'"]'.$item['quote'].'[/quote]' ); ?>
                    </div>
                    <div class="cell medium-6">
                        <?php print $item['content']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
