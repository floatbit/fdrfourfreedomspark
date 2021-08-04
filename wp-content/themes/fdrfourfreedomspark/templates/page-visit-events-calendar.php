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
			'items_per_page' => 2,
		) );
		get_template_part( 'parts/part-header-filter' );
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
		<div class="grid-x grid-padding-x grid-padding-y events-section pos-relative vb-2 vb-2-small border-top">
			<?php foreach ($events as $event): ?>
				<?php
					$event_type = get_the_terms($event->ID, 'event_type');
					$image 		= get_the_post_thumbnail_url($event->ID);
					$start_date = strtoupper(date("D, d M Y",strtotime($event->start_date)));
					$time_info  = strtoupper($event->time_info);

					$first_sentence = ffp_get_first_sentence_of_content($event);

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
						'text'		=> $first_sentence,
						'image'		=> $image
					) );
					get_template_part( 'parts/part-item-data' );
				?>
			<?php endforeach; ?>
		</div>
		
		<div class="grid-x grid-padding-x grid-padding-y pagination-section pos-relative vb-2-small border-top align-center">
			<div class="cell paging-container">
			</div>		
		</div>
		
	<?php endif ;?>

</main>

<?php get_footer(); ?>
