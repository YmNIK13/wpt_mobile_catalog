<?php

namespace MobileCategory;

class SheetsScripts {
    private $dir_path_url;
    private $is_dev;


    public function __construct($is_dev = false) {
        $this->dir_path_url = get_template_directory_uri() . '/assets/';
        $this->is_dev = $is_dev;


        //подключаем в админке style & js файл
        add_action('admin_head', array($this, 'admin_style'));
        add_action('admin_head', array($this, 'admin_scripts'));

        //подключаем style & js файл
        add_action('wp_print_styles', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'scripts'));
    }

    function admin_style() {
        wp_enqueue_style('admin-style', $this->dir_path_url . 'css/admin-style.css');
        wp_enqueue_style('admin-style-bootstrap', $this->dir_path_url . 'css/bootstrap.css');
    }

    function admin_scripts() {
        wp_enqueue_script('admin-script', $this->dir_path_url . 'js/admin-script.js', array('jquery'), '1.0', false);
    }


    function style() {
        // Bootstrap core CSS
        wp_enqueue_style('bootstrap-style', $this->dir_path_url . 'lib/bootstrap/css/bootstrap' . $this->_isMin() . '.css');
        wp_enqueue_style('bootstrap-theme-style', $this->dir_path_url . 'lib/bootstrap/css/theme.css');
        wp_enqueue_style('bootstrap-reset-style', $this->dir_path_url . 'lib/bootstrap/css/bootstrap-reset.css');


        // external css
        wp_enqueue_style('font-awesome-style', $this->dir_path_url . 'lib/font-awesome/css/font-awesome.css');
        wp_enqueue_style('flexslider-style', $this->dir_path_url . 'css/flexslider.css');
        wp_enqueue_style('jquery-bxslider-style', $this->dir_path_url . 'lib/bxslider/jquery.bxslider.css');


        if (is_single() || is_front_page() || is_archive()) {
            wp_enqueue_style('owl-carousel-style', $this->dir_path_url . 'lib/owlcarousel/owl.carousel.css');
            wp_enqueue_style('owl-theme-style', $this->dir_path_url . 'lib/owlcarousel/owl.theme.css');
        }

        if (is_front_page()) {
            wp_enqueue_style('component-style', $this->dir_path_url . 'css/component.css');
            wp_enqueue_style('superfish-style', $this->dir_path_url . 'css/superfish.css');
            wp_enqueue_style('parallax-slider-style', $this->dir_path_url . 'lib/parallax-slider/css/parallax-slider.css');
        }

        if (is_archive()) {
            wp_enqueue_style('mixitup-style', $this->dir_path_url . 'css/mixitup.css');
            wp_enqueue_style('magnific-popup-style', $this->dir_path_url . 'css/magnific-popup.css');
        }


        wp_enqueue_style('animate-style', $this->dir_path_url . 'css/animate.css');

        // Custom styles for this template
        wp_enqueue_style('common-style', $this->dir_path_url . 'css/style.css');
        wp_enqueue_style('common-responsive-style', $this->dir_path_url . 'css/style-responsive.css');

    }


    function scripts() {
        wp_enqueue_script('jquery', $this->dir_path_url . 'lib/jquery/jquery.js');

        wp_enqueue_script('bootstrap-script', $this->dir_path_url . 'lib/bootstrap/js/bootstrap' . $this->_isMin() . '.js', array('jquery'), '3.1.1', true);

        wp_enqueue_script('hover-dropdown-script', $this->dir_path_url . 'js/hover-dropdown.js', array('jquery'), null, true);
        wp_enqueue_script('jquery-flexslider-script', $this->dir_path_url . 'lib/jquery/jquery.flexslider.js', array('jquery'), null, true);
        wp_enqueue_script('jquery-bxslider-script', $this->dir_path_url . 'lib/bxslider/jquery.bxslider.js', array('jquery'), null, true);


        if (is_single() || is_front_page() || is_archive()) {
            wp_enqueue_script('jquery-owlcarousel-script', $this->dir_path_url . 'lib/owlcarousel/owl.carousel.js', array('jquery'), null, true);
        }

        wp_enqueue_script('jquery-parallax-script', $this->dir_path_url . 'lib/jquery/jquery.parallax-1.1.3.js', array('jquery'), null, true);


        if (is_front_page()) {
            wp_enqueue_script('modernizr-custom-script', $this->dir_path_url . 'lib/parallax-slider/js/modernizr.custom.28468.js');

            wp_enqueue_script('superfish-script', $this->dir_path_url . 'js/superfish.js', null, null, true);
            wp_enqueue_script('jquery-cslider-script', $this->dir_path_url . 'lib/parallax-slider/js/jquery.cslider.js', array('jquery'), null, true);
        }

        if (is_archive()) {
            wp_enqueue_script('mixitup-script', $this->dir_path_url . 'js/mixitup.js', null, null, true);
            wp_enqueue_script('jquery-magnific-popup-script', $this->dir_path_url . 'lib/jquery/jquery.magnific-popup.js', array('jquery'), null, true);
        }


        wp_enqueue_script('jquery-easing-script', $this->dir_path_url . 'lib/jquery/jquery.easing.min.js', array('jquery'), null, true);

        wp_enqueue_script('link-hover-script', $this->dir_path_url . 'js/link-hover.js', null, null, true);

        // common script for all pages
        wp_enqueue_script('wow-script', $this->dir_path_url . 'js/wow.min.js', null, null, true);
        wp_enqueue_script('common-script', $this->dir_path_url . 'js/common-scripts.js', array('jquery', 'wow-script'), null, true);
    }

    private function _isMin() {
        return ($this->is_dev ? "" : ".min");
    }

}