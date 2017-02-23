<?php
/**
* Plugin Main Class
*/
class Animated_WooStore
{
    
    function __construct()
    {
        add_action( 'wp_enqueue_scripts', array($this, 'wcp_front_scripts'));
        add_action( 'admin_enqueue_scripts', array($this, 'wcp_admin_scripts'));
        add_action( 'admin_menu', array( $this, 'wcp_admin_menu' ) );
        add_action( 'wp_ajax_wcp_woo_save_settings', array( $this, 'wcp_save_settings' ) );
        add_action( 'wp_head', array( $this, 'wcp_print_styles' ) );
    }


    public function wcp_front_scripts(){
        $saved_settings = get_option( 'wcp_animated_woostore' );
        wp_enqueue_style( 'animated-woostore-styles', plugin_dir_url( __FILE__ ) . 'css/style.css');
        wp_enqueue_style( 'animate-css', plugin_dir_url( __FILE__ ) . 'css/animate.min.css');
        wp_enqueue_script( 'animated-woostore-scripts', plugin_dir_url( __FILE__ ) . 'js/script.js', array('jquery') );
        wp_localize_script( 'animated-woostore-scripts', 'options', array(
            'delay' => $saved_settings['animation_delay'],
            'title' => $saved_settings['hover_title'],
            'price' => $saved_settings['hover_price'],
            'thumb' => $saved_settings['hover_thumb'],
            'sale' => $saved_settings['hover_sale'],
            'cart' => $saved_settings['hover_cart'],
        ));
    }

    public function wcp_admin_menu(){
    	add_submenu_page( 'woocommerce', 'Woo Store Hover Effects', 'Hover Effects', 'manage_options', 'wcp_animated_woostore', array($this, 'wcp_render_menu_page') );
    }

    public function wcp_render_menu_page(){
    	include 'admin_settings.php';
    }

    public function wcp_admin_scripts(){
        wp_enqueue_script( 'animated-woostore-admin', plugin_dir_url( __FILE__ ) . 'js/admin.js', array('jquery') );
    }

    public function wcp_save_settings(){
    	if (isset($_REQUEST)) {
    		update_option( 'wcp_animated_woostore', $_REQUEST );
    	}
    	die(0);
    }

    public function wcp_print_styles(){
    	ob_start() ?>
	    	<style type="text/css">
				<?php include 'front_styles.php'; ?>
	    	</style>
    	<?php
    	echo ob_get_clean();
    }
}
?>