<?php

namespace MobileCategory;

class Mobile extends EntityWP {

    private $name_entuty;

    public function __construct() {
        $this->name_entuty = "mobile";

        parent::__construct();
    }

    /** Регистрируем новый тип  */
    public function registerType() {
        $param = array(
            'menu_icon' => 'dashicons-smartphone',
            'supports' => array('title', 'thumbnail'),
            "not_main" => false
        );

        // Регистрируем тип и таксономию
        $this->createPostType("Мобилы", $this->name_entuty, $param);
        $this->createTaxonomy("Производитель", "manufacturer", array($this->name_entuty));
    }

    /** Регистрируем дополнительные поля для мобил */
    public function registerFields() {
        add_meta_box('extra_fields', 'Создать производителя', array($this, 'registerFieldsTemplate'), $this->name_entuty, 'normal', 'high');
    }


    /** Добавляем параметры
     * @param $vars
     * @return array
     */
    public function addQueryVars($vars) {
        // Добавим имя параметра, который должен отображаться в URL
        $vars[] = 'mobile_name';
        return $vars;
    }

    /** Перезаписываем урл
     * @param $rules
     * @return array
     */
    public function addRewriteRules($rules) {
        // Правила для перезаписи URL, что бы наш параметр не менялся
        $aNewRules = array($this->name_entuty . '/([^/]+)/?$' => 'index.php?mobile_name=$matches[1]');
        $rules = $aNewRules + $rules;
        return $rules;
    }


    /** Шаблон добавляемых дополнительных полей
     * @param $mobile - запись mobile
     */
    public function registerFieldsTemplate($mobile) {
        $mobile_description = get_post_meta($mobile->ID, 'mobile_description', 1);

        ?>
        <input id="mobile_id" name="mobile_id" type="hidden" value="<?= $mobile->ID; ?>"/>

        <div class="row" style="width: 100%">
            <div>
                <input type="text"  id="mobile_description" name="mobile_description" style="width: 100%" value="<?= $mobile_description ?>"/>
            </div>
        </div>
        <?php
    }

}