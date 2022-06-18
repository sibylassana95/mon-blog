(function(){ 
	// console.log( document.getElementsByTagName('html')[0].getAttribute('lang') );


	tinymce.create('tinymce.plugins.Editorchangecase', {
		init : function(editor, url) {
			//USE FOR HEADING1
			editor.addButton('heading1', {
				title : 'H1',
				text : 'H1',
				icon: false,
				id:'h1',
				classes:'btn_style',
				onclick: function() {
					var h1 = tinymce.activeEditor.selection.getContent();
					if(h1){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('h1', {h1},h1));
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}				
				}
			});
			editor.addButton('heading2', {
				title : 'H2',
				text : 'H2',
				icon: false,
				id:'h2',
				classes:'btn_style',
				onclick: function() {
					var h2 = tinymce.activeEditor.selection.getContent();
					if(h2){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('h2', {h2},h2));
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}				
				}
			});
			editor.addButton('heading3', {
				title : 'H3',
				text : 'H3',
				icon: false,
				id:'h3',
				classes:'btn_style',
				onclick: function() {
					var h3 = tinymce.activeEditor.selection.getContent();
					if(h3){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('h3', {h3},h3));
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}
				
				}
			});

			editor.addButton('heading4', {
				title : 'H4',
				text : 'H4',
				icon: false,
				id:'h4',
				classes:'btn_style',
				onclick: function() {
					var h4 = tinymce.activeEditor.selection.getContent();
					if(h4){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('h4', {h4},h4));
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}
					
				}
			});


			editor.addButton('heading5', {
				title : 'H5',
				text : 'H5',
				icon: false,
				id:'h5',
				classes:'btn_style',
				onclick: function() {
					var h5 = tinymce.activeEditor.selection.getContent();
					if(h5){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('h5', {h5},h5));
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}
					
				}
			});
			editor.addButton('heading6', {
				title : 'H6',
				text : 'H6',
				icon: false,
				id:'h6',
				classes:'btn_style',
				onclick: function() {
					var h6 = tinymce.activeEditor.selection.getContent();
					if(h6){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('h6', {h6},h6));
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}					
				}
			});

			// Register Keyboard Shortcuts
			editor.addShortcut('meta+shift+u','Uppercase', ['allupper', false, 'Uppercase'], this);
			editor.addCommand('allupper', function() {
				var upper_sel = tinymce.activeEditor.selection.getContent();
				upper_sel = capitalizeWords(upper_sel);				
				upper_sel = upper_sel.toUpperCase();
				if(upper_sel != ''){
					editor.selection.setContent(upper_sel);
					editor.save();
					editor.isNotDirty = true;
				}else{
					var edit_cnt = tinymce.activeEditor.getContent().toUpperCase();
					editor.setContent(edit_cnt); 
				}
			});

			editor.addShortcut('meta+shift+l','lowercase', ['alllower', false, 'lowercase'], this);
			editor.addCommand('alllower', function() {
				var low_sel = tinymce.activeEditor.selection.getContent();
				low_sel = capitalizeWords(low_sel);
				low_sel = low_sel.toLowerCase();
				if(low_sel != ''){
					editor.selection.setContent(low_sel);
					editor.save();
					editor.isNotDirty = true;
				}else{
					var edit_low = tinymce.activeEditor.getContent().toLowerCase();
					editor.setContent(edit_low); 
				} 
			});

			editor.addShortcut('meta+shift+c','Capitalize', ['capitalizer', false, 'Capitalize'], this);
			editor.addCommand('capitalizer', function() {
				var capi_sel = tinymce.activeEditor.selection.getContent();
				capi_sel = capi_sel.toLowerCase();
					capi_sel = capitalizeWords(capi_sel);
				if(capi_sel != ''){
					editor.selection.setContent(capi_sel);
					editor.save();
					editor.isNotDirty = true;
				}
				else{
					var capi_convrt = tinymce.activeEditor.getContent();
					capi_convrt = capi_convrt.toLowerCase();
					all_editor = capitalizeWords(capi_convrt);
					editor.setContent(all_editor); 
				} 
			});

			editor.addShortcut('meta+shift+s','Sentence', ['sentence', false, 'Sentence'], this);
			editor.addCommand('sentence', function() {
				var sent_sel = tinymce.activeEditor.selection.getContent();
				sent_sel = ucfirst(sent_sel);
				if(sent_sel != ''){
					editor.selection.setContent(sent_sel);
					editor.save();
					editor.isNotDirty = true;
				}else{
					var sentence = tinymce.activeEditor.getContent({format: 'text'});
					sentence = ucfirst(sentence);
					editor.setContent(sentence); 
				}
			});

			editor.addShortcut('meta+shift+i','Invert Case', ['invert', false, 'Invert Case'], this);
			editor.addCommand('invert', function() {
				var inver_sel = tinymce.activeEditor.selection.getContent();
				inver_sel = inver_sel.replace(
					/[a-z]/gi,
					char => /[a-z]/.test(char)
					? char.toUpperCase()
					: char.toLowerCase()
				);
				if(inver_sel != ''){
					editor.selection.setContent(inver_sel);
					editor.save();
					editor.isNotDirty = true;
				}
				else{
					var inver_cnvrt = tinymce.activeEditor.getContent();
					inver_cnvrt = inver_cnvrt.replace(
						/[a-z]/gi,
						charter => /[a-z]/.test(charter)
						? charter.toUpperCase()
						: charter.toLowerCase()
					);
					tinymce.activeEditor.load();
					editor.setContent(inver_cnvrt);
				}
			});

			//Add button and functionality

			editor.addButton('withcaps', {
				text: 'UC',
				selector: "textarea",  // change this value according to your HTML  
				title : txtcc_vars.uppercase+' (Ctrl+shift+u)',
				icon: false,
				classes:'btn_style',
				id: 'upcase',
				custom_undo_redo_keyboard_shortcuts : true,
				// image : url+'/icons/uc.png',

				onclick: function() {
					if(txtcc_vars.confirmbox == 'on'){
						if (confirm('Do you really want to use this feature?')) {
							jQuery('.wlc_count').css('display','none');
							var upper_sel = tinymce.activeEditor.selection.getContent();	
							upper_sel = capitalizeWords(upper_sel);
							upper_sel = upper_sel.toUpperCase();
							if(upper_sel != ''){
								editor.selection.setContent(upper_sel);
								editor.save();
								editor.isNotDirty = true;
							}else{
								var edit_cnt = tinymce.activeEditor.getContent().toUpperCase();
								editor.setContent(edit_cnt); 
							}
						}
					}else{
						jQuery('.wlc_count').css('display','none');
						var upper_sel = tinymce.activeEditor.selection.getContent();	
						upper_sel = capitalizeWords(upper_sel);
						upper_sel = upper_sel.toUpperCase();
						if(upper_sel != ''){
							editor.selection.setContent(upper_sel);
							editor.save();
							editor.isNotDirty = true;
						}else{
							var edit_cnt = tinymce.activeEditor.getContent().toUpperCase();
							editor.setContent(edit_cnt); 
						}
					}					
				}
			}); 

			editor.addButton('withoutcaps', {
				text: 'LC',
				title : txtcc_vars.lowercase+' (Ctrl+shift+l)',
				icon: false,
				id:'lowcase',
				classes:'btn_style',
				//image : url+'/icons/lc.png',
				onclick: function() {
					if(txtcc_vars.confirmbox == 'on'){
						if (confirm('Do you really want to use this feature?')) {
							jQuery('.wlc_count').css('display','none');
							var low_sel = tinymce.activeEditor.selection.getContent();
							low_sel = capitalizeWords(low_sel);
							low_sel = low_sel.toLowerCase();
							if(low_sel != ''){
								editor.selection.setContent(low_sel);
								editor.save();
								editor.isNotDirty = true;
							}else{
								var edit_low = tinymce.activeEditor.getContent().toLowerCase();
								editor.setContent(edit_low); 
							}
						}
					}else{
						jQuery('.wlc_count').css('display','none');
						var low_sel = tinymce.activeEditor.selection.getContent();
						low_sel = capitalizeWords(low_sel);
						low_sel = low_sel.toLowerCase();
						if(low_sel != ''){
							editor.selection.setContent(low_sel);
							editor.save();
							editor.isNotDirty = true;
						}else{
							var edit_low = tinymce.activeEditor.getContent().toLowerCase();
							editor.setContent(edit_low); 
						}
					}
				}
			});

			//capitalize
			editor.addButton('firstcaps', {
				text: 'Aa',
				title : txtcc_vars.capitalize+' (Ctrl+shift+c)',
				icon: false,
				id:'capital',
				classes:'btn_style',
				//image : url+'/icons/cc.png',
				onclick: function() {
					if(txtcc_vars.confirmbox == 'on'){
						if (confirm('Do you really want to use this feature?')) {
							jQuery('.wlc_count').css('display','none');
							var capi_sel = tinymce.activeEditor.selection.getContent();

							capi_sel = capi_sel.toLowerCase();
							capi_sel = capitalizeWords(capi_sel);
							if(capi_sel != ''){
								editor.selection.setContent(capi_sel);
								editor.save();
								editor.isNotDirty = true;
							}
							else{
								var capi_convrt = tinymce.activeEditor.getContent();
								capi_convrt = capi_convrt.toLowerCase();
								all_editor = capitalizeWords(capi_convrt);
								editor.setContent(all_editor); 
							}
						}
					}else{
						jQuery('.wlc_count').css('display','none');
						var capi_sel = tinymce.activeEditor.selection.getContent();

						capi_sel = capi_sel.toLowerCase();
						capi_sel = capitalizeWords(capi_sel);
						if(capi_sel != ''){
							editor.selection.setContent(capi_sel);
							editor.save();
							editor.isNotDirty = true;
						}
						else{
							var capi_convrt = tinymce.activeEditor.getContent();
							capi_convrt = capi_convrt.toLowerCase();
							all_editor = capitalizeWords(capi_convrt);
							editor.setContent(all_editor); 
						}
					}
				}
			});

			// sentence
			editor.addButton('frstwcaps', {
				text: 'SC',
				title : txtcc_vars.sentence+' (Ctrl+shift+s)',
				icon: false,
				id:'sentc',
				classes:'btn_style',
				//image : url+'/icons/sc.png',
				onclick: function() {
					if(txtcc_vars.confirmbox == 'on'){
						if (confirm('Do you really want to use this feature?')) {
							jQuery('.wlc_count').css('display','none');
							var sent_sel = tinymce.activeEditor.selection.getContent();
							if(sent_sel != ''){
								sent_sel = sent_sel.toLowerCase();
								sent_sel = sent_sel.charAt(0).toUpperCase() + sent_sel.slice(1);
								editor.selection.setContent(sent_sel);
								editor.save();
								editor.isNotDirty = true;
							}else{
								var sentence = tinymce.activeEditor.getContent({format: 'text'});
								sentence = sentence.toLowerCase();
								sentence = sentence.charAt(0).toUpperCase() + sentence.slice(1);
								editor.setContent(sentence); 
							}
						}
					}else{
						jQuery('.wlc_count').css('display','none');
						var sent_sel = tinymce.activeEditor.selection.getContent();
						if(sent_sel != ''){
							sent_sel = sent_sel.toLowerCase();
							sent_sel = sent_sel.charAt(0).toUpperCase() + sent_sel.slice(1);
							editor.selection.setContent(sent_sel);
							editor.save();
							editor.isNotDirty = true;
						}else{
							var sentence = tinymce.activeEditor.getContent({format: 'text'});
							sentence = sentence.toLowerCase();
							sentence = sentence.charAt(0).toUpperCase() + sentence.slice(1);
							editor.setContent(sentence); 
						}
					}
				}
			});

			// invertcase
			editor.addButton('invertcase', {
				text: 'IC',
				title : txtcc_vars.invert_case+' (Ctrl+shift+i)',
				icon: false,
				id:'invert',
				classes:'btn_style',
				//image : url+'/icons/ic.png',
				onclick: function() {
					if(txtcc_vars.confirmbox == 'on'){
						if (confirm('Do you really want to use this feature?')) {
							jQuery('.wlc_count').css('display','none');
							var inver_sel = tinymce.activeEditor.selection.getContent();
							inver_sel = inver_sel.replace(
								/[a-z]/gi,
								char => /[a-z]/.test(char)
								? char.toUpperCase()
								: char.toLowerCase()
							);
							if(inver_sel != ''){
								editor.selection.setContent(inver_sel);
								editor.save();
								editor.isNotDirty = true;
							}
							else{
								var inver_cnvrt = tinymce.activeEditor.getContent();
								inver_cnvrt = inver_cnvrt.replace(
									/[a-z]/gi,
									charter => /[a-z]/.test(charter)
									? charter.toUpperCase()
									: charter.toLowerCase()
								);
								tinymce.activeEditor.load();
								editor.setContent(inver_cnvrt);
							}
						}
					}else{
						jQuery('.wlc_count').css('display','none');
						var inver_sel = tinymce.activeEditor.selection.getContent();
						inver_sel = inver_sel.replace(
							/[a-z]/gi,
							char => /[a-z]/.test(char)
							? char.toUpperCase()
							: char.toLowerCase()
						);
						if(inver_sel != ''){
							editor.selection.setContent(inver_sel);
							editor.save();
							editor.isNotDirty = true;
						}
						else{
							var inver_cnvrt = tinymce.activeEditor.getContent();
							inver_cnvrt = inver_cnvrt.replace(
								/[a-z]/gi,
								charter => /[a-z]/.test(charter)
								? charter.toUpperCase()
								: charter.toLowerCase()
							);
							tinymce.activeEditor.load();
							editor.setContent(inver_cnvrt);
						}
					}
				}
			});

			// alternative case
			editor.addButton('alt', {
				text: 'Alt Case',
				title : txtcc_vars.alternate_case,
				icon: false,
				id:'alternateCase',
				//image : url+'/icons/ctc.png',
				onclick: function() {
					if(txtcc_vars.confirmbox == 'on'){
						if (confirm('Do you really want to use this feature?')) {
							jQuery('.wlc_count').css('display','none');
							var alt_sel = tinymce.activeEditor.selection.getContent();
							var str="";
							for (i=0; i<alt_sel.length; i++) {
								var ch = String.fromCharCode(alt_sel.charCodeAt(i));

								if (i % 2 == 1) {
									ch = ch.toUpperCase();
								} else {
									ch = ch.toLowerCase();
								}
								str =  str.concat(ch);
							}
							if(str != ''){
								editor.selection.setContent(str);
								editor.save();
								editor.isNotDirty = true;
							}else{
								var alt_All = tinymce.activeEditor.getContent();
								var strAll ="";
								for (i=0; i<alt_All.length; i++) {
									var ch = String.fromCharCode(alt_All.charCodeAt(i));

									if (i % 2 == 1) {
										ch = ch.toUpperCase();
									} else {
										ch = ch.toLowerCase();
									}
									strAll =  strAll.concat(ch);
								}
								editor.setContent(strAll);
							}
						}
					}else{
						jQuery('.wlc_count').css('display','none');
						var alt_sel = tinymce.activeEditor.selection.getContent();
						var str="";
						for (i=0; i<alt_sel.length; i++) {
							var ch = String.fromCharCode(alt_sel.charCodeAt(i));

							if (i % 2 == 1) {
								ch = ch.toUpperCase();
							} else {
								ch = ch.toLowerCase();
							}
							str =  str.concat(ch);
						}
						if(str != ''){
							editor.selection.setContent(str);
							editor.save();
							editor.isNotDirty = true;
						}else{
							var alt_All = tinymce.activeEditor.getContent();
							var strAll ="";
							for (i=0; i<alt_All.length; i++) {
								var ch = String.fromCharCode(alt_All.charCodeAt(i));

								if (i % 2 == 1) {
									ch = ch.toUpperCase();
								} else {
									ch = ch.toLowerCase();
								}
								strAll =  strAll.concat(ch);
							}
							editor.setContent(strAll);
						}
					}
				}
			});

			// dummy text insert
			editor.addButton('insert_text', {
				//text: 'Sub',
				title : txtcc_vars.insert_dummy_text,
				//icon: ' fa fa-indent',
				id:'insert_text',
				classes:'btn_style',
				image : url+'/icons/insert.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					insert_text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus nec feugiat in fermentum posuere urna nec tincidunt. Dignissim enim sit amet venenatis urna cursus eget nunc. Non pulvinar neque laoreet suspendisse interdum. Sagittis purus sit amet volutpat. Nisl tincidunt eget nullam non nisi. Duis ut diam quam nulla porttitor massa id neque. Sed viverra tellus in hac habitasse. Cras fermentum odio eu feugiat pretium nibh ipsum. Gravida dictum fusce ut placerat orci. Aliquam faucibus purus in massa tempor nec.<br/>';
					if(insert_text != ''){
						editor.selection.setContent(insert_text);
						editor.save();
						editor.isNotDirty = true;
					}
				}
			}); 

			// sub script text
			editor.addButton('sub', {
				//text: 'Sub',
				title : txtcc_vars.subscript,
				icon: false,
				id:'subscript',
				classes:'btn_style',
				image : url+'/icons/sub.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var sup_sel = tinymce.activeEditor.selection.getContent();
					if(sup_sel != ''){
						sup_sel = sup_sel.sub();
						editor.selection.setContent(sup_sel);
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}
				}
			});

			editor.addButton('sup', {
				//text: 'Sup',
				title : txtcc_vars.superscript,
				icon: false,
				id:'superscript',
				classes:'btn_style',
				image : url+'/icons/sup.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var sup_sel = tinymce.activeEditor.selection.getContent();
					if(sup_sel != ''){
						sup_sel = sup_sel.sup();
						editor.selection.setContent(sup_sel);
						editor.save();
						editor.isNotDirty = true;
					}else{
						alert('Please select text first');
					}
				}
			});

			// download text
			editor.addButton('download', {
				//text: 'Download',
				title : txtcc_vars.download_text,
				//icon: 'icon dashicons-before dashicons-download',
				id:'download',
				classes:'btn_style',
				image : url+'/icons/download.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var dnld_data = tinymce.activeEditor.selection.getContent();
					if(dnld_data != ''){
						const textToBLOB = new Blob([dnld_data], { type: 'text/plain' });
						const sFileName = 'Data.txt';    // The file to save the data.

						let newLink = document.createElement("a");
						newLink.download = sFileName;

						if (window.webkitURL != null) {
							newLink.href = window.webkitURL.createObjectURL(textToBLOB);
						}
						else {
							newLink.href = window.URL.createObjectURL(textToBLOB);
							newLink.style.display = "none";
							document.body.appendChild(newLink);
						}

						newLink.click();
					}
					else{
						var dnld_alldata = tinymce.activeEditor.getBody().innerText;
						const textToBLOB = new Blob([dnld_alldata], { type: 'text/plain' });
						const sFileName = 'Data.txt';    // The file to save the data.

						let newLink = document.createElement("a");
						newLink.download = sFileName;

						if (window.webkitURL != null) {
							newLink.href = window.webkitURL.createObjectURL(textToBLOB);
						}
						else {
							newLink.href = window.URL.createObjectURL(textToBLOB);
							newLink.style.display = "none";
							document.body.appendChild(newLink);
						}
						newLink.click();
					}
				}
			});


			// copy to clipboard
			editor.addButton('ctoc', {
				//text: 'CC',
				title : txtcc_vars.copy_clipboard+' (Ctrl+c)',
				icon: false,
				id:'copY',
				classes:'btn_style',
				image : url+'/icons/cc.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var cpycb = tinymce.activeEditor.selection.getContent();
					if(cpycb !=''){
						tinyMCE.activeEditor.execCommand( "Copy" );
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Copied Successfully',
							showConfirmButton: false,
							timer: 1500
						});
					}
					else{
						tinyMCE.activeEditor.selection.select(tinyMCE.activeEditor.getBody());
						tinyMCE.activeEditor.execCommand( "Copy" );
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Copied Successfully',
							showConfirmButton: false,
							timer: 1500
						});
					}
				}
			});

			// break line
			editor.addButton('brk_line', {
				// text : 'Break',
				id:'brk_line',
				classes:'btn_style',
				icon: 'icon dashicons-before dashicons-editor-break',
				title : txtcc_vars.break_line,
				onclick: function() {          
					jQuery('.wlc_count').css('display','none');
					tinyMCE.activeEditor.selection.setNode(tinyMCE.activeEditor.dom.create('br'));
					tinyMCE.activeEditor.selection.setNode(tinyMCE.activeEditor.dom.create('br'));           
				}
			});

			// calculator button
			editor.addButton('calculator', {
				// text : 'Break',
				id:'calculator',
				classes:'btn_style',
				//icon: 'icon dashicons-before dashicons-editor-break',
				title : txtcc_vars.calculator,
				image : url+'/icons/calculator.png',
				onclick: function() {
					// for char count
					var char_text = tinymce.activeEditor.selection.getContent({formate : 'text'}); 
					if(char_text != ''){
						var regex = /(&nbsp;|<([^>]+)>)/ig, body = char_text,   result = body.replace(regex, " ");
						char_text = jQuery.trim(result).length;
						jQuery('#character_count').last().remove();
						jQuery('#calculator').after('<div id="character_count" class="mce-widget mce-btn wlc_count"> Char Count : ' + char_text + '</div>');
					}
					else{
						var char_all  = tinymce.activeEditor.getBody().innerText;
						char_all = char_all.replace(/</g, '<');
						char_all = char_all.replace(/(\r\n|\n|\r)/gm,"").length;

						if(char_all > 1){
							jQuery('#character_count').last().remove();
							jQuery('#calculator').after('<div id="character_count" class="mce-widget mce-btn wlc_count"> Char Count : ' + char_all + '</div>');
						} 
						else{
							jQuery('#character_count').last().remove();
							jQuery('#calculator').after('<div id="character_count" class="mce-widget mce-btn wlc_count"> Char Count : ' + 0 + '</div>');                
						}

					}
					// for word count
					var word_text = tinymce.activeEditor.selection.getContent({formate : 'text'});
					if(word_text != ''){
						word_text = word_text.replace(/> ?\/?</g,' ');
						word_text =  word_text.split(' ').length;
						jQuery('#word_count').last().remove();
						jQuery('#character_count').after('<div id="word_count" class="mce-widget mce-btn wlc_count"> Word Count : ' + word_text + '</div>')
					}else{
						var wordAll = tinymce.activeEditor.getContent({formate : 'text'});
						if(wordAll != ''){
							wordAll = wordAll.replace(/> ?\/?</g,' ');
							wordAll = wordAll.split(" ").length;
							jQuery('#word_count').last().remove();

							jQuery('#character_count').after('<div id="word_count" class="mce-widget mce-btn wlc_count"> Word Count : ' + wordAll + '</div>');
						}
						else{
							jQuery('#word_count').last().remove();
							jQuery('#character_count').after('<div id="word_count" class="mce-widget mce-btn wlc_count"> Word Count : ' + 0 + '</div>');
						}          
					} 
					//for line count
					var newLines = tinymce.activeEditor.selection.getContent({formate : 'text'});
					if(newLines != ''){
						newLines = newLines.split(/[\\\/]/).length;
						jQuery('#line_count').last().remove();
						jQuery('#word_count').after('<div id="line_count" class="mce-widget mce-btn wlc_count"> Line Count : ' + newLines + '</div>');
					}
					else{
						var lineAll = tinymce.activeEditor.getContent();
						if(lineAll != ''){
							lineAll = lineAll.split(/[\\\/]/).length-1;
							jQuery('#line_count').last().remove();
							jQuery('#word_count').after('<div id="line_count" class="mce-widget mce-btn wlc_count"> Line Count : ' + lineAll + '</div>');
						}
						else{
							jQuery('#line_count').last().remove();
							jQuery('#word_count').after('<div id="line_count" class="mce-widget mce-btn wlc_count"> Line Count : ' + 0 + '</div>');
						}
					}     
					setTimeout(function(){jQuery('#character_count').hide(); }, 4000);
					setTimeout(function(){jQuery('#line_count').hide(); }, 4000);
					setTimeout(function(){jQuery('#word_count').hide(); }, 4000);               
				}


			});

			// selected text in address tag
			editor.addButton('address', {
				title : txtcc_vars.address,
				icon: false,
				id:'address',
				classes:'btn_style',
				image : url+'/icons/address.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var adrs = tinymce.activeEditor.selection.getContent();
					if(adrs != ''){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('address', {}, adrs));

						editor.save();
						editor.isNotDirty = true;
					}
				}
			});

			// selected text in Short-quotation(q) tag
			editor.addButton('short_quotation', {
				title : txtcc_vars.short_quotation,
				icon: false,
				id:'short_quotation',
				classes:'btn_style',
				image : url+'/icons/squtt.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var short_quotation = tinymce.activeEditor.selection.getContent();            
					if(short_quotation != ''){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('q', {},short_quotation));

						editor.save();
						editor.isNotDirty = true;
					}
				}
			});

			// selected text in abbr tag
			editor.addButton('abbr', {
				title : txtcc_vars.abbr,
				icon: false,
				id:'abbr',
				classes:'btn_style',
				image : url+'/icons/abbr.png',
				onclick: function() {
					var abbr = tinymce.activeEditor.selection.getContent();
					if(abbr != ''){
						jQuery('.wlc_count').css('display','none');
						// Open a Dialog
						editor.windowManager.open({
							title: txtcc_vars.abbr_title,
							body: [
								{type: 'textbox', name: 'text', label: txtcc_vars.abbr_title_lbl, size:'50',id:'abbr_title' }
							],
							onSubmit: function () {              
								if(document.getElementById( 'abbr_title' ).value != ''){
									var abbr_title = document.getElementById( 'abbr_title' ).value;
								}
								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('abbr', {title:abbr_title},abbr));
								editor.save();
								editor.isNotDirty = true;
							},
						});
					}
				}
			});

			//Synonyms       
			editor.addButton('drop_down',{
				title : txtcc_vars.drop_down,
				icon: false,
				id: 'drop_down',
				classes:'btn_style',
				image : url+'/icons/drop-down.png',
				onclick: function(){
					var drop_down = tinymce.activeEditor.selection.getContent();
					if(  drop_down !=''){
						Swal.fire({
							title: 'Add synonyms',
							input: 'text',
							customClass: 'syn_alrt',
							inputPlaceholder: 'Synonym1, Synonym2, Synonym3',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Submit',
						}).then((result) => {
							if (result.value) {
								var nameArr = result.value. split(',');
								var value; 
								for(var i=0;i<nameArr.length;i++) {
									value += '<option value="">'+nameArr[i]+'</option>';                
								}            
								var x = drop_down;
								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('select', {id: 'select1'}, value));
								editor.save();
								editor.isNotDirty = true;
							}
						});
					}else{
						alert('Please select text first');
					}
				}  
			});

			//Audio tag   
			editor.addButton('audio',{
				title : txtcc_vars.audio,
				icon: false,
				id: 'audio',
				classes:'btn_style',
				image : url+'/icons/audio.png',
				onclick: function(){
					Swal.fire({
						title: 'Audio src',
						input: 'text',
						customClass: 'aud_alrt',
						inputPlaceholder: 'Use audio src',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Submit',

					}).then((result) => {
						if (result.value) {
							Swal.fire({
								position: 'center',
								icon: 'success',
								title: 'Success',
								showConfirmButton: false,
								timer: 2000,
							});
							tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('audio controls', {}, '<source src="'+result.value+'" type="audio/ogg">'));
							editor.save();
							editor.isNotDirty = true;
						}
					});
				}
			});

			//video tag   
			editor.addButton('video',{
				title : txtcc_vars.video,
				icon: false,
				id: 'video',
				classes:'btn_style',
				image : url+'/icons/video.png',
				onclick: function(){
					Swal.fire({
						title: 'Add video',
						html:  '<label class="vdlabl1">Autoplay</label><input type= "checkbox" id= "swl_chk1" value="autoplay"><br>'+
						'<label class="vdlabl">Loop</label><input type= "checkbox" id= "swl_chk" value="loop"><br>',
						input:'text',
						inputPlaceholder: 'Use video src',
						customClass: 'vid_alrt',
						showCancelButton: true, 
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Submit',
					}).then((result) => {
						if (result.value) {
							if(jQuery('#swl_chk1').prop( "checked") && jQuery('#swl_chk').prop( "checked")){

								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('video controls  autoplay loop', {}, '<source src="'+result.value+'" type="video/ogg">'));
							}else{
								if (jQuery('#swl_chk').prop( "checked") ) {

									tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('video controls loop', {}, '<source src="'+result.value+'" type="video/ogg">'));
								} else if( jQuery('#swl_chk1').prop("checked") ){

									tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('video controls autoplay', {}, '<source src="'+result.value+'" type="video/ogg">'));
								}
								else{
									tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('video controls autoplay loop', {}, '<source src="'+result.value+'" type="video/ogg">'));
								}
							}
						}
					});
				}
			});

			//Tooltip  
			editor.addButton('tooltip',{ 
				title : txtcc_vars.tooltip,
				icon: false,
				id: 'tooltip',
				classes:'btn_style',
				image : url+'/icons/tooltip.png',
				onclick: function(){
					var tool_tip = tinymce.activeEditor.selection.getContent();
					if( tool_tip !=''){
						Swal.fire({
							title: 'Add Tooltip',
							input: 'text',
							customClass: 'toltp_alrt',
							inputPlaceholder: 'Add Tooltip',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Submit',
						}).then((result) => {
							if (result.value) {
								var ttp = result.value;
								var z = tool_tip;
								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('span',{class:'zebra_tooltips', title : ttp  },tool_tip ));
								editor.save();
								editor.isNotDirty = true;
							}
						});
					}
				}
			});     


			// Highlight the selected text using mark tag
			editor.addButton('highlight', {
				title : txtcc_vars.highlight,
				icon: false,
				id:'highlight',
				classes:'btn_style',
				image : url+'/icons/highlight.png',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var highlight = tinymce.activeEditor.selection.getContent();
					if(highlight != ''){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('mark', {style:'background: #ff0 !Important;'},highlight));
						editor.save();
						editor.isNotDirty = true;
					}
				}
			});

			//code
			editor.addButton('code', {
				title : txtcc_vars.code,
				icon: false,
				id:'code',
				classes:'btn_style',
				image : url+'/icons/code.png ',
				onclick: function() {
					jQuery('.wlc_count').css('display','none');
					var code = tinymce.activeEditor.selection.getContent();
					if(code != ''){
						tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('code', {code},code));

						editor.save();
						editor.isNotDirty = true;
					}

				}
			});

			//underline
			editor.addButton('underline', {
				title : txtcc_vars.underline,
				icon: false,
				id:'underline',
				image : url+'/icons/underline.png ',
				onclick: function(){
					jQuery('.wlc_count').css('display','none');
					var underline = tinymce.activeEditor.selection.getContent();
					if( underline != ''){
						Swal.fire({
							title:'Choose underline color',
							html:'<input type="text" class="txt_color_picker">',
							showCancelButton: true,
							customClass: 'uline_alrt',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Submit',
						}).then((result) => {
							if (result.value) {
								var x =  jQuery('.txt_color_picker').val();

								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('u', {style:'text-decoration-color:'+x},underline));
								editor.save();
								editor.isNotDirty = true;

							}
						});

						jQuery( '.txt_color_picker' ).wpColorPicker({});
					}else{
						alert('Please select text first');
					}
				}
			});

			// telephone

			editor.addButton('telephone', {
				title : txtcc_vars.telephone,
				icon: false,
				id:'tele',
				image : url+'/icons/tele.png ',
				onclick: function(){
					jQuery('.wlc_count').css('display','none');
					var tel = tinymce.activeEditor.selection.getContent();
					if( tel != ''){
						Swal.fire({
							title: 'Add Telephone Number',
							input: 'text',
							customClass: 'tel_alrt',
							inputPlaceholder: 'Telephone number',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Submit',
						}).then((result) => {
							if(result.value){
								var a =  result.value;

								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('a', {href:'tel:'+a},tel));

								editor.save();
								editor.isNotDirty = true;
							}
						});
					}else{
						alert('Please select text first');
					}
				}
			});


			//Email
			editor.addButton('email', {
				title : txtcc_vars.email,
				icon: false,
				id:'eml',
				image : url+'/icons/email.png ',
				onclick: function(){
					jQuery('.wlc_count').css('display','none');
					var mal = tinymce.activeEditor.selection.getContent();
					if( mal != ''){
						Swal.fire({
							title: 'Add E-mail',
							input: 'text',
							customClass: 'mal_alrt',
							inputPlaceholder: 'Enter your E-mail',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Submit',
						}).then((result) => {
							if(result.value){
								var mal_res =  result.value;

								tinymce.activeEditor.selection.setContent(tinymce.activeEditor.dom.createHTML('a', {href:'mailto:'+mal_res},mal));

								editor.save();
								editor.isNotDirty = true;
							}
						});
					}else{
						alert('Please select text first');
					}
				}
			});


			/* Clean textarea */        
			editor.addButton('clean', {
				// text: 'Clean',
				title : txtcc_vars.clean,
				icon: false,
				id:'Clean',
				classes:'btn_style',
				image : url+'/icons/clean.png',
				onclick: function() {
					if (confirm('Are you sure to clean this?')) {
						jQuery('.wlc_count').css('display','none');
						tinymce.activeEditor.setContent('');        
					}  
				}
			});
		}
	});
	tinymce.PluginManager.add('Editorchangecase', tinymce.plugins.Editorchangecase);
})();

//setting tooltip hover



//setting button


jQuery('#btn_submit_txtc').click(function(e){
	jQuery("#txtcc_overlay").fadeIn(300);
	e.preventDefault();
	var security_nonce = txtcc_vars.ajax_public_nonce;
	var form = jQuery('#form_txtcc_set').serialize();
	jQuery.ajax({
		type:"POST",
		global:"false",
		datatype:"json",
		url:txtcc_vars.ajaxurl,
		data:{form_data:form,security_nonce:security_nonce,action:'txtcc_save_option'},
		success: function(response){
			Swal.fire({
				position: 'center',
				icon: 'success',
				title: 'Your work has been saved',
				showConfirmButton: false,
				timer:3000
			});
		}
	}).done(function() {
		setTimeout(function(){
			jQuery("#txtcc_overlay").fadeOut(300);
		},500);
	});	  
});

// all button setting
jQuery('#cmn_setchk_d').click(function(){
	jQuery('.chk_cmn_set').each(function(){ 
		if(jQuery('#cmn_setchk_d').prop('checked') === true){
			jQuery(this).prop('checked',true);
			jQuery('#hide_chk_count').val(jQuery('.chk_cmn_set').length);
		}else{
			jQuery(this).prop('checked',false);
			jQuery('#hide_chk_count').val(0);
		}
	}); 
});

jQuery('.chk_cmn_set').each(function(){

	jQuery(this).click(function(){
		var a =  jQuery('#hide_chk_count').val();

		if( jQuery(this).prop('checked') === true){
			a++;
			jQuery('#hide_chk_count').val(a);
		}else{
			a--;
			jQuery('#hide_chk_count').val(a);
		}
		if(a == jQuery('.chk_cmn_set').length){
			jQuery('#cmn_setchk_d').prop('checked',true);
		}else{
			jQuery('#cmn_setchk_d').prop('checked',false);
		}
	});
});

// function capitalizeFirstLetter(string) {
// 	return string.charAt(0).toUpperCase() + string.slice(1);
// }

// //capitalize all words of a string. 
function capitalizeWords(string) {
	return string.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
};

// function capitalizeName(name) {
// 	return name.replace(/\b(\w)/g, s => s.toUpperCase());
// }