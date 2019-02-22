<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.02.2019
 * Time: 0:57
 */

namespace MobileCategory;


class AJAXRequest {

    protected static $_instance = NULL;

    /**
     * Prevent direct object creation
     */
    final private function __construct() {
    }

    /**
     * Prevent object cloning
     */
    final private function __clone() {
    }

    /**
     * Returns new or existing Singleton instance
     * @return Singleton
     */
    final public static function init() {
        if (null !== static::$_instance) {
            return static::$_instance;


        }
        static::$_instance = new static();

        // добавляем свой путь
        add_action('init', array(self::class, 'registerAJAXPath'),10);

        // добавляем метод обработки через фильтр
        add_action('init', array(self::class, 'addAjaxRequest'), 20);

        return static::$_instance;
    }


    static function registerAJAXPath() {
        add_rewrite_rule('^ajax-filter/?', 'index.php?jax_filter=true', 'top');

        // скажем WP, что есть новые параметры запроса
        add_filter('query_vars', function ($vars) {
            $vars[] = 'ajax_filter';
            return $vars;
        });
    }

    static function addAjaxRequest() {
        if (!empty($_REQUEST['method_ajax'])) {
            if (self::isAjax()) {
                $method_ajax = mb_strtolower(trim($_REQUEST['method_ajax']));
                $value = '';
                self::beginRequest();
                echo apply_filters('ajax_request_' . $method_ajax, $value);
                self::endRequest();
            }
        }
    }

    static public function isAjax() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }

    static public function beginRequest() {
        if (self::isAjax()) {
            ob_get_clean();
        }
    }

    static public function endRequest() {
        if (self::isAjax()) {
            die;
        }
    }


}