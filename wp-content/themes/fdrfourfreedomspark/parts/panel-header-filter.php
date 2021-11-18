<?php
	$type = $part_params['type'];
	$title = $part_params['title'];
	$items_per_page = $part_params['items_per_page'];
	$tax = $part_params['tax'];
	$data_count = $part_params['data_count'] ? : 0;
  $no_events_text = $part_params['no_events_text'];
	
	if ($type == 'event') {
		$filter_title = 'All Event Types';
		$filter_options = get_terms( 'event_type' );
		$showing_text = 'Events';
		$data_tax = get_term_by('slug', $tax, 'event_type');
		$empty_text = 'More events will be announced soon. Join our <a href="/connect/contact-us">mailing list</a>.';
		if ($no_events_text) {
				$empty_text = $no_events_text;
		}
	} else if ($type == 'blog') {
		$filter_title = 'All Categories';
		$filter_options = get_terms( 'category' );
		$showing_text = 'Posts';
		$data_tax = get_term_by('slug', $tax, 'category');
		$empty_text = 'There is currently no blog entry. Please check back later.';
	}

?>

<div class="grid-x grid-padding-x panel-header-filter pos-relative vb-1 vb-2 vb-3 vb-2-small vert-pad-top-expanded border-top" 
	data-items-perpage=<?php print $items_per_page ?> data-selected=<?php print $data_tax->slug ?>>
	<div class="cell title-cell vert-pad-top">
		<h1 class="title-text"><?php print $title;?></h1>
	</div>
	<?php if ($data_count > 0): ?>
		<div class="cell medium-offset-6 medium-3">
			<div class="p-style btn-filter"><span class="selected-text"><?php print ($data_tax->name) ? $data_tax->name : $filter_title; ?></span><span class="fal fa-chevron-down"></span><span class="fal fa-chevron-up"></span></div>
			<?php 
				if ($filter_options):
			?>
				<div class="filter-item-container bg-color-white padding-all vert-pad-bottom border-bottom">
					<div class="item-filter p-style border-bottom <?php print ($tax) ? : 'selected'; ?>" value=""> <?php print $filter_title; ?> </div>
					<?php foreach ($filter_options as $key => $data): ?>
						<?php if ($data->slug == 'uncategorized') continue; ?>
						<div class="item-filter p-style border-bottom <?php print ($tax == $data->slug) ? 'selected' :''; ?>" data-value="<?php print $data->slug ?>"><?php print $data->name ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="cell medium-3 ">
			<p class="color-spanish-gray">Showing <span class="data-counter">0</span> <?php print $showing_text; ?> </p>
		</div>
	<?php else: ?>
		<div class="cell medium-9 vert-pad-top vert-pad-bottom-expanded">
			<?php print $empty_text; ?>
		</div>
	<?php endif; ?>
</div>	
