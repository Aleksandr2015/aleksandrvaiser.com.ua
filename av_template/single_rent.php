<?php get_header(); ?>

			<main class="content">
				<div class="main_content single_page">
					<h3 class="single_title"><?php echo get_cat_name(5);?> / <?php the_title(); ?></h3>
										
					<div class="full_descriprion rent">
						<script src="<?php echo get_template_directory_uri();?>/inc/advanced_custom_fields_data/goole_map_api.js"></script>
						<script src="<?php echo get_template_directory_uri();?>/inc/advanced_custom_fields_data/render_map.js"></script>
						
						<?php $rent_map = get_field('rent_map');
							if( !empty($rent_map) ):
						?>
						<div class="acf-map">
							<div class="marker" data-lat="<?php echo $rent_map['lat']; ?>" data-lng="<?php echo $rent_map['lng']; ?>"></div>
						</div>
						<?php endif; ?>
						
						<p>Объект добавлен: <?php if (have_posts()) : while (have_posts()) : the_post(); the_date('m.d.Y'); endwhile; endif; ?>г.</p>				
						<p>Адрес: 
							<?php $r_address = get_field(rent_address); ?><?php if($r_address!="") { echo $r_address; } ?></p>
						<p>Этаж / этажность: 
							<?php $r_floor = get_field(rent_floor); ?><?php if($r_floor!="") { echo $r_floor; } ?></p>
						<p>Площадь, м<span="text_superscript">2</span>:
							<?php $r_area = get_field(rent_area); ?><?php if($r_area!="") { echo $r_area; } ?></p>
						<p>Кол-во комнат: 
							<?php $rno_rooms = get_field(rent_number_of_rooms); ?><?php if($rno_rooms!="") { echo $rno_rooms; } ?></p>
						<p>Тип аренды: 
							<?php $r_type = get_field(rent_type); ?><?php if($r_type!="") { echo $r_type; } ?></p>
						<p>Цена, грн/мес: 
							<?php $r_price = get_field(rent_price); ?><?php if($r_price!="") { echo $r_price; } ?></p>
					</div>
					
					<div class="full_content">
						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php the_content();?>						
						<?php endwhile; endif; ?>
					</div>

				</div>				
			</main><!-- .content -->
			<?php get_footer(); ?>