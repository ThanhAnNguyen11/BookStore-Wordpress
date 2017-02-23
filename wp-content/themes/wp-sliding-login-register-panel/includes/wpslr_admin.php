    <?php
        if($_POST['wpslr_hidden'] == 'Y') {  
            //Form data sent  
            $wpslr_lreg = $_POST['wpslr_lreg'];  
            update_option('wpslr_lreg', $wpslr_lreg);  
			$wpslr_scroll = $_POST['wpslr_scroll'];
			update_option('wpslr_scroll', $wpslr_scroll);
            ?>  
            <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
            <?php  
        } else {  
            //Normal page display  
            $wpslr_lreg = get_option('wpslr_lreg');  
			$wpslr_scroll = get_option('wpslr_scroll');
        }  
    ?>  
    
    <div class="wrap">  
         <?php screen_icon('options-general'); ?><?php    echo "<h2>" . __( 'WP Sliding Login/Register Settings', 'wpslr' ) . "</h2>"; ?>
        <form name="wpslr_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
            <input type="hidden" name="wpslr_hidden" value="Y">  
            <?php    echo "<h4>" . __( 'General Settings', 'wpslr' ) . "</h4>"; ?>  
            <p><?php _e("Scroll Login/Register with page: " ); ?><select name="wpslr_scroll"><option value="0" <?php if ($wpslr_scroll == 0){ echo "Selected"; } ?>>No</option><option value="1" <?php if ($wpslr_scroll == 1){ echo "Selected"; } ?>>Yes</option></select></p>
			<p><?php _e("Link To WP register page: " ); ?><select name="wpslr_lreg"><option value="0" <?php if ($wpslr_lreg == 0){ echo "Selected"; } ?>>No</option><option value="1" <?php if ($wpslr_lreg == 1){ echo "Selected"; } ?>>Yes</option></select></p> 
            <hr>
            <p class="submit">  
            <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpslr' ) ?>" />  
            </p>  
        </form>  
    </div>  