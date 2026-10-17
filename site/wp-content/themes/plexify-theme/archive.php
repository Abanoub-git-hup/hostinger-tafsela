<?php
/**
 * archive.php — Plexify Theme
 * قالب صفحات الأرشيف (التصنيفات، الوسوم، التواريخ)
 *
 * @package Plexify
 */

get_header(); ?>

<div class="plexify-container plexify-archive-layout">
    <main class="plexify-main-content" role="main">

        <header class="plexify-archive-header">
            <?php the_archive_title( '<h1 class="plexify-archive-title">', '</h1>' ); ?>
            <?php the_archive_description( '<div class="plexify-archive-desc">', '</div>' ); ?>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="plexify-posts-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination( [
                'prev_text' => '←',
                'next_text' => '→',
            ] ); ?>
        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>

    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer();
