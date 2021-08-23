<?php
	/*
	Template Name: Visit Event Calendar
	*/
?>

<?php get_header();?>

<main class="border-side">
	
	<?php
		global $post;

		set_query_var( 'part_params', array(
			'type' 	=> 'event',
			'title' => $post->post_title,
			'items_per_page' => 6,
			'tax' => $_GET['tax']
		) );
		get_template_part( 'parts/panel-header-filter' );
	?>
	
	<?php
		$args = array(
			'post_type'      => 'event',
			'post_status'    => 'publish',
			'meta_key' 		 => 'start_date',
			'orderby' 		 => 'meta_value_num',
			'order' 		 => 'DESC',
			'posts_per_page' => -1,
		);
		$events = get_posts($args);
	?>	

	<?php if ($events): ?>
		<div class="grid-x grid-padding-y events-section pos-relative vb-2 border-top">
			<?php foreach ($events as $event): ?>
				<?php
					$event_type = get_the_terms($event->ID, 'event_type');
					$image 		= get_the_post_thumbnail_url($event->ID);
					$start_date = strtoupper(date("D, d M Y",strtotime($event->start_date)));
					$time_info  = $event->time_info;
					$time_info = str_ireplace('am','AM',$time_info);
					$time_info = str_ireplace('pm','PM',$time_info);
					$text = ffp_get_first_sentence_of_content($event);

					$tax = '';
					$tax_slug = '';
					if ($event_type) {
						foreach ($event_type as $item) {
							$tax .= (($tax != '')?', ':'').strtoupper($item->name);
							$tax_slug .= (($tax_slug != '')?',':'').$item->slug;
						}
					}

					set_query_var( 'part_params', array(
						'link' 		=> '/event/'.$event->post_name,
						'data_tax'	=> $tax_slug,
						'tax'		=> $tax,
						'post_title'=> $event->post_title,
						'start_date'=> $start_date,
						'time_info' => $time_info,
						'text'		=> $text,
						'image'		=> $image
					) );
					get_template_part( 'parts/panel-item-data' );
				?>
			<?php endforeach; ?>
		</div>
		
		<div class="grid-x grid-padding-x grid-padding-y pagination-section pos-relative vert-pad-top-expanded vert-pad-bottom-expanded border-top align-center">
			<div class="cell paging-container cancel-padding-y">
			</div>		
		</div>
		
	<?php endif ;?>

	<?php 
		get_template_part( 'parts/panel-instagram-feed' );
	?>
</main>

<?php get_footer(); ?>
