<?php
  /*
  Template Name: Rental
  */
?>

<?php 
    $rental_contact_email = get_field('rental_contact_email');
    $request_subjects = get_field('request_subjects');
    $side_text = get_field('side_text');
?>

<?php get_header();?>
<main class="border-side trim-headings">
    <div class="intro-container">
        <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-3 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-top intro-inner-container">
            <div class="cell">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="cell medium-3 trim-paragraphs">
                <?php print $side_text; ?>
            </div>
            <div class="cell medium-6 show-for-medium trim-paragraphs">
                <div class="trim-paragraphs">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-x grid-padding-x grid-padding-y vert-pad-top-expanded vert-pad-bottom-expanded border-top hide-for-medium">
        <div class="cell trim-paragraphs">
            <?php the_content(); ?>
        </div>
    </div>
    <!-- <div class="form-container">
        <div class="grid-x grid-padding-x pos-relative vb-1 vb-3 vert-pad-top-expanded vert-pad-bottom-expanded border-top form-inner-container">
            <div class="cell medium-3">
                <div class="h1-style">
                    Request Form
                </div>
                <div class="p-style">
                    Since every event we host at the park is unique, please contact us via the following form so we can better answer all your questions and provide you with more information
                </div>
            </div>
            <div class="cell medium-6">
                <?php print do_shortcode( '[gravityform id="2" ajax=true]' );?>
            </div>
            <div class="cell medium-3">Subject</div>
        </div>
    </div> -->

</main>

<?php get_footer();?>