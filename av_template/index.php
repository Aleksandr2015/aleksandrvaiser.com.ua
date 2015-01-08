<?php get_header(); ?>

			<main class="content">
				<div class="main_content">
					<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
				</div>				
			</main><!-- .content -->
			<?php get_footer(); ?>