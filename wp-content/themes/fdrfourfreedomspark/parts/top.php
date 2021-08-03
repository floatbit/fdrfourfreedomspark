<?php
	$main_nav = wp_get_nav_menu_items('Main Nav');
	$donate_link = get_field('donate_link', 'option');

	/* foreach ($main_nav as $key => $value) {
		var_dump($value->menu_item_parent);
	} */
?>

<header class="bg-color-white <?php print (is_front_page()) ? 'front-page' : ''; ?>">
	<div class="grid-x align-middle">
		<div class="cell auto medium-6">
			<div class="main-logo-container">
				<a href="/">
					<?php if(is_front_page()) : ?>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main.svg" ?>" class="logo-white">
						<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" class="logo-blue">
					<?php else: ?>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" class="logo-blue">
					<?php endif; ?>
				</a>
			</div>
		</div>
		<div class="cell medium-6 show-for-medium">
			<div class="menus-container flex-container align-middle align-right">
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
		<div class="cell shrink hide-for-medium">
			<div class="right-section">
				<a class="icon-bars-menu" href="#open-small-menu-nav"><i class="fas fa-bars color-black"></i></a>
			</div>
			<div class="small-menu-navigation bg-color-white">
				<div class="grid-container">
					<div class="small-top-container">
						<div class="grid-x align-middle">
							<div class="cell auto">						
								<img class="small-logo" src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>">
							</div>
							<div class="cell shrink">
								<a class="icon-close-menu" href="#open-small-menu-nav"><i class="fas fa-times color-black"></i></a>
							</div>
						</div>
					</div>
					<div class="small-menu-container">
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
								<div class="accordion" data-accordion data-allow-all-closed="true">
									<div class="accordion-item" data-accordion-item>
										<a href="#" class="accordion-title">
											<div class="h3-style color-black"><?php print $value->title; ?></div>
										</a>
										<div class="accordion-content" data-tab-content>
											<div class="small-subitem-container">
												<?php foreach($subitems as $key => $item): ?>
													<a href="<?php print $item->url; ?>" class=sub-nav-menu>
														<div class="caption-text color-black"><?php print $item->title; ?></div>
													</a>
													<?php if($key < (count($subitems)-1)) : ?>
														<hr>
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
										</div>
										<hr>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
						<div class="small-button-donate">
							<a href="<?php print ($donate_link['url'] != null) ? $donate_link['url'] : '#'; ?>" class="button outline" target="<?php print $donate_link['target']; ?>"><?php print ($donate_link['title'] != null) ? $donate_link['title'] : 'Donate'; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>