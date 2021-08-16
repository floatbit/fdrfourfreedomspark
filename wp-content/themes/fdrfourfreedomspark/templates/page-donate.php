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

<main class="border-side trim-headings trim-paragraphs">
  
	<div class="donate-container">
		<?php foreach($content_rows as $item): ?>
			<div class="grid-x grid-padding-x pos-relative vb-1 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded">
				<?php if($item['title'] != null) : ?>
					<div class="cell medium-3 vert-margin-bottom">
						<h1>
							<?php print $item['title']; ?>
						</h1>
					</div>
				<?php else: ?>
					<div class="cell medium-3"></div>
				<?php endif; ?>
				<?php if($item['content'] != null) : ?>
					<div class="cell medium-6 middle-content">
						<?php print $item['content']; ?>
					</div>
				<?php else: ?>
					<div class="cell medium-6"></div>
				<?php endif; ?>
				<?php if($item['right_text'] != null) : ?>
					<div class="cell medium-3">
						<?php
							$text = $item['right_text'];
						?>
						<small><?php print $text; ?></small>
					</div>
				<?php else: ?>
					<div class="cell medium-3"></div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
                      
</main>

<?php get_footer(); ?>
