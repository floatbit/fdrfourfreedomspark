<?php get_header();?>

<?php the_post();?>

<main>
  
  <div class="grid-container">
    <div class="grid-x pos-relative vb-1 vb-2 vb-3">
      <div class="cell medium-3">
        <?php the_title();?>
      </div>
      <div class="cell medium-3 border-bottom">
        <?php the_content();?>
      </div>
      <div class="cell medium-6">
        <h1>H1 - Lorem Ipsum </h1>
        <h2>H2 - Lorem Ipsum</h2>
        <h3>H3 - Lorem Ipsum</h3>
        <h4>H4 - Lorem Ipsum</h4>
        <p>P - Lorem Ipsum</p>
        <span class="quote-text">quote-text - Lorem Ipsum</span>
        <span class="button-text">button-text - Lorem Ipsum</span>
        <span class="caption-text">caption-text - Lorem Ipsum</span>
        <a href="#" class="button">Button</a>
        <a href="#" class="button white">Button</a>
        <a href="#" class="button outline white">Button</a>
        <a href="#" class="button outline ">Button</a>
      </div>
    </div>
  </div>
                      
</main>

<?php get_footer(); ?>