<?php
/**
 * sidebar.php — Plexify Theme
 * الشريط الجانبي
 *
 * @package Plexify
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
    return;
}
?>

<aside class="plexify-sidebar" role="complementary" aria-label="<?php esc_attr_e( 'الشريط الجانبي', 'plexify' ); ?>">
    <?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside>
