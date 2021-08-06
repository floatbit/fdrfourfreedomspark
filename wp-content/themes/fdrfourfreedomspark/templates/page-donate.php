<?php
  /*
  Template Name: Donate
  */
?>

<?php 
	$content_rows = get_field('content_rows');
	//var_dump($content_rows);
?>

<?php get_header();?>

<main class="border-side">
  
	<div class="donate-container">
		<?php foreach($content_rows as $item): ?>
			<div class="grid-x grid-padding-x pos-relative vb-1 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
				<div class="cell medium-3">
					<?php if($item['title'] != null) : ?>
						<div class="h2-style donate-title">
							<?php print $item['title']; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="cell medium-6 middle-content">
					<?php if($item['content'] != null) : ?>
						<?php print $item['content']; ?>
					<?php endif; ?>
				</div>
				<div class="cell medium-3">
					<?php if($item['right_text'] != null) : ?>
						<?php print $item['right_text']; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
                      
</main>

<?php get_footer(); ?>
