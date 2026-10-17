<?php
/**
 * Plexify functions and definitions
 *
 * @package Plexify
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Enqueue scripts and styles.
 */
function plexify_scripts() {
    // Google Fonts
    wp_enqueue_style( 'plexify-google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,900&family=Syne:wght@700;800&family=DM+Sans:wght@400;500;700&display=swap', array(), null );

    // Main Style
    wp_enqueue_style( 'plexify-style', get_stylesheet_uri(), array(), _S_VERSION );

    // Main JS (Loaded in footer)
    wp_enqueue_script( 'plexify-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );

    // Localize script for AJAX or translations if needed
    // wp_localize_script( 'plexify-main', 'plexifyObj', array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'plexify_scripts' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function plexify_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 800, 600, true ); // Default size
    add_image_size( 'plexify-blog-thumb', 150, 150, true ); // For blog cards

    // Register Navigation Menus
    register_nav_menus(
        array(
            'menu-1' => __( 'Primary Menu', 'plexify' ),
            'footer-menu' => __( 'Footer Menu', 'plexify' ),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support forSelective Refresh for Widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 100,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'plexify_setup' );

/**
 * Register widget area.
 */
function plexify_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Widgets', 'plexify' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'plexify' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'plexify_widgets_init' );

/**
 * Load textdomain for translation.
 */
function plexify_load_textdomain() {
    load_theme_textdomain( 'plexify', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'plexify_load_textdomain' );