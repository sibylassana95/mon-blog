<?php
if( ! function_exists( 'cleverfox_avril_dynamic_styles' ) ):
    function cleverfox_avril_dynamic_styles() {
		$output_css = '';
		
		
		/**
		 * Logo Width 
		 */
		 $logo_width			= get_theme_mod('logo_width','140');		 
		if($logo_width !== '') { 
				$output_css .=".logo img, .mobile-logo img {
					max-width: " .esc_attr($logo_width). "px;
				}\n";
			}
		
		/**
		 *  Typography Body
		 */
		 $avril_body_text_transform	 	 = get_theme_mod('avril_body_text_transform','inherit');
		 $avril_body_font_style	 		 = get_theme_mod('avril_body_font_style','inherit');
		 $avril_body_font_size	 		 = get_theme_mod('avril_body_font_size','15');
		 $avril_body_line_height		 = get_theme_mod('avril_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($avril_body_font_size). "px;
			line-height: " .esc_attr($avril_body_line_height). ";
			text-transform: " .esc_attr($avril_body_text_transform). ";
			font-style: " .esc_attr($avril_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $avril_heading_text_transform 	= get_theme_mod('avril_h' . $i . '_text_transform','inherit');
			 $avril_heading_font_style	 	= get_theme_mod('avril_h' . $i . '_font_style','inherit');
			 $avril_heading_font_size	 		 = get_theme_mod('avril_h' . $i . '_font_size');
			 $avril_heading_line_height		 	 = get_theme_mod('avril_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($avril_heading_font_size). "px;
				line-height: " .esc_attr($avril_heading_line_height). ";
				text-transform: " .esc_attr($avril_heading_text_transform). ";
				font-style: " .esc_attr($avril_heading_font_style). ";
			}\n";
		 }
		 
		 
		/**
		 * Slider
		 */
		$slider_opacity						 = get_theme_mod('slider_opacity','0.5');
		if($slider_opacity !== '') { 
				$output_css .=".theme-slider:after {
					opacity: " .esc_attr($slider_opacity). ";
					background: #000000;
				}\n";
			}
		
		/**
		 * Contact Info
		 */
		$theme = wp_get_theme(); // gets the current theme
		if ( 'Aviser' == $theme->name){
			$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
			$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
			$hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1'); 	
			if($hide_show_cntct_details == '1'  || $hide_show_email_details == '1'  || $hide_show_mbl_details == '1') {
				$output_css .=".navbar-area:not(.sticky-menu) {
						padding: 0rem 0 1rem 0;
					}\n";
			}else{
				$output_css .="@media (min-width: 992px) {.logo a:before {
						height: 105px !important;
						top: -32px !important;
				}}\n";
			}	
		}
			
	 wp_add_inline_style( 'avril-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_avril_dynamic_styles' );
?>