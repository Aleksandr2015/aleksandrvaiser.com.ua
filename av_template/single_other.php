<?php get_header(); ?>

			<main class="content">
				<div class="main_content single_page">
					<h3 class="single_title"><?php the_title(); ?></h3>

					<div class="full_content">
						<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
					</div>

				</div>				
			</main><!-- .content -->
			<?php get_footer(); ?>