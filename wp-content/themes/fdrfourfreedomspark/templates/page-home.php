<?php
  /*
  Template Name: Home
  */
?>

<?php 
	$hero = get_field('hero');
	$intro = get_field('intro');
	$featured_blogs = get_field('featured_blogs');
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
					<div class="cell medium-6 open-border">
						<div class="p-style color-black info-open">
							Open Today <span class="info-hour bold"><?php print $open_info; ?></span>
						</div>
					</div>
					<div class="cell medium-2 border-left show-for-medium">
						<a href="#home-upcoming-event" class="hero-link">
							<div class="p-style color-black info-event">
								<i class="fal fa-calendar"></i>Upcoming Events
							</div>
						</a>
					</div>
					<div class="cell medium-2 border-bottom show-for-small-only">
						<a href="#home-upcoming-event" class="hero-link">
							<div class="p-style color-black info-event">
								<i class="fal fa-calendar"></i>Upcoming Events
							</div>
						</a>
					</div>
					<div class="cell small-6 medium-2 border-left">
						<a href="/visit/plan-your-visit" class="hero-link">
							<div class="p-style color-black info-getting">
								<i class="fal fa-map-marker-alt"></i>Getting Here
							</div>
						</a>
					</div>
					<div class="cell small-6 medium-2 border-left">
						<a href="/visit/accessibility" class="hero-link">
							<div class="p-style color-black info-access">
								<i class="fas fa-wheelchair"></i>Accessibility
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home-intro">
		<div class="intro-container">
			<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-top intro-inner-container">
				<div class="cell medium-6 intro-title">
					<div class="h1-style">
						<?php print $intro['title']; ?>
					</div>
				</div>
				<div class="cell medium-12 show-for-medium"></div>
				<div class="cell medium-3 show-for-medium"></div>
				<div class="cell small-11 medium-6 background-cover intro-image" style="background-image:url(<?php print $intro['image']; ?>)">
				</div>
				<div class="cell medium-3 intro-text cancel-padding-y">
					<?php print $intro['text']; ?>
				</div>
			</div>	
		</div>
	</section>

	<section id="home-upcoming-event">

	</section>

	<section id="home-featured-blog">
		<div class="featured-blog-container">
			<?php foreach($featured_blogs as $item) : ?>
				<?php 
					$cat = get_the_category($item->ID);
					$image = get_the_post_thumbnail_url($item->ID);
					$post = get_post($item->ID);
					/* $text = $post->post_content; */
					$catName = '';
					foreach($cat as $catKey => $catItem) {
						if ($catKey == 0) {
							$catName = $catItem->name;
						} else {
							$catName.=', '.$catItem->name;
						}
					}
				?>
				<div class="grid-x grid-padding-x pos-relative vb-1 vb-2 vb-3 vert-pad-bottom-expanded featured-blog-inner-container">
					<div class="cell medium-3">
						<div class="p-style featured-category">
							<?php print $catName; ?>
						</div>
						<div class="h1-style featured-title">
							<?php the_title(); ?>
						</div>
					</div>
					<div class="cell small-11 medium-6 background-cover featured-image" style="background-image:url(<?php print $image; ?>)"></div>
					<div class="cell medium-3 featured-text">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
