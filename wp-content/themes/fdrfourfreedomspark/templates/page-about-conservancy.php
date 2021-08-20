<?php
  /*
  Template Name: About Conservacy
  */
?>

<?php 
    $intro_image = get_field('intro_image');
    $intro_text = get_field('intro_text');
    $board_of_directors = get_field('board_of_directors');
    $people = get_field('people');
    $vision = get_field('vision');
    $mission = get_field('mission');
    $infos = get_field('infos');

    if ($intro_image == null) {
        $intro_image = get_the_post_thumbnail_url();
    }

    //var_dump($infos);
?>

<?php get_header();?>

<main class="border-side trim-headings">
  
    <section id="conserv-intro">
        <div class="intro-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
                <div class="cell vert-margin-top vert-margin-bottom">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="background-cover intro-image" style="background-image:url(<?php print $intro_image ?>)"></div>
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded intro-inner-container bg-color-gray">
                <div class="cell medium-6 medium-offset-3 vert-margin-top vert-margin-bottom">
                    <div class="h2-style"><?php print $intro_text ?></div>
                </div>
            </div>
        </div>
    </section>

    <section id="conserv-bod">
        <div class="bod-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
                <div class="cell medium-3 bod-title vert-margin-top vert-margin-bottom">
                    <div class="h1-style">
                        Board of Directors
                    </div>
                </div>
                <div class="cell medium-6 vert-margin-top vert-margin-bottom">
                    <div class="grid-x grid-padding-x">
                        <?php foreach($board_of_directors as $key => $item) : ?>
                            <?php 
                                $url = $item['url'];
                                $target = '_blank';
                                if ($url == null) {
                                    $url = '';
                                    $target = '';
                                }
                                
                                $last_class = '';
                                $image_class = '';

                                if ($key == count($board_of_directors)-1) {
                                    $last_class = 'last';
                                }

                                if ($key < 2) {
                                    $image_class = 'large';
                                }
                            ?>
                            <div class="cell medium-6 vert-pad-bottom">
                                <?php if ($url): ?>
                                    <a href="<?php print $url ?>" target="<?php print $target; ?>">
                                        <div class="bod-content-image-container background-cover <?php print $image_class; ?>" style="background-image:url(<?php print $item['photo']; ?>)"></div>
                                    </a>
                                <?php else: ?>
                                    <div class="bod-content-image-container background-cover <?php print $image_class; ?>" style="background-image:url(<?php print $item['photo']; ?>)"></div>
                                <?php endif; ?>
                                <div class="bod-content <?php print $last_class; ?>">
                                    <div class="h3-style bod-content-name">
                                        <?php print $item['name'] ?>
                                    </div>
                                    <div class="p-style bod-content-title">
                                        <?php print $item['title'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cell medium-3 bod-people-content vert-margin-top vert-margin-bottom trim-paragraphs">
                    <?php print $people; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="conserv-vis-mis">
        <div class="vis-mis-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 border-top vert-pad-top-expanded vert-pad-bottom">
                <div class="cell medium-3 cancel-padding-top vert-margin-top vert-pad-bottom-expanded our-vision">
                    <div class="h1-style">
                        Our Vision
                    </div>
                </div>
                <div class="cell medium-8 cancel-padding-top vert-margin-top vert-pad-bottom-expanded">
                    <?php print $vision;  ?>
                </div>
                <div class="cell medium-3 cancel-padding-top vert-margin-bottom">
                    <div class="h1-style">
                        Our Mission
                    </div>
                </div>
                <div class="cell medium-8 cancel-padding-top vert-margin-bottom">
                    <?php print $mission;  ?>
                </div>
            </div>
        </div>
    </section>

    <section id="conserv-infos" class="trim-paragraphs">
        <div class="infos-container">
            <?php foreach($infos as $key => $item) : ?>
                <?php 
                    $title = $item['title'];
                    $image = $item['image'];
                    $text = $item['text'];
                ?>
                <?php if ($key < 2) : ?>
                    <?php if ($key == 0) : ?>
                        <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom infos-top-container">
                    <?php endif; ?>
                        <div class="cell medium-3 vert-margin-top vert-margin-bottom">
                            <div class="h1-style">
                                <?php print $title ?>
                            </div>
                        </div>
                        <div class="cell medium-3 cancel-padding-x vert-margin-top vert-margin-bottom">
                            <div class="infos-top-image-container">
                                <img src="<?php print $image; ?>" class="infos-top-image">
                            </div>
                            <div class="infos-top-text">
                                <?php print $text ?>
                            </div>
                        </div>
                    <?php if ($key == 1) : ?>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <?php 
                        set_query_var( 'part_params', array(
                            'title' => $title,
                            'image' => $image,
                            'text' => $text,
                            'border_class' => 'vb-1 vb-2 vb-3',
                            'additional_class' => 'vert-pad-bottom-expanded vert-pad-top-expanded border-top',
                            'less_padding' => true,
                            'title_size' => 'h1',
                            'cell_class' => 'vert-margin-top vert-margin-bottom',
                        ));
                        get_template_part( 'parts/panel-content' );
                    ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
