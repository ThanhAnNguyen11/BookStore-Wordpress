<?php
//***** Installer *****
global $wp_version;
if (version_compare($wp_version, '3.0', '<')) {
	require_once(ABSPATH . 'wp-admin/upgrade.php');
} else {
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
}
//***Installer variables***
global $wpdb;
$table_name = $wpdb->prefix . "wppr_data";
$wppr_db_version = "1.0";
//***Installer***
if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
$sql = "CREATE TABLE " . $table_name . " (
	  id int(12) NOT NULL auto_increment,
	  slot int(2) NOT NULL,
	  name text NOT NULL,
	  clicks int(7) NOT NULL,
	  start_date varchar(12) NOT NULL,
	  end_date varchar(12) NOT NULL,
	  status int(1) NOT NULL,
	  target text NOT NULL,
	  image_url text NOT NULL,
	  pre_exp_email int(1) NOT NULL,
	  PRIMARY KEY  (id)
	);";
dbDelta($sql);

add_option("wppr_ad_orientation", "2c");
add_option("wppr_num_slots", "6");
add_option("wppr_ad_order", "normal");
add_option("wppr_buyad_url", "");
add_option("wppr_disable_default_style", "");
add_option("wppr_dofollow", "");
add_option("wppr_emailonexp", get_option('admin_email'));
add_option("wppr_daysbeforeexp", "3");
add_option("wppr_defaultad", wppr_get_plugin_dir('url')."/youradhere.jpg");

add_option("wppr_db_version", $wppr_db_version);
}

//***Upgrader***
$installed_ver = get_option( "wppr_db_version" );
if( $installed_ver != $wppr_db_version ) {
dbDelta($sql);
$sql = "CREATE TABLE " . $table_name . " (
	  id int(12) NOT NULL auto_increment,
	  slot int(2) NOT NULL,
	  name text NOT NULL,
	  clicks int(7) NOT NULL,
	  start_date varchar(12) NOT NULL,
	  end_date varchar(12) NOT NULL,
	  status int(1) NOT NULL,
	  target text NOT NULL,
	  image_url text NOT NULL,
	  pre_exp_email int(1) NOT NULL,
	  PRIMARY KEY  (id)
	);";
dbDelta($sql);
add_option("wppr_ad_orientation", "2c");
add_option("wppr_num_slots", "6");
add_option("wppr_ad_order", "normal");
add_option("wppr_buyad_url", "");
add_option("wppr_disable_default_style", "");
add_option("wppr_dofollow", "");
add_option("wppr_emailonexp", get_option('admin_email'));
add_option("wppr_daysbeforeexp", "3");
add_option("wppr_defaultad", wppr_get_plugin_dir('url')."/youradhere.jpg");
update_option( "wppr_db_version", $wppr_db_version );
}
//***** End Installer *****
?>