var front_form;

$(function(){

	front_form = $('<form method="post" class="front-form"></form>')
	$('body').append(front_form);

	$.each($('[data-fld]'), function(ind, el){
		var fldRaw  = $(el).data('fld');
		var fld     = fldRaw.split('.');
		var fldId   = fld.join('_');
		var mode    = fld[0];
		var id      = fld[1];
		var lbl     = fld[2];
		var cnt     = $(el).html();
		var section = $(el).closest('section');
		var type    = $(el).data('type');
		if(typeof type != 'undefined'){
			if(mode == 'b'){
				// Block handler
			}else if(mode == 'w'){
				// Wrapper handler
			}

			$(el).attr('id', 'fld_' + fldId);

			// Set element value placeholder
			if(type == 'text'){
				// Large text
				front_form.append($('<textarea style="display:none;" name="' + mode + '[' + id + '][' + lbl + ']" id="' + fldId + '">' + cnt + '</textarea>'));
			}else if(type == 'label'){
				// Small text
				front_form.append($('<input style="display:none;" type="text" name="' + mode + '[' + id + '][' + lbl + ']" id="' + fldId + '" value="' + cnt + '" />'));
			}
			
			// Make content editable
			$(el).attr('contenteditable', true)
				 // .addClass('inline-ckeditor')
				 .css('box-shadow', '0px 0px 4px #0058ff91')
				 .css('display', 'block');

			var ed = CKEDITOR.inline( 'fld_' + fldId );
			console.log( 'Set CKEDITOR on ' + 'fld_' + fldId );

			ed.on('change', function () {
				$('#' + fldId).val(this.getData());
				addSaveButton();
			});
		}
	});
});

function addSaveButton(){
	if($('.inline-save-btn').length == 0){
		$('body').append('<button class="inline-save-btn btn btn-primary" onclick="saveChanges();">Wijzigingen opslaan</button>');
	}
}

function saveChanges(){
	$('body').append('<div class="save-overlay">\
		<div class="lds-ring">\
			<span>Bezig met opslaan</span>\
			<div></div>\
			<div></div>\
			<div></div>\
			<div></div>\
		</div>\
	</div>');

	$.ajax({
		type: 'POST',
		url: savePath,
		data: front_form.serialize(),
	}).done(function( data ) {
		$('.save-overlay').remove();
	});

}