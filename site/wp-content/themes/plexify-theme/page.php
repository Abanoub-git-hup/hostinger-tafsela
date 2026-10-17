<?php
/**
 * page.php — Plexify Theme
 * قالب الصفحات الثابتة
 *
 * @package Plexify
 */

get_header(); ?>

<div class="plexify-container plexify-page-layout">
    <main class="plexify-main-content" role="main">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'plexify-page' ); ?>>
                <header class="plexify-page-header">
                    <h1 class="plexify-page-title"><?php the_title(); ?></h1>
                </header>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="plexify-page-thumbnail">
                        <?php the_post_thumbnail( 'large', [ 'class' => 'plexify-featured-image' ] ); ?>
                    </div>
                <?php endif; ?>
                <div class="plexify-page-content">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages( [
                        'before' => '<nav class="page-links"><span>' . esc_html__( 'الصفحات:', 'plexify' ) . '</span>',
                        'after'  => '</nav>',
                    ] );
                    ?>
                </div>
            </article>
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        endwhile;
        ?>
    </main>
</div>

<?php get_footer();
