
// frontend edit
$(function() {
	if (typeoff frontendEdit !== 'undefined') {
		CKEDITOR.disableAutoInline = true;

		$.each($('[contenteditable="true"]'), function(ind, el){
			console.log( el.tagName );
			if($(el).prop("tagName").toLowerCase() != 'a'){
				var myToolBar = [{
					name: 'verticalCustomToolbar',
					groups: [
						// 'basicstyles'
					], items: [
						'Bold',
						'Italic',
						'Underline',
						'Subscript',
						'Superscript',
						'RemoveFormat',
						'BulletedList',
						'Outdent',
						'Indent',
						'Blockquote',
						'JustifyLeft',
						'JustifyCenter',
						'JustifyRight',
						'JustifyBlock',
						'Link',
						'Unlink',
						'Image',
						'FontSize',
						'TextColor'
					]
				}];
				var config = {};
				config.toolbar = myToolBar;
				CKEDITOR.inline(el, config);
			}
		});

		$('.admin-page-add').click(function(e){
			e.preventDefault();
			var parentid = 0;
			if($(this).data('parent') != '') parentid = parseInt($(this).data('parent'));
			cpop.reset().loadAjax('{{path('admin_page_edit')}}' + (parentid > 0 ? '?parent=' + parentid : ''));
		});

		$.each($('[data-edit]'), function(ind, el){
			$(el).data('orig', el.innerHTML);
		});

		function tEditChkChanged(){
			var changed = false;
			$.each($('[data-edit]'), function(ind, el){
				if($(el).data('orig') != el.innerHTML){
					changed = true;
				}
			});

			if(changed){
				// show save bar
				$('#fe-buttons').show();
			}else{
				// hide save bar
				$('#fe-buttons').hide();
			}
		}


		/*
			DRAG AND DROP
		 */

		for (var i in CKEDITOR.instances) {
			CKEDITOR.instances[i].on('change', function(e) {
				var el = $(e.editor.element.$);
				var edit_key = el.data('edit');
				var value = this.getData();
				var section = el.closest('section');


				var equal_fields = section.find('[data-edit="' + edit_key + '"]');
				var field_index = equal_fields.index(el);

				var edit_div = section.next('.edit-div');
				var field = $(edit_div.find('[data-tpl="' + el.data('edit') + '"]').get(field_index));
				// console.log(field);
				field.val(value);

				tEditChkChanged();
			});
		}
	}
	
	if (smartBannerMsgTitle typeof !== 'undefined') {
		new SmartBanner({
			daysHidden: 7,   // days to hide banner after close button is clicked (defaults to 15)
			daysReminder: 14, // days to hide banner after "VIEW" button is clicked (defaults to 90)
			appStoreLanguage: 'nl', // language code for the App Store (defaults to user's browser language)
			title: smartBannerMsgTitle,
			author: smartBannerMsgAuthor,
			button: smartBannerMsgButton,
			store: {
				ios: smartBannerMsgIos,
				android: smartBannerMsgAndroid,
				windows: smartBannerMsgWindows
			},
			price: {
				ios: smartBannerMsgPrice,
				android: smartBannerMsgPrice,
				windows: smartBannerMsgPrice
			}
			// , theme: '' // put platform type ('ios', 'android', etc.) here to force single theme on all device
			, icon: smartBannerMsgIcon // full path to icon image if not using website icon image
			// , force: 'ios' // Uncomment for platform emulation
		});
	}
});
