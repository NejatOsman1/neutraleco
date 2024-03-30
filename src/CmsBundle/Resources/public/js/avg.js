var AvgBar = function (options) {

	var avg_config = {
		'gtmCode': null,
		'gaCode': null,
		'gCode': null,

		'colors': {
			'background': '#333'
		},

		'lbl_info': 'Wij gebruiken cookies om uw gebruikservaring te optimaliseren.',

		'lbl_essential': 'Essentieel',
		'lbl_preferences': 'Voorkeuren',
		'lbl_statistics': 'Statistieken',
		'lbl_marketing': 'Marketing',

		'lbl_tooltip_essential': 'Noodzakelijke cookies helpen een website bruikbaarder te maken, door basisfuncties als paginanavigatie en toegang tot beveiligde gedeelten van de website mogelijk te maken. Zonder deze cookies kan de website niet naar behoren werken.',
		'lbl_tooltip_preferences': 'Voorkeurscookies zorgen ervoor dat een website informatie kan onthouden die van invloed is op het gedrag en de vormgeving van de website, zoals de taal van uw voorkeur of de regio waar u woont.',
		'lbl_tooltip_statistics': 'Statistische cookies helpen eigenaren van websites begrijpen hoe bezoekers hun website gebruiken, door anoniem gegevens te verzamelen en te rapporteren.',
		'lbl_tooltip_marketing': 'Marketingcookies worden gebruikt om bezoekers te volgen wanneer ze verschillende websites bezoeken. Hun doel is advertenties weergeven die zijn toegesneden op en relevant zijn voor de individuele gebruiker. Deze advertenties worden zo waardevoller voor uitgevers en externe adverteerders.',

		'lbl_back': 'Terug',
		'lbl_settings': 'Instellingen',
		'lbl_accept': 'Alle cookies toestaan',
		'lbl_save': 'Accepteren en sluiten',
		'lbl_btn_reset': 'Cookie instellingen',

		'lbl_cookie_btn' : 'Cookie informatie',
		'lbl_privacy_btn' : 'Privacy statement',
		'lbl_disclaimer_btn' : 'Disclaimer',

		'reset_btn': true,
		'link_cookie': null,
		'link_privacy': null,
		'link_disclaimer': null,
		'reset_btn_position': 'bottom',
		'reset_btn_offset_right': 20,
		'css_file': false,
		'custom_css': false,
	};

	this.construct = function (options) {

		jQuery.extend(avg_config, options);

		var accepted = (this.gc('avg-accept') != null);

		if (avg_config.gaCode) {
			(function (d, script) {
				script = d.createElement('script');
				script.type = 'text/javascript';
				script.async = true;
				script.onload = function () {
					setTimeout(function () {
						ga('create', avg_config.gaCode, 'auto');
						ga('send', 'pageview');

						if (typeof executeAvg == 'function') {
							executeAvg();
						}

						if (typeof avg_config.webshop != 'undefined') {
							ga('require', 'ecommerce');

							if (typeof executeAvgWebshop == 'function') {
								executeAvgWebshop();
							}
						}
					}, 1000)
				}.bind(this);
				script.src = 'https://www.google-analytics.com/analytics.js';
				d.getElementsByTagName('head')[0].appendChild(script);
			}.bind(this)(document));
		}
		if (avg_config.gCode) {
			(function (d, script) {
				script = d.createElement('script');
				script.type = 'text/javascript';
				script.async = true;
				script.onload = function () {
					setTimeout(function () {
						window.dataLayer = window.dataLayer || [];
						function gtag() {
							dataLayer.push(arguments);
						}
						gtag('js', new Date());

						gtag('config', avg_config.gCode);


						if (typeof executeAvg == 'function') {
							executeAvg();
						}
					}, 1000)
				}.bind(this);
				script.src = 'https://www.googletagmanager.com/gtag/js?id=' + avg_config.gCode;
				d.getElementsByTagName('head')[0].appendChild(script);
			}.bind(this)(document));
		}

		// var accepted = false;
		if (!accepted) {
			this.dr();
			this.se();
			this.lr();
		} else {
			if (avg_config.reset_btn) {
				this.rb();
			}
			this.lr();
		}

		// scrollHeight is document height, clientHeight is the viewport height
		if (document.documentElement.scrollHeight <= document.documentElement.clientHeight) {
			setTimeout(function () {
				e.preventDefault();
				this.rst();
			}, 5000);
		}
	}

	this.rb = function () {
		var avgBarBtn = document.createElement("a");
		avgBarBtn.className = 'avg-cookiebar-reset position-' + avg_config.reset_btn_position;
		avgBarBtn.innerHTML = avg_config.lbl_btn_reset + ' <?xml version="1.0" ?><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg>';
		avgBarBtn.style.background = avg_config.colors.background;
		avgBarBtn.style.color = avg_config.colors.text;
		avgBarBtn.style.right = avg_config.reset_btn_offset_right + 'px';
		document.body.appendChild(avgBarBtn);

		avgBarBtn.addEventListener('click', function (e) {
			e.preventDefault();
			this.rst();
		}.bind(this));
	}

	this.rst = function () {
		document.cookie = 'avg-accept=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		this.dr();
		this.se();
		this.lr();

		$('.avg-cookiebar').addClass('shown');
	}

	this.lr = function () {
		if (avg_config.gtmCode) {
			if ($('script#avg-gtm').length > 0) {
				return;
			}

			setTimeout(function () {
				(function (d, script) {
					script = d.createElement('script');
					script.id = 'avg-gtm';
					script.type = 'text/javascript';
					script.async = true;
					script.innerHTML = '(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\': new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],' +
							'j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\'//www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);' +
							'})(window,document,\'script\',\'dataLayer\',\'' + avg_config.gtmCode + '\');';
					d.getElementsByTagName('head')[0].appendChild(script);
				}.bind(this)(document));
			}, 6500, avg_config);
		}
	}

	this.se = function () {
		Array.prototype.forEach.call(this.avgBar.querySelectorAll('a.btn-accept'), function (el, i) {
			el.addEventListener('click', function (e) {
				e.preventDefault();
				this.sv(true);
			}.bind(this));
		}.bind(this));

		Array.prototype.forEach.call(this.avgBar.querySelectorAll('a.btn-close'), function (el, i) {
			el.addEventListener('click', function (e) {
				e.preventDefault();
				this.sv(false);
			}.bind(this));
		}.bind(this));

		this.avgBar.querySelector('a.btn-settings').addEventListener('click', function (e) {
			e.preventDefault();
			this.avgBar.querySelector('.avg-content').style.display = 'none';
			this.avgBar.querySelector('.avg-settings').style.display = 'block';
		}.bind(this));

		this.avgBar.querySelector('a.btn-back').addEventListener('click', function (e) {
			e.preventDefault();
			this.avgBar.querySelector('.avg-content').style.display = 'block';
			this.avgBar.querySelector('.avg-settings').style.display = 'none';
		}.bind(this));

		Array.prototype.forEach.call(this.avgBar.querySelectorAll('span.checkbox'), function (el, i) {
			var tt = document.createElement("div");
			tt.className = 'tooltip';
			tt.innerHTML = el.dataset.info;
			el.appendChild(tt);
			el.querySelector('svg').addEventListener('mouseover', function (e) {
				e.preventDefault();
				this.avgBar.querySelectorAll('.tooltip').forEach(function (tt) {
					tt.style.opacity = 0;
				});
				el.querySelector('.tooltip').style.opacity = 1;
			}.bind(this));
			el.querySelector('svg').addEventListener('mouseout', function (e) {
				e.preventDefault();
				this.avgBar.querySelectorAll('.tooltip').forEach(function (tt) {
					tt.style.opacity = 0;
				});
			}.bind(this));
		}.bind(this));
	}

	this.dr = function () {
		this.avgBar = document.createElement("div");
		this.avgBar.className = 'avg-cookiebar';
		// this.avgBar.style.background = avg_config.colors.background;
		this.avgBar.style.color = avg_config.colors.text;
		document.body.appendChild(this.avgBar);

		window.addEventListener('scroll', function () {
			if (window.pageYOffset > 150) {
				this.avgBar.classList.add('shown');
			}
			if (window.pageYOffset < 150) {
				this.avgBar.classList.remove('shown');
			}
		}.bind(this));

		var linkData = [];
		if (avg_config.link_cookie) {
			if (typeof avg_config.lbl_cookie_btn != 'undefined') {
				var cookie_btn = avg_config.lbl_cookie_btn;
			} else {
				var cookie_btn = 'Cookie informatie';
			}

			linkData.push('<a href="' + avg_config.link_cookie + '"><i class="fa fa-info-circle"></i> ' + cookie_btn + '</a>');
		}
		if (avg_config.link_privacy) {
			if (typeof avg_config.lbl_privacy_btn != 'undefined') {
				var privacy_btn = avg_config.lbl_privacy_btn;
			} else {
				var privacy_btn = 'Privacy statement';
			}

			linkData.push('<a href="' + avg_config.link_privacy + '"><i class="fa fa-lock"></i> ' + privacy_btn + '</a>');
		}
		if (avg_config.link_disclaimer) {
			if (typeof avg_config.lbl_disclaimer_btn != 'undefined') {
				var disclaimer_btn = avg_config.lbl_disclaimer_btn;
			} else {
				var disclaimer_btn = 'Disclaimer';
			}

			linkData.push('<a href="' + avg_config.link_disclaimer + '"><i class="far fa-file"></i> ' + disclaimer_btn + '</a>');
		}

		var avgContent = document.createElement("div");
		avgContent.className = 'avg-content';
		avgContent.innerHTML = '<div class="wrapper">\
			<div class="content">\
				<p>' + avg_config.lbl_info + '</p>\
			</div>\
			<div class="actions">\
				<a href="#" class="btn-close"><?xml version="1.0" encoding="iso-8859-1"?>\
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="22px" height="22px">\
					  <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3 s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z" fill="#FFFFFF"/>\
					</svg>\
				</a>\
				<a href="#" class="btn-avg btn-close">\
					<?xml version="1.0" encoding="iso-8859-1"?>\
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="22px" height="22px">\
					  <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3 s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z" fill="#FFFFFF"/>\
					</svg>\
				</a>\
				<a href="#" class="btn-avg btn-settings"><i class="fa fa-cog"></i>\
				</a>\
				<a href="#" class="btn-avg btn-accept">' + avg_config.lbl_accept + ' <?xml version="1.0" ?><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6	 c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg></a>\
	' + '\
			</div>\
		</div>';
		this.avgBar.appendChild(avgContent);

		var infoSvg = '<?xml version="1.0" encoding="iso-8859-1"?>\
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="14px" height="14px">\
					  <path d="M11,2.13602913 C15.8987379,2.13602913 19.8640777,6.10035437 19.8640777,11 C19.8640777,15.8986845 15.8995388,19.8639709 11,19.8639709 C6.10136893,19.8639709 2.13592233,15.8995922 2.13592233,11 C2.13592233,6.10120874 6.10035437,2.13602913 11,2.13602913 Z M11,0.000106796117 C4.92484951,0.000106796117 0,4.92479612 0,11 C0,17.0750437 4.92484951,21.9998932 11,21.9998932 C17.0750971,21.9998932 22,17.0750437 22,11 C22,4.92479612 17.0750971,0.000106796117 11,0.000106796117 Z M10.8166311,17.1839223 C9.31027184,17.7132573 8.0684466,17.1062282 8.31754854,15.659568 C8.56675728,14.2125874 9.9961699,11.1149126 10.2000971,10.5291359 C10.4038641,9.94335922 10.0130971,9.78279126 9.59424272,10.0211602 C9.3526699,10.1605291 8.99362136,10.4398544 8.68540777,10.7113301 C8.59991748,10.5392282 8.47971845,10.3425631 8.38947573,10.1542282 C8.89243204,9.65020388 9.73318447,8.97445146 10.7284709,8.72951456 C11.9176456,8.43598544 13.9052282,8.90519417 13.050966,11.1782427 C12.4409466,12.7983398 12.0095437,13.9162816 11.7376942,14.7488641 C11.4660049,15.581767 11.7886893,15.7563786 12.2643592,15.4318786 C12.6359563,15.1781845 13.0317961,14.8330728 13.3219612,14.5654417 C13.4562573,14.7836262 13.4991893,14.8532039 13.6319903,15.1039078 C13.1282864,15.6202136 11.8106893,16.8284515 10.8166311,17.1839223 Z M13.9377476,7.16212136 C13.2545194,7.74367961 12.2418252,7.73107767 11.6752718,7.13371359 C11.1088786,6.5366699 11.2033932,5.58111165 11.8864612,4.9994466 C12.5696359,4.41794175 13.5825437,4.43054369 14.1489369,5.02748058 C14.7152767,5.62479126 14.6208689,6.58029612 13.9377476,7.16212136 Z"></path>\
					</svg>';

		var avgSettings = document.createElement("div");
		avgSettings.className = 'avg-settings';
		avgSettings.innerHTML = '\
		<div class="wrapper">\
			<div class="content">\
				<p><strong>' + avg_config.lbl_settings + '</strong></p>\
				<p>' + avg_config.lbl_settings_info + '</p>\
				<span class="checkbox" data-info="' + avg_config.lbl_tooltip_essential + '"><label><input type="checkbox" checked="checked" id="avg-chk-essential" disabled="disabled" />' + avg_config.lbl_essential + '</label>' + infoSvg + '</span>\
				<!-- <span class="checkbox" data-info="' + avg_config.lbl_tooltip_preferences + '"><label><input type="checkbox" checked="checked" id="avg-chk-preferences" />' + avg_config.lbl_preferences + '</label>' + infoSvg + '</span> -->\
				<!-- <span class="checkbox" data-info="' + avg_config.lbl_tooltip_statistics + '"><label><input type="checkbox" checked="checked" id="avg-chk-statistics" />' + avg_config.lbl_statistics + '</label>' + infoSvg + '</span> -->\
				' + (avg_config.gtmCode != null || avg_config.gaCode != null ? '<span class="checkbox" data-info="' + avg_config.lbl_tooltip_marketing + '"><label><input type="checkbox" checked="checked" id="avg-chk-marketing" />' + avg_config.lbl_marketing + '</label>' + infoSvg + '</span>' : '') + '\
			</div>\
			<div class="actions">\
				<a href="#" class="btn-avg btn-close">\
					<?xml version="1.0" encoding="iso-8859-1"?>\
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="22px" height="22px">\
						<path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3 s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z" fill="#FFFFFF"/>\
					</svg>\
				</a>\
				<a href="#" class="btn-avg btn-back">' + avg_config.lbl_back + '</a>\
				<a href="#" class="btn-avg btn-accept">' + avg_config.lbl_save + ' <?xml version="1.0" ?><svg style="enable-background:new 0 0 24 24;" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="info"/><g id="icons"><path d="M10,18c-0.5,0-1-0.2-1.4-0.6l-4-4c-0.8-0.8-0.8-2,0-2.8c0.8-0.8,2.1-0.8,2.8,0l2.6,2.6l6.6-6.6   c0.8-0.8,2-0.8,2.8,0c0.8,0.8,0.8,2,0,2.8l-8,8C11,17.8,10.5,18,10,18z" id="check"/></g></svg></a>\
			' + (linkData.length > 0 ? '<div class="footer-links">' + linkData.join('&nbsp;') + '</div>' : '') + '\
			</div>\
		</div>';
		this.avgBar.appendChild(avgSettings);

	}

	this.sv = function (scb) {
		this.dc(scb);
		// this.lr();

		if (avg_config.reset_btn) {
			this.rb();
		}
	}

	this.dc = function (scb) {
		var enabled = ['essential'];
		if (scb) {
			if (document.getElementById('avg-chk-marketing') && document.getElementById('avg-chk-marketing').checked) {
				enabled.push('marketing');
			}
		}
		this.sc('avg-accept', enabled.join(','), 30);
		this.avgBar.parentNode.removeChild(this.avgBar);
	}

	this.gc = function (name) {
		var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
		return v ? v[2] : null;
	}

	this.sc = function (name, value, days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "") + expires + "; path=/";
	}

	this.mo = function (obj1, obj2) {
		var obj3 = {};
		for (var attrname in obj1) {
			obj3[attrname] = obj1[attrname];
		}
		for (var attrname in obj2) {
			obj3[attrname] = obj2[attrname];
		}
		return obj3;
	}

	this.construct(options);
}
