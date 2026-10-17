<?php
/**
 * single.php — Plexify Theme
 * قالب المنشور الفردي
 *
 * @package Plexify
 */

get_header(); ?>

<div class="plexify-container plexify-single-layout">
    <main class="plexify-main-content" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'single' );
            the_post_navigation( [
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'المنشور السابق', 'plexify' ) . '</span><span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'المنشور التالي', 'plexify' ) . '</span><span class="nav-title">%title</span>',
            ] );
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer();
