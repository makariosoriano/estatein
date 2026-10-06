<?php
/**
 * Property custom post type.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function estatein_register_cpt() {
	register_post_type(
		'property',
		array(
			'labels'       => array(
				'name'          => __( 'Properties', 'estatein' ),
				'singular_name' => __( 'Property', 'estatein' ),
				'add_new_item'  => __( 'Add New Property', 'estatein' ),
				'edit_item'     => __( 'Edit Property', 'estatein' ),
			),
			'public'       => true,
			'has_archive'  => true,
			'menu_icon'    => 'dashicons-admin-home',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'rewrite'      => array( 'slug' => 'properties' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'estatein_register_cpt' );

function estatein_property_meta_boxes() {
	add_meta_box(
		'estatein_property_details',
		__( 'Property Details', 'estatein' ),
		'estatein_property_meta_box_html',
		'property',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'estatein_property_meta_boxes' );

function estatein_property_meta_box_html( $post ) {
	wp_nonce_field( 'estatein_property_meta', 'estatein_property_nonce' );
	$fields = array(
		'price'     => __( 'Price (number only)', 'estatein' ),
		'bedrooms'  => __( 'Bedrooms', 'estatein' ),
		'bathrooms' => __( 'Bathrooms', 'estatein' ),
		'type'      => __( 'Type (Villa, Cottage…)', 'estatein' ),
	);
	foreach ( $fields as $key => $label ) {
		$value = get_post_meta( $post->ID, '_estatein_' . $key, true );
		echo '<p><label for="estatein_' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label>';
		echo '<input type="text" class="widefat" id="estatein_' . esc_attr( $key ) . '" name="estatein_' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '"></p>';
	}
}

function estatein_save_property_meta( $post_id ) {
	if ( ! isset( $_POST['estatein_property_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_property_nonce'] ) ), 'estatein_property_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( array( 'price', 'bedrooms', 'bathrooms', 'type' ) as $key ) {
		if ( isset( $_POST[ 'estatein_' . $key ] ) ) {
			update_post_meta( $post_id, '_estatein_' . $key, sanitize_text_field( wp_unslash( $_POST[ 'estatein_' . $key ] ) ) );
		}
	}
}
add_action( 'save_post_property', 'estatein_save_property_meta' );
