<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.02.2019
 * Time: 10:11
 */

namespace MobileCategory;


class HeadNavMenu extends \Walker_Nav_Menu {

    // добавляем классы в подменю ul
    function start_lvl(&$output, $depth = 0, $args = array()) {
        // зависимые от глубины классы
        // отступ кода
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : '');

        // потому что оно считает первое подменю как 0
        $display_depth = $depth + 1;

        $classes = array(
            // 'sub-menu',
            // ($display_depth % 2 ? 'menu-odd' : 'menu-even'),
            ($display_depth >= 1 ? 'dropdown-menu' : ''),
            // 'menu-depth-' . $display_depth
        );
        $class_names = implode(' ', $classes);

        // строим html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    // добавляем основные / подклассы в li и ссылки
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ($depth > 0 ? str_repeat("\t", $depth) : ''); // отступ кода

        // зависимые от глубины классы
        $depth_classes = array(
            (!empty($this->has_children) ? ($depth > 1 ? 'dropdown-submenu' : 'dropdown') : ''),
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));


        // пройденные классы
        // $classes = empty($item->classes) ? array() : (array)$item->classes;
        // $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));

        // строим html
        $output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $depth_class_names . ' '
            //. $class_names
            . '">';


        // атрибуты ссылки
        $attributes = array();

        $class_links = array();


        if (!empty($item->url)) {
            $attributes[] = 'href="' . esc_attr($item->url) . '"';
        }
        if (!empty($item->attr_title)) {
            $attributes[] = 'title="' . esc_attr($item->attr_title) . '"';
        }
        if (!empty($item->target)) {
            $attributes[] = 'target="' . esc_attr($item->target) . '"';
        }
        if (!empty($item->xfn)) {
            $attributes[] = 'rel="' . esc_attr($item->xfn) . '"';
        }

        $link_icon =  "";
        // если есть потомки
        if (!empty($this->has_children)) {
            $class_links[] = 'dropdown-toggle';
            $attributes[] = 'data-close-others="false"';
            $attributes[] = 'data-delay="0"';
            $attributes[] = 'data-hover="dropdown"';
            $attributes[] = 'data-toggle="dropdown"';
        }

        if (!empty($class_links)) {
            $attributes[] = 'class="' . esc_attr(implode(' ', $class_links)) . '"';
        }

        $link_attributes = (implode(' ', $attributes));


        $item_output = sprintf('%1$s<a %2$s >%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $link_attributes,
            $args->link_before,
            apply_filters('the_title', $item->title, $item->ID),
            $args->link_after,
            $args->after
        );

        // строим html
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

