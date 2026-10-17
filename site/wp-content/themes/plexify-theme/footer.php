<?php
/**
 * footer.php — Plexify Theme
 * الفوتر الكامل + زر العودة للأعلى
 */
?>
</main><!-- /#main-content -->

<!-- ===================== FOOTER ===================== -->
<footer class="footer" id="contact" role="contentinfo">
    <div class="footer__inner">

        <!-- القسم الأيسر: عنوان + CTA + سوشيال -->
        <div class="footer__left">
            <h2 class="footer__heading">
                <?php esc_html_e( 'Take your', 'plexify' ); ?><br>
                <?php esc_html_e( 'brand to the', 'plexify' ); ?><br>
                <?php esc_html_e( 'next level with', 'plexify' ); ?><br>
                <em class="footer__brand"><?php bloginfo( 'name' ); ?></em>
            </h2>

            <a href="mailto:<?php echo sanitize_email( get_theme_mod( 'plexify_email_1', 'hello@example.com' ) ); ?>"
               class="btn-pill"
               aria-label="<?php esc_attr_e( "Let's talk — contact us", 'plexify' ); ?>">
                <?php esc_html_e( "Let's talk", 'plexify' ); ?> →
            </a>

            <!-- روابط السوشيال -->
            <ul class="footer__social" role="list" aria-label="<?php esc_attr_e( 'Social media links', 'plexify' ); ?>">
                <?php
                $networks = [
                    'linkedin'  => __( 'LINKEDIN', 'plexify' ),
                    'instagram' => __( 'INSTAGRAM', 'plexify' ),
                    'twitter'   => __( 'X', 'plexify' ),
                    'facebook'  => __( 'FACEBOOK', 'plexify' ),
                ];
                foreach ( $networks as $key => $label ) :
                    $url = get_theme_mod( "plexify_social_{$key}", '#' );
                    if ( $url && '#' !== $url ) : ?>
                        <li>
                            <a href="<?php echo esc_url( $url ); ?>"
                               class="footer__social-link"
                               target="_blank"
                               rel="noopener noreferrer"
                               aria-label="<?php echo esc_attr( $label ); ?>">
                                <?php echo esc_html( $label ); ?>
                            </a>
                        </li>
                    <?php endif;
                endforeach; ?>
                <?php
                // Fallback إذا لم تُضبط روابط السوشيال
                if ( '#' === get_theme_mod( 'plexify_social_linkedin', '#' ) ) :
                    foreach ( $networks as $key => $label ) : ?>
                        <li><a href="#" class="footer__social-link"><?php echo esc_html( $label ); ?></a></li>
                    <?php endforeach;
                endif; ?>
            </ul>
        </div>

        <!-- القسم الأيمن: رسم + قوائم التنقل -->
        <div class="footer__right">

            <!-- رسم توضيحي SVG -->
            <div class="footer__illustration" aria-hidden="true">
                <svg viewBox="0 0 200 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="100" cy="160" rx="55" ry="8" fill="rgba(110,255,106,0.12)"/>
                    <rect x="72" y="90" width="56" height="60" rx="8" fill="#1a3a1a"/>
                    <rect x="76" y="90" width="48" height="60" rx="6" fill="#6EFF6A"/>
                    <ellipse cx="100" cy="76" rx="22" ry="24" fill="#c8a882"/>
                    <path d="M78 68 Q80 48 100 50 Q120 48 122 68 Q115 60 100 62 Q85 60 78 68Z" fill="#1a1a1a"/>
                    <rect x="60" y="130" width="80" height="6" rx="3" fill="#2a2a2a"/>
                    <rect x="64" y="105" width="72" height="28" rx="4" fill="#0d0d0d"/>
                    <rect x="66" y="107" width="68" height="24" rx="3" fill="#1a2a1a"/>
                    <rect x="68" y="109" width="64" height="20" rx="2" fill="rgba(110,255,106,0.15)"/>
                    <path d="M76 105 Q60 115 62 130" stroke="#c8a882" stroke-width="10" stroke-linecap="round" fill="none"/>
                    <path d="M124 105 Q140 115 138 130" stroke="#c8a882" stroke-width="10" stroke-linecap="round" fill="none"/>
                </svg>
            </div>

            <!-- قوائم الفوتر -->
            <nav class="footer__nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'plexify' ); ?>">

                <!-- عمود: الشركة -->
                <div class="footer__nav-col">
                    <h3 class="footer__nav-title"><?php esc_html_e( 'Company', 'plexify' ); ?></h3>
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'footer-col-1',
                        'container'      => false,
                        'fallback_cb'    => function () {
                            echo '<ul role="list">';
                            echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'plexify' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/#about' ) ) . '">' . esc_html__( 'About us', 'plexify' ) . '</a></li>';
                            echo '<li><a href="' . esc_url( home_url( '/#services' ) ) . '">' . esc_html__( 'Services', 'plexify' ) . '</a></li>';
                            echo '</ul>';
                        },
                    ] );
                    ?>
                </div>

                <!-- عمود: التواصل -->
                <div class="footer__nav-col">
                    <h3 class="footer__nav-title"><?php esc_html_e( 'Send a Message', 'plexify' ); ?></h3>
                    <ul role="list">
                        <?php
                        $email1 = sanitize_email( get_theme_mod( 'plexify_email_1', 'hello@example.com' ) );
                        $email2 = sanitize_email( get_theme_mod( 'plexify_email_2', 'info@example.com' ) );
                        if ( $email1 ) echo '<li><a href="mailto:' . esc_attr( $email1 ) . '">' . esc_html( $email1 ) . '</a></li>';
                        if ( $email2 ) echo '<li><a href="mailto:' . esc_attr( $email2 ) . '">' . esc_html( $email2 ) . '</a></li>';
                        ?>
                    </ul>
                </div>

                <!-- عمود: الهاتف -->
                <div class="footer__nav-col">
                    <h3 class="footer__nav-title"><?php esc_html_e( 'Call us', 'plexify' ); ?></h3>
                    <ul role="list">
                        <?php
                        $phone1 = sanitize_text_field( get_theme_mod( 'plexify_phone_1', '+1 234 567 8910' ) );
                        $phone2 = sanitize_text_field( get_theme_mod( 'plexify_phone_2', '+1 987 654 3210' ) );
                        $tel1   = preg_replace( '/[^+\d]/', '', $phone1 );
                        $tel2   = preg_replace( '/[^+\d]/', '', $phone2 );
                        if ( $phone1 ) echo '<li><a href="tel:' . esc_attr( $tel1 ) . '">' . esc_html( $phone1 ) . '</a></li>';
                        if ( $phone2 ) echo '<li><a href="tel:' . esc_attr( $tel2 ) . '">' . esc_html( $phone2 ) . '</a></li>';
                        ?>
                    </ul>
                </div>

            </nav><!-- /.footer__nav -->
        </div><!-- /.footer__right -->
    </div><!-- /.footer__inner -->

    <!-- شريط حقوق النشر -->
    <div class="footer__bottom">
        <p class="footer__copy">
            <?php echo wp_kses_post( get_theme_mod( 'plexify_copyright', 'Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '. All Rights Reserved.' ) ); ?>
        </p>
        <div class="footer__logo-mark" aria-label="<?php bloginfo( 'name' ); ?>">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                <rect width="22" height="22" rx="6" fill="#6EFF6A"/>
                <path d="M4 16 L4 8 L8 13 L11 8 L14 13 L18 8 L18 16"
                      stroke="#1a1a1a" stroke-width="2.2"
                      stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
            <span><?php bloginfo( 'name' ); ?></span>
        </div>
    </div>

</footer><!-- /.footer -->

<!-- زر العودة للأعلى + شريط التقدم -->
<button class="scroll-top" id="scroll-top"
        aria-label="<?php esc_attr_e( 'Scroll to top — shows scroll progress', 'plexify' ); ?>">
    <svg class="scroll-top__ring" viewBox="0 0 44 44" aria-hidden="true">
        <circle class="scroll-top__track" cx="22" cy="22" r="18"/>
        <circle class="scroll-top__fill"  id="scroll-top-fill" cx="22" cy="22" r="18"/>
    </svg>
    <span class="scroll-top__pct" id="scroll-top-pct">↑</span>
</button>

<?php wp_footer(); // يُحقن هنا: scripts JS وكل ما سجّله الثيم/الإضافات ?>
</body>
</html>
