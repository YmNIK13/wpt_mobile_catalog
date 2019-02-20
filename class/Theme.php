<?php

namespace MobileCategory;

class Theme {

    private $page_category;
    private $slug_category;


    public function __construct() {
        $this->_autoloadClass();
        $this->slug_category = "mobiles";


        // Текущая страница если есть
        $this->page_category = get_page_by_path($this->slug_category, OBJECT, 'page');

        // добавляем свой путь
        add_action('init', array($this, 'add_route_path'));
        // Подключаем наш шаблон
        add_filter('template_include', array($this, 'register_template'));


        add_theme_support('post-thumbnails', array('post', 'mobile'));

        $mobile = new Mobile();
        $style_script = new SheetsScripts(true);


        //Поправим пагинацию
        add_filter('navigation_markup_template', array($this, 'my_navigation_template'), 10, 2);


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
        // add_rewrite_rule('^('.$this->slug_category.')/?', 'index.php?pagename=$matches[1]', 'top');

        // скажем WP, что есть новые параметры запроса
        add_filter('query_vars', function ($vars) use ($page_test) {
            $vars[] = 'pagename';
            $vars[] = 'paged';
            return $vars;
        });
    }


    function my_navigation_template($template, $class) {
        return '<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>';
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


    static public function getBreadcrumb() {
        $result_breadcrumb = array();
        $result_breadcrumb[] = '<a href="' . home_url() . '" rel="nofollow">Home</a>';

        if (is_front_page()) {
            $result_breadcrumb = array();
        } else if (is_single()) {
            $taxonomy_bread = get_the_terms(get_the_ID(), 'manufacturer');

            if (count($taxonomy_bread)) {
                $category_breadcrumb = $taxonomy_bread[0];
                $result_breadcrumb[] = '<a href="' . get_category_link($category_breadcrumb->term_id) . '" rel="nofollow">' . $category_breadcrumb->name . '</a>';
            }
            $result_breadcrumb[] = get_the_title();

        } elseif (is_tax()) {
            $taxonomy_bread = get_the_terms(get_the_ID(), 'manufacturer');
            if (count($taxonomy_bread)) {
                $category_breadcrumb = $taxonomy_bread[0];
                $result_breadcrumb[] = $category_breadcrumb->name;
            }
        } elseif (is_page()) {
            $result_breadcrumb[] = get_the_title();
        } elseif (is_search()) {
            $result_breadcrumb[] = the_search_query();
        }

        if (get_query_var('pagename') == 'mobiles') {
            $result_breadcrumb[] = get_the_title();
        }

        return $result_breadcrumb;
    }


    static public function getTitle() {
        if (is_tax()) {
            $result_title = single_term_title('', 0);
        } else {
            $result_title = the_title();
        }

        return $result_title;
    }


    static public function getPagination() {

        $link_pagination = paginate_links(
            array(
                'end_size' => 2,
                'type' => 'array',
            )
        );

        $result = "<ul class=\"pagination\">";
        foreach ($link_pagination as $link) {
            $result .= "<li>";
            $result .= $link;
            $result .= "</li>";
        }

        $result .= "</ul>";


        return $result;
    }

}