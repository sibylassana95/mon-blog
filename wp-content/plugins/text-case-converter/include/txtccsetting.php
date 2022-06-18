<?php
$ftchval = get_option('_txtcc_all_settings');
if(isset($ftchval['text_option_data']) && !empty($ftchval['text_option_data'])){
	$txt_all =  $ftchval['text_option_data'];
	extract($txt_all);	
}
?> <section class="m-3 mainsec catcbll_general_sec" id="wcatcbll_stng">
    <form method="post" name="form_seting" id="form_txtcc_set" action="#">
        <div class="container-fluid p-0">
            <div class="row">
                <!-- 1st Box Left side -->
                <div class="col-xl-6 col-lg-6">
                    <div class="colbox p-3 mb-3">
                        <h6 class="px-0 mb-3"><?php echo __('Settings','txtcc');?></h6>
                        <div class="main_txtcc_set">
                            <!-- <div class="chkbx_txtcc_set"> -->
                            <div class="enbl_set_tc col-md-12 mb-2">
                                <label class="switch">
                                    <input type="checkbox" value="1" class="chk_txtc_set" id="cmn_setchk_d" name="all"
                                        <?php if(isset($all) && !empty($all) && esc_html($all)== 1){echo "checked";}?>>
                                    <span class="slider round"></span>
                                </label>
                                <label class="lbl_set_txtcc zebra_tooltips"
                                    title="<?php echo __('To show all tools','txtcc');?>"><?php echo __('All','txtcc');?></label>
                            </div> <?php
								$setting_label = array(
									'lowercase'          => array(__('Lower Case','txtcc')			         => __('To show Lower Case','txtcc')),		
									'uppercase'          => array(__('Upper Case','txtcc')			         => __('To show Upper Case','txtcc')),
									'capitalize'         => array(__('Capitalize','txtcc') 			         => __('To Show Capitalize','txtcc')),		
									'sentence'           => array(__('Sentence','txtcc') 				     => __('To Show Sentence','txtcc')),
									'address'            => array(__('Address','txtcc') 				     => __('To Show Address','txtcc')),		
									'subscript'          => array(__('Subscript','txtcc') 			         => __('To Show Selected text in Subscript','txtcc')),
									'abbreviation'       => array(__('Abbreviation','txtcc') 			     => __('To Show Selected text in Abbreviation','txtcc')),		
									'synonyms'           => array(__('Synonyms','txtcc') 				     => __('To Show Same meaning of the word','txtcc')),
									'audio'              => array(__('Audio','txtcc') 				         => __('To Show Audio tag','txtcc')),		
									'video'              => array(__('Video','txtcc') 				         => __('To Show Video tag','txtcc')),
									'tooltip'            => array(__('Tooltip','txtcc') 			    	 => __('To make Tooltip in selected text','txtcc')),		
									'clean'              => array(__('Clean','txtcc') 				         => __('To Clean your editor','txtcc')),
									'superscript'        => array(__('Superscript','txtcc') 			     => __('To Show Selected text in Superscript','txtcc')),		
									'calculator'         => array(__('Calculator','txtcc') 			         => __('To count the char,word and line on your editor','txtcc')),
									'highlighttext'      => array(__('Highlight Text','txtcc') 		         => __('To use highlight text on your selected content','txtcc')),		
									'dummytext'          => array(__('Dummy Text','txtcc') 		     	     => __('To Show Dummy text','txtcc')),
									'alternatecase'      => array(__('Alternate Case','txtcc') 		         => __('To Show Alternate case','txtcc')),		
									'downloadtext'       => array(__('Download Text','txtcc') 		         => __('Download your text on your editor','txtcc')),
									'shortquotation'     => array(__('Short Quotation','txtcc') 		     => __('To Show selected text in Short Quotation','txtcc')),		
									'addbreakincontent'  => array(__('Add break in content','txtcc') 	     => __('To show Add break in content','txtcc')),
									'underline'          => array(__('Underline','txtcc') 		        	 => __('To Use Underline in the selected word or line','txtcc')),		
									'telephone'          => array(__('Telephone','txtcc') 			         => __('To Use Tel tag in the selected word','txtcc')),
									'email'              => array(__('Email','txtcc') 			             => __('To Use Email tag in the selected word','txtcc')),						
									'copytoclipboard'    => array(__('Copy To Clipboard','txtcc')   	     => __('To Copy the selected content on your editor','txtcc')),
									'code'               => array(__('Code','txtcc') 					     => __('To show the selected text','txtcc')),	
									'headings'           => array(__('Headings','txtcc')                     => __('To Use for headings','txtcc')),
									'confirmbox'         => array(__('Confirmation Check','txtcc')           => __('Use this feature to add a confirmation popup while using Uppercase, LowerCase, AlternateCase etc.','txtcc')),
								
								);
								echo '<div class="row"><div class=" col-md-12 txc_set_lbl">';
								$i=0;
							foreach($setting_label as $setting_key => $setting_val){
								$i++;							
								foreach($setting_val as $set_val_key => $set_value){
								if ($i > 1 && $i % 4 == 1){
									echo '</div></div><div class="row"><div class=" col-md-12 txc_set_lbl">';
								}?> <div class="enbl_set_tc col-md-3">
                                <label class="switch">
                                    <input type="checkbox" value="1" class="chk_txtc_set chk_cmn_set"
                                        name="<?php echo esc_attr($setting_key);?>"
                                        <?php if(isset($$setting_key) && !empty($$setting_key) && esc_html($$setting_key) == 1){echo "checked";}?>>
                                    <span class="slider round"></span>
                                </label>
                                <label class="lbl_set_txtcc zebra_tooltips"
                                    title="<?php echo esc_attr($set_value);?>"><?php echo esc_html($set_val_key);?></label>
                            </div> <?php	
								}								
							}
						echo '</div></div>';			
						?>
                        </div>
                        <!-- </div> -->
                        <input type="hidden" value="<?php echo esc_html($hide_chk_count);?>" name="hide_chk_count"
                            id="hide_chk_count">
                        <button type="ubmit" class="txtcc_set_btn btn-grad"
                            id="btn_submit_txtc"><?php echo __('Save Changes','txtcc');?></button>
                    </div>
                </div>
                <!-- 1st Box Left side -->
                <!-- 2nd Box Right side -->
                <div class="col-xl-6 col-lg-6">
                    <div class="colbox p-3 mb-3">
                        
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="colbox">
                                <div class="side_review">
                                    <iframe src="https://www.youtube.com/embed/YMtaGXHyA70" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                    <p class="mb-0 mt-1 p-3 vido"><a
                                            href="https://wordpress.org/support/plugin/text-case-converter/reviews/"
                                            target="_blank"><?php echo __('Please Review','txtcc');?> <span
                                                class="dashicons dashicons-thumbs-up"></span></a></p>
                                    <p class="mb-0 mt-1 p-3 vido text-end"><a
                                            href="https://www.youtube.com/channel/UClog8CJFaMUqll0X5zknEEQ"
                                            class="sub_btn" target="_blank"><?php echo __('SUBSCRIBE','txtcc');?></a>
                                    </p>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="colbox">
                                <div class="side_review optigif">
                                    <a href="https://1.bp.blogspot.com/-Gh_wRgDCnTc/YNxa8JzXTaI/AAAAAAAABlY/Rrbh-3PVYtYh7XWYVeeyJXHIa_wZfRUegCLcBGAsYHQ/s0/optimize-new-min.gif"
                                        target="_blank"><img src="<?php echo TXTCC_IMAGE.'hirewebxperts.jpg'?>" /></a>
                                    <p class="mb-0 p-3"><a href="https://plugins.hirewebxperts.com/support/"
                                            target="_blank"><?php echo __('For WordPress Design & Development | Custom Plugin Services','txtcc');?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="px-0 my-3"><?php echo __('Try Our WooCommerce Plugins','txtcc');?></h6>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="side_review colbox">
                                    <a href="https://wordpress.org/plugins/woo-custom-cart-button/" target="_blank"><img
                                            src="<?php echo TXTCC_IMAGE.'custom-add-to-cart.jpg'?>" /></a>
                                    <p class="mb-0 p-3 vido55"><a
                                            href="https://wordpress.org/plugins/woo-custom-cart-button/"
                                            target="_blank"><?php echo __('Custom Add to Cart Button','txtcc');?></a>
                                    </p>
                                    <p class="mb-0 p-3 vido45 text-end"><a
                                            href="https://plugins.hirewebxperts.com/#price" class="sub_btn"
                                            target="_blank"><?php echo __('Get Pro','txtcc');?></a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="side_review colbox">
                                    <a href="https://wordpress.org/plugins/awesome-checkout-templates/"
                                        target="_blank"><img
                                            src="<?php echo TXTCC_IMAGE.'awesome-checkout.jpg'?>" /></a>
                                    <p class="mb-0 p-3"><a
                                            href="https://wordpress.org/plugins/awesome-checkout-templates/"
                                            target="_blank"><?php echo __('Awesome Checkout Templates','txtcc');?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <h6 class="px-0 mb-3  mt-3"><?php echo __('Try Our Other Plugins','txtcc');?></h6>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="side_review colbox">
                                    <a href="https://wordpress.org/plugins/passwords-manager/" target="_blank"><img
                                            src="<?php echo TXTCC_IMAGE.'pasword-manager.jpg'?>" /></a>
                                    <p class="mb-0 p-3"><a href="https://wordpress.org/plugins/passwords-manager/"
                                            target="_blank"><?php echo __('Passwords Manager','txtcc');?></a></p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="side_review colbox">
                                    <a href="https://wordpress.org/plugins/gforms-addon-for-country-and-state-selection"
                                        target="_blank"><img
                                            src="<?php echo TXTCC_IMAGE.'country-state-selection.jpg'?>" /></a>
                                    <p class="mb-0 p-3"><a
                                            href="https://wordpress.org/plugins/gforms-addon-for-country-and-state-selection"
                                            target="_blank"><?php echo __('Country and State Selection Addon for Gravity Forms','txtcc');?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-6 col-md-6">
                                <div class="side_review colbox">
                                    <a href="https://wordpress.org/plugins/digital-warranty-card-generator/"
                                        target="_blank"><img
                                            src="<?php echo TXTCC_IMAGE.'digital-warranty-card.jpg'?>" /></a>
                                    <p class="mb-0 p-3"><a
                                            href="https://wordpress.org/plugins/digital-warranty-card-generator/"
                                            target="_blank"><?php echo __('Digital Warranty Card Generator','txtcc');?></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="side_review colbox">
                                    <a href="https://wordpress.org/plugins/horizontal-slider-with-scroll/"
                                        target="_blank"><img
                                            src="<?php echo TXTCC_IMAGE.'horizontal-slider.jpg'?>" /></a>
                                    <p class="mb-0 p-3"><a
                                            href="https://wordpress.org/plugins/horizontal-slider-with-scroll/"
                                            target="_blank"><?php echo __('Horizontal Slider with Scroll','txtcc');?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2nd Box Right side -->
        </div>
        <div id="txtcc_overlay">
            <div class="cv-spinner">
                <img src="<?php echo TXTCC_IMG.'spinner.svg'?>">
            </div> <?php include(TXTCC_INC .'txtcc_setting_support_html.php');?>
        </div>
    </form>
</section>