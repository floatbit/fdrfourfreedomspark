<?php
	$type = $part_params['type'];
	$title = $part_params['title'];
	
	if ($type == 'event') {
		$filter_title = 'All Event Types';
		$datas = get_terms( 'event_type' );
		$showing_text = 'Events';
	} else if ($type == 'blog') {
		$filter_title = 'All Categories';
		$datas = get_terms( 'event_type' );
		$showing_text = 'Posts';
	}


?>

<div class="grid-x grid-padding-x grid-padding-y panel-header-filter pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top">
	<div class="cell title-cell cancel-padding-y">
		<h1 class="title-text"><?php print $title;?></h1>
	</div>
	<div class="cell medium-offset-6 medium-3 cancel-padding-y">
		<div class="p-style btn-filter"><span class="selected-text"><?php print $filter_title; ?></span><span class="fal fa-chevron-down"></span><span class="fal fa-chevron-up"></span></div>
		<?php 
			if ($datas):
		?>
			<div class="filter-item-container bg-color-white padding-all vert-pad-bottom border-bottom">
				<div class="item-filter p-style selected border-bottom" value=""> <?php print $filter_title; ?> </div>
				<?php foreach ($datas as $key => $data): ?>
					<div class="item-filter p-style border-bottom" data-value="<?php print $data->slug ?>"><?php print $data->name ?></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="cell medium-3 cancel-padding-y">
		<p class="color-dark-gray">Showing <span class="data-counter">30</span> <?php print $showing_text; ?> </p>
	</div>
</div>	
