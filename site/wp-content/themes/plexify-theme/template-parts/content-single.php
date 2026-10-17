<?php
/**
 * template-parts/content-single.php — Plexify Theme
 * قالب المنشور الفردي الكامل
 *
 * @package Plexify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'plexify-single-post' ); ?>>

    <header class="plexify-single-post__header">
        <?php
        $cats = get_the_category();
        if ( $cats ) :
            echo '<div class="plexify-single-post__cats">';
            foreach ( $cats as $cat ) {
                echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="service-card__tag">'
                     . esc_html( $cat->name ) . '</a>';
            }
            echo '</div>';
        endif;
        ?>

        <h1 class="plexify-single-post__title"><?php the_title(); ?></h1>

        <div class="plexify-single-post__meta">
            <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
            <span><?php esc_html_e( 'By', 'plexify' ); ?>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php the_author(); ?>
                </a>
            </span>
            <span><?php echo esc_html( get_the_reading_time_in_minutes() ?? '' ); ?></span>
        </div>
    </header>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="plexify-single-post__thumbnail">
            <?php the_post_thumbnail( 'large', [ 'class' => 'plexify-featured-image' ] ); ?>
        </div>
    <?php endif; ?>

    <div class="plexify-single-post__content">
        <?php the_content(); ?>
        <?php
        wp_link_pages( [
            'before' => '<nav class="page-links"><span>' . esc_html__( 'الصفحات:', 'plexify' ) . '</span>',
            'after'  => '</nav>',
        ] );
        ?>
    </div>

    <footer class="plexify-single-post__footer">
        <?php
        $tags = get_the_tags();
        if ( $tags ) :
            echo '<div class="plexify-single-post__tags">';
            foreach ( $tags as $tag ) {
                echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="plexify-tag">'
                     . esc_html( $tag->name ) . '</a>';
            }
            echo '</div>';
        endif;
        ?>
    </footer>

</article>
