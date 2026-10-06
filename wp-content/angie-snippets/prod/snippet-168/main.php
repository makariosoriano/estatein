<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

const FEATURED_PROPERTIES_ASSETS_VERSION_bdf72cd6 = '1.2.0';

function register_featured_properties_widget_bdf72cd6( $widgets_manager ) {
    require_once __DIR__ . '/widget-featured-properties.php';
    $widgets_manager->register( new \AngieSnippets\Featured_Properties_bdf72cd6() );
}
add_action( 'elementor/widgets/register', 'register_featured_properties_widget_bdf72cd6' );

function register_featured_properties_assets_bdf72cd6() {
    wp_register_style( 'featured-properties-style-bdf72cd6', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], FEATURED_PROPERTIES_ASSETS_VERSION_bdf72cd6 );
}
add_action( 'wp_enqueue_scripts', 'register_featured_properties_assets_bdf72cd6' );
