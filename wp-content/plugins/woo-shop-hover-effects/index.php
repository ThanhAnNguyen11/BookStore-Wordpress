<?php
/**
 * Plugin Name: Woo Shop Hover Effects
 * Plugin URI: http://webcodingplace.com/woo-shop-hover-effects-wordpress-plugin
 * Description: Makes your Shop Attractive and Amazing
 * Version: 2.0
 * Author: Rameez
 * Author URI: http://webcodingplace.com/
 * Text Domain: animated-woostore
 */

/*

  Copyright (C) 2015  Rameez  rameez.iqbal@live.com

*/
require_once('plugin.class.php');

if( class_exists('Animated_WooStore')){
	
	$just_initialize = new Animated_WooStore;
}

?>