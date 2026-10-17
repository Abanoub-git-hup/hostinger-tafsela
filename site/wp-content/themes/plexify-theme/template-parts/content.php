<?php
/**
 * template-parts/content.php — Plexify Theme
 * قالب عرض المنشور داخل Loop (للأرشيف والمدونة)
 *
 * @package Plexify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'plexify-post-card' ); ?> role="article">

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="plexify-post-card__thumb">
            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail( 'plexify-blog-card', [
                    'alt'     => the_title_attribute( [ 'echo' => false ] ),
                    'loading' => 'lazy',
                    'class'   => 'plexify-post-card__img',
                ] ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="plexify-post-card__body">

        <!-- ميتا المنشور -->
        <div class="plexify-post-card__meta">
            <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>" class="plexify-post-card__date">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
            <span class="plexify-post-card__author">
                <?php esc_html_e( 'By', 'plexify' ); ?>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php the_author(); ?>
                </a>
            </span>
        </div>

        <!-- العنوان -->
        <h2 class="plexify-post-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <!-- المقتطف -->
        <p class="plexify-post-card__excerpt">
            <?php echo wp_trim_words( get_the_excerpt(), 20, '&hellip;' ); ?>
        </p>

        <!-- رابط القراءة -->
        <a href="<?php the_permalink(); ?>"
           class="plexify-post-card__link feature-card__link"
           aria-label="<?php printf( esc_attr__( 'اقرأ المزيد عن %s', 'plexify' ), get_the_title() ); ?>">
            <?php esc_html_e( 'اقرأ المزيد', 'plexify' ); ?> ↗
        </a>

    </div>
</article>
