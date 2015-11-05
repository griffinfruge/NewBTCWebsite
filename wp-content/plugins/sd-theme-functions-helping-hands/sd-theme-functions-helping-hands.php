<?php
/**
Plugin Name: SD Theme Functions Helping Hands
Plugin URI: http://skat.tf/
Description: A plugin that adds custom functionality to Skat Design themes.
Version: 1.0
Author: Skat Design
Author URI: http://skat.tf/
*/

/**
 * Copyright (c) 2015 Skat Design. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */
 
if(!class_exists('SdThemeFunctions')) {
	 class SdThemeFunctions {
		 
		 public function __construct() {
			
			/* Plugin paths. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_plugin_paths' ), 1 );
			/* Localization files. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_localize' ), 1 );
			/* Events Functions files. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_functions' ), 2 );
			/* Admin files. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_admin_functions' ), 3 );
			/* Enqueue scripts and styles. */
			//add_action('wp_enqueue_scripts', array(&$this, 'sd_tf_front_enqueue'), '999');
			add_action('admin_enqueue_scripts', array(&$this, 'sd_admin_enqueue'), '999');
		}
		
		function sd_tf_plugin_paths() {

			/* Set path to the plugin directory. */
			define( 'SD_TF_DIR', trailingslashit( plugin_dir_url( __FILE__ ) ) );

			/* Set path to the inc directory. */
			define( 'SD_TF_INC', SD_TF_DIR . trailingslashit( 'inc' ) );
			
			/* Set path to the css directory. */
			define( 'SD_TF_CSS', SD_TF_INC . trailingslashit( 'css' ) );
			
			/* Set path to the js directory. */
			define( 'SD_TF_JS', SD_TF_INC . trailingslashit( 'js' ) );
		}
		
		function sd_tf_front_enqueue() {
			
			// Register scripts and styles
			//wp_register_script ('education-js', SD_ED_JS . 'customSelect.js', array('jquery'), true);
			//wp_register_style ('education-css', SD_ED_CSS . 'styles.css', array(), '1.0', 'all');
			
			// Enqueue scripts and styles
			//wp_enqueue_style ('education-css');
			//wp_enqueue_script ('education-js');
		}
		
		function sd_admin_enqueue() {
			
			// Register scripts and styles
			wp_register_script ('sd-scripts', SD_TF_JS . 'scripts.js', array( 'jquery' ), true);
			
			// Enqueue scripts and styles
			wp_enqueue_script ('sd-scripts');
		}
		
		public function sd_tf_functions() {
		
			foreach ( glob( plugin_dir_path( __FILE__ )."inc/*.php" ) as $files )
		    require_once $files;
	
		}
		
		public function sd_tf_localize() {

			/* Load the translation of the plugin. */
			load_plugin_textdomain( 'sd-framework', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
		}
	
		public function sd_tf_admin_functions() {

			if ( is_admin() ) {
				require_once( plugin_dir_path( __FILE__ ) . 'admin/admin-functions.php' );
			}
		}
		
	}
}

	$sd_theme_functions = new SdThemeFunctions();

?>
