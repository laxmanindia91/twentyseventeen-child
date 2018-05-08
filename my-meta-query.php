<?php
/*
Template Name: My Meta Query
*/
echo 'test';
$args = array(
    'post_type' => 'product'
    //'orderby'   => 'meta_value_num',
    //'meta_key'  => 'price',
);
$meta_query = new WP_Meta_Query($args);
print_r($meta_query);