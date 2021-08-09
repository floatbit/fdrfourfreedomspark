<?php
	/*
	Template Name: Learn Timeline
	*/
?>

<?php get_header();?>

<main class="border-side">
	
	<div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 border-top border-bottom">
		<div class="cell medium-6 left-container flex-container align-center flex-dir-column hor-pad-right-expanded">
			<div class="hor-pad-right-expanded">
				<h1><?php the_title();?></h1>
				<div class="content h3-style">
					<?php the_content();?>
				</div>
				<?php print do_shortcode( '[link-with-arrow title="View Timeline" url="#expand-timeline"]' ); ?>
			</div>	
		</div>  
		<div class="cell medium-6">

		</div>
	</div>
											
</main>

<?php get_footer(); ?>
