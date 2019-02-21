<?php

/*
$title = apply_filters('widget_title', $instance['title']);

echo $args['before_widget'];

if ($title)
    echo $args['before_title'] . $title . $args['after_title'];
echo 'Привет!';

echo $args['after_widget'];
// */

$taxonomies = get_taxonomies(array('public' => true, 'object_type' => array('mobile'),), 'objects');
$name_taxonomies = array_column($taxonomies, 'label', 'name');
$key_taxonomies = array_column($taxonomies, 'name');


$terms = get_terms(array('taxonomy' => $key_taxonomies,));
$filter_parameters = array();

foreach ($terms as $term_name) {
    $filter_parameters[$term_name->taxonomy][$term_name->slug] = array(
        'id' => $term_name->term_id,
        'name' => $term_name->name
    );
}
?>

<div class="filters-mobile">
    <?php foreach ($filter_parameters as $name_param => $parameter) { ?>
        <div class="filters-mobile__item">
            <div class="filters-mobile__item-title"><?= $name_taxonomies[$name_param]; ?></div>
            <div class="filters-mobile__item-variant">
                <?php foreach ($parameter as $param_value) { ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="<?=$name_param . "[". $param_value['id'] ."]" ?>">
                            <?=$param_value['name']; ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
