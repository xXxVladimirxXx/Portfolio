<?php

add_action ('wp_enqueue_scripts', 'portfolio_scripts_and_style');
function portfolio_scripts_and_style() {

    //Подключаем скрипты

    wp_enqueue_script('jquery.min', get_template_directory_uri() . '/vendor/jquery.min.js');
    wp_enqueue_script('jquery-migrate.min', get_template_directory_uri() . '/vendor/jquery-migrate.min.js');
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js');

    wp_enqueue_script('jquery.easing', get_template_directory_uri() . '/vendor/jquery.easing.js');
    wp_enqueue_script('jquery.back-to-top', get_template_directory_uri() . '/vendor/jquery.back-to-top.js');
    wp_enqueue_script('jquery.smooth-scroll', get_template_directory_uri() . '/vendor/jquery.smooth-scroll.js');
    wp_enqueue_script('jquery.wow.min', get_template_directory_uri() . '/vendor/jquery.wow.min.js');
    wp_enqueue_script('swiper.jquery.min', get_template_directory_uri() . '/vendor/swiper/js/swiper.jquery.min.js');
    wp_enqueue_script('jquery.masonry.pkgd.min', get_template_directory_uri() . '/vendor/masonry/jquery.masonry.pkgd.min.js');
    wp_enqueue_script('imagesloaded.pkgd.min', get_template_directory_uri() . '/vendor/masonry/imagesloaded.pkgd.min.js');

    wp_enqueue_script('layout.min', get_template_directory_uri() . '/js/layout.min.js');
    wp_enqueue_script('wow.min', get_template_directory_uri() . '/js/components/wow.min.js');
    wp_enqueue_script('swiper.min', get_template_directory_uri() . '/js/components/swiper.min.js');
    wp_enqueue_script('masonry.min', get_template_directory_uri() . '/js/components/masonry.min.js');
    wp_enqueue_script('gmap.min', get_template_directory_uri() . '/js/components/gmap.min.js');

    //Подключаем стили

    wp_enqueue_style('portfolio-style', get_stylesheet_uri() );
    wp_enqueue_style('simple-line-icons.min', get_template_directory_uri() . '/vendor/simple-line-icons/simple-line-icons.min.css');
    wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('swiper.min', get_template_directory_uri() . '/vendor/swiper/css/swiper.min.css');
    wp_enqueue_style('layout.min', get_template_directory_uri() . '/css/layout.min.css');
}

/** Пагинация **/
function wp_corenavi() {
    global $wp_query;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '«'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = '»'; //текст ссылки "Следующая страница"
    echo $pages . paginate_links($a);
}

add_action ('after_setup_theme', 'portfolio_theme_seting');
function portfolio_theme_seting() {

    //Миниатюра
    add_theme_support('post-thumbnails');

    //Меню
    register_nav_menu('menu', 'Меню в шапке');

    register_nav_menu('footer-menu', 'Меню в подвале');
}

                /** Изменяет основные параметры меню в шапке **/

add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args( $args ) {
    if ( $args['theme_location'] === 'menu' ) {
        $args['container']  = false;
        $args['items_wrap'] = '<ul class="navbar-nav navbar-nav-right">%3$s</ul>';
    }
    return $args;
}

// Изменяем атрибут class у тега li
add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );
function filter_nav_menu_css_classes( $classes, $item, $args, $depth ) {
    if ( $args->theme_location === 'menu' ) {
        $classes = [
            'nav-item'
        ];
        if ( $item->current ) {
            $classes[] = ' active';
        }
    }
    return $classes;
}

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    if ( $args->theme_location === 'menu' ) {
        $atts['class'] = 'nav-item-child nav-item-hover';
        if ( $item->current ) {
            $atts['class'] .= ' active';
        }
    }
    return $atts;
}


            /** Изменяет основные параметры меню в футыре **/

add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args_footer' );
function filter_wp_menu_args_footer( $args ) {
    if ( $args['theme_location'] === 'footer-menu' ) {
        $args['container']  = false;
        $args['items_wrap'] = '<ul class="list-unstyled footer-list">%3$s</ul>';
    }
    return $args;
}

// Изменяем атрибут class у тега li
add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes_footer', 10, 4 );
function filter_nav_menu_css_classes_footer( $classes, $item, $args, $depth ) {
    if ( $args->theme_location === 'footer-menu' ) {
        $classes = [
            'footer-list-item'
        ];
    }
    return $classes;
}

// Добавляем классы ссылкам
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes_footer', 10, 4 );
function filter_nav_menu_link_attributes_footer( $atts, $item, $args, $depth ) {
    if ( $args->theme_location === 'footer-menu' ) {
        $atts['class'] = 'footer-list-link';
    }
    return $atts;
}

/** Кастомные типы записей */

add_action('init', 'portfolio_register_post_types');

function portfolio_register_post_types(){

    include ( get_template_directory() . '/layouts/advantages.php');

    include ( get_template_directory() . '/layouts/employees.php');

    include ( get_template_directory() . '/layouts/service.php');

    include ( get_template_directory() . '/layouts/slider.php');

    include ( get_template_directory() . '/layouts/works.php');

}

add_action('admin_menu', function(){
    add_menu_page( 'Дополнительные настройки сайта', 'Доп. настройки', 'manage_options', 'add-my-setting.php', 'my_save', '', 79);
} );

// функция отвечает за вывод страницы настроек
// подробнее смотрите API Настроек: http://wp-kama.ru/id_3773/api-optsiy-nastroek.html
include ( get_template_directory() . '/layouts/add-my-setting.php');


//Миниатюра
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

add_image_size('img_our_works', 360, 240, true );

add_image_size('img_top', 1903, 500, true );

add_image_size('img_slider', 1920, 1080, true );

add_image_size('img_employees', 360, 402, true );



add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-ancestor', $classes) ){
        $classes[] = ' active current-menu-item';
    }
    return $classes;
}