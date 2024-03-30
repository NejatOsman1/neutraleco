var done = [];
var Trinity = {
	debug: true, // Show / hide debug information for CKEditor like toolbar items in console

	editor: null,
	editorField: null,
	linkFormView: null,
	toMap: null,

	adminBundleLink: null,
	adminMediaLink: null,
	adminPageLink: null,
	
	setEditor: function(cke){ this.editor = cke; },
	setLinkFormView: function(linkFormView){ this.linkFormView = linkFormView; },
	setToMap: function(toMap){ this.toMap = toMap; },

	/*
		Bundle selector
	*/
	bundleSelect: function(action){
		cpop.reset().loadAjax(this.adminBundleLink);
	},

	/*
		Media selector
	*/
	mediaSelect: function(action){
		cpop.reset().loadAjax(this.adminMediaLink);
	},

	/*
		Page selector
	*/
	pageSelect: function(){
		cpop.reset().loadAjax(this.adminPageLink);
	},

	/*
		Append text
	*/
	addToEditor: function(content){
		this.ckWrite(content);
		cpop.close();
	},

	/*
		Append text to CKEditor
	*/
	ckWrite: function(content){
		if(this.editor != null){
			this.editor.insertText(content);
		}
	},

	/*
		Append image to CKEditor
	*/
	ckWriteMedia: function(url, id){
		if(this.editor != null){
			this.editor.insertText('<img src="' + url + '" data-id="' + id + '" />');
		}
	},

	guidGenerator: function() {
	    var S4 = function() {
	       return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	    };
	    return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}
};

// Prepared variables
var loadCkeditor4 = null;
var loadCkeditor4Classic = null;
var editorStorage = {};

var myToolBar = [
	{
		name: 'document',
		items: [
			'Styles',
			'Format',
			'Bold',
			'Italic',
			'Underline',
			'Strike',
			// 'Subscript',
			// 'Superscript',
			// 'RemoveFormat',
			'BulletedList',
			// 'Outdent',
			// 'Indent',
			'Blockquote',
			'JustifyLeft',
			'JustifyCenter',
			'JustifyRight',
			// 'JustifyBlock',
			'Link',
			'Unlink',
			'Image',
			'Table',
			'bundleSelect',
			// 'FontSize',
			// 'TextColor',
			// 'FontAwesome',
			'Sourcedialog',
			'closeEditor'
		]
	},
];

var myToolBar_limit = [
	{
		name: 'document',
		items: [
			// 'Styles',
			// 'Format',
			'Bold',
			'Italic',
			'Underline',
			'Strike',
			// 'Subscript',
			// 'Superscript',
			// 'RemoveFormat',
			// 'BulletedList',
			// 'Outdent',
			// 'Indent',
			// 'Blockquote',
			// 'JustifyLeft',
			// 'JustifyCenter',
			// 'JustifyRight',
			// 'JustifyBlock',
			// 'Link',
			// 'Unlink',
			// 'Image',
			// 'Table',
			// 'bundleSelect',
			// 'FontSize',
			// 'TextColor',
			// 'FontAwesome',
			'Sourcedialog',
			'closeEditor'
		]
	},
];

function initEditor(el){
	if(done.includes(el)){
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
	// custom_config.extraPlugins = 'fontawesome';
	// {% set css = "'" ~ Settings.getLayoutIncludeCss(true)|join("','") ~ "'" %}
	// custom_config.contentsCss = [{{css|raw}}, '/framework/css/style.css', '/css/custom.css', '/bundles/cms/css/editor.css'];
	// custom_config.contentsCss = ['https://use.fontawesome.com/releases/v5.8.1/css/all.css', {{css|raw}}, '/framework/css/style.css', '/css/custom.css', '/bundles/cms/css/editor.css'];
	custom_config.resize_dir                = 'vertical';
	custom_config.removePlugins                = 'wordcount,fontawesome';
	custom_config.allowedContent            = true;
	custom_config.protectedSource           = {};
	custom_config.floatSpaceDockedOffsetY   = 30;
	custom_config.protectedSource           = [/<protected>[\s\S]*<\/protected>/g];
	custom_config.language = ckeditorlanguage;

	var currEditor = CKEDITOR.inline(el, custom_config);

	currEditor.on('change', function(evt) {
		var editor = evt.editor;
		Trinity.editor = editor;
		Trinity.editorField = $('#' + $(editor.element.$).data('editor'));
        var sourceEl = Trinity.editorField;
        const data = editor.getData();
        sourceEl.val(data);
	});

	currEditor.on('focus', function(evt) {
		var editor = evt.editor;
		Trinity.editor = editor;
		Trinity.editorField = $('#' + $(editor.element.$).data('editor'));
        var sourceEl = Trinity.editorField;
        const data = editor.getData();
        sourceEl.val(data);
	});

	/*currEditor.on('instanceReady',function(evt){
		var editor = evt.editor;
        var sourceEl = $('#' + $(editor.element.$).data('editor'));
        const data = editor.getData();
        sourceEl.val(data);
	});*/

	// Bundle selection popup
	currEditor.addCommand("bundleSelect", { // create named command
		exec: function(edt) {
			cpop.reset().loadAjax(Trinity.adminBundleLink);
		}
	});
	currEditor.ui.addButton('bundleSelect', { // add new button and bind our command
		label: "Trinity",
		command: 'bundleSelect',
		toolbar: 'document',
		icon: '/bundles/cms/trinity_icon_small.png'
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

loadCkeditor4 = function(el){

    // Pre-set CKEditor classes
    $(el).addClass('ck');
    $(el).addClass('ck-content');
    $(el).addClass('ck-editor__editable');
    $(el).addClass('ck-rounded-corners');
    $(el).addClass('ck-editor__editable_inline');
    $(el).addClass('ck-blurred');

    /*$(el).off('click').on('click', function(e){
        e.preventDefault();
        initEditor(this);
    });*/

    $(el).off('focus').on('focus', function(e){
        e.preventDefault();
        if(!$(this).hasClass('cke_editable_inline')){
	        initEditor(this);
	    }
    });
}