<?php
/**
 * inc/helpers.php — Plexify Theme
 * دوال مساعدة عامة: SVG kses، قراءة الوقت، meta boxes
 *
 * @package Plexify
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* =============================================================
   1. SVG KSES — قائمة العلامات والسمات المسموح بها لـ SVG
   ============================================================= */
function plexify_allowed_svg_kses(): array {
    return [
        'svg'      => [ 'viewBox' => true, 'fill' => true, 'xmlns' => true, 'width' => true, 'height' => true, 'aria-hidden' => true, 'role' => true ],
        'path'     => [ 'd' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-linejoin' => true, 'fill' => true, 'opacity' => true ],
        'circle'   => [ 'cx' => true, 'cy' => true, 'r' => true, 'stroke' => true, 'stroke-width' => true, 'fill' => true, 'opacity' => true ],
        'ellipse'  => [ 'cx' => true, 'cy' => true, 'rx' => true, 'ry' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ],
        'rect'     => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true, 'ry' => true, 'fill' => true, 'stroke' => true, 'stroke-width' => true ],
        'line'     => [ 'x1' => true, 'y1' => true, 'x2' => true, 'y2' => true, 'stroke' => true, 'stroke-width' => true, 'stroke-linecap' => true, 'stroke-dasharray' => true ],
        'polygon'  => [ 'points' => true, 'fill' => true, 'opacity' => true ],
        'g'        => [ 'fill' => true, 'stroke' => true, 'opacity' => true ],
        'text'     => [ 'font-size' => true, 'fill' => true, 'font-family' => true, 'font-weight' => true, 'letter-spacing' => true ],
        'textPath' => [ 'href' => true ],
        'defs'     => [],
        'title'    => [],
    ];
}

/* =============================================================
   2. READ TIME — حساب وقت القراءة التقديري
   ============================================================= */
function plexify_get_reading_time(): string {
    $content   = get_the_content();
    $word_count = str_word_count( wp_strip_all_tags( $content ) );
    $minutes   = max( 1, (int) ceil( $word_count / 200 ) );
    return sprintf(
        esc_html( _n( '%d دقيقة للقراءة', '%d دقائق للقراءة', $minutes, 'plexify' ) ),
        $minutes
    );
}

/* =============================================================
   3. META BOXES — حقول مخصصة للـ CPTs
   ============================================================= */
function plexify_register_meta_boxes(): void {

    // Meta box للشهادة: شركة العميل
    add_meta_box(
        'plexify_testimonial_meta',
        esc_html__( 'تفاصيل الشهادة', 'plexify' ),
        'plexify_testimonial_meta_cb',
        'plexify_testimonial',
        'normal',
        'high'
    );

    // Meta box للخدمة: Tag + Features
    add_meta_box(
        'plexify_service_meta',
        esc_html__( 'تفاصيل الخدمة', 'plexify' ),
        'plexify_service_meta_cb',
        'plexify_service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'plexify_register_meta_boxes' );

/* callback الشهادة */
function plexify_testimonial_meta_cb( WP_Post $post ): void {
    wp_nonce_field( 'plexify_testimonial_nonce', 'plexify_testimonial_nonce_field' );
    $company = get_post_meta( $post->ID, '_plexify_company', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="plexify_company"><?php esc_html_e( 'اسم الشركة / المنصب', 'plexify' ); ?></label></th>
            <td>
                <input type="text"
                       id="plexify_company"
                       name="plexify_company"
                       value="<?php echo esc_attr( $company ); ?>"
                       class="regular-text"
                       placeholder="<?php esc_attr_e( 'مثال: Power XR2 Module', 'plexify' ); ?>">
            </td>
        </tr>
    </table>
    <?php
}

/* callback الخدمة */
function plexify_service_meta_cb( WP_Post $post ): void {
    wp_nonce_field( 'plexify_service_nonce', 'plexify_service_nonce_field' );
    $tag      = get_post_meta( $post->ID, '_plexify_tag', true );
    $features = get_post_meta( $post->ID, '_plexify_features', true );
    $icon_svg = get_post_meta( $post->ID, '_plexify_icon_svg', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="plexify_tag"><?php esc_html_e( 'الوسم (Tag)', 'plexify' ); ?></label></th>
            <td>
                <input type="text" id="plexify_tag" name="plexify_tag"
                       value="<?php echo esc_attr( $tag ); ?>" class="regular-text"
                       placeholder="<?php esc_attr_e( 'SEO, Email Campaign, ...', 'plexify' ); ?>">
            </td>
        </tr>
        <tr>
            <th><label for="plexify_features"><?php esc_html_e( 'مزايا الخدمة (سطر لكل ميزة)', 'plexify' ); ?></label></th>
            <td>
                <textarea id="plexify_features" name="plexify_features" rows="5" class="large-text"><?php echo esc_textarea( $features ); ?></textarea>
                <p class="description"><?php esc_html_e( 'اكتب كل ميزة في سطر منفصل.', 'plexify' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="plexify_icon_svg"><?php esc_html_e( 'كود SVG الأيقونة', 'plexify' ); ?></label></th>
            <td>
                <textarea id="plexify_icon_svg" name="plexify_icon_svg" rows="4" class="large-text"><?php echo esc_textarea( $icon_svg ); ?></textarea>
                <p class="description"><?php esc_html_e( 'الصق كود SVG للأيقونة هنا (اختياري).', 'plexify' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/* حفظ Meta Boxes */
function plexify_save_meta_boxes( int $post_id ): void {

    // Testimonial
    if ( isset( $_POST['plexify_testimonial_nonce_field'] )
         && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['plexify_testimonial_nonce_field'] ) ), 'plexify_testimonial_nonce' )
         && current_user_can( 'edit_post', $post_id ) ) {
        update_post_meta( $post_id, '_plexify_company', sanitize_text_field( wp_unslash( $_POST['plexify_company'] ?? '' ) ) );
    }

    // Service
    if ( isset( $_POST['plexify_service_nonce_field'] )
         && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['plexify_service_nonce_field'] ) ), 'plexify_service_nonce' )
         && current_user_can( 'edit_post', $post_id ) ) {
        update_post_meta( $post_id, '_plexify_tag',      sanitize_text_field( wp_unslash( $_POST['plexify_tag']      ?? '' ) ) );
        update_post_meta( $post_id, '_plexify_features', sanitize_textarea_field( wp_unslash( $_POST['plexify_features'] ?? '' ) ) );
        update_post_meta( $post_id, '_plexify_icon_svg', wp_kses( wp_unslash( $_POST['plexify_icon_svg'] ?? '' ), plexify_allowed_svg_kses() ) );
    }
}
add_action( 'save_post', 'plexify_save_meta_boxes' );

/* =============================================================
   4. تحميل Customizer Preview JS
   ============================================================= */
function plexify_customize_preview_js(): void {
    wp_enqueue_script(
        'plexify-customizer-preview',
        get_template_directory_uri() . '/inc/customizer-preview.js',
        [ 'customize-preview', 'jquery' ],
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'customize_preview_init', 'plexify_customize_preview_js' );

/* =============================================================
   5. تمييز القائمة الحالية في الـ nav (Active Link)
   ============================================================= */
function plexify_active_nav_class( array $classes, WP_Post $item ): array {
    if ( in_array( 'current-menu-item', $classes, true ) ) {
        $classes[] = 'is-active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'plexify_active_nav_class', 10, 2 );

/* =============================================================
   6. تنظيف <head> من الـ tags غير الضرورية
   ============================================================= */
remove_action( 'wp_head', 'rsd_link'                    );
remove_action( 'wp_head', 'wlwmanifest_link'             );
remove_action( 'wp_head', 'wp_generator'                 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
