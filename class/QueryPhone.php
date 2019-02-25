<?php

namespace MobileCategory;

class QueryPhone extends \WP_Query {


    public function __construct($filter) {
        $new_argument = array();

        if (!empty($filter)) {
            $tax_query = array(
                'relation' => 'AND',
            );
            foreach ($filter as $name_taxonomy => $values_taxonomy) {
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

        parent::__construct($default_argument);

    }


}