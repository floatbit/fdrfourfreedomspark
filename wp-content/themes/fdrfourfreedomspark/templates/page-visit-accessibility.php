<?php
	/*
	Template Name: Visit Accessibility
	*/
?>

<?php 
    $means_of_access = get_field('means_of_access');
    $extra_text = get_field('extra_text');
    $intro_text = get_field('intro_text');
    /* $extra_text = substr_replace($extra_text, '<p>"', 0, 3);
    $extra_text = substr_replace($extra_text, '"</p>', -5, 4); */
?>

<?php get_header();?>

<main class="border-side">
	
	<section id="access-intro" class="trim-headings">
        <div class="intro-container">
            <div class="grid-x grid-padding-y pos-relative vb-1 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-bottom intro-inner-container">
                <div class="cell medium-3 padding-all">
                    <h1>
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="cell medium-9 padding-all">
                    <div class="hor-pad-right-expanded h3-style">
                        <?php print $intro_text; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="access-content">
        <div class="content-container trim-paragraphs">
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
                        'title_size' => 'h3',
                        'cell_class' => 'vert-margin-top vert-margin-bottom'
                    ));
                    get_template_part( 'parts/panel-content' );
                ?>
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
