<?php
	/*
	Template Name: Learn Blogs
	*/
?>

<?php get_header();?>


<main class="border-side">
	
	<?php
		global $post;
		set_query_var( 'part_params', array(
			'type' 	=> 'blog',
			'title' => $post->post_title,
			'items_per_page' => 8,
			'tax' => $_GET['tax']
		) );
		get_template_part( 'parts/panel-header-filter' );
	?>
	
	<?php
		$args = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'orderby' 		 => 'post_date',
			'order' 		 => 'DESC',
			'posts_per_page' => -1,
		);
		$posts = get_posts($args);
	?>	

	<?php if ($posts): ?>
		<div class="grid-x posts-section pos-relative vb-1 vb-2 vb-3 border-top">
			<div class="cell">
				<?php
					$args = array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'orderby' 		 => 'post_date',
						'order' 		 => 'DESC',
						'posts_per_page' => 1,
					);
					$post = get_posts($args)[0];
					$featured_post_id = $post->ID;

					$category 	= get_the_terms($post->ID, 'category');
					$image 		= get_the_post_thumbnail_url($post->ID);
					$start_date = strtoupper(date("d M Y",strtotime($post->post_date)));
					$text 		= get_the_excerpt($post);
					$link 		= get_permalink($post->ID);

					$tax = '';
					$tax_slug = '';
					if ($category) {
						foreach ($category as $item) {
							$tax .= (($tax != '')?', ':'').strtoupper($item->name);
							$tax_slug .= (($tax_slug != '')?',':'').$item->slug;
						}
					}

					set_query_var( 'part_params', array(
						'eyebrow' 	=> $tax,
						'title' 	=> $post->post_title,
						'image' 	=> $image,
						'text' 		=> $text,
						'link'		=> $link,
						'border_class' 		=> 'vb-1 vb-2 vb-3',
						'cell_class' => 'vert-margin-top vert-margin-bottom',
						'additional_class' 	=> 'vert-pad-bottom-expanded vert-pad-top-expanded',
						'less_padding' 		=> true,
					));
					get_template_part( 'parts/panel-content' );
				?>
			</div>
		</div>
		<div class="grid-x grid-padding-y posts-section pos-relative vb-2 border-top">
			<?php foreach ($posts as $key => $post): ?>
				<?php
					if ($post-> ID == $featured_post_id) continue;
					$category 	= get_the_terms($post->ID, 'category');
					$image 		= get_the_post_thumbnail_url($post->ID);
					$start_date = strtoupper(date("d M Y",strtotime($post->post_date)));
					$text 		= get_the_excerpt($post);
					$link 		= get_permalink($post->ID);

					$tax = '';
					$tax_slug = '';
					if ($category) {
						foreach ($category as $item) {
							$tax .= (($tax != '')?', ':'').strtoupper($item->name);
							$tax_slug .= (($tax_slug != '')?',':'').$item->slug;
						}
					}

					set_query_var( 'part_params', array(
						'link' 		=> $link,
						'data_tax'	=> $tax_slug,
						'tax'		=> $tax,
						'post_title'=> $post->post_title,
						'start_date'=> $start_date,
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

</main>

<?php get_footer(); ?>
