<?php
	/*
	Template Name: Visit Accessibility
	*/
?>

<?php 
    $means_of_access = get_field('means_of_access');
?>

<?php get_header();?>

<main class="border-side">
	
	<section id="access-intro">
        <div class="intro-container">
            <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-bottom intro-inner-container">
                <div class="cell medium-3">
                    <div class="h1-style">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="cell medium-9">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="access-content">
        <div class="content-container">
            <?php foreach($means_of_access as $item): ?>
                <?php 
                    $title = $item['title'];
                    $image = $item['image'];
                    $description = $item['description'];
                ?>
                <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded vert-pad-bottom-expanded border-bottom content-inner-container">
                    <div class="cell medium-3 cancel-padding-top">
                        <div class="h3-style content-title">
                            <?php print $title; ?>
                        </div>
                    </div>
                    <div class="cell small-11 medium-6 background-cover content-image" style="background-image:url(<?php print $image; ?>)"></div>
                    <div class="cell medium-3 cancel-padding-top">
                        <?php print $description; ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
