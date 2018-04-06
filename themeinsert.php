<?php
/**
 * Plugin Name: Theme Insert
 * Plugin URI: 
 * Description: .
 * Version: 1.2
 * Author: Niels	
 * Author URI: 
 */
 

	function footerfields_create() {
	    $page_title = 'Theme-Insert';
	    $menu_title = 'Theme-Insert';
	    $capability = 'edit_posts';
	    $menu_slug = 'themeinsert';
	    $function = 'footerfields_form';
	    $icon_url = '';
	    $position = 94;
	
	    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	}
	add_action('admin_menu', 'footerfields_create'); 

	 function footerfields_init(){
			add_option( 'headerfields', '', '', 'yes' );
			add_option( 'footerfields', '', '', 'yes' ); 
		}
	register_activation_hook(__FILE__,'footerfields_init');	


	function footerfields_destroy(){
		 	delete_option( 'headerfields', '', '', 'yes' );
		 	delete_option( 'footerfields', '', '', 'yes' );
		}
	register_deactivation_hook( __FILE__, 'footerfields_destroy' );

 
	 function footerfields_form(){
		    if (isset($_POST['headerfields'])) {
			   	update_option('headerfields', $_POST['headerfields']); 
			}
		    
		    if (isset($_POST['footerfields'])) {
		        update_option('footerfields', $_POST['footerfields']);
		    } 

		    if ($_POST){
			    footerfields_notice__success();
		    }
		    include 'inc.form.php';
	}


	function footerfields_notice__success() {
	    ?>
	    <div class="notice notice-success is-dismissible">
	        <p><?php _e( 'Wijzigingen zijn opgeslagen!', 'footerfields' ); ?></p>
	    </div>
	    <?php
	}
	
	function footerfields_headtags (){
		if (get_option( 'headerfields' ) != ""){
			echo wp_unslash(get_option( 'headerfields' ));
		}
	}
	add_action('wp_head', 'footerfields_headtags', 10);
	
	function footerfields_footertags (){
		if (get_option( 'footerfields' ) != ""){	
			echo wp_unslash(get_option( 'footerfields' ));
		}
	}
	add_action('wp_footer', 'footerfields_footertags', 10);
	
		
	