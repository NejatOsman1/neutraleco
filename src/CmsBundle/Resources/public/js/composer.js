var startPos         = 0;		// Dragging start position
var offsetCalc       = 0;		// Dragging start position
var currentDivider   = null;	// Currently dragged divider
var currentLi        = null;	// Current dragging LI (left of divider)
var divideWrapper    = null;	// Current dragging LI (left of divider)
var nextLi           = null;	// LI next to currentLi

var currentLiWidth   = 0;		// Width between 1 to 12 before dragging
var nextLiWidth      = 0;		// Width between 1 to 12 before dragging (nextLi)

var containerOffsetX = 0;		// Left offset from blocks container (to calculate dragging distance)
var containerOffsetY = 0;

var ulWidth          = 0;

var lastSize         = 0; // For tracking changes
function initDviders(){

	containerOffsetX = $('#block-container').offset().left;
	containerOffsetY = $('#block-container').offset().top;

	$('span.divider').draggable({
		axis: 'x',
		grid: [($('#block-container').width() / 12), 0], // Grid calculated from container to 12 steps
		start: function(event, ui) {

			ulWidth = ui.helper.closest('ul.content-container').width();

			offsetCalc     = (ui.helper.offset().left - ui.helper.closest('li').offset().left);
			startPos       = ui.helper.offset().left;
			currentDivider = ui.helper;
			currentLi      = ui.helper.closest('li');
			divideWrapper  = ui.helper.closest('.root-block');
			nextLi         = currentLi.next();
			currentLiWidth = currentLi.data('gridsize');
			nextLiWidth    = nextLi.data('gridsize');
			// console.log( 'startPos:', startPos, 'offsetCalc:', offsetCalc, 'ulWidth:', ulWidth, 'currentLiWidth:', currentLiWidth, 'nextLiWidth:', nextLiWidth );

			lastSize = currentLiWidth;

			// currentLi.find('.card > .card-content').css('background-color', 'green');
			// nextLi.find('.card > .card-content').css('background-color', 'blue');
		},
		drag: function(event, ui) {
			updateDividerDrag(event, ui);
		},
		stop: function(event, ui) {
			ui.helper.css('left', 'inherit').css('right', '-4px');
			// currentLi.find('.card > .card-content').css('background-color', 'white');
			// nextLi.find('.card > .card-content').css('background-color', 'white');
			finishDividerDrag(event, ui);
		},
	});
}

var block_width_min = 2;
var block_width_max = 10;

function updateDividerDrag(event, ui){
	offsetCalc = (ui.helper.offset().left - ui.helper.closest('li').offset().left);

	var block_perc      = ((offsetCalc / ulWidth) * 100); // Get current percent of divider left position
	var block_width     = Math.round((12 / 100) * block_perc); // Calculate 12 grid size from it

	if(lastSize != block_width){

		if(block_width < block_width_min){
			block_width = block_width_min;
		}

		if(block_width > block_width_max){
			block_width = block_width_max;
		}

		var block_perc_calc = ((block_width / 12) * 100); // Get exact percent for 12 grid size for resizing the LI
		var difference = (currentLiWidth - block_width);

		// Set width of currently dragged element container
		currentLi.css('width', block_perc_calc + '%');

		if(currentLi.find('.divider-tooltip').length == 0){ currentLi.append($('<div class="divider-tooltip"><div class="arrow-down"></div></div>')); }
		currentLi.find('.divider-tooltip').html('Breedte: ' + block_width + ' (' + block_perc_calc.toFixed(1) + '%)<div class="arrow-down"></div>');
		currentLi.find('.divider-tooltip').addClass('active');

		// Calculate dimensions for nextLi based on 'difference'
		var next_block_width = (nextLiWidth + difference);



		if(next_block_width < block_width_min){
			next_block_width = block_width_min;
		}

		if(next_block_width > block_width_max){
			next_block_width = block_width_max;
		}
		var next_block_perc_calc = ((next_block_width / 12) * 100);

		nextLi.css('width', next_block_perc_calc + '%');

		if(nextLi.find('.divider-tooltip').length == 0){ nextLi.append($('<div class="divider-tooltip"><div class="arrow-down"></div></div>')); }
		nextLi.find('.divider-tooltip').html('Breedte: ' + next_block_width + ' (' + next_block_perc_calc.toFixed(1) + '%)<div class="arrow-down"></div>');
		nextLi.find('.divider-tooltip').addClass('active');

		console.log( 'Block balance:', block_width, next_block_width, 'diff:', difference );

		// Store data
		currentLi.data('gridsize', block_width);
		nextLi.data('gridsize', next_block_width);


		// Store data second time
		currentLi.find('.cfg_width').val(block_width);
		nextLi.find('.cfg_width').val(next_block_width);

		lastSize = block_width;

		resetLiClasses(null, divideWrapper);
	};

	// Detect drag directions for future references
	/*var currentPos      = ui.helper.offset().left;
	if(currentPos < (startPos - 10)){
		console.log( 'Moving left' );
	}else if(currentPos > (startPos + 10)){
		console.log( 'Moving right' );
	}else{
		console.log( 'Reverted' );
	}*/
}

function finishDividerDrag(event, ui){

	// Reset values to original position so we dont get cross-contamination
	startPos = 0;
	currentDivider = null;
	currentLi = null;
	nextLi = null;
	$('.divider-tooltip').removeClass('active');
}

$(function() {
	initDviders();


	// Set source code editors
	$.each($('textarea.source-editor'), function(ind, el){
		var mixedMode = {
	        name: "htmlmixed",
	        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
	                       mode: null},
	                      {matches: /(text|application)\/(x-)?vb(a|script)/i,
	                       mode: "vbscript"}]
	      };
		let cm = new CodeMirror.fromTextArea(el, {mode: mixedMode, lineNumbers: true});
	});
});
function identify_service(url){
	if(url.match(/(?:https?:)?\/\/(?:[a-z]+\.)*vimeo\.com\//i)){
		return 'vimeo';
	}else if(url.match(/(?:https?:)?\/\/(?:(?:www|m)\.)?(youtube(?:-nocookie)?\.com|youtu\.be)\//)){
		return 'youtube';
	}
}

function get_url_embed(url){
	var service = identify_service(url);
	var id = get_url_id(url);

	if (service == 'youtube') {
		return get_youtube_embed(id);
	}else if (service == 'vimeo') {
		return get_vimeo_embed(id);
	}
	return null;
}

function get_embed_code(url){
	var service = identify_service(url);
	var id = get_url_id(url);

	if (service == 'youtube') {
		return '<div class="embed-container"><iframe id="ytplayer" type="text/html" width="720" height="405" src="' + get_youtube_embed(id) + '" frameborder="0" allowfullscreen></iframe></div>';
	}else if (service == 'vimeo') {
		return '<div class="embed-container"><iframe width="720" height="405" src="' + get_vimeo_embed(id) + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
	}else{
		return '<div class="embed-container"><video style="object-fit: fill;width: 100%;" controls>\
			<source src="' + url + '" type="video/mp4">\
			Je browser ondersteunt geen HTML5 video.\
		</video></div>';
	}
	return null;
}

function get_youtube_embed(youtube_video_id, autoplay = 0){
	var embed = "https://youtube.com/embed/" + youtube_video_id + "?autoplay=" + autoplay + "&controls=0&disablekb=1&fs=0&modestbranding=1&color=white&iv_load_policy=3";
	return embed;
}

function get_vimeo_embed(vimeo_video_id, autoplay = 0){
	var embed = "https://player.vimeo.com/video/" + vimeo_video_id + "?byline=0&portrait=0&autoplay=" + autoplay;
	return embed;
}

function get_url_id(url){
	service = identify_service(url);

	if (service == 'youtube') {
		return get_youtube_id(url);
	}else if (service == 'vimeo') {
		return get_vimeo_id(url);
	}
	return null;
}

function get_youtube_id(url){
	var youtube_url_keys = ['v','vi'];

	// Try to get ID from url parameters
	var key_from_params = parse_url_for_params(url, youtube_url_keys);
	if (key_from_params) return key_from_params;

	// Try to get ID from last portion of url
	return parse_url_for_last_element(url);
}

function parse_url_for_params(url, keys){
	var urlSplit = url.split('?');
	if(urlSplit.length > 0){
		var urlSplitX = urlSplit[1].split('&');
		if(urlSplitX.length > 0){
			for(var i = 0; i < urlSplitX.length; i++){
				var opt = urlSplitX[i];
				if(opt.match(/^v=/)){
					return opt.substr(2, opt.length);
				}
				if(opt.match(/^vi=/)){
					return opt.substr(3, opt.length);
				}
			};
		}
	}

	return null;
}

function get_vimeo_id(url){
	// Try to get ID from last portion of url
	return parse_url_for_last_element(url);
}

function parse_url_for_last_element(url){
	var url_parts = url.split('/');
	var prospect = url_parts[url_parts.length - 1];
	var prospect_and_params = prospect.split(/(\?|\=|\&)/);
	if (prospect_and_params.length) {
		return prospect_and_params[0];
	} else {
		return prospect;
	}
	return url;
}

CKEDITOR.disableAutoInline = true;

var buttonEl = null;

function addVideo(el, video_url){
	if(typeof video_url == 'undefined'){
		video_url = '';
	}
	// var videoWizardHtml = '<input type="text" id="video-url" value="https://vimeo.com/271036995" placeholder="' + composervideourl + '" />';
	var videoWizardHtml = '<div class="no-submit">\
		<h3 class="popup-title">' + selectWhatNeedTobeLinked + '</h3>\
		<div class="row option-tiles">\
			<div class="col s12 m4 center-align">\
				<a class="tile tile-youtube" onclick="addVideoYoutube()">\
					<i class="fab fa-youtube"></i>\
					<strong>YouTube</strong>\
				</a>\
			</div>\
			<div class="col s12 m4 center-align">\
				<a class="tile tile-vimeo" onclick="addVideoVimeo()">\
					<i class="fab fa-vimeo"></i>\
					<strong>Vimeo</strong>\
				</a>\
			</div>\
			<div class="col s12 m4 center-align">\
				<a onclick="addVideoLibrary()" class="tile ' + (video_url != '' ? 'active' : '') + '">\
					<i class="far fa-file-video"></i>\
					<strong>' + composerselectvideo + '</strong>\
				</a>\
			</div>\
		</div>\
		<div>\
			<div style="display:none;" class="youtube">\
				<strong>YouTube URL:</strong>\
				<p>' + composeryoutube + '</p>\
				<p><strong>' + composeryoutube_example + '</strong><br/>https://www.youtube.com/watch?v=<span style="color: red;">C0DPdy98e4c</span><br/>https://youtu.be/<span style="color: red;">C0DPdy98e4c</span></p>\
			</div>\
			<div style="display:none;" class="vimeo">\
				<strong>Vimeo URL:</strong>\
				<p>' + composervimeo + '</p>\
				<p><strong>' + composervimeo_example + '</strong><br/>https://vimeo.com/<span style="color: red;">97176334</span></p>\
			</div>\
			<div style="display:' + (video_url != '' ? 'block' : 'none') + ';" class="custom">\
				<strong>Lokale video URL:</strong>\
			</div>\
			<div style="display:' + (video_url != '' ? 'block' : 'none') + ';margin-top:20px;" class="videourl">\
				<input type="text" id="video-url" value="' + video_url + '" placeholder="' + composervideourl + '" />\
			</div>\
		</div>\
		<div id="popup_footer">\
			<button type="button" onclick="cpop.close();" class="btn btn-flat" style="float:left;margin-top: 9px;">Sluiten</button>\
			<button type="button" onclick="cpop.close();" class="btn btn-primary">Toepassen</button>\
		</div>\
	</div>';

	if(video_url == ''){
		buttonEl = $(el);
	}
	var liBlock = buttonEl.closest('li.content-block');
	cpop.setCloseAction(function(){
		if($('#video-url').length > 0 && $('#video-url').val().length > 0){
			// Store URL
			liBlock.find('textarea.block_data').val('{"type": "video", "source": "' + $('#video-url').val() + '"}');

			if(liBlock.find('.embed-container').length){
				liBlock.find('.embed-container').remove(); // Remove old potential video
			}

			// Video embed (responsive)
			liBlock.find('textarea.block_data').after(get_embed_code($('#video-url').val()));
			buttonEl.parent().find('.btn-text,.btn-bundle,.btn-image,.btn-media').hide();
		}
	}).large().loadHtml(videoWizardHtml);
}

function addVideoLibrary(){
	cpop.large().loadAjax(composerMediaLink + '?src=video-popup');
}

function addVideoYoutube(){
	$('.vimeo').hide();
	$('.youtube,.videourl').show();
	$('.tile-youtube').addClass('active');
	$('.tile-vimeo').removeClass('active');
}

function addVideoVimeo(){
	$('.youtube').hide();
	$('.vimeo,.videourl').show();
	$('.tile-vimeo').addClass('active');
	$('.tile-youtube').removeClass('active');
}

// Stores editors
var editors = {};

var btnWrapper = null;
var editBtn = null;
var btnBlockId = null;

$.each($('.ckeditor4-inline'), function(ind, el){
	loadCkeditor4(el);
});

var add_btn = null;
var add_blockid = null;

var btn_action = 'new';

function addButton(btn, blockid){
	btn_action = 'new';

	btnBlockId = blockid;
	add_btn = $(btn).parent();
	add_blockid = blockid;

	editBtn = null;

	linkSelector(null, 'linkComposerPage', 'linkComposerMedia');
}

function delButton(){
	editBtn.remove();
	cpop.close();
}

function editButton(btn, blockid){
	btn_action = 'edit';

	btnBlockId = blockid;
	editBtn = $(btn);
	add_btn = editBtn.parent().parent();

	linkSelector(null, 'linkComposerPage', 'linkComposerMedia', '&url=' + encodeURIComponent(editBtn.data('url')) + '&label=' + encodeURIComponent(editBtn.data('label')) + '&target=' + encodeURIComponent(editBtn.data('target')) + '&class=' + encodeURIComponent(editBtn.data('class')));
}

function setLink(){
	var label  = $('#lc_btn_label').val();
	var url    = $('#lc_btn_url').val();
	var cl     = $('#lc_btn_class').val();
	var target = $('#lc_btn_target').val();



	var wrapper = add_btn.find('.button-wrapper');

	var btnid = randId();

	var btn = $('<a onclick="editButton(this, \'' + btnBlockId + '\');" data-url="' + url + '" data-class="' + cl + '" data-label="' + label + '" data-target="' + target + '" class="btn custom-block-btn">' + label + '</a>');

	btn.append($('<input type="hidden" name="block_config[' + btnBlockId + '][buttons][' + btnid + '][label]" value="' + label + '" />'));
	btn.append($('<input type="hidden" name="block_config[' + btnBlockId + '][buttons][' + btnid + '][url]" value="' + url + '" />'));
	btn.append($('<input type="hidden" name="block_config[' + btnBlockId + '][buttons][' + btnid + '][class]" value="' + cl + '" />'));
	btn.append($('<input type="hidden" name="block_config[' + btnBlockId + '][buttons][' + btnid + '][target]" value="' + target + '" />'));

	if(editBtn){
		editBtn.replaceWith(btn);
	}else{
		wrapper.append(btn);
	}


	cpop.close();
}

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

function selectSection(key, hideModal, clicked){
	// $('#page-edit-tabs').tabs('select_tab', 'blocks');
	var block = active_blocks[key];



	setupSectionBlocks(block);




	if(clicked){
		$('body,html').animate({ scrollTop: $('body').height() }, 800);
	}

    // if(hideModal) $('#block-modal').modal('close');
}



/*
 * Add new block
 */
function setupSectionBlocks(blockData){
	$('#new-section-notifier').hide();

	var ct_blocks = '';
	var block_id = randId();

	var leftOver = 12;

	var colWidth = 0;
	/*if(typeof blockData.default_columns != 'undefined'){
		colWidth = blockData.default_columns;
	}*/

	/*if(colWidth == 0 && blockData.blocks.length > 0){
		colWidth = blockData.blocks.length;
	}*/

	if(colWidth > 4){
		colWidth = 4;
	}

	var allowMove = (typeof blockData.allowMove != 'undefined' && blockData.allowMove == true);

	var tmp_editors = [];


	for(var i = 0; i < blockData.blocks.length; i++){
		var block = blockData.blocks[i];
		var size = block.size;

		var minimum = 1;
		if(typeof block.minimum != 'undefined'){
			minimum = parseInt(block.minimum);
		}

		for(var mi = 0; mi < minimum; mi++){

			var id = randId();

			var realSize = ((size / 12) * 100);

			var bundleRequired = false;
			var dataRequired = false;
			if(block.required && block.required.match(/Bundle/g)){
				bundleRequired = block.required;
			}else if(block.required){
				dataRequired = block.required;
			}

			var actions = '<button type="button" style="display:none;" class="btn btn-edit tooltipped" onclick="editBundle(this);"  data-bs-toggle="tooltip" title="' + composerextensionconfig +'"><i class="far fa-check-square"></i></button>\
							<button type="button" style="display:none;" class="btn btn-clear red tooltipped" onclick="delContent(this);"  data-bs-toggle="tooltip" title="' + composerblockempty + '"><i class="far fa-trash-alt"></i></button>\
							<button type="button" class="btn btn-text tooltipped" onclick="addText(this);"  data-bs-toggle="tooltip" title="'+ composertextconnect + '"><i class="fa fa-align-left fa-fw"></i></button>\
							<button type="button" class="btn btn-image tooltipped" onclick="addMedia(this);"  data-bs-toggle="tooltip" title="' + composermediaconnect + '"><i class="fa fa-image fa-fw"></i></button>\
							<button type="button" class="btn btn-video tooltipped" onclick="addVideo(this);"  data-bs-toggle="tooltip" title="' + composervideoconnect + '"><i class="far fa-play-circle fa-fw"></i></button>\
							<button type="button" class="btn btn-bundle tooltipped" onclick="addBundle(this);"  data-bs-toggle="tooltip" title="' + composerextensionconnect + '"><i class="fa fa-cube fa-fw"></i></button>\
							<button type="button" class="btn btn-source tooltipped" onclick="addSource(this);"  data-bs-toggle="tooltip" title="' + composersourceconnect + '"><i class="fa fa-code fa-fw"></i></button>';


			if(bundleRequired || dataRequired){
				actions = '<button type="button" style="display:none;" class="btn btn-edit tooltipped" onclick="editBundle(this);"  data-bs-toggle="tooltip" title="' + composerextensionconfig + '"><i class="far fa-check-square"></i></button>\
							<button type="button" style="display:none;" class="btn btn-clear red tooltipped" onclick="delContent(this);"  data-bs-toggle="tooltip" title="' + composerblockempty + '"><i class="far fa-trash-alt"></i></button>';
				if(bundleRequired){
					actions += '<button type="button" class="btn btn-bundle" onclick="addSpecificBundle(this, \'' + bundleRequired + '\');"><i class="left fa fa-paperclip"></i>' + bundleRequired + ' ' + composerconnect + '</button>';
				}else{
					if(dataRequired == 'medias'){
						actions += '<button type="button" class="btn btn-image" onclick="addMedia(this, true);"><i class="fa fa-image fa-fw"></i></button>';
					}else if(dataRequired == 'media'){
						actions += '<button type="button" class="btn btn-image tooltipped" onclick="addMedia(this);"  data-bs-toggle="tooltip" title="' + composermediaconnect + '"><i class="fa fa-image fa-fw"></i></button>';
					}else if(dataRequired == 'video'){
						actions += '<button type="button" class="btn btn-video tooltipped" onclick="addVideo(this);"  data-bs-toggle="tooltip" title="' + composervideoconnect + '"><i class="far fa-play-circle fa-fw"></i></button>';
					}else if(dataRequired == 'text'){
						actions += '<button type="button" class="btn btn-text tooltipped" onclick="addText(this);"  data-bs-toggle="tooltip" title="' + composertextconnect + '"><i class="fa fa-align-left fa-fw"></i></button>';
					}
				}
			}

			var customFields = '';
			if(block.fields.length > 0){
				customFields = '';
				$.each(block.fields, function(ind, field){

					var field_label = field.label;
					if(typeof block_trans != 'undefined'){
						if(typeof block_trans[field_label] != 'undefined'){
							field_label = block_trans[field_label];
						}
					}
					customFields += '<div class="fields-row ' + (ind == 0 ? 'first' : '') + '">\
						<div class="form-label">' + field_label + '</div>\
						<div class="blocks-display-form" id="view_' + id + '_' + field.key + '">\
						</div>\
						<div class="blocks-edit-form">';
							if(field.type == 'text'){
								customFields += '<input class="form-control" data-type="' + field.type + '" id="' + id + '_' + field.key + '" data-linkkey="' + id + '_' + field.key + '" data-key="' + field.key + '" data-label="' + field.label + '" type="text" value="" name="block_config[' + id + '][' + field.key + ']">';
							}else if(field.type == 'textarea'){
								/*var tmpHtml = '<div data-editor="editor-' + blockid + '" class="ckeditor4" contenteditable="true"></div>\
								<textarea name="block_content[' + blockid + '][]" class="inline-editor" id="editor-' + blockid + '"></textarea>';*/

								tmp_editors.push(id + '_' + field.key);

								customFields += '<div data-editor="' + id + '_' + field.key + '" id="inline-editor-' + id + '_' + field.key + '" class="ckeditor4 form-control" contenteditable="true"></div>\
								<textarea class="form-control" data-type="' + field.type + '" id="' + id + '_' + field.key + '" data-linkkey="' + id + '_' + field.key + '" data-key="' + field.key + '" data-label="' + field.label + '" class="inline-editor template-fields" name="block_config[' + id + '][' + field.key + ']"></textarea>';
							}
						customFields += '</div>\
					</div>';
				});
				customFields += '';
			}

			var btncomposer = '';
			if(block.buttons){
				btncomposer = '\
				<div class="block-buttons">\
					<div class="button-wrapper"></div>\
					<button class="add-new-block-btn btn-flat" type="button" onclick="addButton(this, \'' + id + '\');"><i class="left fa fa-plus"></i> ' + composeraddbutton + '</button>\
				</div>';
			}

			var blockButtons = '';
			if(block.multiple){
				blockButtons =  '\
					<a onclick="addStaticBlock(this);" class="tooltipped" data-position="top" data-delay="300"  data-bs-toggle="tooltip" title="' + composeraddblock + '"><i class="fa fa-plus"></i></a>\
					<a onclick="delStaticBlock(this);" class="static-block-delete"><i class="far fa-trash-alt"></i></a>\
				';
			}else{
				if(blockData.key.match('_empty')){
					blockButtons = '\
						<a onclick="delContent(this);" class="btn-clear"><i class="fa fa-eraser"></i></a>\
                    	<a onclick="delBlock(this);"><i class="far fa-trash-alt"></i></a>\
                	';
				}
			}

			var ct_block = '<li id="' + id + '" class="col content-block ui-state-default ' + (typeof block.mediaDrop != 'undefined' ? 'media-drop' : '') + ' data-embed="1" data-embed="2" data-gridsize="' + Math.round(((12 / 100) * realSize)) + '" ' + (typeof block.contained == 'string' ? 'contained' : '') + '" style="float: left;width:' + realSize + '%;" data-width="' + realSize + '%" data-blockid="' + id + '" data-key="' + block.key + '">\
								' + (blockData.divider ? '<span class="divider" style="overflow:visible;"></span>' : '') + '\
				                <div class="card">\
									<div class="card-content content-block-wrapper ">\
				                        <div class="block-actions right-align ui-sortable-handle">\
				                            <span class="left btn-handle"><i class="fa fa-arrows-alt"></i></span>\
											<input type="hidden" value="" class="hidden-field cfg_class" name="block_config[' + id + '][class]" placeholder="class" />\
											<input type="hidden" value="" class="hidden-field cfg_style" name="block_config[' + id + '][style]" placeholder="style" />\
											<input type="hidden" value="" class="hidden-field cfg_link" name="block_config[' + id + '][link]" placeholder="link" />\
											<input type="hidden" value="" class="hidden-field cfg_target" name="block_config[' + id + '][target]" placeholder="target" />\
											<input type="hidden" value="' + size + '" class="hidden-field cfg_width" name="block_config[' + id + '][width]" placeholder="width" />\
											<input type="hidden" value="" class="hidden-field cfg_offset" name="block_config[' + id + '][offset]" placeholder="offset" />\
											<input type="hidden" value="" class="hidden-field cfg_id" name="block_config[' + id + '][id]" placeholder="id" />\
											<div class="right-actions">\
					                            <a onclick="blockSettings(this);" class=" tooltipped" data-position="top" data-delay="300"  data-bs-toggle="tooltip" title="' + composerblocksettings + '"><i class="fa fa-fw fa-cog"></i></a>\
					                            ' + blockButtons + '\
				                            </div>\
				                        </div>\
										<input type="hidden" class="hidden-field" name="block[' + block_id + '][]" value="' + id + '" />\
										<input type="hidden" class="hidden-field" name="block_attr[' + id + '][key]" value="' + block.key + '" />\
										<input type="hidden" class="hidden-field" name="block_req[' + id + ']" value="' + dataRequired + '" />\
										<textarea style="display:none;" class="block_data" name="block_data[' + id + ']"></textarea>\
										' + (typeof block.contained == 'string' ? '<input type="hidden" name="block_contained[' + id + ']" value="' + block.contained + '" />' : '') + '\
										' + customFields + '\
										<div class="inline-actionss center-align">' + actions + '</div>\
										' + btncomposer + '\
									</div>\
								</div>\
								' + (typeof block.contained == 'string' ? '<div class="containment-actions center-align">\
									<button type="button" class="btn-flat" onclick="addContainmentBlock(this);"><i class="left fa fa-plus"></i> ' + composeraddblock + '</button>\
								</div>' : '') + '\
							</li>';

			//console.log( ct_block );
			ct_blocks += ct_block;


		}
	}

	// First block
	var wrapper_label = blockData.label;
	if(typeof block_trans != 'undefined'){
		if(typeof block_trans[wrapper_label] != 'undefined'){
			wrapper_label = block_trans[wrapper_label];
		}
	}

	var wrapperClassesHtml = '';
	$.each(wrapperClasses, function(key,label){
		wrapperClassesHtml += '<option value="' + key + '">' + label + '</option>';
	});
	var wrapperTextColorHtml = '';
	$.each(wrapperTextColor, function(key,label){
		wrapperTextColorHtml += '<option value="' + key + '">' + label + '</option>';
	});

	var block = $('<div class="root-block new visible block card active" data-divider="' + (blockData.divider ? '1' : '0') + '" data-id="' + block_id + '" data-key="' + blockData.key + '">\
			<div class="add-section-between">\
				<button type="button" class="btn-flat wrap-paste tooltipped" data-position="top"  data-bs-toggle="tooltip" title="' + composerblockpaste + '" style="display:none;" onclick="pasteBlock(this);"><i class="far fa-clipboard"></i></button>\
			</div>\
			<div class="card-title">\
				<input type="hidden" name="block_wrappers_attr[' + block_id + '][key]" value="' + blockData.key + '" />\
				<div class="wrapper-actions">\
		            <a class="left wrapper-retract"><i class="fa fa-angle-up"></i></a>\
		            <a class="left wrapper-expand"><i class="fa fa-angle-down"></i></a>\
					<span class="title left">' + wrapper_label + '</span>\
					<div class="actions">\
						<div class="actions-inner">\
							<a onclick="cpop.fixed(false).confirm(\'' + (typeof composerdeleteblock != 'undefined' ? composerdeleteblock : 'Wilt u dit blok verwijderen?') + '\', function(){ deleteWrapper(this); cpop.close(); }.bind(this), \'' + composerdelete + '\');" class="right wrapper-delete tooltipped"  data-bs-toggle="tooltip" title="' + wrapperdelete + '"><i class="far fa-trash-alt"></i></a>\
							<a onclick="cloneWrapper(this);return false;" class="right wrapper-clone tooltipped"  data-bs-toggle="tooltip" title="' + wrapperclone + '"><i class="far fa-copy"></i></a>\
								\
							<a class="right tooltipped"  data-bs-toggle="tooltip" title="' + togglevisibility + '" onclick="toggleVisibility(this);return false;"><input type="checkbox" checked name="block_wrappers_enabled[' + block_id + ']" value="1"><i class="far fa-eye visibility fa-fw" style="display:;"></i><i class="far fa-eye-slash visibility_off fa-fw" style="display:none;"></i></a>\
							<a class="right tooltipped"  data-bs-toggle="tooltip" title="' + heading + '" onclick="toggleWrapperTextFields(this);return false;"><i class="fa fa-heading"></i></a>\
							<a class="right tooltipped"  data-bs-toggle="tooltip" title="' + composerspacing + '" onclick="setGrid(this);return false;"><i class="fa fa-th-large"></i></a>\
							<input type="hidden" class="wrapper-grid" name="wrapper-grid[' + block_id + ']" value="' + colWidth + '" />\
							<a class="right tooltipped"  data-bs-toggle="tooltip" title="' + wrapperconfig + '" onclick="toggleWrapperConfig(this);return false;"><i class="fa fa-fw fa-cog"></i></a>\
						</div>\
					</div>\
				</div>\
			</div>\
		    <div class="card-content">\
				<input type="hidden" name="block_wrappers[]" value="' + block_id + '" />\
				<div class="wrapper-config" style="display: none;">\
					<div class="row">\
						<div class="col-12 col-md-4">\
							<h6>Sectie classes</h6>\
							<div class="input-group">\
								<div data-bs-placement="top" data-bs-toggle="tooltip" title="" class="input-group-text" data-bs-original-title="Sectie ID" aria-label="Sectie ID"><i class="fa fa-fw fa-hashtag"></i></div>\
								<input class="form-control" id="section-config-id" type="text" name="wrapper-config[' + block_id + '][cssId]" value="" placeholder="'+ composercssid +'">\
							</div>\
							<div class="input-group">\
								<div data-bs-placement="top" data-bs-toggle="tooltip" title="" class="input-group-text" data-bs-original-title="Sectie class" aria-label="Sectie class"><i class="fa fa-fw fa-code"></i></div>\
								<input class="form-control" id="section-config-class" type="text" name="wrapper-config[' + block_id + '][cssClass]" value="" placeholder="' + composercssclass + '">\
							</div>\
							<div class="input-group">\
								<div data-bs-placement="top" data-bs-toggle="tooltip" title="" class="input-group-text" data-bs-original-title="Sectie anchor link class" aria-label="Sectie anchor link class"><i class="fa fa-fw fa-anchor"></i></div>\
								<input class="form-control" id="section-config-anchor" type="text" name="wrapper-config[' + block_id + '][anchor]" value="" placeholder="'+composerbackgroundcolor + '">\
							</div>\
						</div>\
						<div class="col-12 col-md-4">\
							<h6>Sectie opties</h6>\
							<div class="input-group">\
								<div data-bs-placement="top" data-bs-toggle="tooltip" title="" class="input-group-text" data-bs-original-title="Sectie achtergrondkleur" aria-label="Sectie achtergrondkleur"><i class="fa fa-fw fa-fill-drip"></i></div>\
								<select class="form-select" name="wrapper-config[' + block_id + '][selectClass]" id="">' + wrapperClassesHtml + '</select>\
							</div>\
							<div class="input-group">\
								<div data-bs-placement="top" data-bs-toggle="tooltip" title="" class="input-group-text" data-bs-original-title="Sectie tekstkleur" aria-label="Sectie tekstkleur"><i class="fa fa-fw fa-font"></i></div>\
								<select class="form-select" name="wrapper-config[' + block_id + '][selectTextColor]" id="">' + wrapperTextColorHtml + '</select>\
							</div>\
						</div>\
						<div class="col">\
							<h6>Sectie padding</h6>\
							<div class="row">\
								<div class="col-4"></div>\
								<div class="col-4"><input class="padding-field form-control centered" type="text" placeholder="Boven" name="wrapper-config[' + block_id + '][paddingTop]"></div>\
								<div class="col-4"></div>\
							</div>\
							<div class="row">\
								<div class="col-4"><input disabled="" class="padding-field form-control centered" type="text" placeholder="Links" name="wrapper-config[' + block_id + '][paddingTop]"></div>\
								<div class="col-4"><a onclick="resetPaddingFields();" style="cursor:pointer;" class="btn btn-flat centered"><i class="fa fa-undo-alt"></i> Reset</a></div>\
								<div class="col-4"><input disabled="" class="padding-field form-control centered" type="text" placeholder="Rechts" name="wrapper-config[' + block_id + '][paddingTop]"></div>\
							</div>\
							<div class="row">\
								<div class="col-4"></div>\
								<div class="col-4"><input class="padding-field form-control centered" type="text" placeholder="Onder" name="wrapper-config[' + block_id + '][paddingTop]"></div>\
								<div class="col-4"></div>\
							</div>\
						</div>\
					</div>\
				</div>\
				<div class="wrapper-text-fields" style="display:none;">\
					<h2 data-id="' + block_id + '_wrp_fld_label" class="ckeditor4-inline ck-limited" contenteditable="true">'+ composertitle + '</h2>\
					<input id="' + block_id + '_wrp_fld_label" type="hidden" name="wrapper_fields[' + block_id + '][label]" value="" />\
					<br/>\
					<div></div>\
					<div data-id="' + block_id + '_wrp_fld_intro" class="ckeditor4-inline ck-limited" contenteditable="true">' + composerintroductiontext + '</div>\
					<input id="' + block_id + '_wrp_fld_intro" type="hidden" name="wrapper_fields[' + block_id + '][intro]" value="" />\
				</div>\
				<ul class="content-container ' + (allowMove ? 'sortables connectedSortable' : '' ) + '">\
					' + ct_blocks + '\
				</ul>\
			</div>\
	</div>');

	if(between || myNewBlock){
		if(myNewBlock){
			block.insertAfter(myNewBlock);
			myNewBlock.remove();
			myNewBlock = null;
		}else{
			block.insertAfter(between.parent());
		}
	}else{
		$('#block-container').append(block);
	}

	$('.root-block.new .colorpicker').minicolors({
    		position: 'top left',
	});

	$.each(tmp_editors, function(ind, id){
		loadCkeditor4($('#inline-editor-' + id)[0]);
	});

	if(block.find('.sortables').length > 0){
		block.find('.sortables').sortable();
	}

	block.find('.wrapper-text-fields h2,.wrapper-text-fields div').keyup(function(e){
		$('#' + $(this).data('id')).val($(this).html());
	});


	// console.log( '..' );
	$.each($(block).find('.media-drop'), function(ind, dz){
		addDropzone(dz);
	});


	// Update sortables to enable new block
	setupSortables();
	initCollapsingRoots();
	initDviders();

	$.each(block.find('.ckeditor4-inline'), function(ind, el){
		loadCkeditor4(el);
	});

	$('.tooltipped').tooltip({delay: 50});
}

/*
 * Add new block
 */
function addStaticBlock(el){

	var wrapper = $(el).closest('.root-block');



	// Assure the block count doesn't move over 6
	var allBlocksInParent = wrapper.find('.content-block');
	/*if(allBlocksInParent.length > 5){
		return false;
	}*/



	var source = $(el).closest('.content-block');
	// var target = source.clone();

	var block_id = wrapper.data('id');
	var originalId = source.attr('data-blockid');
	var tmp_editors = [];
	var newBlockData = null;

	$.each(active_blocks[wrapper.data('key')].blocks, function(ind, blockData){
		if(blockData.key == source.data('key')){
			newBlockData = blockData;
		}
	});

	if(newBlockData == null) return;

	var block = newBlockData;
	var size = block.size;

	var id = randId();

	var realSize = ((size / 12) * 100);

	var bundleRequired = false;
	var dataRequired = false;
	if(block.required && block.required.match(/Bundle/g)){
		bundleRequired = block.required;
	}else if(block.required){
		dataRequired = block.required;
	}

	var actions = '<button type="button" style="display:none;" class="btn btn-edit tooltipped" onclick="editBundle(this);"  data-bs-toggle="tooltip" title="' + composerextensionconfig +'"><i class="far fa-check-square"></i></button>\
					<button type="button" style="display:none;" class="btn btn-clear red tooltipped" onclick="delContent(this);"  data-bs-toggle="tooltip" title="' + composerblockempty + '"><i class="far fa-trash-alt"></i></button>\
					<button type="button" class="btn btn-text tooltipped" onclick="addText(this);"  data-bs-toggle="tooltip" title="' + composertextconnect + '"><i class="fa fa-align-left fa-fw"></i></button>\
					<button type="button" class="btn btn-image tooltipped" onclick="addMedia(this);"  data-bs-toggle="tooltip" title="' + composermediaconnect + '"><i class="fa fa-image fa-fw"></i></button>\
					<button type="button" class="btn btn-video tooltipped" onclick="addVideo(this);"  data-bs-toggle="tooltip" title="' + composervideoconnect + '"><i class="far fa-play-circle fa-fw"></i></button>\
					<button type="button" class="btn btn-bundle tooltipped" onclick="addBundle(this);"  data-bs-toggle="tooltip" title="' + composerextensionconnect + '"><i class="fa fa-cube fa-fw"></i></button>';


	if(bundleRequired || dataRequired){
		actions = '<button type="button" style="display:none;" class="btn btn-edit tooltipped" onclick="editBundle(this);"  data-bs-toggle="tooltip" title="' + composerextensionconfig + '"><i class="far fa-check-square"></i></button>\
					<button type="button" style="display:none;" class="btn btn-clear red tooltipped" onclick="delContent(this);"  data-bs-toggle="tooltip" title="' + composerblockempty + '"><i class="far fa-trash-alt"></i></button>';
		if(bundleRequired){
			actions += '<button type="button" class="btn btn-bundle" onclick="addSpecificBundle(this, \'' + bundleRequired + '\');"><i class="left fa fa-paperclip"></i>' + bundleRequired + ' ' + composerconnect + '</button>';
		}else{
			if(dataRequired == 'medias'){
				actions += '<button type="button" class="btn btn-image" onclick="addMedia(this, true);"><i class="fa fa-image fa-fw"></i></button>';
			}else if(dataRequired == 'media'){
				actions += '<button type="button" class="btn btn-image tooltipped" onclick="addMedia(this);"  data-bs-toggle="tooltip" title="' + composermediaconnect + '"><i class="fa fa-image fa-fw"></i></button>';
			}else if(dataRequired == 'video'){
				actions += '<button type="button" class="btn btn-video tooltipped" onclick="addVideo(this);"  data-bs-toggle="tooltip" title="' + composervideoconnect + '"><i class="far fa-play-circle fa-fw"></i></button>';
			}else if(dataRequired == 'text'){
				actions += '<button type="button" class="btn btn-text tooltipped" onclick="addText(this);"  data-bs-toggle="tooltip" title="' + composertextconnect + '"><i class="fa fa-align-left fa-fw"></i></button>';
			}
		}
	}

	var customFields = '';
	if(block.fields.length > 0){
		customFields = '';
		$.each(block.fields, function(ind, field){
			var field_label = field.label;
			if(typeof block_trans != 'undefined'){
				if(typeof block_trans[field_label] != 'undefined'){
					field_label = block_trans[field_label];
				}
			}
			customFields += '<div class="fields-row ' + (ind == 0 ? 'first' : '') + '">\
				<div class="form-label">' + field_label + '</div>\
				<div class="blocks-display-form" id="view_' + id + '_' + field.key + '">\
				</div>\
				<div class="blocks-edit-form">';
					if(field.type == 'text'){
						customFields += '<input class="form-control" data-type="' + field.type + '" id="' + id + '_' + field.key + '" data-linkkey="' + id + '_' + field.key + '" data-key="' + field.key + '" data-label="' + field.label + '" type="text" value="" name="block_config[' + id + '][' + field.key + ']">';
					}else if(field.type == 'textarea'){
						/*var tmpHtml = '<div data-editor="editor-' + blockid + '" class="ckeditor4" contenteditable="true"></div>\
						<textarea name="block_content[' + blockid + '][]" class="inline-editor" id="editor-' + blockid + '"></textarea>';*/

						tmp_editors.push(id + '_' + field.key);

						customFields += '<div data-editor="' + id + '_' + field.key + '" id="inline-editor-' + id + '_' + field.key + '" class="ckeditor4 form-control" contenteditable="true"></div>\
						<textarea class="form-control" data-type="' + field.type + '" id="' + id + '_' + field.key + '" data-linkkey="' + id + '_' + field.key + '" data-key="' + field.key + '" data-label="' + field.label + '" class="inline-editor template-fields" name="block_config[' + id + '][' + field.key + ']"></textarea>';
					}
				customFields += '</div>\
			</div>';
		});
		customFields += '';
	}

	var btncomposer = '';
	if(block.buttons){
		btncomposer = '\
		<div class="block-buttons center-align">\
			<div class="button-wrapper"></div>\
			<button class="add-new-block-btn btn-flat" type="button" onclick="addButton(this, \'' + id + '\');"><i class="left fa fa-plus"></i> ' + composeraddbutton + '</button>\
		</div>';
	}

	var newBlock = $('<li id="' + id + '" class="col content-block ui-state-default ' + (typeof block.mediaDrop != 'undefined' ? 'media-drop' : '') + '" data-embed="2" data-gridsize="' + Math.round(((12 / 100) * realSize)) + '" style="float: left;width:' + realSize + '%;" data-width="' + realSize + '%" data-blockid="' + id + '" data-key="' + source.data('key') + '">\
		                ' + (wrapper.data('divider') == '1' ? '<span class="divider" style="overflow:visible;"></span>' : '') + '\
		                <div class="card">\
							<div class="card-content content-block-wrapper ">\
	\
		                        <div class="block-actions right-align ui-sortable-handle">\
		                            <span class="left btn-handle"><i class="fa fa-arrows-alt"></i></span>\
									<input type="hidden" value="" class="hidden-field cfg_class" name="block_config[' + id + '][class]" placeholder="class" />\
									<input type="hidden" value="" class="hidden-field cfg_style" name="block_config[' + id + '][style]" placeholder="style" />\
									<input type="hidden" value="" class="hidden-field cfg_link" name="block_config[' + id + '][link]" placeholder="link" />\
									<input type="hidden" value="" class="hidden-field cfg_target" name="block_config[' + id + '][target]" placeholder="target" />\
									<input type="hidden" value="' + size + '" class="hidden-field cfg_width" name="block_config[' + id + '][width]" placeholder="width" />\
									<input type="hidden" value="" class="hidden-field cfg_offset" name="block_config[' + id + '][offset]" placeholder="offset" />\
									<input type="hidden" value="" class="hidden-field cfg_id" name="block_config[' + id + '][id]" placeholder="id" />\
									<div class="right-actions">\
			                            <a onclick="blockSettings(this);" class=" tooltipped" data-position="top" data-delay="300"  data-bs-toggle="tooltip" title="Blok instellingen" class=" tooltipped" data-position="top" data-delay="300"  data-bs-toggle="tooltip" title="' + composerblocksettings + '"><i class="fa fa-fw fa-cog"></i></a>\
										<a onclick="addStaticBlock(this);" class="tooltipped" data-position="top" data-delay="300"  data-bs-toggle="tooltip" title="' + composeraddblock +'"><i class="fa fa-plus"></i></a>\
										<a onclick="delStaticBlock(this);" class="static-block-delete"><i class="far fa-trash-alt"></i></a>\
									</div>\
		                        </div>\
	\
								<input type="hidden" class="hidden-field" name="block[' + block_id + '][]" value="' + id + '" />\
								<input type="hidden" class="hidden-field" name="block_attr[' + id + '][key]" value="' + block.key + '" />\
								<input type="hidden" class="hidden-field" name="block_req[' + id + ']" value="' + dataRequired + '" />\
								<textarea style="display:none;" class="block_data" name="block_data[' + id + ']"></textarea>\
	\
	\
								' + customFields + '\
	\
								<div class="inline-actionss center-align">' + actions + '</div>\
								' + btncomposer + '\
							</div>\
						</div>\
					</li>');

	newBlock.insertAfter(source);

	// console.log( '......' );
	addDropzone(newBlock);

	var key = source.data('key');
	var wrapperKey = source.closest('.root-block').data('key');
	var minimum = 0;
	var blocksByKey = {};
	$.each(active_blocks[wrapperKey].blocks, function(ind, blk){ blocksByKey[blk.key] = blk; });
	if(typeof blocksByKey[key] != 'undefined' && typeof blocksByKey[key].minimum != 'undefined'){
		minimum = blocksByKey[key].minimum;
	}




	if(wrapper.find('[data-key="' + key + '"]').length <= minimum){
		wrapper.find('[data-key="' + key + '"]').find('.static-block-delete').hide();
	}else{
		wrapper.find('[data-key="' + key + '"]').find('.static-block-delete').show();
	}

	$.each(tmp_editors, function(ind, id){
		loadCkeditor4($('#inline-editor-' + id)[0]);
	});

	var currentSize = parseInt(wrapper.find('.wrapper-grid').val());
	var allBlocksInParent = wrapper.find('.content-block');

	// Base width on all blocks added:
	var newCustomSize = false;
	if(currentSize > allBlocksInParent.length || currentSize == 0){
		currentSize = allBlocksInParent.length;
		wrapper.find('.wrapper-grid').val(currentSize);
		newCustomSize = true;
	}

	// Limit to 3 blocks
	if(newCustomSize && (Math.round(((12 / 100) * (100/currentSize)))) < 4){
		allBlocksInParent.css('width', (100/3) + '%');
		allBlocksInParent.data('gridsize', Math.round(((12 / 100) * (100/3))));
		allBlocksInParent.find('.cfg_width').val(Math.round(((12 / 100) * (100/3))));
	}else{
		// console.log( (100/currentSize), Math.round(((12 / 100) * (100/currentSize))) );
		allBlocksInParent.css('width', (100/currentSize) + '%');
		allBlocksInParent.data('gridsize', Math.round(((12 / 100) * (100/currentSize))));
		allBlocksInParent.find('.cfg_width').val(Math.round(((12 / 100) * (100/currentSize))));
	}

	// Update sortables to enable new block
	setupSortables();
	initDviders();
	resetLiClasses();

	$('.root-block').find('span.divider').css('position', 'absolute');
}

/*
 * Add (HTML)-source editor to block
 */
function addSource(el){
	var inlineActions = $(el).parent();
	var wrapper = inlineActions.parent();
	var id = 'editor-' + randId();

	var blockid = $(el).closest('.content-block').data('blockid');

	var tmpHtml = '<textarea name="block_content[' + blockid + '][]" class="source-editor" id="editor-' + blockid + '"></textarea>';

	var editor = $(tmpHtml);
	var contentType = $('<input type="hidden" name="block_type[' + blockid + '][]" value="source" />');
	if(wrapper.find('.block-buttons').length > 0){
		editor.insertBefore(wrapper.find('.block-buttons'));
		contentType.insertBefore(wrapper.find('.block-buttons'));
	}else{
		wrapper.append(editor);
		wrapper.append(contentType);
	}

	inlineActions.find('.btn-text,.btn-bundle,.btn-image,.btn-video,.btn-source').hide();
	 var mixedMode = {
        name: "htmlmixed",
        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
                       mode: null},
                      {matches: /(text|application)\/(x-)?vb(a|script)/i,
                       mode: "vbscript"}]
      };
      let cm = new CodeMirror.fromTextArea(editor[0], {mode: mixedMode, lineNumbers: true});
}

/*
 * Add text editor to block
 */
function addText(el){
	var inlineActions = $(el).parent();
	var wrapper = inlineActions.parent();
	var id = 'editor-' + randId();

	var blockid = $(el).closest('.content-block').data('blockid');

	var tmpHtml = '<div data-editor="editor-' + blockid + '" class="ckeditor4 form-control" contenteditable="true"></div>\
	<textarea name="block_content[' + blockid + '][]" class="inline-editor" id="editor-' + blockid + '"></textarea>';

	var editor = $(tmpHtml);
	if(wrapper.find('.block-buttons').length > 0){
		editor.insertBefore(wrapper.find('.block-buttons'));
	}else{
		wrapper.append(editor);
	}

	// Hide action buttons, content is now present
	inlineActions.find('.btn-text,.btn-bundle,.btn-image,.btn-video,.btn-source').hide();
	inlineActions.hide();
	// inlineActions.find('.btn-clear').show();
	loadCkeditor4(editor[0]);
}

/*
 * Add media to block
 */
var callerEl = null;
var multi_media = false;
function addMedia(el, multi){

	multi_media = false;
	if (typeof multi != 'undefined' && multi == true) {
		multi_media = true;
	}

	callerEl = $(el);

	var mediaid = $(el).parent().parent().find('.card-image img').data('mediaid');

	cpop.large().loadAjax(composerMediaLink + '?inlineedit=1&relatedMedia=' + mediaid);
}

function editMedia(el){
	multi_media = false;
	callerEl = $(el);

	var mediaid = $(el).parent().parent().find('.card-image img').data('mediaid');

	cpop.large().loadAjax(composerMediaEdit + '/' + mediaid + '?inlineedit=1');
}

function clickedPopupMediaComposer(mediaid, filepath, label, width){

	var inlineActions = $(callerEl).parent();
	var wrapper = inlineActions.parent();

	var thisBlock = callerEl.parent().parent();
	thisBlock.find('.media-data').val(mediaid);

	// var blockid = $(callerEl).closest('.content-block').data('blockid');

	var blockid = wrapper.find('input[name*="block\["]').val();

	wrapper.addClass('float-actions');

	if (multi_media) {
		if(thisBlock.find('.card-image').length > 0){
			var preview = thisBlock.find('.card-image');
		}else{
			var preview = $('<div class="card-image block-ct"></div>');
			preview.insertAfter(thisBlock.find('.block-actions'));
		}

		var newMedia = '<div class="mm-wrap"><img style="max-width:' + width + 'px;margin: 0 auto;" src="' + filepath + '" alt="' + label + '" data-mediaid="' + mediaid + '" data-filepath="' + filepath + '" data-label="' + label + '" /></div>';
		preview.append(newMedia);


		mmHeight();
	}else{
		var preview = $('<div class="card-image block-ct"><img style="max-width:' + width + 'px;margin: 0 auto;" src="' + filepath + '" alt="' + label + '" data-mediaid="' + mediaid + '" data-filepath="' + filepath + '" data-label="' + label + '" /></div>');
		if(thisBlock.find('.card-image').length > 0){
			thisBlock.find('.card-image,#media-id').replaceWith(preview);
		}else{
			preview.insertAfter(thisBlock.find('.block-actions'));
		}
	}

	if(thisBlock.find('.block-ct.media-id').length == 0){
		if(multi_media){
			var field = $('<input type="hidden" class="block-ct media-id" name="block_content[' + blockid + '][]" value="" /><div class="center-align media-selector" style="margin: 10px 0;"><a onclick="addMedia(this, true);" class="btn"><i class="left fa fa-edit"></i> ' + composeraddimages + '</a></div>');
			field.insertAfter(thisBlock.find('.card-image'));
		}else{
			var field = $('<input type="hidden" class="block-ct media-id" name="block_content[' + blockid + '][]" value="" /><div class="center-align media-selector" style="margin: 10px 0;"><a onclick="addMedia(this);" class="btn btn-small"><i class="left fa fa-edit"></i></a></div>');
			field.insertAfter(thisBlock.find('.card-image'));

			// editMedia(field);
		}
	}

	var mediaStrings = [];
	$(thisBlock.find('.card-image img')).each(function(ind, img_el){
		mediaStrings.push($(img_el).data('mediaid') + ',' + $(img_el).data('filepath') + ',' + $(img_el).data('label'));
	});

	thisBlock.find('.block-ct.media-id').val(mediaStrings.join(';'));

	// Hide action buttons, content is now present
	inlineActions.find('.btn-text,.btn-bundle,.btn-image,.btn-media,.btn-video,.btn-source').hide();
	// inlineActions.find('.btn-clear').show();

	cpop.close();

}

function removeMM(el){
	var mm_el = $(el).parent().parent();
	var mm_el_parent = $(mm_el).closest('.card-content');
	mm_el.remove();

	var mediaStrings = [];

	$(mm_el_parent.find('.card-image img')).each(function(ind, img_el){
		mediaStrings.push($(img_el).data('mediaid') + ',' + $(img_el).data('filepath') + ',' + $(img_el).data('label'));
	});

	mm_el_parent.find('.block-ct.media-id').val(mediaStrings.join(';'));

	mmHeight();
}

var bundleLinkEl = null;

function editBundle(el){
	bundleLinkEl = el;
	var inlineActions = $(bundleLinkEl).parent();
	var wrapper = inlineActions.parent();

	var label = wrapper.find('.bundle-label').val();
	var data = wrapper.find('.bundle-data').val();

	var data_uri = $.param(JSON.parse(data)) + '&init=1';

	cpop.postAjax(admin_page_link + '/' + label + '?blocks=1', data_uri);
}

function addBundle(el){
	bundleLinkEl = el;
	cpop.reset().loadAjax(admin_page_link + '?blocks=1');
}

function addSpecificBundle(el, bundle){
	bundleLinkEl = el;
	cpop.reset().loadAjax(admin_page_link + '/' + bundle.replace('Bundle', '') + '?blocks=1');
}

var cfg_current_block = null;

function blockSettings(el){
	bundleLinkEl = el;
	var inlineActions = $(bundleLinkEl).parent();
	var wrapper = inlineActions.parent();

	cfg_current_block = wrapper;

	$('#cfg_class').val(cfg_current_block.find('.cfg_class').val());
	$('#cfg_style').val(cfg_current_block.find('.cfg_style').val());
	$('#cfg_link').val(cfg_current_block.find('.cfg_link').val());
	$('#cfg_target').val(cfg_current_block.find('.cfg_target').val());
	$('#cfg_width').val(cfg_current_block.find('.cfg_width').val());
	$('#cfg_offset').val(cfg_current_block.find('.cfg_offset').val());
	$('#cfg_id').val(cfg_current_block.find('.cfg_id').val());

	// Implememt custom fields by templates
	var cf_wrapper = $('#custom-fields');

	// Clear previous fields
	cf_wrapper.html('');

	$('#block-settings').modal('show');
}

function mmHeight(){
	$('.card-image img,.mm-wrap').css('height', '');
	$('.card-image').each(function(k,ci){
		var n = $(ci).find('img').length;
		var w = (100/n);

		if (w < 50) {
			w = 50;
		}

		var images = $(ci).find('.mm-wrap');
		images.css('float','left').width(w + '%');

		var images = $(ci).find('.mm-wrap');
		var mh = 0;
		$.each(images, function(ind, el){ if($(el).height() > mh){ mh = $(el).height(); } });
		if (mh > 0) {
			images.height(mh);
			images.find('img').height(mh);
		}
	});
}

function blockSettings_close(){
	cfg_current_block.find('.cfg_class').val($('#cfg_class').val());
	cfg_current_block.find('.cfg_style').val($('#cfg_style').val());
	cfg_current_block.find('.cfg_link').val($('#cfg_link').val());
	cfg_current_block.find('.cfg_target').val($('#cfg_target').val());
	console.log( cfg_current_block );
	console.log( $('#cfg_width') );
	console.log( $('#cfg_width').val() );
	cfg_current_block.find('.cfg_width').val($('#cfg_width').val());
	cfg_current_block.find('.cfg_offset').val($('#cfg_offset').val());
	cfg_current_block.find('.cfg_id').val($('#cfg_id').val());

	// $('#cfg_width').val()

	var size = $('#cfg_width').val();
	cfg_current_block.closest('li').css('width', (((parseInt(size) / 12) * 100)) + '%');

	var size = $('#cfg_offset').val();
	cfg_current_block.closest('li').css('margin-left', (((parseInt(size) / 12) * 100)) + '%');

	$.each($('.template-field'), function(ind, el){
		var el      = $(el);
		var linkKey = el.data('linkkey');
		var type    = el.data('type');

		if(type == 'text'){
			$('#' + linkKey).val(el.val());
		}
		if(type == 'textarea'){
			$('#' + linkKey).val(el.val());
		}
	});

	$('#block-settings').modal('hide');

	return false;
}

function linkBundle(bundle, label, data){
	var inlineActions = $(bundleLinkEl).parent();
	var wrapper = inlineActions.parent();

	if(wrapper.find('.block-ct').length > 0){
		wrapper.find('.block-ct').remove();
	}

	var blockid = $(bundleLinkEl).closest('.content-block').data('blockid');

	var editor = $('<div class="block-ct">\
		<input type="hidden" name="block_bundle[' + blockid + '][bundle]" class="bundle-bundle" value="' + bundle + '" />\
		<input type="hidden" name="block_bundle[' + blockid + '][label]" class="bundle-label" value="' + label + '" />\
		<input type="hidden" name="block_bundle[' + blockid + '][data]" class="bundle-data" value="" id="' + blockid + '_data" />\
		\
		<h1 style="text-align: center;margin: 20px 0 0 0;font-size: 22px;">Extensie: ' + label + '</h1>\
	</div>');
	wrapper.prepend(editor);

	$('#' + blockid + '_data').val(data);

	// Hide action buttons, content is now present
	inlineActions.find('.btn-text,.btn-bundle,.btn-image,.btn-video,.btn-source').hide();
	// inlineActions.find('.btn-clear').show();
	inlineActions.find('.btn-edit,.btn-clear').show();

	setTimeout(function(){
		cpop.close();
	}, 200);
}

/*
 * Clear block contents
 */
function delContent(el){
	var inlineActions = $(el).parent();
	var parent = inlineActions.parent().parent().parent();
	var inlineActions = $(el).parent();
	var block = inlineActions.parent();


	if(block.find('textarea.block-ct').length > 0){
		var id = block.find('textarea.block-ct')[0].id;
		// Find existing CKEditor and destroy it for memory purposes
	}

	if(block.find('.card-image').length > 0){
		block.removeClass('float-actions');
	}


	block.find('.block-ct').remove();

	// Show action buttons, content is now removed
	block.find('.btn-text,.btn-bundle,.btn-image,.btn-video').show();
	block.find('.btn-clear,.btn-edit').hide();
}

/*
 * Delete block and clean up
 */
function delBlock(el){
	var inlineActions = $(el).parent();
	var parent = inlineActions.parent().parent().parent().parent();

	$(el).closest('.content-block').remove();

	var allBlocksInParent = parent.find('.content-block');
	var n = allBlocksInParent.length;

	if(n == 0){
		// Delete block wrapper when no blocks are present
		parent.parent().remove();
	}else{
		// Update block widths to fit side by side
		allBlocksInParent.data('width', (100/n) + '%');
		allBlocksInParent.css('width', (100/n) + '%');
	}

	resetLiClasses();
}

/*
 * Delete block and clean up
 */
function delStaticBlock(el){
	var block = $(el).closest('.content-block');
	var wrapper = block.closest('.root-block');

	var key = block.data('key');

	var wrapperKey = block.closest('.root-block').data('key');
	var minimum = 0;
	var blocksByKey = {};
	$.each(active_blocks[wrapperKey].blocks, function(ind, blk){ blocksByKey[blk.key] = blk; });
	if(typeof blocksByKey[key] != 'undefined' && typeof blocksByKey[key].minimum != 'undefined'){
		minimum = blocksByKey[key].minimum;
	}

	block.remove();

	if(wrapper.find('[data-key="' + key + '"]').length <= minimum){
		wrapper.find('[data-key="' + key + '"]').find('.static-block-delete').hide();
	}else{
		wrapper.find('[data-key="' + key + '"]').find('.static-block-delete').show();
	}


	var currentSize = parseInt(wrapper.find('.wrapper-grid').val());
	var allBlocksInParent = wrapper.find('.content-block');

	// Base width on all blocks added:
	currentSize = allBlocksInParent.length;
	wrapper.find('.wrapper-grid').val(currentSize);

	// console.log( (100/currentSize), Math.round(((12 / 100) * (100/currentSize))) );
	allBlocksInParent.css('width', (100/currentSize) + '%');
	allBlocksInParent.data('gridsize', Math.round(((12 / 100) * (100/currentSize))));



	// if(wrapper.find('li').length < )
	resetLiClasses();
}

/*
 * Generate random ID
 */
function randId() {
	return Math.random().toString(36).substr(2, 10);
}

/*
 * Initialize
 */
$( function() {

	$.each($('div.ckeditor4'), function(ind, el){
		loadCkeditor4(el);
	});
	$.each($('div.block-ct'), function(ind, el){
		var inlineActions = $(el).parent().find('.inline-actions');
		inlineActions.find('.btn-text,.btn-bundle,.btn-image,.btn-video,.btn-source').hide();
		// inlineActions.find('.btn-clear').show();
		inlineActions.find('.btn-edit').show();
	});

	setupSortables();


	$('.colorpicker').minicolors({
		position: 'top left',
		// swatches: ['#ef9a9a', '#ff0000', '#444444', '#eeeeee']
	});

	resetLiClasses();
} );

function deleteWrapper(btn){
	var wrapper = $(btn).closest('.root-block');
	// wrapper.prev('.add-section-between').remove();
	wrapper.addClass('deleted');
	setTimeout(function(){
		wrapper.remove();

		if($('.root-block').length == 0){
			$('#new-section-notifier').show();
		}
	}, 450);
}

function cloneWrapper(btn){
	var wrapper = $(btn).closest('.root-block');

	localStorage.setItem('blockCopy', wrapper[0].outerHTML);

	initPaste();

}

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

/*
 * Setup sortables
 */
function setupSortables(){

	$('.colorpicker').off('click').on('click', function click(e){

		// cpop.colorPicker(this, $(this).closest('.root-block')[0], 'background-color');
	});

	$('#block-container').sortable({
		distance: 8,
		revert: 200,
		placeholder: 'root-placeholder',
		handle: '.card-title',

		receive: function( event, ui ) {
			var key = myNewBlock.data('key');

			selectSection(key, true, false);
		},

		start: function( event, ui ) {
			ui.item.removeClass('new');
			ui.item.removeClass('stopped-dragging');
			ui.item.addClass('dragging');

			ui.placeholder.height(ui.item.height());
		},
		stop: function( event, ui ) {
			ui.item.removeClass('new');
			ui.item.removeClass('dragging');
			ui.item.addClass('stopped-dragging');

			$.each($(ui.item).find('div.ckeditor4'), function(ind, el){
				loadCkeditor4(el);
			});

			resetLiClasses();
		}
	});


	$('.button-wrapper').sortable({
		// Buttons sorter
	});

	if($('.connectedSortable').length > 0){
		// if(sortableObj == null){
			sortableObj = $('.connectedSortable').sortable({
				handle: '.block-actions',
				placeholder: 'sortable-placeholder',
				connectWith: '.connectedSortable',
				start: function(e, ui){
					var w = $(ui.item).data('width');
					$(ui.placeholder).css('width', w);
					ui.placeholder.height(ui.item.height() - 10);
					// console.log( $(ui.item).parent().find('li').removeClass('li-last').removeClass('li-first'));

					console.log( '.. START ..' );
				},
				change: function(event,ui){
					// $(sortableLinks).sortable('serialize')
					console.log( '.. CHANGE ..' );
					resetLiClasses($(ui.item), $(ui.item).closest('.root-block'));
				},
				stop: function(event,ui){

					$.each($(ui.item).find('div.ckeditor4'), function(ind, el){
						loadCkeditor4(el);
					});

					resetLiClasses();
					console.log( '.. STOP ..' );
				}
			});
		// }else{
			// updateSortables();
		// }
	}

	// resetLiClasses();
}

/*
 * Update sortables
 */
function updateSortables(){
	$('.connectedSortable').sortable( "refresh" );
}

function initCollapsingRoots(){
	$('.wrapper-actions .wrapper-retract,.wrapper-actions .wrapper-expand,.wrapper-actions span.title').off('click').click(function(e){
		e.preventDefault();
		// $('.root-block').removeClass('active');
		$(this).closest('.root-block').toggleClass('active');
		$(this).closest('.root-block').find('span.divider').css('position', 'absolute');

		storeCollapsedStatus();

		if ($(this).closest('.root-block').hasClass('active')) {
			resetLiClasses();
		}
	});
}

initCollapsingRoots();

function storeCollapsedStatus(){
	var blocks = $('.root-block.active');
	var opened = [];
	$.each(blocks, function(ind, el){
		opened.push($(el).data('id'));
	});

	Cookies.set('t-composer-states', opened.join(','));
}

function restoreCollapsedStatus(){
	var st = Cookies.get('t-composer-states');
	if(st != '' && typeof st != 'undefined'){
		var ids = st.split(',');
		$.each(ids, function(ind, id){
			$('[data-id="' + id + '"]').addClass('active');
		});
	}
}

var collapse = true;

$('#retract_all,#expand_all').off('click').on('click', function(){
	if(collapse){
		retract_all();
		collapse = false;
	}else{
		expand_all();
		collapse = true;
	}
});

function retract_all(){
	$('.root-block').removeClass('active');
	storeCollapsedStatus();
}

function expand_all(){
	$('.root-block').addClass('active');

	$('.root-block').find('span.divider').css('position', 'absolute');

	storeCollapsedStatus();
	resetLiClasses();
}

function addSectionAbove(btn){
	between = $(btn).parent();
	$('#block-modal').modal('open');
}

function toggleVisibility(el){
	var chkbx = $(el).find('input[type="checkbox"]');
	if(chkbx.prop('checked')){
		$(el).find('.visibility').hide();
		$(el).find('.visibility_off').show();
		chkbx.prop('checked', false);
		$(el).closest('.root-block').removeClass('visible').addClass('invisible');
	}else{
		$(el).find('.visibility').show();
		$(el).find('.visibility_off').hide();
		chkbx.prop('checked', true);
		$(el).closest('.root-block').addClass('visible').removeClass('invisible');
	}
	return false;
}

function pageSelect(pageid, label){
	if(linkSelectEl){
		linkSelectEl.parent().find('.pageid').val('page:' + pageid + '');
		linkSelectEl.parent().find('.pagelabel').html('Geselecteerd: <strong>' + label + '</strong>');
		linkSelectEl = null;
	}

	cpop.close();
}

function mediaSelect(mediaid, filepath, label){
	if(linkSelectEl){
		linkSelectEl.parent().find('.pageid').val('media:' + mediaid + '');
		linkSelectEl.parent().find('.pagelabel').html('Geselecteerd: <strong>' + label + '</strong>');
		linkSelectEl = null;
	}

	cpop.close();
}

$('.wrapper-text-fields h2,.wrapper-text-fields div').keyup(function(e){
	$('#' + $(this).data('id')).val($(this).html());
});

function toggleWrapperLinkConfig(el){
	$(el).closest('.root-block').addClass('active').find('.wrapper-text-link').toggle();
	storeCollapsedStatus();
}

function toggleWrapperTextFields(el){
	$(el).closest('.root-block').addClass('active').find('.wrapper-text-fields').toggle();
	storeCollapsedStatus();
}

function toggleWrapperConfig(el){
	$(el).closest('.root-block').addClass('active').find('.wrapper-config').toggle();
	storeCollapsedStatus();
}

restoreCollapsedStatus();

function initPaste(){
	if(localStorage.getItem('blockCopy') != null){
		$('.wrap-paste').show();
	}else{
		$('.wrap-paste').hide();
	}

	pollPaste();
}

function pollPaste(){
	setTimeout(function(){
		if(localStorage.getItem('blockCopy') != null){
			$('.wrap-paste').show();
		}else{
			$('.wrap-paste').hide();
		}
		pollPaste();
	}, 3000);
}

initPaste();

function pasteBlock(btn){
	var pasteAfter = $(btn).parent();

	var wrapper = $(localStorage.getItem('blockCopy'));

	var originalWrapperId = wrapper.attr('data-id');
	var clonedWrapper = wrapper.clone();

	var title = wrapper.find('.card-title .wrapper-actions span.title').html() + ' (kopie)';
	clonedWrapper.addClass('cloned').find('.card-title .wrapper-actions span.title').html(title);

	 // Prepare ID replacements
	var wrapper_id = randId();

	// Wrapper ID's
	clonedWrapper.html(clonedWrapper.html().replaceAll('\[' + originalWrapperId + '\]', '[' + wrapper_id + ']'));
	clonedWrapper.attr('data-id', wrapper_id);
	clonedWrapper.find('input[name*="block_wrappers\["]').val(wrapper_id);

	// Block ID's
	$.each(clonedWrapper.find('li.content-block'), function(ind, col){
		var block_id = randId();
		var col = $(col);

		var originalId = col.attr('data-blockid');

		col.prop('id', block_id);
		col.attr('data-blockid', block_id);
		col.find('input[name*="block\["]').val(block_id);
		col.find('.add-new-block-btn').attr('onclick', 'addButton(this, \'' + block_id + '\');');

		var bhtml = col.html();
		bhtml = bhtml.replaceAll('\[' + originalId + '\]', '[' + block_id + ']');
		bhtml = bhtml.replaceAll(originalId + '_', block_id + '_')
		bhtml = bhtml.replaceAll(' \'' + originalId + '\')', ' \'' + block_id + '\')')

		/* FALLBACK WHEN COPYING BLOCK WITH SAME ID AS WRAPPER */
		bhtml = bhtml.replaceAll('\[' + wrapper_id + '\]', '[' + block_id + ']');
		bhtml = bhtml.replaceAll(wrapper_id + '_', block_id + '_')
		bhtml = bhtml.replaceAll(' \'' + wrapper_id + '\')', ' \'' + block_id + '\')')
		bhtml = bhtml.replaceAll('name="block\[' + block_id + '\]\[\]"', 'name="block\[' + wrapper_id + '\]\[\]"')

		col.html(bhtml);
	});

	clonedWrapper.insertAfter(pasteAfter.parent());

	if(clonedWrapper.find('.sortables').length > 0){
		clonedWrapper.find('.sortables').sortable();
	}

	// Remove old CKEditor

	$.each(clonedWrapper.find('.ck-editor__editable'), function(ind, oldEditor){

		var oldEditorKey = $(oldEditor).data('editor').replace(/^.*?_/g, '');


		var tmpNBlock = $(oldEditor).closest('li.content-block');
		var tmpNBlockId = tmpNBlock.data('blockid');
		$(oldEditor).removeClass('ck');
		$(oldEditor).removeClass('ck-content');
		$(oldEditor).removeClass('ck-editor__editable');
		$(oldEditor).removeClass('cke_editable_inline');
		$(oldEditor).removeClass('cke_show_borders');
		$(oldEditor).removeClass('cke_focus');
		$(oldEditor).removeClass('cke_contents_ltr');
		$(oldEditor).removeClass('cke_editable');
		$(oldEditor).removeClass('ck-rounded-corners');
		$(oldEditor).removeClass('ck-editor__editable_inline');
		$(oldEditor).removeClass('ck-blurred');
		// $(oldEditor).attr('id', 'editor-' + tmpNBlockId);
		if(!$(oldEditor).parent().hasClass('wrapper-text-fields')){
			$(oldEditor).data('editor', 'editor-' + tmpNBlockId + '-' + oldEditorKey);
		}
	});

	$.each(clonedWrapper.find('.content-block-wrapper .inline-editor'), function(ind, oldEditorArea){

		var oldEditorKey = $(oldEditorArea).attr('id').replace(/^.*?_/g, '');

		var tmpNBlock = $(oldEditorArea).closest('li.content-block');
		var tmpNBlockId = tmpNBlock.data('blockid');
		// $(oldEditorArea).removeClass('inline-editor');
		$(oldEditorArea).attr('id', 'editor-' + tmpNBlockId + '-' + oldEditorKey);
	});

	clonedWrapper.find('textarea.block-ct').show(); // Remove old ckeditors

	// Create new CKEditor
	$.each(clonedWrapper.find('div.ckeditor4,.ckeditor4-inline'), function(ind, el){
		loadCkeditor4(el);
	});

	// Update sortables to enable new block
	setupSortables();
	initCollapsingRoots();

	localStorage.removeItem('blockCopy');
	initPaste();
	$('#new-section-notifier').hide();
}

function addContainmentBlock(el){
	var c_wrapper = $(el).parent().parent();
	if(c_wrapper.hasClass('contained')){
		var prevCard = $(el).parent().prev();
		if(prevCard.hasClass('card')){
			var newCard = $('<div class="card"></div>');

			if(prevCard.data('blockid')){
				// Is already a child
				var originalId = prevCard.attr('data-blockid');
			}else{
				// Is first
				var originalId = c_wrapper.attr('data-blockid');
			}

			var block_id = randId();

			newCard.html(prevCard.html().replaceAll('\[' + originalId + '\]', '[' + block_id + ']'));
			newCard.html(newCard.html().replaceAll('editor-' + originalId, 'editor-' + block_id));
			newCard.html(newCard.html().replaceAll(', ' + originalId + ')', ', ' + block_id + ')'));

			// Clear CKEditor
			newCard.html(newCard.html().replaceAll('ck-rounded-corners', ''));
			newCard.html(newCard.html().replaceAll('ck-editor__editable_inline', ''));
			newCard.html(newCard.html().replaceAll('ck-editor__editable', ''));
			newCard.html(newCard.html().replaceAll('ck-blurred', ''));
			newCard.html(newCard.html().replaceAll('ck-content', ''));
			newCard.html(newCard.html().replaceAll('cke_editable_inline', ''));
			newCard.html(newCard.html().replaceAll('cke_editable', ''));
			newCard.html(newCard.html().replaceAll('cke_contents_ltr', ''));
			newCard.html(newCard.html().replaceAll('cke_focus', ''));
			newCard.html(newCard.html().replaceAll('cke_show_borders', ''));
			newCard.html(newCard.html().replaceAll('ck ', ''));

			newCard.prop('id', block_id);
			newCard.attr('data-blockid', block_id);
			newCard.find('input[name*="block\["]').val(block_id);


			newCard.find('.card-image,.media-id,.media-selector,.custom-block-btn').remove();
			newCard.find('.blocks-display-form').html('');
			newCard.find('.template-fields').val('');
			newCard.find('.btn-image').show();

			newCard.insertAfter(prevCard);

			newCard.find('.ckeditor4').html('');
			newCard.find('.inline-editor').val('');

			loadCkeditor4(newCard.find('.ckeditor4'));
		}
	}
}

function delContainmentBlock(el){
	$(el).parent().parent().parent().remove();
}

function setGrid(el){

	var gParent = $('.grid-select').parent();

	$('.grid-select').remove();

	if(gParent[0] == $(el).parent()[0]){
		gParent = null;
		return false;
	}else{
		gParent = null;
	}

	var currentSize = parseInt($(el).parent().find('.wrapper-grid').val());

	var gridSelect = $('<div class="grid-select">\
						<div>\
							<a data-size="1">100%</a>\
							<a data-size="2">50%</a>\
							<a data-size="3">33%</a>\
							<a data-size="4">25%</a>\
							<a data-size="6">16%</a>\
						</div>\
					</div>');
	$(el).parent().append(gridSelect);
	gridSelect.css('left', $(el).position().left + 'px');

	$.each(gridSelect.find('a'), function(ind, el){
		if ($(el).index() < currentSize) {
			$(el).addClass('current').addClass('active');
		}
	});

	gridSelect.find('a').mouseover(function(e){
		$(this).addClass('active');
		$(this).prevAll().addClass('active');
		$(this).nextAll().removeClass('active');
	});

	gridSelect.find('a').click(function(e){
		e.preventDefault();
		setGridSize($(this).data('size'));

		gridSelect.remove();
	});
}

function setGridSize(size){
	$('.grid-select').parent().find('.wrapper-grid').val(size);
	$('.grid-select').closest('.root-block').find('li').css('width', (100 / parseInt(size)) + '%');
	$('.grid-select').closest('.root-block').addClass('active');

	$('.grid-select').closest('.root-block').find('li').data('gridsize', Math.round(((12 / 100) * (100/parseInt(size)))));
	$('.grid-select').closest('.root-block').find('li').data('gridsize', Math.round(((12 / 100) * (100/parseInt(size)))));
	$('.grid-select').closest('.root-block').find('li .cfg_width').val(Math.round(((12 / 100) * (100/parseInt(size)))));
	storeCollapsedStatus();
	resetLiClasses();
}

mmHeight();

$().ready(function(){
	inlineDropzones = $('.media-drop');
	inlineDropzones.each(function(ind, dropzone){
		addDropzone(dropzone);
	});

	testNotifyDots();
});

function addDropzone(dropzone){
	var fd = $(dropzone).filedrop({
	    // fallback_id: 'upload_button',   // an identifier of a standard file input element, becomes the target of "click" events on the dropzone
	    url: admin_page_composer_uploadhandler,              // upload handler, handles each file separately, can also be a function taking the file and returning a url
	    paramname: 'media',          // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
	    withCredentials: true,          // make a cross-origin request with cookies
	    enableClick: false,
	    data: {
	    	'blockid': $(dropzone).data('blockid')
	    },
	    error: function(err, file) {
	        switch(err) {
	            case 'BrowserNotSupported':
	            	$('#upload-overlay').hide();
	                alert(composerdropzonenotsupported)
	                break;
	            case 'TooManyFiles':
	            	$('#upload-overlay').hide();
	                // user uploaded more than 'maxfiles'
	                break;
	            case 'FileTooLarge':
	            	$('#upload-overlay').hide();
	            	cpop.loadHtml(composerdropzonetoolarge + ' ' + maxFileSize + ' MB');
	                // program encountered a file whose size is greater than 'maxfilesize'
	                // FileTooLarge also has access to the file which was too large
	                // use file.name to reference the filename of the culprit file
	                break;
	            case 'FileTypeNotAllowed':
	            	$('#upload-overlay').hide();
		            cpop.loadHtml(composerdropzonenotallowedfirst + ' \'' + file.type + '\' '+ composerdropzonenotallowedlast + '<ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>');
	                // The file type is not in the specified list 'allowedfiletypes'
	                break;
	            case 'FileExtensionNotAllowed':
	            	$('#upload-overlay').hide();
	                // The file extension is not in the specified list 'allowedfileextensions'
	                break;
	            default:
	                break;
	        }
	    },
	    allowedfiletypes: allowedTypes,
	    allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
	    maxfiles: 10,
	    maxfilesize: maxFileSize,    // max file size in MBs
	    drop: function(x,y,z) {
	        $('#upload-overlay').show();
	        $('#upload-overlay .progress-bar').css('width', '0%');
	    },
	    globalProgressUpdated: function(progress) {
	        $('#upload-overlay .progress-bar').css('width', progress + '%');
	    },
	    dragOver: function() {
	        $(this).addClass('hover');
	    },
	    dragLeave: function() {
	        $(this).removeClass('hover');
	    },
	    uploadFinished: function(i, file, response, time) {







	    	var mediaid = response.id;
	    	var filepath = response.path;
	    	var label = response.filename;
	    	var width = response.width;


			var inlineActions = $(dropzone).find('.inline-actionss');
			var wrapper = $(dropzone).find('.content-block-wrapper');

			var thisBlock = $(dropzone).find('.content-block-wrapper');
			thisBlock.find('.media-data').val(mediaid);

			// var blockid = $(callerEl).closest('.content-block').data('blockid');

			var blockid = wrapper.find('input[name*="block\["]').val();

			wrapper.addClass('float-actions');


			var preview = $('<div class="card-image block-ct"><img style="max-width:' + width + 'px;margin: 0 auto;" src="' + filepath + '" alt="' + label + '" data-mediaid="' + mediaid + '" data-filepath="' + filepath + '" data-label="' + label + '" /></div>');
			if(thisBlock.find('.card-image').length > 0){
				thisBlock.find('.card-image,#media-id').replaceWith(preview);
			}else{
				preview.insertAfter(thisBlock.find('.block-actions'));
			}

			if(thisBlock.find('.block-ct.media-id').length == 0){
				var field = $('<input type="hidden" class="block-ct media-id" name="block_content[' + blockid + '][]" value="" /><div class="center-align media-selector" style="margin: 10px 0;"><a onclick="addMedia(this);" class="btn btn-small"><i class="left fa fa-edit"></i></a></div>');
				field.insertAfter(thisBlock.find('.card-image'));
				// editMedia(field);
			}

			var mediaStrings = [];
			$(thisBlock.find('.card-image img')).each(function(ind, img_el){
				mediaStrings.push($(img_el).data('mediaid') + ',' + $(img_el).data('filepath') + ',' + $(img_el).data('label'));
			});

			thisBlock.find('.block-ct.media-id').val(mediaStrings.join(';'));

			inlineActions.find('.btn-text,.btn-bundle,.btn-image,.btn-video,.btn-source').hide();




	        $(dropzone).removeClass('hover');







	    },
	    beforeSend: function(file, i, done) {
	    	activeZone = $(this);
	        done(); // Start upload
	        $(this).removeClass('hover');
	        $(this).addClass('running');
	    },
	    afterAll: function() {
	        $('#upload-overlay').hide();
	        $('#upload-overlay .progress-bar').css('width', '0%');
	        $(this).removeClass('hover');
	        $(this).removeClass('running');
	    }
	});
	fileDrop.push(fd);
}
function resetLiClasses(block, wrapper){

	if(typeof block == 'undefined') block = null;
	if(typeof wrapper == 'undefined') wrapper = null;

	var listOfBlocks = $('.content-container');
	if(wrapper){
		listOfBlocks = wrapper.find('.content-container');
	}

	// Reset <li.content-block> classes on all .content-container wrappers
	$.each(listOfBlocks, function(ind, cont){
		var containerWidth = $(cont).closest('.root-block').width();
		var containerWidthCalc = ((0 + containerWidth) - 30);

		// Alternative solution for dynamic width blocks
		var rowCount       = 0;
		var li_index       = 0;
		$.each($(cont).find('li.content-block'), function(ind, li){
			if(block == null || li != block[0]){
				var li = $(li);

				if(containerWidthCalc <= (li.width())){ // Safezone is 100px
					// Last
					containerWidthCalc = ((0 + containerWidth) - 30);

					li.addClass('li-last');
					rowCount++;
					li_index = 0;

				}

				containerWidthCalc -= (li.width()); // 20 = card padding

				li_index++;
				li.removeClass (function (index, className) {
					return (className.match (/(^|\s)row-\S+/g) || []).join(' ');
				});
				li.removeClass (function (index, className) {
					return (className.match (/(^|\s)li-\S+/g) || []).join(' ');
				});
				li.addClass('row-' + rowCount);

				if(li_index == 1){
					li.addClass('li-first');
				}
			}
		});
	});
}

function clickedPopupMedia(mediaid, filepath, label, width){
	if(typeof linkMedia != 'undefined' && linkMedia == true){
		$('div[data-name="image"]').html('').css('background-image', 'url(' + filepath + ')');
    	$('#image_del_btn').show();
    	$('#link_image').val(mediaid);
		linkMedia = false;
	}else{
		if(typeof seoMedia != 'undefined' && seoMedia == true){
			console.log( '#meta-field-' + mediaField, $('#meta-field-' + mediaField) );
			console.log( '#meta-image-' + mediaField, $('#meta-image-' + mediaField) );
			console.log( '#meta-imageselect-' + mediaField, $('#meta-imageselect-' + mediaField) );
			$('#meta-field-' + mediaField).val(filepath);
			$('#meta-image-' + mediaField).html('<img src="' + filepath + '" style="max-width: 100%;max-height: 100%;" /><button style="" type="button" onclick="deleteMetaImage(' + mediaField + ');" class="btn red darken-1 del_btn"><i class="fa fa-trash-alt"></i></button>');
			$('#meta-imageselect-' + mediaField).hide();
			cpop.close();
		}else{
			clickedPopupMediaComposer(mediaid, filepath, label, width);
		}
	}
}

function resetPaddingFields(){
	$('.padding-field').val('');
}

function testNotifyDots(){
	$.each($('[data-modifier="settings"]'), function(ind, el){
		// Settings test
		var countFilled = 0;
		let wc = $(el).closest('.root-block').find('.wrapper-config');
		$.each(wc.find('input,select'), function(ind, inp){
			if(inp.value != ''){
				countFilled += 1;
			}
		});

		if(countFilled > 0){
			$(el).append($('<span class="notify-dot"></span>'));
		}else{
			$(el).find('.notify-dot').remove();
		}
	});
	$.each($('[data-modifier="heading"]'), function(ind, el){
		// Heading test
		var countFilled = 0;
		let wtf = $(el).closest('.root-block').find('.wrapper-text-fields');

		let main = wtf.find('.main-label').val();
		let sub = wtf.find('.sub-label').val();

		if(main != ''){
			countFilled += 1;
		}
		if(sub != ''){
			countFilled += 1;
		}

		if(countFilled > 0){
			$(el).append($('<span class="notify-dot"></span>'));
		}else{
			$(el).find('.notify-dot').remove();
		}
	});
}
