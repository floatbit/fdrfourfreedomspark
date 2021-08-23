<?php
	/*
	Template Name: Single Event
	*/
?>

<?php get_header();?>

<main class="border-side">
	
	<?php
		global $post;

		$event_type = get_the_terms($post->ID, 'event_type');
		$image 		= get_the_post_thumbnail_url();
		$intro 		= get_field('intro');

		$tax = '';
		$tax_slug = '';
		if ($event_type) {
			foreach ($event_type as $item) {
				$tax .= (($tax != '')?', ':'').strtoupper($item->name);
				$tax_slug .= (($tax_slug != '')?',':'').$item->slug;
			}
		}
	?>
	<div class="grid-x">
		<div class="cell cell-hero background-cover" style="background-image:url(<?php print $image; ?>)"></div>
	</div>
	
	<div class="border-top">
		<div class="grid-x grid-padding-x grid-padding-y title-section pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded ">
			<div class="cell medium-8 title-cell cancel-padding-y hor-pad-left-expanded">
				<div class="hor-pad-left-expanded trim-paragraphs">
                    <a href="/events-calendar/" class="btn-with-back bold color-blue" alt="Link of Events Page" title="Link of Events Page">EVENTS</a>
					<div class="h1-style title-text"><?php the_title();?></div>
					<?php print $intro; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		$time_info  = get_field('time_info');
		$venue_address = get_field('venue_address') ? : get_field('address', 'option');
		$register_cta  = get_field('register_cta');
		$price_info    = get_field('price_info');
	?>
	<div class="border-top">
		<div class="grid-x grid-padding-x grid-padding-y content-section pos-relative vb-3 vert-pad-top-expanded vert-pad-bottom-expanded">
			<div class="cell medium-9 small-order-2 medium-order-1 hor-pad-left-expanded hor-pad-right">
				<div class="hor-pad-left-expanded">
					<?php the_content();?>
				</div>
			</div>
			<div class="cell medium-3 small-order-1 medium-order-2 right-cell hor-pad-left">
				<div class="hor-pad-right-expanded">
					<div class="show-for-medium">
						<h3>
							<?php print date("l",strtotime( $post->start_date )); ?><br>
							<?php print date("F d, Y", strtotime( $post->start_date )); ?>
						</h3>					
					</div>
					<div class="show-for-small-only">
						<h3><?php print strtoupper(date("l—F d, Y", strtotime( $post->start_date ))); ?></h3>					
					</div>
					<p><?php print $time_info ?></p>
					<p><?php print $price_info ?> </p>
					<p><?php print $venue_address;?></p>
					<?php if ($register_cta): ?>
						<div class="vert-pad-top">
							<a href="<?php print $register_cta['url'] ?>" class="button" alt="Link of <?php $register_cta['title']; ?> Register" title="Link of <?php $register_cta['title']; ?> Register"><?php print $register_cta['title'] ?></a>
						</div>
					<?php endif; ?>

					<div class="share-box vert-pad-top">
						<a target="_blank" class="share-button color-black" href="https://twitter.com/intent/tweet?url=<?php print get_the_permalink(); ?>" title="Share on Twitter" alt="Link of Share on Twitter"><span class="fab fa-twitter"></span></a>
						<a target="_blank" class="share-button color-black" href="https://www.facebook.com/sharer/sharer.php?u=<?php print get_the_permalink(); ?>" title="Share on Facebook" alt="Link of Share on Facebook"><span class="fab fa-facebook-square"></span></a>
					</div>		
				</div>	
			</div>
		</div>
	</div>

	<?php if ($event_type): ?>
		<div class="grid-x grid-padding-x vert-pad-bottom-expanded pos-relative vb-3 ">
			<div class="cell medium-9 border-top vert-pad-top-expanded vert-pad-bottom hor-pad-left-expanded">
				<div class="hor-pad-left-expanded">
					<?php foreach ($event_type as $item): ?>
						<a href="/events-calendar/?tax=<?php print $item->slug ?>" class="button outline" alt="Link of Filtered Events" title="Link of Filtered Events"> <?php print $item->name ?> </a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
												
</main>

<?php get_footer(); ?>
