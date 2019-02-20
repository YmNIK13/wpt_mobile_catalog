<?php

namespace MobileCategory;

class Theme {

    public function __construct() {
        $this->_autoloadClass();
    }


    public function init() {
        add_theme_support('post-thumbnails', array('post', 'mobile'));

        $mobile = new Mobile();
        $style_script = new SheetsScripts(true);
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
}