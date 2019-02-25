<?php
/**
 * Created by PhpStorm.
 * User: YmNIK
 * Date: 25.02.2019
 * Time: 17:12
 */

namespace MobileCategory;


class RESTMethod {

    /** @var Mobile */
    static private $mobile;


    protected static $_instance = NULL;

    final private function __construct() {
    }

    final private function __clone() {
    }

    /** Returns new or existing Singleton instance
     * @return RESTMethod
     */
    final public static function init($mobile) {
        if (null !== static::$_instance) {
            return static::$_instance;
        }
        static::$_instance = new static();

        self::$mobile = $mobile;

        return static::$_instance;
    }

    static public function postFilter(\WP_REST_Request $request) {
        $params = array();
        parse_str($request->get_param( 'filter' ), $params);

        $result = array(
            "success" => true,
            'data' => self::$mobile->filterMobilesJson($params),
        );

        return $result;
    }

    static public function permission() {
        return true;
    }


}