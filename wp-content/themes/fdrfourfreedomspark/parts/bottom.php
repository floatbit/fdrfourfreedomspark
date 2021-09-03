<?php 
	$footer_nav = wp_get_nav_menu_items('Footer Nav');
	$email = get_field('email', 'option');
	$social_media = get_field('social_media', 'option');  
?>
<footer class="bg-color-blue">
	<div class="grid-x footer-container">
		<div class="cell medium-6 large-shrink footer-left xlarge-flex-container align-middle align-left">
			<a href="/" alt="Link of Footer Logo">
				<img class="footer-logo-container" src="<?php print TEMPLATE_IMAGE_PATH."/logo-footer.svg" ?>" alt="Four Freedom Park Conservacy Footer Logo">
			</a>
			<div class="copyright-container font-body-alt color-white">© <?php print date('Y'); ?> Four Freedoms Park Conservancy</div>
		</div>
		<div class="cell medium-6 large-auto footer-right large-flex-container align-middle align-right">
			<?php foreach($footer_nav as $item) : ?>
				<div class="footer-menu-container">
					<a href="<?php print $item->url; ?>" class="menu-link" alt="Link of Menu <?php print $item->title; ?> on Footer">
						<div class="footer-menu-title font-body-alt color-white"><?php print $item->title; ?></div>
					</a>
				</div>
			<?php endforeach; ?>
			<div class="footer-menu-container email-container">
				<a href="mailto:<?php print $email; ?>" class="menu-link" alt="Link of Four Freedom Park Conservacy Email">
					<div class="footer-menu-title font-body-alt color-white"><?php print $email; ?></div>
				</a>
			</div>
			<div class="footer-menu-container social-media-container">
				<?php if ($social_media['instagram'] != null) : ?>
					<a class="icon-item" href="<?php print $social_media['instagram']; ?>" target="_blank" aria-label="Instagram" alt="Link to Instagram Account" title="Link to Instagram Account"><span class="fab fa-instagram color-white"></span></a>
				<?php endif; ?>
				<?php if ($social_media['twitter'] != null) : ?>
					<a class="icon-item" href="<?php print $social_media['twitter']; ?>" target="_blank" aria-label="Twitter" alt="Link to Twitter Account" title="Link to Twitter Account"><span class="fab fa-twitter color-white"></span></a>
				<?php endif; ?>
				<?php if ($social_media['facebook'] != null) : ?>
					<a class="icon-item" href="<?php print $social_media['facebook']; ?>" target="_blank" aria-label="Facebook" alt="Link to Facebook Account" title="Link to Facebook Account"><span class="fab fa-facebook-square color-white"></span></a>
				<?php endif; ?>
				<?php if ($social_media['youtube'] != null) : ?>
					<a class="icon-item" href="<?php print $social_media['youtube']; ?>" target="_blank"  aria-label="Youtube" alt="Link to Youtube Account" title="Link to Youtube Account"><span class="fab fa-youtube color-white"></span></a>
				<?php endif; ?>
				<?php if ($social_media['vimeo'] != null) : ?>
					<a class="icon-item" href="<?php print $social_media['vimeo']; ?>" target="_blank" alt="Social Media Link of Vimeo" title="Social Media Link of Vimeo"><span class="fab fa-vimeo color-white"></span></a>
				<?php endif; ?>
				<?php if ($social_media['medium'] != null) : ?>
					<a class="icon-item" href="<?php print $social_media['medium']; ?>" target="_blank" aria-label="Medium" alt="Link to Medium Account" title="Link to Medium Account"><span class="fab fa-medium color-white"></span></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>