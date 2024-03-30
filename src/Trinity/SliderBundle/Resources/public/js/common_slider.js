$(document).ready(function()
{
	var	swipers = $('.slider_bundle');
	$.each(swipers, function(ind, el) {
		var id = $(el).data('id');
		//console.log(el);

		var raw_config = new Object();

		raw_config.speed = $(el).data('speed');
		raw_config.direction = 'horizontal';
		raw_config.watchOverflow = true;
		raw_config.slidesPerView = 1;
		raw_config.spaceBetween = 0;
		raw_config.pagination = {
			el: '.swiper-pagination_' + id,
			type: 'bullets',
			clickable: true,
		};
		raw_config.navigation = {
			nextEl: '.swiper-button-next_' + id,
			prevEl: '.swiper-button-prev_' + id
		}
		if ( $(el).data('fade') ) {
			raw_config.effect = 'fade';
		}

		if ( $(el).data('autoplay') ) {
			raw_config.autoplay = {
				delay: $(el).data('autoplaydelay')
			}
		}

		if ( $(el).data('centered') ) {
			//raw_config.centeredSlides = true;
		}

		if ( $(el).data('loop') ) {
			raw_config.loop = true;
			//raw_config.loopAdditionalSlides = 3;
		}

		//console.log(raw_config);

		var swiperGallery = new Swiper(el, raw_config);
	});	
});
