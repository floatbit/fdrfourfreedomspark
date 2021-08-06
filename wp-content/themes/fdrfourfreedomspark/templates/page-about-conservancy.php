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
?>

<?php get_header();?>

<main class="border-side">
  
    <section id="conserv-intro">
        <div class="intro-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
                <div class="cell">
                    <div class="h1-style"><?php the_title(); ?></div>
                </div>
            </div>
			<div class="hero-image background-cover" style="background-image:url(<?php print $intro_image ?>)"></div>
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded intro-inner-container bg-color-gray">
                <div class="cell medium-6 medium-offset-3">
                    <div class="h2-style"><?php print $intro_text ?></div>
                </div>
            </div>
        </div>
    </section>

    <section id="conserv-bod">
        <div class="bod-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
                <div class="cell medium-3">
                    <div class="h1-style">
                        Board of Directors
                    </div>
                </div>
                <div class="cell medium-6">
                    <div class="grid-x">
                        <?php foreach($board_of_directors as $item) : ?>
                            <?php 
                                $url = $item['url'];
                                if ($url == null) {
                                    $url = '#';
                                }
                                
                            ?>
                            <div class="cell medium-6 vert-pad-bottom">
                                <div class="bod-content">
                                    <div class="bod-image-container">
                                        <a href="<?php print $url ?>">
                                            <img src="<?php print $item['photo'] ?>" class="bod-image">
                                        </a>
                                    </div>
                                    <div class="h3-style bod-name">
                                        <?php print $item['name'] ?>
                                    </div>
                                    <div class="p-style bod-title">
                                        <?php print $item['title'] ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cell medium-3">
                    <?php print $people; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="conserv-vis-mis">
        <div class="vis-mis-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 border-top vert-pad-top-expanded vert-pad-bottom">
                <div class="cell medium-3">
                    <div class="h1-style">
                        Our Vision
                    </div>
                </div>
                <div class="cell medium-9">
                    <?php print $vision;  ?>
                </div>
                <div class="cell medium-3">
                    <div class="h1-style">
                        Our Mission
                    </div>
                </div>
                <div class="cell medium-9">
                    <?php print $mission;  ?>
                </div>
            </div>
        </div>
    </section>

    <section id="conserv-infos">
        <div class="infos-container">
            <?php foreach($infos as $key => $item) ?>
            <?php 
                $title = $item['title'];
                $image = $item['image'];
                $text = $item['text'];
            ?>
            <?php if ($key < 2) : ?>
                <?php if ($key == 0) : ?>
                    <div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom infos-inner-container">
                <?php endif; ?>
                    <div class="cell medium-3">
                        <div class="h1-style">
                            <?php print $title ?>
                        </div>
                    </div>
                    <div class="cell medium-3">
                        <div class="top-infos-image-container cancel-padding-x">
                            <img src="<?php print $image; ?>" class="top-infos-image">
                        </div>
                        <div class="infos-text">
                            <?php print $text ?>
                        </div>
                    </div>
                <?php if ($key == 0) : ?>
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
                    ));
                    get_template_part( 'parts/panel-content' );
                ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
