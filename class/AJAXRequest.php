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
    final private function  __construct() { }

    /**
     * Prevent object cloning
     */
    final private function  __clone() { }

    /**
     * Returns new or existing Singleton instance
     * @return Singleton
     */
    final public static function init(){
        if(null !== static::$_instance){
            return static::$_instance;


        }
        static::$_instance = new static();


        // добавляем свой путь
        add_action('init', array(self::class, 'registerAJAXPath'), 10);

        add_action('init', array(self::class, 'addAjaxRequest'), 11);


        return static::$_instance;
    }


    static function registerAJAXPath() {
        add_rewrite_rule('^(ajax-filter)/?', 'index.php?ajax-filter=true', 'top');

        // скажем WP, что есть новые параметры запроса
        add_filter('query_vars', function ($vars) {
            $vars[] = 'ajax-filter';
            return $vars;
        });
    }

    static function addAjaxRequest() {
        if (self::isAjax()) {
            $value = '';
            self::beginRequest();
            echo apply_filters( 'ajax_request_filter', $value );
            self::endRequest();
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