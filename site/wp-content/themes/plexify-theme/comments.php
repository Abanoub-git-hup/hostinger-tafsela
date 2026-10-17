<?php
/**
 * comments.php — Plexify Theme
 * قالب التعليقات
 *
 * @package Plexify
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="plexify-comments">

    <?php if ( have_comments() ) : ?>

        <h2 class="plexify-comments__title">
            <?php
            $count = get_comments_number();
            printf(
                esc_html( _nx( '%1$s تعليق على "%2$s"', '%1$s تعليقات على "%2$s"', $count, 'comments title', 'plexify' ) ),
                number_format_i18n( $count ),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ol class="plexify-comments__list">
            <?php
            wp_list_comments( [
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
                'callback'    => 'plexify_comment_template',
            ] );
            ?>
        </ol>

        <?php the_comments_pagination( [
            'prev_text' => '← ' . esc_html__( 'التعليقات السابقة', 'plexify' ),
            'next_text' => esc_html__( 'التعليقات التالية', 'plexify' ) . ' →',
        ] ); ?>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="plexify-comments__closed">
            <?php esc_html_e( 'التعليقات مغلقة.', 'plexify' ); ?>
        </p>
    <?php endif; ?>

    <?php
    comment_form( [
        'title_reply'          => esc_html__( 'اترك تعليقاً', 'plexify' ),
        'title_reply_to'       => esc_html__( 'الرد على %s', 'plexify' ),
        'cancel_reply_link'    => esc_html__( 'إلغاء الرد', 'plexify' ),
        'label_submit'         => esc_html__( 'إرسال التعليق', 'plexify' ),
        'comment_notes_before' => '<p class="plexify-comments__note">' . esc_html__( 'لن يتم نشر بريدك الإلكتروني. الحقول الإلزامية مشار إليها بـ *', 'plexify' ) . '</p>',
        'fields'               => [
            'author' => '<div class="plexify-comment-field"><label for="author">' . esc_html__( 'الاسم', 'plexify' ) . ' <span>*</span></label><input id="author" name="author" type="text" required></div>',
            'email'  => '<div class="plexify-comment-field"><label for="email">' . esc_html__( 'البريد الإلكتروني', 'plexify' ) . ' <span>*</span></label><input id="email" name="email" type="email" required></div>',
            'url'    => '<div class="plexify-comment-field"><label for="url">' . esc_html__( 'الموقع الإلكتروني', 'plexify' ) . '</label><input id="url" name="url" type="url"></div>',
        ],
        'comment_field'        => '<div class="plexify-comment-field"><label for="comment">' . esc_html__( 'التعليق', 'plexify' ) . ' <span>*</span></label><textarea id="comment" name="comment" rows="6" required></textarea></div>',
    ] );
    ?>

</div><!-- /#comments -->

<?php
/**
 * دالة callback لعرض كل تعليق — تُستدعى من wp_list_comments()
 */
function plexify_comment_template( WP_Comment $comment, array $args, int $depth ): void {
    $tag = 'div' === $args['style'] ? 'div' : 'li';
    ?>
    <<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'plexify-comment', $comment ); ?>>
        <article class="plexify-comment__body">
            <div class="plexify-comment__meta">
                <div class="plexify-comment__avatar">
                    <?php echo get_avatar( $comment, 48, '', '', [ 'class' => 'plexify-comment__avatar-img' ] ); ?>
                </div>
                <div class="plexify-comment__info">
                    <b class="plexify-comment__author"><?php comment_author( $comment ); ?></b>
                    <time class="plexify-comment__date" datetime="<?php comment_date( 'c', $comment ); ?>">
                        <?php comment_date( get_option( 'date_format' ), $comment ); ?>
                    </time>
                </div>
                <?php if ( '0' === $comment->comment_approved ) : ?>
                    <em class="plexify-comment__pending"><?php esc_html_e( 'تعليقك قيد المراجعة.', 'plexify' ); ?></em>
                <?php endif; ?>
            </div>

            <div class="plexify-comment__text">
                <?php comment_text( $comment ); ?>
            </div>

            <div class="plexify-comment__actions">
                <?php
                comment_reply_link( array_merge( $args, [
                    'add_below' => 'comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="plexify-reply-link">',
                    'after'     => '</span>',
                ] ) );
                edit_comment_link( esc_html__( 'تعديل', 'plexify' ), '<span class="plexify-edit-link">', '</span>' );
                ?>
            </div>
        </article>
    <?php
}
