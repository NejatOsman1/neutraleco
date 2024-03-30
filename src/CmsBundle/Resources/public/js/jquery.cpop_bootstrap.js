var cpop;
var cpopdropbox;

(function ( $ ) {

	var settings = {};
	var main_ct = null, cpop_el = null, dialog_el = null, form_el = null, form_inner = null, cpop_ct = null, cpop_ft = null, cpop_hdr = null, cpop_bg = null, need_fixed = false, medium_popup = false, large_popup = false;

	// Miscallenous
	var ajaxurl, defaultFtBtns, img, imgTimer;

	var vp = { w: 0, h: 0 };
	var handleFooter = true;

	var callback_function;
	var close_callback;
	var callback_after_post = false;

	$.fn.cpop = function( options ){
		settings  = $.extend( {}, $.fn.cpop.defaults, options );
		main_ct = this;

		this.getContentEl = function(){
			return cpop_ct;
		}

		cpop_hdr = $('<div class="modal-header"><h5>...</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>');

		/**
		 * Load popup with HTML contents
		 */
		this.loadHtml = function( html, disablePadding ){
			this.init();

			if(typeof disablePadding == 'undefined' || disablePadding === false){
				cpop_ct.removeClass('no-pad');
			}else{
				cpop_ct.addClass('no-pad');
			}

			cpop_ct.html( html );
			cpop_ct.find( '.hide-in-popup' ).remove();
			this.analyzeContent();
			this.setFooter();
			if( typeof callback_function == 'function' && callback_after_post == false ){
				callback_function( cpop_el, html );
			}

			cpop_ct.find('a.popup').click(function(e){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				console.log('large', large_popup);
				if($(this).hasClass('no-pad')){
					cpop.loadAjax($(this).attr('href'), null, null, null, true);
				}else{
					cpop.loadAjax($(this).attr('href'), null, null, null, true);
				}
			});

			cpop_ct.find('a.popup-pad').click(function(e){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				console.log('large', large_popup);
				if($(this).hasClass('no-pad')){
					cpop.loadAjax($(this).attr('href'));
				}else{
					cpop.loadAjax($(this).attr('href'));
				}
			});

			cpop_ft.find('a.popup').click(function(e){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				console.log('large', large_popup);
				if($(this).hasClass('no-pad')){
					cpop.loadAjax($(this).attr('href'), null, null, null, true);
				}else{
					cpop.loadAjax($(this).attr('href'), null, null, null, true);
				}
			});

			cpop_ft.find('a.popup-pad').click(function(e){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				console.log('large', large_popup);
				if($(this).hasClass('no-pad')){
					cpop.loadAjax($(this).attr('href'));
				}else{
					cpop.loadAjax($(this).attr('href'));
				}
			});


			// cpop_ft.find( '#cpop-btn-close' ).removeClass('btn').addClass('btn-flat');
			cpop_el.css('z-index', 100000);
			cpop_el.modal('show');

			// Initialize optional datepickers
			if(cpop_ct.find('.datepicker').length > 0){
				cpop_ct.find('.datepicker').pickadate({
					selectMonths: true,
					selectYears: 15,
					today: (typeof cpop_message_today != 'undefined' ? cpop_message_today : 'Vandaag'),
					clear: (typeof cpop_message_clear != 'undefined' ? cpop_message_clear : 'Wissen'),
					close: (typeof cpop_message_done != 'undefined' ? cpop_message_done : 'Sluiten'),
					format: 'dd-mm-yyyy',
					formatSubmit: 'yyyy-mm-dd',
					hiddenName: true,
					closeOnSelect: true
				});
			}
			if(cpop_ct.find('.timepicker').length > 0){
				cpop_ct.find('.timepicker').pickatime({
					default: 'now', // Set default time: 'now', '1:30AM', '16:30'
					fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
					twelvehour: false, // Use AM/PM or 24-hour format
					donetext: (typeof cpop_message_done != 'undefined' ? cpop_message_done : 'Sluiten'), // text for done-button
					cleartext: (typeof cpop_message_clear != 'undefined' ? cpop_message_clear : 'Wissen'), // text for clear-button
					canceltext: (typeof cpop_message_cancel != 'undefined' ? cpop_message_cancel : 'Sluiten'), // Text for cancel-button
					autoclose: true, // automatic close timepicker
					ampmclickable: false, // make AM PM clickable
					aftershow: function(){} //Function for after opening timepicker
				});
			}
		}

		this.fixed = function(bo){
			need_fixed = bo;
			return this;
		}

		this.large = function(){
			medium_popup = false;
			large_popup = true;
			return this;
		}

		this.medium = function(){
			medium_popup = true;
			large_popup = false;
			return this;
		}

		this.reset = function(){
			medium_popup = false;
			large_popup = false;
			return this;
		}

		/**
		 * Set form element
		 */
		this.setForm = function( formEl ){
			form_el = formEl;
		}

		/**
		 * Load popup with HTML contents
		 */
		this.loadAjax = function( url, callback_func, hideLoader, callbackAfterPost, nopadding ){
			var hideLoader = ( typeof( hideLoader ) != 'undefined' ? hideLoader : false );
			var nopadding = ( typeof( nopadding ) != 'undefined' ? nopadding : false );
			var callbackAfterPost = ( typeof( callbackAfterPost ) != 'undefined' ? callbackAfterPost : false );
			callback_after_post = callbackAfterPost;
			callback_function = callback_func;
			ajaxurl = url;

			if( hideLoader === false || hideLoader === null ) this.loadHtml( '<div style="text-align:center;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>' + (typeof cpop_message_busyloading != 'undefined' ? cpop_message_busyloading : 'Bezig met laden...') + '</div>' );

			$.ajax( ajaxurl ).done( function( html ){
				if( html.substring(0,6) == 'ERROR:' ){
					alert( html.replace( 'ERROR:', '' ) );
				}else{
					this.loadHtml( html, nopadding );
				}

			}.bind( this ) );
		}

		/**
		 * Load popup with JSON support
		 */
		this.loadJson = function( url, callback_func, hideLoader ){
			var hideLoader = ( typeof( hideLoader ) != 'undefined' ? hideLoader : false );
			var callbackFunction = callback_func;
			ajaxurl = url;
			if( hideLoader === false ) this.loadHtml( '<div style="text-align:center;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>' + (typeof cpop_message_busyloading != 'undefined' ? cpop_message_busyloading : 'Bezig met laden...') + '</div>' );

			$.getJSON( ajaxurl ).done( function( json ){

				// this.loadHtml( html, callbackFunction );
				this.loadHtml( callbackFunction( json ) );

			}.bind( this ) );
		}

		/**
		 * Post to popup with ajax
		 */
		this.postAjax = function(custom_ajaxurl, post_data){

			if(typeof post_data == 'undefined'){
				post_data = form_el.serialize();
			}
			if(typeof custom_ajaxurl != 'undefined'){
				ajaxurl = custom_ajaxurl;
			}

			var callbackFunc = (callback_after_post == true && typeof callback_function == 'function' ? callback_function : null);
			$.post( ajaxurl, post_data, function( data ){
				if( typeof callback_func != 'function' ){
					this.loadHtml( data );

					if( cpop_ct.find( '#flashUpload' ).length ){
						var cpopdropbox = cpop_ct.find( '#flashUpload' ).parent().find( 'button' );
						cpopdropbox.filedrop({
							paramname:'Filedata',
							maxfiles: 1,
							fallback_id: 'manual-file',
							maxfilesize: 5, // 5MB
							data:{
								userid: $( '#userid' ).val()
							},
							url: '/upload.php',
							uploadFinished:function(i,file,response,time){
								if( response == 'ok' ){
									if( $( '#upload_complete' ).length ) cpop.loadAjax( $( '#upload_complete' ).val() );
								}else{
									alert( (typeof cpop_message_alert_notcsv != 'undefined' ? cpop_message_alert_notcsv : 'Geen CSV') );
								}
							}/*,
							beforeEach: function(i, file){
								if( typeof file != 'undefined' && typeof file.type != 'undefined' ){
									if(!file.type.match(/^image\//)){
										return false;
									}
								}
							}*//*,
							uploadStarted:function(i, file, len){
							}*/
						});

					}
				}else{
					callbackFunc( data );
				}
			}.bind( this ), "html" );
		}

		this.confirm = function( message, onOk, okText, onDecline, declineText ){

			if(typeof onDecline == 'undefined'){
				onDecline = null;
			}

			var okText = ( typeof( okText ) != 'undefined' ? okText : (typeof cpop_message_yes != 'undefined' ? cpop_message_yes : 'Ja') );
			this.loadHtml( message );
			if(onDecline){
				cpop_ft.append( $( '<button class="primary btn red" type="button" id="cpop-btn-decline">' + declineText + '</button>' ) );
			}
			cpop_ft.append( $( '<button class="primary btn" type="button" id="cpop-btn-ok">' + okText + '</button>' ) );
			if(onDecline){
				$( '#cpop-btn-decline' ).on('click touchstart', function( e ){ onDecline( $( this ) ); } );
			}
			$( '#cpop-btn-ok' ).on('click touchstart', function( e ){ onOk( $( this ) ); } );
			cpop_el.addClass('cpop-confirm');
		}

		this.reload = function(){
			this.loadAjax( ajaxurl );
		}

		this.fullscreen = function( margin_top, margin_right, margin_bottom, margin_left ){
			settings.fullscreen.enabled       = true;
			settings.fullscreen.margin.top    = parseInt( margin_top );
			settings.fullscreen.margin.right  = parseInt( margin_right );
			settings.fullscreen.margin.bottom = parseInt( margin_bottom );
			settings.fullscreen.margin.left   = parseInt( margin_left );
		}

		this.set = function( key, value ){
			settings[ key ] = value;
		}





		this.colorPicker = function( targetEl, markupEl, markupMethod ){
			var targetEl = (targetEl != null ? $( targetEl ) : null);
			this.targetEl = targetEl;
			var markupEl = ( typeof( markupEl ) != 'undefined' ? $( markupEl ) : null );
			this.markupEl = markupEl;
			var markupMethod = ( typeof( markupMethod ) != 'undefined' ? markupMethod : 'background-color' );
			this.markupMethod = markupMethod;

			this.init();

			var color = '#ffffff';
			var isFormEl = false;
			if(targetEl){
				if( targetEl[0].tagName.toLowerCase() == 'button' || targetEl[0].tagName.toLowerCase() == 'input' ){
					isFormEl = true;
					if( /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test( targetEl.val() ) ){
						color = targetEl.val();
					}
				}
			}

			this.defaultColor = color;

			colorInput = $( '<input id="color-preview" type="text" style="background:' + color + ';color:black;" value="' + color + '" />' );
			cpop_ct.append( colorInput );
			colorInput.minicolors({
				inline: true,
				control: 'hue', // hue, brightness, saturation, and wheel
				defaultValue: color,
				opacity: false,
				change: function( hex, opacity ){
					if(targetEl){
						if( isFormEl ){
							targetEl.val( hex );
						}else{
							targetEl.html( hex );
						}
					}

					if( markupEl != null ){
						markupEl.css( markupMethod, hex );
						// markupEl.colourBrightness();
					}

					$( '#color-preview' ).html( 'Voorbeeld' ).css( 'background', hex );
				}.bind( this )
			});

			$( '#color-preview' ).css( 'width', parseInt( $( '.minicolors-panel' ).width() ) + 'px' );

			cpop_ft.append( $( '<button onclick="cpop.clearColor()" type="button" class="btn btn-flat" id="cpop-btn-empty">' + (typeof cpop_message_empty != 'undefined' ? cpop_message_empty : 'Leeg') + '</button>' ) );
			cpop_ft.append( $( '<div class="left"><button onclick="cpop.revertColor();cpop.close();" type="button" class="btn-flat" id="cpop-btn-default">' + (typeof cpop_message_cancel != 'undefined' ? cpop_message_cancel : 'Sluiten') + '</button></div>' ) );

			this.setFooter();

			cpop_ft.find( '#cpop-btn-close' ).css('float','none').html( (typeof cpop_save != 'undefined' ? cpop_save : 'Opslaan') );
			cpop_ft.find( '#cpop-btn-close' ).removeClass('btn');

			cpop_el.modal('show');
		}



		this.invertColor = function(hexTripletColor) {
		    var color = hexTripletColor;
		    color = color.substring(1);           // remove #
		    color = parseInt(color, 16);          // convert to integer
		    color = 0xFFFFFF ^ color;             // invert three bytes
		    color = color.toString(16);           // convert to hex
		    color = ("000000" + color).slice(-6); // pad with leading zeros
		    color = "#" + color;                  // prepend #
		    return color;
		}


		this.clearColor = function(){
			this.targetEl

			var isFormEl = false;
			if( this.targetEl[0].tagName.toLowerCase() == 'button' || this.targetEl[0].tagName.toLowerCase() == 'input' ){
				isFormEl = true;
			}

			if( isFormEl ){
				this.targetEl.val( '' );
			}else{
				this.targetEl.html( '' );
			}

			if( this.markupEl != null ){
				this.markupEl.css( this.markupMethod, '' );
				// this.markupEl.colourBrightness();
			}

			cpop.close();
		}


		this.revertColor = function(){

			this.targetEl

			var isFormEl = false;

			if(this.targetEl){
				if( this.targetEl[0].tagName.toLowerCase() == 'button' || this.targetEl[0].tagName.toLowerCase() == 'input' ){
					isFormEl = true;
				}

				if( isFormEl ){
					this.targetEl.val( this.defaultColor );
				}else{
					this.targetEl.html( this.defaultColor );
				}
			}

			if( this.markupEl != null ){
				this.markupEl.css( this.markupMethod, this.defaultColor );
				// this.markupEl.colourBrightness();
			}

			this.close();
		}




		this.loadImage = function( url, width ){
			var width = ( typeof( width ) != 'undefined' ? parseInt( width ) : '' );
			this.loadHtml( '<div style="text-align:center;"><div class="spinner"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>' + (typeof cpop_message_busyloading != 'undefined' ? cpop_message_busyloading : 'Bezig met laden') + '</div>' );
			imgTimer = 0;
			img = new Image();
			img.src = url;
			img_url = url;
			this.preloadImage( width )
		},

		this.preloadImage = function( width ){
			if( img.width > 0 ){
				// this.loadHtml( '<img src="' + img_url + '" ' + ( width > 0 ? 'style="width: ' + width + 'px;"' : '' ) + ' alt="' + img_url + '" />' );
				this.loadHtml( '<div style="background-image:url(' + img_url + ');height:100%;background-size:cover;background-position:center center;">', true );
			}else{
				imgTimer += settings.imageTimeStep;
				if( imgTimer < settings.imageTimeout ){
					timer = setTimeout( function(){ this.preloadImage( width ); }.bind( this ) , settings.imageTimeStep );
				}else{
					this.loadHtml( '<div style="text-align:center;">' + (typeof cpop_message_imagenotloading != 'undefined' ? cpop_message_imagenotloading : 'TEKST') + '<br/><br/>' + (typeof cpop_message_timeout != 'undefined' ? cpop_message_timeout : 'TEKST') + ' ' + settings.imageTimeout + ' ms.</div>' );
				}
			}
		},



















		this.analyzeContent = function(){
			if(cpop_ct.find( 'form' ).length > 0){
				$.each(cpop_ct.find( 'form' ), function(ind, el){
					if($(el).hasClass('cpop-keep')){
						$(el).detach().insertAfter(form_el);
					}else{
						$(el).replaceWith($('<div id="was-form">' + $(el).html() + '</div>'));
					}
				});
			}

			var doSubmit = true;
			if(cpop_ct.find('.no-submit,#no-submit').length > 0){
				doSubmit = false;
			}

			// if( cpop_ct.find( 'form' ).length || form_el != null ){
				// if( cpop_ct.find('.hard-submit').length > 0 ){

				// }else{
					form_el.off(); // Clear events
					form_el.prop('action', ajaxurl);
					form_el.on( 'submit', function( e ){
						e.preventDefault();
						if(doSubmit){
						if( cpop_ct.find('.hard-submit').length > 0 ){
							form_el[0].submit();
						}else{
							this.postAjax();
						}
						}else{
							console.log('Popup disabled submit');
						}
					}.bind( this ) );
				// }

				handleFooter = true;

				// Find predefined header
				if( cpop_ct.find( '.popup-title' ).length > 0 ){
					cpop_hdr.html('<h5 class="modal-title">' + cpop_ct.find( '.popup-title' ).html() + '</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>').show();
					cpop_ct.find( '.popup-title' ).remove();
				}else{
					cpop_hdr.html('<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>').show();
				}

				// Find predefined footer
				if( cpop_ct.find( '#popup_footer' ).length > 0 ){
					var pdfooter = cpop_ct.find( '#popup_footer' );
					cpop_ft.html( pdfooter.html() );
					pdfooter.remove();
					handleFooter = false;
				}else{

					// Find buttons
					$.each( form_el.find( 'button.cp_btn,button[type="submit"],button[type="reset"],input[type="submit"],input[type="reset"]' ), function( ind, btn ){
						if($(btn).hasClass('ignore') == false){
							var btnLbl = settings.buttonLabel[ $( btn ).attr( 'type' ) ];
							if( btnLbl == '' || typeof( btnLbl ) == 'undefined' ){
								cpop_ft.append( $( btn ) );
							}
						}
						/*$( btn ).on('click touchstart', function( e ){
							if( $( btn ).attr( 'type' ) == 'submit' ){
								e.preventDefault();

							}
						}.bind( this ) )*/
					}.bind( this ) );
				}
			// }
		}

		this.setFooter = function(){
			if( handleFooter ){
				$.each( settings.buttonLabel, function( key, value ){
					if( value != '' ){
						console.log('DEFAULT BTN');
						cpop_ft.append( $( '<div class="left"><button type="button" class="btn-flat" id="cpop-btn-' + key + '">' + value + '</button></div>' ) );
						$( '#cpop-btn-' + key ).on('click touchstart', function( e ){ settings.buttonAction[key]( this ); } );
					}
				} );
			}
		}

		this.clear = function(){
			$('#cpop-modal .modal-body,#cpop-modal .modal-footer').html('');
		}

		this.close = function(){
			/*$('#cpop-modal').modal({
				complete: function() {
					if(typeof close_callback == 'function'){
						close_callback();

						close_callback = null;
					}
					}
			});*/

			if(typeof close_callback == 'function'){
				close_callback();

				close_callback = null;
			}

			$('#cpop-modal').modal('hide');
			$('body').css('overflow','');
		}

		this.setCloseAction = function(callback){
			close_callback = callback;
			return this;
		}

		this.resetPopupHandlers = function(){
			/*
				Auto detect popup links
			 */
			main_ct.find( 'a.popup' ).on('click touchstart', function( e ){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				if($(this).hasClass('no-pad')){
					cpop.loadAjax($(this).attr('href'), null, null, null, true);
				}else{
					cpop.loadAjax($(this).attr('href'), null, null, null, false);
				}
			} );

			/*
				Auto detect popup forms
			 */
			main_ct.find( 'form.popup' ).on('submit', function( e ){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				if($(this).hasClass('no-pad')){
					cpop.postAjax($(this).attr('action'), $(this).serialize());
				}else{
					cpop.postAjax($(this).attr('action'), $(this).serialize());
				}
			} );

			/*
				Auto detect popup links
			 */
			main_ct.find( 'a.popup-pad' ).on('click touchstart', function( e ){
				e.preventDefault();
				large_popup = $(this).hasClass('large');
				if($(this).hasClass('no-pad')){
					cpop.loadAjax($(this).attr('href'));
				}else{
					cpop.loadAjax($(this).attr('href'));
				}
			} );

			/*
				Auto detect confirmation links
			 */
			main_ct.find( 'a.confirm' ).on('click touchstart', function( e ){
				e.preventDefault();
				var el = $(this);

				if(el.hasClass('no-fixed')){
					cpop.fixed(false);
				}

				cpop.confirm(el.data('msg'), function(){

					// Callback if possible
					if(typeof el.data('callback') != 'undefined'){
						var cb = el.data('callback');
						window[cb]();
					}

					window.location = el.prop('href');
					cpop.close();
				});
			} );
		}

		/**
		 * Initialize popup object
		 */
		this.init = function(){

			/*var vpmeasure = $( '<div id="vpmessure" style="position:fixed;top:0;right:0;left:0;bottom:0;"></div>');
			$( document.body ).append( vpmeasure );
			vp = { w: vpmeasure.width(), h: vpmeasure.height() };

			vpmeasure.remove();*/

			need_fixed = true;

			if( cpop_el == null ){
				cpop_el = $( '<div id="cpop-modal" class="' + (need_fixed ? 'modal-fixed-footer' : '') + ' modal' + ( settings.popupClass != '' ? ' ' + settings.popupClass : '' ) + '"></div>' );
				dialog_el = $('<div class="modal-dialog modal-dialog-centered ' + (large_popup ? 'modal-xl' : (medium_popup ? 'modal-lg' : '')) + '" role="document"></div>');
				form_el = $( '<form id="popup-form-el" class="w-100" enctype="multipart/form-data" method="post"></form>' );
				form_inner = $( '<div class="modal-content"></div>' );
				cpop_ct = $( '<div class="modal-body"></div>' );
				cpop_ft = $( '<div class="modal-footer"></div>' );

				main_ct.append( cpop_el );
				cpop_el.append( dialog_el );
				dialog_el.append( form_el );
				form_el.append( form_inner );
				form_inner.append( cpop_hdr );
				form_inner.append( cpop_ct );
				form_inner.append( cpop_ft );

				cpop_el.modal();
			}else{
				cpop_el.find('.cpop-keep').remove();

				cpop_el.removeClass('cpop-confirm');
				if(!need_fixed){
					if(cpop_el.hasClass('modal-fixed-footer')){
						cpop_el.removeClass('modal-fixed-footer');
					}
				}else{
					if(!cpop_el.hasClass('modal-fixed-footer')){
						cpop_el.addClass('modal-fixed-footer');
					}
				}

				console.log(large_popup);
				console.log(medium_popup);
				
				if(cpop_el.find('.modal-dialog').hasClass('modal-xl') && !large_popup){
					// Remove XL
					console.log('Remove XL');
					cpop_el.find('.modal-dialog').removeClass('modal-xl');
				}else if(!cpop_el.find('.modal-dialog').hasClass('modal-xl') && large_popup){
					// Add XL
					console.log('Add XL');
					cpop_el.find('.modal-dialog').addClass('modal-xl');
				}

				if(cpop_el.find('.modal-dialog').hasClass('modal-lg') && !medium_popup){
					// Remove LG
					console.log('Remove LG');
					cpop_el.find('.modal-dialog').removeClass('modal-lg');
				}else if(!cpop_el.find('.modal-dialog').hasClass('modal-lg') && medium_popup){
					// Add LG
					console.log('Add LG');
					cpop_el.find('.modal-dialog').addClass('modal-lg');
				}
			}

			need_fixed = true;
			this.clear();
		}














































































		this.resetPopupHandlers();

















		return this;
	};

	$.fn.cpop.defaults = {
		popupClass: '',
		imageTimeStep: 200, // Milliseconds
		imageTimeout: 3000, // Milliseconds
		startColor: [120, 120, 120],
		buttonAction: {
    		close: function( el ){
    			cpop.close();
    		}
    	},
    	buttonLabel: {
    		close: 'Close'
    	}
    }

	$( document ).keydown( function( evt ) {
		var e = evt || event;
    	var code = e.keyCode || e.which;
		if( code == 27 ){
			e.preventDefault();
			cpop.close();
		}
	} );

	$.minicolors={defaults:{animationSpeed:50,animationEasing:'swing',change:null,changeDelay:0,control:'hue',dataUris:true,defaultValue:'',hide:null,hideSpeed:100,inline:false,letterCase:'lowercase',opacity:false,position:'bottom left',show:null,showSpeed:100,theme:'default'}};$.extend($.fn,{minicolors:function(method,data){switch(method){case'destroy':$(this).each(function(){destroy($(this))});return $(this);case'hide':hide();return $(this);case'opacity':if(data===undefined){return $(this).attr('data-opacity')}else{$(this).each(function(){updateFromInput($(this).attr('data-opacity',data))})}return $(this);case'rgbObject':return rgbObject($(this),method==='rgbaObject');case'rgbString':case'rgbaString':return rgbString($(this),method==='rgbaString');case'settings':if(data===undefined){return $(this).data('minicolors-settings')}else{$(this).each(function(){var settings=$(this).data('minicolors-settings')||{};destroy($(this));$(this).minicolors($.extend(true,settings,data))})}return $(this);case'show':show($(this).eq(0));return $(this);case'value':if(data===undefined){return $(this).val()}else{$(this).each(function(){updateFromInput($(this).val(data))})}return $(this);default:if(method!=='create')data=method;$(this).each(function(){init($(this),data)});return $(this)}}});function init(input,settings){var minicolors=$('<div class="minicolors" />'),defaults=$.minicolors.defaults;if(input.data('minicolors-initialized'))return;settings=$.extend(true,{},defaults,settings);minicolors.addClass('minicolors-theme-'+settings.theme).toggleClass('minicolors-with-opacity',settings.opacity).toggleClass('minicolors-no-data-uris',settings.dataUris!==true);if(settings.position!==undefined){$.each(settings.position.split(' '),function(){minicolors.addClass('minicolors-position-'+this)})}input.addClass('minicolors-input').data('minicolors-initialized',false).data('minicolors-settings',settings).prop('size',7).wrap(minicolors).after('<div class="minicolors-panel minicolors-slider-'+settings.control+'">'+'<div class="minicolors-slider minicolors-sprite">'+'<div class="minicolors-picker"></div>'+'</div>'+'<div class="minicolors-opacity-slider minicolors-sprite">'+'<div class="minicolors-picker"></div>'+'</div>'+'<div class="minicolors-grid minicolors-sprite">'+'<div class="minicolors-grid-inner"></div>'+'<div class="minicolors-picker"><div></div></div>'+'</div>'+'</div>');if(!settings.inline){input.after('<span class="minicolors-swatch minicolors-sprite"><span class="minicolors-swatch-color"></span></span>');input.next('.minicolors-swatch').on('click',function(event){event.preventDefault();input.focus()})}input.parent().find('.minicolors-panel').on('selectstart',function(){return false}).end();if(settings.inline)input.parent().addClass('minicolors-inline');updateFromInput(input,false);input.data('minicolors-initialized',true)}function destroy(input){var minicolors=input.parent();input.removeData('minicolors-initialized').removeData('minicolors-settings').removeProp('size').removeClass('minicolors-input');minicolors.before(input).remove()}function show(input){var minicolors=input.parent(),panel=minicolors.find('.minicolors-panel'),settings=input.data('minicolors-settings');if(!input.data('minicolors-initialized')||input.prop('disabled')||minicolors.hasClass('minicolors-inline')||minicolors.hasClass('minicolors-focus'))return;hide();minicolors.addClass('minicolors-focus');panel.stop(true,true).fadeIn(settings.showSpeed,function(){if(settings.show)settings.show.call(input.get(0))})}function hide(){$('.minicolors-focus').each(function(){var minicolors=$(this),input=minicolors.find('.minicolors-input'),panel=minicolors.find('.minicolors-panel'),settings=input.data('minicolors-settings');panel.fadeOut(settings.hideSpeed,function(){if(settings.hide)settings.hide.call(input.get(0));minicolors.removeClass('minicolors-focus')})})}function move(target,event,animate){var input=target.parents('.minicolors').find('.minicolors-input'),settings=input.data('minicolors-settings'),picker=target.find('[class$=-picker]'),offsetX=target.offset().left,offsetY=target.offset().top,x=Math.round(event.pageX-offsetX),y=Math.round(event.pageY-offsetY),duration=animate?settings.animationSpeed:0,wx,wy,r,phi;if(event.originalEvent.changedTouches){x=event.originalEvent.changedTouches[0].pageX-offsetX;y=event.originalEvent.changedTouches[0].pageY-offsetY}if(x<0)x=0;if(y<0)y=0;if(x>target.width())x=target.width();if(y>target.height())y=target.height();if(target.parent().is('.minicolors-slider-wheel')&&picker.parent().is('.minicolors-grid')){wx=75-x;wy=75-y;r=Math.sqrt(wx*wx+wy*wy);phi=Math.atan2(wy,wx);if(phi<0)phi+=Math.PI*2;if(r>75){r=75;x=75-(75*Math.cos(phi));y=75-(75*Math.sin(phi))}x=Math.round(x);y=Math.round(y)}if(target.is('.minicolors-grid')){picker.stop(true).animate({top:y+'px',left:x+'px'},duration,settings.animationEasing,function(){updateFromControl(input,target)})}else{picker.stop(true).animate({top:y+'px'},duration,settings.animationEasing,function(){updateFromControl(input,target)})}}function updateFromControl(input,target){function getCoords(picker,container){var left,top;if(!picker.length||!container)return null;left=picker.offset().left;top=picker.offset().top;return{x:left-container.offset().left+(picker.outerWidth()/2),y:top-container.offset().top+(picker.outerHeight()/2)}}var hue,saturation,brightness,x,y,r,phi,hex=input.val(),opacity=input.attr('data-opacity'),minicolors=input.parent(),settings=input.data('minicolors-settings'),swatch=minicolors.find('.minicolors-swatch'),grid=minicolors.find('.minicolors-grid'),slider=minicolors.find('.minicolors-slider'),opacitySlider=minicolors.find('.minicolors-opacity-slider'),gridPicker=grid.find('[class$=-picker]'),sliderPicker=slider.find('[class$=-picker]'),opacityPicker=opacitySlider.find('[class$=-picker]'),gridPos=getCoords(gridPicker,grid),sliderPos=getCoords(sliderPicker,slider),opacityPos=getCoords(opacityPicker,opacitySlider);if(target.is('.minicolors-grid, .minicolors-slider')){switch(settings.control){case'wheel':x=(grid.width()/2)-gridPos.x;y=(grid.height()/2)-gridPos.y;r=Math.sqrt(x*x+y*y);phi=Math.atan2(y,x);if(phi<0)phi+=Math.PI*2;if(r>75){r=75;gridPos.x=69-(75*Math.cos(phi));gridPos.y=69-(75*Math.sin(phi))}saturation=keepWithin(r/0.75,0,100);hue=keepWithin(phi*180/Math.PI,0,360);brightness=keepWithin(100-Math.floor(sliderPos.y*(100/slider.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});slider.css('backgroundColor',hsb2hex({h:hue,s:saturation,b:100}));break;case'saturation':hue=keepWithin(parseInt(gridPos.x*(360/grid.width()),10),0,360);saturation=keepWithin(100-Math.floor(sliderPos.y*(100/slider.height())),0,100);brightness=keepWithin(100-Math.floor(gridPos.y*(100/grid.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});slider.css('backgroundColor',hsb2hex({h:hue,s:100,b:brightness}));minicolors.find('.minicolors-grid-inner').css('opacity',saturation/100);break;case'brightness':hue=keepWithin(parseInt(gridPos.x*(360/grid.width()),10),0,360);saturation=keepWithin(100-Math.floor(gridPos.y*(100/grid.height())),0,100);brightness=keepWithin(100-Math.floor(sliderPos.y*(100/slider.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});slider.css('backgroundColor',hsb2hex({h:hue,s:saturation,b:100}));minicolors.find('.minicolors-grid-inner').css('opacity',1-(brightness/100));break;default:hue=keepWithin(360-parseInt(sliderPos.y*(360/slider.height()),10),0,360);saturation=keepWithin(Math.floor(gridPos.x*(100/grid.width())),0,100);brightness=keepWithin(100-Math.floor(gridPos.y*(100/grid.height())),0,100);hex=hsb2hex({h:hue,s:saturation,b:brightness});grid.css('backgroundColor',hsb2hex({h:hue,s:100,b:100}));break}input.val(convertCase(hex,settings.letterCase))}if(target.is('.minicolors-opacity-slider')){if(settings.opacity){opacity=parseFloat(1-(opacityPos.y/opacitySlider.height())).toFixed(2)}else{opacity=1}if(settings.opacity)input.attr('data-opacity',opacity)}swatch.find('SPAN').css({backgroundColor:hex,opacity:opacity});doChange(input,hex,opacity)}function updateFromInput(input,preserveInputValue){var hex,hsb,opacity,x,y,r,phi,minicolors=input.parent(),settings=input.data('minicolors-settings'),swatch=minicolors.find('.minicolors-swatch'),grid=minicolors.find('.minicolors-grid'),slider=minicolors.find('.minicolors-slider'),opacitySlider=minicolors.find('.minicolors-opacity-slider'),gridPicker=grid.find('[class$=-picker]'),sliderPicker=slider.find('[class$=-picker]'),opacityPicker=opacitySlider.find('[class$=-picker]');hex=convertCase(parseHex(input.val(),true),settings.letterCase);if(!hex){hex=convertCase(parseHex(settings.defaultValue,true),settings.letterCase)}hsb=hex2hsb(hex);if(!preserveInputValue)input.val(hex);if(settings.opacity){opacity=input.attr('data-opacity')===''?1:keepWithin(parseFloat(input.attr('data-opacity')).toFixed(2),0,1);if(isNaN(opacity))opacity=1;input.attr('data-opacity',opacity);swatch.find('SPAN').css('opacity',opacity);y=keepWithin(opacitySlider.height()-(opacitySlider.height()*opacity),0,opacitySlider.height());opacityPicker.css('top',y+'px')}swatch.find('SPAN').css('backgroundColor',hex);switch(settings.control){case'wheel':r=keepWithin(Math.ceil(hsb.s*0.75),0,grid.height()/2);phi=hsb.h*Math.PI/180;x=keepWithin(75-Math.cos(phi)*r,0,grid.width());y=keepWithin(75-Math.sin(phi)*r,0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=150-(hsb.b/(100/grid.height()));if(hex==='')y=0;sliderPicker.css('top',y+'px');slider.css('backgroundColor',hsb2hex({h:hsb.h,s:hsb.s,b:100}));break;case'saturation':x=keepWithin((5*hsb.h)/12,0,150);y=keepWithin(grid.height()-Math.ceil(hsb.b/(100/grid.height())),0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=keepWithin(slider.height()-(hsb.s*(slider.height()/100)),0,slider.height());sliderPicker.css('top',y+'px');slider.css('backgroundColor',hsb2hex({h:hsb.h,s:100,b:hsb.b}));minicolors.find('.minicolors-grid-inner').css('opacity',hsb.s/100);break;case'brightness':x=keepWithin((5*hsb.h)/12,0,150);y=keepWithin(grid.height()-Math.ceil(hsb.s/(100/grid.height())),0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=keepWithin(slider.height()-(hsb.b*(slider.height()/100)),0,slider.height());sliderPicker.css('top',y+'px');slider.css('backgroundColor',hsb2hex({h:hsb.h,s:hsb.s,b:100}));minicolors.find('.minicolors-grid-inner').css('opacity',1-(hsb.b/100));break;default:x=keepWithin(Math.ceil(hsb.s/(100/grid.width())),0,grid.width());y=keepWithin(grid.height()-Math.ceil(hsb.b/(100/grid.height())),0,grid.height());gridPicker.css({top:y+'px',left:x+'px'});y=keepWithin(slider.height()-(hsb.h/(360/slider.height())),0,slider.height());sliderPicker.css('top',y+'px');grid.css('backgroundColor',hsb2hex({h:hsb.h,s:100,b:100}));break}if(input.data('minicolors-initialized')){doChange(input,hex,opacity)}}function doChange(input,hex,opacity){var settings=input.data('minicolors-settings'),lastChange=input.data('minicolors-lastChange');if(!lastChange||lastChange.hex!==hex||lastChange.opacity!==opacity){input.data('minicolors-lastChange',{hex:hex,opacity:opacity});if(settings.change){if(settings.changeDelay){clearTimeout(input.data('minicolors-changeTimeout'));input.data('minicolors-changeTimeout',setTimeout(function(){settings.change.call(input.get(0),hex,opacity)},settings.changeDelay))}else{settings.change.call(input.get(0),hex,opacity)}}input.trigger('change').trigger('input')}}function rgbObject(input){var hex=parseHex($(input).val(),true),rgb=hex2rgb(hex),opacity=$(input).attr('data-opacity');if(!rgb)return null;if(opacity!==undefined)$.extend(rgb,{a:parseFloat(opacity)});return rgb}function rgbString(input,alpha){var hex=parseHex($(input).val(),true),rgb=hex2rgb(hex),opacity=$(input).attr('data-opacity');if(!rgb)return null;if(opacity===undefined)opacity=1;if(alpha){return'rgba('+rgb.r+', '+rgb.g+', '+rgb.b+', '+parseFloat(opacity)+')'}else{return'rgb('+rgb.r+', '+rgb.g+', '+rgb.b+')'}}function convertCase(string,letterCase){return letterCase==='uppercase'?string.toUpperCase():string.toLowerCase()}function parseHex(string,expand){string=string.replace(/[^A-F0-9]/ig,'');if(string.length!==3&&string.length!==6)return'';if(string.length===3&&expand){string=string[0]+string[0]+string[1]+string[1]+string[2]+string[2]}return'#'+string}function keepWithin(value,min,max){if(value<min)value=min;if(value>max)value=max;return value}function hsb2rgb(hsb){var rgb={};var h=Math.round(hsb.h);var s=Math.round(hsb.s*255/100);var v=Math.round(hsb.b*255/100);if(s===0){rgb.r=rgb.g=rgb.b=v}else{var t1=v;var t2=(255-s)*v/255;var t3=(t1-t2)*(h%60)/60;if(h===360)h=0;if(h<60){rgb.r=t1;rgb.b=t2;rgb.g=t2+t3}else if(h<120){rgb.g=t1;rgb.b=t2;rgb.r=t1-t3}else if(h<180){rgb.g=t1;rgb.r=t2;rgb.b=t2+t3}else if(h<240){rgb.b=t1;rgb.r=t2;rgb.g=t1-t3}else if(h<300){rgb.b=t1;rgb.g=t2;rgb.r=t2+t3}else if(h<360){rgb.r=t1;rgb.g=t2;rgb.b=t1-t3}else{rgb.r=0;rgb.g=0;rgb.b=0}}return{r:Math.round(rgb.r),g:Math.round(rgb.g),b:Math.round(rgb.b)}}function rgb2hex(rgb){var hex=[rgb.r.toString(16),rgb.g.toString(16),rgb.b.toString(16)];$.each(hex,function(nr,val){if(val.length===1)hex[nr]='0'+val});return'#'+hex.join('')}function hsb2hex(hsb){return rgb2hex(hsb2rgb(hsb))}function hex2hsb(hex){var hsb=rgb2hsb(hex2rgb(hex));if(hsb.s===0)hsb.h=360;return hsb}function rgb2hsb(rgb){var hsb={h:0,s:0,b:0};var min=Math.min(rgb.r,rgb.g,rgb.b);var max=Math.max(rgb.r,rgb.g,rgb.b);var delta=max-min;hsb.b=max;hsb.s=max!==0?255*delta/max:0;if(hsb.s!==0){if(rgb.r===max){hsb.h=(rgb.g-rgb.b)/delta}else if(rgb.g===max){hsb.h=2+(rgb.b-rgb.r)/delta}else{hsb.h=4+(rgb.r-rgb.g)/delta}}else{hsb.h=-1}hsb.h*=60;if(hsb.h<0){hsb.h+=360}hsb.s*=100/255;hsb.b*=100/255;return hsb}function hex2rgb(hex){hex=parseInt(((hex.indexOf('#')>-1)?hex.substring(1):hex),16);return{r:hex>>16,g:(hex&0x00FF00)>>8,b:(hex&0x0000FF)}}$(document).on('mousedown.minicolors touchstart.minicolors',function(event){if(!$(event.target).parents().add(event.target).hasClass('minicolors')){hide()}}).on('mousedown.minicolors touchstart.minicolors','.minicolors-grid, .minicolors-slider, .minicolors-opacity-slider',function(event){var target=$(this);event.preventDefault();$(document).data('minicolors-target',target);move(target,event,true)}).on('mousemove.minicolors touchmove.minicolors',function(event){var target=$(document).data('minicolors-target');if(target)move(target,event)}).on('mouseup.minicolors touchend.minicolors',function(){$(this).removeData('minicolors-target')}).on('mousedown.minicolors touchstart.minicolors','.minicolors-swatch',function(event){var input=$(this).parent().find('.minicolors-input');event.preventDefault();show(input)}).on('focus.minicolors','.minicolors-input',function(){var input=$(this);if(!input.data('minicolors-initialized'))return;show(input)}).on('blur.minicolors','.minicolors-input',function(){var input=$(this),settings=input.data('minicolors-settings');if(!input.data('minicolors-initialized'))return;input.val(parseHex(input.val(),true));if(input.val()==='')input.val(parseHex(settings.defaultValue,true));input.val(convertCase(input.val(),settings.letterCase))}).on('keydown.minicolors','.minicolors-input',function(event){var input=$(this);if(!input.data('minicolors-initialized'))return;switch(event.keyCode){case 9:hide();break;case 13:case 27:hide();input.blur();break}}).on('keyup.minicolors','.minicolors-input',function(){var input=$(this);if(!input.data('minicolors-initialized'))return;updateFromInput(input,true)}).on('paste.minicolors','.minicolors-input',function(){var input=$(this);if(!input.data('minicolors-initialized'))return;setTimeout(function(){updateFromInput(input,true)},1)})

}( jQuery ));

$( function(){
    cpop = $( document.body ).cpop( {
    	buttonAction: {
    		close: 	function( el ){ cpop.close(); },
    		// submit: function( el ){ cpop.postAjax(); }
    	},
    	buttonLabel: {
			close: 	(typeof cpop_message_cancel != 'undefined' ? cpop_message_cancel : 'Sluiten'),
			// submit: 'Opslaan/Wijzigen'
    	}
    } );

    // cpop.loadImage('https://i.pinimg.com/736x/cd/b7/37/cdb737da7586dfb3021a277d0b8c1786--iphone--wallpaper-wallpaper-ideas.jpg');
    // cpop.confirm( 'Verwijderen?', function(){ cpop.loadHtml('Ok, verwijderd.'); }, 'Ja, NU!' );
    // cpop.colorPicker(null);
} );

function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}
function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
