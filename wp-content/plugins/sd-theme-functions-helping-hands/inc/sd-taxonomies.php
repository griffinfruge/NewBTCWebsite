<?php
/* ----------------------------------------------------- */
/* Taxonomies 									 */
/* ----------------------------------------------------- */

if ( !function_exists( 'sd_taxonomies' ) ) {
	function sd_taxonomies() {
		
		global $sd_data;
		
		// staff categories
		
		$sd_staff_slug = ( !empty( $sd_data['sd_staff_slug'] ) ? $sd_data['sd_staff_slug'] : 'staff-category' );
		
		$staff_labels = array(
			'name'              => __( 'Staff Categories', 'sd-framework' ),
			'singular_name'     => __( 'Staff Category', 'sd-framework' ),
			'search_items'      => __( 'Search Staff Categories', 'sd-framework' ),
			'all_items'         => __( 'All Staff Categories', 'sd-framework' ),
			'edit_item'         => __( 'Edit Staff Category', 'sd-framework' ),
			'update_item'       => __( 'Update Staff  Category', 'sd-framework' ),
			'add_new_item'      => __( 'Add New Staff Category', 'sd-framework' ),
			'new_item_name'     => __( 'New Portfolio Category', 'sd-framework' ),
			'menu_name'         => __( 'Staff Categories', 'sd-framework' )
		);
	
		$staff_args = array(
			'hierarchical'      => true,
			'labels'            => $staff_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $sd_staff_slug )
		);
		
		register_taxonomy( 'staff-category', array( 'staff' ), $staff_args );
		
		// project filters
		
		$sd_projects_slug = ( !empty( $sd_data['sd_projects_slug'] ) ? $sd_data['sd_projects_slug'] : 'projects-filters' );
		
		$projects_labels_filters = array(
			'name'              => __( 'Projects Filters', 'sd-framework' ),
			'singular_name'     => __( 'Project Filter', 'sd-framework' ),
			'search_items'      => __( 'Search Projects Filters', 'sd-framework' ),
			'all_items'         => __( 'All Projects Filters', 'sd-framework' ),
			'edit_item'         => __( 'Edit Project Filter', 'sd-framework' ),
			'update_item'       => __( 'Update Project Filter', 'sd-framework' ),
			'add_new_item'      => __( 'Add New Project Filter', 'sd-framework' ),
			'new_item_name'     => __( 'New Project Filter', 'sd-framework' ),
			'menu_name'         => __( 'Projects Filters', 'sd-framework' )
		);
	
		$projects_args_filters = array(
			'hierarchical'      => true,
			'labels'            => $projects_labels_filters,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $sd_projects_slug )
		);
		
		register_taxonomy( 'projects_filters', array( 'projects' ), $projects_args_filters );
		
		// event category
		
		$sd_events_cat_slug = ( !empty( $sd_data['sd_events_cat_slug'] ) ? $sd_data['sd_events_cat_slug'] : 'event-category' );
		
		$event_labels_category = array(
			'name'              => __( 'Event Categories', 'sd-framework' ),
			'singular_name'     => __( 'Event Category', 'sd-framework' ),
			'search_items'      => __( 'Search Event Categories', 'sd-framework' ),
			'all_items'         => __( 'All Event Categories', 'sd-framework' ),
			'edit_item'         => __( 'Edit Event Category', 'sd-framework' ),
			'update_item'       => __( 'Update Event Category', 'sd-framework' ),
			'add_new_item'      => __( 'Add New Event Category', 'sd-framework' ),
			'new_item_name'     => __( 'New Event Category', 'sd-framework' ),
			'menu_name'         => __( 'Event Categories', 'sd-framework' )
		);
	
		$event_args_categories = array(
			'hierarchical'      => true,
			'labels'            => $event_labels_category,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $sd_events_cat_slug )
		);
		
		register_taxonomy( 'event_category', array( 'events' ), $event_args_categories );
	}
	add_action( 'init', 'sd_taxonomies' );
}