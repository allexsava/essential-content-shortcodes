editor = '';
(function($) {

	$( document ).ready( function() {

		$( 'body' ).append( '<div id="acidcodes_shortcodes_modal"  class="reveal-modal l_acid_modal">' );

		var modal_selector = $( '#acidcodes_shortcodes_modal' ),
			plugin_url;

        $.ajax( {
			url: ajaxurl,
			data: {action: 'acidcodes_get_shortcodes_modal', post_id: $( '#post_ID' ).val()},
			success: function( data ) {
				content = JSON.parse( data );
				modal_selector.html( content );
				//Variables
				var details = $( '.details_container .details_content' );
				var modal_title = $( '.l_acid_modal .l_modal_title' );
				var default_title = modal_title.html();
				var triggered_woman = '';

				// fix on close
				$( document ).on( 'reveal:close', '#acidcodes_shortcodes_modal', function() {
//					disable_details(); //we will do this before the open click
					clean_details();
//					$('.l_modal_header button .back').hide(); //we will show it on the open click
					toggle_submit_btn();
					change_title( default_title );
					window.send_to_editor = window.send_to_editor_clone;
					$( '.l_acid_modal .btn_primary' ).removeClass( 'disabled' );
					var this_btn = $( '.btn.acidcode__btn--back' );
					this_btn.removeClass( 'active' );
					$('body').removeClass('acidcodes_select_tags_opened');
				} );

				//Back Button Click
				$( document ).on( 'click', '.l_modal_header button.acidcode__btn--back', function() {
					toggle_details();
					toggle_back_btn();
					toggle_submit_btn();
					change_title( default_title );
					clean_details();
				} );

				//Choose an item
				$( document ).on( 'click', '.l_three_col li.shortcode a.details', function() {

					if ( $( this ).hasClass( 'insert-direct-shortcode' ) ) {
						return false;
					}
					// get the current selection and set it as content
					var current_editor = get_current_editor_selected_content(),
						content_field = $( this ).next().find( '.is_shortcode_content' );

					if ( content_field.attr( 'type' ) === 'text' ) {
						content_field.attr( 'value', current_editor.selection.getContent() );
					} else if ( content_field.attr( 'type' ) === 'textarea' && current_editor.selection.getContent().length > 0 ) {
						content_field.text( current_editor.selection.getContent() );
					}

					var html_container = $( this ).next().html(),
						item_title = $( this ).find( '.title' ).html();

					fill_details( html_container );
					toggle_details();
					toggle_back_btn();
					toggle_submit_btn();
					change_title( '<span>Insert</span> ' + item_title + ' <span>Shortcode:</span>' );

					triggered_woman = details.find( 'button[type="submit"]' );

					details.trigger( $( this ).data( 'trigger-open' ) );

					/*
					 * Each colorpicker needs to be processed.
					 * Until wordpress will give us an update method on wpcolorpicker i'll keep removing and adding elements like in high school.
					 */
					$( '.acidcodes-colorpicker' ).each( function() {
						// if the colorpicker is already called is probably ruined already. We will remove it and create another one.
						if ( $( this ).hasClass( 'wp-color-picker' ) ) {

							var $root = $( this ).parents( '.wp-picker-container' ), // get the root of the colorpicker
								this_el = $( this ).removeClass( 'wp-color-picker' ).detach(); // save our element
							var this_span = $root.parent( 'span' );
							$root.remove(); // remove the root
							this_span.append( this_el ); // get back our element
							// create the colorpicker ... again
							this_span.children( '.acidcodes-colorpicker' ).wpColorPicker( {
								palettes: ['#46bcb7', '#fafafa', '#373737', '#01a279', '#45d59c', '#7abd58'],
								change: function( event, ui ) {
									$( '.full_width_bg' ).addClass( 's-visible' );
								}
							} );

						} else {
							$( this ).wpColorPicker( {
								palettes: ['#46bcb7', '#fafafa', '#373737', '#01a279', '#45d59c', '#7abd58'],
								change: function( event, ui ) {
									$( '.full_width_bg' ).addClass( 's-visible' );
								}
							} );
						}
					} );

					// $( '.details_container .input-tags select' ).each( function() {
                    //
					// 	var options = $( this ).data( 'options' );
					// 	if ( $( this ).hasClass( 'select2-offscreen' ) ) {
					// 		$( this ).select2( "destroy" );
					// 		$( this ).select2( {tags: options} );
					// 	} else {
					// 		$( this ).select2( {tags: options} );
					// 	}
					// } );


					//button element
					function wavesEffect(){
                        $('.button_effect select').on('change', function(){
                            if($(this).val() === 'waves-effect'){
                                $('.acidcode__waves-color').removeClass('hidden');
                            } else {
                                $('.acidcode__waves-color').addClass('hidden');
							}
                        });
					}

                    function resetForm(){
                       $('.acidcode__btn.cancel').on('click', function(){
                       	$('#acidcodes_shortcodes_form')[0].reset();
                       	$('#acidcodes_shortcodes_form').validate().destroy();
                       	$('.select-wrapper ul li').removeClass('active');
                       	$('#acidcodes_shortcodes_form .acid_media_uploader').hide();
                       	$('.acidcode__waves-color').addClass('hidden');
                       	$('.acid_icon_list .icon-container ul li').removeClass('hidden');

					   });
                    }


					function disableInsertOnSettings(){
                        var data_params = $('#data_params');
                        var params_json = data_params.data('params');
                        if(params_json.code === 'settings'){
                            $('.acidcode__insert-button #insert-button').addClass('disabled');
                        } else {
                            $('.acidcode__insert-button #insert-button').removeClass('disabled');
                        }

					}

                    function numberOfImages(){
						var verify = $('#data_params').data('params').code;

                        if(verify === 'slider'){
                            $('#acidcodes_shortcodes_form .acid_media_uploader').hide();
                            $('#acidcodes_shortcodes_form select[name="number"]').on('change', function(){
                                $('#acidcodes_shortcodes_form .acid_media_uploader').hide();
                                $('#acidcodes_shortcodes_form .acid_media_uploader:lt('+$(this).val()+')').show();
                            });
						} else {
                            $('#acidcodes_shortcodes_form .acid_media_uploader').show();
						}

                    }

                    function textTooltip(){
						$('#acidcodes_shortcodes_form input, #acidcodes_shortcodes_form label').each(function(i,v){
							if($(this).data('text-tooltip') === 'is_text'){
								var referenceId = $(this).data('tooltip-id');
								$('#'+referenceId).addClass('text-tooltip');
							}
						});
					}


					function iconKeyup(){
                        $('.icon-container').each(function(i,v){
                        	var _this = this;
							var _i = i;

                            $("#acidcode__search-id").on("keyup", function() {
                            var searchVal = $(this).val();
                            var filterItems = $(_this).find('ul li');

                            if ( searchVal !== '' ) {
                                filterItems.addClass('hidden');
                                $('[data-icon*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
                            } else {
                                filterItems.removeClass('hidden');
                            }

                            });
                        });
					}



					// function formChangeEvent(){
                     //    $('.acidcode__insert-button #insert-button').addClass('disabled');
                     //    var data_params = $('#data_params');
                     //    var params_json = data_params.data('params');
                     //    if(params_json.code !== 'settings'){
                    //
                     //        $('#acidcodes_shortcodes_form').on('keyup change paste', 'input, select, textarea', function(){
                    //
                     //            $('.acidcode__insert-button #insert-button').removeClass('disabled');
                     //        })
                     //    }
					// }

					function tooltip(){
                        // var data_select_id = $('select.initialized').data('select-id');
                        // console.log(data_select_id);
                        //
                        // $('select.initialized').each(function(i,v){
                        // var data_select_id = $(this).data('select-id');
                        // var data_tooltip = $(this).data('tooltip');
                        //
                        // $('#select-options-'+data_select_id).parent('.select-wrapper').attr('data-tooltip',data_tooltip);
                        // $('#select-options-'+data_select_id).parent('.select-wrapper').addClass('tooltipped');
                        // $(this).removeClass('tooltipped');
                        // $(this).removeAttr('data-tooltip');
                        // });
                        //
                        //
                        // $('.dropdown-content.select-dropdown li').on('mouseenter',function(){
                        // console.log($(this).find('span').text());
                        // });

						$('select.initialized').each(function(i,v){

                            var _this = this;
								data_select_id = $(this).data('select-id'),
								data_active_tooltip = $(this).data('active-tooltip'),
								data_param_key = $(this).attr('name'),
								data_gifs_loc = $(this).data('gifs-loc'),
								data_tooltip_pos = $(this).data('tooltip-position');

                            	if(data_active_tooltip){
                                    $('#select-options-'+data_select_id+'>li').not(':first-child').each(function(i,v){

                                    	if($(this).find('span').text().indexOf('No effect') !== -1){
                                    		return;
                                    	} else{
                                            var img_size = $(this).find('span').text().toLowerCase();
                                            var img = data_gifs_loc+'select-'+data_param_key+'/'+img_size+'.gif';
                                            //console.log(img);
                                            $(this).addClass('tooltipped');
                                            $(this).attr('data-tooltip', '<img src="'+img+'"/>');
                                            $(this).tooltip({
                                                position: data_tooltip_pos,
                                                delay: 50,
                                                html: true,
                                            });
										}

                                    	});

                                    // $('#select-options-'+data_select_id+'>li').on('mouseenter', function(){
                                    //     //console.log($(this).find('span').text());
                                    // })


								}
                        });

						//Add tooltip to input type checkbox
                        data_gifs_loc = $('label.tooltipped__input').data('gifs-loc')
						$('label.tooltipped__input').attr('data-tooltip', '<img src="'+data_gifs_loc+'"/>');

                        data_gifs_loc_parallax = $('.media_image_holder.tooltipped__input').data('gifs-loc')
                        $('.media_image_holder.tooltipped__input').attr('data-tooltip', '<img src="'+data_gifs_loc_parallax+'"/>');

                        $('.tooltipped__input-text').tooltip({
                            delay: 50,
							tooltip: "Carousel autoplay"
						});

					}

					wavesEffect();
					resetForm();
                    disableInsertOnSettings();
                    numberOfImages();
                    tooltip();

                    $('.tooltipped__input').tooltip({
						delay: 100,
                        html: true
					});

                    textTooltip();
                    iconKeyup();
                } );


				//Trigger Submit Button (need few improvemen ts :)
				$( document ).on( 'click', ".l_acid_modal a.btn_primary", function() {
                    if($("#acidcodes_shortcodes_form").valid()){
                        trigger_submit_btn( triggered_woman );
					} else {
                        $("#acidcodes_shortcodes_form").addClass('invalid');
					}
				} );

				//Display Settings Section
                $( document ).on( 'click', '.l_modal_footer.row div.col.s6 a.btn_settings', function() {
                    $( '.l_acid_modal' ).removeClass( 's_active' );
                    $( '.details_content' ).removeClass( 'active' );

                    $( 'button.acidcode__btn--back' ).removeClass( 'active' );
                    $( '.shortcode_settings .details.shortcode_Settings_open' ).click();

				} );

				//Show the .details_container - display:block
				var toggle_details = function() {
					$( '.l_acid_modal' ).toggleClass( 's_active' );
				};

				//Show the .details_container - display:block
				var disable_details = function() {
					$( '.l_acid_modal' ).removeClass( 's_active' );
				};

				//Add html content from chosen shortcode into $details container
				var fill_details = function( $content ) {
					clean_details();
					details.html( $content ).addClass( 'active' );

                    //reInitialize materialize select
                    $(details).find('.input-field select:not(".initialized")').material_select();

                };


                //Tabs Init
                // $(document).ready(function(){
                 //    $('ul.tabs').tabs();
                // });

				//TextArea
                $('#content').trigger('autoresize');
                $('#content_text').trigger('autoresize');


				//Change modal title
				var change_title = function( $title ) {
					modal_title.html( $title );
				};

				//Empty details content
				var clean_details = function() {
					details.html( '' ).removeClass( 'active' );
				};

                //Toggle Back button visibility
                var toggle_back_btn = function() {
                    $( 'button.acidcode__btn--back' ).toggleClass( 'active' );
                    $('.acid_icon_list .icon-container ul li').removeClass('hidden');
                };

                //Toggle Submit button
				var toggle_submit_btn = function() {
					$( '.l_acid_modal .btn_primary' ).toggleClass( 'disabled' );
				};

                // FUNCTION FOR ENABLE/DISABLE INSERT BUTTON

                var inputSelector = ':input[required]:visible';
                function checkForm() {
                    // here, "this" is an input element
                    var isValidForm = true;
                    $(this.form).find(inputSelector).each(function() {
                        if (!this.value.trim()) {
                            isValidForm = false;
                        }
                    });
                    $(this.form).find('.acidcode__btn.btn_primary').prop('disabled', !isValidForm);
                    return isValidForm;
                }

                // ENABLE/DISABLE INSERT BUTTON

                $('.acidcode__btn.btn_primary').closest('form')
                // in a user hacked to remove "disabled" attribute, also monitor the submit event
                    .submit(function() {
                        // launch checkForm for the first encountered input,
                        // use its return value to prevent default if form is not valid
                        return checkForm.apply($(this).find(':input')[0]);
                    })
                    .find(inputSelector).keyup(checkForm).keyup();

				//Trigger Submit button
				var trigger_submit_btn = function( $button ) {
					$button.trigger( 'click' );

				};

				$( document ).trigger( 'shortcodes_modal:ready' );

			} // end of ajax success
		} );

		tinymce.create( 'tinymce.plugins.acidcodes', {
			init: function( ed, url ) {
				plugin_url = url;
				ed.addButton( 'acidcodes', {
					title: 'Add a shortcode',
					// text : 'AcidCodes',
					classes: 'btn acidcodes_shortcodes',
					onclick: function() {
						$( '.l_acid_modal .btn_primary' ).addClass( 'disabled' );
						$( 'body' ).addClass( 'acidcodes_select_tags_opened' );
						//let's clean up some more first
						$( '.l_acid_modal' ).removeClass( 's_active' );
                        $( 'button.acidcode__btn--back' ).removeClass( 'active' );

						modal_selector.reveal( {
							animation: 'fadeAndPop',                   //fade, fadeAndPop, none
							animationspeed: 400,                       //how fast animtions are
							closeonbackgroundclick: true,              //if you click background will modal close?
							dismissmodalclass: 'close'    //the class of a button or element that will close an open modal
						} );
						editor = ed;
						get_current_editor_selected_content = function() {

							return editor;
						};

						window.send_to_editor_clone = window.send_to_editor;
					}
				} );
			}
		} );
		tinymce.PluginManager.add( 'acidcodes', tinymce.plugins.acidcodes );


		// if the shortcode doesn't have params it needs to be inserted directly
		modal_selector.on( 'click', '.insert-direct-shortcode', function() {

			var params = $( this ).data( 'params' );
			if ( params.self_closed ) {
				editor.selection.setContent( '[' + params.code + ']' );
			} else {
				editor.selection.setContent( '<p>[' + params.code + ' ]</p><p>' + editor.selection.getContent() + '</p><p>[/' + params.code + ']</p>' );
			}
			// close the modal whenever a shortcode is inserted
			modal_selector.trigger( 'reveal:close' );
		} );

        // when submiting a panel of params
		$( document ).on( 'submit', '#acidcodes_shortcodes_form', function( e ) {
			e.preventDefault();
            var params = $( this ).next( '#data_params' ).data( 'params' ),
				form_params = $( this ).serializeShortcodeParams(),
				user_params_string = '',
				user_params = {},
				shortcode_content = '';

			$.each( form_params, function( i, e ) {
				//if ( e.class == 'is_shortcode_content valid' ) {
                if (e.class && e.class.indexOf("is_shortcode_content")!== -1) {
                //if ( e.class == 'is_shortcode_content' ) {
					shortcode_content = e.value;

				} else if ( e.value !== '' ) { // don't include the empty params and the content param
					user_params_string += ' ' + e.name + '="' + e.value + '"';
					user_params[e.name] = e.value;
				}

			} );
			//a little bit of cleanup to make sure we keep new lines when adding to TinyMce
			shortcode_content = shortcode_content.replace( /(?:\r\n|\r|\n)/g, "<br />" );
			if ( params.self_closed ) {
				editor.selection.setContent( '[' + params.code + user_params_string + ']' );
			} else if ( params.one_line ) {
				editor.selection.setContent( '[' + params.code + user_params_string + ']' + shortcode_content + '[/' + params.code + ']' );
			} else {
				editor.selection.setContent( '<p>[' + params.code + user_params_string + ']</p><p>' + shortcode_content + '</p><p>[/' + params.code + ']</p>' );
			}

			// ensure the editor is on visual
			switchEditors.go( editor.id, 'tmce' );

			modal_selector.trigger( 'reveal:close' );
		} ); // end of submit form

			var urls = '';

		$( document ).on( 'click', '.media_image_holder', function() {
			var $self = $( this );

			tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
			formfield = $( '#upload_image' ).attr( 'name' );

			window.send_to_editor = function( html ) {
				imgurl = $( 'img', html ).attr( 'src' );
				$self.find( '.media_image_input' ).val( imgurl );
				$self.find( '.upload_preview' ).attr( 'src', imgurl ).show().next().toggleClass( 'active' );
				urls += imgurl+',';
				//var imagesJson = JSON.stringify(arr);
				$('#url').val(urls);
				tb_remove();
			};

			return false;
		} );

	} );

	$.fn.serializeShortcodeParams = function() {
		var return_els = {},
			elements = $( this ).find( '[name]' );

		$.each( elements, function( i, el ) {
			return_els[i] = {};
			return_els[i].name = this.name;

			if ( $( this ).attr( 'type' ) === 'checkbox' ) {

				if ( $( this ).is( ':checked' ) ) {
					return_els[i].value = 'on';
				} else {
					return_els[i].value = ''; // keep it empty to not show in params string
				}

			} else {
				return_els[i].value = $( this ).val();
			}

			// init the class as false
			return_els[i].class = false;
			if ( $( this ).attr( 'class' ) ) return_els[i].class = $( this ).attr( 'class' );

			// init type as text
			return_els[i].type = 'text';
			if ( $( this ).attr( 'type' ) ) return_els[i].type = $( this ).attr( 'type' );
		} );

		return return_els;
	};

	/*
	 * jQuery Reveal Plugin 1.0
	 * www.ZURB.com
	 * Copyright 2010, ZURB
	 * Free to use under the MIT license.
	 * http://www.opensource.org/licenses/mit-license.php
	 */
	$.fn.reveal=function(e){var t={animation:"fadeAndPop",animationspeed:300,closeonbackgroundclick:true,dismissmodalclass:"close-reveal-modal"};var e=$.extend({},t,e);return this.each(function(){function u(){i=false}function a(){i=true}var t=$(this),n=parseInt(t.css("top")),r=t.height()+n,i=false,s=$(".reveal-modal-bg");if(s.length==0){s=$('<div class="reveal-modal-bg" />').insertAfter(t)}t.bind("reveal:open",function(){s.unbind("click.modalEvent");$("."+e.dismissmodalclass).unbind("click.modalEvent");if(!i){a();if(e.animation=="fadeAndPop"){t.css({top:$(document).scrollTop()-r,opacity:0,visibility:"visible"});s.fadeIn(e.animationspeed/2);t.delay(e.animationspeed/2).animate({top:$(document).scrollTop()+n+"px",opacity:1},e.animationspeed,u())}if(e.animation=="fade"){t.css({opacity:0,visibility:"visible",top:$(document).scrollTop()+n});s.fadeIn(e.animationspeed/2);t.delay(e.animationspeed/2).animate({opacity:1},e.animationspeed,u())}if(e.animation=="none"){t.css({visibility:"visible",top:$(document).scrollTop()+n});s.css({display:"block"});u()}}t.unbind("reveal:open")});t.bind("reveal:close",function(){if(!i){a();if(e.animation=="fadeAndPop"){s.delay(e.animationspeed).fadeOut(e.animationspeed);t.animate({top:$(document).scrollTop()-r+"px",opacity:0},e.animationspeed/2,function(){t.css({top:n,opacity:1,visibility:"hidden"});u()})}if(e.animation=="fade"){s.delay(e.animationspeed).fadeOut(e.animationspeed);t.animate({opacity:0},e.animationspeed,function(){t.css({opacity:1,visibility:"hidden",top:n});u()})}if(e.animation=="none"){t.css({visibility:"hidden",top:n});s.css({display:"none"})}}t.unbind("reveal:close")});t.trigger("reveal:open");var o=$("."+e.dismissmodalclass).bind("click.modalEvent",function(){t.trigger("reveal:close")});if(e.closeonbackgroundclick){s.css({cursor:"pointer"});s.bind("click.modalEvent",function(){t.trigger("reveal:close")})}$("body").keyup(function(e){if(e.which===27){t.trigger("reveal:close")}})})}

})(jQuery);