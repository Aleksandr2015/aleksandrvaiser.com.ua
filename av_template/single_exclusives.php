<?php get_header(); ?>

			<main class="content">
				<div class="main_content single_page">
					<h3 class="single_title"><?php echo get_cat_name(8);?> / <?php the_title(); ?></h3>
										
					<div class="full_descriprion exclusive">
						<script src="<?php echo get_template_directory_uri();?>/inc/advanced_custom_fields_data/goole_map_api.js"></script>
						<script src="<?php echo get_template_directory_uri();?>/inc/advanced_custom_fields_data/render_map.js"></script>
						
						<?php $exclusive_map = get_field('exclusive_map');
							if( !empty($exclusive_map) ):
						?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $exclusive_map['lat']; ?>" data-lng="<?php echo $exclusive_map['lng']; ?>"></div>
						</div>
						<?php endif; ?>
						
						<p>Объект добавлен: <?php if (have_posts()) : while (have_posts()) : the_post(); the_date('m.d.Y'); endwhile; endif; ?>г.</p>						
						<p>Адрес: 
							<?php $e_address = get_field(exclusive_address); ?><?php if($e_address!="") { echo $e_address; } ?></p>
						<p>Этаж / этажность: 
							<?php $e_floor = get_field(exclusive_floor); ?><?php if($e_floor!="") { echo $e_floor; } ?></p>
						<p>Площадь, м<span="text_superscript">2</span>:
							<?php $e_area = get_field(exclusive_area); ?><?php if($e_area!="") { echo $e_area; } ?></p>
						<p>Кол-во комнат: 
							<?php $eno_rooms = get_field(exclusive_number_of_rooms); ?><?php if($eno_rooms!="") { echo $eno_rooms; } ?></p>
						<p>Цена, $: 
							<?php $e_price = get_field(exclusive_price); ?><?php if($e_price!="") { echo $e_price; } ?></p>
					</div>
					
					<div class="full_content">
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php the_content();?>
						<?php endwhile; endif; ?>
					</div>

				</div>				
			</main><!-- .content -->
			<?php get_footer(); ?>