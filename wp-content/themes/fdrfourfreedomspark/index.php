<?php get_header();?>

<?php the_post();?>

<main>
  
  <div class="grid-container pos-relative vb-1 vb-2 vb-3 bg-color-black">
    <div class="grid-x">
      <div class="cell">
        <?php the_title();?>
        <?php the_content();?>

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