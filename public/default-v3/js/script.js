$(document).ready(function(){
	if($('.button-collapse').length > 0) $(".button-collapse").sideNav();
	if($('.dropdown-button').length > 0) $(".dropdown-button").dropdown();
	if($('select').length > 0) $('select').material_select();
    if($('.parallax').length > 0) $('.parallax').parallax();

    window.onscroll = function() {
        if (document.body.scrollTop >= 100) {
            jQuery(document.body).addClass('scrolling');
            if($(document.body).width() <= 1024){
                jQuery(document.body).addClass('mobile');
            }
            jQuery(document.body).removeClass('on-top');
        }else{
            jQuery(document.body).removeClass('scrolling mobile');
            jQuery(document.body).addClass('on-top');
        }
    };
    if (document.body.scrollTop >= 100) {
        jQuery(document.body).addClass('scrolling');
        if($(document.body).width() <= 1024){
            jQuery(document.body).addClass('mobile');
        }
        jQuery(document.body).removeClass('on-top');
    }

});