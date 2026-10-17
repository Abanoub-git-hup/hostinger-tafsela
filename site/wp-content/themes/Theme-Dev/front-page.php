<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Plexify
 */

get_header();
?>

<main>

    <!-- ===================== 1. HERO ===================== -->
    <section class="hero" id="hero" aria-label="Hero — Digital Marketing Agency">
        <!-- Deco squiggles -->
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

        <!-- Content -->
        <div class="hero__content">
            <div class="hero__line hero__line--1">
                <span class="hero__we">WE<span class="hero__are">ARE<br>A</span></span>
                <span class="hero__word--digital"><?php esc_html_e('digital', 'plexify'); ?></span>
            </div>

            <aside class="hero__badge" aria-label="Tagline">
                <span class="hero__brace" aria-hidden="true">{</span>
                <p><?php esc_html_e('Boost Your Brand with Cutting-Edge Digital Marketing!', 'plexify'); ?></p>
                <span class="hero__brace" aria-hidden="true">}</span>
            </aside>

            <div class="hero__line hero__line--2">
                <span class="hero__word--marketing"><em><?php esc_html_e('marketing', 'plexify'); ?></em></span>
            </div>

            <div class="hero__line hero__line--3">
                <span class="hero__word--agency"><?php esc_html_e('AGENCY', 'plexify'); ?></span>
            </div>
        </div>

        <!-- Social sidebar -->
        <div class="hero__social" aria-label="Social links">
            <a href="#" class="hero__social-link" aria-label="Facebook">FB</a>
            <a href="#" class="hero__social-link" aria-label="X / Twitter">X</a>
            <a href="#" class="hero__social-link" aria-label="LinkedIn">IN</a>
            <a href="#" class="hero__social-link" aria-label="LinkedIn">LM</a>
        </div>
    </section>

    <!-- ===================== 2. ABOUT / STATS ===================== -->
    <section class="about" id="about" aria-label="About Plexify">
        <div class="about__inner">
            <!-- Left: image with orange ball deco -->
            <div class="about__image-wrap">
                <div class="about__ball" aria-hidden="true"></div>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/team-walk.jpg" alt="<?php esc_attr_e('Team members walking confidently in an office corridor', 'plexify'); ?>" class="about__img" loading="lazy" />
            </div>

            <!-- Right: stats + description + feature cards -->
            <div class="about__content">
                <div class="about__stats">
                    <div class="about__stat" data-count="120">
                        <span class="about__stat-num" aria-label="120 thousand">120k</span>
                        <span class="about__stat-label"><?php esc_html_e('Active members<br>inside the program', 'plexify'); ?></span>
                    </div>
                    <div class="about__stat" data-count="72">
                        <span class="about__stat-num" aria-label="72 plus">72+</span>
                        <span class="about__stat-label"><?php esc_html_e('of customers are<br>repeat customers', 'plexify'); ?></span>
                    </div>
                    <div class="about__badge-circle" aria-label="Together let's work">
                        <svg viewBox="0 0 100 100" fill="none" aria-hidden="true">
                            <circle cx="50" cy="50" r="46" stroke="#6EFF6A" stroke-width="2"/>
                            <path id="textPath" d="M 50,50 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0"/>
                            <text font-size="10.5" fill="#6EFF6A" font-family="DM Sans, sans-serif" font-weight="700" letter-spacing="2">
                                <textPath href="#textPath">TOGETHER · LET'S · WORK ·</textPath>
                            </text>
                            <path d="M 42 50 L 58 50 M 52 44 L 58 50 L 52 56" stroke="#6EFF6A" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <h2 class="about__heading"><?php printf( esc_html__('Lets build with %s', 'plexify'), '<span class="about__highlight">Plexify</span>' ); ?></h2>
                <p class="about__desc"><?php esc_html_e('Empower your brand with cutting-edge digital solutions, drive engagement, and accelerate growth with our innovative marketing strategies.', 'plexify'); ?></p>

                <!-- Sticky feature cards grid (vertical) -->
                <div class="about__cards" id="sticky-cards">
                    <article class="feature-card js-sticky-card">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="14" r="7" stroke="#6EFF6A" stroke-width="1.8"/><path d="M10 28 Q16 20 22 28" stroke="#6EFF6A" stroke-width="1.8" stroke-linecap="round"/><path d="M6 10 L3 10 M26 10 L29 10" stroke="#6EFF6A" stroke-width="1.5"/><circle cx="10" cy="8" r="2" fill="#6EFF6A" opacity="0.5"/><circle cx="22" cy="8" r="2" fill="#6EFF6A" opacity="0.5"/></svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Paid Search Marketing', 'plexify'); ?></h3>
                        <a href="#" class="feature-card__link" aria-label="Learn more about Paid Search Marketing"><?php esc_html_e('Learn more', 'plexify'); ?> ↗</a>
                    </article>
                    <article class="feature-card feature-card--offset js-sticky-card">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><rect x="6" y="6" width="20" height="20" rx="3" stroke="#6EFF6A" stroke-width="1.8"/><path d="M11 16 L14 19 L21 12" stroke="#6EFF6A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="24" cy="8" r="4" fill="#0d0d0d" stroke="#6EFF6A" stroke-width="1.5"/><path d="M22 8 L26 8 M24 6 L24 10" stroke="#6EFF6A" stroke-width="1.2"/></svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Client-Centric Approach', 'plexify'); ?></h3>
                        <a href="#" class="feature-card__link" aria-label="Learn more about Client-Centric Approach"><?php esc_html_e('Learn more', 'plexify'); ?> ↗</a>
                    </article>
                    <article class="feature-card js-sticky-card">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="10" stroke="#6EFF6A" stroke-width="1.8"/><circle cx="16" cy="16" r="5" stroke="#6EFF6A" stroke-width="1.5"/><path d="M16 6 L16 2 M16 30 L16 26 M6 16 L2 16 M30 16 L26 16" stroke="#6EFF6A" stroke-width="1.5"/></svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Leadership Development', 'plexify'); ?></h3>
                        <a href="#" class="feature-card__link" aria-label="Learn more about Leadership Development"><?php esc_html_e('Learn more', 'plexify'); ?> ↗</a>
                    </article>
                    <article class="feature-card feature-card--offset js-sticky-card">
                        <div class="feature-card__icon" aria-hidden="true">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="10" stroke="#6EFF6A" stroke-width="1.8"/><circle cx="16" cy="16" r="4" stroke="#6EFF6A" stroke-width="1.5"/><circle cx="22" cy="10" r="3" fill="#0d0d0d" stroke="#6EFF6A" stroke-width="1.3"/><path d="M13 16 L10 16 M22 16 L19 16" stroke="#6EFF6A" stroke-width="1.3"/></svg>
                        </div>
                        <h3 class="feature-card__title"><?php esc_html_e('Conversion Rate', 'plexify'); ?></h3>
                        <a href="#" class="feature-card__link" aria-label="Learn more about Conversion Rate"><?php esc_html_e('Learn more', 'plexify'); ?> ↗</a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 3. WORK / HORIZONTAL SCROLL CARDS ===================== -->
    <section class="work" id="work" aria-label="Our Work">
        <div class="work__bg-text" aria-hidden="true">WORK</div>

        <!-- Progress indicator -->
        <div class="work__progress" aria-hidden="true">
            <svg class="work__progress-ring" viewBox="0 0 44 44">
                <circle class="work__progress-track" cx="22" cy="22" r="18"/>
                <circle class="work__progress-fill" id="work-progress-fill" cx="22" cy="22" r="18"/>
            </svg>
            <span class="work__progress-pct" id="work-progress-pct">0%</span>
        </div>

        <!-- Horizontal scroll track -->
        <div class="work__track-wrap" id="work-track-wrap" role="region" aria-label="Work portfolio — scroll horizontally">
            <div class="work__track" id="work-track">
                <article class="work-card">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work-social.jpg" alt="<?php esc_attr_e('Social media marketing team holding Facebook logo', 'plexify'); ?>" class="work-card__img" loading="lazy"/>
                    <div class="work-card__label"><?php esc_html_e('Social Media', 'plexify'); ?></div>
                </article>
                <article class="work-card">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work-search.jpg" alt="<?php esc_attr_e('Professional working on tablet with search SEM overlays', 'plexify'); ?>" class="work-card__img" loading="lazy"/>
                    <div class="work-card__label"><?php esc_html_e('SEM / Search', 'plexify'); ?></div>
                </article>
                <article class="work-card">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work-analytics.jpg" alt="<?php esc_attr_e('Analyst reviewing data with holographic charts', 'plexify'); ?>" class="work-card__img" loading="lazy"/>
                    <div class="work-card__label"><?php esc_html_e('Analytics', 'plexify'); ?></div>
                </article>
                <article class="work-card">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/work-strategy.jpg" alt="<?php esc_attr_e('Creative team discussing marketing strategy', 'plexify'); ?>" class="work-card__img" loading="lazy"/>
                    <div class="work-card__label"><?php esc_html_e('Strategy', 'plexify'); ?></div>
                </article>
            </div>
        </div>
    </section>

    <!-- ===================== 4. SERVICES ===================== -->
    <section class="services" id="services" aria-label="Our Services">
        <div class="services__inner">
            <!-- Header row -->
            <div class="services__header">
                <h2 class="services__heading"><?php esc_html_e('Find Our Best', 'plexify'); ?><br><span><?php esc_html_e('Services', 'plexify'); ?></span></h2>
                <div class="services__header-right">
                    <aside class="services__badge" aria-label="Services tagline">
                        <span class="services__brace" aria-hidden="true">{</span>
                        <p><?php esc_html_e('Achieve Top Rankings with Cutting-Edge SEO Services!', 'plexify'); ?></p>
                        <span class="services__brace" aria-hidden="true">}</span>
                    </aside>
                    <a href="#contact" class="services__cta-circle" aria-label="Get started">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"><path d="M5 14 L23 14 M17 8 L23 14 L17 20" stroke="#1a1a1a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>

            <!-- Service cards grid -->
            <div class="services__grid">
                <article class="service-card js-reveal">
                    <span class="service-card__tag">SEO</span>
                    <h3 class="service-card__title"><?php esc_html_e('Search Engine Optimization', 'plexify'); ?></h3>
                    <ul class="service-card__list" role="list">
                        <li><?php esc_html_e('On-page and off-page SEO', 'plexify'); ?></li>
                        <li><?php esc_html_e('Keyword research and optimization', 'plexify'); ?></li>
                        <li><?php esc_html_e('Technical SEO', 'plexify'); ?></li>
                        <li><?php esc_html_e('Link building', 'plexify'); ?></li>
                    </ul>
                    <div class="service-card__footer">
                        <a href="#" class="service-card__btn" aria-label="View SEO service details"><?php esc_html_e('View Details', 'plexify'); ?> →</a>
                        <div class="service-card__deco" aria-hidden="true">SEO 🚀</div>
                    </div>
                </article>

                <article class="service-card js-reveal">
                    <span class="service-card__tag"><?php esc_html_e('Email Campaign', 'plexify'); ?></span>
                    <h3 class="service-card__title"><?php esc_html_e('Email Marketing', 'plexify'); ?></h3>
                    <ul class="service-card__list" role="list">
                        <li><?php esc_html_e('Email campaign design and automation', 'plexify'); ?></li>
                        <li><?php esc_html_e('Personalized email sequences', 'plexify'); ?></li>
                        <li><?php esc_html_e('Newsletter creation', 'plexify'); ?></li>
                        <li><?php esc_html_e('List segmentation and lead nurturing', 'plexify'); ?></li>
                    </ul>
                    <div class="service-card__footer">
                        <a href="#" class="service-card__btn" aria-label="View Email Marketing details"><?php esc_html_e('View Details', 'plexify'); ?> →</a>
                        <div class="service-card__deco" aria-hidden="true">✉️</div>
                    </div>
                </article>

                <article class="service-card js-reveal">
                    <span class="service-card__tag"><?php esc_html_e('Social media', 'plexify'); ?></span>
                    <h3 class="service-card__title"><?php esc_html_e('Social Media Marketing', 'plexify'); ?></h3>
                    <ul class="service-card__list" role="list">
                        <li><?php esc_html_e('Community engagement', 'plexify'); ?></li>
                        <li><?php esc_html_e('Influencer marketing', 'plexify'); ?></li>
                        <li><?php esc_html_e('Paid social advertising', 'plexify'); ?></li>
                    </ul>
                    <div class="service-card__footer">
                        <a href="#" class="service-card__btn" aria-label="View Social Media Marketing details"><?php esc_html_e('View Details', 'plexify'); ?> →</a>
                        <div class="service-card__deco" aria-hidden="true">✌️</div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Marquee ticker -->
        <div class="marquee" aria-hidden="true">
            <div class="marquee__inner">
                <span><?php esc_html_e('Optimization', 'plexify'); ?></span><span class="marquee__dot">●</span>
                <span class="marquee__italic"><?php esc_html_e('Strategy', 'plexify'); ?></span><span class="marquee__star">★</span>
                <span><?php esc_html_e('Analysis', 'plexify'); ?></span><span class="marquee__ring">○</span>
                <span class="marquee__italic"><?php esc_html_e('Research', 'plexify'); ?></span><span class="marquee__star marquee__star--green">★</span>
                <span><?php esc_html_e('Reporting', 'plexify'); ?></span><span class="marquee__avocado">🥑</span>
                <span><?php esc_html_e('Optimization', 'plexify'); ?></span><span class="marquee__dot">●</span>
                <span class="marquee__italic"><?php esc_html_e('Strategy', 'plexify'); ?></span><span class="marquee__star">★</span>
                <span><?php esc_html_e('Analysis', 'plexify'); ?></span><span class="marquee__ring">○</span>
                <span class="marquee__italic"><?php esc_html_e('Research', 'plexify'); ?></span><span class="marquee__star marquee__star--green">★</span>
                <span><?php esc_html_e('Reporting', 'plexify'); ?></span><span class="marquee__avocado">🥑</span>
            </div>
        </div>
    </section>

    <!-- ===================== 5. PROCESS ===================== -->
    <section class="process" id="process" aria-label="How It Works">
        <div class="process__inner">
            <div class="process__header js-reveal">
                <h2 class="process__heading"><?php esc_html_e('How It Work', 'plexify'); ?></h2>
                <p class="process__sub"><?php esc_html_e('Our Step-by-Step Marketing Process', 'plexify'); ?></p>
            </div>

            <!-- Zigzag timeline -->
            <div class="process__timeline">
                <div class="process__line" aria-hidden="true"></div>

                <div class="process__step process__step--left js-reveal">
                    <article class="process-card">
                        <div class="process-card__icon" aria-hidden="true">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect x="4" y="8" width="22" height="20" rx="2" stroke="#6EFF6A" stroke-width="1.8"/><path d="M4 14 L26 14" stroke="#6EFF6A" stroke-width="1.5"/><circle cx="28" cy="10" r="6" fill="#0d0d0d" stroke="#6EFF6A" stroke-width="1.5"/><path d="M25 10 L31 10 M28 7 L28 13" stroke="#6EFF6A" stroke-width="1.3"/></svg>
                        </div>
                        <h3><?php esc_html_e('Competitor analysis and keyword research', 'plexify'); ?></h3>
                        <p class="process-card__sub"><?php esc_html_e('Gain insights to stay ahead', 'plexify'); ?></p>
                        <span class="process-card__num" aria-hidden="true">01</span>
                    </article>
                    <div class="process__dot" aria-label="Step 1">1</div>
                </div>

                <div class="process__step process__step--right js-reveal">
                    <div class="process__dot" aria-label="Step 2">2</div>
                    <article class="process-card">
                        <div class="process-card__icon" aria-hidden="true">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><rect x="4" y="6" width="28" height="24" rx="2" stroke="#6EFF6A" stroke-width="1.8"/><path d="M4 14 L32 14" stroke="#6EFF6A" stroke-width="1.4"/><path d="M10 20 L14 24 L22 16" stroke="#6EFF6A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </div>
                        <h3><?php esc_html_e('Craft a tailored SEO and digital plan', 'plexify'); ?></h3>
                        <p class="process-card__sub"><?php esc_html_e('Tailored strategies for your brand.', 'plexify'); ?></p>
                        <span class="process-card__num" aria-hidden="true">02</span>
                    </article>
                </div>

                <div class="process__step process__step--left js-reveal">
                    <article class="process-card">
                        <div class="process-card__icon" aria-hidden="true">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><ellipse cx="18" cy="22" rx="10" ry="7" stroke="#6EFF6A" stroke-width="1.8"/><path d="M12 22 L12 10 Q18 4 24 10 L24 22" stroke="#6EFF6A" stroke-width="1.8"/><path d="M15 8 Q18 5 21 8" stroke="#6EFF6A" stroke-width="1.5"/></svg>
                        </div>
                        <h3><?php esc_html_e('Optimize your website for search engines', 'plexify'); ?></h3>
                        <p class="process-card__sub"><?php esc_html_e('Improve rankings &amp; visibility', 'plexify'); ?></p>
                        <span class="process-card__num" aria-hidden="true">03</span>
                    </article>
                    <div class="process__dot" aria-label="Step 3">3</div>
                </div>

                <div class="process__step process__step--right js-reveal">
                    <div class="process__dot" aria-label="Step 4">4</div>
                    <article class="process-card">
                        <div class="process-card__icon" aria-hidden="true">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none"><circle cx="18" cy="18" r="8" stroke="#6EFF6A" stroke-width="1.8"/><circle cx="18" cy="18" r="3" fill="#6EFF6A"/><path d="M18 6 L18 2 M18 34 L18 30 M6 18 L2 18 M34 18 L30 18 M9 9 L6 6 M30 30 L27 27 M27 9 L30 6 M9 27 L6 30" stroke="#6EFF6A" stroke-width="1.5"/></svg>
                        </div>
                        <h3><?php esc_html_e('Focus on long-term success &amp; growth', 'plexify'); ?></h3>
                        <p class="process-card__sub"><?php esc_html_e('Build sustainable success', 'plexify'); ?></p>
                        <span class="process-card__num" aria-hidden="true">04</span>
                    </article>
                </div>
            </div>
        </div>

        <!-- CTA band -->
        <div class="process__cta-band js-reveal">
            <p><?php esc_html_e('Start your dream project today', 'plexify'); ?></p>
            <a href="#contact" class="btn-pill" aria-label="Let's talk"><?php esc_html_e("Let's talk", 'plexify'); ?> →</a>
        </div>
    </section>

    <!-- ===================== 6. BLOG (DYNAMIC WORDPRESS LOOP) ===================== -->
    <section class="blog" id="blog" aria-label="Latest Blog and Articles">
        <div class="blog__inner">
            <div class="blog__left js-reveal">
                <h2 class="blog__heading"><?php esc_html_e('Our Latest', 'plexify'); ?><br><?php esc_html_e('Blog &amp;<br>Article', 'plexify'); ?></h2>
                <p class="blog__desc"><?php esc_html_e('Explore our latest blog and articles for expert insights on web design, SEO, and digital trends.', 'plexify'); ?></p>
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="btn-pill btn-pill--outline" aria-label="View all articles"><?php esc_html_e('View All', 'plexify'); ?> →</a>
            </div>

            <div class="blog__list">
                <?php
                // Query for latest blog posts
                $blog_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 5, // Matches the static design count
                    'post_status'    => 'publish',
                );
                $blog_query = new WP_Query( $blog_args );

                if ( $blog_query->have_posts() ) :
                    while ( $blog_query->have_posts() ) : $blog_query->the_post();
                ?>
                    <article class="blog-card js-reveal">
                        <div class="blog-card__text">
                            <h3 class="blog-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="blog-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            <div class="blog-card__meta">
                                <time datetime="<?php echo get_the_date( 'c' ); ?>" class="blog-card__date"><?php echo get_the_date( 'd M Y' ); ?></time>
                                <span class="blog-card__author">/ BY <?php the_author(); ?></span>
                            </div>
                        </div>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php 
                                // Using the registered image size 'plexify-blog-thumb' (150x150) from functions.php
                                // CSS will handle the responsive sizing (clamp)
                                the_post_thumbnail( 'plexify-blog-thumb', array( 'class' => 'blog-card__img', 'loading' => 'lazy' ) ); 
                                ?>
                            </a>
                        <?php else : ?>
                            <!-- Fallback image if no thumbnail is set -->
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/blog-placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="blog-card__img" loading="lazy"/>
                        <?php endif; ?>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Restore original Post Data
                else :
                    echo '<p class="blog-card__text">' . esc_html__( 'No posts found.', 'plexify' ) . '</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- ===================== 7. TESTIMONIALS ===================== -->
    <section class="testimonials" id="testimonials" aria-label="Client Testimonials">
        <div class="testimonials__inner">
            <div class="testimonials__left">
                <div class="testimonials__rating-card">
                    <p class="testimonials__score">4.5</p>
                    <p class="testimonials__rating-label"><?php esc_html_e('Star Rating on', 'plexify'); ?> <strong>★ Trustpilot</strong></p>
                    <p class="testimonials__exp"><?php esc_html_e('10 Years Experience in<br>Digital marketing', 'plexify'); ?></p>
                    <a href="#" class="btn-pill btn-pill--dark" aria-label="Rate us on Trustpilot"><?php esc_html_e('Rate Us on Trustpilot', 'plexify'); ?> →</a>
                </div>
            </div>

            <div class="testimonials__slider">
                <div class="testimonials__header js-reveal">
                    <h2><?php esc_html_e('Success Stories: How<br>Feedback Fuels Our Growth', 'plexify'); ?></h2>
                    <p class="testimonials__rated"><?php esc_html_e('Plexify is rated 4.5 / 5 average from 200 reviews on Google, Clutch!', 'plexify'); ?></p>
                </div>

                <div class="testimonials__track" id="testimonial-track" role="region" aria-label="Testimonial slider" aria-live="polite">
                    <blockquote class="testimonial-slide active">
                        <div class="testimonial-slide__stars" aria-label="5 stars">★★★★★</div>
                        <p><?php esc_html_e("This template has great documentation and support. It's very flexible and has so many options. thoughtfully crafted, and integrating it was seamless.", 'plexify'); ?></p>
                        <footer class="testimonial-slide__author">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/avatar-1.jpg" alt="<?php esc_attr_e('Isla Morgan portrait', 'plexify'); ?>" class="testimonial-slide__avatar" loading="lazy"/>
                            <div>
                                <cite class="testimonial-slide__name">Isla Morgan</cite>
                                <span class="testimonial-slide__company">Power XR2 Module</span>
                            </div>
                        </footer>
                    </blockquote>

                    <blockquote class="testimonial-slide">
                        <div class="testimonial-slide__stars" aria-label="5 stars">★★★★★</div>
                        <p><?php esc_html_e('Working with Plexify transformed our digital presence completely. The ROI we\'ve seen in just 3 months has exceeded all expectations.', 'plexify'); ?></p>
                        <footer class="testimonial-slide__author">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/avatar-2.jpg" alt="<?php esc_attr_e('James Chen portrait', 'plexify'); ?>" class="testimonial-slide__avatar" loading="lazy"/>
                            <div>
                                <cite class="testimonial-slide__name">James Chen</cite>
                                <span class="testimonial-slide__company">NexaTech Solutions</span>
                            </div>
                        </footer>
                    </blockquote>

                    <blockquote class="testimonial-slide">
                        <div class="testimonial-slide__stars" aria-label="5 stars">★★★★★</div>
                        <p><?php esc_html_e('The team at Plexify is outstanding. Their approach to data-driven marketing helped us cut ad spend by 40% while doubling conversions.', 'plexify'); ?></p>
                        <footer class="testimonial-slide__author">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/avatar-3.jpg" alt="<?php esc_attr_e('Sara Williams portrait', 'plexify'); ?>" class="testimonial-slide__avatar" loading="lazy"/>
                            <div>
                                <cite class="testimonial-slide__name">Sara Williams</cite>
                                <span class="testimonial-slide__company">Bloom Retail Co.</span>
                            </div>
                        </footer>
                    </blockquote>
                </div>

                <!-- Controls -->
                <div class="testimonials__controls" aria-label="Testimonial navigation">
                    <div class="testimonials__dots" id="testimonial-dots" role="tablist">
                        <button class="testimonials__dot active" role="tab" aria-selected="true" aria-label="Slide 1"></button>
                        <button class="testimonials__dot" role="tab" aria-selected="false" aria-label="Slide 2"></button>
                        <button class="testimonials__dot" role="tab" aria-selected="false" aria-label="Slide 3"></button>
                    </div>
                    <div class="testimonials__arrows">
                        <button class="testimonials__arrow" id="prev-testimonial" aria-label="Previous testimonial">←</button>
                        <button class="testimonials__arrow" id="next-testimonial" aria-label="Next testimonial">→</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 8. FAQ ===================== -->
    <section class="faq" id="faq" aria-label="Frequently Asked Questions">
        <div class="faq__inner">
            <div class="faq__image-wrap">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/faq-team.jpg" alt="<?php esc_attr_e('Two professionals in a consultation meeting', 'plexify'); ?>" class="faq__img" loading="lazy"/>
            </div>

            <div class="faq__content">
                <h2 class="faq__heading js-reveal"><?php esc_html_e('Frequently<br>Asked Questions', 'plexify'); ?></h2>
                <p class="faq__sub js-reveal"><?php esc_html_e('We have professional experts around world.', 'plexify'); ?></p>

                <div class="faq__list" role="list">
                    <div class="faq__item js-reveal" role="listitem">
                        <button class="faq__q" aria-expanded="true" aria-controls="faq-a-1">
                            <?php esc_html_e('What digital marketing services do you offer?', 'plexify'); ?>
                            <span class="faq__icon" aria-hidden="true">▲</span>
                        </button>
                        <div class="faq__a" id="faq-a-1" role="region">
                            <p><?php esc_html_e('We offer SEO, email marketing, social media marketing, paid search, content strategy, and conversion rate optimization — all tailored to your brand\'s unique goals.', 'plexify'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item js-reveal" role="listitem">
                        <button class="faq__q" aria-expanded="false" aria-controls="faq-a-2">
                            <?php esc_html_e('How long before I see results?', 'plexify'); ?>
                            <span class="faq__icon" aria-hidden="true">▼</span>
                        </button>
                        <div class="faq__a faq__a--closed" id="faq-a-2" role="region">
                            <p><?php esc_html_e('Paid campaigns typically show results within 2–4 weeks. SEO efforts build over 3–6 months for lasting organic impact. We provide monthly reports so you always know where you stand.', 'plexify'); ?></p>
                        </div>
                    </div>

                    <div class="faq__item js-reveal" role="listitem">
                        <button class="faq__q" aria-expanded="false" aria-controls="faq-a-3">
                            <?php esc_html_e('What is the difference between SEO and SEM?', 'plexify'); ?>
                            <span class="faq__icon" aria-hidden="true">▼</span>
                        </button>
                        <div class="faq__a faq__a--closed" id="faq-a-3" role="region">
                            <p><?php esc_html_e('SEO (Search Engine Optimization) builds organic visibility over time. SEM (Search Engine Marketing) uses paid ads for immediate placement. A combined approach delivers the best results.', 'plexify'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===================== 9. BRANDS / TRUST BAR ===================== -->
    <section class="brands" aria-label="Trusted by leading brands">
        <div class="brands__inner">
            <div class="brands__left">
                <p class="brands__label"><?php esc_html_e('Trusted and top rated tech team', 'plexify'); ?></p>
                <p class="brands__rating">
                    <strong>Clutch</strong>
                    <span class="brands__score">4.9/5</span>
                    <span class="brands__stars" aria-label="4.9 out of 5 stars">★★★★★</span>
                    <span class="brands__reviews">1.24k <?php esc_html_e('client reviews', 'plexify'); ?></span>
                </p>
            </div>
            <div class="brands__divider" aria-hidden="true"></div>
            <ul class="brands__logos" role="list" aria-label="Partner brands">
                <li><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/brand-ultra.svg" alt="<?php esc_attr_e('Ultra Prestigious — Best of the World', 'plexify'); ?>" class="brands__logo" loading="lazy"/></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/brand-logoipsum1.svg" alt="<?php esc_attr_e('Logoipsum Brand Standard', 'plexify'); ?>" class="brands__logo" loading="lazy"/></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/brand-logoipsum2.svg" alt="<?php esc_attr_e('Logo Ipsum', 'plexify'); ?>" class="brands__logo" loading="lazy"/></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/brand-logoipsum3.svg" alt="<?php esc_attr_e('Logoipsum', 'plexify'); ?>" class="brands__logo" loading="lazy"/></li>
                <li><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/brand-power.svg" alt="<?php esc_attr_e('Power XR2 Module', 'plexify'); ?>" class="brands__logo" loading="lazy"/></li>
            </ul>
        </div>
    </section>

</main>

<!-- Scroll to top -->
<button class="scroll-top" id="scroll-top" aria-label="Scroll to top">↑</button>

<?php
get_footer();