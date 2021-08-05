<?php
  /*
  Template Name: Rental
  */
?>

<?php 
    $rental_contact_email = get_field('rental_contact_email');
    $request_subjects = get_field('request_subjects');
?>

<?php get_header();?>
<main class="border-side">
    <div class="intro-container">
        <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vert-pad-top-expanded vert-pad-bottom-expanded border-top intro-inner-container">
            <div class="cell">
                <div class="h1-style">
                    <?php the_title(); ?>
                </div>
            </div>
            <div class="cell medium-8 medium-offset-3">
                <div class="p-style">
                    If you're interested in hosting a commercial film, photo shoot or event at FDR Four Freedom State Park, please complete our form or contact <span class="color-blue"><?php print $rental_contact_email; ?></span> with details of your request.
                </div>
            </div>
        </div>
    </div>
    <div class="form-container">
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
    </div>

</main>

<?php get_footer();?>