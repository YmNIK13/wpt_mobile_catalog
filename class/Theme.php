<?php

namespace MobileCategory;

class Theme {

    static private $page_category;
    static private $slug_category;

    /** @var Mobile */
    static private $mobile;

    static private $rest_method;


    public static function getMobile() {
        return self::$mobile;
    }

    protected static $_instance = NULL;

    final private function __construct() {
    }

    final private function __clone() {
    }

    /** Returns new or existing Singleton instance
     * @return Theme
     */
    final public static function start() {
        if (null !== static::$_instance) {
            return static::$_instance;
        }
        static::$_instance = new static();


        self::_initObject();


        self::$slug_category = "mobiles";
        // Текущая страница если есть
        self::$page_category = get_page_by_path(self::$slug_category, OBJECT, 'page');


        // добавляем свой путь
        add_action('init', array(self::class, 'add_route_path'));
        // Подключаем наш шаблон
        add_filter('template_include', array(self::class, 'register_template'));

        // регистрируем REST
        add_action('rest_api_init', array(self::class, 'registerREST'));


        // Включаем миниатюры
        add_theme_support('post-thumbnails', array('post', 'mobile'));
        // регистрация меню
        register_nav_menus(array('top' => 'Верхнее меню',));
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
        add_action('ajax_request_filter_mobile', array(self::class, 'ajax_filter'), 10, 1);

        return static::$_instance;
    }

    static private function _initObject() {
        self::_autoloadClass();
        self::$mobile = new Mobile();

        // Добавляем скрипты и стили
        SheetsScripts::init(true);
        // Регаем наши AJAX
        AJAXRequest::init();

        self::$rest_method = RESTMethod::init(self::$mobile);
    }

    static private function _autoloadClass() {
        spl_autoload_register(function ($name_class_all) {
            $name_class_mas = explode('\\', $name_class_all);
            $name_class = end($name_class_mas);

            $path_class = realpath(get_template_directory() . "/class/" . $name_class . ".php");

            if (file_exists($path_class)) {
                require_once $path_class;
            }
        });
    }

    static public function add_route_path() {
        // Правило перезаписи
        add_rewrite_rule('^(' . self::$slug_category . ')(/page/([0-9]+))?/?', 'index.php?pagename=$matches[1]&paged=$matches[3]', 'top');

        // скажем WP, что есть новые параметры запроса
        add_filter('query_vars', function ($vars) {
            $vars[] = 'pagename';
            $vars[] = 'paged';
            return $vars;
        });
    }

    /** Цепляем свой шаблон
     * @param $template - текущий шаблон
     * @return string - подмененный шаблон если соответвует типу записи
     */
    static public function register_template($template) {
        if (get_query_var('pagename') == self::$slug_category) {
            global $wp_query;
            $wp_query->is_404 = false;
            $template = get_template_directory() . '/mobiles.php';
        }
        return $template;
    }

    static public function ajax_filter($value) {
        $params = array();
        parse_str($_REQUEST['filter'], $params);

        $value = array_merge($value, array(
            'data' => self::$mobile->filterMobilesJson($params),
        ));
        return $value;
    }


    static public function registerREST() {

        register_rest_route('mobile-category/v1', '/ajax-filter/', array(
            'methods' => 'POST',                                    // метод запроса: GET, POST ...
            'callback' => array(RESTMethod::class, 'postFilter'),   // функция обработки запроса. Должна вернуть ответ на запрос
                        // функция проверки доступа к маршруту. Должна вернуть true/false
                        // описание передаваемых параметров
            'permission_callback' => array(RESTMethod::class, 'permission'),

        ));
    }

}