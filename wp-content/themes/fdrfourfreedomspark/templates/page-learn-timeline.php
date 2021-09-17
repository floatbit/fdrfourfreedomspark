<?php
	/*
	Template Name: Learn Timeline
	*/
?> 

<?php get_header();?>

<main class="timeline-main border-side">
	
	<div class="grid-x pos-relative border-top">
		<div class="cell navigation-decade-container padding-all cancel-padding-y border-bottom">
			<div class="nav-container first-load"></div>
			<div class="back-nav"><?php print do_shortcode('[link-with-arrow url="#close-window" title="Back to Main Site" class="reversed flex-container align-middle" alt="Back to Main Site"]'); ?></div>
		</div>
		<div class="cell timeline-container">
			<div class="timeline-carousel">
				<div class="timeline-cell timeline-cell-double cell-1 padding-all" data-decade="">
					<div class="hor-pad-right-expanded">
						<h1><?php the_title();?></h1>
						<div class="content h3-style">
							<?php the_content();?>
						</div>
						<?php if (wp_is_mobile()): ?>
							<div class="scroll-down-to-start button-text color-blue">Swipe to start&nbsp;&nbsp;<span class="fal fa-long-arrow-right"></div>
						<?php else: ?>
							<div class="scroll-down-to-start button-text color-blue">Scroll to start&nbsp;&nbsp;<img src="<?php print TEMPLATE_IMAGE_PATH."/icon-scroll-down.gif"?>"></div>
						<?php endif; ?>
					</div>
					<div class="timeline-plain-mode-link">
						<a href="/learn/timeline-plain">View Plain Text Version</a>
					</div>
				</div>
				<div class="timeline-cell bg-color-blue background-cover cell-2" data-decade="1880">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1882</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1882); ?>
							</span>
						</div>
						<img src="<?php print ffp_get_img_by_year(1882) ?>" class="img">
					</div>
				</div>
				<div class="timeline-cell background-cover flex-container cell-3" style="background-image:url(<?php print ffp_get_img_bg_by_year(1884) ?>)" data-decade="1880">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1884</span> 
						</div>
						<img src="<?php print ffp_get_img_by_year(1884) ?>" class="img">
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1884); ?>
							</span>
						</div>
					</div>
				</div>
				<div class="timeline-cell background-cover flex-container cell-3-A" style="background-image:url(<?php print ffp_get_img_bg_by_year(1884) ?>)" data-decade="1900">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1905</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1905); ?>
							</span>
						</div>
					</div>
				</div>
				<div class="timeline-cell bg-color-blue background-cover cell-4" data-decade="1910">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1910</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1910); ?>
							</span>
						</div>
						<img src="<?php print ffp_get_img_by_year(1910) ?>" class="img">
					</div>
				</div>
				<div class="timeline-cell background-cover flex-container cell-5" style="background-image:url(<?php print ffp_get_img_bg_by_year(1912) ?>)" data-decade="1910">
					<div class="timeline-block flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1912</span> 
						</div>
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1912); ?>
							</span>
						</div>
					</div>
				</div>				
				<div class="timeline-cell bg-color-blue background-cover cell-6" data-decade="1910">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1913</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1913); ?>
							</span>
						</div>
						<img src="<?php print ffp_get_img_by_year(1913) ?>" class="img">
					</div>
				</div>
				<div class="timeline-cell background-cover cell-7 " style="background-image:url(<?php print ffp_get_img_bg_by_year(1918) ?>)" data-decade="1910">
					<div class="timeline-block  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style">1918</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text">
								<?php print	ffp_get_text_by_year(1918); ?>
							</span>
						</div>
					</div>
				</div>
				<div class="timeline-cell background-cover cell-8 " style="background-image:url(<?php print ffp_get_img_bg_by_year(1920) ?>)" data-decade="1920">
					<div class="timeline-block flex-container align-justify">
						<div class="top-section">
							<div class="year-container">
								<span class="h2-style color-white">1920</span> 
							</div>
							<div class="text-container">
								<span class="quote-text color-white">
									<?php print	ffp_get_text_by_year(1920); ?>
								</span>
							</div>
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1920, 2); ?>
							</span>
						</div>
					</div>
				</div>					
				<div class="timeline-cell bg-color-blue background-cover cell-9" data-decade="1920">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1921</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1921); ?>
							</span>
						</div>
						<img src="<?php print ffp_get_img_by_year(1921) ?>" class="img">
					</div>
				</div>				
				<div class="timeline-cell timeline-cell-double background-cover flex-container cell-10" style="background-image:url(<?php print ffp_get_img_bg_by_year(1927) ?>)"  data-decade="1920">
					<div class="timeline-block-half flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1922</span> 
						</div>
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1922); ?>
							</span>
						</div>
					</div>
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">1927</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1927); ?>
							</span>
						</div>
					</div>
				</div>

				<div class="timeline-cell bg-color-blue background-cover cell-11" data-decade="1920">
					<div class="img-container">
						<img src="<?php print ffp_get_img_by_year(1928)?>" class="img">
					</div>		
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1928</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1928); ?>
							</span>
						</div>
					</div>
				</div>	

				<div class="timeline-cell background-cover flex-container cell-12" style="background-image:url(<?php print ffp_get_img_bg_by_year(1932) ?>)" data-decade="1930">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1932</span> 
						</div>
						<div class="text-container border-top">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1932); ?>
							</span>
						</div>
					</div>
				</div>						

				<div class="timeline-cell background-cover cell-13" style="background-image:url(<?php print ffp_get_img_bg_by_year('1932_2') ?>)" data-decade="1930">
					<div class="timeline-block flex-container ">
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1932, 2); ?>
							</span>
						</div>
					</div>
				</div>				
				
				<div class="timeline-cell bg-color-light-blue background-cover cell-14" data-decade="1930">
					<div class="timeline-block flex-container align-justify">
						<div class="top-container">
							<div class="year-container">
								<span class="h2-style color-white">1933</span> 
							</div>
							<div class="text-container">
								<span class="quote-text color-white">
									<?php print	ffp_get_text_by_year(1933); ?>
								</span>
							</div>
							<img src="<?php print ffp_get_img_by_year(1933);?>" class="img">
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1933, 2); ?>
							</span>
						</div>
					</div>
				</div>	
				
				<div class="timeline-cell timeline-cell-double background-cover cell-15 flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1936) ?>)" data-decade="1930">
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">&nbsp;</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1933, 3); ?>
							</span>
						</div>
					</div>
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">1936</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1936); ?>
							</span>
						</div>
					</div>
				</div>	

				<div class="timeline-cell bg-color-blue background-cover cell-16" data-decade="1940">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1940</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1940); ?>
							</span>
						</div>
						<img src="<?php print ffp_get_img_by_year(1940); ?>" class="img">
					</div>
				</div>	
				
				<div class="timeline-cell timeline-cell-double background-cover cell-17 flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1941) ?>)" data-decade="1940">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1941</span> 
						</div>
						<div class="text-container flex-container">
							<span class="quote-text color-white" style="width: 48%">
								<?php print	ffp_get_text_by_year(1941); ?>
							</span>
						</div>
					</div>
				</div>	
				
				<div class="timeline-cell bg-color-blue background-cover cell-18" data-decade="1940">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1942</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1942); ?>
							</span>
						</div>
						<img src="<?php print ffp_get_img_by_year(1942); ?>" class="img">
					</div>
				</div>	
				
				<div class="timeline-cell timeline-cell-double background-cover cell-19 flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1945) ?>)" data-decade="1940">
					<div class="timeline-block flex-container align-justify">
						<div class="top-section">
							<div class="year-container">
								<span class="h2-style color-white">1945</span> 
							</div>
							<div class="text-container flex-container">
								<span class="quote-text color-white" style="width: 48%">
									<?php print	ffp_get_text_by_year(1945); ?>
								</span>
							</div>
						</div>
						<div class="text-container flex-container align-justify text-container-bottom">
							<span class="quote-text color-white" style="width: 48%">
								<?php print	ffp_get_text_by_year(1945, 2); ?>
							</span>
							<span class="quote-text color-white" style="width: 48%">
								<?php print	ffp_get_text_by_year(1945, 3); ?>
							</span>
						</div>
					</div>
				</div>	
				
				<div class="timeline-cell background-cover cell-20 flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1947) ?>)" data-decade="1940">
					<div class="timeline-block flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1947</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1947); ?>
							</span>
						</div>
					</div>
				</dif>
				<div class="timeline-cell background-cover cell-20-A flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1947) ?>)" data-decade="1950">
					<div class="timeline-block flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1952</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1952); ?>
							</span>
						</div>
					</div>
				</div>	

				<div class="timeline-cell timeline-cell-double background-cover cell-21 flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1960) ?>)" data-decade="1960">
					<div class="timeline-block-half  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1960</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1960); ?>
							</span>
						</div>
					</div>
					<div class="timeline-block-half  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1961</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1961); ?>
							</span>
						</div>
					</div>
				</div>

				<div class="timeline-cell background-cover cell-21 flex-container" style="background-image:url(<?php print ffp_get_img_bg_by_year(1962) ?>)" data-decade="1960">
					<div class="timeline-block  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1962</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<?php print	ffp_get_text_by_year(1962); ?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
											
</main>

<main class="timeline-main-plain border-side">

</main>

<?php get_footer(); ?>

