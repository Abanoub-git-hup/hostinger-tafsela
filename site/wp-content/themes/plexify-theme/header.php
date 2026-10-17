<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // يُحقن هنا: title-tag, CSS links, fonts, etc. ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); // hook لإضافة محتوى بعد <body> (مطلوب من WP 5.2+) ?>

<!-- ===================== STICKY HEADER / NAV ===================== -->
<header class="site-header" id="site-header" role="banner">
    <nav class="nav" aria-label="<?php esc_attr_e( 'Main navigation', 'plexify' ); ?>">

        <!-- الشعار -->
        <div class="nav__logo-wrap">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                   class="nav__logo"
                   aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> <?php esc_attr_e( 'Home', 'plexify' ); ?>">
                    <span class="nav__logo-icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <rect width="22" height="22" rx="6" fill="#6EFF6A"/>
                            <path d="M4 16 L4 8 L8 13 L11 8 L14 13 L18 8 L18 16"
                                  stroke="#1a1a1a" stroke-width="2.2"
                                  stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        </svg>
                    </span>
                    <span class="nav__logo-text">☰ <?php esc_html_e( 'Menu', 'plexify' ); ?></span>
                </a>
            <?php endif; ?>
        </div>

        <!-- القائمة الرئيسية -->
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_class'     => 'nav__links',
            'container'      => false,
            'menu_id'        => 'nav-links',
            'fallback_cb'    => function () {
                // fallback إذا لم تُسجَّل قائمة بعد
                echo '<ul class="nav__links" id="nav-links" role="list">';
                echo '<li><a href="' . esc_url( home_url( '/#about' ) )       . '" class="nav__link">' . esc_html__( 'About',    'plexify' ) . '</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/#work' ) )        . '" class="nav__link">' . esc_html__( 'Work',     'plexify' ) . '</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/#services' ) )    . '" class="nav__link">' . esc_html__( 'Services', 'plexify' ) . '</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/#process' ) )     . '" class="nav__link">' . esc_html__( 'Process',  'plexify' ) . '</a></li>';
                echo '<li><a href="' . esc_url( home_url( '/#blog' ) )        . '" class="nav__link">' . esc_html__( 'Blog',     'plexify' ) . '</a></li>';
                echo '</ul>';
            },
        ] );
        ?>

        <!-- زر CTA مغناطيسي -->
        <div class="nav__cta-wrap js-magnetic" data-strength="35">
            <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"
               class="nav__cta"
               aria-label="<?php esc_attr_e( "Let's talk", 'plexify' ); ?>">
                <span class="nav__cta-inner">
                    <?php echo esc_html( get_theme_mod( 'plexify_hero_cta_text', __( "Let's talk", 'plexify' ) ) ); ?>
                    <span class="nav__cta-arrow" aria-hidden="true">→</span>
                </span>
            </a>
        </div>

    </nav>
</header>

<main id="main-content" role="main">
