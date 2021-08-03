<?php
	/*
	Template Name: Planning Your Visit
	*/
?>

<?php get_header();?>

<main>

	<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded border-top">
		<div class="cell ">
			<h1><?php the_title();?></h1>
		</div>
		<?php
			$map = get_field('map');
			$image = $map['image'];
			$google_map_url = $map['google_map_url'];
			$additional_text = $map['additional_text'];
		?>
		<div class="cell medium-6 vert-pad-top-expanded bg-color-gray">
			<img src="<?php print $image ?>">
		</div>
		<div class="cell medium-3 bg-color-gray">
			<a href="<?php print $google_map_url; ?>"><p>View on Google Maps</p></a>
		</div>
		<div class="cell medium-3 bg-color-gray">
			<?php do_shortcode( '[address]' ); ?> 
			<?php do_shortcode( '[hours]' ); ?> 
		</div>
	</div>
	<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded border-top">
		<div class="cell medium-3">
			<h1>Transportation</h1>
		</div>
		<?php
			$transportation = get_field('transportation');
			$means_of_transport = $transportation['means_of_transport'];
		?>
		<?php foreach ($means_of_transport as $key => $item): ?>
			<div class="cell medium-3 border-bottom">
				<?php if ($item['icon']): ?>
					<img src="<?php print $item['icon']; ?>" class="img-icon">
				<?php endif; ?>
				<?php print apply_filters( 'the_content', $item['description']); ?>
			</div>
			<?php if (fmod($key+1,3) == 0): ?>
				<div class="cell medium-3 border-bottom show-for-medium">&nbsp;</div>
			<?php endif; ?>
		<?php endforeach; ?> 
	</div>
	
	<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded border-top">
		<div class="cell medium-3">
			<h1>Park Rules</h1>
		</div>
		<?php
			$park_rules = get_field('park_rules');
			$intro = $park_rules['intro'];
			$rules = $park_rules['rules'];
			$nos = $park_rules['nos'];
		?>
		<div class="cell medium-3 border-bottom">
			<?php print do_shortcode( '[deck]'.$intro.'[/deck]' ); ?>
		</div>
		<div class="cell medium-3 border-bottom">
			<p>	Help us maintain the State Park by<br>
				observing the following:</p>

			<?php print do_shortcode( '[deck]Rules[/deck]' ); ?>
		</div>
		<div class="cell medium-3 border-bottom">
			<?php print do_shortcode( '[deck]No[/deck]' ); ?>
		</div>
	</div>

	<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-3 vert-pad-top-expanded border-top">
		<div class="cell medium-offset-3 medium-6">
			<h1>Four Freedoms Park Conservancy<br>
				strives to make the Park fully<br>
				accessible for all.</h1>
			<?php print do_shortcode( '[link-with-arrow title="Read More" url="/visit/accessibility" target="new" ]' ); ?>
		</div>
		<?php
			$middle_image = get_field('middle_image');
		?>
		<div class="cell background-cover" style="background-image:url(<?php print $middle_image['url'] ?>)">
		</div>
	</div>

	<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vert-pad-top-expanded border-top">
		<?php
			$events_calendar = get_field('events_calendar');
			$image = $events_calendar['image'];
			$description = $events_calendar['description'];
		?>
		<div class="cell medium-3">
			<h1>Public Events<br>
				Calendar</h1>
		</div>
		<div class="cell medium-6 background-cover" style="background-image:url(<?php print $image['url'] ?>)">
		</div>		
		<div class="cell medium-3">
			<?php print apply_filters( 'the_content', $description); ?>
		</div>
	</div>
	

</main>

<?php get_footer(); ?>
