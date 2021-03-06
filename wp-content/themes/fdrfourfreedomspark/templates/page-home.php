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
	if (stripos($open_info, 'close') !== FALSE) {
		$open_info = 'Closed Today';
	} else {
		$open_info = 'Open Today&nbsp;&nbsp;<span class="info-hour bold">'.$open_info.'</span>';
	}
?>

<?php get_header();?>

<main class="border-side">
	<section id="home-hero">
		<div class="hero-container">
			<div class="carousel carousel-main">
				<?php foreach($hero as $hero_item): ?>
						<div class="carousel-cell">
							<?php if(strtolower(end(explode(".",$hero_item['file']['url']))) == "mp4"): ?>
								<video muted autoplay loop playsinline class="hero-image background-cover">
									<source src="<?php print $hero_item['file']['url']; ?>" type="video/mp4" />
								</video>	
							<?php else: ?>
								<div class="hero-image background-cover" style="background-image:url(<?php print $hero_item['file']['url']; ?>)"></div>
							<?php endif; ?>
						</div>
				<?php endforeach; ?>
				
			</div>
			
			<div class="hero-info-container bg-color-white">
				<div class="grid-x grid-padding-x">
					<div class="cell medium-6 open-border hero-info-item">
						<div class="flex-container align-middle info-item">
							<div class="p-style color-black info-open">
								<?php print $open_info; ?>
							</div>
						</div>
					</div>
					<div class="cell medium-2 border-left show-for-medium hero-info-item">
						<div class="flex-container align-middle info-item">
							<a href="/visit/events-calendar" class="hero-link home-upcoming-event" alt="Upcoming Events">
								<div class="p-style color-black info-event">
									<span class="fal fa-calendar"></span>Upcoming Events
								</div>
							</a>
						</div>
					</div>
					<div class="cell medium-2 border-bottom show-for-small-only hero-info-item">
						<div class="flex-container align-middle info-item">
							<a href="/visit/events-calendar" class="hero-link home-upcoming-event" alt="Upcoming Events">
								<div class="p-style color-black info-event">
									<span class="fal fa-calendar"></span>Upcoming Events
								</div>
							</a>
						</div>
					</div>
					<div class="cell small-6 medium-2 border-left hero-info-item">
						<div class="flex-container align-middle info-item">
							<a href="/visit/planning-your-visit" class="hero-link">
								<div class="p-style color-black info-getting">
									<span class="fal fa-map-marker-alt"></span>Getting Here
								</div>
							</a>
						</div>
					</div>
					<div class="cell small-6 medium-2 border-left hero-info-item">
						<div class="flex-container align-middle info-item">
							<a href="/donate" class="hero-link">
								<div class="p-style color-black info-donate">
									<span class="fal fa-hand-holding-heart"></span>Donate
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home-intro">
		<div class="intro-container">
			<div class="grid-x grid-padding-x grid-padding-y pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top intro-inner-container">
				<div class="cell medium-6 intro-title">
					<h1>
						<?php print $intro['title']; ?>
					</h1>
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
		<?php
			$today = date('Ymd');
			$args = array(
				'post_type'      => 'event',
				'post_status'    => 'publish',
				'meta_key' 		 => 'start_date',
				'orderby' 		 => 'meta_value_num',
				'order' 		 => 'ASC',
				'posts_per_page' => -1,
				'meta_query'     => array(
					array(
						'key'	  => 'start_date', 
					 	'value'   => $today, 
					  	'compare' => '>'
					)
			 	),
			);
			$events = get_posts($args);
			$title = 'Upcoming Event'.((count($events) > 1) ? 's' : '');
			if (!$events) {
				$args = array(
					'post_type'      => 'event',
					'post_status'    => 'publish',
					'meta_key' 		 => 'start_date',
					'orderby' 		 => 'meta_value_num',
					'order' 		 => 'DESC',
					'posts_per_page' => 3,
					'meta_query'     => array(
						array(
							'key'	  => 'start_date', 
							 'value'   => $today, 
							  'compare' => '>'
						)
					 ),
				);
				$events = get_posts($args);
				$title = 'Event'.((count($events) > 1) ? 's' : '');
			}

			if ($events):
		?>
			<div class="grid-x pos-relative vb-1 vb-2 border-top">
				<div class="cell medium-3 padding-all cancel-padding-bottom flex-container flex-dir-column">
					<div class="vert-pad-top-expanded flex-child-auto">
						<h1><?php print $title; ?></h1>
					</div>
					<div class="flex-child-shrink show-for-medium events-link">
						<?php print do_shortcode( '[link-with-arrow title="See All Events" url="/events-calendar/"]' ); ?>
					</div>
				</div>
				<div class="cell medium-9 vert-pad-top cell-events-container">
					<?php 
						foreach ($events as $event): 
							$image 		= get_the_post_thumbnail_url($event->ID);
							$start_date = strtoupper(date("D d M Y",strtotime($event->start_date)));
							$time_info  = $event->time_info;
							$time_info = str_ireplace('am','AM',$time_info);
							$time_info = str_ireplace('pm','PM',$time_info);
							$first_sentence = ffp_get_first_sentence_of_content($event);

							set_query_var( 'part_params', array(
								'post_title' => $event->post_title,
								'image' 	 => $image,
								'text' 		 => $first_sentence,
								'start_date' => $start_date,
								'time_info'	 => $time_info,
								'cell_wide'  => true,
							));
							get_template_part( 'parts/panel-item-data' );
						endforeach; 
					?>
				</div>
				<div class="cell vert-pad-top-expanded vert-pad-bottom-expanded padding-all show-for-small-only">
					<div class="vert-margin-top vert-margin-bottom">
						<?php print do_shortcode( '[link-with-arrow title="See All Events" url="/events-calendar/"]' ); ?>
					</div>
				</div>
			</div>
		<?php endif ;?>
	</section>
	
	<?php if ($featured_blogs): ?>
		<section id="home-featured-blog">
			<div class="featured-blog-container trim-paragraphs border-bottom">
				<?php foreach($featured_blogs as $key => $item) : ?>
					<?php 
						$image = get_the_post_thumbnail_url($item->ID);
						$post = get_post($item->ID);
						$cat_names = ffp_get_post_categ_urls($item, 'category', 'blogs');

						$first_class = '';
						$middle_class = '';
						$last_class = '';
						if ($key == 0) {
							$first_class = 'border-top';
						}
						if ($key < count($featured_blogs)-1) {
							$middle_class = 'vert-pad-bottom';
						}
						if ($key == count($featured_blogs)-1){
							$last_class = 'vert-pad-bottom-expanded-small vert-margin-bottom-small';
						}

						set_query_var( 'part_params', array(
							'eyebrow' => $cat_names['names'],
							'title' => get_the_title(),
							'image' => $image,
							'text' => get_the_content(),
							'border_class' => 'vb-1 vb-2 vb-3',
							'additional_class' => 'vert-pad-top-expanded '.$first_class.' '.$middle_class.' '.$last_class,
							'less_padding' => true,
							'link' => get_the_permalink(),
							'cell_class' => 'vert-margin-top',
							'title_size' => 'h1',
						));
						get_template_part( 'parts/panel-content' );
					?>
				<?php endforeach; ?>
			</div>
		</section>
	<?php endif; ?>
	
	<?php 
		get_template_part( 'parts/panel-instagram-feed' );
	?>
</main>

<?php get_footer(); ?>
