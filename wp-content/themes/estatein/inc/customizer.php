<?php
/**
 * Theme Customizer settings for homepage copy.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function estatein_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'estatein_home',
		array(
			'title'    => __( 'Estatein Homepage', 'estatein' ),
			'priority' => 30,
		)
	);
}
add_action( 'customize_register', 'estatein_customize_register' );
