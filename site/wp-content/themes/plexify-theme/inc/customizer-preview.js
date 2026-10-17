/**
 * inc/customizer-preview.js — Plexify Theme
 * Live Preview للـ Customizer (transport: postMessage)
 * يُحمَّل فقط داخل نافذة Customizer
 */

( function ( $ ) {
    'use strict';

    /* ---- نص الـ badge في الهيرو ---- */
    wp.customize( 'plexify_hero_badge', function ( value ) {
        value.bind( function ( newVal ) {
            $( '.hero__badge p' ).text( newVal );
        } );
    } );

    /* ---- نص زر CTA ---- */
    wp.customize( 'plexify_hero_cta_text', function ( value ) {
        value.bind( function ( newVal ) {
            $( '.nav__cta-inner' ).contents().filter( function () {
                return this.nodeType === 3; // text node
            } ).first().replaceWith( newVal + ' ' );
        } );
    } );

    /* ---- لون الـ Accent ---- */
    wp.customize( 'plexify_accent_color', function ( value ) {
        value.bind( function ( newVal ) {
            document.documentElement.style.setProperty( '--lime', newVal );
        } );
    } );

} )( jQuery );
