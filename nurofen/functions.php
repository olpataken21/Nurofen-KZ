<?php

define('NUROFEN_TD', 'my-custom-theme');

function nurofen_theme_setup()
{
    load_theme_textdomain(NUROFEN_TD, get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'nurofen_theme_setup');

/**
 * Polylang задаёт локаль позже after_setup_theme — перезагружаем переводы темы.
 */
function nurofen_reload_theme_textdomain()
{
    if (is_admin() && !wp_doing_ajax()) {
        return;
    }

    $locale = determine_locale();
    $mofile = get_template_directory() . '/languages/' . NUROFEN_TD . '-' . $locale . '.mo';

    unload_textdomain(NUROFEN_TD);

    if (is_readable($mofile)) {
        load_textdomain(NUROFEN_TD, $mofile);
        return;
    }

    load_theme_textdomain(NUROFEN_TD, get_template_directory() . '/languages');
}
add_action('wp', 'nurofen_reload_theme_textdomain', 0);

/**
 * Permalink страницы по назначенному шаблону (Polylang + разные slug).
 */
function nurofen_get_page_permalink_by_template($template)
{
    $pages = get_posts([
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
    ]);

    if (!empty($pages[0])) {
        return get_permalink($pages[0]->ID);
    }

    return home_url('/');
}

/**
 * Permalink страницы с учётом текущего языка Polylang.
 */
function nurofen_get_page_permalink($slug)
{
    $template_map = [
        'strepsils' => 'templates/template-strepsils.php',
        'nurofen' => 'templates/template-nurofen.php',
        'nurofen-kids' => 'templates/template-nurofen-kids.php',
        'home' => 'templates/template-home.php',
    ];

    if (isset($template_map[$slug])) {
        return nurofen_get_page_permalink_by_template($template_map[$slug]);
    }

    $page = get_page_by_path($slug);
    if (!$page) {
        return home_url('/');
    }

    if (function_exists('pll_get_post')) {
        $translated_id = pll_get_post($page->ID);
        if ($translated_id) {
            return get_permalink($translated_id);
        }
    }

    return get_permalink($page->ID);
}

/**
 * Slug рубрики с учётом перевода Polylang (nurofen → nurofen-uz и т.д.).
 */
function nurofen_get_translated_category_slug($slug)
{
    $lookup = [
        'taxonomy' => 'category',
        'slug' => $slug,
        'hide_empty' => false,
    ];

    if (function_exists('pll_current_language')) {
        $lookup['lang'] = '';
    }

    $terms = get_terms($lookup);
    if (empty($terms) || is_wp_error($terms)) {
        return $slug;
    }

    $term = $terms[0];

    if (function_exists('pll_get_term')) {
        $translated_id = pll_get_term($term->term_id);
        if ($translated_id) {
            $translated = get_term($translated_id, 'category');
            if ($translated && !is_wp_error($translated)) {
                return $translated->slug;
            }
        }
    }

    return $term->slug;
}

/**
 * Slug рубрики для страницы бренда по назначенному шаблону.
 */
function nurofen_get_brand_category_slug($post = null)
{
    $post = $post ?: get_post();
    if (!$post) {
        return '';
    }

    $map = [
        'templates/template-nurofen.php' => 'nurofen',
        'templates/template-strepsils.php' => 'strepsils',
        'templates/template-nurofen-kids.php' => 'nurofen-kids',
    ];

    $template = get_page_template_slug($post);
    if (!isset($map[$template])) {
        return '';
    }

    return nurofen_get_translated_category_slug($map[$template]);
}

function my_theme_assets()
{

    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        '1.0'
    );
    wp_enqueue_style(
        'fancybox-css',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.css',
        array(),
        '6.1.0'
    );

    wp_enqueue_script(
        'fancybox-js',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js',
        array(),
        '6.1.0',
        true
    );

    wp_enqueue_script(
        'theme-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        '1.1',
        true
    );



}

add_action('wp_enqueue_scripts', 'my_theme_assets');

/**
 * Данные для переключателя языка (Polylang): ссылка и оформление целевого языка.
 */
function nurofen_get_language_switcher()
{
    if (!function_exists('pll_the_languages') || !function_exists('pll_current_language')) {
        return null;
    }

    if (!pll_current_language('slug')) {
        return null;
    }

    $alternate_languages = pll_the_languages([
        'raw' => 1,
        'hide_current' => 1,
        'hide_if_no_translation' => 0,
        'hide_if_empty' => 0,
    ]);

    if (empty($alternate_languages)) {
        return null;
    }

    $alternate = reset($alternate_languages);
    $target = nurofen_get_language_switcher_display($alternate['slug'] ?? '');

    return [
        'url' => $alternate['url'] ?? '#',
        'label' => $target['label'],
        'flag_url' => $target['flag_url'],
    ];
}

function nurofen_get_language_switcher_display($slug)
{
    $slug = strtolower((string) $slug);
    $assets_uri = get_template_directory_uri() . '/assets/img';

    if (str_starts_with($slug, 'ru')) {
        return [
            'label' => __('РУ', NUROFEN_TD),
            'flag_url' => $assets_uri . '/svg/lang-icon-ru.svg',
        ];
    }

    if (str_starts_with($slug, 'uz')) {
        return [
            'label' => __('УЗ', NUROFEN_TD),
            'flag_url' => $assets_uri . '/png/lang-icon.png',
        ];
    }

    return [
        'label' => strtoupper($slug),
        'flag_url' => $assets_uri . '/png/lang-icon.png',
    ];
}

/**
 * Преобразует обычные ссылки YouTube, RuTube и VK в embed-ссылки для Fancybox
 */
function get_video_embed_url($url)
{

    if (empty($url)) {
        return '';
    }

    $url = trim($url);

    // Уже embed-ссылка
    if (
        strpos($url, 'youtube.com/embed/') !== false ||
        strpos($url, 'rutube.ru/play/embed/') !== false ||
        strpos($url, 'vkvideo.ru/video_ext.php') !== false
    ) {
        return $url;
    }

    // YouTube: https://www.youtube.com/watch?v=XXXX
    if (preg_match('~youtube\.com/watch\?v=([^&]+)~i', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // YouTube: https://youtu.be/XXXX
    if (preg_match('~youtu\.be/([^?&/]+)~i', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // RuTube: https://rutube.ru/video/XXXXXXXX/
    if (preg_match('~rutube\.ru/video/([a-zA-Z0-9]+)~i', $url, $matches)) {
        return 'https://rutube.ru/play/embed/' . $matches[1] . '/';
    }

    // VK: https://vkvideo.ru/video-123_456
    if (preg_match('~vkvideo\.ru/video(-?\d+)_(\d+)~i', $url, $matches)) {
        return 'https://vkvideo.ru/video_ext.php?oid=' . $matches[1] . '&id=' . $matches[2] . '&hd=4';
    }

    return $url;
}

