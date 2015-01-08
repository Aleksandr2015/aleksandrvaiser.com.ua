<?php
/*
Template Name: Контакты
*/
 get_header(); ?>

			<main class="content">
				<div class="main_content">
					<div class="contacts_left_block_box">					
						<div class="contact_phones">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact_page_phones') ); ?>
						
						</div>
						
						<div class="contact_form">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact_page_form') ); ?>
						</div>
					</div>
					
					<div class="contacts_right_block_box">
						<img src="<?php echo get_template_directory_uri();?>/images/contacts_banner.jpg" alt="Александр Вайсер, риелтор, контакты" title="Александр Вайсер, риелтор, контакты">
					</div>
					
				</div>				
			</main><!-- .content -->
			<?php get_footer(); ?>