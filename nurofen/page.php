<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>' . esc_html__('Контент не найден', NUROFEN_TD) . '</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
