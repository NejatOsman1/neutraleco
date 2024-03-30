var dragType = null;

jQuery('.toolbox span').off('dragstart').on('dragstart', function(e){
	dragType = null;
	if(!jQuery(this).hasClass('form-block')){
		dragType = jQuery(this).data('type');
	}
});

jQuery('.form-editor').off('dragenter').on('dragenter', function(e){
	e.preventDefault();
});

jQuery('.form-editor').off('dragover').on('dragover', function(e){
	e.preventDefault();
});

jQuery('.form-editor').off('dragleave').on('dragleave', function(e){
	e.preventDefault();
});

jQuery('.form-editor').off('drop').on('drop', function(e){
	if(dragType){
		if($('.form-is-empty').length > 0){
			$('.form-is-empty').remove();
		}
		e.preventDefault();
		createFormRow(dragType);
		dragType = null;
	}
});

jQuery('.toolbox').find('span').click(function(e) {
	var dragType = $(this).data('type');

	if(dragType){
		if($('.form-is-empty').length > 0){
			$('.form-is-empty').remove();
		}
		e.preventDefault();
		createFormRow(dragType);
		dragType = null;
	}
});

function createFormRow(type, callback){
	jQuery.ajax(path + type + '?pos=' + $('.form-block').length).done(function(result){
		var formEntry = jQuery(result);
		jQuery('.form-editor').append(formEntry);
		setSorting(jQuery('.fields-parent'));
		setLabelHandlers();
		setValueHandlers();
		if(typeof callback != 'undefined'){
			callback();
		}

		formEntry.find('.modal').modal();
	});
}

function setSorting(parents){
	parents.sortable({
		handle: '.drag',
		placeholder: 'form-sortable-placeholder field-child form-block card',
		// helper: 'clone',
		connectWith: '.fields-parent',
		forcePlaceholderSize: true,
		start: function(event, ui){
			$(ui.item).addClass('dragging-el').removeClass('field-child');
			createHelperParents($(event.target));
	        ui.placeholder.height(ui.item.height());

			var children = $(event.target).find('.field-child');
			if(children.length){
				var width = (100 / children.length) + '%';
				children.css('width', width);
				// $(event.target).find('.row-width').val(width);
				$(ui.item).css('width', width);
			}
		},
		stop: function(event, ui){
			checkSortSizes();
			$(ui.item).removeClass('dragging-el').addClass('field-child');

			var children = $(ui.item).parent().find('.field-child');
			if(children.length){
				var width = (100 / children.length) + '%';
				children.css('width', width);
				// $(event.target).find('.row-width').val(width);
				$(ui.item).css('width', width);
				definePositions();
			}
			cleanupParents();
			equalizeHeight(true);
		},
		change: function(event, ui){
			checkSortSizes();
			var children = $(event.target).find('.field-child');
			if(children.length){
				var width = (100 / children.length) + '%';
				children.css('width', width);
				// $(event.target).find('.row-width').val(width);
				$(ui.item).css('width', width);
			}
		},
		drop: function(event, ui){
		}
	}).bind('sortupdate', function(e, ui) {
	});
}

$.expr[':'].blank = function(obj){
  return !$.trim($(obj).text()).length;
};

function createHelperParents(sourceParent){
	/*if(sourceParent.children().length == 2){
		sourceParent.hide();
	}*/

	// console.log( $('.fields-parent') );
	$.each($('.fields-parent'), function(i, p){
		if(p != firstNewList){
			var newList = $('<div class="fields-parent tmp"></div>').insertAfter($(p));
			setSorting(newList);
			jQuery('.fields-parent').sortable('refresh');
		}
	});

	var firstNewList = $('<div class="fields-parent tmp"></div>').insertBefore(jQuery('.fields-parent').first());
	setSorting(firstNewList);
	jQuery('.fields-parent').sortable('refresh');

	/*var newList = $('<div class="fields-parent tmp"></div>').insertBefore($('.fields-parent').last());
	setSorting(newList);
	jQuery('.fields-parent').sortable('refresh');*/

	/*$('<div class="fields-parent tmp"></div>').insertAfter($('.fields-parent'));
	setSorting();*/
}

function cleanupParents(){
	/*$.each($('.fields-parent:blank'), function(i,p){
	});*/
	$('.fields-parent.tmp').removeClass('tmp');
	$('.fields-parent:blank').remove();
}

function checkSortSizes(){
	$.each(jQuery('.fields-parent'), function(index, wrapper){
		var count = $(wrapper).find('.field-child').length;
		$(wrapper).find('.field-child').css('width', (100/count) + '%');
                $(wrapper).find('input.row-width').val(12/count);
	});
}

function setValueHandlers(){
	$('.add-child-value').each(function(ind, btn){
		$(btn).off('click').on('click', function(e){
			e.preventDefault();
			var id = $(this).closest('.form-block').data('id');
			var uniqid = Date.now();
			var n = $(this).closest('.form-block').find('.form-values-editor .field-option').length;
			// var question_index = $(this).parent().parent().index();
			// var val = $('<div data-preview="chk_' + uniqid + '" style="margin-bottom: 5px;" class="field-option"><input onkeyup="$(\'#chk_' + uniqid + '\').html(this.value);" type="text" name="values[' + id + '][]" value="Nieuwe optie" /></div>');
			var val = $('<div class="field-option" style="position:relative;margin-bottom:1rem;background: #f8f8f8;padding: 1rem;">\
				<div class="d-flex justify-content-between">\
					<div class="inputs w-100">\
						<input class="form-control mb-2" type="text" onkeyup="$(\'#chk_' + uniqid + '\').html(this.value);" name="values[' + id + '][' + n + ']" value="' + formeditor_newoption + '" />\
						<div class="checkbox">\
							<div class="form-check d-inline-block me-3">\
								<input class="form-check-input" type="checkbox" name="disabled[' + id + '][' + n + ']" id="disable_' + uniqid + '" value="1" />\
								<label class="form-check-label" for="disable_' + uniqid + '">' + formeditor_block + '</label>\
							</div>\
							<div class="form-check d-inline-block me-3">\
								<input class="form-check-input" type="checkbox" name="default[' + id + '][' + n + ']" id="default_' + uniqid + '" value="1" />\
								<label class="form-check-label" for="default_' + uniqid + '">' + formeditor_standard + '</label>\
								<!-- <input type="checkbox" name="mail[' + id + '][' + n + ']" id="mail_' + uniqid + '" value="1" />\
								<label style="margin-right:20px;" for="mail_' + uniqid + '">' + formeditor_email + '</label> -->\
							</div>\
						</div>\
					</div>\
					<div class="btns ms-3">\
						<button class="btn btn-small red btn-icon" type="button" onclick="$(this).parent().parent().parent().remove();"><i class="far fa-trash-alt"></i></button>\
					</div>\
				</div>\
			</div>');
			$(this).closest('.form-block').find('.form-values-editor').append(val);
			// val.prop('data-preview', id + '_' + val.index());
			console.log(this);
			var options = $(this).closest('.field-child').find('.options');
			if(options.length > 0){
				if(options.data('type') == 'checkbox'){
					$(options).append('<div class="form-check">\
						<input class="form-check-input" type="checkbox">\
						<label class="form-check-label" id="chk_' + uniqid + '" for="chk_' + uniqid + '">' + formeditor_newoption + '</label>\
					</div>');
				}else{
					$(options).append('<div class="form-check">\
						<input class="form-check-input" type="radio">\
						<label class="form-check-label" id="chk_' + uniqid + '" for="chk_' + uniqid + '">' + formeditor_newoption + '</label>\
					</div>');
				}
			}
		});
	});
}

function deleteQuestion(id){
	$('#delete-question input[name="question_id"]').val(id);
	$('#delete-question').modal('show');
}

function setLabelHandlers(){
	jQuery('.form-block [contenteditable="true"]').each(function(ind, el){
		jQuery(el).off('input').on('input', function(e){
			jQuery(this).parent().find('.' + jQuery(el).data('type')).val(jQuery(this).html());
		});
	});

	jQuery('.form-block .delete').each(function(ind, el){
		jQuery(el).off('click').on('click', function(e){
			if(confirm('Wilt u dit blok verwijderen?')){
				var block = jQuery(this).closest('.form-block');
				block.remove();
				$('[name="delete"]').val($('[name="delete"]').val() + ',' + block.find('input.id').val());
				definePositions();
			}
		});
	});


}

function definePositions(){
	$.each($('.fields-parent'), function(ind, row){
		var n = $(row).find('.field-child').length;

		if(n > 0){
			$(row).find('.row-width').val((12 / n).toFixed(0));
		}

		var r = 0;
		$.each($(row).find('.row-pos'), function(find, inp){
			$(inp).val(r);
			r++;
	    });
	});
}

function equalizeHeight(onlyAfterReset){
	$.each($('.fields-parent'), function(ind, el){
		var fields = $(el).find('.field-child');
		var maxheight = 0;
		if(fields.length > 1){
			$.each(fields, function(find, ch){
				if($(ch).height() > maxheight){
					maxheight = $(ch).find('.form-block').height();
				}
			});
			fields.find('.form-block').height(maxheight);
		}else{
			if(typeof onlyAfterReset != 'undefined'){
				fields.find('.form-block').height('auto');
			}
		}
	});
}

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

function formValidation(){
	$("form[name='form']").on('submit',function(evt){
		let isValid = true;
		let objects = $(this).find('input[type="text"].validate,input[type="email"].validate,select.validate,textarea.validate');
		objects.each(function(){
			isValid = validation(this,isValid);
			if(!isValid)return false;
		});
		console.error(isValid);
		if(!isValid){
			evt.preventDefault();
			return false;
			//$(this).submit();
		}
	});
}

$(document).ready(function(){
	setSorting(jQuery('.fields-parent'));
	setLabelHandlers();
	setValueHandlers();
	equalizeHeight();
	formValidation();
});
