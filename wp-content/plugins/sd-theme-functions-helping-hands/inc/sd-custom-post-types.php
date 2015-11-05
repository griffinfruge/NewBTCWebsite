<?php
/* ----------------------------------------------------- */
/* Custom Post Types 							         */
/* ----------------------------------------------------- */

if ( !function_exists( 'sd_register_post_types' ) ) {
	function sd_register_post_types() {
		
		global $sd_data;
		
		// Staff Post Type
	
		$staff_labels = array(
			'name'               => __( 'Staff', 'sd-framework' ),
			'singular_name'      => __( 'Staff', 'sd-framework' ),
			'add_new'            => __( 'Add New Staff Member', 'sd-framework' ),
			'add_new_item'       => __( 'Add New Staff Member', 'sd-framework' ),
			'edit_item'          => __( 'Edit Staff Member', 'sd-framework' ),
			'new_item'           => __( 'Add New Staff Member', 'sd-framework' ),
			'view_item'          => __( 'View Staff Member', 'sd-framework' ),
			'search_items'       => __( 'Search Staff Member', 'sd-framework' ),
			'not_found'          => __( 'No staff members found', 'sd-framework' ),
			'not_found_in_trash' => __( 'No staff members found in trash', 'sd-framework' ),
		);

		$custom_staff_slug = ( !empty( $sd_data[ 'sd_staff_slug'] ) ? $sd_data['sd_staff_slug'] : 'staff-page' );

		$staff_args = array(
			'public'              => true,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'exclude_from_search' => false,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-businessman',
			'can_export'          => true,
			'delete_with_user'    => false,
			'labels'              => $staff_labels,
			'public'              => true,
			'show_ui'             => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $custom_staff_slug, 'with_front' => false ), // Permalinks format
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'staff' , $staff_args );

		// Testimonials Post Type

		$testimonials_labels = array(
			'name'               => __( 'Testimonials', 'sd-framework' ),
			'singular_name'      => __( 'Testimonials', 'sd-framework' ),
			'add_new'            => __( 'Add New Testimonial', 'sd-framework' ),
			'add_new_item'       => __( 'Add New Testimonial', 'sd-framework' ),
			'edit_item'          => __( 'Edit Testimonial', 'sd-framework' ),
			'new_item'           => __( 'Add New Testimonial', 'sd-framework' ),
			'view_item'          => __( 'View Testimonial', 'sd-framework' ),
			'search_items'       => __( 'Search Testimonial', 'sd-framework' ),
			'not_found'          => __( 'No testimonials found', 'sd-framework' ),
			'not_found_in_trash' => __( 'No testimonials found in trash', 'sd-framework' ),
		);

		$testimonials_args = array(
			'public'              => true,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'exclude_from_search' => false,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-format-quote',
			'can_export'          => true,
			'delete_with_user'    => false,
			'labels'              => $testimonials_labels,
			'public'              => true,
			'show_ui'             => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => 'testimonials-page', 'with_front' => false ), // Permalinks format
			'supports'            => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'testimonials' , $testimonials_args );
		
		// Case Study Post Type
		
		$sd_events_slug = ( !empty( $sd_data[ 'sd_events_slug'] ) ? $sd_data['sd_events_slug'] : 'events-page' );

		$events_labels = array(
			'name'               => __( 'Events', 'sd-framework' ),
			'singular_name'      => __( 'Events', 'sd-framework' ),
			'add_new'            => __( 'Add Event', 'sd-framework' ),
			'add_new_item'       => __( 'Add New Event', 'sd-framework' ),
			'edit_item'          => __( 'Edit Event', 'sd-framework' ),
			'new_item'           => __( 'Add New Event', 'sd-framework' ),
			'view_item'          => __( 'View Event', 'sd-framework' ),
			'search_items'       => __( 'Search Events', 'sd-framework' ),
			'not_found'          => __( 'No events found', 'sd-framework' ),
			'not_found_in_trash' => __( 'No events found in trash', 'sd-framework' ),
		);

		$events_args = array(
			'public'              => true,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'exclude_from_search' => false,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-calendar',
			'can_export'          => true,
			'delete_with_user'    => false,
			'labels'              => $events_labels,
			'public'              => true,
			'show_ui'             => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => $sd_events_slug, 'with_front' => false ), // Permalinks format
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'events' , $events_args );
	}
	// Add Custom Post Types
	add_action('init', 'sd_register_post_types');
}
