<?php
/**
 * Template Name: Nurofen
 */
get_header();
require get_template_directory() . "/inc/get_posts_by_category.php";
?>

<main>
    <section class="header-main">
        <div class="fon">
            <div class="layer ornament">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/степь-казахская.png" alt="fon">
            </div>
            <div class="layer doctor">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/Фон врач.png" alt="fon">
            </div>
            <div class="layer line">
                <img class="line" src="<?php echo get_template_directory_uri(); ?>/assets/img/png/Волна.png" alt="fon">
            </div>
            <div class="elips-left-nurf-KZ">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/elips-left-nurf-KZ.png" alt="fon">
            </div>
            <div class="elips-big-nurf-KZ">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/elips-big-nurf-KZ.png" alt="fon">
            </div>
        </div>
        <div class="wrapper">
            <div class="title-main-header page-2 page-3">
                <div class="logotip">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/nurofen-main.svg" alt="">
                </div>
                <div class="text-main">
                    <span class="three-action"><?php esc_html_e('Тройное действие:', NUROFEN_TD); ?></span>
                    <span><?php _e('Против жара, боли и воспаления<sup>1-3</sup>', NUROFEN_TD); ?></span>
                </div>

            </div>
        </div>
    </section>

    <?php require get_template_directory() . "/inc/article-more-section.php"; ?>
    <section class="medications">
        <div class="wrapper nurofen-page">
            <div class="sub-title"><?php esc_html_e('Препараты', NUROFEN_TD); ?></div>
            <div class="cards-medication-nurofen">
                <div class="block-one">
                    <div class="medic-nurf-ornament-KZ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/medic-nurf-ornament-KZ.png" alt="">
                    </div>
                    <div class="sub-title"><?php _e('Нурофен<sup>®</sup>', NUROFEN_TD); ?></div>
                    <ul>
                        <li><span><?php _e('Тройное действие: против жара, боли и воспаления<sup>2</sup>', NUROFEN_TD); ?></span></li>
                        <li><span><?php _e('От боли и жара при простуде и гриппе<sup>2</sup>', NUROFEN_TD); ?></span>
                        </li>
                    </ul>
                    <div class="nurf-left-card-KZ"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/png/nurf-left-card-KZ.png" alt="">
                    </div>
                </div>
                <div class="block-one">
                    <div class="medic-nurf-ornament-KZ">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/png/medic-nurf-ornament-KZ.png" alt="">
                    </div>
                    <div class="sub-title"><?php _e('Нурофен<sup>®</sup> Экспресс', NUROFEN_TD); ?>
                    </div>
                    <ul>
                        <li><span><?php _e('Быстрее<sup>3</sup>, чем обычные таблетки<sup>4</sup>', NUROFEN_TD); ?></span>
                        </li>
                        <li><span><?php _e('Обезболивающий эффект до 8 часов<sup>5</sup>', NUROFEN_TD); ?></span>
                        </li>
                        <li><span><?php _e('Капсулы с жидким действующим веществом', NUROFEN_TD); ?></span></li>
                        <li><span><?php _e('С 6 лет<sup>*</sup>', NUROFEN_TD); ?></span></li>
                    </ul>
                    <div class="nurf-right-card-KZ"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/png/nurf-right-card-KZ.png"
                            alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <?php require get_template_directory() . '/inc/telegram-section.php'; ?>

    <section class="info">
        <div class="wrapper">
            <span
                class="tag"><?php esc_html_e('*Дети от 6 лет с массой тела от 20 кг.', NUROFEN_TD); ?></span>
            <div class="list_with_recomend">
                <ol class="streprils-page">
                    <li><?php esc_html_e('Согласно инструкциям по медицинскому применению препаратов Нурофен® в форме таблеток, покрытых оболочкой, 200 мг, РК-ЛС-5№018120 и Нурофен® Экспресс, капсулы, 200 мг, РК-ЛС-5№021331.  Фарм. группа: НПВП', NUROFEN_TD); ?>
                    </li>
                    <li><?php esc_html_e('Согласно инструкции по медицинскому применению препарата Нурофен® в форме таблеток, покрытых оболочкой, 200 мг, РК-ЛС-5№018120. Фарм. группа: НПВП.', NUROFEN_TD); ?>
                    </li>
                    <li><?php esc_html_e('Нурофен® Экспресс всасывается примерно вдвое быстрее, чем Нурофен®, таблетки, покрытые оболочкой. Инструкция по медицинскому применению лекарственного препарата Нурофен® Экспресс, капсулы, 200 мг. РК-ЛС-5№021331 от 31.03.2020 г. Фарм. Группа: НПВП.', NUROFEN_TD); ?>
                    </li>
                    <li><?php esc_html_e('Обычные таблетки – Нурофен®, 200 мг, РК-ЛС-5№018120.', NUROFEN_TD); ?>
                    </li>
                    <li><?php esc_html_e('После приема препарата Нурофен® Экспресс обезболивающий эффект может длиться до 8 часов. Инструкция по медицинскому применению Нурофен® Экспресс, капсулы, 200 мг, РК-ЛС-5№021331. Фарм. группа: НПВП.', NUROFEN_TD); ?>
                    </li>
                </ol>
                <span><?php esc_html_e('ТОЛЬКО для медицинских и фармацевтических работников', NUROFEN_TD); ?></span>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>