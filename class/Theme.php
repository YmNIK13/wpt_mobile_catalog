<?php

namespace MobileCategory;

class Theme {

    private $page_category;
    private $slug_category;


    public function __construct() {
        $this->_initObject();


        $this->slug_category = "mobiles";
        // Текущая страница если есть
        $this->page_category = get_page_by_path($this->slug_category, OBJECT, 'page');


        // добавляем свой путь
        add_action('init', array($this, 'add_route_path'));
        // Подключаем наш шаблон
        add_filter('template_include', array($this, 'register_template'));


        // Включаем миниатюры
        add_theme_support('post-thumbnails', array('post', 'mobile'));
        // регистрация меню
        register_nav_menus(array( 'top' => 'Верхнее меню', ));
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
        add_action('widgets_init', function () {
            register_widget(FilterWidget::class);
        });



        // Мой ajax
        add_action('ajax_request_filter', 'ajax_filter');


    }

    private function _initObject(){
        $this->_autoloadClass();

        $mobile = new Mobile();
        $style_script = new SheetsScripts(true);

        // Регаем наши AJAX
        AJAXRequest::init();
    }


    private function _autoloadClass() {
        spl_autoload_register(function ($name_class_all) {
            $name_class_mas = explode('\\', $name_class_all);
            $name_class = end($name_class_mas);

            $path_class = realpath(get_template_directory() . "/class/" . $name_class . ".php");

            if (file_exists($path_class)) {
                require_once $path_class;
            }
        });
    }


    public function add_route_path() {
        $page_test = !empty($this->page_category);

        // Правило перезаписи
        add_rewrite_rule('^(' . $this->slug_category . ')(/page/([0-9]+))?/?', 'index.php?pagename=$matches[1]&paged=$matches[3]', 'top');

        // скажем WP, что есть новые параметры запроса
        add_filter('query_vars', function ($vars) use ($page_test) {
            $vars[] = 'pagename';
            $vars[] = 'paged';
            $vars[] = 'ajax-filter';
            return $vars;
        });
    }

    /** Цепляем свой шаблон
     * @param $template - текущий шаблон
     * @return string - подмененный шаблон если соответвует типу записи
     */
    function register_template($template) {
        if (get_query_var('pagename') == $this->slug_category) {
            global $wp_query;
            $wp_query->is_404 = false;
            $template = get_template_directory() . '/mobiles.php';
        }
        return $template;
    }

    function ajax_filter() {
        return json_encode(array(
            'success' => true,
            'data' => $_POST,
        ));
    }


}