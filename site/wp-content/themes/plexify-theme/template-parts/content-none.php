<?php
/**
 * template-parts/content-none.php — Plexify Theme
 * يظهر حين لا توجد منشورات
 *
 * @package Plexify
 */
?>
<section class="plexify-no-results">
    <header>
        <h2><?php esc_html_e( 'لا توجد نتائج', 'plexify' ); ?></h2>
    </header>
    <div class="plexify-no-results__content">
        <?php if ( is_search() ) : ?>
            <p><?php esc_html_e( 'لم يتم العثور على أي نتائج مطابقة. جرّب مصطلحاً مختلفاً.', 'plexify' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'يبدو أنه لا يوجد محتوى بعد. إذا كنت تستخدم إعداد WordPress الافتراضي، فحاول نشر أول منشور لك.', 'plexify' ); ?></p>
        <?php endif; ?>
    </div>
</section>
