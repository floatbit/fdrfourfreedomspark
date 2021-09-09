<?php
  /*
  Template Name: Learn Timeline (Plain View)
  */
?>

<?php get_header();?>

<?php
	$arr_data = ffp_get_array_timeline_text(); 
	$i = 1;
?>

<main class="border-side trim-headings trim-paragraphs">
	<div class="grid-x grid-padding-x pos-relative grid-header">
		<div class="cell padding-all">
			<a class="icon-close" href="/learn/timeline" alt="Icon Close of Plain Timeline">
				<span class="fal fa-times color-blue"></span>
			</a>
		</div>
	</div>
  
	<div class="grid-x grid-padding-x pos-relative vb-2-small border-top vert-pad-top-expanded vert-pad-bottom-expanded show-for-small-only grid-title-small">
		<div class="cell medium-6">
			<h1> <?php the_title() ?> </h1>
		</div>
	</div>

	<div class="grid-x pos-relative vb-1 vb-2 vb-3 border-top vert-pad-top-expanded vert-pad-bottom-expanded grid-content">
		<div class="cell medium-6 padding-all show-for-medium">
			<h1> <?php the_title() ?> </h1>
		</div>
		<div class="cell medium-6"></div>

		<?php foreach ($arr_data as $key => $val ): ?> 
			<?php
				$addon_class = (count($arr_data) != $i) ? 'cancel-padding-bottom' : '';
				$addon_class_2 = (count($arr_data) != $i) ? 'vert-pad-top' : 'vert-pad-top vert-pad-bottom';
				$hide_for_small = (in_array($key, array('1945'))) ? 'hide-for-small-only' : '';
				$i++;
			?>
			<div class="cell medium-3 padding-all <?php print $addon_class ?> cell-year">
				<div class="h3-style"> <?php print $key; ?></div> 
			</div>
			<div class="cell medium-3 padding-all <?php print $addon_class ?> cell-text"> 
				<div class="quote-text "> <?php print $val['text1']; ?></div>
				<?php if ($val['text2']): ?>
					<div class="quote-text <?php print $hide_for_small ?>"> <?php print $val['text2']; ?></div>
				<?php endif; ?>
				<?php if ($val['text3']): ?>
					<div class="quote-text <?php print $hide_for_small ?>"> <?php print $val['text3']; ?></div>
				<?php endif; ?>
			</div>
			<div class="cell medium-3 cell-image <?php print $addon_class_2 ?> ">			
				<?php if ($key == '1936') : ?>
					<div class="img-container img-1936">
						<img src="<?php print ffp_get_img_by_year(1940) ?>" >	
					</div>
				<?php elseif (in_array($key, array('1905', '1918', '1927', '1932',  '1945', '1947', '1962'))) : ?>
					<div class="img-container img-<?php print $key ?> ">
						<img src="<?php print ffp_get_img_by_year($key) ?>" >	
					</div>
				<?php elseif ($key == '1882') : ?>
					<div class="img-container flex-container img-double img-1882">
						<img src="<?php print ffp_get_img_by_year(1882) ?>">
						<img src="<?php print ffp_get_img_by_year(1884) ?>">
					</div>
				<?php elseif (in_array($key, array('1921', '1933', '1942'))) : ?>
					<div class="img-container img-<?php print $key ?>">
						<img src="<?php print ffp_get_img_bg_by_year($key) ?>" >	
					</div>
				<?php endif; ?>
			</div>
			<?php if ($hide_for_small): ?>
				<div class="cell padding-all cell-text show-for-small-only">
					<?php if ($val['text2']): ?>
						<div class="quote-text"> <?php print $val['text2']; ?></div>
					<?php endif; ?>
					<?php if ($val['text3']): ?>
						<div class="quote-text"> <?php print $val['text3']; ?></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="cell medium-3 show-for-medium"></div>

		<?php endforeach; ?>
	</div>

	
	<div class="grid-x grid-padding-x grid-padding-y grid-back-to-top show-for-small-only bg-color-white">
		<div class="cell">			
			<?php print do_shortcode( '[link-with-arrow title="Back To Top" url="#back-to-top" alt="Accessibility" class="arrow-up" ]' ); ?>
		</div>
	</div>
</main>


<?php get_footer(); ?>
