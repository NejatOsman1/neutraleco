var submitLbl = '';

$(function() {
	// AVG bar
    //console.log(avg_settings);

    if (typeof avg_settings != 'undefined') {
    	var ab = new AvgBar({
            'webshop': avg_settings.webshop,
            'gtmCode': avg_settings.gtmCode,
            'gaCode': avg_settings.gaCode,
            'gCode': avg_settings.gCode,
            'lbl_info' : avg_settings.lbl_info,
            'lbl_settings_info' : avg_settings.lbl_settings_info,

            'lbl_essential' : avg_settings.lbl_essential,
            'lbl_preferences' : avg_settings.lbl_preferences,
            'lbl_statistics' : avg_settings.lbl_statistics,
            'lbl_marketing' : avg_settings.lbl_marketing,

            'lbl_tooltip_essential' : avg_settings.lbl_tooltip_essential,
            'lbl_tooltip_preferences' : avg_settings.lbl_tooltip_preferences,
            'lbl_tooltip_statistics' : avg_settings.lbl_tooltip_statistics,
            'lbl_tooltip_marketing' : avg_settings.lbl_tooltip_marketing,

            'lbl_back' : avg_settings.lbl_back,
            'lbl_settings' : avg_settings.lbl_settings,
            'lbl_accept' : avg_settings.lbl_accept,
            'lbl_save' : avg_settings.lbl_save,
            'lbl_btn_reset' : avg_settings.lbl_btn_reset,

            'link_cookie' : avg_settings.link_cookie,
            'link_privacy' : avg_settings.link_privacy,
            'link_disclaimer' : avg_settings.link_disclaimer,

            'reset_btn' : avg_settings.reset_btn,
            'reset_btn_position' : avg_settings.reset_btn_position,
            'reset_btn_offset_right' : avg_settings.reset_btn_offset_right,
        });
    }

	// framework_hero_video block block
	if ($(window).width() > 768) {
		var sources = document.querySelectorAll('video.video-js source');
		var video = document.querySelector('video.video-js');
		for (var i = 0; i < sources.length; i++) {
			sources[i].setAttribute('src', sources[i].getAttribute('data-src'));
		}
		
		if (video) {
			video.load();
		}
	}

	// Youtube video & vimeo video activation code
	// needed?
	/*
	function activateVideo(el, env, url){
		var nel = $('<div>Ongeldige video</div>');
		if(env == 'youtube'){
			nel = $('<div class="embed-container"><iframe id="ytplayer" type="text/html" width="720" height="405" data-src="' + url + '" frameborder="0" allowfullscreen></iframe></div>');
		}else if(env == 'vimeo'){
			nel = $('<div class="embed-container"><iframe width="720" height="405" data-src="' + url + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>');
		}

		var ps = $(el).closest('.video-preset');
		ps.replaceWith(nel);
	}*/

	// reCaptcha script loading
	if(document.querySelector("div.recaptcha-wrapper") != null){
		if(typeof recaptcha == 'undefined'){

			// reCaptcha check
			if (typeof recaptchaSiteKey !== 'undefined' && $('#g-recaptcha-response-alt').length > 0) {	
				setTimeout(function() {
					var googleRecapthaUrl = '//www.google.com/recaptcha/api.js';
					if (googleRecaptchaMode == '3_invisible') {
						googleRecapthaUrl = googleRecapthaUrl + '?render=' + googleRecaptchaSitekey;
					}

					var script = document.createElement( "script" );
					script.src = googleRecapthaUrl;
					script.type = "text/javascript";
					document.getElementsByTagName("head")[0].appendChild( script );

					// deplay the rest so the browser has time to load the javascript
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
				}, 6500)
			}
		}
	}

	// load iframe with a delay
	setTimeout(function() {
		$('iframe').each(function(){
			if ($(this).data('src') !== 'undefined') {
				$(this).attr("src", $(this).data('src'));
			}
		});
	}, 4000);

	function checkRecaptchaPresence(form){
		setTimeout(function(){
			if($('#g-recaptcha-response-alt').val() != ''){
				form.find('button[type="submit"]').html(submitLbl);
				form.find('button[type="submit"]').removeClass('disabled').prop('disabled', false);
			}else{
				checkRecaptchaPresence(form);
			}
		}, 200);
	}

	if($('#g-recaptcha-response-alt').length > 0){
		let form = $('#g-recaptcha-response-alt').closest('form');
		form.find('button[type="submit"]').addClass('disabled').prop('disabled', true);
		submitLbl = form.find('button[type="submit"]').html();

		form.find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin" style="margin-right: 10px;"></i>' + submitLbl);

		checkRecaptchaPresence(form);
	}
});

var submitLoaderLabel = '';
function enableSubmitLoader(form){
	form.find('button[type="submit"]').addClass('disabled').prop('disabled', true);
	submitLoaderLabel = form.find('button[type="submit"]').html();

	form.find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin" style="margin-right: 10px;"></i>' + submitLoaderLabel);
}

function disableSubmitLoader(form){
	form.find('button[type="submit"]').html(submitLoaderLabel);
	form.find('button[type="submit"]').removeClass('disabled').prop('disabled', false);
}