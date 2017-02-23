<?php

class WPPR_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'wp PR',
			'WP PR',
			array( 'description' => 'Displays your PR' )
		);
	}

	function widget($args, $instance) {
		extract($args);
		echo $before_widget;
		if (!empty($instance['title'])) {
			echo "\n".$before_title; echo $instance['title']; echo $after_title;
		}
		wppr_write_setting();
		echo $after_widget;
	}
	
	function form($instance) {
		$title = $instance['title'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}

}

?>