<?php
if (!is_admin()) {
	add_action('wp_enqueue_scripts','load_tooltips'); //loads on wordpress init
	function load_tooltips() {
		wp_enqueue_style( TXTCC_NAME.'-tooltip', TXTCC_LIBS . 'libs/zebra/zebra_tooltips.min.css',array(),TXTCC_VERSON); 
		wp_enqueue_script( TXTCC_NAME.'-tooltip_js', TXTCC_LIBS . 'libs/zebra/zebra_tooltips.min.js', array( 'jquery' ), TXTCC_VERSON,true);
		wp_enqueue_script( TXTCC_NAME.'-front_js', TXTCC_JS . 'txtfront.js', array( 'jquery' ), TXTCC_VERSON,true);
	}
} 

// Include file in admin panel
if (is_admin()) {
	if(!function_exists('txtcc_admin_scripts')){
		function txtcc_admin_scripts() {
			$ftchval = get_option('_txtcc_all_settings');
			if(isset($ftchval['text_option_data']) && !empty($ftchval['text_option_data'])){
				$txt_all =  $ftchval['text_option_data'];
				extract($txt_all);	
			}
			 if(isset($confirmbox) && !empty($confirmbox) && $confirmbox == 1){$confirmbox = "on";}else{$confirmbox = "off";}
			if(isset($_GET['page']) && !empty($_GET['page']) && sanitize_text_field($_GET['page']) == 'txtcc'){
				wp_enqueue_style( TXTCC_NAME.'-btsp',TXTCC_LIBS . 'libs/bootstrap-5.2.0/css/bootstrap.min.css',array(),TXTCC_VERSON);
				wp_enqueue_style( TXTCC_NAME.'-tooltip', TXTCC_LIBS . 'libs/zebra/zebra_tooltips.min.css',array(),TXTCC_VERSON); 
			

				wp_enqueue_script( TXTCC_NAME.'-bootstrap_js',TXTCC_LIBS . 'libs/bootstrap-5.2.0/js/bootstrap.min.js', array( 'jquery' ), TXTCC_VERSON,true );
				wp_enqueue_script( TXTCC_NAME.'-tooltip_js', TXTCC_LIBS . 'libs/zebra/zebra_tooltips.min.js', array( 'jquery' ), TXTCC_VERSON,true);
				wp_enqueue_script( TXTCC_NAME.'-front_js', TXTCC_JS . 'txtfront.js', array( 'jquery' ), TXTCC_VERSON,true);
				
				wp_enqueue_style( TXTCC_NAME.'-chnge-edit-admin', TXTCC_CSS . 'chnge-edit-admin.css',array(),TXTCC_VERSON);
			}
			wp_enqueue_style( TXTCC_NAME.'-sweetalert', TXTCC_LIBS . 'libs/sweetalert/sweetalert2.min.css',array(),TXTCC_VERSON); 
			wp_enqueue_script( TXTCC_NAME.'-sweealert_js',TXTCC_LIBS . 'libs/sweetalert/sweetalert2.all.min.js', array( 'jquery' ), TXTCC_VERSON,true);
			wp_enqueue_style( TXTCC_NAME.'-editor', TXTCC_CSS . 'txt-editor.css',array(),TXTCC_VERSON);
			wp_enqueue_script( TXTCC_NAME.'-mce_js', TXTCC_JS . 'txtcc-mce.js', array( 'jquery' ), TXTCC_VERSON,true);
			wp_enqueue_script( 'wp-tinymce' );
			$admin_url = strtok( admin_url( 'admin-ajax.php', ( is_ssl() ? 'https' : 'http' ) ), '?' );
			wp_localize_script( TXTCC_NAME.'-mce_js', 'txtcc_vars', array(
				'ajaxurl' => $admin_url,
				'pluginurl' => TXTCC_PLUGIN_URL,
				'confirmbox' => $confirmbox,
				'no_export_data' => __('There are no exporting data in your selection fields','txtcc'),
				'ajax_public_nonce' => wp_create_nonce( 'ajax_public_nonce' ),
				'ajaxUrl'              => admin_url('admin-ajax.php'),				
				'uppercase' 		   => __( 'Uppercase', 'txtcc' ),
				'lowercase' 		   => __( 'lowercase', 'txtcc' ),
				'capitalize' 	       => __( 'Capitalize', 'txtcc' ),
				'sentence' 		       => __( 'Sentence', 'txtcc' ),
				'invert_case' 		   => __( 'Invert Case', 'txtcc' ),
				'alternate_case' 	   => __( 'Alternate Case', 'txtcc' ),
				'insert_dummy_text'    => __( 'Insert dummy text', 'txtcc' ),
				'subscript' 		   => __( 'Subscript', 'txtcc' ),
				'superscript' 		   => __( 'Superscript', 'txtcc' ),
				'download_text' 	   => __( 'Download Text', 'txtcc' ),
				'clean' 		       => __( 'Clean', 'txtcc' ),
				'copy_clipboard' 	   => __( 'Copy To clipboard', 'txtcc' ),
				'break_line' 		   => __( 'Add break in content', 'txtcc' ),
				'calculator' 		   => __( 'Calculator', 'txtcc' ),
				'address' 		       => __( 'Address', 'txtcc' ),
				'short_quotation' 	   => __( 'Short Quotation', 'txtcc' ),
				'abbr' 		           => __( 'Abbreviation', 'txtcc' ),
				'highlight' 		   => __( 'Highlight text', 'txtcc' ),
				'abbr_title' 		   => __( 'Enter the title attribute', 'txtcc' ),
				'abbr_title_lbl' 	   => __( 'Title', 'txtcc' ),
				'drop_down'            => __( 'Synonyms','txtcc'),
				'drop_down_title_lbl'  => __( 'Add synonyms','txtcc'),
				'audio'                => __( 'Audio', 'txtcc'),
				'audio_title'          => __( 'Add audio', 'txtcc'),
				'audio_src'            => __( 'Audio src', 'txtcc'),
				'tooltip'              => __( 'Tool Tip', 'txtcc'),
				'tooltip_title_lbl'    => __( 'Tool Tip Text', 'txtcc'),
				'video'                => __( 'video', 'txtcc'),
				'video_title'          => __( 'Add video', 'txtcc'),
				'video_src'            => __( 'video src', 'txtcc'),
				'code'                 => __( 'Code', 'txtcc'),
				'all'                  => __( 'All', 'txtcc'),
				'underline'            => __( 'underline', 'txtcc'),
				'telephone'            => __( 'Telephone', 'txtcc'),
				'email'                => __( 'Email', 'txtcc'),
			));

			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-tooltip');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script('iris', admin_url('js/iris.min.js'),array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, 1);
			wp_enqueue_script('wp-color-picker', admin_url('js/color-picker.min.js'), array('iris'), false,1);
			$colorpicker_arr = array('clear' => __('Clear', 'txtcc'), 'defaultString' => __('Default', 'txtcc'), 'pick' => __('Select Color', 'txtcc'));
			wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', array_map('sanitize_text_field',$colorpicker_arr) ); 
		}
		add_action( 'admin_enqueue_scripts', 'txtcc_admin_scripts' );
	}
}
?>