<?php

	$link 		 = $part_params['link'] ? : '#';
	$data_tax 	 = $part_params['data_tax'];
	$tax	 	 = $part_params['tax'];
	$post_title	 = $part_params['post_title'];
	$start_date  = $part_params['start_date'];
	$time_info 	 = $part_params['time_info'];
	$text		 = $part_params['text'];
	$image		 = $part_params['image'];
	$cell_wide	 = $part_params['cell_wide'];
	$small_title_first = $part_params['small_title_first'];

	if ($cell_wide) {
		$cell_class_left = 'medium-4';
		$cell_class = 'medium-8 cell-wide';
	} else {
		$cell_class_left = 'medium-6';
		$cell_class = 'medium-6';
	}

	if ($small_title_first) {
		$small_cell_order_title = 'small-order-1';
		$small_cell_order_image = 'small-order-2';
	} else {
		$small_cell_order_title = 'small-order-2';
		$small_cell_order_image = 'small-order-1';
	}
?>

<div class="cell cancel-padding-y panel-item-data border-bottom data-item <?php print $cell_class ?>" data-tax="<?php print $data_tax ?>">
		<div class="grid-x vert-pad-top-expanded vert-pad-bottom-expanded grid-padding-x item-data-container">
			<div class="cell <?php print $cell_class_left ?> medium-order-1 <?php print $small_cell_order_title ?>">
				<div class="p-style uppercase text-taxonomy"><?php print $tax; ?></div>
				<?php if ($link != '#'): ?>
					<a href="<?php print $link; ?>" class="color-black linked-panel" alt="Link of <?php print $post_title; ?> Post">
				<?php endif;?>
				<div class="h3-style color-black"> <?php print $post_title ?></div>
				<?php if ($link != '#'):?>
					</a>
				<?php endif; ?>
			</div>
			<div class="cell <?php print $cell_class ?> medium-order-2 <?php print $small_cell_order_image ?>">
				<?php if ($link != '#'): ?>
					<a href="<?php print $link; ?>" class="color-black linked-panel" alt="Link of <?php print $post_title; ?> Post">
				<?php endif;?>
				<img src="<?php print $image ?>" class="image" alt="Thumbnail for <?php print $post_title; ?> Post">
				<?php if ($link != '#'):?>
					</a>
				<?php endif; ?>
			</div>
			<div class="cell <?php print $cell_class_left ?> date-container medium-order-3 small-order-4">
				<p class="color-black show-for-medium">
					<?php print $start_date; ?><br>
					<?php print $time_info; ?>
				</p>
				<div class="flex-container align-justify show-for-small-only">
					<p><?php print $start_date; ?></p>
					<p><?php print $time_info; ?></p>
				</div>
			</div>

			<div class="cell <?php print $cell_class; ?> content-container medium-order-4 small-order-3">
				<?php print apply_filters( 'the_content', $text); ?>
			</div>
		</div>
</div>