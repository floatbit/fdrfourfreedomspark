<?php
  /*
  Template Name: Home
  */
?>

<?php 
	$hero = get_field('hero');
	$intro = get_field('intro');
	$now = date('D');
	$open_hours = get_field('open_hours', 'option');
	$mime = mime_content_type( $hero );
?>

<?php get_header();?>

<main>
	<section id="home-hero">
		<div class="hero-container">
			
		</div>
	</section>

</main>

<?php get_footer(); ?>
