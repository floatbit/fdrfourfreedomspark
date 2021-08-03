<?php
  /*
  Template Name: Home
  */
?>

<?php 
	$hero = get_field('hero');
	$intro = get_field('intro');
	$now = strtolower(date('D'));
	$open_hours = get_field('open_hours', 'option');
	//$mime = mime_content_type( $hero );
	$open_info = '';
	foreach($open_hours as $item) {
		if ($item['day'] == $now) {
			$open_info = $item['hours_info'];
			break;
		}
	}

?>

<?php get_header();?>

<main class="border-side">
	<section id="home-hero">
		<div class="hero-container">
			<div class="hero-image background-cover" style="background-image:url(<?php print $hero['url'] ?>)"></div>
			<div class="hero-info-container bg-color-white">
				<div class="grid-x grid-padding-x align-middle">
					<div class="cell medium-6">
						<div class="open-info p-style info-container">
							Open Today <span class="info-hour bold"><?php print $open_info; ?></span>
						</div>
					</div>
					<div class="cell medium-2 border-left">
						<div class="p-style info-container">
							<i class="fal fa-calendar"></i>Upcoming Events
						</div>
					</div>
					<div class="cell small-6 medium-2 border-left">
						<div class="p-style info-container">
							<i class="fal fa-map-marker-alt"></i>Getting Here
						</div>
					</div>
					<div class="cell small-6 medium-2 border-left">
						<div class="p-style info-container">
							<i class="fas fa-wheelchair"></i>Accessibility
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home-intro">
		<div class="intro-container">
			<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded vert-pad-bottom-expanded border-top">
				<div class="cell medium-6">
					<div class="h1-style">
						<?php print $intro['title']; ?>
					</div>
				</div>
				<div class="cell medium-12"></div>
				<div class="cell medium-3"></div>
				<div class="cell middle-image medium-6 background-cover intro-image" style="background-image:url(<?php print $intro['image']; ?>)">
				</div>
				<div class="cell medium-3">
					<?php print $intro['text']; ?>
				</div>
			</div>	
		</div>
	</section>

</main>

<?php get_footer(); ?>
