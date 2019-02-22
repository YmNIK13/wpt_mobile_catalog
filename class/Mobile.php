<?php

namespace MobileCategory;

class Mobile extends EntityWP {

    private $name_entuty;

    public function __construct() {
        $this->name_entuty = "mobile";
        parent::__construct();

        // подключаем функцию активации мета блока
        add_action('add_meta_boxes', array($this, 'registerFields'), 1);
    }

    /** Регистрируем новый тип  */
    public function registerType() {
        $param = array(
            'menu_icon' => 'dashicons-smartphone',
            'supports' => array('title', 'thumbnail', 'editor'),
            "not_main" => false
        );

        // Регистрируем тип и таксономию
        $this->createPostType("Мобилы", $this->name_entuty, $param);
        $this->createTaxonomy("Производитель", "manufacturer", array($this->name_entuty));
        $this->createTaxonomy("Оперативная память", "ram", array($this->name_entuty));
        $this->createTaxonomy("Внутренняя память", "memory", array($this->name_entuty));
        $this->createTaxonomy("Операционная система", "os", array($this->name_entuty));
    }

    /** Регистрируем дополнительные поля в админке */
    public function registerFields() {
        add_meta_box('extra_fields', 'Дополнительные параметры', array($this, 'registerFieldsTemplate'), $this->name_entuty, 'normal', 'high');
    }


    /** Шаблон добавляемых дополнительных полей
     * @param $mobile - запись mobile
     */
    public function registerFieldsTemplate($mobile) {
        $mobile_description = get_post_meta($mobile->ID, 'mobile_description', 1);

        ?>
        <form role="form">
            <input id="mobile_id" name="mobile_id" type="hidden" value="<?= $mobile->ID; ?>"/>

            <input type="text" id="mobile_description" name="mobile_description"
                   class="form-control" placeholder="Сколько служит батарея"
                   value="<?= $mobile_description ?>"/>
        </form>
        <?php
        // require get_template_directory_uri() . '/template-parts/admin/fields.php'
        // get_template_part( 'template-parts/admin/fields' );
    }


    public function filterMobiles($arg = array()) {
        $new_argument = array();

        /*

        [
                'relation' => 'AND',
                [
                    'taxonomy' => 'manufacturer',
                    'field' => 'id',
                    'terms' => [ 2,7 ]
                ],
                [
                    'taxonomy' => 'memory',
                    'field' => 'id',
                    'terms' => [ 14 ]
                ]
            ]

         * */


        if(!empty($arg)){
            $tax_query = array(
                'relation' => 'OR',
            );

            foreach ($arg as $name_taxonomy => $values_taxonomy){
                $tax_query[] = array(
                    'taxonomy' => $name_taxonomy,
                    'field' => 'id',
                    'terms' => array_keys($values_taxonomy),
                );
            }

            $new_argument['tax_query'] = $tax_query;
        }


        $default_argument = array(
            'posts_per_page' => 6,
            'post_type' => 'mobile',
            'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
        );

        $default_argument = array_merge($default_argument, $new_argument);

        return query_posts($default_argument);

    }


}