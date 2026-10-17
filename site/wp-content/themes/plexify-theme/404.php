<?php
/**
 * 404.php — Plexify Theme
 * صفحة الخطأ 404
 *
 * @package Plexify
 */

get_header(); ?>

<div class="plexify-container plexify-404">
    <main class="plexify-main-content" role="main">
        <section class="plexify-404-content">
            <h1 class="plexify-404-title">404</h1>
            <h2 class="plexify-404-subtitle"><?php esc_html_e( 'الصفحة غير موجودة', 'plexify' ); ?></h2>
            <p class="plexify-404-text">
                <?php esc_html_e( 'عذراً، الصفحة التي تبحث عنها ربما حُذفت أو غُيِّر مسارها أو غير متوفرة مؤقتاً.', 'plexify' ); ?>
            </p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-pill">
                <?php esc_html_e( 'العودة للرئيسية', 'plexify' ); ?> →
            </a>

            <div class="plexify-404-search">
                <?php get_search_form(); ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
