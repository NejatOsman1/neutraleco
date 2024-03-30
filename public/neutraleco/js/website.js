$.fn.textareaCounter = function(options) {
	// setting the defaults
	// $("textarea").textareaCounter({ limit: 100 });
	var defaults = {
		limit: 100
	};
	var options = $.extend(defaults, options);

	// and the plugin begins
	return this.each(function() {
		var obj, text, wordcount, limited;

		obj = $(this);
		obj.after('<small class="counter-text">Max. '+options.limit+' woorden toegestaan</small>');

		obj.keyup(function() {
			text = obj.val();
			if(text === "") {
				wordcount = 0;
			} else {
				wordcount = $.trim(text).split(" ").length;
			}
			if(wordcount > options.limit) {
				$(".counter-text").html('0 woorden toegestaan');
				limited = $.trim(text).split(" ", options.limit);
				limited = limited.join(" ");
				$(this).val(limited);
			} else {
				obj.next(".counter-text").html('Nog '+(options.limit - wordcount)+' woorden toegestaan');
			}
		});
	});
};


// toggles, init
$(function() {
	$(".navbar .nav-toggle").click(function() {
	  $("body").toggleClass("show-nav");
	});

	$(".navbar .nav li.has-children .togglesub,.navbar .custom-nav li.has-children .togglesub").click(function() {
	  $(this).parent().toggleClass("open");
	});

	$(".page-overlay").click(function() {
	  $("body").removeClass("show-nav");
	  $("body").removeClass("show-filters");
	});
	
	if($("#form_edit_password").length > 0){
		$("#form_edit_password").click(function(){
			if(!$("#form_edit_password").prop("checked")){
				$("#form_plainPassword_first,#form_plainPassword_second").val("");
				$(".passloader").css("width","0px");
			}
			$(".password_toggle").toggle();
			
		});
		if($("#form_edit_password").prop("checked")){
			$(".password_toggle").toggle();
		}
	}

	if($("#form_company_has_invoice_address").length > 0){
		$("#form_company_has_invoice_address").click(function(){
			$(".invoice").toggle().toggleClass("active");
			if($(".invoice").hasClass("active")){
				$(".invoice .form-floating").addClass("invalid_input");
				$(".invoice input[type=text]").attr("required","required").addClass("validate");
			}else{
				$(".invoice .form-floating").removeClass("invalid_input");
				$(".invoice input[type=text]").removeAttr("required").removeClass("validate");
			}
		});
		if($("#form_company_has_invoice_address").prop("checked")){
			$(".invoice .form-floating").removeClass("invalid_input");
			$(".invoice").toggle().toggleClass("active");
			$(".invoice input[type=text]").attr("required","required").addClass("validate");
		}else{
			$(".invoice .form-floating").removeClass("invalid_input");
			$(".invoice input[type=text]").removeAttr("required").removeClass("validate")
		}
	}

	if($("#form_has_postal_address").length > 0){
		$("#form_has_postal_address").click(function(){
			$(".postal").toggle().toggleClass("active");
			if($(".postal").hasClass("active")){
				$(".postal .form-floating").addClass("invalid_input");
				$(".postal input[type=text]").attr("required","required").addClass("validate");
			}else{
				$(".postal .form-floating").removeClass("invalid_input");
				$(".postal input[type=text]").removeAttr("required").removeClass("validate");
			}
		});
		if($("#form_has_postal_address").prop("checked")){
			$(".postal .form-floating").removeClass("invalid_input");
			$(".postal").toggle().toggleClass("active");
			$(".postal input[type=text]").attr("required","required").addClass("validate");
		}else{
			$(".postal .form-floating").removeClass("invalid_input");
			$(".postal input[type=text]").removeAttr("required").removeClass("validate")
		}
	}
	if($(".register #form_company_description").length > 0){
		$("textarea").textareaCounter({ limit: 300 });
	}
	if($("#form_summary").length > 0){
		$("textarea#form_summary").textareaCounter({ limit: 150 });
	}
	if($("#form_description").length > 0){
		$("textarea#form_description").textareaCounter({ limit: 3500 });
	}
	if($(".add-project #form_company_description").length > 0){
		$("textarea#form_company_description").textareaCounter({ limit: 750 });
	}
})

//form contact requests
$(function() {
	if($("#form-modal").length > 0){
		$.get("/forms/ajax/2", function( data ) {
			$("#form-modal .modal-body .form").append(data);
			let email = $("#form-modal").attr("data-attr-email");
			let projectTitel = $(".project-intro-title .title h2").html();
			$("#frm-lbl-12").val(email);
			$("#frm-lbl-13").val(projectTitel);
			function setAjaxSubmit(){
				$("#forms-bundle-form button[type='submit']").unbind().click(function(evt){
					evt.preventDefault();
					let isValid = true;
					let form = $(this).closest("form");
					let scrollTo;
					form.find('input[required="true"], select[required="true"],textarea[required="true"]').each(function(ind, el){
						if($(this).val() != ''){
							if(typeof $(this).prop('pattern') != 'undefined' && $(this).prop('pattern') != ''){
								if($(this).val().match($(this).prop('pattern')) != null){
									$(this).parent().addClass('valid_input').removeClass('invalid_input');
								}else{
									$(this).parent().addClass('invalid_input').removeClass('valid_input');
									if(!scrollTo)scrollTo = $(this);
									isValid = false;
								}
							}else{						
								$(this).parent().addClass('valid_input').removeClass('invalid_input');
							}
						}else{
							$(this).parent().addClass('invalid_input').removeClass('valid_input');
							isValid = false;
							if(!scrollTo)scrollTo = $(this);
						}
					});
					if(isValid){
						//send form data via email
						$.post("/forms/ajax/2",$("#forms-bundle-form").serialize(),
							function(data){
								if(data.includes("alert-success")){
									$("#form-modal .modal-body > .intro,#form-modal .modal-body > .form").hide();
									$("#form-modal .modal-body > .success").show();
									//save form data to Neutral bundle
									let projectId = $("#pd-contact-button").attr("data-id");
									$.post("/neutral/project/"+projectId+"/add/buyincredits/",$("#forms-bundle-form").serialize(),
										function(data){
											
										}
									);
									
								}else{
									$("#form-modal .modal-body > .form").html(data);
									$("#form-modal .modal-body").animate({
										scrollTop: 0
									}, 50,function(){
										
									});
									setAjaxSubmit();
								}
							}
						);
					}else{
						scrollTo.focus();
					}
				});
				// deplay the rest so the browser has time to load the javascript
				if(typeof recaptchaSiteKey !== 'undefined'){
					setTimeout(function() {
						grecaptcha.ready(function() {
							grecaptcha.execute(recaptchaSiteKey, {action: 'homepage'}).then(function(token) {
								$('#g-recaptcha-response-alt').val(token);
							});

							function resetRecaptcha(grecaptcha) {
								grecaptcha.execute(recaptchaSiteKey, {action: 'homepage'}).then(function(token) {
									$('#g-recaptcha-response-alt').val(token);
								});
								clearInterval(this);
							}
							setInterval(resetRecaptcha, 60000, grecaptcha);
						});
						}, 400);
				}
			}
			var googleRecapthaUrl = '//www.google.com/recaptcha/api.js';
			if (googleRecaptchaMode == '3_invisible') {
				googleRecapthaUrl = googleRecapthaUrl + '?render=' + googleRecaptchaSitekey;
			}

			var script = document.createElement( "script" );
			script.src = googleRecapthaUrl;
			script.type = "text/javascript";
			document.getElementsByTagName("head")[0].appendChild( script );
			setAjaxSubmit();
		});
	}
})

// Sticky header
$(window).on("scroll load", function() {
	var scroll = $(window).scrollTop();
	if (scroll >= 1) {
	  $("body").addClass("sticky");
	} else {
	  $("body").removeClass("sticky");
	}

	var scroll = $(window).scrollTop();
	if (scroll >= 50) {
	  $("body").addClass("sticky-topbar");
	} else {
	  $("body").removeClass("sticky-topbar");
	}

	var scroll = $(window).scrollTop();
	if (scroll >= 90) {
	  $("body").addClass("sticky-titlebar");
	} else {
	  $("body").removeClass("sticky-titlebar");
	}
});

//modal comments
$(function(){
	$(".projects-overview .comment-modal").click(function(){
		let projectId = $(this).data("project-id");
		$(".modal-dialog .content-comments").html($(this).closest(".card-project").find(".project-comments").html());

		/*$.get("/neutral/ajax/project/"+projectId+"/comments/", function( data ) {
			$(".modal-dialog .content-comments").html(data);
		});*/

		/*$(".modal-dialog button[type='submit']").click(function(){

		});*/
	});
});

// Overview project
$(function(){
	if($(".projects.projects-overview").length > 0){
		$(".filters form select").change(function(){
			let form = $(this).closest("form");
			$(".projects-cards .projects-overview").html("<div class='loader'><i class='fa fa-spin fa-circle-notch'></i></div>");
			$.post("/projecten/filter/ajax/",form.serialize(),
				function(data){
					$(".projects-cards .projects-overview").html(data);
				}
			)
		});
	}
});

// Match height
$(function() {
	// Add a new line for each item
	if($('.product .card-content').length > 0){
	  $('.product .card-content').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.blog .content h3').length > 0){
	  $('.blog .content h3').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.blog-slider .heightfix').length > 0){
	  $('.blog-slider .heightfix').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.comparison .card .card-image').length > 0){
	  $('.comparison .card .card-image').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.comparison .card .card-info').length > 0){
	  $('.comparison .card .card-info').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.login-register .card').length > 0){
	  $('.login-register .card').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.login-register .card .card-height').length > 0){
	  $('.login-register .card .card-height').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.webshop-frontend-profile .card .card-height').length > 0){
	  $('.webshop-frontend-profile .card .card-height').matchHeight({byRow: false, property: 'min-height', target: null, remove: false});
	}
	if($('.webshop.checkout.overview .card').length > 0){
	  $('.webshop.checkout.overview .card').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}
	if($('.card-project .card-body').length > 0){
	  $('.card-project .card-body').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	}

	// Lightgallery
	if(typeof Swiper != 'undefined' && $('.blog-swiper').length > 0){
	  var galleryTop = new Swiper('.blog-swiper', {
		  pagination: {
			  el: '.swiper-pagination',
			  type: 'bullets',
			  clickable: true
		  },
		  navigation: {
			  nextEl: '.swiper-button-next',
			  prevEl: '.swiper-button-prev'
		  },
		  watchOverflow: true
	  });
	}

	if(typeof lightGallery != 'undefined' && $('.blog-gallery').length > 0){
	  $(".blog-gallery").lightGallery({
		  selector: 'a',
		  zoom: false,
		  download: false,
		  autoplayControls: false,
		  actualSize: false,
		  share: false,
		  fullScreen: false,
		  width: '1200px',
		  height: '800px',
	  });
	}

	if(typeof lightGallery != 'undefined' && $('.projects-gallery').length > 0){
	  $(".projects-gallery").lightGallery({
		  selector: 'a',
		  zoom: false,
		  download: false,
		  autoplayControls: false,
		  actualSize: false,
		  share: false,
		  fullScreen: true
	  });
	}

	// Dynamic footer
	if($('.footer-wrapper').length){
	  var docHeight = $(window).height();
	  var footerHeight = $('.footer-wrapper').height();
	  var footerTop = $('.footer-wrapper').position().top + footerHeight;
	  if (footerTop < docHeight) {
		  $('.footer-wrapper').css('margin-top', (docHeight - footerTop) + 'px');
	  }
	}

	if(typeof Swiper != 'undefined' && $('.swiper-container.swiper-brands').length > 0){
	  var temp = new Swiper('.swiper-container.swiper-brands', {
		  direction: 'horizontal',
		  loop: true,
		  slidesPerView: 1,
		  spaceBetween: 30,
		  breakpoints: {
			  576: {
				  slidesPerView: 2
			  },
			  769: {
				  slidesPerView: 3
			  },
			  992: {
				  slidesPerView: 4
			  }
		  },
		  pagination: {
			  el: '.swiper-pagination',
			  clickable: true
		  },
		  navigation: {
			  nextEl: '.swiper-button-next',
			  prevEl: '.swiper-button-prev'
		  }
	  });
	}

	if($('.framework_parallax').length > 0){
	  $('.framework_parallax').each(function() {
		  var controller = new ScrollMagic.Controller();
		  var wrapperID = $(this).data('id');

		  new ScrollMagic.Scene({triggerElement: "#trigger" + wrapperID, triggerHook: 0.9, offset: 150, reverse: false}).setClassToggle("#animate" + wrapperID, "visible")
		  // .addIndicators()
		  .addTo(controller);

		  new ScrollMagic.Scene({triggerElement: "#trigger" + wrapperID, triggerHook: 0.6, duration: "50%", offset: 0}).setClassToggle("#animate" + wrapperID, "opacity")
		  // .addIndicators()
		  .addTo(controller);

		  /*let img[wrapperID] = document.getElementsByClassName('image' + wrapperID');
		  new simpleParallax(img[wrapperID], {
		  });*/

		  new simpleParallax(document.getElementsByClassName('image' + wrapperID), {
		  });
	  });
	}

	// Parallax images ???
	/*var image = document.getElementsByClassName('parallax');
	new simpleParallax(image, {
	  overflow: false,
	  scale: 1.2,
	  delay: 0,
	});*/


	// Anchor scrolling
	if ($(window).width() > 769) {
	  $(document).on('click', '.averge-reviews a, #pd-intro a', function(event) {
		  event.preventDefault();
		  $('html, body').animate({
			  scrollTop: $($.attr(this, 'href')).offset().top + -100
		  }, 1000);
	  });
	}

	if ($(window).width() < 768) {
	  $(document).on('click', '.averge-reviews a, #pd-intro a', function(event) {
		  event.preventDefault();
		  $('html, body').animate({
			  scrollTop: $($.attr(this, 'href')).offset().top + -80
		  }, 1000);
	  });
	}
});

if($('.checkout-column-right').length > 0){
  // Sidebar
  var sidebar = new StickySidebar('.checkout-column-right', {
	  topSpacing: 90,
	  bottomSpacing: 90,
	  containerSelector: '.checkout-columns',
	  innerWrapperSelector: '.checkout-column-right-inner'
  });
}

//load contact requests
$(function() {
	if($(".content-project-buyincredits").length > 0){
		$(".project-buyincredits-modal").click(function(){
			$(".modal-dialog .content-project-buyincredits table,.modal-dialog .loader,.modal-dialog #pagination").remove();
			$(".modal-dialog .content-project-buyincredits").prepend('<div class="loader"><i class="fa fa-spin fa-circle-notch"></i><br/>Transacties laden</div>');
			let projectId = $(this).data("project-id");
			$.get("/neutral/ajax/project/"+projectId+"/buyincredits/", function( data ) {
				$(".modal-dialog .content-project-buyincredits").html(data);
			});
		});
	}
});

//load transactions
$(function() {
	if($(".content-project-transactions").length > 0){
		function paginate(object){
			$.get($(object).attr("href"), function(data){
				$(".modal-dialog .content-project-transactions").html(data);
				if($("#pagination").length > 0){
					$("#pagination a").off("click").click(function(evt){
						evt.preventDefault();
						paginate(this);
					});
				}
			});
		}
		
		$(".project-transactions-modal").click(function(){
			$(".modal-dialog .content-project-transactions table,.modal-dialog .loader,.modal-dialog #pagination").remove();
			$(".modal-dialog .content-project-transactions").prepend('<div class="loader"><i class="fa fa-spin fa-circle-notch"></i><br/>Transacties laden</div>');
			let projectId = $(this).data("project-id");
			let projectStatus = $(this).data("project-status");
			if(projectStatus == 6 || projectStatus == 5){
				$("#add-transaction").hide();
			}else{
				$("#add-transaction").show();
			}
			$("#add-transaction").attr("href",location.href+"/transactie/toevoegen/"+projectId+"/");
			$.get("/neutral/ajax/project/"+projectId+"/transactions/", function( data ) {
				$(".modal-dialog .content-project-transactions").html(data);
				if($("#pagination").length > 0){
					$("#pagination a").off("click").click(function(evt){
						evt.preventDefault();
						paginate(this);
					});
				}
			});
		});
	}
	if($(".content-transactions").length > 0){
		function paginate(object){
			$(".modal-dialog .content-transactions table").remove();
			$(".modal-dialog .content-transactions").prepend('<div class="loader"><i class="fa fa-spin fa-circle-notch"></i><br/>Transacties laden</div>');
			$.get($(object).attr("href"), function(data){
				$(".modal-dialog .content-transactions").html(data);
				if($("#pagination").length > 0){
					$("#pagination a").off("click").click(function(evt){
						evt.preventDefault();
						paginate(this);
					});
				}
			});
		}
		
		let projectId = $("#transactions-modal").data("project-id");
		$.get("/neutral/ajax/project/"+projectId+"/transactions/", function( data ) {
			$(".modal-dialog .content-transactions").html(data);
			if($("#pagination").length > 0){
				$("#pagination a").off("click").click(function(evt){
					evt.preventDefault();
					paginate(this);
				});
			}
		});
	}
});

//Add Transaction
$(function(){
	if($(".add-transaction").length > 0){
		$('body .empty').addClass('login-register-wrapper');
		
		$(".number > input").bind("keyup change","change",function(e){
			if(e.which ==  110 || e.which == 190 || e.which == 188)return;
			var value = $(this).val().toString();
			if(value == "")return false;
			if(value.length == 2 && value[0] == "0" && value[value.length-1] > 0){
				value = value[value.length-1];
				$(this).val(value);
			}
			if(value < 0)value = "0";
			$(this).val(value);
			value = parseInt(value);

			if(e.which == 38){ value += 1; }
			if(e.which == 40){ value -= 1; }

			if(value <= 0 || parseInt($(this).val()) <= 0 || $(this).val() == "NaN" || $(this).val() == "Infinity"){
				$(this).val(0);
				return false;
			}else{
				$(this).val(value);
			}
			if($(this).val() == "")return false;
		});
		
		$("button.save").unbind().click(function(){
			let isValid = true;
			let card = $(this).closest(".card");
			let scrollTo;
			let creditsToAdd = parseInt($("#form_credits").val());
			if(creditsToAdd == 0){
				alert("Aantal credits moet hoger zijn dan 0");
				scrollTo = $("#form_credits");
				isValid = false;
				$("#form_credits").parent().addClass('invalid_input').removeClass('valid_input');
			}else{
				let availableCredits = parseInt($(".availableCredits").html());
				if(creditsToAdd > availableCredits){
					alert("Aantal toe te voegen credits ("+creditsToAdd+") mag niet hoger zijn dan de nog te verbruiken credits ("+availableCredits+").");
					scrollTo = $("#form_credits");
					isValid = false;
					$("#form_credits").parent().addClass('invalid_input').removeClass('valid_input');
				}else{
					card.find('input[type="text"].validate, select.validate,textarea.validate').each(function(ind, el){
						if($(this).val() != ''){
							if(typeof $(this).prop('pattern') != 'undefined' && $(this).prop('pattern') != ''){
								if($(this).val().match($(this).prop('pattern')) != null){
									$(this).parent().addClass('valid_input').removeClass('invalid_input');
								}else{
									$(this).parent().addClass('invalid_input').removeClass('valid_input');
									if(!scrollTo)scrollTo = $(this);
									isValid = false;
								}
							}else{						
								$(this).parent().addClass('valid_input').removeClass('invalid_input');
							}
						}else{
							$(this).parent().addClass('invalid_input').removeClass('valid_input');
							isValid = false;
							if(!scrollTo)scrollTo = $(this);
						}
					});
				}
			}
			if(isValid){
				card.find("form").submit();
			}else{
				/*$([document.documentElement, document.body]).animate({
					scrollTop: scrollTo.offset().top-100
				}, 500,function(){
				});*/
				scrollTo.focus();
				return false;
			}
		});
	}
})

//validation
function validation(object,isValid,scroll = true){
	let scrollTo;
	if($(object).val() != ''){
		if(typeof $(object).prop('pattern') != 'undefined' && $(object).prop('pattern') != ''){
			if($(object).val().match($(object).prop('pattern')) != null){
				$(object).parent().addClass('valid_input').removeClass('invalid_input');
			}else{
				$(object).parent().addClass('invalid_input').removeClass('valid_input');
				if(!scrollTo)scrollTo = $(object);
				isValid = false;
			}
		}else{						
			$(object).parent().addClass('valid_input').removeClass('invalid_input');
		}
	}else{
		$(object).parent().addClass('invalid_input').removeClass('valid_input');
		isValid = false;
		if(!scrollTo)scrollTo = $(object);
	}
	
	if(!isValid && scroll){
		if(scrollTo){
			$([document.documentElement, document.body]).animate({
				scrollTop: scrollTo.offset().top-100
			}, 500,function(){
				scrollTo.focus();
			});
		}			
	}
	return isValid;
}
		
//Edit personal info
$(document).ready(function(){
	if($(".card.register").length > 0){		
		let card = $(".card.register");
		let objects = card.find('input[type="text"].validate,input[type="email"].validate,select.validate,textarea.validate');
		objects.bind("keyup change blur","change",function(evt){
			evt.preventDefault();
			let isValid = validation(this,true,false);
			if(!isValid)return false;
		});
		
		$("button[type='submit']").off("click").click(function(evt){
			evt.preventDefault();
			let isValid = true;
			if($("#form_companyTaxNo").length > 0 && $("#form_companyTaxNo").val() != ""){
				$("#form_companyTaxNo").addClass("validate");
			}else{
				$("#form_companyTaxNo").removeClass("validate");
			}
			let objects = card.find('input[type="text"].validate,input[type="email"].validate,select.validate,textarea.validate');
			
			objects.each(function(){
				isValid = validation(this,isValid);
				if(!isValid)return false;
			});
			if(isValid){
				card.find("form").submit();
			}
		});
	}
});

//Add Project
var ckeditorlanguage = 'nl';
$(document).ready(function(){
	loadCkeditorCustom = function(el,maxWords){

		// Pre-set CKEditor classes
		$(el).addClass('ck');
		$(el).addClass('ck-content');
		$(el).addClass('ck-editor__editable');
		$(el).addClass('ck-rounded-corners');
		$(el).addClass('ck-editor__editable_inline');
		$(el).addClass('ck-blurred');
		$(el).addClass('ck-limited');
		
		if(!$(el).hasClass('cke_editable_inline')){
			if(typeof done === 'undefined')return false;
			if(!done || done.includes(el)){
				return false;
			}

			done.push(el);
			var lastEditorIndex = Trinity.guidGenerator();
				
			var currentEl = $(el);
			currentEl.data('editorid', lastEditorIndex);

			var custom_config = {};

			if($(el).hasClass('ck-limited')){
				custom_config.toolbar = myToolBar_limit;
			}else{
				custom_config.toolbar = myToolBar;
			}
			
			custom_config.resize_dir                = 'vertical';
			custom_config.removePlugins             = 'fontawesome';
			custom_config.allowedContent            = true;
			custom_config.protectedSource           = {};
			//custom_config.floatSpaceDockedOffsetY   = 30;
			custom_config.protectedSource           = [/<protected>[\s\S]*<\/protected>/g];
			custom_config.language = ckeditorlanguage;
			
			var currEditor = CKEDITOR.inline(el.replace("#",""), custom_config);
			currEditor.on('configLoaded', function(evt) {
				var editor = evt.editor;
				return editor.config.wordcount = {
					showWordCount: true,
					maxWordCount: maxWords
				};
			});
			
			currEditor.on('instanceReady', function(evt){ 
				var editor = evt.editor;
				if((maxWords - editor.wordCount.wordCount) > 0){
					$(el).parent().children(".counter-text").html('Nog '+(maxWords - editor.wordCount.wordCount)+' woorden toegestaan');
				}else if(editor.wordCount.wordCount == 0){
					$(el).parent().children(".counter-text").html('Max. '+maxWords+' woorden toegestaan');
				}
			}); 
			
			currEditor.on('change', function(evt) {
				var editor = evt.editor;
				Trinity.editor = editor;
				Trinity.editorField = $(el);
				var sourceEl = Trinity.editorField;
				const data = editor.getData();
				sourceEl.val(data);
				if(data != ''){
					$(el).parent().addClass('valid_input').removeClass('invalid_input');
				}else{
					$(el).parent().addClass('invalid_input').removeClass('valid_input');
				}
				if((maxWords - editor.wordCount.wordCount) >= 0){
					$(el).parent().children(".counter-text").html('Nog '+(maxWords - editor.wordCount.wordCount)+' woorden toegestaan');
				}
			});
			

			// Bundle selection popup
			currEditor.addCommand("closeEditor", { // create named command
				exec: function(edt) {
					console.log( Trinity.editorField );
					console.log( Trinity.editor );
					// Trinity.editorField.blur();
					Trinity.editor.focusManager.blur( true );
				}
			});
			currEditor.ui.addButton('closeEditor', { // add new button and bind our command
				label: "Sluiten",
				command: 'closeEditor',
				toolbar: 'document',
				icon: '/bundles/cms/close-editor.png'
			});

			// Focus on newly created editor
			currentEl.focus();

			// Remove click event
			currentEl.off('click');
			
			

			editorStorage[lastEditorIndex] = currEditor;
			
		}
	}
	
	function checkDate(card,isValid,scroll = true){
		if(card.find('input[type=date]').length > 0){
			let scrollTo;
			let arrDateStart = $("#form_date_start").val().split('-');
			if(arrDateStart.length < 3){
				scrollTo = $("#form_date_start");
				isValid = false;
			}else{
				let arrDateEnd = $("#form_date_end").val().split('-');
				if(arrDateEnd.length < 3){
					scrollTo = $("#form_date_end");
					isValid = false;
				}else{
					var dateDateStart = new Date($("#form_date_start").val());
					var dateDateEnd = new Date($("#form_date_end").val());
					if(dateDateEnd <= dateDateStart){
						$("#form_date_end").parent().addClass('invalid_input').removeClass('valid_input');
						scrollTo = $("#form_date_end");
						isValid = false;
						$("#form_date_end").closest("form")[0].reportValidity();
						alert("Eind projectdatum kan niet eerder of gelijk zijn dan start projectdatum");
					}else{
						$("#form_date_end").parent().removeClass('invalid_input').addClass('valid_input');
					}
				}
			}
			if(scrollTo && scroll){
				$([document.documentElement, document.body]).animate({
					scrollTop: scrollTo.offset().top-100
				}, 500,function(){
					scrollTo.focus();
				});
			}
		}
		return isValid;
	}
	
	if($(".add-project").length > 0){
		
		loadCkeditorCustom('#form_description',3500);
		loadCkeditorCustom('#form_summary',150);
		
		$('body .empty').addClass('login-register-wrapper');
		window.onload = function() {
			var buttons = document.getElementsByClassName('dropzone-btn');
			var upload = buttons[0];
			upload.setAttribute("type", "button");
		};
		$("select[name='form[type]']").change(function(){
			if($(this).val() == 3){
				$("#form_type_different").parent().show().attr("required","required").addClass("validate");
			}else{
				$("#form_type_different").parent().hide();
				$("#form_type_different").val("").removeAttr("required").removeClass("validate");
			}
		});
		if($("select[name='form[type]']").val() == 3){
			$("#form_type_different").parent().show().attr("required","required").addClass("validate");
		}else{
			$("#form_type_different").parent().hide();
			$("#form_type_different").val("").removeAttr("required").removeClass("validate");
		}

		$(".number > input").bind("keyup change","change",function(e){
			if(e.which ==  110 || e.which == 190 || e.which == 188)return;
			var value = $(this).val().toString();
			if(value == "")return false;
			if(value.length == 2 && value[0] == "0" && value[value.length-1] > 0){
				value = value[value.length-1];
				$(this).val(value);
			}
			if(value < 0)value = "0";
			$(this).val(value);
			value = parseInt(value);

			if(e.which == 38){ value += 1; }
			if(e.which == 40){ value -= 1; }

			if(value <= 0 || parseInt($(this).val()) <= 0 || $(this).val() == "NaN" || $(this).val() == "Infinity"){
				$(this).val(0);
				return false;
			}else{
				$(this).val(value);
			}
			if($(this).val() == "")return false;
		});

		$(".price > input").bind("keyup change","change",function(e){
			if(e.which ==  110 || e.which == 190 || e.which == 188)return;
			//return $(this).val();
			var value = $(this).val().toString();
			if(value == "")return false;
			if(value.length == 2 && value[0] == "0" && value[value.length-1] > 0){
				value = value[value.length-1];
				$(this).val(value);
				//return;
			}
			if(value < 0)value = "0";
			//$(this).val(value);

			value = value.replace(",",".");
			var arrValue = value.toString().split(".");
			if(arrValue.length > 1 && arrValue[1].length > 2){ $(this).val($(this).val().substring(0, $(this).val().length - 1)); return; }
			if(arrValue.length > 1 && (value[value.length-1] == "." || (value[value.length-2] == "." && value[value.length-1] == "0"))){ $(this).val(value);return; }
			if(arrValue.length > 1 && arrValue[1].length == 0)arrValue[1] = 0;
			

			value = parseFloat(arrValue.join("."));

			if(e.which == 38){ value += 1; }
			if(e.which == 40){ value -= 1; }

			value = (value+"").replace(".",",");
			if(value <= 0 || parseInt($(this).val()) <= 0 || $(this).val() == "NaN" || $(this).val() == "Infinity"){
				$(this).val(0);
				return false;
			}else{
				$(this).val(value);
			}
			if($(this).val() == "")return false;
		});

		$(".card .cancel").unbind().click(function(evt){
			evt.preventDefault();
			history.go(-1);
		});

		$("form").find('textarea.validate:not(.ckeditor)').on('change keyup',function(ind, el){
			if($(this).val() != ''){
				$(this).parent().addClass('valid_input').removeClass('invalid_input');
			}else{
				$(this).parent().addClass('invalid_input').removeClass('valid_input');
			}
		});

		let objects = $(".add-project .card").find('input[type="date"].validate,input[type="text"].validate,input[type="email"].validate,select.validate,textarea.validate');
		objects.bind("keyup change blur","change",function(evt){
			evt.preventDefault();
			let isValid = validation(this,true,false);
			if(!isValid)return false;
		});
		 $(".add-project .card").find('input[type="date"].validate').bind("blur",function(evt){
			checkDate($(".add-project .card"),true,false);	
		});
		
		$(".add-project .card .save").unbind().click(function(evt){
			let isValid = true;
			let card = $(this).closest(".card");
			let scrollTo;
			objects.each(function(){
				isValid = validation(this,isValid);
				if(!isValid)return false;
			});
			if(isValid){
				card.find("form").submit();
			}
		});

		$(".card .next").unbind().click(function(evt){
			evt.preventDefault();
			let card = $(this).closest(".card");
			let isValid = true;
			let scrollTo;
			console.log(card);
			let objects = card.find('input[type="date"].validate,input[type="text"].validate,input[type="email"].validate,select.validate,textarea.validate');
			objects.each(function(){
				isValid = validation(this,isValid);
			});
			
			isValid = checkDate(card,isValid);

			if(isValid){
				card.attr("style","visibility:hidden;height:0px;overflow:hidden;");
				card.next().removeAttr("style");
				$([document.documentElement, document.body]).animate({
					scrollTop: card.next().offset().top-100
				}, 500);
			}else if(scrollTo){
				$([document.documentElement, document.body]).animate({
					scrollTop: scrollTo.offset().top-100
				}, 500,function(){
					scrollTo.focus();
				});
			}
		});

		$(".card .previous").unbind().click(function(evt){
			evt.preventDefault();
			let card = $(this).closest(".card");
			card.attr("style","visibility:hidden;height:0px;overflow:hidden;");
			card.prev().removeAttr("style");
			$([document.documentElement, document.body]).animate({
				scrollTop: card.prev().offset().top-100
			}, 500);
		});


		var allowedDocTypes = ['application/doc', 'application/excel', 'application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/x-zip-compressed', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ,'application/powerpoint', 'application/rtf', 'application/vnd.apple.keynote', 'application/vnd.apple.numbers', 'application/vnd.apple.pages', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/x-rar-compressed', 'application/zip', 'text/csv'];
		var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpg', 'image/jpeg', 'image/png', 'image/svg+xml'];

		 

		$(".preview-container .delete").unbind('click');

		function filedrop(identifier,allowedMediaTypes,isMultiple = false,maxFiles = 1){
			var msgidle = msg_idle;
			if(identifier == "certificate_file")msgidle = 'Upload certificaat';
			var totalUploadSize = 0;
			var fileDrop;
			var dropped = 0;
			var allowedTypes = $.merge([], allowedMediaTypes);
			var dropzone = $('#dropzone-'+identifier);

			if($('#dropzone-'+identifier).length == 0)return;
			fileDrop = $('#dropzone-'+identifier).filedrop({
				fallback_id: 'upload_button_'+identifier,   // an identifier of a standard file input element, becomes the target of "click" events on the dropzone
				url: upload_url,			  // upload handler, handles each file separately, can also be a function taking the file and returning a url
				paramname: 'file',		  // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
				withCredentials: true,		  // make a cross-origin request with cookies
				id:identifier,
				multiple: isMultiple,
				error: function (err, file) {
					switch (err) {
						case 'BrowserNotSupported':
							alert("{{'browser does not support HTML5 drag and drop'|trans}}");
							break;
						case 'TooManyFiles':
							alert(err_maxfiles[identifier]);
							// user uploaded more than 'maxfiles'
							break;
						case 'FileTooLarge':
							alert(err_filesize);
							// program encountered a file whose size is greater than 'maxfilesize'
							// FileTooLarge also has access to the file which was too large
							// use file.name to reference the filename of the culprit file
							break;
						case 'FileTypeNotAllowed':
							var err_filetype = file_type + ' "' + file.type + '" ' + text1 + ' \n ' + allowedTypes.join('\n') + '';
							alert(err_filetype);
							// The file type is not in the specified list 'allowedfiletypes'
							break;
						case 'FileExtensionNotAllowed':
							alert(err_fileext);
							// The file extension is not in the specified list 'allowedfileextensions'
							break;
						default:
							break;
					}
				},
				allowedfiletypes: allowedTypes,   // filetypes allowed by Content-Type.  Empty array means no restrictions
				allowedmediafiletypes: allowedMediaTypes,
				allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
				maxfiles: maxFiles,
				maxfilesize: maxFileSize,	// max file size in MBs
				err_maxfiles: err_maxfiles.replace("%maxfiles%",maxFiles),
				maxmediafilesize: maxMediaFileSize, // max images file size in KB's
				dragOver: function (obj,e) {
					var id = this.id.replace("dropzone-","");
					$('#dropzone-' + id).addClass('hover').find('.dropzone-msg').html(msg_hover);
				},
				dragLeave: function () {
					if(($('#preview-' + this.id+" > div").length+1) > this.maxfiles && this.maxfiles != 1){
						return;
					}
					//console.info('Leaving dropzone');
					$('#dropzone-' + this.id).removeClass('hover').find('.dropzone-msg').html(msgidle);
				},
				docOver: function () {
					// user dragging files anywhere inside the browser document window
				},
				docLeave: function () {
					// user dragging files out of the browser document window
				},
				drop: function () {
					if(($('#preview-' + this.id+" > div").length+1) > this.maxfiles && this.maxfiles != 1){
						return;
					}
					// user drops file
					//console.info('File dropped');
					//$('#modal .modal-content .files').html('');
					//$('#dropzone-'+this.id+' .file-upload-totals').find('div.progress-bar').removeClass('finished');
					//$('#dropzone-'+this.id+' .file-upload-totals').find('div.progress').css('width', '0%');
					//$('#shade,#modal').addClass('show');
					totalUploadSize = 0;
					dropped = 0;
					//$('.cancel-btn').show();
				},
				uploadStarted: function (i, file, len) {
					if(($('#preview-' + this.id+" > div").length+1) > this.maxfiles && this.maxfiles != 1){
						return;
					}
					// console.info('Start upload.');
					$($('#dropzone-'+this.id+' .file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-upload');
					// a file began uploading
					// i = index => 0, 1, 2, 3, 4 etc
					// file is the actual file of the index
					// len = total files user dropped
				},
				uploadFinished: function (i, file, response, time){
					if(($('#dropzone-'+this.id+' #preview-' + this.id+" > div").length+1) > this.maxfiles && this.maxfiles != 1){
						return;
					}
					if (response.status) {
						if(this.multiple){
							$('#images-'+ this.id).val($('#images-'+ this.id).val() + ',' + response.mediaid);
						}else{
							$('#images-'+ this.id).val(response.mediaid);
						}
						//console.info('Start finished.', file);
						$($('#dropzone-'+this.id+' .file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-check');
						$($('#dropzone-'+this.id+' .file-upload-preview').get(i)).find('div.progress-bar').addClass('finished');
						
						// response is the data you got back from server in JSON format.
						var imgUrl = '/' + response.webpath;
						var splitted = imgUrl.split('.');
						var extention = splitted[splitted.length -1];
						var classname = '';
						switch (extention) {
							case 'pdf':
								classname = "fas fa-file-pdf";
								break;
							case 'zip':
								classname = 'fas fa-file-archive';
								break;
							case 'ppt', 'pptx':
								classname = 'fas fa-file-powerpoint';
								break;
							case 'docx':
								classname = 'fas fa-file-word';
								break;
							case 'xlsx':
								classname = 'fas fa-file-excel';
								break;
						}
						var fileEl = '<div class="item preview-element" data-mediaid="' + response.mediaid + '">\
											<div class="media-preview-wrap ' + classname + '">';
						if(classname == ''){
							fileEl = fileEl + '<img class="media-preview" src="' + imgUrl + '" alt="">';
						}						
						fileEl = $(fileEl + '</div>\
											<div class="media-preview-buttons">\
												<a class="edit"><i class="fa fa-edit"></i> Wijzigen</a>\
											</div>\
										</div>');
						$('#preview-' + this.id).closest(".upload-multiple-image").prepend('<a class="delete" onclick="deleteMedia(this,' + response.mediaid + ',\''+this.id+'\');"><i class="far fa-trash-alt"></i> ' + lbl_delete + '</a>');
						if(this.multiple){
							$('#preview-' + this.id).append(fileEl);
						}else{
							$('#preview-' + this.id).html(fileEl);
						}
						refreshMedia(this.id);
						$('#images-' + this.id).val(response.mediaid);
					}
				},
				progressUpdated: function (i, file, progress) {
					// console.info('File progress:', progress, file);
					$($('#dropzone-'+this.id+' .file-upload-preview').get(i)).find('div.progress').css('width', progress + '%');
					// this function is used for large files and updates intermittently
					// progress is the integer value of file being uploaded percentage to completion
				},
				globalProgressUpdated: function (progress) {
					// console.info('Global progress:', progress);
					$('#dropzone-'+this.id+' .file-upload-totals').find('div.progress').css('width', progress + '%');
					// progress for all the files uploaded on the current instance (percentage)
					// ex: $('#progress div').width(progress+"%");
				},
				speedUpdated: function (i, file, speed) {
					// console.info('Speed changed:', speed, file);
					// $('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
					// speed in kb/s
				},
				rename: function (name) {
					// console.info('Rename:', name);
					// name in string format
					// must return alternate name as string
				},
				beforeEach: function (file) {
					// console.info('Before file', file);
					var date = new Date(file.lastModified);
					var months = ['jan.', 'feb.', 'mar.', 'apr.', 'may.', 'jun.', 'jul.', 'aug.', 'sep.', 'oct.', 'nov.', 'dec.'];
					var year = date.getFullYear();
					var month = months[date.getMonth()];
					var day = date.getDate();
					var hour = date.getHours();
					var min = date.getMinutes();
					var sec = date.getSeconds();
					var fileInfo = $('<div class="file-upload-preview"> \
									<span class="label"><i class="fa fa-fw fa-clock-o"></i>' + file.name + '</span> \
									<div class="right"> \
											<span class="modified">' + day + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec + '</span> \
											<span class="size">' + humanFileSize(file.size, 1) + '</span> \
											<span class="progress">0 %</span> \
											<a href="#" class="delete"></a> \
									</div> \
									<div class="progress-bar"><div class="progress" style="width:0%;"></div></div> \
							</div>');
					//alert(fileInfo);
					totalUploadSize += file.size;
					$('#dropzone-'+this.id+' .file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
					dropped++;
					// file is a file object
					// return false to cancel upload
				},
				beforeSend: function (file, i, done) {
					//console.log("testing "+$('#preview-' + this.id+" > div").length+" "+this.err_maxfiles);
					if(($('#preview-' + this.id+" > div").length+1) > this.maxfiles && this.maxfiles != 1){
						$('#dropzone-' + this.id+' .dropzone-msg').html(this.err_maxfiles);
						return;
					}
					if (dropped <= 0) {
						$('#dropzone-'+this.id+' .totals').hide();
					}
					// console.info('Before send', file);
					// file is a file object
					// i is the file index
					// call done() to start the upload
					done(); // Start upload
					$('#dropzone-' + this.id).removeClass('hover').find('.dropzone-msg').html(msg_uploading)
				},
				afterAll: function () {
					if(($('#preview-' + this.id+" > div").length+1) > this.maxfiles && this.maxfiles != 1){
						$('#dropzone-' + this.id+' .dropzone-msg').html(this.err_maxfiles);
						return;
					}
					//console.log('after all');
					// console.info('After all');
					// runs after all files have been uploaded or otherwise dealt with
					$('#dropzone-'+this.id+' .file-upload-totals').find('div.progress-bar').addClass('finished');
					$('#dropzone-' + this.id).removeClass('hover').find('.dropzone-msg').html(msg_done_idle)

					// window.location = window.location.href;
					//$('#shade,#modal').removeClass('show');
				}
			}).find('.dropzone-msg').html(msgidle);
		}
	
		setTimeout(function() {
			var googleRecapthaUrl = '//www.google.com/recaptcha/api.js';
			googleRecapthaUrl = googleRecapthaUrl + '?render=' + recaptchaSiteKey;

			var script = document.createElement( "script" );
			script.src = googleRecapthaUrl;
			script.type = "text/javascript";
			document.getElementsByTagName("head")[0].appendChild( script );
			// deplay the rest so the browser has time to load the javascript
			if(typeof recaptchaSiteKey !== 'undefined'){
				setTimeout(function() {
					grecaptcha.ready(function() {
						grecaptcha.execute(recaptchaSiteKey, {action: 'homepage'}).then(function(token) {
							$('#g-recaptcha-response-alt').val(token);
						});

						function resetRecaptcha(grecaptcha) {
							grecaptcha.execute(recaptchaSiteKey, {action: 'homepage'}).then(function(token) {
								$('#g-recaptcha-response-alt').val(token);
							});
							clearInterval(this);
						}
						setInterval(resetRecaptcha, 60000, grecaptcha);
					});
					}, 400);
			}
			
		}, 400);
		setTimeout(function() {
			//filedrop('certificate_file',$.merge(allowedDocTypes, allowedMediaTypes));
			filedrop('certificate_file',$.merge(allowedDocTypes, allowedMediaTypes));
			filedrop('logo',allowedMediaTypes);
			filedrop('header',allowedMediaTypes);
			filedrop('fotosummary',allowedMediaTypes);
			filedrop('fotocontactus',allowedMediaTypes);
			filedrop('fotoaboutus',allowedMediaTypes);
			filedrop('gallery-1',allowedMediaTypes);
			filedrop('gallery-2',allowedMediaTypes);
			filedrop('gallery-3',allowedMediaTypes);
			filedrop('gallery-4',allowedMediaTypes);
			filedrop('gallery-5',allowedMediaTypes);
		}, 1000);
	}
})

function refreshMedia(id) {
	var newMedialist = [];
	if($("#preview-"+id).length == 0)return;
	$("#preview-"+id).children(function(){
		var id = $(this).data('mediaid');
		newMedialist.push(id);
	});
	$('#images-' + id).val(newMedialist.join(','));
}

function deleteMedia(obj, media, objId) {
	if(confirm(lbl_confirm)){
		$(obj).next().find('.preview-element').remove();
		refreshMedia(objId);
		let msgidle = msg_idle;
		if(objId == "certificate_file")msgidle = 'Upload certificaat';
		$('#dropzone-'+ objId+" .dropzone-msg").html(msgidle);
		$(obj).remove();
	}
	return false;
}

function humanFileSize(size, dec) {
	dec = dec || 2;

	var i = Math.floor(Math.log(size) / Math.log(1024));
	return (size / Math.pow(1024, i)).toFixed(dec) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
}
