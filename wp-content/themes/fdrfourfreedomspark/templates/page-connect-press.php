<?php
  /*
  Template Name: Press
  */
?>

<?php 
    $contact_info = get_field('contact_info');
    $deep_links = get_field('deep_links');
?>

<?php get_header();?>
<main class="border-side">
    <div class="press-container">
        <div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-top press-inner-container">
        </div>
    </div>
</main>
<?php get_footer();?>