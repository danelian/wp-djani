<?php 

require_once(__DIR__ . '/includes/wp_svg.php');
require_once(__DIR__ . '/includes/wp_breadcrumbs.php');

/**
 * ДОБАВЛЕНИЕ ВОЗМОЖНОСТЕЙ
 */
if (!function_exists('danelian_setup')) {
  function danelian_setup() {
    // Добавляем динамический <title>
    add_theme_support('title-tag');
    // Добавление html5
    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption',
      'script',
      'style',
    ));
    // Добавление миниатюр для постов
    add_theme_support('post-thumbnails', array('post'));
  }
  add_action('after_setup_theme', 'danelian_setup');
}


/**
 * ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ
 */
function danelian_scripts() {
  // STYLES
  // Main style
  wp_enqueue_style('main', get_template_directory_uri());
  // App style
  wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/style.css');

  // SCRIPTS
  // Jquery
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.4.1.js', array(), null, true);
  wp_enqueue_script('jquery');
  // App js
  wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery', 'swiper'), null, true);
}
add_action('wp_enqueue_scripts', 'danelian_scripts');


/**
 * РЕГИСТРАЦИЯ ОБЛАСТЕЙ МЕНЮ
 */
function danelian_menus()
{
	$locations = array(
		'header' => 'Header Menu',
		'footer' => 'Footer Menu',
	);
	register_nav_menus($locations);
}
add_action('init', 'danelian_menus');


/**
 * ОТКЛЮЧАЕМ СОЗДАНИЕ МИНИАТЮР ФАЙЛОВ ДЛЯ УКАЗАННЫХ РАЗМЕРОВ
 */
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'1536x1536',
		'2048x2048',
	] );
}