<?php

namespace MobileCategory;

// Класс виджета
class FilterWidget extends \WP_Widget {

    function __construct() {
        // Запускаем родительский класс
        parent::__construct(
            'filter_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
            __('Filter Phone', 'wpt_mobile_catalog'),
            array('description' => 'Фильтр телефонов')
        );

        // стили скрипты виджета, только если он активен
        if (is_active_widget(false, false, $this->id_base) || is_customize_preview()) {
            add_action('wp_enqueue_scripts', array($this, 'add_my_widget_scripts'));
            add_action('wp_head', array($this, 'add_my_widget_style'));
        }
    }

    // Вывод виджета
    function widget($args, $instance) {
       require get_template_directory() . '/template-parts/widget/widget-filter.php';
    }


    // html форма настроек виджета в Админ-панели
    function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'Filter';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    // Сохранение настроек виджета (очистка)
    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }


    // скрипт виджета
    function add_my_widget_scripts() {
        // фильтр чтобы можно было отключить скрипты
        if (!apply_filters('show_my_widget_script', true, $this->id_base))
            return;


        wp_enqueue_script('filter_phone_widget_script', get_stylesheet_directory_uri() . '/assets/js/filter_phone.js');
    }

    // стили виджета
    function add_my_widget_style() {
        // фильтр чтобы можно было отключить стили
        if (!apply_filters('show_my_widget_style', true, $this->id_base))
            return;

        wp_enqueue_style('filter_phone_widget_style', get_stylesheet_directory_uri() . '/assets/css/filter_phone.css');
    }
}
