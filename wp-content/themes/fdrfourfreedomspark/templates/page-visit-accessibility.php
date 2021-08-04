<?php
	/*
	Template Name: Visit Accessibility
	*/
?>

<?php 
    $means_of_access = get_field('means_of_access');
    $extra_text = get_field('extra_text');
    $extra_text = substr_replace($extra_text, '<p>"', 0, 3);
    $extra_text = substr_replace($extra_text, '"</p>', -5, 4);
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
                    
                    set_query_var( 'part_params', array(
                        'title' => $title,
                        'image' => $image,
                        'text' => $description,
                        'border_class' => 'vb-1 vb-2 vb-3',
                        'additional_class' => 'vert-pad-top-expanded vert-pad-bottom-expanded border-bottom',
                        'less_padding' => true,
                    ));
                    get_template_part( 'parts/panel-content' );
                ?>
                <!-- <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded vert-pad-bottom-expanded border-bottom content-inner-container">
                    <div class="cell medium-3 cancel-padding-top">
                        <div class="h3-style content-title">
                            <?php print $title; ?>
                        </div>
                    </div>
                    <div class="cell small-11 medium-6 background-cover content-image" style="background-image:url(<?php print $image; ?>)"></div>
                    <div class="cell medium-3 cancel-padding-top">
                        <?php print $description; ?>
                    </div>
                </div> -->
            <?php endforeach ?>
        </div>
    </section>

    <section id="access-extra">
        <div class="extra-container">
            <div class="grid-x grid-padding-x pos-relative vert-pad-top-expanded vert-pad-bottom-expanded border-bottom align-center">
                <div class="cell medium-6">
                    <div class="extra-text-container">
                        <?php print $extra_text; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
