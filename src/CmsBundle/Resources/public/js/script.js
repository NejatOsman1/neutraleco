$().ready(function(){
	$('.jqdatepicker').datepicker({
		// dateFormat: 'dd-mm-yy',
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true
	});
	if($('ol.sortable').length){
		var ns = $('ol.sortable').nestedSortable({
			forcePlaceholderSize: true,
			handle: 'div',
			helper:	'clone',
			items: 'li',
			opacity: .6,
			placeholder: 'placeholder',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div',
			maxLevels: 4,
			isTree: true,
			expandOnHover: 700,
			startCollapsed: true,
			relocate: function(){
				$('#saveSort').show();
				$('#pagesort').val(JSON.stringify(ns.nestedSortable('toArray')));
			}
		});
	}
	$('.disclose').css('cursor','pointer').on('click', function() {
		var thisLi = $(this).closest('li');
		thisLi.toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
		/*if(thisLi.hasClass('mjs-nestedSortable-expanded')){
			$(this).find('i').html('remove');
		}else{
			$(this).find('i').html('add');
		}*/

		var opened = [];
		$.each($('.mjs-nestedSortable-expanded'), function(ind, el){
			opened.push(el.id);
		});
		Cookies.set('t-pagelist-states', opened.join(','));
	});

	var st = Cookies.get('t-pagelist-states');
	if(st != '' && typeof st != 'undefined'){
		var ids = st.split(',');
		$.each(ids, function(ind, id){
			if($('#' + id + ' > ol').length){
				$('#' + id).removeClass('mjs-nestedSortable-collapsed').addClass('mjs-nestedSortable-expanded');
			}else{
				$('#' + id).removeClass('mjs-nestedSortable-collapsed').removeClass('mjs-nestedSortable-expanded');
			}
		});
	}

	function setStrlenWarning(type){
		var src = $('.fld-seo-' + type);
		var label = src.parent().find('label');
		if(label.length == 0){
			label = src.parent().parent().find('label');
		}
		if($('.seo-counter-' + type).length == 0){
			label.append($('<span style="margin-left: 10px;" class="seo-counter seo-counter-' + type + '"></span>'));
		}
		if(src.length > 0){
			var n = src.val().length;
			if(type == 'description'){
				$('.seo-counter-' + type).html(n + ' / 155 ' + (typeof misc_chars != 'undefined' ? misc_chars : 'tekens'));
				if(n >= 155){
					$('.seo-counter-' + type).css('color', 'red');
				}else{
					$('.seo-counter-' + type).css('color', 'green');
				}
			}else if(type == 'title'){
				$('.seo-counter-' + type).html(n + ' / 60 ' + (typeof misc_chars != 'undefined' ? misc_chars : 'tekens') + ' (max. 80)');
				if(n >= 60){
					if(n >= 80){
						$('.seo-counter-' + type).css('color', 'red');
					}else{
						$('.seo-counter-' + type).css('color', 'orange');
					}
				}else{
					$('.seo-counter-' + type).css('color', 'green');
				}
			}
		}
	}

	if($('#seo-preview').length > 0){
		$('.fld-seo-description').keyup(function(){
			$('.seo-preview-body').html($(this).val());
			setStrlenWarning('description');
		});

		setStrlenWarning('description');

		$('.fld-seo-title').keyup(function(){
			$('.seo-preview-title .title-part').html($(this).val());
			setStrlenWarning('title');
		});

		setStrlenWarning('title');

		$('.fld-seo-slug').keyup(function(){
			$('.seo-preview-url .slug-part').html('/' + $(this).val().toLowerCase().replace(/ /g,"-").replace(/[^a-z0-9-_~]/g,"").replace(/-+/g,"-"));
		});
	}
});

function togglePageCache(el){
	var toggle = jQuery(el);
	var icon = toggle.find('i');
	var nextClass = 'fas'; // fa-bookmark solid
	var prevClass = 'far'; // fa-bookmark outline
	if(icon.hasClass('fas')){
		nextClass = 'far';
		prevClass = 'fas';
	}

	icon.removeClass('fas').removeClass('far');
	icon.addClass('fa-hourglass fa-spin');

	var toggleUrl = jsonUrl+'page/pagecache/' + toggle.data('pageid') + '/' + (nextClass == 'fas' ? 'on' : 'off');
	$.getJSON(toggleUrl, function(response){
		icon.removeClass('fa-spin');
		icon.removeClass('fa-hourglass');
		icon.removeClass(prevClass);
		icon.addClass(nextClass);

		cache_clear();
	});
}

function togglePageCritical(el){
	console.log('critical');
	var toggle = jQuery(el);
	var icon = toggle.find('i');
	var nextClass = 'fas'; // fa-star solid
	var prevClass = 'far'; // fa-star outline
	if(icon.hasClass('fas')){
		nextClass = 'far';
		prevClass = 'fas';
	}

	icon.removeClass('fas').removeClass('far');
	icon.addClass('fa-hourglass fa-spin');

	var toggleUrl = jsonUrl+'page/pagecritical/' + toggle.data('pageid') + '/' + (nextClass == 'fas' ? 'on' : 'off');
	//console.log(toggleUrl);
	$.getJSON(toggleUrl, function(response){
		icon.removeClass('fa-spin');
		icon.removeClass('fa-hourglass');
		icon.removeClass(prevClass);
		icon.addClass(nextClass);

		cache_clear();
	});
}

function togglePageVisibility(el){
	var toggle = jQuery(el);
	var icon = toggle.find('i');
	var nextClass = 'fa-eye';
	var prevClass = 'fa-eye-slash';
	if(icon.hasClass('fa-eye')){
		nextClass = 'fa-eye-slash';
		prevClass = 'fa-eye';
	}

	icon.removeClass('fa').removeClass('fa-eye').removeClass('fa-eye-slash');
	icon.addClass('far fa-hourglass fa-spin');

	var toggleUrl = jsonUrl+'page/visibility/' + toggle.data('pageid') + '/' + (nextClass == 'fa-eye-slash' ? 'off' : 'on');
	$.getJSON(toggleUrl, function(response){
		if(nextClass == 'fa-eye-slash'){
			toggle.parent().parent().css('opacity', 0.5);
		}else{
			toggle.parent().parent().css('opacity', 1);
		}
		icon.removeClass('far');
		icon.removeClass('fa-spin');
		icon.removeClass('fa-hourglass');
		icon.removeClass(prevClass);
		icon.addClass('fa').addClass(nextClass);

		cache_clear();
	});
}

function togglePageAvailability(el){
	var toggle = jQuery(el);
	var icon = toggle.find('i');
	var nextClass = 'fa fa-fw fa-check-circle';
	var prevClass = 'far fa-fw fa-circle';
	if(icon.hasClass('fa fa-fw fa-check-circle')){
		nextClass = 'far fa-fw fa-circle';
		prevClass = 'fa fa-fw fa-check-circle';
	}

	icon.removeClass('fa fa-fw fa-check-circle').removeClass('far fa-fw fa-circle');
	icon.addClass('far fa-fw fa-hourglass fa-spin');

	var toggleUrl = jsonUrl+'page/availability/' + toggle.data('pageid') + '/' + (nextClass == 'far fa-fw fa-circle' ? 'off' : 'on');
	$.getJSON(toggleUrl, function(response){
		if(nextClass == 'far fa-fw fa-circle'){
			toggle.parent().parent().css('opacity', 0.5);
		}else{
			toggle.parent().parent().css('opacity', 1);
		}
		icon.removeClass('far fa-fw fa-hourglass fa-spin');
		icon.removeClass(prevClass);
		icon.addClass(nextClass);

		cache_clear();
	});
}

var linkSelectEl = null;

function linkSelector(el, callback_page, callback_media, valueQuery){
	linkSelectEl = $(el);

	if(typeof callback_page == 'undefined'){
		callback_page = 'pageSelect';
	}

	if(typeof callback_media == 'undefined'){
		callback_media = 'mediaSelect';
	}

	cpop.reset().large().loadAjax(baseUrl + '/page/selector?composer=1' + valueQuery);
}

function paginationParser(c, m) {
    var current = c,
        last = m,
        delta = 2,
        left = current - delta,
        right = current + delta + 1,
        range = [],
        rangeWithDots = [],
        l;

    for (let i = 1; i <= last; i++) {
        if (i == 1 || i == last || i >= left && i < right) {
            range.push(i);
        }
    }

    for (let ri = 0; ri < range.length; ri++) {
    	var i = range[ri];
        if (l) {
            if (i - l === 2) {
                rangeWithDots.push(l + 1);
            } else if (i - l !== 1) {
                rangeWithDots.push('...');
            }
        }
        rangeWithDots.push(i);
        l = i;
    }

    return rangeWithDots;
}
