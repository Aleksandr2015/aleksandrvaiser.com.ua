<?php
/*
Template Name: Главная
*/
 get_header(); ?>

			<main class="content">				
				
				<!-- Homepage Sliders / Start -->			
<!--
				<div class="main_sliders">
					<div id="slider_exclusives" class="slider_wrap exclusives">
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/exclusive_01.jpg" alt="Эксклюзив 1" />
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/exclusive_02.jpg" alt="Эксклюзив 2" />
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/exclusive_03.jpg" alt="Эксклюзив 3" />
					<a class="main_sliders_link" href="/exclusives.html">Эксклюзивы</a>
					</div>
					
					<div id="slider_sell" class="slider_wrap sell">
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/sell_01.jpg" alt="Продажа 1" />
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/sell_02.jpg" alt="Продажа 2" />
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/sell_03.jpg" alt="Продажа 3" />
					<a class="main_sliders_link" href="/sell.html">Продажа</a>
					</div>
					
					<div id="slider_rent" class="slider_wrap rent">
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/rent_01.jpg" alt="Аренда 1" />
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/rent_02.jpg" alt="Аренда 2" />
						<img src="<?php echo get_template_directory_uri();?>/inc/main_sliders/rent_03.jpg" alt="Аренда 3" />
					<a class="main_sliders_link" href="/rent.html">Аренда</a>
					</div>				
				</div>
				<div class="clearfix"></div>								
-->
				<!-- Homepage Sliders / End -->
				
				<!-- Homepage Services / Start -->
				<div class="main_left_block_box">				
					<div class="av_services">	
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('av_services') ); ?>
					</div>					
					<div class="contact_me">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact_me') ); ?>
					</div>
				</div>
				<!-- Homepage Services / End -->
				
				<!-- Homepage Tabs / Start -->
				<div class="request_tabs_container">
				
					<ul class="tabs">
						<li class="request_question">Я ХОЧУ:</li>
						<li class="request_tabs"><a rel="nofollow" href="#buy">КУПИТЬ</a></li>
						<li class="request_tabs"><a rel="nofollow" href="#sell">ПРОДАТЬ</a></li>
						<li class="request_tabs"><a rel="nofollow" href="#rent">СДАТЬ В АРЕНДУ</a></li>
						<li class="request_tabs"><a rel="nofollow" href="#tenant">АРЕНДОВАТЬ</a></li>
					</ul>

					<div class="tab_container">

						<div id="buy" class="tab_content">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_buy') ); ?>
						</div>

						<div id="sell" class="tab_content">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_sell') ); ?>
						</div>

						<div id="rent" class="tab_content">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_rent') ); ?>
						</div>
						
						<div id="tenant" class="tab_content">
						  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_tenant') ); ?>
						</div>

					</div>
				
				</div> <!-- .request_tabs_container -->
				<!-- Homepage Tabs / End -->
				
				<div class="clearfix"></div>								
			</main><!-- .content -->
			<?php get_footer(); ?>