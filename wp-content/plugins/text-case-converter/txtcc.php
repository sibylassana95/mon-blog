<?php
/**
 * Plugin Name:		  Text Case Converter
 * Plugin url:		  https://www.hirewebxperts.com
 * Description:		  Classic Editor Custom buttons. Use Settings page to show / hide specific tools that you need.
 * Version: 		  1.4.3
 * Author: 			  Coder426
 * Author URI:		  https://www.hirewebxperts.com
 * Donate link: 	  https://hirewebxperts.com/donate/
 * Text Domain:       txtcc
 * Domain Path:		  /languages
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * License: GPL2
*/
if ( ! defined( 'ABSPATH' ) ) { exit;}

// Define plugin url path
define('TXTCC_VERSON','1.4.4');
define('TXTCC_NAME',"txtcc");
define('TXTCC_PLUGIN_URL',plugin_dir_url( __FILE__ ));
define('TXTCC_PLUGIN_DIR',dirname( __FILE__ ));
define('TXTCC_JS',TXTCC_PLUGIN_URL. 'assets/js/');
define('TXTCC_CSS',TXTCC_PLUGIN_URL. 'assets/css/');
define('TXTCC_LIBS',TXTCC_PLUGIN_URL. 'assets/');
define('TXTCC_IMG',TXTCC_PLUGIN_URL. 'assets/js/icons/');
define('TXTCC_IMAGE',TXTCC_PLUGIN_URL. 'assets/images/');
define('TXTCC_INC',TXTCC_PLUGIN_DIR. '/include/');

add_action('admin_init','txtcc_activate_plugin');
function txtcc_activate_plugin(){
	$ftchval = get_option('_txtcc_all_settings');
	if(!$ftchval){
		$add_setting_option['text_option_data'] = array(
			"all"=>1,"lowercase"=>1,"uppercase"=>1,"capitalize"=>1,"sentence"=>1,"address"=>1,"subscript"=>1,"abbreviation"=>1,"synonyms"=>1,"audio"=>1,"video"=>1,"tooltip"=>1,"clean"=>1,"superscript"=>1,"calculator"=>1,"highlighttext"=>1,"dummytext"=>1,"alternatecase"=>1,"downloadtext"=>1,"shortquotation"=>1,"copytoclipboard"=>1,"addbreakincontent"=>1,"code"=>1,"underline"=>1,"telephone"=>1,"email"=>1,"headings"=>1,'hide_chk_count'=>27,'confirmbox'=>1);
		add_option('_txtcc_all_settings',$add_setting_option);
	}
}

// Add languages files
add_action('init','txtcc_language_translate');
function txtcc_language_translate(){
	load_plugin_textdomain( 'txtcc', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
}

//include script and style
include(TXTCC_INC.'txtcc_inscript.php');

//include script and style
include(TXTCC_INC.'functions.php');

//Setting link to pluign
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'txtcc_add_plugin_page_settings_link');
function txtcc_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .admin_url( 'options-general.php?page=txtcc' ) .'">' . __('Settings', 'txtcc') . '</a>';
	return $links;
}

// hooks your functions into the correct filters
add_action('init', 'txtcc_add_mce');
function txtcc_add_mce() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {return;}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'txtcc_add_tinymce_plugin' );
		add_filter( 'mce_buttons_3', 'txtcc_register_mce_button' );
	}
}

// register new button in the editor
function txtcc_register_mce_button( $buttons ) {
	$ftchval = get_option('_txtcc_all_settings');
	if(isset($ftchval['text_option_data']) && !empty($ftchval['text_option_data'])){
		$txt_all =  $ftchval['text_option_data'];
		extract($txt_all);
		
		if(isset($all) && !empty($all) && esc_html($all) == 1) {array_push( $buttons, 'all');}
		if(isset($uppercase) && !empty($uppercase) && esc_html($uppercase) == 1) {array_push( $buttons, 'withcaps');}
		if(isset($lowercase) && !empty($lowercase) && esc_html($lowercase) == 1){array_push( $buttons, 'withoutcaps' );}
		if(isset($capitalize) && !empty($capitalize) && esc_html($capitalize) == 1){array_push( $buttons, 'firstcaps' );}
		if(isset($sentence) && !empty($sentence) && esc_html($sentence) == 1){array_push( $buttons, 'frstwcaps' );}
		if(isset($alternatecase) && !empty($alternatecase) && esc_html($alternatecase) == 1){array_push( $buttons,'alt' );}
		if(isset($address) && !empty($address) && esc_html($address) == 1){array_push( $buttons, 'address' );}
		if(isset($shortquotation) && !empty($shortquotation) && esc_html($shortquotation) == 1){array_push( $buttons, 'short_quotation' );}
		if(isset($abbreviation) && !empty($abbreviation) && esc_html($abbreviation) == 1){array_push( $buttons, 'abbr' );}
		if(isset($highlighttext) && !empty($highlighttext) && esc_html($highlighttext) == 1){array_push( $buttons, 'highlight' );}
		if(isset($dummytext) && !empty($dummytext) && esc_html($dummytext) == 1){array_push( $buttons, 'insert_text' );}
		if(isset($superscript) && !empty($superscript) && esc_html($superscript) == 1){array_push( $buttons, 'sup' );}
		if(isset($subscript) && !empty($subscript) && esc_html($subscript) == 1){array_push( $buttons, 'sub' );}		
		if(isset($downloadtext) && !empty($downloadtext) && esc_html($downloadtext) == 1){array_push( $buttons, 'download' );}
		if(isset($copytoclipboard) && !empty($copytoclipboard) && esc_html($copytoclipboard) == 1){array_push( $buttons, 'ctoc' );}
		if(isset($synonyms) && !empty($synonyms) && esc_html($synonyms) == 1){array_push( $buttons, 'drop_down' );}
		if(isset($audio) && !empty($audio) && esc_html($audio) == 1){array_push( $buttons, 'audio' );}
		if(isset($video) && !empty($video) && esc_html($video) == 1){array_push( $buttons, 'video' );}
		if(isset($tooltip) && !empty($tooltip) && esc_html($tooltip) == 1){array_push( $buttons, 'tooltip' );}
		if(isset($addbreakincontent) && !empty($addbreakincontent) && esc_html($addbreakincontent) == 1){array_push( $buttons, 'brk_line' );}
		if(isset($calculator) && !empty($calculator) && esc_html($calculator) == 1){array_push( $buttons, 'calculator' );}
		if(isset($code) && !empty($code) && esc_html($code) == 1){array_push( $buttons, 'code' );}
		if(isset($underline) && !empty($underline) && esc_html($underline) == 1){array_push( $buttons, 'underline' );}
		if(isset($telephone) && !empty($telephone) && esc_html($telephone) == 1){array_push( $buttons, 'telephone' );}
		if(isset($email) && !empty($email) && esc_html($email) == 1){array_push( $buttons, 'email' );}
		if(isset($headings) && !empty($headings) && esc_html($headings) == 1) {
		{array_push( $buttons, 'heading1' );}
		{array_push( $buttons, 'heading2' );}
		{array_push( $buttons, 'heading3' );}
		{array_push( $buttons, 'heading4' );}
		{array_push( $buttons, 'heading5' );}
		{array_push( $buttons, 'heading6' );}
		}
		if(isset($clean) && !empty($clean) && esc_html($clean) == 1){array_push( $buttons, 'clean' );}
	}
	return $buttons;
}// declare a script for the new button
// the script will insert the shortcode on the click event
function txtcc_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['Editorchangecase'] = TXTCC_JS .'txtcc-mce.js';
	return $plugin_array;
}
?>