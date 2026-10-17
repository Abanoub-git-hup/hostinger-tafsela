<?php
/**
 * index.php — Plexify Theme
 * قالب المدونة الرئيسي (fallback لجميع القوالب غير الموجودة)
 *
 * @package Plexify
 */

get_header(); ?>

<div class="plexify-container plexify-blog-archive">
    <div class="plexify-blog-layout">
        <main class="plexify-main-content" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="plexify-archive-header">
                    <?php
                    if ( is_home() && ! is_front_page() ) {
                        echo '<h1 class="plexify-archive-title">' . esc_html__( 'المدونة', 'plexify' ) . '</h1>';
                    } elseif ( is_archive() ) {
                        the_archive_title( '<h1 class="plexify-archive-title">', '</h1>' );
                        the_archive_description( '<p class="plexify-archive-desc">', '</p>' );
                    }
                    ?>
                </header>

                <div class="plexify-posts-grid">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_pagination( [
                    'prev_text' => '← ' . esc_html__( 'السابق', 'plexify' ),
                    'next_text' => esc_html__( 'التالي', 'plexify' ) . ' →',
                ] ); ?>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>

        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer();
