<?php
/**
 * Estatein theme bootstrap.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ESTATEIN_VERSION', '1.0.0' );
define( 'ESTATEIN_DIR', get_template_directory() );
define( 'ESTATEIN_URI', get_template_directory_uri() );

require_once ESTATEIN_DIR . '/inc/cpt.php';
require_once ESTATEIN_DIR . '/inc/customizer.php';
require_once ESTATEIN_DIR . '/inc/demo-content.php';

function estatein_setup() {
	load_theme_textdomain( 'estatein', ESTATEIN_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 48,
			'width'       => 180,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus(
		array(
			'primary'       => __( 'Primary Menu', 'estatein' ),
			'footer_home'   => __( 'Footer — Home', 'estatein' ),
			'footer_about'  => __( 'Footer — About Us', 'estatein' ),
			'footer_props'  => __( 'Footer — Properties', 'estatein' ),
			'footer_services' => __( 'Footer — Services', 'estatein' ),
			'footer_contact' => __( 'Footer — Contact Us', 'estatein' ),
		)
	);

	add_image_size( 'estatein-card', 720, 420, true );
	add_image_size( 'estatein-hero', 900, 720, true );
}
add_action( 'after_setup_theme', 'estatein_setup' );

function estatein_scripts() {
	wp_enqueue_style(
		'estatein-fonts',
		'https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'estatein-theme', ESTATEIN_URI . '/assets/css/theme.css', array( 'estatein-fonts' ), ESTATEIN_VERSION );
	wp_enqueue_script( 'estatein-theme', ESTATEIN_URI . '/assets/js/theme.js', array(), ESTATEIN_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'estatein_scripts' );

function estatein_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Newsletter', 'estatein' ),
			'id'            => 'footer-newsletter',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'estatein_widgets_init' );

function estatein_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'estatein_excerpt_more' );

function estatein_get_option( $key, $default = '' ) {
	$value = get_theme_mod( $key, $default );
	return ( '' === $value || null === $value ) ? $default : $value;
}

function estatein_icon( $name ) {
	$icons = array(
		'home'     => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 10.5 12 4l8 6.5V20a1 1 0 0 1-1 1h-5v-6H10v6H5a1 1 0 0 1-1-1v-9.5Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>',
		'value'    => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19h16M6 16V9m6 7V5m6 11v-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="6" cy="7" r="1.6" fill="currentColor"/><circle cx="12" cy="3.5" r="1.6" fill="currentColor"/><circle cx="18" cy="9.5" r="1.6" fill="currentColor"/></svg>',
		'building' => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20V8l8-4 8 4v12" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="M9 20v-6h6v6M10 10h.01M14 10h.01M10 13h.01M14 13h.01" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'sun'      => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/><path d="M12 3v2M12 19v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M3 12h2M19 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'bed'      => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 18v-5a3 3 0 0 1 3-3h12a3 3 0 0 1 3 3v5M3 18h18M3 21v-3M21 21v-3M7 10V8a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'bath'     => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12h16v3a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4v-3Z" stroke="currentColor" stroke-width="1.6"/><path d="M7 12V7a2 2 0 0 1 2-2h1M6 19l-1 2M18 19l1 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'villa'    => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M3 20h18M5 20V10l7-5 7 5v10M10 20v-5h4v5" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>',
		'star'     => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="m12 3.2 2.5 5.2 5.7.8-4.1 4 1 5.7L12 16.2 6.9 18.9l1-5.7-4.1-4 5.7-.8L12 3.2Z"/></svg>',
		'arrow'    => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
		'mail'     => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>',
		'send'     => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12 20 4l-6 16-2.5-6.5L4 12Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>',
		'logo'     => '<svg viewBox="0 0 32 32" fill="none" aria-hidden="true"><rect width="32" height="32" rx="8" fill="#703BF7"/><path d="M8 22V13.5L16 8l8 5.5V22h-5v-5h-6v5H8Z" fill="white"/></svg>',
	);

	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}

function estatein_format_price( $price ) {
	$price = preg_replace( '/[^0-9.]/', '', (string) $price );
	if ( '' === $price ) {
		return '';
	}
	return '$' . number_format( (float) $price );
}

function estatein_fallback_menu() {
	echo '<ul>';
	echo '<li class="current-menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'estatein' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/about-us/' ) ) . '">' . esc_html__( 'About Us', 'estatein' ) . '</a></li>';
	echo '<li><a href="' . esc_url( get_post_type_archive_link( 'property' ) ) . '">' . esc_html__( 'Properties', 'estatein' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/services/' ) ) . '">' . esc_html__( 'Services', 'estatein' ) . '</a></li>';
	echo '</ul>';
}

function estatein_query_properties( $count = 3 ) {
	return new WP_Query(
		array(
			'post_type'      => 'property',
			'posts_per_page' => $count,
			'post_status'    => 'publish',
			'orderby'        => 'date',
			'order'          => 'DESC',
		)
	);
}

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'allow_svg_uploads');
