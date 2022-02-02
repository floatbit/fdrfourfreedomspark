<?php 
	wp_reset_postdata();
	$popup = get_field('popup'); 
?>
<?php if ($popup && $popup['show_popup'] && $popup['text']): ?>
	<div id="popup-reveal" class="reveal popup-reveal bg-color-blue color-white" data-reveal data-animation-in="fade-in fast" data-animation-out="fade-out fast">
		<div class="grid-x">
			<div class="cell cell-close text-right">
					<a class="icon-close color-white" data-close><span class="fal fa-times"></a>
			</div>
			<div class="cell">
				<p class="quote-text cancel-indent"><?php print $popup['text']; ?></p>
				<div class="cta">
					<?php print do_shortcode( '[link-with-arrow title="'.$popup['cta']['title'].'" url="'.$popup['cta']['url'].'" target="'.$popup['cta']['target'].'"]' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>