var passes = {'pass-number'  : '[0-9]+', 'pass-letter'  : '[a-z]+', 'pass-capital' : '[A-Z]+', 'pass-chars'   : '[.,\\-=!#%@]+'};
var passwordHelper = function(fields){
	console.info('passwordHelper');
	if(typeof fields != 'undefined'){
		if(fields.length > 0){
			checkPasswordField(fields.first());
		}
	}else{
		if($('input[type="password"]').not('.no-validate').length > 0){
			checkPasswordField($('input[type="password"]').not('.no-validate').first());
		}
	}
}

var checkPasswordField = function(pwdField){
	var container = pwdField.parent();
	var offsetLeft = pwdField.position().left;
	var pwdWidth = pwdField.outerWidth();
	var pwdHeight = pwdField.outerHeight();
	var passes_s = 0;

	var prog_off = ((pwdField.position().top + pwdHeight) - 5);

	container.css('position', 'relative');

	if($('.passtip').length == 0){
		container.append($('<div class="passtip">\
			<span class="hint pass-length">' + (typeof pass_length != 'undefined' ? pass_length : 'Minimaal 8 tekens.') + '</span>\
			<span class="hint pass-number">' + (typeof pass_number != 'undefined' ? pass_number : 'Minimaal één cijfer.') + '</span>\
			<span class="hint pass-letter">' + (typeof pass_letter != 'undefined' ? pass_letter : 'Minimaal één kleine letter.') + '</span>\
			<span class="hint pass-capital">' + (typeof pass_capital != 'undefined' ? pass_capital : 'Minimaal één hoofdletter.') + '</span>\
			<span class="hint pass-chars">' + (typeof pass_chars != 'undefined' ? pass_chars : 'Minimaal één van de volgende tekens:') + ' . , \ - = ! @ # %</span>\
		</div>'));
	}

	if($('.passloader').length == 0){
		container.append($('<div class="passloader" style="width: 0px;top: ' + prog_off + 'px;"></div>'));
	}

	pwdField.keyup(function(){
		verifyPasswordFormat(pwdField);
	});
}

var verifyPasswordFormat = function(pwdField){
	var v = pwdField.val();
	if(v.length > 0){
		$('.passtip').addClass('show');
		$('.pass-length,.pass-number,.pass-letter,.pass-capital,.pass-chars').removeClass('valid');
		passes_s = 0;
		if(v.length >= 8){ $('.pass-length').addClass('valid'); passes_s += 1; }
		$.each(passes, function(cl, reg){
			if(v.match(reg)){ $('.' + cl).addClass('valid'); passes_s += 1; }
		});

		var prog = ((100 / (Object.keys(passes).length + 1)) * passes_s);
		$('.passloader').width(prog + '%');
		$('.passloader').removeClass('bad');
		$('.passloader').removeClass('medium');
		$('.passloader').removeClass('good');
		if(prog > 25 && prog <= 90){
			$('.passloader').addClass('medium');
			$(pwdField).removeClass('valid');
		}else if(prog > 90){
			$('.passloader').addClass('good');
			$(pwdField).addClass('valid');
		}else{
			$('.passloader').addClass('bad');
			$(pwdField).removeClass('valid');
		}
	}else{
		$('.passtip').removeClass('show');
		$('.passloader').width('0%');
		$('.passloader').removeClass('bad');
	}
}

// Run the helper
passwordHelper();