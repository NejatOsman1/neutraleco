/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	if(typeof ckAdminPageUrl != 'undefined'){
		config.filebrowserBrowseUrl = ckAdminPageUrl;
	}
	if(typeof ckAdminMediaUrl != 'undefined'){
		config.filebrowserImageBrowseUrl = ckAdminMediaUrl;
	    config.filebrowserUploadUrl = ckAdminMediaUrl + '/upload.php';
	}
	if(typeof ckDropUploadUrl != 'undefined'){
		config.uploadUrl = ckDropUploadUrl;
	}else{
		// alert('Missing: ckDropUploadUrl');
	}

	// Disable changing " to &quot;
	config.entities = false;

	// config.extraPlugins = ['uploadimage', 'templates'];

	config.allowedContent = true;

	// config.contentsCss = ['//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css','//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', '/framework/css/style.css', '/css/custom.css', '/bundles/cms/css/editor.css'];
	// config.contentsCss = ['https://use.fontawesome.com/releases/v5.8.1/css/all.css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css','//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', '/framework/css/style.css', '/css/custom.css', '/bundles/cms/css/editor.css'];
	// config.contentsCss = ['/bundles/cms/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css', '/framework/css/style.css', '/css/custom.css', '/bundles/cms/css/editor.css'];

	config.extraPlugins = 'markdown,colordialog';
	config.removePlugins = 'divarea';

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.protectedSource.push(/\{%\s.+\s%\}/g);
	// config.protectedSource.push(/\{\{[\s\S]*?\}\}/g);
	config.protectedSource.push(/\{\#[\s\S]*?#\}/g);

	// ALLOW <i></i>
	config.protectedSource.push(/<i[^>]*><\/i>/g);

    // config.enterMode = CKEDITOR.ENTER_BR;
    // config.shiftEnterMode = CKEDITOR.ENTER_P;
};

// allow i tags to be empty (for font awesome)
CKEDITOR.dtd.$removeEmpty['i'] = false;

var dialogDefinition, dialogName;

CKEDITOR.on( 'dialogDefinition', function( ev )
{
  // Take the dialog name and its definition from the event
  // data.
  dialogName = ev.data.name;
  dialogDefinition = ev.data.definition;

  // Check if the definition is from the dialog we're
  // interested on (the Link and Image dialog).
  if ( dialogName == 'link' || dialogName == 'image' )
  {
     // remove Upload tab
     dialogDefinition.removeContents( 'Upload' );

     // if (dialogName == 'link') {
     	// Get a reference to the "Image Info" tab.
        infoTab = dialogDefinition.getContents( 'info' );

        // Get the "Browse" button
        browse = infoTab.get( 'browse' );

        // Override the "onClick" function
        browse.onClick = function () {

			var ref = CKEDITOR.tools.addFunction(function(url){
				if (dialogName == 'link') {
					dialogDefinition.dialog.getContentElement('info','url').setValue(url);
				}else{
					dialogDefinition.dialog.getContentElement('info','txtUrl').setValue(url);
				}
			});

        	var params = '?CKEditor=' + ev.editor.name + '&CKEditorFuncNum=' + ev.editor._.filebrowserFn + '&ref=' + ref + '&link=' + dialogName + '&langCode=nl';
        	if (dialogName == 'image') {
	            cpop.reset().large().loadAjax(ckMediaUrl + params);
	        }else{
	        	cpop.reset().large().loadAjax(ckAdminPageUrl + params);
	        }

        };
     // }
  }
});
