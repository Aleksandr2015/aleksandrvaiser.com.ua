<?php get_header(); ?>

			<main class="content">
				<div class="main_content single_page">
					<h3 class="single_title"><?php echo get_cat_name(1);?> / <?php the_title(); ?></h3>
										
					<div class="full_descriprion sell">
						<script src="<?php echo get_template_directory_uri();?>/inc/advanced_custom_fields_data/goole_map_api.js"></script>
						<script src="<?php echo get_template_directory_uri();?>/inc/advanced_custom_fields_data/render_map.js"></script>
						
						<?php $sell_map = get_field('sell_map');
							if( !empty($sell_map) ):
						?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $sell_map['lat']; ?>" data-lng="<?php echo $sell_map['lng']; ?>"></div>
						</div>
						<?php endif; ?>
						
						<p>Объект добавлен: <?php if (have_posts()) : while (have_posts()) : the_post(); the_date('m.d.Y'); endwhile; endif; ?>г.</p>
						<p>Адрес: 
							<?php $s_address = get_field(sell_address); ?><?php if($s_address!="") { echo $s_address; } ?></p>
						<p>Этаж / этажность: 
							<?php $s_floor = get_field(sell_floor); ?><?php if($s_floor!="") { echo $s_floor; } ?></p>
						<p>Площадь, м<span="text_superscript">2</span>:
							<?php $s_area = get_field(sell_area); ?><?php if($s_area!="") { echo $s_area; } ?></p>
						<p>Кол-во комнат: 
							<?php $sno_rooms = get_field(sell_number_of_rooms); ?><?php if($sno_rooms!="") { echo $sno_rooms; } ?></p>
						<p>Цена, $: 
							<?php $s_price = get_field(sell_price); ?><?php if($s_price!="") { echo $s_price; } ?></p>
					</div>
					
					<div class="full_content">
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php the_content();?>						
						<?php endwhile; endif; ?>
					</div>

				</div>				
			</main><!-- .content -->
			<?php get_footer(); ?>