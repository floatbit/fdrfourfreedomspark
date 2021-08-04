<?php
	/*
	Template Name: Planning Your Visit
	*/
?>

<?php get_header();?>

<main class="border-side">

	<div class="grid-x grid-padding-x grid-padding-y title-section pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top">
		<div class="cell title-cell">
			<h1><?php the_title();?></h1>
		</div>
	</div>	

	<div class="grid-x grid-padding-x grid-padding-y map-section pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded bg-color-gray">
		<?php
			$map = get_field('map');
			$image = $map['image'];
			$google_map_url = $map['google_map_url'];
			$additional_text = $map['additional_text'];
		?>
		<div class="cell medium-6" >
			<img src="<?php print $image ?>" class="image-maps">
		</div>
		<div class="cell medium-3 ">
			<div class="link-container">
				<a href="<?php print $google_map_url; ?>" class="color-black"><p>View on Google Maps</p></a>
			</div>
		</div>
		<div class="cell medium-3 ">
			<div class="address-container">
				<?php 
					$address = get_field('address', 'option');
					$open_hours = get_field('open_hours', 'option');
					
				?> 
				<div class="addres-container vert-pad-bottom">
					<p class="font-body-semibold">ADDRRESS</p>
					<p><?php print $address; ?></p>
				</div>

				<div class="hours-container vert-pad-bottom">
					<p class="font-body-semibold">HOURS</p>
					<?php if ($open_hours): ?>
						<div class="grid-x grid-hours">
							<?php foreach ($open_hours as $item): ?>
								<div class="cell small-3">
									<p><?php print strtoupper(substr( $item['day'], 0, 1)); ?></p>
								</div>
								<div class="cell small-9">
									<p><?php print $item['hours_info']; ?></p>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($additional_text): ?>
					<p class="font-body-semibold"><?php print strtoupper($additional_text); ?></p>
				<?php endif; ?>
			</div> 
		</div>
	</div>

	<div class="grid-x grid-padding-x grid-padding-y transport-section pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top">
		<div class="cell medium-3 cancel-padding-y ">
			<div class="title-container vert-pad-top-expanded">
				<h1>Transportation</h1>
			</div>
		</div>
		<?php
			$transportation = get_field('transportation');
			$means_of_transport = $transportation['means_of_transport'];
		?>
		<?php foreach ($means_of_transport as $key => $item): ?>
			<div class="cell medium-3 border-bottom cancel-padding-y">
				<div class="item-container vert-pad-top-expanded vert-pad-bottom-expanded">	
					<?php if ($item['icon']): ?>
						<img src="<?php print $item['icon']; ?>" class="img-icon">
					<?php endif; ?>
					<?php print apply_filters( 'the_content', $item['description']); ?>
				</div>
			</div>
			<?php if (fmod($key+1,3) == 0): ?>
				<div class="cell medium-3 border-bottom show-for-medium">&nbsp;</div>
			<?php endif; ?>
		<?php endforeach; ?> 
	</div>
	
	<div class="grid-x grid-padding-x grid-padding-y park-rules-section pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded border-top">
		<div class="cell medium-3">
			<h1>Park Rules</h1>
		</div>
		<?php
			$park_rules = get_field('park_rules');
			$intro = $park_rules['intro'];
			$rules = $park_rules['rules'];
			$nos = $park_rules['nos'];
		?>
		<div class="cell medium-3">
			<?php print do_shortcode( '[deck]'.$intro.'[/deck]' ); ?>
		</div>
		<div class="cell medium-3">
			<p class="static-text">	
				Help us maintain the State Park by<br>
				observing the following:</p>
			
			<div class="text-rules-container vert-pad-top">
				<?php print do_shortcode( '[deck]Rules[/deck]' ); ?>
				<div class="rules-text">
					<?php print $rules; ?>
				</div>
			</div>
		</div>
		<div class="cell medium-3 cell-nos">
			<div class="text-nos-container vert-pad-top">
				<?php print do_shortcode( '[deck class="vert-pad-top-expanded"]No[/deck]' ); ?>
				<?php print $nos; ?>
			</div>
		</div> 
	</div>

	<div class="grid-x grid-padding-x grid-padding-y middle-image-section pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top">
		<div class="cell medium-offset-3 medium-6">
			<h1>Four Freedoms Park Conservancy<br>
				strives to make the Park fully<br>
				accessible for all.</h1>

			<div class="vert-pad-top-expanded vert-pad-bottom-expanded">
				<?php print do_shortcode( '[link-with-arrow title="Read More" url="/visit/accessibility" target="new" ]' ); ?>			
			</div>
		</div>
		<?php
			$middle_image = get_field('middle_image');
		?>
		<div class="cell middle-image background-cover" style="background-image:url(<?php print $middle_image['url'] ?>)">
		</div>
	</div>

	<div class="grid-x grid-padding-x grid-padding-y public-events-calendar-section pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded vert-pad-bottom-expanded border-top">
		<?php
			$events_calendar = get_field('events_calendar');
			$image = $events_calendar['image'];
			$description = $events_calendar['description'];
		?>
		<div class="cell medium-3">
			<h1>Public Events<br>
				Calendar</h1>
		</div>
		<div class="cell middle-image vert-margin-top medium-6 background-cover" style="background-image:url(<?php print $image['url'] ?>)">
		</div>		
		<div class="cell medium-3">
			<?php print apply_filters( 'the_content', $description); ?>
		</div>
	</div>
	

</main>

<?php get_footer(); ?>
