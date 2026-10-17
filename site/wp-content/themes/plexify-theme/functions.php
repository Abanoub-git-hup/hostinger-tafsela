<?php
/**
 * functions.php — Plexify Theme
 * إعداد الثيم الكامل: enqueue، دعم الميزات، القوائم، الـ widgets، الـ Customizer
 *
 * @package Plexify
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // حماية من الوصول المباشر

// تحميل الملفات المساعدة
require_once get_template_directory() . '/inc/helpers.php';

/* =============================================================
   1. THEME SETUP
   ============================================================= */
function plexify_setup() {

    // تحميل ملف الترجمة
    load_theme_textdomain( 'plexify', get_template_directory() . '/languages' );

    // إضافة <title> تلقائياً من WP (بدون كتابته يدوياً في header.php)
    add_theme_support( 'title-tag' );

    // دعم الصور المميزة للمنشورات والصفحات
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 800, 500, true );

    // شعار مخصص عبر Customizer
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );

    // روابط feed تلقائية في <head>
    add_theme_support( 'automatic-feed-links' );

    // دعم HTML5 للعناصر الشائعة
    add_theme_support( 'html5', [
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ] );

    // دعم تنسيقات المنشور
    add_theme_support( 'post-formats', [ 'aside', 'image', 'video', 'quote', 'link' ] );

    // حجم الصورة المخصص لكروت البلوق
    add_image_size( 'plexify-blog-card', 150, 90, true );
    add_image_size( 'plexify-work-card', 560, 420, true );
    add_image_size( 'plexify-avatar',     80,  80, true );

    // تسجيل مواضع القوائم
    register_nav_menus( [
        'primary'      => esc_html__( 'القائمة الرئيسية', 'plexify' ),
        'footer-col-1' => esc_html__( 'قائمة الفوتر — الشركة', 'plexify' ),
        'social'       => esc_html__( 'روابط السوشيال ميديا', 'plexify' ),
    ] );

    // دعم Selective Refresh في Customizer
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'plexify_setup' );

/* =============================================================
   2. ENQUEUE STYLES & SCRIPTS
   ============================================================= */
function plexify_enqueue_assets() {

    $ver = wp_get_theme()->get( 'Version' );
    $uri = get_template_directory_uri();

    // --- Google Fonts ---
    wp_enqueue_style(
        'plexify-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,900&family=Syne:wght@700;800&family=DM+Sans:wght@400;500;700&display=swap',
        [],
        null  // لا نضع version للخطوط الخارجية
    );

    // --- Main CSS ---
    wp_enqueue_style(
        'plexify-main',
        $uri . '/assets/css/main.css',
        [ 'plexify-google-fonts' ],
        $ver
    );

    // --- Theme style.css (مطلوب لـ WP) ---
    wp_enqueue_style(
        'plexify-style',
        get_stylesheet_uri(),
        [ 'plexify-main' ],
        $ver
    );

    // --- Blog / Archive CSS (يُحمَّل في صفحات المدونة والمنشورات) ---
    if ( ! is_front_page() || is_home() ) {
        wp_enqueue_style(
            'plexify-blog',
            $uri . '/assets/css/blog.css',
            [ 'plexify-main' ],
            $ver
        );
    }

    // --- Main JS (في الفوتر، بدون jQuery) ---
    wp_enqueue_script(
        'plexify-main',
        $uri . '/assets/js/main.js',
        [], // لا اعتماديات
        $ver,
        true // تحميل في الفوتر
    );

    // --- تمرير بيانات PHP إلى JS عبر wp_localize_script ---
    wp_localize_script( 'plexify-main', 'plexifyData', [
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'plexify_nonce' ),
        'siteUrl'   => esc_url( home_url( '/' ) ),
        'themeUrl'  => esc_url( $uri ),
        'blogUrl'   => esc_url( get_permalink( get_option( 'page_for_posts' ) ) ),
        'i18n'      => [
            'loading' => esc_html__( 'جارٍ التحميل...', 'plexify' ),
            'error'   => esc_html__( 'حدث خطأ ما.', 'plexify' ),
        ],
    ] );

    // --- تعليق صفحة المنشور الفردي ---
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'plexify_enqueue_assets' );

/* =============================================================
   3. WIDGETS / SIDEBARS
   ============================================================= */
function plexify_register_sidebars() {

    $defaults = [
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ];

    register_sidebar( array_merge( $defaults, [
        'name'        => esc_html__( 'الشريط الجانبي الرئيسي', 'plexify' ),
        'id'          => 'sidebar-main',
        'description' => esc_html__( 'يظهر في صفحات المدونة والمنشورات المفردة.', 'plexify' ),
    ] ) );

    register_sidebar( array_merge( $defaults, [
        'name'        => esc_html__( 'ويدجت الفوتر', 'plexify' ),
        'id'          => 'footer-widget',
        'description' => esc_html__( 'يظهر في منطقة الفوتر.', 'plexify' ),
    ] ) );
}
add_action( 'widgets_init', 'plexify_register_sidebars' );

/* =============================================================
   4. CUSTOMIZER — إعدادات التخصيص
   ============================================================= */
function plexify_customize_register( $wp_customize ) {

    /* ---- قسم: إعدادات الهيرو ---- */
    $wp_customize->add_section( 'plexify_hero', [
        'title'    => esc_html__( 'قسم الهيرو', 'plexify' ),
        'priority' => 30,
    ] );

    // نص الـ badge
    $wp_customize->add_setting( 'plexify_hero_badge', [
        'default'           => __( 'Boost Your Brand with Cutting-Edge Digital Marketing!', 'plexify' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'plexify_hero_badge', [
        'label'   => esc_html__( 'نص الـ Badge', 'plexify' ),
        'section' => 'plexify_hero',
        'type'    => 'text',
    ] );

    // نص CTA
    $wp_customize->add_setting( 'plexify_hero_cta_text', [
        'default'           => __( "Let's talk", 'plexify' ),
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'plexify_hero_cta_text', [
        'label'   => esc_html__( 'نص زر CTA', 'plexify' ),
        'section' => 'plexify_hero',
        'type'    => 'text',
    ] );

    /* ---- قسم: الـ About ---- */
    $wp_customize->add_section( 'plexify_about', [
        'title'    => esc_html__( 'قسم من نحن', 'plexify' ),
        'priority' => 35,
    ] );

    $wp_customize->add_setting( 'plexify_about_stat1_num', [
        'default'           => '120k',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_about_stat1_num', [
        'label'   => esc_html__( 'الإحصائية الأولى (رقم)', 'plexify' ),
        'section' => 'plexify_about',
        'type'    => 'text',
    ] );

    $wp_customize->add_setting( 'plexify_about_stat1_label', [
        'default'           => 'Active members inside the program',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_about_stat1_label', [
        'label'   => esc_html__( 'الإحصائية الأولى (وصف)', 'plexify' ),
        'section' => 'plexify_about',
        'type'    => 'text',
    ] );

    $wp_customize->add_setting( 'plexify_about_stat2_num', [
        'default'           => '72+',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_about_stat2_num', [
        'label'   => esc_html__( 'الإحصائية الثانية (رقم)', 'plexify' ),
        'section' => 'plexify_about',
        'type'    => 'text',
    ] );

    /* ---- قسم: معلومات التواصل ---- */
    $wp_customize->add_section( 'plexify_contact', [
        'title'    => esc_html__( 'معلومات التواصل', 'plexify' ),
        'priority' => 40,
    ] );

    $wp_customize->add_setting( 'plexify_email_1', [
        'default'           => 'hello@example.com',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'plexify_email_1', [
        'label'   => esc_html__( 'البريد الإلكتروني الأول', 'plexify' ),
        'section' => 'plexify_contact',
        'type'    => 'email',
    ] );

    $wp_customize->add_setting( 'plexify_email_2', [
        'default'           => 'info@example.com',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'plexify_email_2', [
        'label'   => esc_html__( 'البريد الإلكتروني الثاني', 'plexify' ),
        'section' => 'plexify_contact',
        'type'    => 'email',
    ] );

    $wp_customize->add_setting( 'plexify_phone_1', [
        'default'           => '+1 234 567 8910',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_phone_1', [
        'label'   => esc_html__( 'رقم الهاتف الأول', 'plexify' ),
        'section' => 'plexify_contact',
        'type'    => 'text',
    ] );

    $wp_customize->add_setting( 'plexify_phone_2', [
        'default'           => '+1 987 654 3210',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_phone_2', [
        'label'   => esc_html__( 'رقم الهاتف الثاني', 'plexify' ),
        'section' => 'plexify_contact',
        'type'    => 'text',
    ] );

    /* ---- قسم: روابط السوشيال ---- */
    $wp_customize->add_section( 'plexify_social', [
        'title'    => esc_html__( 'روابط السوشيال ميديا', 'plexify' ),
        'priority' => 45,
    ] );

    foreach ( [ 'linkedin', 'instagram', 'twitter', 'facebook' ] as $network ) {
        $wp_customize->add_setting( "plexify_social_{$network}", [
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ] );
        $wp_customize->add_control( "plexify_social_{$network}", [
            'label'   => esc_html( ucfirst( $network ) ),
            'section' => 'plexify_social',
            'type'    => 'url',
        ] );
    }

    /* ---- قسم: التقييمات ---- */
    $wp_customize->add_section( 'plexify_ratings', [
        'title'    => esc_html__( 'التقييمات والشهادات', 'plexify' ),
        'priority' => 50,
    ] );

    $wp_customize->add_setting( 'plexify_trustpilot_score', [
        'default'           => '4.5',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_trustpilot_score', [
        'label'   => esc_html__( 'تقييم Trustpilot', 'plexify' ),
        'section' => 'plexify_ratings',
        'type'    => 'text',
    ] );

    $wp_customize->add_setting( 'plexify_clutch_score', [
        'default'           => '4.9/5',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'plexify_clutch_score', [
        'label'   => esc_html__( 'تقييم Clutch', 'plexify' ),
        'section' => 'plexify_ratings',
        'type'    => 'text',
    ] );

    /* ---- قسم: الفوتر ---- */
    $wp_customize->add_section( 'plexify_footer', [
        'title'    => esc_html__( 'إعدادات الفوتر', 'plexify' ),
        'priority' => 55,
    ] );

    $wp_customize->add_setting( 'plexify_copyright', [
        'default'           => 'Copyright © ' . date( 'Y' ) . ' Plexify. All Rights Reserved.',
        'sanitize_callback' => 'wp_kses_post',
    ] );
    $wp_customize->add_control( 'plexify_copyright', [
        'label'   => esc_html__( 'نص حقوق النشر', 'plexify' ),
        'section' => 'plexify_footer',
        'type'    => 'textarea',
    ] );

    /* ---- لون الـ Accent (Lime) ---- */
    $wp_customize->add_setting( 'plexify_accent_color', [
        'default'           => '#6EFF6A',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'plexify_accent_color', [
        'label'   => esc_html__( 'لون الـ Accent (Lime)', 'plexify' ),
        'section' => 'colors',
    ] ) );
}
add_action( 'customize_register', 'plexify_customize_register' );

/* =============================================================
   5. CSS ديناميكي من Customizer (Accent Color)
   ============================================================= */
function plexify_customizer_css() {
    $accent = get_theme_mod( 'plexify_accent_color', '#6EFF6A' );
    ?>
    <style id="plexify-customizer-css">
        :root {
            --lime: <?php echo esc_attr( $accent ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'plexify_customizer_css' );

/* =============================================================
   6. HELPER FUNCTIONS
   ============================================================= */

/**
 * إرجاع رابط السوشيال بشكل آمن
 */
function plexify_get_social_url( string $network ): string {
    return esc_url( get_theme_mod( "plexify_social_{$network}", '#' ) );
}

/**
 * إرجاع إحصائية من Customizer
 */
function plexify_get_stat( string $key, string $default = '' ): string {
    return esc_html( get_theme_mod( "plexify_about_{$key}", $default ) );
}

/**
 * إرجاع نص الـ badge
 */
function plexify_get_hero_badge(): string {
    return esc_html( get_theme_mod( 'plexify_hero_badge', __( 'Boost Your Brand with Cutting-Edge Digital Marketing!', 'plexify' ) ) );
}

/**
 * SVG شعار الثيم (fallback إذا لم يُرفع شعار مخصص)
 */
function plexify_logo_svg(): string {
    return '<svg width="22" height="22" viewBox="0 0 22 22" fill="none" aria-hidden="true">
        <rect width="22" height="22" rx="6" fill="#6EFF6A"/>
        <path d="M4 16 L4 8 L8 13 L11 8 L14 13 L18 8 L18 16" stroke="#1a1a1a" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
    </svg>';
}

/**
 * عرض الشعار: يستخدم custom-logo إذا مُعيَّن وإلا SVG افتراضي
 */
function plexify_the_logo(): void {
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="nav__logo-fallback" aria-label="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
        echo plexify_logo_svg();
        echo '<span>' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
        echo '</a>';
    }
}

/**
 * عرض الشهادات من Custom Post Type (إن وجد) أو fallback ثابت
 */
function plexify_get_testimonials( int $limit = 3 ): WP_Query {
    return new WP_Query( [
        'post_type'      => 'plexify_testimonial',
        'posts_per_page' => $limit,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ] );
}

/* =============================================================
   7. CUSTOM POST TYPES
   ============================================================= */
function plexify_register_post_types(): void {

    // نوع منشور: الشهادات
    register_post_type( 'plexify_testimonial', [
        'labels' => [
            'name'          => esc_html__( 'الشهادات', 'plexify' ),
            'singular_name' => esc_html__( 'شهادة', 'plexify' ),
            'add_new_item'  => esc_html__( 'إضافة شهادة جديدة', 'plexify' ),
            'edit_item'     => esc_html__( 'تعديل الشهادة', 'plexify' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'page-attributes' ],
        'menu_position' => 25,
        'show_in_rest'  => true,
    ] );

    // نوع منشور: الأعمال (Portfolio)
    register_post_type( 'plexify_work', [
        'labels' => [
            'name'          => esc_html__( 'الأعمال', 'plexify' ),
            'singular_name' => esc_html__( 'عمل', 'plexify' ),
            'add_new_item'  => esc_html__( 'إضافة عمل جديد', 'plexify' ),
        ],
        'public'        => true,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-portfolio',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'work' ],
        'show_in_rest'  => true,
    ] );

    // نوع منشور: الخدمات
    register_post_type( 'plexify_service', [
        'labels' => [
            'name'          => esc_html__( 'الخدمات', 'plexify' ),
            'singular_name' => esc_html__( 'خدمة', 'plexify' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-star-filled',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'page-attributes' ],
        'show_in_rest'  => true,
    ] );
}
add_action( 'init', 'plexify_register_post_types' );

/* =============================================================
   8. CUSTOM TAXONOMIES
   ============================================================= */
function plexify_register_taxonomies(): void {
    register_taxonomy( 'work_category', 'plexify_work', [
        'labels'       => [
            'name'          => esc_html__( 'تصنيفات الأعمال', 'plexify' ),
            'singular_name' => esc_html__( 'تصنيف', 'plexify' ),
        ],
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'work-category' ],
    ] );
}
add_action( 'init', 'plexify_register_taxonomies' );

/* =============================================================
   9. EXCERPT LENGTH
   ============================================================= */
function plexify_excerpt_length( int $length ): int {
    return is_admin() ? $length : 20;
}
add_filter( 'excerpt_length', 'plexify_excerpt_length' );

function plexify_excerpt_more( string $more ): string {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'plexify_excerpt_more' );

/* =============================================================
   10. BODY CLASS إضافي
   ============================================================= */
function plexify_body_classes( array $classes ): array {
    if ( is_front_page() ) {
        $classes[] = 'plexify-front';
    }
    if ( ! is_singular() ) {
        $classes[] = 'plexify-archive';
    }
    return $classes;
}
add_filter( 'body_class', 'plexify_body_classes' );

/* =============================================================
   11. PRECONNECT للـ Google Fonts (أداء)
   ============================================================= */
function plexify_resource_hints( array $urls, string $relation_type ): array {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = [ 'href' => 'https://fonts.googleapis.com' ];
        $urls[] = [ 'href' => 'https://fonts.gstatic.com', 'crossorigin' => true ];
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'plexify_resource_hints', 10, 2 );

/* =============================================================
   12. REMOVE EMOJI SCRIPTS (تحسين أداء)
   ============================================================= */
remove_action( 'wp_head',             'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script'    );
remove_action( 'wp_print_styles',     'print_emoji_styles'              );
remove_action( 'admin_print_styles',  'print_emoji_styles'              );
remove_filter( 'the_content_feed',    'wp_staticize_emoji'              );
remove_filter( 'comment_text_rss',    'wp_staticize_emoji'              );
remove_filter( 'wp_mail',             'wp_staticize_emoji_for_email'    );

/* =============================================================
   13. AJAX: تحميل مزيد من منشورات المدونة
   ============================================================= */
function plexify_load_more_posts(): void {
    check_ajax_referer( 'plexify_nonce', 'nonce' );

    $page     = isset( $_POST['page'] ) ? absint( $_POST['page'] ) : 1;
    $per_page = isset( $_POST['per_page'] ) ? absint( $_POST['per_page'] ) : 5;

    $query = new WP_Query( [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => $per_page,
        'paged'          => $page,
    ] );

    if ( ! $query->have_posts() ) {
        wp_send_json_error( [ 'message' => __( 'لا توجد منشورات إضافية.', 'plexify' ) ] );
    }

    ob_start();
    while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part( 'template-parts/content', 'blog-card' );
    }
    wp_reset_postdata();

    wp_send_json_success( [
        'html'     => ob_get_clean(),
        'maxPages' => $query->max_num_pages,
    ] );
}
add_action( 'wp_ajax_plexify_load_more',        'plexify_load_more_posts' );
add_action( 'wp_ajax_nopriv_plexify_load_more', 'plexify_load_more_posts' );
