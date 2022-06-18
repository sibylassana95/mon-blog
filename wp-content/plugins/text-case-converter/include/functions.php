<?php

//setting page
add_action('admin_menu','txtcc_setting_page');
function txtcc_setting_page(){
	add_options_page(__( ' Settings Text case converter', 'txtcc' ),__( 'Text case converter', 'txtcc'),'manage_options','txtcc','txtcc_setting_sec_page');
}

function txtcc_setting_sec_page(){
	include(TXTCC_INC.'txtccsetting.php');
}

/* update setting option */
add_action('wp_ajax_txtcc_save_option','txtcc_save_option');
function txtcc_save_option(){
	if(isset($_POST['action']) && !empty($_POST['action']) && sanitize_text_field($_POST['action']) == 'txtcc_save_option' && wp_verify_nonce(sanitize_text_field($_POST['security_nonce']),'ajax_public_nonce')){
		$final_data = array();
		parse_str(sanitize_text_field($_POST['form_data']), $final_data); 
		foreach($final_data as $final_data_key => $final_data_val){
			$save_data['text_option_data'][sanitize_key($final_data_key)] = sanitize_text_field($final_data_val);
		}
		update_option('_txtcc_all_settings',$save_data);
		echo json_encode("Success");
		die;	
	}
}

?>