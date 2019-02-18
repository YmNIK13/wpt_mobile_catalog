<?php

namespace MobileCategory;


abstract class EntityWP {

    abstract function registerType();
    abstract function registerFields();

    abstract function addQueryVars($vars);
    abstract function addRewriteRules($rules);

    public function __construct() {
        // Регистрируем новый тип данных
        add_action('init', array($this, 'registerType'));

        // подключаем функцию активации мета блока (registerFields)
        add_action('add_meta_boxes', array($this, 'registerFields'), 1);

        // Добавляем GET-параметры и прописываем путь
        add_filter('query_vars', array(&$this, 'addQueryVars'));
        add_filter('rewrite_rules_array', array(&$this, 'addRewriteRules'));
    }

    /** Создаем новый тип записи
     * @param $title - название
     * @param $internalname - сокращение в ЧПУ
     * @param null $ar - параметры */
    protected function createPostType($title, $internalname, $ar = null) {

        if (empty($ar['public'])) {
            $public = true;
        } else {
            $public = false;
        }

        if (empty($ar['supports'])) {
            $arr = array('title', 'editor', 'thumbnail', 'excerpt');
        } else {
            $arr = $ar['supports'];
        }
        //// 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'


        $labels = array(
            'name' => _x($title, 'post type general name', 'your_text_domain'),
            'singular_name' => _x($title, 'post type singular name', 'your_text_domain'),
            'add_new' => _x('Добавить', 'your_text_domain'),
            'add_new_item' => __('Добавить', 'your_text_domain'),
            'edit_item' => __('Редактировать', 'your_text_domain'),
            'new_item' => __('Новая', 'your_text_domain'),
            'all_items' => __($title, 'your_text_domain'),
            'view_item' => __('Посмотреть', 'your_text_domain'),
            'search_items' => __('Поиск', 'your_text_domain'),
            'not_found' => __('Не найдены', 'your_text_domain'),
            'not_found_in_trash' => __('Корзина пуста', 'your_text_domain'),
            'parent_item_colon' => '',
            'menu_name' => __($title, 'your_text_domain')

        );

        $args = array(
            'labels' => $labels,
            'public' => $public,
            'publicly_queryable' => $public,// Запросы относящиеся к этому типу записей будут работать во фронтэнде
            'exclude_from_search' => false, // исключить из посика по сайту
            'show_ui' => true,              // не показывать пользовательский интерфейс (UI) для этого типа записей
            'show_in_menu' => true,         // этот тип записей будет спрятан из выбора меню навигации
            'menu_position' => 10,          // позиция в меню админки (10-14 — под «Медиафайлы»)
            'rewrite' => array('slug' => $internalname),
            'capability_type' => 'post',    // уровень доступа к данной записи
            'capabilities' => array(        //'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
            ),
            'map_meta_cap' => true,         // Ставим true, чтобы включить дефолтный обработчик специальных прав
            'has_archive' => true,          // Поддержка древовидности
            'hierarchical' => true,         // Включить поддержку страниц архивов (категории) для этого типа записей
            'supports' => $arr,             // Вспомогательные поля на странице создания/редактирования этого типа записи
            'query_var' => true,            // Устанавливает название параметра запроса для создаваемого типа записи.
        );

        if (!empty($ar['show_in_menu'])) {
            if ($ar['show_in_menu'] != "no") {
                $args['show_in_menu'] = 'edit.php?post_type=' . $ar['show_in_menu'];
            } else if ($ar['show_in_menu'] == "no") {
                $args['show_in_menu'] = false;
            }
        }
        if (!empty($ar['nopublic'])) {
            $args['nopublic'] = 'edit.php?post_type=' . $ar['show_in_menu'];
        }

        if (!empty($ar['menu_icon'])) {                 // Ссылка на картинку, которая будет использоваться для этого меню.
            $args['menu_icon'] = $ar['menu_icon'];
        }
        if (!empty($ar['rewrite'])) {                   // Использовать ли ЧПУ для этого типа записи
            $args['rewrite'] = $ar['rewrite'];
        }
        if (isset($ar['not_main'])) {                   // Поддержка древовидности
            $args['has_archive'] = $ar['not_main'];
            $args['hierarchical'] = $ar['not_main'];
        }

        if (empty($posttype)) {
            $posttype = "";
        }

        register_post_type($internalname, $args, $posttype);

        flush_rewrite_rules();
    }

    /** Создаем новый тип таксономии
     * @param $title - название
     * @param $inernalname - сокращение в ЧПУ
     * @param null/string $posttype - тип поста
     * @param null $ar - параметры */
    protected function createTaxonomy($title, $inernalname, $posttype = NULL, $ar = NULL) {

        $labels = array('name' => $title,
            'singular_name' => 'Наименование ',
            'search_items' => 'Поиск ',
            'all_items' => 'Все ',
            'parent_item' => 'Родительская',
            'parent_item_colon' => 'Родительская:',
            'edit_item' => 'Редактировать ',
            'update_item' => 'Сохранить ',
            'add_new_item' => 'Добавить',
            'new_item_name' => 'Новая '
        , 'menu_name' => $title);


        $args = array('label' => '' // определяется параметром $labels->name
        , 'labels' => $labels
        , 'public' => true
        , 'menu_position' => 5
        , 'show_in_nav_menus' => true // равен аргументу public
        , 'show_ui' => true // равен аргументу public
        , 'show_tagcloud' => true // равен аргументу show_ui
        , 'hierarchical' => true
        , 'update_count_callback' => ''
        , 'rewrite' => true
        , 'query_var' => $inernalname
        , 'capabilities' => array()
        , '_builtin' => false);

        if (!empty($ar['tags'])) {
            $args['hierarchical'] = false;
        }
        if (!empty($ar['rewrite'])) {
            $args['rewrite'] = $ar['rewrite'];
        }
        if (isset($ar['not_main'])) {
            $args['has_archive'] = $ar['not_main'];
            //$args['hierarchical'] = $ar['not_main'];
        }

        register_taxonomy($inernalname, $posttype, $args);
        flush_rewrite_rules();
    }

}