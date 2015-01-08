<?php
/*
Template Name: Аренда
*/
 get_header(); ?>

			<main class="content">
				<div class="main_content rent_page">
					<?php // Отображение записей на любой странице
					$temp = $wp_query; $wp_query= null;
					$wp_query = new WP_Query(); $wp_query->query('cat=5&caller_get_posts=1' . '&paged='.$paged);
					while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="rent_item"> 						
						<?php echo get_the_post_thumbnail($id, array(274,170)); ?>
						<h3><?php the_title(); ?></h3>
						<p class="cat_price_block">
							<span class="category_price_name">Цена: </span>
							<span class="category_price"><?php $r_price = get_field(rent_price); ?><?php if($r_price!="") { echo $r_price; } ?></span>
							<span class="category_currency">грн / мес.</span>
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