<?php
	/*
	Template Name: Learn Timeline
	*/
?>

<?php get_header();?>

<main class="border-side">
	
	<div class="grid-x pos-relative border-top">
		<div class="cell navigation-decade-container padding-all cancel-padding-y border-bottom">
			<div class="nav-container first-load">
				
			</div>
		</div>
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
								<strong>January 30</strong>—Franklin Roosevelt (FDR) was born at Hyde Park
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
								<strong>October 11</strong>—Eleanor Roosevelt (ER) was born in New York City
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
								<strong>March 17</strong>—Franklin and Eleanor are married
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
								Franklin was elected to New York State Senate
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
								Eleanor attends her first Democratic Party Convention
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
								<strong>April</strong>—Franklin was appointed as Assistant Secretary of the Navy
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
								Eleanor works with the Red Cross, the Navy Department to help American Servicemen in WWI
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
									Franklin is nominated for Vice President on ticket with James N. Cox, but lost to Coolidge and Harding
								</span>
							</div>
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								Eleanor joins League of Women Voters and works for womens’ political gains following the successful movement
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
								<strong>August</strong>—Franklin is stricken with poliomyelitis at Campobello, New Brunswick, Canada
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
								Eleanor writes <span class="font-heading-italic">“Why I Am a Democrat,”</span>crystallizing her ideals and commitment to the Democratic Party
							</span>
						</div>
					</div>
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">1927</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								Franklin founded the Georgia Warm Springs Foundation therapy center for the treatment of polio victims
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
								<strong>November 6</strong>—Franklin was elected as Governor of New York
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
								<strong>November 8</strong>—Franklin was elected as President
							</span>
						</div>
					</div>
				</div>						

				<div class="timeline-cell background-cover cell-13" style="background-image:url(<?php print TEMPLATE_IMAGE_PATH."/1932_2_bg.png" ?>)" data-decade="1930">
					<div class="timeline-block flex-container ">
						<div class="text-container border-top text-container-bottom">
							<span class="quote-text color-white">
								Eleanor states that the country should not expect the new First Lady to be a symbol of elegance but rather, “plain, ordinary Mrs. Roosevelt.”
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
									<strong>March 4</strong>—Franklin was inaugurated as 32nd President
								</span>
							</div>
							<img src="<?php print TEMPLATE_IMAGE_PATH."/1933_img.png"?>" class="img">
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
								<strong>March 6</strong>—Eleanor becomes the 1st First Lady to hold a press conference where only female reporters are admitted
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
								<strong>June 16</strong>—Franklin signs the National Industrial Recovery Act, part of his “New Deal” platform
							</span>
						</div>
					</div>
					<div class="timeline-block-half">
						<div class="year-container">
							<span class="h2-style color-white">1936</span> 
						</div>
						<div class="text-container">
							<span class="quote-text color-white">
								<strong>November 3</strong>—Franklin was Reelected as President
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
								<strong>November 5</strong>—Franklin was reelected as President
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
						<div class="text-container flex-container">
							<span class="quote-text color-white" style="width: 48%">
								<strong>December 8</strong>—U.S. declares war on Japan
								<br><br>
								<strong>December 11</strong>—U.S. declares war on Germany 
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
								<strong>January 6</strong>—Franklin Gives State of the Union speech popularly known as the <span class="font-heading-italic"><strong>“Four Freedoms”</strong></span>
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
							<div class="text-container flex-container">
								<span class="quote-text color-white" style="width: 48%">
									<strong>April 12</strong>—Franklin died in Warm Springs, Georgia<br>
									<br>
									<strong>April 15</strong>—Franklin buried in Hyde Park, New York
								</span>
							</div>
						</div>
						<div class="text-container flex-container align-justify text-container-bottom">
							<span class="quote-text color-white" style="width: 48%">
								Regarding Franklin’s death, Eleanor says “ The story is over,” and returns to private life at her beloved Val-Kill cottage in Hyde Park
							</span>
							<span class="quote-text color-white" style="width: 48%">
								Eleanor accepts President Harry Truman’s offer to serve as a US delegate to the United Nations
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
								Eleanor begins work on drafting the Declaration of Human Rights
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
								Eleanor resigns from the UN delegation after the election of Republican President Eisenhower
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
								Eleanor meets with John F. Kennedy at Val-Kill
							</span>
						</div>
					</div>
					<div class="timeline-block-half  flex-container align-justify">
						<div class="year-container">
							<span class="h2-style color-white">1961</span> 
						</div>
						<div class="text-container text-container-bottom">
							<span class="quote-text color-white">
							President Kennedy reappoints Eleanor to the UN and appoints her as the first chairperson of the President’s Commission on the Status of Women
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
								<strong>November 10</strong>—Eleanor dies in NYC from disseminated tuberculosis, aplastic anemia and heart failure
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
											
</main>

<?php get_footer(); ?>

