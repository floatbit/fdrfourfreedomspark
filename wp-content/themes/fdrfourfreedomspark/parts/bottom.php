<?php 
	$footer_nav = wp_get_nav_menu_items('Footer Nav');
	$email = get_field('email', 'option');
	$social_media = get_field('social_media', 'option');  
?>
<footer class="bg-color-blue">
	<div class="grid-x grid-margin-x align-middle">
		<div class="cell medium-auto">
			<a href="/">
				<img class="footer-logo-container" src="<?php print TEMPLATE_IMAGE_PATH."/logo-main.svg" ?>">
			</a>
		</div>
		<div class="cell medium-shrink">
			<div class="copyright-container caption-text color-white">© 2021 Four Freedoms Park Concervancy</div>
		</div>
		<div class="cell medium-shrink">
			<div class="footer-menu-container grid-x grid-margin-x">
				<?php foreach($footer_nav as $item) : ?>
					<div class="cell medium-shrink footer-menu-item">
						<a href="<?php print $item->url; ?>" class="menu-link">
							<div class="footer-menu-title p-style color-white"><?php print $item->title; ?></div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="cell medium-shrink">
			<div class="email-container caption-text color-white"><?php print $email; ?></div>
		</div>
		<div class="cell medium-shrink">
			<div class="social-media-container">
				<a class="icon-item" href="<?php print $social_media['instagram']; ?>"><i class="fab fa-instagram color-white"></i></a>
				<a class="icon-item" href="<?php print $social_media['twitter']; ?>"><i class="fab fa-twitter color-white"></i></a>
				<a class="icon-item" href="<?php print $social_media['facebook']; ?>"><i class="fab fa-facebook-square color-white"></i></a>
				<a class="icon-item" href="<?php print $social_media['youtube']; ?>"><i class="fab fa-youtube color-white"></i></a>
				<a class="icon-item" href="<?php print $social_media['medium']; ?>"><i class="fab fa-medium color-white"></i></a>
			</div>
		</div>
	</div>
</footer>