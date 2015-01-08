<?php


///Безопасность///

//Отключение сообщений об ошибках авторизации
add_filter('login_errors',create_function('$a', "return null;"));

//Скрытие версии WordPress
remove_action('wp_head','wp_generator');


//Удаление из верхней панели кнопки комментарии, обновления, новый контент
function my_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('updates');
	$wp_admin_bar->remove_menu('new-content');	
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

//Добавляем кнопки в HTML редактор
add_action('admin_footer', 'htm_eg_quicktags');
function htm_eg_quicktags(){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			if(typeof(QTags) !== 'undefined'){
				QTags.addButton( 'show-all-gallery-photo', 'Перейти к архиву', '<div class="show-all-gallery-photo"><a href="">Перейти к архиву</a></div>' );
				QTags.addButton( 'left-arrow', '&laquo;', '«');
			}
		});
	</script>
	<?php 
}

//Изменяем шрифт HTML редактора
function htm_change_editor_font(){
	echo "<style type='text/css'>
		#wp-content-editor-container textarea#content {
			font-family: Arial, Helvetica;
			font-size: 14px;
			color: #333333;
		}
	</style>";
}
add_action('admin_print_styles', 'htm_change_editor_font');

// CUSTOM ADMIN DASHBOARD HEADER LOGO
#function custom_admin_logo() {
#echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo_admin_dashboard.png) !important; }</style>';
#}
#add_action('admin_head', 'custom_admin_logo');


//Отключение вкладки комментарии
function remove_menus () {global $menu;$restricted = array(__('Comments'), __('Tools'))

;end ($menu);

while (prev($menu)){$value = explode(' ',$menu[key($menu)][0]);if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}}}

add_action('admin_menu', 'remove_menus');

// задаем поддержку миниатюр и автоматизируем вывод начало
	add_theme_support( 'post-thumbnails' ); 
	function get_post_thumbnail() {
	$files = get_children('post_parent='.get_the_ID().'&post_type=attachment&post_mime_type=image');
	if($files) :
	$keys = array_reverse(array_keys($files));
	$j=0;
	$num = $keys[$j];
	$image=wp_get_attachment_image($num, 'large', false);
	$imagepieces = explode('"', $image);
	$imagepath = $imagepieces[1];
	$thumb=wp_get_attachment_thumb_url($num);
	print $thumb;
	else:
	print "";
	endif;
	}
	add_action( 'after_setup_theme', 'twentyten_setup' );
 	if ( ! function_exists( 'twentyten_setup' ) ):
 	function twentyten_setup() {
    	add_theme_support( 'post-thumbnails' );
	}
	endif; 

//Добавляем поддержку нескольких меню второй способ
register_nav_menus(array(
    'navigation-top' => 'Главное меню',      // Первое меню
));


//Добавление кнопки поместить запись в корзину в админ баре
#    function fb_add_admin_bar_trash_menu() {
#    global $wp_admin_bar;
#    if ( !is_super_admin() || !is_admin_bar_showing() )
#    return;
#    $current_object = get_queried_object();
#    if ( empty($current_object) )
#    return;
#    if ( !empty( $current_object->post_type ) &&
#    ( $post_type_object = get_post_type_object( $current_object->post_type ) ) &&
#    current_user_can( $post_type_object->cap->edit_post, $current_object->ID )
#    ) {
#    $wp_admin_bar->add_menu(
#    array( 'id' => 'delete',
#    'title' => __('Удалить в корзину'),
#    'href' => get_delete_post_link($current_object->term_id)
#    )
#    );
#   }
#    }
#    add_action( 'admin_bar_menu', 'fb_add_admin_bar_trash_menu', 35 );

//Отображаем миниатюры записей.
    if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
    // for post and page
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );
    function fb_AddThumbColumn($cols) {
    $cols['thumbnail'] = __('Thumbnail');
    return $cols;
    }
    function fb_AddThumbValue($column_name, $post_id) {
    $width = (int) 35;
    $height = (int) 35;
    if ( 'thumbnail' == $column_name ) {
    // thumbnail of WP 2.9
    $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
    // image from gallery
    $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
    if ($thumbnail_id)
    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
    elseif ($attachments) {
    foreach ( $attachments as $attachment_id => $attachment ) {
    $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
    }
    }
    if ( isset($thumb) && $thumb ) {
    echo $thumb;
    } else {
    echo __('None');
    }
    }
    }
    // for posts
    add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
    // for pages
    add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
    add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
    }


//Запретить размещение обратных ссылок, указывающих на свой блог
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

//Удаляем имя админа из CSS-классов в комментариях
function remove_comment_author_class( $classes ) {
	foreach( $classes as $key => $class ) {
		if(strstr($class, "comment-author-")) {
			unset( $classes[$key] );
		}
	}
	return $classes;
}
add_filter( 'comment_class' , 'remove_comment_author_class' );


//Фикс появления пустого параграфа <p></p>
add_filter('the_content', 'shortcode_empty_paragraph_fix');

function shortcode_empty_paragraph_fix($content)
{   
	$array = array (
		'<p>[' => '[', 
		']</p>' => ']', 
		']<br />' => ']'
	);

	$content = strtr($content, $array);
	$content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );
	
	return $content;
}

/* Добавление областей виджетов*/
if ( function_exists('register_sidebar') ) {
  register_sidebar(array(    
	'name' => __( 'Заявка Купить' ),
	'id' => 'property_buy',
	'description' => __( 'Отображается на главной странице в табе с закладкой "КУПИТЬ". В шабоне выводится ключом property_buy' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_buy') ); ?> 
*/
  
  register_sidebar(array(    
	'name' => __( 'Заявка Продать' ),
	'id' => 'property_sell',
	'description' => __( 'Отображается на главной странице в табе с закладкой "ПРОДАТЬ". В шабоне выводится ключом property_sell' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_sell') ); ?>
*/

  register_sidebar(array(    
	'name' => __( 'Заявка Сдать в аренду' ),
	'id' => 'property_rent',
	'description' => __( 'Отображается на главной странице в табе с закладкой "СДАТЬ В АРЕНДУ". В шабоне выводится ключом property_rent' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_rent') ); ?>
*/

	register_sidebar(array(    
	'name' => __( 'Заявка Арендовать' ),
	'id' => 'property_tenant',
	'description' => __( 'Отображается на главной странице в табе с закладкой "АРЕНДОВАТЬ". В шабоне выводится ключом property_tenant' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('property_tenant') ); ?>
*/

  register_sidebar(array(    
	'name' => __( 'Задать вопрос' ),
	'id' => 'question_button',
	'description' => __( 'Модальное окно. Отображается на всех страницах при нажатии на кнопку "Задать вопрос". В шабоне выводится ключом question_button' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('question_button') ); ?>
*/

  register_sidebar(array(    
	'name' => __( 'Услуги' ),
	'id' => 'av_services',
	'description' => __( 'Отображается на главной странице справа от блоков "Я хочу". В шабоне выводится ключом av_services' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('av_services') ); ?>
*/

	register_sidebar(array(    
	'name' => __( 'ФОС на главной странице' ),
	'id' => 'contact_me',
	'description' => __( 'Отображается на главной странице справа от блоков "Я хочу" Под блоком Услуги. В шабоне выводится ключом contact_me' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact_me') ); ?>
*/

  register_sidebar(array(    
	'name' => __( 'Кнтакты: Блок телефоны' ),
	'id' => 'contact_page_phones',
	'description' => __( 'Отображается на странице контакты. В шабоне выводится ключом contact_page_phones' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact_page_phones') ); ?>
*/

  register_sidebar(array(    
	'name' => __( 'Кнтакты: Блок ФОС' ),
	'id' => 'contact_page_form',
	'description' => __( 'Отображается на странице контакты. В шабоне выводится ключом contact_page_form' ),
	'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
/*В шаблоне выводится кодом: 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('contact_page_form') ); ?>
*/

}

/* Свой стиль визуального редактора */
add_editor_style();
	
?>