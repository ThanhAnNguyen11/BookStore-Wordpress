<?php
/**
 * Plugin Name: WP Quang Cao Plugin
 * Description: 
 * Version: 1.0
 * Author: Bao-NH 
 */
 
define("MANAGEMENT_PERMISSION", "edit_themes");

 //Includes
include "widget_class.php";

//Ad Click Redirect
add_action('init', 'wppr_adclick');
function wppr_adclick() {
	if (isset($_GET['adclick']) && $_GET['adclick'] != "" && ctype_digit($_GET['adclick'])) {
	$theid = $_GET['adclick'];
	global $wpdb;
	$adtable_name = $wpdb->prefix . "wppr_data";
	$thead = $wpdb->get_row($wpdb->prepare(
 		"SELECT target FROM {$adtable_name} WHERE id = %d",
 		$theid
	));
	$theid = $wpdb->escape($theid);
	$update = "UPDATE ". $adtable_name ." SET clicks=clicks+1 WHERE id='$theid'";
	$results = $wpdb->query( $update );
	header("Location: $thead->target");
	exit;
	}
}

//Stylesheet
function wppr_stylesheet() {
	if (get_option("wp_disable_default_style")=='') {
		wp_register_style('wpprstyle', wppr_get_plugin_dir('url').'/wppr.css');
		wp_enqueue_style('wpprstyle');
	}
}
add_action('wp_enqueue_scripts', 'wppr_stylesheet');

//Create Widget
function wppr_create_ad_widget() {
	register_widget('WPPR_Widget');
}

//Installer
function wppr_install () {
	require_once(dirname(__FILE__).'/installer.php');
}
register_activation_hook(__FILE__,'wppr_install');

//Write the PR
function wppr_write_setting($exclude="0") {
	global $wpdb;
	$altclass = ' odd';
	if ($exclude != "0") { $exclude = implode(",", $exclude); }
	$setting_ad_orientation = get_option("wppr_ad_orientation");
	$setting_num_slots = get_option("wppr_num_slots");
	$setting_ad_order = get_option("wppr_ad_order");
	$setting_buyad_url = get_option("wppr_buyad_url");
	$setting_defaultad = get_option("wppr_defaultad");
	$adtable_name = $wpdb->prefix . "wppr_data";
	if (!defined('ADLINK_EXTRA')) { define("ADLINK_EXTRA", ""); }
	if ($setting_ad_order == 'random') { $theorder = 'RAND() LIMIT '.$setting_num_slots; } else { $theorder = 'slot ASC'; }
	$exclude_sql = "AND slot NOT IN ($exclude)";
	$theads = $wpdb->get_results("SELECT * FROM $adtable_name WHERE status = '1' $exclude_sql ORDER BY $theorder", ARRAY_A);
	echo '<div id="wppr_ad_wrap_1c">'."\n";
	$arraycount = 0;
	if (!empty($theads)) {
		foreach ($theads as $thead){
			$theslot = $thead['slot'];
			$adguidearray[$theslot] = $thead;
			$arraycount++;
		}
		if ($setting_ad_order == 'random') {
			srand((float)microtime() * 1000000);
			shuffle($adguidearray);
			$adguidearray_shufflefix = $adguidearray[0]; $adguidearray[0]=''; $adguidearray[]=$adguidearray_shufflefix;
		}
	}
	for ($curslot=1; $curslot <= $setting_num_slots; $curslot++) {
		$altclass = ( ' odd' != $altclass ) ? ' odd' : ' even';
		if (isset($adguidearray[$curslot])) {
			if ($adguidearray[$curslot]['clicks'] != -1) { $linkurl = get_option('blogurl').'index.php?adclick='.$adguidearray[$curslot]['id']; } else { $linkurl = $adguidearray[$curslot]['target']; }
			echo '<div class="wppr_ad'.$altclass.'"><a href="'.$linkurl.'" title="'.$adguidearray[$curslot]['name'].'" rel="nofollow"'.ADLINK_EXTRA.'><img src="'.$adguidearray[$curslot]['image_url'].'" alt="'.$adguidearray[$curslot]['name'].'" /></a></div>'."\n";
		} else {
			echo '<div class="wppr_ad'.$altclass.'"><a href="'.$setting_buyad_url.'" rel="nofollow"'.ADLINK_EXTRA.'><img src="'.$setting_defaultad.'" alt="" /></a></div>'."\n"; 
		}
	}
	echo "</div>\n";
}

//Add the Admin Menus
if (is_admin()) {
	function wppr_add_admin_menu() {
		//load_plugin_textdomain('wppr', PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/translations', dirname(plugin_basename(__FILE__)).'/translations');
		add_menu_page(__("125x125 Ads", 'wppr'), __("PR", 'wppr'), MANAGEMENT_PERMISSION, __FILE__, "wppr_write_managemenu");
		add_submenu_page(__FILE__, __("Manage 125x125", 'wppr'), __("Manage", 'wppr'), MANAGEMENT_PERMISSION, __FILE__, "wppr_write_managemenu");
		add_submenu_page(__FILE__, __("Add/Edit 125x125", 'wppr'), __("Add/Edit", 'wppr'), MANAGEMENT_PERMISSION, 'wppr_addedit', "wppr_write_addeditmenu");
		add_submenu_page(__FILE__, __("125x125 Ad Settings", 'wppr'), __("Settings", 'wppr'), MANAGEMENT_PERMISSION, 'wppr_settings', "wppr_write_settingsmenu");
	}
	//Include menus
	require_once(dirname(__FILE__).'/adminmenus.php');
}

//Return path to plugin directory (url/path)
function wppr_get_plugin_dir($type) {
	if ( !defined('WP_CONTENT_URL') )
		define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
	if ( !defined('WP_CONTENT_DIR') )
		define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	if ($type=='path') { return WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__)); }
	else { return WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)); }
}

//Hooks
add_action("widgets_init", "wppr_create_ad_widget"); //Create the Widget
if (is_admin()) { add_action('admin_menu', 'wppr_add_admin_menu'); } //Admin pages
?>