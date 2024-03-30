function showReacties() {
	replies = $('.blog-replies .reply');
	$.each(replies, function(index, elem) {
		$(elem).css('display', 'inline-block');
	});
}

function addReply(btn) {
	// var target = $(btn).closest('.reply'); var depth = (target.data('depth') + 1);
	$('#replyto').val($(btn).data('target'));
}

var tmp_blog_editor = null;
$(function() {
	$('.action-reply').click(function(e){
		e.preventDefault();
		addReply(this);
		console.log('action-reply');
		$('#quote-preview').html('<blockquote><strong>Je reageert op ' + $(this).data('name') + ':</strong><br/>' + $('#comment-' + $(this).data('target')).html() + '</blockquote>');

		$([document.documentElement, document.body]).animate({
			scrollTop: $('form[name="form"]').offset().top - 30
		}, 250);
	});

	$('.action-quote').click(function(e){
		e.preventDefault();
		addReply(this);
		console.log('action-quote');
		$('#quote-preview').html('<blockquote><strong>Je reageert op ' + $(this).data('name') + ':</strong><br/>' + $('#comment-' + $(this).data('target')).html() + '</blockquote>');
		tmp_editor.setData('<p><blockquote>' + $('#comment-' + $(this).data('target')).html() + '</blockquote></p><p></p>');

		$([document.documentElement, document.body]).animate({
		scrollTop: $('form[name="form"]').offset().top - 100
		}, 150);
	});
	
	var checkForm = false;
	$('.blog-reply-form button[type="submit"]').click(function(e){
		e.preventDefault();
		if($("#form_comment").val() != "" && $("#form_email").val() != "" && checkForm == false){
			checkForm = true;
			$("form[name='form']").submit();
		}
	});


	if ($('#form_comment').length > 0 && tmp_blog_editor == null ) {
		// reply toolbar
		var myToolBar = [
			{
				name: 'document',
				items: [
					'Bold', 'Italic', 'Underline',
					'BulletedList',
					'Blockquote',
				]
			}
		];

		var custom_config = {};
		custom_config.toolbar = myToolBar;
		custom_config.contentsCss = [
			'//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css',
			'//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css',
			'/framework/css/style.css',
			'/css/custom.css',
			'/bundles/cms/css/editor.css'
		];
		custom_config.resize_dir = 'vertical';
		custom_config.allowedContent = true;
		custom_config.protectedSource = {};
		custom_config.floatSpaceDockedOffsetY = 30;
		custom_config.protectedSource = [/<protected>[\s\S]*<\/protected>/g];

		tmp_editor = CKEDITOR.replace($('#form_comment')[0], custom_config);
	}

	var swiperBlog = new Swiper('.swiper-blog', {
		loop: false,
		centeredSlides: true,
		spaceBetween: 12,
		slidesPerView: 1.15,
		breakpoints: {
			576: {
				centeredSlides: false,
				slidesPerView: 2,
				slidesPerGroup: 2
			},
			768: {
				spaceBetween: 24,
				centeredSlides: false,
				slidesPerView: 2,
				slidesPerGroup: 2
			},
			992: {
				spaceBetween: 24,
				centeredSlides: false,
				slidesPerView: 3,
				slidesPerGroup: 3
			},
			1200: {
				spaceBetween: 24,
				centeredSlides: false,
				slidesPerView: 3,
				slidesPerGroup: 3
			}
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		}
	});

	if ($(".swiper-products").length > 0) {
		var swiper = new Swiper(".swiper-products", {
			loop: false,
			centeredSlides: true,
	    spaceBetween: 12,
			slidesPerView: 1.15,
			breakpoints: {
				576: {
					centeredSlides: false,
					slidesPerView: 2,
					slidesPerGroup: 2
				},
				768: {
					spaceBetween: 24,
					centeredSlides: false,
					slidesPerView: 2,
					slidesPerGroup: 2
				},
				992: {
					spaceBetween: 24,
					centeredSlides: false,
					slidesPerView: 3,
					slidesPerGroup: 3
				},
				1200: {
					spaceBetween: 24,
					centeredSlides: false,
					slidesPerView: 4,
					slidesPerGroup: 4
				}
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev'
			}
		});
	}

	var swiperBlogGallery = new Swiper('.swiper-blog-gallery', {
		direction: 'horizontal',
		watchOverflow: true,
		// autoHeight: true,
		slidesPerView: 1,
		spaceBetween: 0,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});

	$(".swiper-blog-gallery").lightGallery({
		selector: 'a',
		zoom: true,
		download: false,
		autoplayControls: false,
		actualSize: true,
		share: false,
		fullScreen: false,
    addClass: 'block-gallery-lg'
	});

	// optional like support
	if (typeof likeUrl !== 'undefined') {
		$('#like-this').off('click').on('click', function(e) {
			e.preventDefault();

			$.ajax(likeUrl).done(function(r) {
				$('#like-this span').html('(' + r.all_likes + ')');
			});
		});
	}

	if($('#blog-entry-form').length > 0){
		$('#blog-entry-form').submit(function(){
			enableSubmitLoader($('#blog-entry-form'));

			return true;
		});
	}
});
