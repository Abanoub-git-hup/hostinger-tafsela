<?php
/**
 * The header for our theme
 *
 * @package Plexify
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <!-- ===================== STICKY HEADER / NAV ===================== -->
    <header class="site-header" id="site-header" role="banner">
        <nav class="nav" aria-label="Main navigation">
            <!-- Logo pill -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" aria-label="<?php bloginfo( 'name' ); ?>">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                ?>
                    <span class="nav__logo-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <rect width="22" height="22" rx="6" fill="#6EFF6A"/>
                            <path d="M4 16 L4 8 L8 13 L11 8 L14 13 L18 8 L18 16" stroke="#1a1a1a" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </span>
                    <span class="nav__logo-text">☰ Menu</span>
                <?php } ?>
            </a>

            <!-- Desktop nav links -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'nav__links',
                    'fallback_cb'    => false, // Don't display default page list if menu not set
                )
            );
            ?>

            <!-- CTA -->
            <a href="#contact" class="nav__cta" aria-label="Let's talk">
                <?php esc_html_e( "Let's talk", 'plexify' ); ?> <span aria-hidden="true">→</span>
            </a>
        </nav>
    </header>