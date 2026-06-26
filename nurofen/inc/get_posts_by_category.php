<?php

global $post;

$category_slug = nurofen_get_brand_category_slug($post);

$args = [
    'post_type' => 'post',
    'posts_per_page' => '-1',
];

if ($category_slug) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $category_slug,
        ],
    ];
}

$current_category_posts = new WP_Query($args);
