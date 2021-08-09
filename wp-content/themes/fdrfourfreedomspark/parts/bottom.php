<?php 
	$footer_nav = wp_get_nav_menu_items('Footer Nav');
	$email = get_field('email', 'option');
	$social_media = get_field('social_media', 'option');  
?>
<footer class="bg-color-blue">
	<div class="footer-container">
		<a href="/">
			<img class="footer-logo-container" src="<?php print TEMPLATE_IMAGE_PATH."/logo-footer.svg" ?>">
		</a>
		<div class="copyright-container font-body-alt color-white">© <?php print date('Y'); ?> Four Freedoms Park Concervancy</div>
		<?php foreach($footer_nav as $item) : ?>
			<div class="footer-menu-container">
				<a href="<?php print $item->url; ?>" class="menu-link">
					<div class="footer-menu-title font-body-alt color-white"><?php print $item->title; ?></div>
				</a>
			</div>
		<?php endforeach; ?>
		<div class="email-container font-body-alt color-white"><?php print $email; ?></div>
		<div class="social-media-container">
			<a class="icon-item" href="<?php print $social_media['instagram']; ?>"><i class="fab fa-instagram color-white"></i></a>
			<a class="icon-item" href="<?php print $social_media['twitter']; ?>"><i class="fab fa-twitter color-white"></i></a>
			<a class="icon-item" href="<?php print $social_media['facebook']; ?>"><i class="fab fa-facebook-square color-white"></i></a>
			<a class="icon-item" href="<?php print $social_media['youtube']; ?>"><i class="fab fa-youtube color-white"></i></a>
			<a class="icon-item" href="<?php print $social_media['medium']; ?>"><i class="fab fa-medium color-white"></i></a>
		</div>
	</div>
</footer>