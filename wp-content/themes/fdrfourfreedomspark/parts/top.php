<?php
	$main_nav = wp_get_nav_menu_items('Main Nav');
	$donate_link = get_field('donate_link', 'option');

	/* foreach ($main_nav as $key => $value) {
		var_dump($value->menu_item_parent);
	} */
?>

<header>
	<div class="grid-x grid-margin-x align-middle">
		<div class="cell medium-7">
			<div class="main-logo-container">
				<a href="/">
					<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main.svg" ?>" class="white-logo">
					<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" class="blue-logo hide">
				</a>
			</div>
		</div>
		<div class="cell medium-5">
			<div class="menus-container flex-container align-middle">
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
						<a href="<?php print $value->url; ?>" class="main-nav-menu">
							<div class="p-reg color-black"><?php print $value->title; ?></div>
						</a>
						<div class="submenu-items bg-color-white">
							<?php foreach($subitems as $item): ?>
								<a href="<?php print $item->url; ?>" class=sub-nav-menu>
									<div class="p-reg color-black"><?php print $item->title; ?></div>
								</a>
							<?php endforeach; ?>
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