<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>		
		<meta charset="<?php bloginfo('charset');?>">
		<title><?php the_title(); ?> | Александр Вайсер | Риелтор | Услуги риелтора Днепропетровск</title>
		<meta name='yandex-verification' content='61f41ac207e68ed2' />
		<meta name="description" content ="Услуги риелтора по продаже и аренде недвижимости в Днепорпетровске. Контактные телефоны: +38 (096) 755 69 16, +38 (063) 592 92 85"/>
		<meta name="keywords" content="квартиры днепропетровск, снять квартиру днепропетровск, купить квартиру днепропетровск, недвижимость днепропетровск, аренда квартир днепропетровск, продажа квартир днепропетровск, сдать квартиру днепропетровск, продать квартиру днепропетровск"/>
		<!--Main Styles-->
		<link href="<?php echo get_template_directory_uri();?>/style.css" rel="stylesheet" media="screen"  type="text/css" />
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		
		<!-- Homepage Sliders Styles and Scripts Just For Homepage Template -->
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/inc/main_sliders/style_main_sliders.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/inc/main_sliders/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/inc/main_sliders/main_sliders_script.js"></script>
		
		<!-- Homepage Tabs Styles and Scripts (used jQuery library from "Homepage Sliders" upper) -->
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/inc/main_tabs/tabs_styles.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/inc/main_tabs/tabs_script.js"></script>
		
		<!-- Modal Button Ask Question Styles and Script (display on all pages) -->
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri();?>/inc/modal_cf/modal_cf_styles.css" />
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/inc/modal_cf/modal_cf_script.js"></script>

		<!-- nice scroll -->
		<script src="<?php echo get_template_directory_uri();?>/js/nicescroll/jquery.nicescroll.min.js"></script>
		<script>
			$(document).ready(
				function() {
					$("body").niceScroll();
				}
				);		
		</script>
		<noscript>
			<style>
				html, body {
					overflow:visible;
				}
			</style>
		</noscript>		
		<?php wp_head();?>
	</head>
	<body <?php body_class(); ?>>
		
		<?php include (TEMPLATEPATH . '/social_buttons.php'); ?>
		
		<div id="boxes">
				<div id="dialog" class="window">
					<a rel="nofollow" href="#" class="close"/>Закрыть</a>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('question_button') ); ?> <br />
				</div>
			<div id="mask"></div>
		</div>
		
		<div class="wrapper">

			<header class="header">
				<a href="<?php bloginfo('url');?>">
					<h1>Александр Вайсер</h1>
					<span class="slogan">Ваш надежный партнер на рынке недвижимости</span>
				</a>
				
				<div class="question_button">
					<a rel="nofollow" href="#dialog" name="modal">Задать вопрос</a>					
				</div>
				
				<div class="h_phones">
					<span class="header_phones">+38 (096) 755 69 16</span><br />
					<span class="header_phones">+38 (063) 592 92 85</span>
				</div>
				
				<div class="header_share">
					<script type="text/javascript" src="//yandex.st/share/share.js"charset="utf-8"></script>
					<div class="header_share_text">Порекомендовать:</div>
					<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,gplus" data-yashareTheme="counter"></div>
				</div>
			</header><!-- .header-->
			
			<nav>
				<?php wp_nav_menu(array(
					'menu_id'=>'menu',
					'menu_class'=>'navigation',
					'container'=>'',
					'depth'=>'0',
					'theme_location'=>'navigation-top',		
					))
				?>
			</nav>