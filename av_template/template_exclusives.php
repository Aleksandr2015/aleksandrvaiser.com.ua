<?php
/*
Template Name: Эксклюзивы
*/
 get_header(); ?>

			<main class="content">
				<div class="main_content exclusives_page">
					<?php // Отображение записей на любой странице
					$temp = $wp_query; $wp_query= null;
					$wp_query = new WP_Query(); $wp_query->query('cat=8&caller_get_posts=1' . '&paged='.$paged);
					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="exclusives_item">
						<?php echo get_the_post_thumbnail($id, array(274,170)); ?>
						<h3><?php the_title(); ?></h3>	
						<p class="cat_price_block">
							<span class="category_price_name">Цена: </span>
							<span class="category_price"><?php $e_price = get_field(exclusive_price); ?><?php if($e_price!="") { echo $e_price; } ?></span>
						</p>
						
						<a class="cat_item_more_link" href="<?php the_permalink() ?>">Подробное описание</a>
					</div>
					
					<?php endwhile; ?>
						<div class="clearfix"></div>
						<?php wp_pagenavi(); ?>						
					<?php wp_reset_postdata(); ?>
				</div>
			</main><!-- .content -->
			<?php get_footer(); ?>