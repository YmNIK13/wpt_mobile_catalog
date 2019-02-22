<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.02.2019
 * Time: 2:15
 */

namespace MobileCategory;


class BlockHTML {


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

        if (empty($link_pagination)) {
            return false;
        }


        $result = "<ul class=\"pagination\">";
        foreach ($link_pagination as $link) {
            $result .= "<li>";
            $result .= $link;
            $result .= "</li>";
        }

        $result .= "</ul>";


        return $result;
    }


    static public function getTopMenu(){
        return wp_nav_menu( $args = array(
            'theme_location'    => 'top',
            'container'         => 'div',
            'container_id'      => 'top-menu',
            'container_class'   => 'navbar-collapse collapse',
            'menu_class'        => 'nav navbar-nav',
            'echo'              => false,
            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s <li><input class="form-control search" placeholder=" Search" type="text"></li></ul>',
            'depth'             => 10,
            'walker'            => new HeadNavMenu()
        ));
    }

}