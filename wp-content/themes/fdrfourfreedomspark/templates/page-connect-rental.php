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
<main class="border-side trim-headings">
    <div class="intro-container">
        <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-3 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-top intro-inner-container">
            <div class="cell">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="cell medium-3 trim-paragraphs">
                <p>Please note, closest bathrooms are located at Southpoint Park entrance (1500ft from Park entrance). FDR Four Freedoms State Park cannot provide water or power to your event. In addition, there are no sheltered areas at FDR Four Freedoms State Park.</p>
            </div>
            <div class="cell medium-6 show-for-medium trim-paragraphs">
                <div class="trim-paragraphs">
                    <p class="h3-style">
                    For Non-Commercial, Student Photo & Film Shoots, Family & Friends Events (e.g. wedding ceremonies, quinceaneras, birthday parties, anniversary photo shoots, etc), and Community Events Park Use Permits, please email <a href="mailto:Lillian.Lee@parks.ny.gov" class="color-blue">Lillian.Lee@parks.ny.gov</a> with your request. Please allow up to 10 business days for NY State Parks to review and process your permit.
                    <br><br>
                    If you are a location scout, film, or commercial producer, and are interested in FDR Four Freedoms State Park as a location for your project, please contact <a href="mailto:fourfreedoms@skylightstudios.com" class="color-blue">fourfreedoms@skylightstudios.com</a> with details of your request, including cast and crew numbers.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid-x grid-padding-x grid-padding-y vert-pad-top-expanded vert-pad-bottom-expanded border-top hide-for-medium">
        <div class="cell trim-paragraphs">
                <p class="h3-style">
                For Non-Commercial, Student Photo & Film Shoots, Family & Friends Events (e.g. wedding ceremonies, quinceaneras, birthday parties, anniversary photo shoots, etc), and Community Events Park Use Permits, please email <a href="mailto:Lillian.Lee@parks.ny.gov" class="color-blue">Lillian.Lee@parks.ny.gov</a> with your request. Please allow up to 10 business days for NY State Parks to review and process your permit.
                <br><br>
                If you are a location scout, film, or commercial producer, and are interested in FDR Four Freedoms State Park as a location for your project, please contact <a href="mailto:fourfreedoms@skylightstudios.com" class="color-blue">fourfreedoms@skylightstudios.com</a> with details of your request, including cast and crew numbers.
                </p>
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