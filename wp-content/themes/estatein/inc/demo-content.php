<?php
/**
 * Seeds demo properties, pages, and menus on first theme activation.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function estatein_seed_demo_content() {
	if ( get_option( 'estatein_demo_seeded' ) ) {
		return;
	}

	$home_id = wp_insert_post(
		array(
			'post_title'  => 'Home',
			'post_status' => 'publish',
			'post_type'   => 'page',
		)
	);
	$about_id = wp_insert_post(
		array(
			'post_title'   => 'About Us',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '<p>Estatein is a modern real estate partner helping clients discover, value, and manage exceptional properties.</p>',
		)
	);
	$services_id = wp_insert_post(
		array(
			'post_title'   => 'Services',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '<p>From buying and selling to property management and investment strategy, our team covers the full journey.</p>',
		)
	);
	$contact_id = wp_insert_post(
		array(
			'post_title'   => 'Contact Us',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '<p>Email hello@estatein.com or use the form on this page to get in touch with our advisors.</p>',
		)
	);

	if ( $home_id && ! is_wp_error( $home_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	$properties = array(
		array(
			'title'     => 'Seaside Serenity Villa',
			'excerpt'   => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood.',
			'price'     => '1250000',
			'bedrooms'  => '4',
			'bathrooms' => '3',
			'type'      => 'Villa',
			'image'     => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=80',
		),
		array(
			'title'     => 'Metropolitan Haven',
			'excerpt'   => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views.',
			'price'     => '650000',
			'bedrooms'  => '2',
			'bathrooms' => '2',
			'type'      => 'Villa',
			'image'     => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80',
		),
		array(
			'title'     => 'Rustic Retreat Cottage',
			'excerpt'   => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community.',
			'price'     => '550000',
			'bedrooms'  => '3',
			'bathrooms' => '3',
			'type'      => 'Villa',
			'image'     => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?auto=format&fit=crop&w=1200&q=80',
		),
	);

	foreach ( $properties as $item ) {
		$post_id = wp_insert_post(
			array(
				'post_title'   => $item['title'],
				'post_excerpt' => $item['excerpt'],
				'post_content' => $item['excerpt'],
				'post_status'  => 'publish',
				'post_type'    => 'property',
			)
		);
		if ( is_wp_error( $post_id ) ) {
			continue;
		}
		update_post_meta( $post_id, '_estatein_price', $item['price'] );
		update_post_meta( $post_id, '_estatein_bedrooms', $item['bedrooms'] );
		update_post_meta( $post_id, '_estatein_bathrooms', $item['bathrooms'] );
		update_post_meta( $post_id, '_estatein_type', $item['type'] );
		estatein_sideload_thumbnail( $post_id, $item['image'], $item['title'] );
	}

	$menu_id = wp_create_nav_menu( 'Primary' );
	if ( ! is_wp_error( $menu_id ) ) {
		$locations = get_theme_mod( 'nav_menu_locations', array() );
		$locations['primary'] = $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );

		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => 'Home',
				'menu-item-url'    => home_url( '/' ),
				'menu-item-status' => 'publish',
			)
		);
		foreach ( array( $about_id => 'About Us', $services_id => 'Services' ) as $pid => $title ) {
			if ( $pid && ! is_wp_error( $pid ) ) {
				wp_update_nav_menu_item(
					$menu_id,
					0,
					array(
						'menu-item-title'     => $title,
						'menu-item-object'    => 'page',
						'menu-item-object-id' => $pid,
						'menu-item-type'      => 'post_type',
						'menu-item-status'    => 'publish',
					)
				);
			}
		}
		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-title'  => 'Properties',
				'menu-item-url'    => get_post_type_archive_link( 'property' ),
				'menu-item-status' => 'publish',
			)
		);
	}

	flush_rewrite_rules();
	update_option( 'estatein_demo_seeded', 1 );
}
add_action( 'after_switch_theme', 'estatein_seed_demo_content' );

function estatein_sideload_thumbnail( $post_id, $url, $title ) {
	if ( ! function_exists( 'media_sideload_image' ) ) {
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';
	}

	$attach_id = media_sideload_image( $url, $post_id, $title, 'id' );
	if ( ! is_wp_error( $attach_id ) ) {
		set_post_thumbnail( $post_id, $attach_id );
	}
}
