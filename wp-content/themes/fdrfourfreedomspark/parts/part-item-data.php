<?php

	$link 		= $part_params['link'];
	$data_tax 	= $part_params['data_tax'];
	$tax	 	= $part_params['tax'];
	$post_title	= $part_params['post_title'];
	$start_date = $part_params['start_date'];
	$time_info 	= $part_params['time_info'];
	$text		= $part_params['text'];
	$image		= $part_params['image'];

?>

<div class="cell medium-6 cancel-padding-y part-item-data border-bottom data-item" data-tax="<?php print $data_tax ?>">
	<a href="<?php print $link; ?>" class="color-black">
		<div class="grid-x vert-pad-top-expanded vert-pad-bottom-expanded grid-padding-x ">
			<div class="cell medium-6 medium-order-1 small-order-2">
				<p class="color-blue text-taxonomy"><?php print $tax ?></p>
				<h3 class="color-black"> <?php print $post_title ?></h3>
			</div>
			<div class="cell medium-6 medium-order-2 small-order-1">
				<img src="<?php print $image ?>" class="image">
			</div>
			<div class="cell medium-6 date-container medium-order-3 small-order-4">
				<p class="color-black show-for-medium">
					<?php print $start_date; ?><br>
					<?php print $time_info; ?>
				</p>
				<div class="flex-container align-justify show-for-small-only">
					<p><?php print $start_date; ?></p>
					<p><?php print $time_info; ?></p>
				</div>
			</div>
			<div class="cell medium-6 content-container medium-order-4 small-order-3">
				<?php print $text; ?>
			</div>
		</div>
	</a>
</div>