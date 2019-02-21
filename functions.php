<?php

require_once get_template_directory() . "/class/Theme.php";

$theme = new MobileCategory\Theme();

// регистрация меню
register_nav_menus(array(
    'top' => 'Верхнее меню',    //Название месторасположения меню в шаблоне
    'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));


// регистрация сайдбара
register_sidebar(array(
    'name' => __('Sidebar', 'wpt_mobile_catalog'),
    'id' => 'sidebar-area',
    'description' => __('Sidebar', 'wpt_mobile_catalog'),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));


// Регистрация класса виджета
add_action('widgets_init', 'my_register_widgets');
function my_register_widgets() {
    register_widget(MobileCategory\FilterWidget::class);
}


// Мой ajax
add_action('ajax_request_filter', 'ajax_filter');
function ajax_filter() {
    return json_encode(array(
        'success' => true,
        'data' => $_POST,
    ));
}

