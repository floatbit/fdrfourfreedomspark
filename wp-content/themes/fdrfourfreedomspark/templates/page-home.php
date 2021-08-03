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
			<div class="hero-info-container">
				<div class="grid-container bg-color-white">
					<div class="grid-x grid-padding-x grid-padding-y pos-relative">
						<div class="cell medium-auto ">
							<div class="open-info p-style">
								Open Today <?php print $open_info; ?>
							</div>
						</div>
						<div class="cell medium-shrink">
							<div class="p-style">
								Upcoming Events
							</div>
						</div>
						<div class="cell medium-shrink">
							<div class="p-style">
								Getting Here
							</div>
						</div><div class="cell medium-shrink">
							<div class="p-style">
								Accessibility
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
