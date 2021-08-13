<?php
  /*
  Template Name: Press
  */
?>

<?php 
    $press_kit = get_field('press_kit');
    $press_releases = get_field('press_releases');
    $press_coverage = get_field('press_coverage');
?>

<?php get_header();?>
<main class="border-side">
    <!-- <section id="press-intro">
        <div class="intro-container">
            <div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-top-expanded vert-pad-bottom-expanded border-top intro-inner-container">
                <div class="cell medium-3">
                    <div class="h1-style">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="cell medium-9">
                    <div class="h3-style">
                        For Information about corporate events, commercial film and photo shoots, visit <a href="fdrfourfreedomspark.org/rentals">fdrfourfreedomspark.org/rentals</a>
                    </div>
                    <div class="download-container">
                        <a class="btn-with-download" href="<?php print $press_kit['url']; ?>" download="<?php print $press_kit['filename']; ?>">Download Press Kit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="press-releases">
        <div class="releases-container">
            <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vert-pad-top-expanded border-top releases-inner-container">
                <?php foreach($press_releases as $key => $item) : ?>
                    <?php 
                        $date = date('d M Y', strtotime($item['date']));
                        if ($item['file'] == null) {
                            $item['file']['url'] = '#';
                            $item['file']['filename'] = '';
                        }
                        $textBorder = '';
                        if ($key < count($press_releases)-1) {
                            $textBorder = 'border-bottom';
                        }
                    ?>
                    <div class="cell medium-3 <?php print ($key == 0) ? '' : 'show-for-medium' ; ?>">
                        <?php if($key == 0) : ?>
                            <div class="h1-style">
                                Press Releases
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="cell medium-9 <?php print $textBorder; ?>">
                        <div class="p-style">
                            <?php print $date; ?>
                        </div>
                        <a href="<?php print $item['file']['url']; ?>" download="<?php print $item['file']['filename']; ?>" class="releases-title-link">
                            <div class="h3-style color-black releases-title">
                                <?php print $item['title']; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section> -->

    <section id="press-coverage">
        <div class="coverage-container">
            <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vert-pad-top-expanded vert-pad-bottom-expanded border-top coverage-inner-container">
                <?php foreach($press_coverage as $key => $item) : ?>
                    <?php
                        $date = date('d M Y', strtotime($item['date']));
                        $url = $item['url'];
                        $target = '_blank';
                        if ($url == null) {
                            $url = '#';
                            $target = '';
                        }
                    ?>
                    <div class="cell medium-3 <?php print ($key == 0) ? '' : 'show-for-medium' ; ?>">
                        <?php if($key == 0) : ?>
                            <div class="h1-style">
                                Press Coverage
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="cell medium-3 coverage-image-container">
                        <a href="<?php print $url; ?>" target="<?php print $target; ?>" class="coverage-image-link">
                            <img src="<?php print $item['image']; ?>" class="coverage-image ">
                        </a>
                    </div>
                    <div class="cell medium-6 flex-container align-justify flex-dir-column coverage-title-container">
                        <div class="coverage-title">
                            <div class="p-style uppercase">
                                <?php print $item['source']; ?>
                            </div>
                            <a href="<?php print $url; ?>" class="coverage-title-link">
                                <div class="h3-style color-black title-text">
                                    <?php print $item['title']; ?>
                                </div>
                            </a>
                        </div>
                        <div class="p-style uppercase">
                            <?php print $date; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer();?>