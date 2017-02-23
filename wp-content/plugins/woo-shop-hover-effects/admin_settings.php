<div class="wrap">
	<h2>Animated WooStore Settings</h2>
	<?php
		$saved_settings = get_option( 'wcp_animated_woostore' );
		$styles = array('none', 'bounce','flash','pulse','rubberBand','shake','swing','tada','wobble','jello','bounceIn','bounceInDown','bounceInLeft','bounceInRight','bounceInUp','fadeIn','fadeInDown','fadeInDownBig','fadeInLeft','fadeInLeftBig','fadeInRight','fadeInRightBig','fadeInUp','fadeInUpBig','flipInX','flipInY','lightSpeedIn','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','rollIn','zoomIn','zoomInDown','zoomInLeft','zoomInRight','zoomInUp','slideInDown','slideInLeft','slideInRight','slideInUp');
	 ?>
	<form id="wcp-animatedwoo">
		<table class="fixed">
			<tr style="vertical-align: top;">
				<td>
					<h3>Store on Load Animations</h3>
					<table class="wp-list-table widefat fixed">
						<tr>
							<th>Animation Style</th>
							<td>
								<select name="animation_style" class="widefat">
									<option value="None" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'None');} ?>>None</option>
									<option value="fadeIn" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'fadeIn');} ?>>FadeIn</option>
									<option value="starwars" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'starwars');} ?>>StarWars</option>
									<option value="zoomIn" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'zoomIn');} ?>>zoomIn</option>
									<option value="zoomOut" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'zoomOut');} ?>>zoomOut</option>
									<option value="slideLeft" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'slideLeft');} ?>>slideLeft</option>
									<option value="slideRight" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'slideRight');} ?>>slideRight</option>
									<option value="slideTop" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'slideTop');} ?>>slideTop</option>
									<option value="slideBottom" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'slideBottom');} ?>>slideBottom</option>
									<option value="flip" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'flip');} ?>>flip</option>
									<option value="flipInX" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'flipInX');} ?>>flipInX</option>
									<option value="flipInY" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'flipInY');} ?>>flipInY</option>
									<option value="bounceIn" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'bounceIn');} ?>>bounceIn</option>
									<option value="bounceInUp" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'bounceInUp');} ?>>bounceInUp</option>
									<option value="bounceInRight" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'bounceInRight');} ?>>bounceInRight</option>
									<option value="bounceInDown" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'bounceInDown');} ?>>bounceInDown</option>
									<option value="bounceInLeft" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'bounceInLeft');} ?>>bounceInLeft</option>
									<option value="pageTop" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageTop');} ?>>pageTop</option>
									<option value="pageTopBack" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageTopBack');} ?>>pageTopBack</option>
									<option value="pageRight" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageRight');} ?>>pageRight</option>
									<option value="pageRightBack" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageRightBack');} ?>>pageRightBack</option>
									<option value="pageBottom" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageBottom');} ?>>pageBottom</option>
									<option value="pageBottomBack" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageBottomBack');} ?>>pageBottomBack</option>
									<option value="pageLeft" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageLeft');} ?>>pageLeft</option>
									<option value="pageLeftBack" <?php if(isset($saved_settings['animation_style'])) { selected( $saved_settings['animation_style'], 'pageLeftBack');} ?>>pageLeftBack</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>Animation Duration (ms)</th>
							<td><input type="number" name="animation_duration" value="<?php echo (isset($saved_settings['animation_duration'])) ? $saved_settings['animation_duration'] : '600' ; ?>" class="widefat"></td>
						</tr>
						<tr>
							<th>Animation Delay (ms)</th>
							<td><input type="number" class="widefat" name="animation_delay" value="<?php echo (isset($saved_settings['animation_delay'])) ? $saved_settings['animation_delay'] : '300' ; ?>"></td>
						</tr>
					</table>
				</td>
				<td>
					<h3>Shop Items Hover Effects</h3>
					<table class="wp-list-table widefat fixed">
						<tr>
							<th>Title</th>
							<td>
								<select name="hover_title" class="widefat">
									<?php foreach ($styles as $style) { ?>
										<option value="<?php echo $style; ?>" <?php if(isset($saved_settings['hover_title'])) { selected( $saved_settings['hover_title'], $style ); }?>><?php echo $style; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Price</th>
							<td>
								<select name="hover_price" class="widefat">
									<?php foreach ($styles as $style) { ?>
										<option value="<?php echo $style; ?>" <?php if(isset($saved_settings['hover_price'])) { selected( $saved_settings['hover_price'], $style ); }?>><?php echo $style; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Thumbnail</th>
							<td>
								<select name="hover_thumb" class="widefat">
									<?php foreach ($styles as $style) { ?>
										<option value="<?php echo $style; ?>" <?php if(isset($saved_settings['hover_thumb'])) { selected( $saved_settings['hover_thumb'], $style ); }?>><?php echo $style; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Sale Badge</th>
							<td>
								<select name="hover_sale" class="widefat">
									<?php foreach ($styles as $style) { ?>
										<option value="<?php echo $style; ?>" <?php if(isset($saved_settings['hover_sale'])) { selected( $saved_settings['hover_sale'], $style ); }?>><?php echo $style; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>Add to Cart Button</th>
							<td>
								<select name="hover_cart" class="widefat">
									<?php foreach ($styles as $style) { ?>
										<option value="<?php echo $style; ?>" <?php if(isset($saved_settings['hover_cart'])) { selected( $saved_settings['hover_cart'], $style ); }?>><?php echo $style; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<p>
			<input type="submit" class="button-primary" value="Save Settings" />
			<span id="wcp-loader"><img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/loader.gif"></span>
			<span id="wcp-saved"><strong>Changes Saved!</strong></span>
		</p>
	</form>
</div>