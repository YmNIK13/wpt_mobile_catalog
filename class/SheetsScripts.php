<?php

namespace MobileCategory;

class SheetsScripts {

    protected static $_instance = NULL;

    private static $dir_path_url;
    private static $is_dev;

    final private function __construct() {
    }

    final private function __clone() {
    }

    /** Returns new or existing SheetsScripts
     * @param bool $is_dev
     * @return SheetsScripts
     */
    final public static function init($is_dev = false) {
        if (null !== static::$_instance) {
            return static::$_instance;
        }

        static::$_instance = new static();

        self::$is_dev = $is_dev;
        self::$dir_path_url = get_template_directory_uri() . '/assets/';

        //подключаем в админке style & js файл
        add_action('admin_head', array(self::class, 'admin_style'));
        add_action('admin_head', array(self::class, 'admin_scripts'));

        //подключаем style & js файл
        add_action('wp_print_styles', array(self::class, 'style'));
        add_action('wp_enqueue_scripts', array(self::class, 'scripts'));

        return static::$_instance;
    }


    static public function admin_style() {
        wp_enqueue_style('admin-style', self::$dir_path_url . 'css/admin-style.css');
        wp_enqueue_style('admin-style-bootstrap', self::$dir_path_url . 'css/bootstrap.css');
    }

    static public function admin_scripts() {
        wp_enqueue_script('admin-script', self::$dir_path_url . 'js/admin-script.js', array('jquery'), '1.0', false);
    }


    static public function style() {
        // Bootstrap core CSS
        wp_enqueue_style('bootstrap-style', self::$dir_path_url . 'lib/bootstrap/css/bootstrap' . self::_isMin() . '.css');
        wp_enqueue_style('bootstrap-theme-style', self::$dir_path_url . 'lib/bootstrap/css/theme.css');
        wp_enqueue_style('bootstrap-reset-style', self::$dir_path_url . 'lib/bootstrap/css/bootstrap-reset.css');


        // external css
        wp_enqueue_style('font-awesome-style', self::$dir_path_url . 'lib/font-awesome/css/font-awesome.css');
        wp_enqueue_style('flexslider-style', self::$dir_path_url . 'css/flexslider.css');
        wp_enqueue_style('jquery-bxslider-style', self::$dir_path_url . 'lib/bxslider/jquery.bxslider.css');


        if (is_single() || is_front_page() || is_archive()) {
            wp_enqueue_style('owl-carousel-style', self::$dir_path_url . 'lib/owlcarousel/owl.carousel.css');
            wp_enqueue_style('owl-theme-style', self::$dir_path_url . 'lib/owlcarousel/owl.theme.css');
        }

        if (is_front_page()) {
            wp_enqueue_style('component-style', self::$dir_path_url . 'css/component.css');
            wp_enqueue_style('superfish-style', self::$dir_path_url . 'css/superfish.css');
            wp_enqueue_style('parallax-slider-style', self::$dir_path_url . 'lib/parallax-slider/css/parallax-slider.css');
        }

        if (is_archive()) {
            wp_enqueue_style('mixitup-style', self::$dir_path_url . 'css/mixitup.css');
            wp_enqueue_style('magnific-popup-style', self::$dir_path_url . 'css/magnific-popup.css');
        }


        wp_enqueue_style('animate-style', self::$dir_path_url . 'css/animate.css');

        // Custom styles for this template
        wp_enqueue_style('common-style', self::$dir_path_url . 'css/style.css');
        wp_enqueue_style('common-responsive-style', self::$dir_path_url . 'css/style-responsive.css');

    }


    static public function scripts() {
        wp_enqueue_script('jquery', self::$dir_path_url . 'lib/jquery/jquery.js');

        wp_enqueue_script('bootstrap-script', self::$dir_path_url . 'lib/bootstrap/js/bootstrap' . self::_isMin() . '.js', array('jquery'), '3.1.1', true);

        wp_enqueue_script('hover-dropdown-script', self::$dir_path_url . 'js/hover-dropdown.js', array('jquery'), null, true);
        wp_enqueue_script('jquery-flexslider-script', self::$dir_path_url . 'lib/jquery/jquery.flexslider.js', array('jquery'), null, true);
        wp_enqueue_script('jquery-bxslider-script', self::$dir_path_url . 'lib/bxslider/jquery.bxslider.js', array('jquery'), null, true);


        if (is_single() || is_front_page() || is_archive()) {
            wp_enqueue_script('jquery-owlcarousel-script', self::$dir_path_url . 'lib/owlcarousel/owl.carousel.js', array('jquery'), null, true);
        }

        wp_enqueue_script('jquery-parallax-script', self::$dir_path_url . 'lib/jquery/jquery.parallax-1.1.3.js', array('jquery'), null, true);


        if (is_front_page()) {
            wp_enqueue_script('modernizr-custom-script', self::$dir_path_url . 'lib/parallax-slider/js/modernizr.custom.28468.js');

            wp_enqueue_script('superfish-script', self::$dir_path_url . 'js/superfish.js', null, null, true);
            wp_enqueue_script('jquery-cslider-script', self::$dir_path_url . 'lib/parallax-slider/js/jquery.cslider.js', array('jquery'), null, true);
        }

        if (is_archive()) {
            wp_enqueue_script('mixitup-script', self::$dir_path_url . 'js/mixitup.js', null, null, true);
            wp_enqueue_script('jquery-magnific-popup-script', self::$dir_path_url . 'lib/jquery/jquery.magnific-popup.js', array('jquery'), null, true);
        }


        wp_enqueue_script('jquery-easing-script', self::$dir_path_url . 'lib/jquery/jquery.easing.min.js', array('jquery'), null, true);

        wp_enqueue_script('link-hover-script', self::$dir_path_url . 'js/link-hover.js', null, null, true);

        // common script for all pages
        wp_enqueue_script('wow-script', self::$dir_path_url . 'js/wow.min.js', null, null, true);
        wp_enqueue_script('common-script', self::$dir_path_url . 'js/common-scripts.js', array('jquery', 'wow-script'), null, true);
    }

    static private function _isMin() {
        return (self::$is_dev ? "" : ".min");
    }

}