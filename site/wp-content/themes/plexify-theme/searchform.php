<?php
/**
 * searchform.php — Plexify Theme
 * نموذج البحث المخصص
 *
 * @package Plexify
 */
?>

<form role="search" method="get" class="plexify-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="plexify-search-form__label" for="plexify-search-<?php echo esc_attr( uniqid() ); ?>">
        <span class="screen-reader-text"><?php esc_html_e( 'بحث عن:', 'plexify' ); ?></span>
        <input
            type="search"
            id="plexify-search-<?php echo esc_attr( uniqid() ); ?>"
            class="plexify-search-form__input"
            placeholder="<?php esc_attr_e( 'ابحث هنا...', 'plexify' ); ?>"
            value="<?php echo esc_attr( get_search_query() ); ?>"
            name="s"
            autocomplete="off"
        />
    </label>
    <button type="submit" class="plexify-search-form__btn btn-pill" aria-label="<?php esc_attr_e( 'بحث', 'plexify' ); ?>">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
            <circle cx="7.5" cy="7.5" r="5.5" stroke="currentColor" stroke-width="2"/>
            <path d="M12 12 L16 16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
        <span class="screen-reader-text"><?php esc_html_e( 'بحث', 'plexify' ); ?></span>
    </button>
</form>
