<?php
	/*
	Template Name: Visit Event Calendar
	*/
?>

<?php get_header();?>

<main class="border-side">
	
	<div class="grid-x grid-padding-x grid-padding-y title-section pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top">
		<div class="cell title-cell">
			<h1><?php the_title();?></h1>
		</div>
		<div class="cell medium-offset-6 medium-3 cancel-padding-y">
			<p>All Event Types <span class="fal fa-chevron-down"></span></p>
		</div>
		<div class="cell medium-3  cancel-padding-y">
			<p>Showing <span class="counter">30</span> Events</p>
		</div>
	</div>	

</main>

<?php get_footer(); ?>
