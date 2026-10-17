<?php
/**
 * The template for displaying the footer
 *
 * @package Plexify
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <!-- ===================== FOOTER ===================== -->
    <footer class="footer" id="contact" role="contentinfo">
        <div class="footer__inner">
            <div class="footer__left">
                <h2 class="footer__heading"><?php printf( esc_html__( 'Take your brand to the next level with %s', 'plexify' ), '<em class="footer__brand">' . get_bloginfo( 'name' ) . '</em>' ); ?></h2>
                <a href="mailto:hello@example.com" class="btn-pill" aria-label="Let's talk — contact us"><?php esc_html_e( "Let's talk", 'plexify' ); ?> →</a>

                <ul class="footer__social" role="list" aria-label="Social media links">
                    <li><a href="#" class="footer__social-link">LINKEDIN</a></li>
                    <li><a href="#" class="footer__social-link">INSTAGRAM</a></li>
                    <li><a href="#" class="footer__social-link">X</a></li>
                    <li><a href="#" class="footer__social-link">FACEBOOK</a></li>
                </ul>
            </div>

            <div class="footer__right">
                <div class="footer__illustration" aria-hidden="true">
                   <!-- (Paste the SVG code from the HTML footer here) -->
                   <svg viewBox="0 0 200 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="100" cy="160" rx="55" ry="8" fill="rgba(110,255,106,0.12)"/>
                        <!-- ... rest of svg ... -->
                   </svg>
                </div>

                <nav class="footer__nav" aria-label="Footer navigation">
                    <?php
                    if ( has_nav_menu( 'footer-menu' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'fallback_cb' => false,
                                'depth' => 1,
                            )
                        );
                    } else {
                        // Fallback static links if no menu assigned
                        ?>
                        <div class="footer__nav-col">
                            <h3 class="footer__nav-title"><?php esc_html_e('Company', 'plexify'); ?></h3>
                            <ul role="list">
                                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'plexify'); ?></a></li>
                                <li><a href="#about"><?php esc_html_e('About us', 'plexify'); ?></a></li>
                            </ul>
                        </div>
                        <?php
                    }
                    
                    // Dynamic Widget Area
                    if ( is_active_sidebar( 'footer-1' ) ) : ?>
                        <div class="footer__nav-col">
                            <?php dynamic_sidebar( 'footer-1' ); ?>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </div>

        <div class="footer__bottom">
            <p class="footer__copy">
                <?php
                printf(
                    esc_html__( 'Copyright © %1$s %2$s. All Rights Reserved Copyright', 'plexify' ),
                    date_i18n( 'Y' ),
                    '<strong>Plexify</strong>'
                );
                ?>
            </p>
            <div class="footer__logo-mark" aria-label="Plexify">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <rect width="22" height="22" rx="6" fill="#6EFF6A"/>
                    <path d="M4 16 L4 8 L8 13 L11 8 L14 13 L18 8 L18 16" stroke="#1a1a1a" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </svg>
                <span>Plexify</span>
            </div>
        </div>
    </footer>

    <!-- Scroll to top -->
    <button class="scroll-top" id="scroll-top" aria-label="Scroll to top">↑</button>

    <?php wp_footer(); ?>

</body>
</html>