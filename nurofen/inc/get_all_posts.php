<?php

$args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
];

$current_category_posts = new WP_Query($args);
