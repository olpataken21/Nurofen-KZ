<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php bloginfo('name'); ?></title>


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="wrapper">
            <a href="<?php echo esc_url(function_exists('pll_home_url') ? pll_home_url() : home_url('/')); ?>" class="title-header">
                <div class="header-logo-KZ"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/header-logo-icon.png" alt="Tumau.Jok"></div>
                Tumau.Jok</a>
            <ul class="menu-header">
                <?php $nurofen_lang_switcher = nurofen_get_language_switcher(); ?>
                <li>
                    <a href="<?php echo esc_url($nurofen_lang_switcher['url'] ?? '#'); ?>">
                        <span><?php echo esc_html($nurofen_lang_switcher['label'] ?? __('КЗ', NUROFEN_TD)); ?></span>
                        <div class="icon-lang">
                            <img src="<?php echo esc_url($nurofen_lang_switcher['flag_url'] ?? get_template_directory_uri() . '/assets/img/png/lang-icon-KZ.png'); ?>"
                                alt="<?php esc_attr_e('Язык', NUROFEN_TD); ?>">
                        </div>
                    </a>
                </li>
                <li><a href="<?php echo esc_url(nurofen_get_page_permalink('strepsils')); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/strepsils.svg"
                            alt="strepsils"></a></li>
                <li><a href="<?php echo esc_url(nurofen_get_page_permalink('nurofen')); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/nurofen.svg"
                            alt="nurofen"></a></li>
                <li><a href="<?php echo esc_url(nurofen_get_page_permalink('nurofen-kids')); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/nurofen-child.svg"
                            alt="nurofen"></a></li>
            </ul>
        </div>
    </header>