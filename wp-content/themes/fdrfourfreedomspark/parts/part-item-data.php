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
			<div class="cell medium-6">
				<p class="color-blue"><?php print $tax ?></p>
				<div class="h3-style"> <?php print $post_title ?></div>
			</div>
			<div class="cell medium-6">
				<img src="<?php print $image ?>" class="image">
			</div>
			<div class="cell medium-6">
				<div class="p-style">
					<?php print $start_date; ?><br>
					<?php print $time_info; ?>
				</div>
			</div>
			<div class="cell medium-6">
				<?php print $text; ?>
			</div>
		</div>
	</a>
</div>