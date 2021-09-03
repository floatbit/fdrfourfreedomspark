<?php
  /*
  Template Name: Single Page
  */
?>

<?php get_header();?>

<main class="border-side">
	<div class="single-post-container">
		<div class="grid-x grid-padding-x pos-relative vb-1 vert-pad-top-expanded vert-pad-bottom-expanded">
			<div class="cell medium-3"><h1><?php the_title(); ?></h1></div>
			<div class="cell medium-9"><?php the_content(); ?></div>
		</div>
	</div>
</main>

<?php get_footer();?>