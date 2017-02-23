<?php

if (function_exists('wp_enqueue_style')) {

	function wppr_queue_admin_page_scripts($hook) {
		if (strpos($hook, 'wppr_addedit') !== false) {
			wp_enqueue_script('jquery');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
		}
	}

	add_action('admin_enqueue_scripts', 'wppr_queue_admin_page_scripts');

}

//Write Manage Menu
function wppr_write_managemenu() {
	echo '<div class="wrap">
	<h2>'.__('Manage Settings', 'wppr').'</h2>';

	//Handle deactivations
	if ($_GET['wppraction'] == "deactivate") {
		$theid = intval($_GET['theid']);
		echo '<div id="message" class="updated fade"><p>'.__('Are you sure you want to deactivate the ad?', 'wppr').' <a href="admin.php?page=PAWP-bao/PRWP.php&wppraction=deactivateconf&theid='.$theid.'">'.__('Yes', 'wppr').'</a> &nbsp; <a href="admin.php?page=PAWP-bao/PRWP.php">'.__('No!', 'wppr').'</a></p></div>';
	}
	if ($_GET['wppraction'] == "deactivateconf") {
		$theid = intval($_GET['theid']);
		global $wpdb, $table_prefix;
		$adtable_name = $wpdb->prefix . "wppr_data";
		$wpdb->update(
			$adtable_name,
			array('status' => '0'),
			array('id' => $theid)
			);
		echo '<div id="message" class="updated fade"><p>'.__('Ad deactivated.', 'wppr').'</p></div>';
	}

	//Handle REactivations
	if ($_GET['wppraction'] == "activate") {
		$theid = intval($_GET['theid']);
		echo '<div id="message" class="updated fade"><p>'.__('Are you sure you want to reactivate the ad?', 'wppr').' <a href="admin.php?page=PAWP-bao/PRWP.php&showmanage=inactive&wppraction=activateconf&theid='.$theid.'">'.__('Yes', 'wppr').'</a> &nbsp; <a href="admin.php?page=PAWP-bao/PRWP.php&showmanage=inactive">'.__('No!', 'wppr').'</a></p></div>';
	}
	if ($_GET['wppraction'] == "activateconf") {
		$theid = intval($_GET['theid']);
		global $wpdb, $table_prefix;
		$adtable_name = $wpdb->prefix . "wppr_data";
		$wpdb->update(
			$adtable_name,
			array('status' => '1', 'pre_exp_email' => '0'),
			array('id' => $theid)
			);
		echo '<div id="message" class="updated fade"><p>'.__('Ad activated.', 'wppr').'</p></div>';
	}

	echo '<ul class="subsubsub">'; ?>
	<li><a href="admin.php?page=PAWP-bao/PRWP.php"  <?php if ($_GET['showmanage'] != 'inactive') { echo 'class="current"'; } ?>><?php _e('Active Ads', 'wppr'); ?></a> | </li><li><a href="admin.php?page=PAWP-bao/PRWP.php&showmanage=inactive" <?php if ($_GET['showmanage'] == 'inactive') { echo 'class="current"'; } ?>><?php _e('Inactive Ads', 'wppr'); ?></a></li>
	<?php echo '</ul>
	<table class="widefat">
	<thead><tr>
	<th scope="col">'.__('Slot', 'wppr').'</th>
	<th scope="col">'.__('Name', 'wppr').'</th>
	<th scope="col" class="num">'.__('Clicks', 'wppr').'</th>
	<th scope="col">'.__('Start Date', 'wppr').'</th>
	<th scope="col">'.__('End Date', 'wppr').'</th>
	<th scope="col"></th>
	<th scope="col" style="text-align:right;"><a href="admin.php?page=wppr_addedit" class="button rbutton">'.__('Add New', 'wppr').'</a></th>
	</tr></thead>
	<tbody>';

	global $wpdb;
	$adtable_name = $wpdb->prefix . "wppr_data";
	if ($_GET['showmanage'] == 'inactive') {
		$wpprdb = $wpdb->get_results("SELECT * FROM $adtable_name WHERE status = '0' ORDER BY id DESC", OBJECT);
	} else {
		$wpprdb = $wpdb->get_results("SELECT * FROM $adtable_name WHERE status != '0' ORDER BY id DESC", OBJECT);
	}
	if ($wpprdb) {
		foreach ($wpprdb as $wpprdb){

			echo '<tr>';
			echo '<td>'.$wpprdb->slot.'</td>';
			echo '<td><strong>'.$wpprdb->name.'</strong></td>';
			if ($wpprdb->clicks!='-1') { echo '<td class="num">'.$wpprdb->clicks.'</td>'; } else { echo '<td class="num">'.__('N/A', 'wppr').'</td>'; }
			echo '<td>'.$wpprdb->start_date.'</td>';
			echo '<td>'.$wpprdb->end_date.'</td>';
			echo '<td><a href="admin.php?page=wppr_addedit&editad='.$wpprdb->id.'">'.__('Edit', 'wppr').'</a></td>';
			if ( isset($_GET['showmanage']) && ($_GET['showmanage'] == "inactive")) {
				echo '<td><a href="admin.php?page=PAWP-bao/PRWP.php&showmanage=inactive&wppraction=activate&theid='.$wpprdb->id.'">'.__('Activate', 'wppr').'</a></td>';
			} else {
				echo '<td><a href="admin.php?page=PAWP-bao/PRWP.php&wppraction=deactivate&theid='.$wpprdb->id.'">'.__('Deactivate', 'wppr').'</a></td>';
			}
			echo '</tr>';

		}
	} else { echo '<tr> <td colspan="8">'.__('No ads found.', 'wppr').'</td> </tr>'; }

	echo '</tbody>
	</table>';
	echo '</div>';
}

//Write Add/Edit Menu
function wppr_write_addeditmenu() {
	//DB Data
	global $wpdb;
	$adtable_name = $wpdb->prefix . "wppr_data";
	// Retrieve settings
	$setting_ad_orientation = get_option("wppr_ad_orientation");
	$setting_num_slots = get_option("wppr_num_slots");
	$setting_ad_order = get_option("wppr_ad_order");
	$setting_buyad_url = get_option("wppr_buyad_url");
	$setting_disable_default_style = get_option("wppr_disable_default_style");
	$setting_emailonexp = get_option("wppr_emailonexp");
	$setting_defaultad = get_option("wppr_defaultad");
	//If post is being edited, grab current info
	if ($_GET['editad']!='') {
		$theid = intval($_GET['editad']);
		$editingad = $wpdb->get_row($wpdb->prepare(
			"SELECT * FROM {$adtable_name} WHERE id = %d",
			$theid
			));
	}
	?><div class="wrap">

	<?php
	if ( $_POST['Submit'] && wp_verify_nonce($_POST['nonce_wppr_addedit'],'wppr_addedit') ) {
		$post_editedad = $wpdb->escape($_POST['editedad']);
		$post_adname = $wpdb->escape($_POST['adname']);
		$post_adslot = $wpdb->escape($_POST['adslot']);
		$post_adtarget = $wpdb->escape($_POST['adtarget']);
		$post_adexp = $wpdb->escape($_POST['adexp']);
		$post_adexpmo = $wpdb->escape($_POST['adexp-mo']);
		$post_adexpday = $wpdb->escape($_POST['adexp-day']);
		$post_adexpyr = $wpdb->escape($_POST['adexp-yr']);
		$post_countclicks = $wpdb->escape($_POST['countclicks']);
		$post_adimage = $wpdb->escape($_POST['adimage']);
		if ($post_countclicks=='on') { $post_countclicks = '0'; } else { $post_countclicks = '-1'; }
		$today = date('m').'/'.date('d').'/'.date('Y');
		if ($post_adexp=='manual') { $theenddate = '00/00/0000'; }
		if ($post_adexp=='other') { $theenddate = $post_adexpmo.'/'.$post_adexpday.'/'.$post_adexpyr; }
		if ($post_adexp=='30') { $expiry = time() + 30 * 24 * 60 * 60; $expiry = strftime('%m/%d/%Y', $expiry); $theenddate = $expiry; }
		if ($post_adexp=='60') { $expiry = time() + 60 * 24 * 60 * 60; $expiry = strftime('%m/%d/%Y', $expiry); $theenddate = $expiry; }
		if ($post_adexp=='90') { $expiry = time() + 90 * 24 * 60 * 60; $expiry = strftime('%m/%d/%Y', $expiry); $theenddate = $expiry; }
		if ($post_adexp=='120') { $expiry = time() + 120 * 24 * 60 * 60; $expiry = strftime('%m/%d/%Y', $expiry); $theenddate = $expiry; }
		if ($post_editedad!='') { $theenddate = $post_adexpmo.'/'.$post_adexpday.'/'.$post_adexpyr; }
		if ($post_editedad=='') {
			$updatedb = "INSERT INTO $adtable_name (slot, name, start_date, end_date, clicks, status, target, image_url, pre_exp_email) VALUES ('$post_adslot', '$post_adname', '$today','$theenddate','$post_countclicks', '1', '$post_adtarget','$post_adimage', '0')";
			$results = $wpdb->query($updatedb);
			echo '<div id="message" class="updated fade"><p>Ad &quot;'.$post_adname.'&quot; created.</p></div>';
		} else {
			$updatedb = "UPDATE $adtable_name SET slot = '$post_adslot', name = '$post_adname', end_date = '$theenddate', target = '$post_adtarget', image_url = '$post_adimage', pre_exp_email = '0' WHERE id='$post_editedad'";
			$results = $wpdb->query($updatedb);
			echo '<div id="message" class="updated fade"><p>'.__('Ad', 'wppr').' &quot;'.$post_adname.'&quot; '.__('updated.', 'wppr').'</p></div>';
		}
	}
	if ($_POST['deletead']) {
		$post_editedad = $wpdb->escape($_POST['editedad']);
		echo '<div id="message" class="updated fade"><p>'.__('Do you really want to delete this ad record? This action cannot be undone.', 'wppr').' <a href="admin.php?page=wppr_addedit&deletead='.$post_editedad.'">'.__('Yes', 'wppr').'</a> &nbsp; <a href="admin.php?page=wppr_addedit&editad='.$post_editedad.'">'.__('No!', 'wppr').'</a></p></div>';
	}
	if ($_GET['deletead']!='') {
		$thead = intval($_GET['deletead']);
		$updatedb = "DELETE FROM $adtable_name WHERE id='$thead'";
		$results = $wpdb->query($updatedb);
		echo '<div id="message" class="updated fade"><p>'.__('Ad deleted.', 'wppr').'</p></div>';
	}
	?>

	<h2><?php _e('Add/Edit Ads', 'wppr'); ?></h2>

	<form method="post" action="admin.php?page=wppr_addedit">
		<?php wp_nonce_field('wppr_addedit', 'nonce_wppr_addedit'); ?>
		<table class="form-table">

			<?php if (isset($_GET['editad']) && $_GET['editad']!='') { echo '<input name="editedad" type="hidden" value="'.intval($_GET['editad']).'" />'; } ?>

			<tr valign="top">
				<th scope="row"><?php _e('Name', 'wppr'); ?></th>
				<td><input name="adname" type="text" id="adname" value="<?php echo $editingad->name; ?>" size="40" /><br/><?php _e('Whose ad is this?', 'wppr'); ?></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Slot', 'wppr'); ?></th>
				<td><label for="adslot">
					<select name="adslot" id="adslot">
						<?php for ($count = 1; $count <= $setting_num_slots; $count += 1) { ?>
						<option value="<?php echo $count; ?>" <?php if ($count == $editingad->slot) { echo 'selected="selected"'; } ?>>#<?php echo $count; ?></option>
						<?php } ?>
					</select></label>
				</td></tr>

				<tr valign="top">
					<th scope="row"><?php _e('Target URL', 'wppr'); ?></th>
					<td><input name="adtarget" type="text" id="adtarget" value="<?php if (isset($editingad->target) && $editingad->target!='') { echo $editingad->target; } else { echo 'http://'; } ?>" size="40" /><br/><?php _e('Where should the ad link to?', 'wppr'); ?></td>
				</tr>

				<?php if (isset($_GET['editad']) && $_GET['editad']!='') {
					$enddate = $editingad->end_date;
					if ($enddate != '00/00/0000') {
						$enddate = strtotime($enddate);
						$endmonth = date('m', $enddate);
						$endday = date('d', $enddate);
						$endyear = date('Y', $enddate);
					} else { $endmonth='00'; $endday='00'; $endyear='0000'; }
				} ?>
				<tr valign="top">
					<th scope="row"><?php _e('Expiration', 'wppr'); ?></th>
					<td><label for="adexp">
						<?php if ($_GET['editad']=='') { ?><select name="adexp" id="adexp" onChange="isOtherDate(this.value)">
						<option value="manual"><?php _e("I'll remove it manually", 'wppr'); ?></option>
						<option selected="selected" value="30">30 <?php _e('Days', 'wppr'); ?></option>
						<option value="60">60 <?php _e('Days', 'wppr'); ?></option>
						<option value="90">90 <?php _e('Days', 'wppr'); ?></option>
						<option value="120">120 <?php _e('Days', 'wppr'); ?></option>
						<option value="other"><?php _e('Other', 'wppr'); ?></option>
					</select><?php } ?></label>
					<span id="adexp-date">&nbsp;&nbsp; <?php _e('Month:', 'wppr'); ?> <input type="text" name="adexp-mo" id="adexp-mo" size="2" value="<?php if ($endmonth!='') { echo $endmonth; } else { echo date('m'); } ?>" /> <?php _e('Day:', 'wppr'); ?> <input type="text" name="adexp-day" id="adexp-day" size="2" value="<?php if ($endday!='') { echo $endday; } else {  echo date('d'); } ?>" /> <?php _e('Year:', 'wppr'); ?> <input type="text" name="adexp-yr" id="adexp-yr" size="4" value="<?php if ($endyear!='') { echo $endyear; } else {  echo date('Y'); } ?>" /> <?php if ($_GET['editad']!='') { ?><br /> &nbsp;&nbsp; <?php _e('Use 00/00/0000 for manual removal.', 'wppr'); ?><?php } ?></span>
				</td></tr>

				<?php if ($_GET['editad']=='') { ?><script type="text/javascript">
				document.getElementById("adexp-date").style.display = "none";
				function isOtherDate(obj) {
					if (obj=="other") {
						document.getElementById("adexp-date").style.display = "inline";
					} else {
						document.getElementById("adexp-date").style.display = "none";
					}
				}
			</script><?php } ?>

			<?php if ($_GET['editad']=='') { ?>
			<tr valign="top">
				<th scope="row"><?php _e('Click Tracking', 'wppr'); ?></th>
				<td><input type="checkbox" name="countclicks" checked="checked" /> <?php _e('Count the number of times this ad is clicked', 'wppr'); ?></td>
			</tr>
			<?php } ?>

			<tr valign="top">
				<th scope="row"><?php _e('Ad Image', 'wppr'); ?></th>
				<td><input name="adimage" type="text" id="adimage" value="<?php if ($editingad->image_url!='') { echo $editingad->image_url; } else { echo 'http://'; } ?>" size="40" /> <input id="upload_image_button" type="button" class="button" value="Upload Image" /></td>
			</tr>

			<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#upload_image_button').click(function() {
					formfield = jQuery('#adimage').attr('name');
					tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
					return false;
				});

				window.send_to_editor = function(html) {
					imgurl = jQuery('img',html).attr('src');
					jQuery('#adimage').val(imgurl);
					tb_remove();
				}
			});
			</script>

		</table>
		<p class="submit"><input type="submit" name="Submit" class="button" value="<?php _e('Save Ad', 'wppr'); ?>" /> &nbsp; <?php if ($_GET['editad']!='') { ?><input type="submit" name="deletead" value="<?php _e('Delete Ad', 'wppr'); ?>" /><?php } ?></p>
	</form>
	</div><?php
}

//Write Settings Menu
function wppr_write_settingsmenu() {
	//DB Data
	global $wpdb;
	//Add settings, if submitted
	if ($_POST['issubmitted']=='yes') {
		$post_adorient = $wpdb->escape($_POST['adorient']);
		$post_numslots = $wpdb->escape($_POST['numads']);
		$post_adorder = $wpdb->escape($_POST['adorder']);
		$post_salespage = $wpdb->escape($_POST['salespage']);
		$post_widgettitle = $wpdb->escape($_POST['widgettitle']);
		$post_defaultstyle = $wpdb->escape($_POST['defaultstyle']);
		$post_emailonexp = $wpdb->escape($_POST['emailonexp']);
		$post_daysbeforeexp = $wpdb->escape($_POST['daysbeforeexp']);
		$post_defaultad = $wpdb->escape($_POST['defaultad']);
		if ($post_defaultstyle!='on') { $post_defaultstyle = 'yes'; } else { $post_defaultstyle = ''; }
		update_option("wppr_ad_orientation", $post_adorient);
		update_option("wppr_num_slots", $post_numslots);
		update_option("wppr_ad_order", $post_adorder);
		update_option("wppr_buyad_url", $post_salespage);
		update_option("wppr_disable_default_style", $post_defaultstyle);
		update_option("wppr_emailonexp", $post_emailonexp);
		update_option("wppr_daysbeforeexp", $post_daysbeforeexp);
		update_option("wppr_defaultad", $post_defaultad);
		echo '<div id="message" class="updated fade"><p>Settings updated.</p></div>';
	}
	//Retrieve settings
	$setting_ad_orientation = get_option("wppr_ad_orientation");
	$setting_num_slots = get_option("wppr_num_slots");
	$setting_ad_order = get_option("wppr_ad_order");
	$setting_buyad_url = get_option("wppr_buyad_url");
	$setting_disable_default_style = get_option("wppr_disable_default_style");
	$setting_emailonexp = get_option("wppr_emailonexp");
	$setting_defaultad = get_option("wppr_defaultad");
	$setting_daysbeforeexp = get_option("wppr_daysbeforeexp");
	?>
	<div class="wrap">
	<h2><?php _e('Settings', 'wppr'); ?></h2>
	<form method="post" action="admin.php?page=wppr_settings">
		<table class="form-table">


			<tr valign="top">
				<th scope="row"><?php _e('Number of Ad Slots', 'wppr'); ?></th>
				<td><input name="numads" type="text" id="numads" value="<?php echo $setting_num_slots; ?>" size="2" /><br/><?php _e('How many ads should be shown?', 'wppr'); ?></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Ad Order', 'wppr'); ?></th>
				<td><label for="adorder">
					<select name="adorder" id="adorder">
						<option selected="selected" value="normal" <?php if ($setting_ad_order=='normal') { echo 'selected="selected"'; } ?>><?php _e('Normal', 'wppr'); ?></option>
						<option value="random" <?php if ($setting_ad_order=='random') { echo 'selected="selected"'; } ?>><?php _e('Random', 'wppr'); ?></option>
					</select></label>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Widget Title', 'wppr'); ?></th>
				<td><input name="widgettitle" type="text" id="widgettitle" value="<?php echo $setting_widget_title; ?>" size="50" /><br/><?php _e('The title to be displayed in the widget.', 'wppr'); ?> <em><?php _e('(Leave blank to disable.)', 'wppr'); ?></em></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Ad Sales Page', 'wppr'); ?></th>
				<td><input name="salespage" type="text" id="salespage" value="<?php echo $setting_buyad_url; ?>" size="50" /><br/><?php _e('Do you have a page with statistics and prices?', 'wppr'); ?> <em><?php _e('(Default Ads will link here.)', 'wppr'); ?></em></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Default Style', 'wppr'); ?></th>
				<td><input type="checkbox" name="defaultstyle" <?php if ($setting_disable_default_style=='') { echo 'checked="checked"'; } ?> /> <?php _e('Include default ad stylesheet?', 'wppr'); ?> <br/><?php _e('Leave checked unless you want to use your own CSS to style the ads. Refer to the documentation for further help.', 'wppr'); ?></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Expiration Email', 'wppr'); ?></th>
				<td><input name="emailonexp" type="text" id="emailonexp" value="<?php echo $setting_emailonexp; ?>" size="50" /><br/><?php _e('Enter your email address if you would like to be emailed when an ad expires.', 'wppr'); ?> <em><?php _e('(Leave blank to disable.)', 'wppr'); ?></em></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Pre-Expiration Email', 'wppr'); ?></th>
				<td><?php _e('Remind me', 'wppr'); ?> <input name="daysbeforeexp" type="text" id="daysbeforeexp" value="<?php echo $setting_daysbeforeexp; ?>" size="2" /> <?php _e('days before an ad expires.', 'wppr'); ?> <em><?php _e('(Emails will be sent to the address specified above.)', 'wppr'); ?></em></td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e('Default Ad', 'wppr'); ?></th>
				<td><input name="defaultad" type="text" id="defaultad" value="<?php echo $setting_defaultad; ?>" size="50" /><br/><?php _e('Which image should be shown as a placeholder when an ad slot is empty?', 'wppr'); ?> (<a href="<?php echo wppr_get_plugin_dir('url').'/youradhere.jpg'; ?>"><?php _e('Default', 'wppr'); ?></a>)</td>
			</tr>

		</table>
	<input name="issubmitted" type="hidden" value="yes" />
	<p class="submit"><input type="submit" class="button" name="Submit" value="<?php _e('Save Changes', 'wppr'); ?>" /></p>
	</form>
	<br/>
	<p><?php _e("Your ads can be displayed using either the included widget, or by using the <strong>&lt;?php wppr_write_ads();  ?&gt;</strong> template tag. Also, you can display a single ad, without any formatting, using <strong>&lt;?php wppr_single_ad(<em>num</em>);  ?&gt;</strong>, where <em>num</em> is the number of the ad slot you wish to show. This is useful for cases where your theme prevents the default formatting from working properly, or where you wish to display your ads in an unforeseen manner.", 'wppr'); ?></p>

	</div><?php
}



//Add Dashboard Widget
function wppr_dashboard_widget() {
	echo '<table class="widefat">
	<thead><tr>
	<th scope="col">'.__('Slot', 'wppr').'</th>
	<th scope="col">'.__('Name', 'wppr').'</th>
	<th scope="col" class="num">'.__('Clicks', 'wppr').'</th>
	<th scope="col">'.__('Start Date', 'wppr').'</th>
	<th scope="col">'.__('End Date', 'wppr').'</th>
	</tr></thead>
	<tbody>';
	global $wpdb;
	$adtable_name = $wpdb->prefix . "wppr_data";
	$wpprdb = $wpdb->get_results("SELECT * FROM $adtable_name WHERE status != '0' ORDER BY id DESC", OBJECT);
	if ($wpprdb) {
	foreach ($wpprdb as $wpprdb){
	?>
	<tr><td><?php echo $wpprdb->slot; ?></td><td><strong><?php echo $wpprdb->name; ?></strong></td><td class="num"><?php echo $wpprdb->clicks; ?></td><td><?php echo $wpprdb->start_date; ?></td><td><?php echo $wpprdb->end_date; ?></td></tr>
	<?php
	}
	} else { echo '<tr> <td colspan="8">'.__('No ads found.', 'wppr').'</td> </tr>'; }
	echo '</tbody>
	</table>
	<br />';
	echo '<a href="admin.php?page=wp125_addedit" class="button rbutton">'.__('Add New', 'wp125').'</a> &nbsp; <a href="admin.php?page=PAWP-bao/PRWP.php" class="button rbutton">'.__('Manage', 'wp125').'</a> &nbsp; <a href="admin.php?page=wp125_settings" class="button rbutton">'.__('Settings', 'wp125').'</a>';
}
function wppr_dashboard_add_widget() {
	if (current_user_can(MANAGEMENT_PERMISSION)) {
		if (function_exists('wp_add_dashboard_widget')) {
			wp_add_dashboard_widget('wppr_widget', __('125x125 Ads', 'wppr'), 'wppr_dashboard_widget');
		}
	}
}
add_action('wp_dashboard_setup', 'wppr_dashboard_add_widget' );

?>