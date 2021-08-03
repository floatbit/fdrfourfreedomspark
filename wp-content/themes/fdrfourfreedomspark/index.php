<?php get_header();?>

<?php the_post();?>

<main>
  
  <div class="grid-container pos-relative vb-1 vb-2 vb-3">
    <div class="grid-x">
      <div class="cell">
        <?php the_title();?>
        <?php the_content();?>
      </div>
    </div>
  </div>
                      
</main>

<?php get_footer(); ?>