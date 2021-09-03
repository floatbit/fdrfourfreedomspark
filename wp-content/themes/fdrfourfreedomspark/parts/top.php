<?php
	$main_nav = wp_get_nav_menu_items('Main Nav');
	$donate_link = get_field('donate_link', 'option');
?>

<header class="bg-color-white <?php print (is_front_page()) ? 'front-page' : ''; ?>">
	<div class="grid-x align-middle">
		<div class="cell auto large-6">
			<div class="main-logo-container">
				<a href="/" alt="Link of Main Logo">
					<?php if(is_front_page()) : ?>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main.svg" ?>" class="logo-white" alt="Four Freedoms Park Conservacy Main Logo">
						<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" class="logo-blue" alt="Four Freedoms Park Conservacy Main Blue Logo">
					<?php else: ?>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" class="logo-blue" alt="Four Freedoms Park Conservacy Main Blue Logo">
					<?php endif; ?>
				</a>
			</div>
		</div>
		<div class="cell large-6 show-for-large">
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
							<a href="<?php print $value->url; ?>" alt="Link of Menu <?php print $value->title; ?>">
								<div class="menu-title p-style "><?php print $value->title; ?></div>
							</a>
							<hr class="border-nav-menu <?php print (ffp_is_current_navigation($value)) ? 'current' : ''; ?>">
						</div>
						<div class="submenu-items hide">
							<div class="items-container bg-color-white">
								<?php foreach($subitems as $key => $item): ?>
									<?php 
										$href = $item->url;
										$target = '';
										if (strpos(strtolower($item->url), 'timeline') !== false) {
											$href = '#open-timeline';
											$target = 'new-window';
										}
									?>
									<a href="<?php print $href; ?>" class="sub-nav-menu" alt="<?php print $item->title; ?> navigation submenu">
										<div class="p-style color-black submenu-title">
											<?php print $item->title; ?>
											<?php if ($target != ''): ?>
												<span class="fal fa-external-link"></span>
											<?php endif; ?>
										</div>
									</a>
									<?php if($key < count($subitems)-1) : ?>
										<hr>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="button-donate">
					<a href="<?php print ($donate_link['url'] != null) ? $donate_link['url'] : '#'; ?>" class="button" target="<?php print $donate_link['target']; ?>" alt="Link of Donate Button"><?php print ($donate_link['title'] != null) ? $donate_link['title'] : 'Donate'; ?></a>
				</div>
			</div>
		</div>
		<div class="cell shrink hide-for-large">
			<div class="right-section">
				<a class="icon-bars-menu open-small-menu-nav" href="#" alt="Open Mobile Menu"><span class="fal fa-bars color-black"></span></a>
			</div>
			<div class="small-menu-navigation bg-color-white">
				<div class="grid-container">
					<div class="small-top-container">
						<div class="grid-x align-middle">
							<div class="cell auto">						
								<img class="small-logo" src="<?php print TEMPLATE_IMAGE_PATH."/logo-main-blue.svg" ?>" alt="Four Freedoms Park Conservacy Main Logo" >
							</div>
							<div class="cell shrink">
								<a class="icon-close-menu open-small-menu-nav" href="#" alt="Icon Close of Mobile Menu Navigation"><span class="fal fa-times color-black"></span></a>
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
										<a href="#" class="accordion-title"  alt="Menu <?php print $value->title; ?> under Mobile Menu">
											<div class="h3-style color-black"><?php print $value->title; ?></div>
										</a>
										<div class="accordion-content" data-tab-content>
											<div class="small-subitem-container">
												<?php foreach($subitems as $key => $item): ?>
													<?php 
														$href = $item->url;
														$target = '';
														if (strpos(strtolower($item->url), 'timeline') !== false) {
															$href = '#open-timeline';
															$target = 'new-window';
														}
													?>
													<a href="<?php print $href; ?>" class="sub-nav-menu" alt="Menu <?php print $item->title; ?> under Mobile Menu">
														<div class="caption-text color-black">
															<?php print $item->title; ?>
															<?php if ($target != ''): ?>
																<span class="fal fa-external-link"></span>
															<?php endif; ?>
														</div>
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
							<a href="<?php print ($donate_link['url'] != null) ? $donate_link['url'] : '#'; ?>" class="button outline" target="<?php print $donate_link['target']; ?>" alt="Donate Button on Mobile Menu"><?php print ($donate_link['title'] != null) ? $donate_link['title'] : 'Donate'; ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>