<?php
	/*
	Template Name: Learn Timeline
	*/
?>

<?php get_header();?>

<main class="border-side">
	
	<div class="grid-x pos-relative vb-1 vb-2 vb-3 border-top border-bottom">
		<div class="cell timeline-container">
			<div class="timeline-carousel">
				<div class="timeline-cell timeline-cell-double cell-1 padding-all" data-decade="">
					<div class="hor-pad-right-expanded">
						<h1><?php the_title();?></h1>
						<div class="content h3-style">
							<?php the_content();?>
						</div>
						<?php print do_shortcode( '[link-with-arrow title="View Timeline" url="#expand-timeline"]' ); ?>
					</div>	
				</div>
				<div class="timeline-cell bg-color-blue background-cover cell-2" data-decade="1880">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1882</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>January 30</strong>—Franklin<br>Roosevelt (FDR) born at<br>Hyde Park
							</span>
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1882_img.png"?>" class="img">
					</div>
				</div>
				<div class="timeline-cell background-cover flex-container cell-3" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1884_bg.png" ?>)" data-decade="1880">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1884</span> 
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1884_img.png"?>" class="img">
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								<strong>October 11</strong>—Eleanor<br>Roosevelt (ER) born in<br>New York City
							</span>
						</div>
					</div>
				</div>
				<div class="timeline-cell background-cover flex-container cell-3-A" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1884_bg.png" ?>)" data-decade="1900">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1905</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>March 17</strong>—Franklin and<br>Eleanor are married
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
								Franklin was elected to<br>New York State Senate
							</span>
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1910_img.png"?>" class="img">
					</div>
				</div>
				<div class="timeline-cell background-cover flex-container cell-5" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1912_bg.png" ?>)" data-decade="1910">
					<div class="timeline-block flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1912</span> 
						</div>
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								Eleanor attends her first<br>Democratic Party<br>Convention
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
								<strong>April</strong>—Franklin was<br>appointed as Assistant<br>Secretary of the Navy
							</span>
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1913_img.png"?>" class="img">
					</div>
				</div>
				<div class="timeline-cell background-cover cell-7 " style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1918_bg.png" ?>)" data-decade="1910">
					<div class="timeline-block  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style">1918</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text">
								Eleanor works with the<br>
								Red Cross, the Navy<br>Department to help<br>American Servicemen<br>
								in WWI
							</span>
						</div>
					</div>
				</div>
				<div class="timeline-cell background-cover cell-8 " style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1920_bg.png" ?>)" data-decade="1920">
					<div class="timeline-block flex-container align-justify">
						<div class="top-section">
							<div class="year-container">
								<span class="h2-style color-white">1920</span> 
							</div>
							<div class="text-container">
								<span class="quote-text color-white">
									Franklin is nominated for<br>Vice President on ticket<br>with James N. Cox, but lost<br>to Coolidge and Harding
								</span>
							</div>
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								Eleanor joins League of<br>Women Voters and works<br>for womens’ political gains<br>following the successful<br>movement
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
								<strong>August</strong>—Franklin  is<br>stricken with poliomyelitis<br>at Campobello, New<br>Brunswick, Canada
							</span>
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1921_img.png"?>" class="img">
					</div>
				</div>				
				<div class="timeline-cell timeline-cell-double background-cover flex-container cell-10" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1927_bg.png" ?>)"  data-decade="1920">
					<div class="timeline-block-half flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1922</span> 
						</div>
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								Eleanor writes <span class="font-heading-italic">“Why I Am<br>a Democrat,”</span>crystallizing<br>her ideals and commitment<br>to the Democratic Party
							</span>
						</div>
					</div>
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">1927</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								Franklin founded the<br>Georgia Warm Springs<br>Foundation therapy center<br>for the treatment of<br>polio victims
							</span>
						</div>
					</div>
				</div>

				<div class="timeline-cell bg-color-blue background-cover cell-11" data-decade="1920">
					<div class="img-container">
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1928_img.png"?>" class="img">
					</div>		
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1928</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>November 6</strong>—Franklin<br>was elected as Governor<br>of New York
							</span>
						</div>
					</div>
				</div>	

				<div class="timeline-cell background-cover flex-container cell-12" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1932_bg.png" ?>)" data-decade="1930">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1932</span> 
						</div>
						<div class="text-container border-top">
							<span class="quote-text color-white">
								<strong>November 8</strong>—Franklin<br>was elected as President
							</span>
						</div>
					</div>
				</div>						

				<div class="timeline-cell background-cover cell-13" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1932_2_bg.png" ?>)" data-decade="1930">
					<div class="timeline-block flex-container ">
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								Eleanor states that the<br>country should not expect<br>the new First Lady to be a<br>symbol of elegance but<br>rather, “plain, ordinary<br>Mrs. Roosevelt.”
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
									<strong>March 4</strong>—Franklin was<br>Inaugurated as 32nd<br>President
								</span>
							</div>
							<img src="<?php print TEMPLATE_IMAGE_PATH."/1933_img.png"?>" class="img">
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<strong>March 6</strong>—Eleanor<br>becomes the 1st First Lady<br>to hold a press conference<br>where only female<br>reporters are admitted
							</span>
						</div>
					</div>
				</div>	
				
				<div class="timeline-cell timeline-cell-double background-cover cell-15 flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1936_bg.png" ?>)" data-decade="1930">
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">&nbsp;</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>June 16</strong>—Franklin signs<br>the National Industrial<br>Recovery Act, part of his<br>“New Deal” platform
							</span>
						</div>
					</div>
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">1936</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>November 3</strong>—Franklin was<br>Reelected as President
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
								<strong>November 5</strong>—Franklin was<br>reelected as President
							</span>
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1940_img.png"?>" class="img">
					</div>
				</div>	
				
				<div class="timeline-cell timeline-cell-double background-cover cell-17 flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1941_bg.png" ?>)" data-decade="1940">
					<div class="timeline-block">
						<div class="year-container">
							<span class="h2-style color-white">1941</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>December 8</strong>—U.S.<br>declares war on Japan<br>
								<br>
								<strong>December 11</strong>—U.S.<br>declares war on Germany 
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
								<strong>January 6</strong>—Franklin Gives<br>State of the Union speech<br>popularly known as<br>the <span class="font-heading-italic"><strong>“Four Freedoms”</strong></span>
							</span>
						</div>
						<img src="<?php print TEMPLATE_IMAGE_PATH."/1942_img.png"?>" class="img">
					</div>
				</div>	
				
				<div class="timeline-cell timeline-cell-double background-cover cell-19 flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1945_bg.png" ?>)" data-decade="1940">
					<div class="timeline-block flex-container align-justify">
						<div class="top-section">
							<div class="year-container">
								<span class="h2-style color-white">1945</span> 
							</div>
							<div class="text-container ">
								<span class="quote-text color-white">
									<strong>April 12</strong>—Franklin died in<br>Warm Springs, Georgia<br>
									<br>
									<strong>April 15</strong>—Franklin buried<br>in Hyde Park, New York
								</span>
							</div>
						</div>
						<div class="text-container flex-container align-justify text-container-bottom">
							<span class="quote-text color-white">
								Regarding Franklin’s death,<br>Eleanor says “ The story is<br>over,” and returns to<br>private life at her beloved<br>Val-Kill cottage<br>in Hyde Park
							</span>
							<span class="quote-text color-white">
								Eleanor accepts President<br>Harry Truman’s offer to<br>serve as a US delegate to<br>the United Nations
							</span>
						</div>
					</div>
				</div>	
				
				<div class="timeline-cell background-cover cell-20 flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1947_bg.png" ?>)" data-decade="1940">
					<div class="timeline-block flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1947</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								Eleanor begins work on<br>drafting the Declaration<br>of Human Rights
							</span>
						</div>
					</div>
				</dif>
				<div class="timeline-cell background-cover cell-20-A flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1947_bg.png" ?>)" data-decade="1950">
					<div class="timeline-block flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1952</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								Eleanor resigns from the<br>UN delegation after the<br>election of Republican<br>President Eisenhower
							</span>
						</div>
					</div>
				</div>	

				<div class="timeline-cell timeline-cell-double background-cover cell-21 flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1960_bg.png" ?>)" data-decade="1960">
					<div class="timeline-block-half  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1960</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								Eleanor meets with John F.<br>Kennedy at Val-Kill
							</span>
						</div>
					</div>
					<div class="timeline-block-half  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1961</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
							President Kennedy<br>reappoints Eleanor to the<br>UN and appoints her as<br>the first chairperson of the<br>President’s Commission<br>on the Status of Women
							</span>
						</div>
					</div>
				</div>

				<div class="timeline-cell background-cover cell-21 flex-container" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1962_bg.png" ?>)" data-decade="1960">
					<div class="timeline-block  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1962</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<strong>November 10</strong>—Eleanor dies<br>in NYC from disseminated<br>tuberculosis, aplastic anemia<br>and heart failure
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="cell navigation-decade-container padding-all cancel-padding-y">
			<div class="nav-container first-load">
				
			</div>
		</div>
	</div>
											
</main>

<?php get_footer(); ?>

