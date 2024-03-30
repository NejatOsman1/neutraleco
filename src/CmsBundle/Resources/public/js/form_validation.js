function checkValidation(callback, src_el)
{
    const hasCallback = (typeof callback == 'function');

    var invalidCount = 0;
	$('input.validate[type="text"], input.validate[type="email"], input.validate[type="password"], select.validate').each(function(ind, el){
        if(hasCallback || (!hasCallback && src_el == el)){
            if(!$(el).prop('disabled') && !$(el).prop('readonly')){
                var valid = true;
                if(typeof $(el).prop('pattern') != 'undefined' && $(el).prop('pattern') != ''){
                    // Validate pattern
                    let pattern = $(el).prop('pattern');
                    valid = $(el).val().match(pattern) != null;
                }
                if($(el).prop('required')){
                    // Required field
                    if($(el).val() != '' && valid){
                        $(el).parent().addClass('valid_input').removeClass('invalid_input');
                    }else{
                        $(el).parent().addClass('invalid_input').removeClass('valid_input');
                        invalidCount++;
                    }
                }else{
                    if($(el).val() != ''){
                        $(el).parent().addClass('valid_input').removeClass('invalid_input');
                    }else{
                        $(el).parent().removeClass('valid_input').removeClass('invalid_input');
                    }
                }
            }
        }
	});

    /* Check checkboxes */
    $('input.validate[type="checkbox"]').each(function(ind, el){
        if($(el).prop('required')){
            console.log('Checkbox');
            if($(el).is(':checked')){
                console.log('Checked');
                $(el).parent().addClass('valid_input').removeClass('invalid_input');
            }else{
                console.log('NOT Checked');
                $(el).parent().addClass('invalid_input').removeClass('valid_input');
            }
        }
    });

    if($('#form_plainPassword_first').length > 0 && $('#form_plainPassword_second').length > 0 && $('#form_plainPassword_first').val() != '' && $('#form_plainPassword_second').val() != ''){
        if($('#form_plainPassword_first').val() != $('#form_plainPassword_second').val()){
            invalidCount++;
            // $('#form_plainPassword_first,#form_plainPassword_second').parent().removeClass('valid_input').addClass('invalid_input');
            $('#form_plainPassword_first,#form_plainPassword_second').parent().removeClass('valid_input').addClass('warning_input');
        }else{
            // $('#form_plainPassword_first,#form_plainPassword_second').parent().removeClass('invalid_input').addClass('valid_input');
            $('#form_plainPassword_first,#form_plainPassword_second').parent().removeClass('warning_input').addClass('valid_input');
        }
    }

    if($('#password1').length > 0 && $('#password2').length > 0 && $('#password1').val() != '' && $('#password2').val() != ''){
        if($('#password1').val() != $('#password2').val()){
            invalidCount++;
            // $('#password1,#password2').parent().removeClass('valid_input').addClass('invalid_input');
            $('#password1,#password2').parent().removeClass('valid_input').addClass('warning_input');
        }else{
            // $('#password1,#password2').parent().removeClass('invalid_input').addClass('valid_input');
            $('#password1,#password2').parent().removeClass('warning_input').addClass('valid_input');
        }
    }
            
    console.log(invalidCount);
    if(invalidCount > 0){
        // Form is invalid
        console.log('Invalid');
    }else{
        console.log('Valid');
        if(hasCallback){
            console.log('Callback');
            callback($(src_el).closest('form'));
        }
    }
}

$(function(){
	$('input.validate, select.validate').each(function(ind, el){
		if(el.tagName == 'SELECT'){
            $(el).change(function(){
                checkValidation(null, el);
            });
        }
        if(el.tagName == 'INPUT'){
            $(el).blur(function(){
                checkValidation(null, el);
            });
        }
	});

    $('input.validate').closest('form').find('[type="submit"]').click(function(e){
        e.preventDefault();
        checkValidation(function(form){
            console.log('ALRIGHT');
            form.submit();
        }, this);
    });

    if($('#check-address-manual').length > 0){
        $('#check-address-manual').click(function(){
            toggleAddressValidation(this);
        });
    }
});

function toggleAddressValidation(chk){
    console.log(chk, chk.checked);
	if(chk.checked){
		$('#form_street').addClass('validate');
		$('#form_street').prop('required', true);

		$('#form_city').addClass('validate');
		$('#form_city').prop('required', true);
		
		$('#form_country').addClass('validate');
		$('#form_country').prop('required', true);
	}else{
		$('#form_street').removeClass('validate');
		$('#form_street').parent().removeClass('invalid_input');
		$('#form_street').prop('required', false);

		$('#form_city').removeClass('validate');
		$('#form_city').parent().removeClass('invalid_input');
		$('#form_city').prop('required', false);
		
		$('#form_country').removeClass('validate');
		$('#form_country').parent().removeClass('invalid_input');
		$('#form_country').prop('required', false);
	}
}