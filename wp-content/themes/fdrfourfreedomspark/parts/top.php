<?php
	$main_nav = wp_get_nav_menu_items('Main Nav');
	$donate_link = get_field('donate_link', 'option');

	/* foreach ($main_nav as $key => $value) {
		var_dump($value->menu_item_parent);
	} */
?>

<header class="bg-color-black">
	<div class="grid-x grid-margin-x align-middle">
		<div class="cell medium-6">
			<div class="main-logo-container">
				<a href="/">
					<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main.svg" ?>" class="logo-white">
					<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" class="logo-blue hide">
				</a>
			</div>
		</div>
		<div class="cell medium-6">
			<div class="menus-container flex-container align-middle align-justify">
				<?php foreach ($main_nav as $key => $value): ?>
					<?php
						$subitems = array();
						foreach ($main_nav as $subitem) {
							if ($subitem->menu_item_parent == $value->ID) {
								$subitems[] = $subitem;
							}
						}
					?>
					<?php if ($value->menu_item_parent == 0): ?>
					<div class="menu-item-container" data-menu-id=<?php print $value->ID; ?>>
						<div class="main-nav-menu">
							<a href="<?php print $value->url; ?>">
								<div class="menu-title p-style color-white"><?php print $value->title; ?></div>
							</a>
						</div>
						<hr class="border-nav-menu hide">
						<div class="submenu-items hide">
							<div class="items-container bg-color-white">
								<?php foreach($subitems as $item): ?>
									<a href="<?php print $item->url; ?>" class=sub-nav-menu>
										<div class="p-style color-black"><?php print $item->title; ?></div>
									</a>
									<hr>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="button-donate">
					<a href="<?php print ($donate_link['url'] != null) ? $donate_link['url'] : '#'; ?>" class="button" target="<?php print $donate_link['target']; ?>"><?php print ($donate_link['title'] != null) ? $donate_link['title'] : 'Donate'; ?></a>
				</div>
			</div>
		</div>
	</div>
</header>