<?php
/**
 * front-page.php — Plexify Theme
 * الصفحة الرئيسية الثابتة (تُعرض عند تعيين Front Page من Settings > Reading)
 * تحتوي على جميع السيكشنز: Hero, About, Work, Services, Process, Blog, Testimonials, FAQ, Brands
 *
 * @package Plexify
 */

get_header();
?>

<!-- ===================== 1. HERO ===================== -->
<section class="hero" id="hero" aria-label="<?php esc_attr_e( 'Hero — Digital Marketing Agency', 'plexify' ); ?>">

    <!-- زخارف SVG -->
    <div class="hero__deco hero__deco--tl" aria-hidden="true">
        <svg viewBox="0 0 90 65" fill="none"><path d="M10 55 Q22 10 35 32 Q48 54 60 18 Q70 0 82 28" stroke="rgba(255,255,255,0.4)" stroke-width="3" stroke-linecap="round"/><path d="M5 42 Q18 0 30 24 Q43 48 55 12 Q65 -4 78 20" stroke="rgba(255,255,255,0.22)" stroke-width="2.5" stroke-linecap="round"/></svg>
    </div>
    <div class="hero__deco hero__deco--tr" aria-hidden="true">
        <svg viewBox="0 0 40 65" fill="none"><path d="M20 5 Q32 22 16 34 Q4 44 20 60" stroke="rgba(255,255,255,0.38)" stroke-width="2.5" stroke-linecap="round"/></svg>
    </div>
    <div class="hero__deco hero__deco--pen" aria-hidden="true">
        <svg viewBox="0 0 28 82" fill="none"><rect x="7" y="0" width="14" height="56" rx="7" fill="#00CFCF"/><polygon points="7,56 21,56 14,76" fill="#00CFCF"/><rect x="9" y="58" width="10" height="6" rx="3" fill="#1a1a1a"/></svg>
    </div>
    <div class="hero__deco hero__deco--br" aria-hidden="true">
        <svg viewBox="0 0 110 55" fill="none"><path d="M5 28 Q28 5 50 28 Q72 50 90 18 Q102 5 110 28" stroke="rgba(255,255,255,0.38)" stroke-width="3" stroke-linecap="round"/></svg>
    </div>

    <div class="hero__content">
        <div class="hero__line hero__line--1">
            <span class="hero__we"><?php esc_html_e( 'WE', 'plexify' ); ?></span>
            <span class="hero__are-wrap" aria-label="<?php esc_attr_e( 'are a', 'plexify' ); ?>">
                <span class="hero__are"><?php esc_html_e( 'ARE A', 'plexify' ); ?></span>
            </span>
            <span class="hero__word--digital"><?php esc_html_e( 'digital', 'plexify' ); ?></span>

            <aside class="hero__badge" aria-label="<?php esc_attr_e( 'Tagline', 'plexify' ); ?>">
                <span class="hero__brace" aria-hidden="true">{</span>
                <p><?php echo plexify_get_hero_badge(); ?></p>
                <span class="hero__brace" aria-hidden="true">}</span>
            </aside>
        </div>

        <div class="hero__line hero__line--2">
            <span class="hero__word--marketing"><em><?php esc_html_e( 'marketing', 'plexify' ); ?></em></span>
            <span class="hero__word--agency"><?php esc_html_e( 'AGENCY', 'plexify' ); ?></span>
        </div>
    </div>

    <!-- روابط السوشيال الجانبية -->
    <div class="hero__social" aria-label="<?php esc_attr_e( 'Social links', 'plexify' ); ?>">
        <?php
        $social_links = [
            'facebook'  => 'FB',
            'twitter'   => 'X',
            'linkedin'  => 'IN',
            'instagram' => 'IG',
        ];
        foreach ( $social_links as $key => $label ) :
            $url = get_theme_mod( "plexify_social_{$key}", '#' );
        ?>
            <a href="<?php echo esc_url( $url ); ?>"
               class="hero__social-link"
               aria-label="<?php echo esc_attr( ucfirst( $key ) ); ?>"
               <?php if ( '#' !== $url ) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                <?php echo esc_html( $label ); ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- ===================== 2. ABOUT / STATS ===================== -->
<section class="about" id="about" aria-label="<?php esc_attr_e( 'About Plexify', 'plexify' ); ?>">
    <div class="about__inner">

        <!-- الصورة مع كرة زخرفية -->
        <div class="about__image-wrap">
            <div class="about__ball" aria-hidden="true"></div>
            <?php
            // صورة القسم: يمكن رفعها من Customizer أو استخدام صورة الصفحة المميزة
            $about_img_id  = get_theme_mod( 'plexify_about_image', 0 );
            $about_img_url = $about_img_id
                ? wp_get_attachment_image_url( $about_img_id, 'full' )
                : get_template_directory_uri() . '/assets/images/team-walk.jpg';
            ?>
            <img src="<?php echo esc_url( $about_img_url ); ?>"
                 alt="<?php esc_attr_e( 'Team members walking confidently in an office corridor', 'plexify' ); ?>"
                 class="about__img"
                 loading="lazy"/>
        </div>

        <!-- المحتوى اليميني -->
        <div class="about__content">
            <div class="about__stats">
                <div class="about__stat" data-count="<?php echo esc_attr( preg_replace( '/\D/', '', plexify_get_stat( 'stat1_num', '120k' ) ) ); ?>">
                    <span class="about__stat-num"><?php echo plexify_get_stat( 'stat1_num', '120k' ); ?></span>
                    <span class="about__stat-label"><?php echo plexify_get_stat( 'stat1_label', 'Active members inside the program' ); ?></span>
                </div>
                <div class="about__stat" data-count="<?php echo esc_attr( preg_replace( '/\D/', '', plexify_get_stat( 'stat2_num', '72+' ) ) ); ?>">
                    <span class="about__stat-num"><?php echo plexify_get_stat( 'stat2_num', '72+' ); ?></span>
                    <span class="about__stat-label"><?php esc_html_e( 'of customers are repeat customers', 'plexify' ); ?></span>
                </div>
                <div class="about__badge-circle" aria-label="<?php esc_attr_e( "Together let's work", 'plexify' ); ?>">
                    <svg viewBox="0 0 100 100" fill="none" aria-hidden="true">
                        <circle cx="50" cy="50" r="46" stroke="#6EFF6A" stroke-width="2"/>
                        <path id="textPath" d="M 50,50 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0"/>
                        <text font-size="10.5" fill="#6EFF6A" font-family="DM Sans, sans-serif" font-weight="700" letter-spacing="2">
                            <textPath href="#textPath"><?php esc_html_e( 'TOGETHER · LET\'S · WORK ·', 'plexify' ); ?></textPath>
                        </text>
                        <path d="M 42 50 L 58 50 M 52 44 L 58 50 L 52 56" stroke="#6EFF6A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <h2 class="about__heading">
                <?php esc_html_e( 'Lets build with', 'plexify' ); ?>
                <span class="about__highlight"><?php bloginfo( 'name' ); ?></span>
            </h2>
            <p class="about__desc"><?php echo esc_html( get_bloginfo( 'description' ) ) ?: esc_html__( 'Empower your brand with cutting-edge digital solutions, drive engagement, and accelerate growth with our innovative marketing strategies.', 'plexify' ); ?></p>

            <!-- كروت الخدمات السريعة — من CPT أو ثابتة -->
            <div class="about__cards" id="sticky-cards">
                <?php
                $services_query = new WP_Query( [
                    'post_type'      => 'plexify_service',
                    'posts_per_page' => 4,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ] );

                if ( $services_query->have_posts() ) :
                    $offset_classes = [ '', 'feature-card--offset', '', 'feature-card--offset' ];
                    $i = 0;
                    while ( $services_query->have_posts() ) :
                        $services_query->the_post();
                        $icon = get_post_meta( get_the_ID(), '_plexify_icon_svg', true );
                        ?>
                        <article class="feature-card <?php echo esc_attr( $offset_classes[ $i ] ?? '' ); ?> js-sticky-card">
                            <?php if ( $icon ) : ?>
                                <div class="feature-card__icon" aria-hidden="true"><?php echo wp_kses( $icon, plexify_allowed_svg_kses() ); ?></div>
                            <?php endif; ?>
                            <h3 class="feature-card__title"><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="feature-card__link"
                               aria-label="<?php printf( esc_attr__( 'Learn more about %s', 'plexify' ), get_the_title() ); ?>">
                                <?php esc_html_e( 'Learn more', 'plexify' ); ?> ↗
                            </a>
                        </article>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();

                else :
                    // Fallback ثابت إذا لم تُنشأ CPT بعد
                    $fallback_cards = [
                        [ 'title' => __( 'Paid Search Marketing', 'plexify' ),    'offset' => false ],
                        [ 'title' => __( 'Client-Centric Approach', 'plexify' ),  'offset' => true  ],
                        [ 'title' => __( 'Leadership Development', 'plexify' ),   'offset' => false ],
                        [ 'title' => __( 'Conversion Rate', 'plexify' ),          'offset' => true  ],
                    ];
                    $icons_svg = [
                        '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="14" r="7" stroke="#6EFF6A" stroke-width="1.8"/><path d="M10 28 Q16 20 22 28" stroke="#6EFF6A" stroke-width="1.8" stroke-linecap="round"/></svg>',
                        '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><rect x="6" y="6" width="20" height="20" rx="3" stroke="#6EFF6A" stroke-width="1.8"/><path d="M11 16 L14 19 L21 12" stroke="#6EFF6A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                        '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="10" stroke="#6EFF6A" stroke-width="1.8"/><circle cx="16" cy="16" r="5" stroke="#6EFF6A" stroke-width="1.5"/></svg>',
                        '<svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="10" stroke="#6EFF6A" stroke-width="1.8"/><circle cx="16" cy="16" r="4" stroke="#6EFF6A" stroke-width="1.5"/></svg>',
                    ];
                    foreach ( $fallback_cards as $idx => $card ) :
                        $cls = $card['offset'] ? 'feature-card feature-card--offset js-sticky-card' : 'feature-card js-sticky-card';
                        ?>
                        <article class="<?php echo esc_attr( $cls ); ?>">
                            <div class="feature-card__icon" aria-hidden="true"><?php echo $icons_svg[ $idx ]; // phpcs:ignore ?></div>
                            <h3 class="feature-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
                            <a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" class="feature-card__link">
                                <?php esc_html_e( 'Learn more', 'plexify' ); ?> ↗
                            </a>
                        </article>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===================== 3. WORK / STICKY HORIZONTAL SCROLL ===================== -->
<section class="work" id="work" aria-label="<?php esc_attr_e( 'Our Work', 'plexify' ); ?>">
    <div class="work__sticky-outer" id="work-sticky-outer">
        <div class="work__sticky-inner" id="work-sticky-inner">
            <div class="work__bg-text" aria-hidden="true"><?php esc_html_e( 'WORK', 'plexify' ); ?></div>

            <div class="work__progress" aria-hidden="true">
                <svg class="work__progress-ring" viewBox="0 0 44 44">
                    <circle class="work__progress-track" cx="22" cy="22" r="18"/>
                    <circle class="work__progress-fill"  id="work-progress-fill" cx="22" cy="22" r="18"/>
                </svg>
                <span class="work__progress-pct" id="work-progress-pct">0%</span>
            </div>

            <div class="work__track-wrap" id="work-track-wrap"
                 role="region" aria-label="<?php esc_attr_e( 'Work portfolio', 'plexify' ); ?>">
                <div class="work__track" id="work-track">
                    <?php
                    $work_query = new WP_Query( [
                        'post_type'      => 'plexify_work',
                        'posts_per_page' => 6,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    ] );

                    if ( $work_query->have_posts() ) :
                        while ( $work_query->have_posts() ) :
                            $work_query->the_post();
                            $img_url = get_the_post_thumbnail_url( get_the_ID(), 'plexify-work-card' );
                            ?>
                            <article class="work-card">
                                <?php if ( $img_url ) : ?>
                                    <img src="<?php echo esc_url( $img_url ); ?>"
                                         alt="<?php the_title_attribute(); ?>"
                                         class="work-card__img" loading="lazy"/>
                                <?php endif; ?>
                                <div class="work-card__label"><?php the_title(); ?></div>
                            </article>
                        <?php endwhile;
                        wp_reset_postdata();

                    else :
                        // Fallback ثابت
                        $work_items = [
                            [ 'img' => 'work-social.jpg',    'label' => 'Social Media', 'alt' => 'Social media marketing team' ],
                            [ 'img' => 'work-search.jpg',    'label' => 'SEM / Search', 'alt' => 'Professional working on tablet' ],
                            [ 'img' => 'work-analytics.jpg', 'label' => 'Analytics',    'alt' => 'Analyst reviewing data' ],
                            [ 'img' => 'work-strategy.jpg',  'label' => 'Strategy',     'alt' => 'Creative team discussing strategy' ],
                        ];
                        $base = get_template_directory_uri() . '/assets/images/';
                        foreach ( $work_items as $item ) : ?>
                            <article class="work-card">
                                <img src="<?php echo esc_url( $base . $item['img'] ); ?>"
                                     alt="<?php echo esc_attr( $item['alt'] ); ?>"
                                     class="work-card__img" loading="lazy"/>
                                <div class="work-card__label"><?php echo esc_html( $item['label'] ); ?></div>
                            </article>
                        <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== 4. SERVICES ===================== -->
<section class="services" id="services" aria-label="<?php esc_attr_e( 'Our Services', 'plexify' ); ?>">
    <div class="services__inner">
        <div class="services__header">
            <h2 class="services__heading">
                <?php esc_html_e( 'Find Our Best', 'plexify' ); ?><br>
                <span><?php esc_html_e( 'Services', 'plexify' ); ?></span>
            </h2>
            <div class="services__header-right">
                <aside class="services__badge" aria-label="<?php esc_attr_e( 'Services tagline', 'plexify' ); ?>">
                    <span class="services__brace" aria-hidden="true">{</span>
                    <p><?php esc_html_e( 'Achieve Top Rankings with Cutting-Edge SEO Services!', 'plexify' ); ?></p>
                    <span class="services__brace" aria-hidden="true">}</span>
                </aside>
                <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"
                   class="services__cta-circle"
                   aria-label="<?php esc_attr_e( 'Get started', 'plexify' ); ?>">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M5 14 L23 14 M17 8 L23 14 L17 20" stroke="#1a1a1a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="services__grid">
            <?php
            $services_q = new WP_Query( [
                'post_type'      => 'plexify_service',
                'posts_per_page' => 3,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ] );

            if ( $services_q->have_posts() ) :
                while ( $services_q->have_posts() ) :
                    $services_q->the_post();
                    $tag = get_post_meta( get_the_ID(), '_plexify_tag', true );
                    $features_raw = get_post_meta( get_the_ID(), '_plexify_features', true );
                    $features = $features_raw ? explode( "\n", $features_raw ) : [];
                    ?>
                    <article class="service-card js-reveal">
                        <?php if ( $tag ) : ?>
                            <span class="service-card__tag"><?php echo esc_html( $tag ); ?></span>
                        <?php endif; ?>
                        <h3 class="service-card__title"><?php the_title(); ?></h3>
                        <?php if ( $features ) : ?>
                            <ul class="service-card__list" role="list">
                                <?php foreach ( $features as $feat ) : ?>
                                    <li><?php echo esc_html( trim( $feat ) ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="service-card__footer">
                            <a href="<?php the_permalink(); ?>" class="service-card__btn">
                                <?php esc_html_e( 'View Details', 'plexify' ); ?> →
                            </a>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_postdata();

            else :
                // Fallback ثابت للخدمات
                $fallback_services = [
                    [
                        'tag'      => 'SEO',
                        'title'    => 'Search Engine Optimization',
                        'features' => [ 'On-page and off-page SEO', 'Keyword research and optimization', 'Technical SEO', 'Link building' ],
                    ],
                    [
                        'tag'      => 'Email Campaign',
                        'title'    => 'Email Marketing',
                        'features' => [ 'Email campaign design and automation', 'Personalized email sequences', 'Newsletter creation', 'List segmentation' ],
                    ],
                    [
                        'tag'      => 'Social media',
                        'title'    => 'Social Media Marketing',
                        'features' => [ 'Community engagement', 'Influencer marketing', 'Paid social advertising' ],
                    ],
                ];
                foreach ( $fallback_services as $svc ) : ?>
                    <article class="service-card js-reveal">
                        <span class="service-card__tag"><?php echo esc_html( $svc['tag'] ); ?></span>
                        <h3 class="service-card__title"><?php echo esc_html( $svc['title'] ); ?></h3>
                        <ul class="service-card__list" role="list">
                            <?php foreach ( $svc['features'] as $f ) : ?>
                                <li><?php echo esc_html( $f ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="service-card__footer">
                            <a href="#" class="service-card__btn"><?php esc_html_e( 'View Details', 'plexify' ); ?> →</a>
                        </div>
                    </article>
                <?php endforeach;
            endif; ?>
        </div>
    </div>

    <!-- شريط Marquee -->
    <div class="marquee" aria-hidden="true">
        <div class="marquee__inner">
            <?php
            $marquee_items = [ 'Optimization', 'Strategy', 'Analysis', 'Research', 'Reporting' ];
            $decorators    = [ '<span class="marquee__dot">●</span>', '<span class="marquee__star">★</span>', '<span class="marquee__ring">○</span>', '<span class="marquee__star marquee__star--green">★</span>', '<span class="marquee__avocado">🥑</span>' ];
            // نكررها مرتين لتأثير اللانهائية
            for ( $r = 0; $r < 2; $r++ ) :
                foreach ( $marquee_items as $mi => $item ) :
                    $is_italic = in_array( $item, [ 'Strategy', 'Research' ], true );
                    ?>
                    <span<?php echo $is_italic ? ' class="marquee__italic"' : ''; ?>><?php echo esc_html( $item ); ?></span>
                    <?php echo $decorators[ $mi ]; // phpcs:ignore ?>
                <?php endforeach;
            endfor; ?>
        </div>
    </div>
</section>

<!-- ===================== 5. PROCESS ===================== -->
<section class="process" id="process" aria-label="<?php esc_attr_e( 'How It Works', 'plexify' ); ?>">
    <div class="process__inner">
        <div class="process__header js-reveal">
            <h2 class="process__heading"><?php esc_html_e( 'How It Work', 'plexify' ); ?></h2>
            <p class="process__sub"><?php esc_html_e( 'Our Step-by-Step Marketing Process', 'plexify' ); ?></p>
        </div>

        <div class="process__timeline">
            <div class="process__line" id="process-line" aria-hidden="true">
                <svg class="process__line-svg" id="process-line-svg" viewBox="0 0 4 600" preserveAspectRatio="none">
                    <line x1="2" y1="0" x2="2" y2="600" stroke="rgba(110,255,106,0.25)" stroke-width="2" stroke-dasharray="8 10"/>
                </svg>
                <div class="process__rocket" id="process-rocket" aria-hidden="true">
                    <svg viewBox="0 0 28 40" fill="none">
                        <path d="M14 2 Q18 8 18 16 L16 26 L14 30 L12 26 L10 16 Q10 8 14 2Z" fill="#6EFF6A"/>
                        <ellipse cx="14" cy="16" rx="5" ry="6" fill="#0d0d0d"/>
                        <ellipse cx="14" cy="16" rx="3" ry="3.5" fill="#6EFF6A" opacity="0.5"/>
                        <path d="M10 22 L6 28 L10 26Z" fill="#6EFF6A" opacity="0.7"/>
                        <path d="M18 22 L22 28 L18 26Z" fill="#6EFF6A" opacity="0.7"/>
                        <path d="M11 28 Q14 36 17 28" stroke="#FF6A00" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.8"/>
                    </svg>
                </div>
            </div>

            <?php
            $process_steps = [
                [ 'side' => 'left',  'num' => '01', 'title' => __( 'Competitor analysis and keyword research', 'plexify' ), 'sub' => __( 'Gain insights to stay ahead', 'plexify' ),      'step' => '1' ],
                [ 'side' => 'right', 'num' => '02', 'title' => __( 'Craft a tailored SEO and digital plan', 'plexify' ),    'sub' => __( 'Tailored strategies for your brand.', 'plexify' ), 'step' => '2' ],
                [ 'side' => 'left',  'num' => '03', 'title' => __( 'Optimize your website for search engines', 'plexify' ), 'sub' => __( 'Improve rankings &amp; visibility', 'plexify' ),   'step' => '3' ],
                [ 'side' => 'right', 'num' => '04', 'title' => __( 'Focus on long-term success &amp; growth', 'plexify' ),  'sub' => __( 'Build sustainable success', 'plexify' ),            'step' => '4' ],
            ];

            foreach ( $process_steps as $step ) :
                $is_right = 'right' === $step['side'];
            ?>
            <div class="process__step process__step--<?php echo esc_attr( $step['side'] ); ?> js-reveal">
                <?php if ( $is_right ) : ?>
                    <div class="process__dot" aria-label="<?php printf( esc_attr__( 'Step %s', 'plexify' ), $step['step'] ); ?>"><?php echo esc_html( $step['step'] ); ?></div>
                <?php endif; ?>
                <article class="process-card">
                    <h3><?php echo esc_html( $step['title'] ); ?></h3>
                    <p class="process-card__sub"><?php echo esc_html( $step['sub'] ); ?></p>
                    <span class="process-card__num" aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></span>
                </article>
                <?php if ( ! $is_right ) : ?>
                    <div class="process__dot" aria-label="<?php printf( esc_attr__( 'Step %s', 'plexify' ), $step['step'] ); ?>"><?php echo esc_html( $step['step'] ); ?></div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="process__cta-band js-reveal">
        <p><?php esc_html_e( 'Start your dream project today', 'plexify' ); ?></p>
        <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"
           class="btn-pill"
           aria-label="<?php esc_attr_e( "Let's talk", 'plexify' ); ?>">
            <?php esc_html_e( "Let's talk", 'plexify' ); ?> →
        </a>
    </div>
</section>

<!-- ===================== 6. BLOG — STICKY STACK ===================== -->
<section class="blog" id="blog" aria-label="<?php esc_attr_e( 'Latest Blog and Articles', 'plexify' ); ?>">
    <div class="blog__inner">
        <div class="blog__left js-reveal">
            <h2 class="blog__heading">
                <?php esc_html_e( 'Our Latest', 'plexify' ); ?><br>
                <?php esc_html_e( 'Blog &', 'plexify' ); ?><br>
                <?php esc_html_e( 'Article', 'plexify' ); ?>
            </h2>
            <p class="blog__desc">
                <?php esc_html_e( 'Explore our latest blog and articles for expert insights on web design, SEO, and digital trends.', 'plexify' ); ?>
            </p>
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>"
               class="btn-pill btn-pill--outline"
               aria-label="<?php esc_attr_e( 'View all articles', 'plexify' ); ?>">
                <?php esc_html_e( 'View All', 'plexify' ); ?> →
            </a>
        </div>

        <div class="blog__stack" id="blog-stack">
            <?php
            $blog_query = new WP_Query( [
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ] );

            $card_index = 0;
            if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();
                    $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'plexify-blog-card' );
                    ?>
                    <article class="blog-card blog-card--stack" data-index="<?php echo esc_attr( $card_index ); ?>">
                        <div class="blog-card__text">
                            <h3 class="blog-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="blog-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 12, '&hellip;' ); ?></p>
                            <div class="blog-card__meta">
                                <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>" class="blog-card__date">
                                    <?php echo esc_html( strtoupper( get_the_date( 'j M Y' ) ) ); ?>
                                </time>
                                <span class="blog-card__author">
                                    / <?php esc_html_e( 'BY', 'plexify' ); ?> <?php echo esc_html( strtoupper( get_the_author() ) ); ?>
                                </span>
                            </div>
                        </div>
                        <?php if ( $thumb_url ) : ?>
                            <img src="<?php echo esc_url( $thumb_url ); ?>"
                                 alt="<?php the_title_attribute(); ?>"
                                 class="blog-card__img" loading="lazy"/>
                        <?php endif; ?>
                    </article>
                    <?php
                    $card_index++;
                endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="no-posts"><?php esc_html_e( 'لا توجد منشورات بعد. ابدأ بنشر مقالاتك!', 'plexify' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ===================== 7. TESTIMONIALS ===================== -->
<section class="testimonials" id="testimonials" aria-label="<?php esc_attr_e( 'Client Testimonials', 'plexify' ); ?>">
    <div class="testimonials__inner">
        <div class="testimonials__left">
            <div class="testimonials__rating-card">
                <p class="testimonials__score"><?php echo esc_html( get_theme_mod( 'plexify_trustpilot_score', '4.5' ) ); ?></p>
                <p class="testimonials__rating-label">
                    <?php esc_html_e( 'Star Rating on', 'plexify' ); ?> <strong>★ Trustpilot</strong>
                </p>
                <p class="testimonials__exp">
                    <?php esc_html_e( '10 Years Experience in Digital marketing', 'plexify' ); ?>
                </p>
                <a href="https://trustpilot.com" target="_blank" rel="noopener noreferrer"
                   class="btn-pill btn-pill--dark">
                    <?php esc_html_e( 'Rate Us on Trustpilot', 'plexify' ); ?> →
                </a>
            </div>
        </div>

        <div class="testimonials__slider">
            <div class="testimonials__header js-reveal">
                <h2><?php esc_html_e( 'Success Stories: How Feedback Fuels Our Growth', 'plexify' ); ?></h2>
                <p class="testimonials__rated">
                    <?php printf(
                        esc_html__( '%s is rated %s average from %s reviews on Google, Clutch!', 'plexify' ),
                        esc_html( get_bloginfo( 'name' ) ),
                        esc_html( get_theme_mod( 'plexify_trustpilot_score', '4.5' ) ) . ' / 5',
                        '200'
                    ); ?>
                </p>
            </div>

            <div class="testimonials__track" id="testimonial-track"
                 role="region" aria-label="<?php esc_attr_e( 'Testimonial slider', 'plexify' ); ?>" aria-live="polite">
                <?php
                $testimonials = plexify_get_testimonials( 3 );
                $first        = true;

                if ( $testimonials->have_posts() ) :
                    while ( $testimonials->have_posts() ) :
                        $testimonials->the_post();
                        $company = get_post_meta( get_the_ID(), '_plexify_company', true );
                        $avatar  = get_the_post_thumbnail_url( get_the_ID(), 'plexify-avatar' );
                        ?>
                        <blockquote class="testimonial-slide<?php echo $first ? ' active' : ''; ?>">
                            <div class="testimonial-slide__stars" aria-label="<?php esc_attr_e( '5 stars', 'plexify' ); ?>">★★★★★</div>
                            <p><?php the_content(); ?></p>
                            <footer class="testimonial-slide__author">
                                <?php if ( $avatar ) : ?>
                                    <img src="<?php echo esc_url( $avatar ); ?>"
                                         alt="<?php the_title_attribute(); ?>"
                                         class="testimonial-slide__avatar" loading="lazy"/>
                                <?php endif; ?>
                                <div>
                                    <cite class="testimonial-slide__name"><?php the_title(); ?></cite>
                                    <?php if ( $company ) : ?>
                                        <span class="testimonial-slide__company"><?php echo esc_html( $company ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </footer>
                        </blockquote>
                        <?php
                        $first = false;
                    endwhile;
                    wp_reset_postdata();

                else :
                    // Fallback ثابت
                    $fallback_testimonials = [
                        [ 'text' => "This template has great documentation and support. It's very flexible and has so many options. thoughtfully crafted, and integrating it was seamless.", 'name' => 'Isla Morgan',  'company' => 'Power XR2 Module' ],
                        [ 'text' => "Working with Plexify transformed our digital presence completely. The ROI we've seen in just 3 months has exceeded all expectations.",               'name' => 'James Chen',   'company' => 'NexaTech Solutions' ],
                        [ 'text' => "The team at Plexify is outstanding. Their approach to data-driven marketing helped us cut ad spend by 40% while doubling conversions.",             'name' => 'Sara Williams', 'company' => 'Bloom Retail Co.' ],
                    ];
                    $base_img = get_template_directory_uri() . '/assets/images/';
                    foreach ( $fallback_testimonials as $fi => $ft ) : ?>
                        <blockquote class="testimonial-slide<?php echo 0 === $fi ? ' active' : ''; ?>">
                            <div class="testimonial-slide__stars" aria-label="5 stars">★★★★★</div>
                            <p><?php echo esc_html( $ft['text'] ); ?></p>
                            <footer class="testimonial-slide__author">
                                <img src="<?php echo esc_url( $base_img . 'avatar-' . ( $fi + 1 ) . '.jpg' ); ?>"
                                     alt="<?php echo esc_attr( $ft['name'] ); ?>"
                                     class="testimonial-slide__avatar" loading="lazy"/>
                                <div>
                                    <cite class="testimonial-slide__name"><?php echo esc_html( $ft['name'] ); ?></cite>
                                    <span class="testimonial-slide__company"><?php echo esc_html( $ft['company'] ); ?></span>
                                </div>
                            </footer>
                        </blockquote>
                    <?php endforeach;
                endif;

                $total_slides = $testimonials->post_count ?: 3;
                ?>
            </div>

            <div class="testimonials__controls" aria-label="<?php esc_attr_e( 'Testimonial navigation', 'plexify' ); ?>">
                <div class="testimonials__dots" id="testimonial-dots" role="tablist">
                    <?php for ( $d = 0; $d < $total_slides; $d++ ) : ?>
                        <button class="testimonials__dot<?php echo 0 === $d ? ' active' : ''; ?>"
                                role="tab"
                                aria-selected="<?php echo 0 === $d ? 'true' : 'false'; ?>"
                                aria-label="<?php printf( esc_attr__( 'Slide %d', 'plexify' ), $d + 1 ); ?>">
                        </button>
                    <?php endfor; ?>
                </div>
                <div class="testimonials__arrows">
                    <button class="testimonials__arrow" id="prev-testimonial" aria-label="<?php esc_attr_e( 'Previous testimonial', 'plexify' ); ?>">←</button>
                    <button class="testimonials__arrow" id="next-testimonial" aria-label="<?php esc_attr_e( 'Next testimonial', 'plexify' ); ?>">→</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== 8. FAQ ===================== -->
<section class="faq" id="faq" aria-label="<?php esc_attr_e( 'Frequently Asked Questions', 'plexify' ); ?>">
    <div class="faq__inner">
        <div class="faq__image-wrap">
            <?php
            $faq_img = get_theme_mod( 'plexify_faq_image', 0 );
            $faq_url = $faq_img
                ? wp_get_attachment_image_url( $faq_img, 'large' )
                : get_template_directory_uri() . '/assets/images/faq-team.jpg';
            ?>
            <img src="<?php echo esc_url( $faq_url ); ?>"
                 alt="<?php esc_attr_e( 'Two professionals in a consultation meeting', 'plexify' ); ?>"
                 class="faq__img" loading="lazy"/>
        </div>

        <div class="faq__content">
            <h2 class="faq__heading js-reveal"><?php esc_html_e( 'Frequently Asked Questions', 'plexify' ); ?></h2>
            <p class="faq__sub js-reveal"><?php esc_html_e( 'We have professional experts around world.', 'plexify' ); ?></p>

            <div class="faq__list" role="list">
                <?php
                // يمكن ربط الأسئلة بمنشورات من نوع مخصص أو بقائمة ثابتة
                $faqs = apply_filters( 'plexify_faqs', [
                    [
                        'q' => __( 'What digital marketing services do you offer?', 'plexify' ),
                        'a' => __( 'We offer SEO, email marketing, social media marketing, paid search, content strategy, and conversion rate optimization — all tailored to your brand\'s unique goals.', 'plexify' ),
                    ],
                    [
                        'q' => __( 'How long before I see results?', 'plexify' ),
                        'a' => __( 'Paid campaigns typically show results within 2–4 weeks. SEO efforts build over 3–6 months for lasting organic impact. We provide monthly reports so you always know where you stand.', 'plexify' ),
                    ],
                    [
                        'q' => __( 'What is the difference between SEO and SEM?', 'plexify' ),
                        'a' => __( 'SEO (Search Engine Optimization) builds organic visibility over time. SEM (Search Engine Marketing) uses paid ads for immediate placement. A combined approach delivers the best results.', 'plexify' ),
                    ],
                ] );

                foreach ( $faqs as $fi => $faq ) :
                    $faq_id = 'faq-a-' . ( $fi + 1 );
                    $is_open = 0 === $fi;
                ?>
                <div class="faq__item js-reveal" role="listitem">
                    <button class="faq__q"
                            aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
                            aria-controls="<?php echo esc_attr( $faq_id ); ?>">
                        <?php echo esc_html( $faq['q'] ); ?>
                        <span class="faq__icon" aria-hidden="true"><?php echo $is_open ? '▲' : '▼'; ?></span>
                    </button>
                    <div class="faq__a<?php echo $is_open ? '' : ' faq__a--closed'; ?>"
                         id="<?php echo esc_attr( $faq_id ); ?>" role="region">
                        <p><?php echo esc_html( $faq['a'] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===================== 9. BRANDS / TRUST BAR ===================== -->
<section class="brands" aria-label="<?php esc_attr_e( 'Trusted by leading brands', 'plexify' ); ?>">
    <div class="brands__inner">
        <div class="brands__left">
            <p class="brands__label"><?php esc_html_e( 'Trusted and top rated tech team', 'plexify' ); ?></p>
            <p class="brands__rating">
                <strong>Clutch</strong>
                <span class="brands__score"><?php echo esc_html( get_theme_mod( 'plexify_clutch_score', '4.9/5' ) ); ?></span>
                <span class="brands__stars" aria-label="<?php esc_attr_e( '4.9 out of 5 stars', 'plexify' ); ?>">★★★★★</span>
                <span class="brands__reviews"><?php echo esc_html( get_theme_mod( 'plexify_clutch_reviews', '1.24k client reviews' ) ); ?></span>
            </p>
        </div>
        <div class="brands__divider" aria-hidden="true"></div>
        <ul class="brands__logos" role="list" aria-label="<?php esc_attr_e( 'Partner brands', 'plexify' ); ?>">
            <?php
            $base     = get_template_directory_uri() . '/assets/images/';
            $logos    = [
                [ 'src' => 'brand-ultra.svg',    'alt' => 'Ultra Prestigious — Best of the World' ],
                [ 'src' => 'brand-logoipsum1.svg', 'alt' => 'Logoipsum Brand Standard' ],
                [ 'src' => 'brand-logoipsum2.svg', 'alt' => 'Logo Ipsum' ],
                [ 'src' => 'brand-logoipsum3.svg', 'alt' => 'Logoipsum' ],
                [ 'src' => 'brand-power.svg',      'alt' => 'Power XR2 Module' ],
            ];
            foreach ( $logos as $logo ) : ?>
                <li>
                    <img src="<?php echo esc_url( $base . $logo['src'] ); ?>"
                         alt="<?php echo esc_attr( $logo['alt'] ); ?>"
                         class="brands__logo" loading="lazy"/>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php get_footer(); ?>
