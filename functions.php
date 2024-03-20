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
    add_theme_support('post-thumbnails', array('post', 'news', 'blog', 'articles'));
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
  wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), null, true);
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


/**
 * РЕГИСТРАЦИЯ КАСТОМНЫХ ТИПОВ ЗАПИСЕЙ
 */
// Регистрация кастомного типа записей "Новости"
function custom_post_type_news() {
    $labels = array(
        'name'               => __('Новости'),
        'singular_name'      => __('Новость'),
        'menu_name'          => __('Новости'),
        'all_items'          => __('Все новости'),
        'add_new'            => __('Добавить новость'),
        'add_new_item'       => __('Добавить новую новость'),
        'edit_item'          => __('Редактировать новость'),
        'new_item'           => __('Новая новость'),
        'view_item'          => __('Просмотреть новость'),
        'search_items'       => __('Искать новость'),
        'not_found'          => __('Новости не найдены'),
        'not_found_in_trash' => __('Новости в корзине не найдены'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-megaphone', // Иконка в меню
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'news'),
    );

    register_post_type('news', $args);
}
add_action('init', 'custom_post_type_news');

// Регистрация кастомного типа записей "Блог"
function custom_post_type_blog() {
    $labels = array(
        'name'               => __('Блог'),
        'singular_name'      => __('Пост'),
        'menu_name'          => __('Блог'),
        'all_items'          => __('Все записи'),
        'add_new'            => __('Добавить запись'),
        'add_new_item'       => __('Добавить новую запись'),
        'edit_item'          => __('Редактировать запись'),
        'new_item'           => __('Новая запись'),
        'view_item'          => __('Просмотреть запись'),
        'search_items'       => __('Искать запись'),
        'not_found'          => __('Записи не найдены'),
        'not_found_in_trash' => __('Записи в корзине не найдены'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-admin-post', // Иконка в меню
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'blog'),
    );

    register_post_type('blog', $args);
}
add_action('init', 'custom_post_type_blog');

// Регистрация кастомного типа записей "Статьи"
function custom_post_type_articles() {
    $labels = array(
        'name'               => __('Статьи'),
        'singular_name'      => __('Статья'),
        'menu_name'          => __('Статьи'),
        'all_items'          => __('Все статьи'),
        'add_new'            => __('Добавить статью'),
        'add_new_item'       => __('Добавить новую статью'),
        'edit_item'          => __('Редактировать статью'),
        'new_item'           => __('Новая статья'),
        'view_item'          => __('Просмотреть статью'),
        'search_items'       => __('Искать статью'),
        'not_found'          => __('Статьи не найдены'),
        'not_found_in_trash' => __('Статьи в корзине не найдены'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-media-document', // Иконка в меню
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'             => array('slug' => 'articles'),
    );

    register_post_type('articles', $args);
}
add_action('init', 'custom_post_type_articles');


// AJAX ПОДГРУЗКА ПОСТОВ ДЛЯ ТИПА ПОСТОВ - NEWS
add_action('wp_ajax_load_more_posts_news', 'load_more_posts_news_callback');
add_action('wp_ajax_nopriv_load_more_posts_news', 'load_more_posts_news_callback');
function load_more_posts_news_callback() {
  $args = array(
    'post_type'      => 'news',
    'posts_per_page' => $_POST['posts_per_page'],
    'paged'          => $_POST['page']
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/ncard');
    }
    wp_reset_postdata();
  }
  wp_die();
}

// AJAX ПОДГРУЗКА ПОСТОВ ДЛЯ ТИПА ПОСТОВ - BLOG
add_action('wp_ajax_load_more_posts_blog', 'load_more_posts_blog_callback');
add_action('wp_ajax_nopriv_load_more_posts_blog', 'load_more_posts_blog_callback');
function load_more_posts_blog_callback() {
  $args = array(
    'post_type'      => 'blog',
    'posts_per_page' => $_POST['posts_per_page'],
    'paged'          => $_POST['page']
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/bcard');
    }
    wp_reset_postdata();
  }
  wp_die();
}

// AJAX ПОДГРУЗКА ПОСТОВ ДЛЯ ТИПА ПОСТОВ - ARTICLES
add_action('wp_ajax_load_more_posts_articles', 'load_more_posts_articles_callback');
add_action('wp_ajax_nopriv_load_more_posts_articles', 'load_more_posts_articles_callback');
function load_more_posts_articles_callback() {
  $args = array(
    'post_type'      => 'articles',
    'posts_per_page' => $_POST['posts_per_page'],
    'paged'          => $_POST['page']
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      get_template_part('template-parts/acard');
    }
    wp_reset_postdata();
  }
  wp_die();
}
