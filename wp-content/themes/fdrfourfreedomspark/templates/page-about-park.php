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
                <div class="cell vert-margin-top vert-margin-bottom trim-headings">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
			<div class="intro-image background-cover" style="background-image:url(<?php print $intro_image ?>)"></div>
        </div>
    </section>

    <section id="park-content">
        <div class="content-container ">
            <?php foreach($content_rows as $key => $item) : ?>
                <?php 
                    $container_color = 'bg-color-gray';
                    if ($key == 0) {
                        $container_color = 'bg-color-white';
                    }
                ?>
                <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 border-top vert-pad-top-expanded vert-pad-bottom-expanded content-inner-container <?php print $container_color; ?>">
                    <div class="cell medium-6 vert-margin-top vert-margin-bottom show-for-medium">
                        <div class="grid-x grid-padding-x">
                            <div class="cell medium-6 medium-offset-6">
                                <?php if($item['title'] != null): ?>
                                    <h2>
                                        <?php print $item['title'] ?>
                                    </h2>
                                <?php endif; ?>
                            </div>
                            <?php if($item['image'] != null): ?>
                                <div class="cell medium-6 background-cover content-image" style="background-image:url(<?php print $item['image']; ?>)"></div>
                            <?php endif; ?>
                            <div class="cell medium-6 medium-offset-6">
                                <?php if($item['quote'] != null): ?>
                                    <?php
                                        $content = trim( strip_tags(str_replace('</p>', '',$item['quote'])));
                                    ?>
                                    <?php print do_shortcode( '[quote by="'.$item['quote_person'].'"]'.$content.'[/quote]' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="cell show-for-small-only">
                        <?php if($item['title'] != null): ?>
                            <h2>
                                <?php print $item['title'] ?>
                            </h2>
                        <?php endif; ?>
                    </div>
                    <?php if($item['image'] != null): ?>
                        <div class="cell background-cover content-image show-for-small-only" style="background-image:url(<?php print $item['image']; ?>)"></div>
                    <?php endif; ?>
                    <div class="cell medium-6 vert-margin-top vert-margin-bottom trim-paragraphs">
                        <?php print $item['content']; ?>
                    </div>
                    <div class="cell show-for-small-only">
                        <?php if($item['quote'] != null): ?>
                            <?php
                                $content = strip_tags(str_replace('</p>', '', $item['quote']));
                            ?>
                            <?php print do_shortcode( '[quote by="'.$item['quote_person'].'"]'.$content.'[/quote]' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
