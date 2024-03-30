// toggles
$(function() {
	$(".navbar .nav-toggle").click(function() {
	  $("body").toggleClass("show-nav");
	});
  
	$(".navbar .nav li.has-children .togglesub,.navbar .custom-nav li.has-children .togglesub").click(function() {
	  $(this).parent().toggleClass("open");
	});
  
	$(".page-overlay").click(function() {
	  $("body").removeClass("show-nav");
	  $("body").removeClass("show-filters");
	});
  })
  
  // Sticky header
  $(window).on("scroll load", function() {
	var scroll = $(window).scrollTop();
	if (scroll >= 1) {
	  $("body").addClass("sticky");
	} else {
	  $("body").removeClass("sticky");
	}
  
	var scroll = $(window).scrollTop();
	if (scroll >= 50) {
	  $("body").addClass("sticky-topbar");
	} else {
	  $("body").removeClass("sticky-topbar");
	}
  });
  
  // Match height
  $(function() {
	  // Add a new line for each item
	  if($('.product .card-content').length > 0){
		  $('.product .card-content').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.blog .content h3').length > 0){
		  $('.blog .content h3').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.blog-slider .heightfix').length > 0){
		  $('.blog-slider .heightfix').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.comparison .card .card-image').length > 0){
		  $('.comparison .card .card-image').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.comparison .card .card-info').length > 0){
		  $('.comparison .card .card-info').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.login-register .card').length > 0){
		  $('.login-register .card').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.login-register .card .card-height').length > 0){
		  $('.login-register .card .card-height').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
	  if($('.webshop-frontend-profile .card .card-height').length > 0){
		  $('.webshop-frontend-profile .card .card-height').matchHeight({byRow: false, property: 'min-height', target: null, remove: false});
	  }
	  if($('.webshop.checkout.overview .card').length > 0){
		  $('.webshop.checkout.overview .card').matchHeight({byRow: true, property: 'min-height', target: null, remove: false});
	  }
  
	  // Lightgallery
	  if(typeof Swiper != 'undefined' && $('.blog-swiper').length > 0){
		  var galleryTop = new Swiper('.blog-swiper', {
			  pagination: {
				  el: '.swiper-pagination',
				  type: 'bullets',
				  clickable: true
			  },
			  navigation: {
				  nextEl: '.swiper-button-next',
				  prevEl: '.swiper-button-prev'
			  },
			  watchOverflow: true
		  });
	  }
  
	  if(typeof lightGallery != 'undefined' && $('.blog-gallery').length > 0){
		  $(".blog-gallery").lightGallery({
			  selector: 'a',
			  zoom: false,
			  download: false,
			  autoplayControls: false,
			  actualSize: false,
			  share: false,
			  fullScreen: false,
			  width: '1200px',
			  height: '800px',
		  });
	  }
  
	  // Dynamic footer
	  if($('.footer-wrapper').length){
		  var docHeight = $(window).height();
		  var footerHeight = $('.footer-wrapper').height();
		  var footerTop = $('.footer-wrapper').position().top + footerHeight;
		  if (footerTop < docHeight) {
			  $('.footer-wrapper').css('margin-top', (docHeight - footerTop) + 'px');
		  }
	  }
  
	  if(typeof Swiper != 'undefined' && $('.swiper-container.swiper-brands').length > 0){
		  var temp = new Swiper('.swiper-container.swiper-brands', {
			  direction: 'horizontal',
			  loop: true,
			  slidesPerView: 1,
			  spaceBetween: 30,
			  breakpoints: {
				  576: {
					  slidesPerView: 2
				  },
				  769: {
					  slidesPerView: 3
				  },
				  992: {
					  slidesPerView: 4
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
  
	  if($('.framework_parallax').length > 0){
		  $('.framework_parallax').each(function() {
			  var controller = new ScrollMagic.Controller();
			  var wrapperID = $(this).data('id');
  
			  new ScrollMagic.Scene({triggerElement: "#trigger" + wrapperID, triggerHook: 0.9, offset: 150, reverse: false}).setClassToggle("#animate" + wrapperID, "visible")
			  // .addIndicators()
			  .addTo(controller);
  
			  new ScrollMagic.Scene({triggerElement: "#trigger" + wrapperID, triggerHook: 0.6, duration: "50%", offset: 0}).setClassToggle("#animate" + wrapperID, "opacity")
			  // .addIndicators()
			  .addTo(controller);
  
			  /*let img[wrapperID] = document.getElementsByClassName('image' + wrapperID');
			  new simpleParallax(img[wrapperID], {
			  });*/
  
			  new simpleParallax(document.getElementsByClassName('image' + wrapperID), {
			  });
		  });
	  }
  
	  // Parallax images ???
	  /*var image = document.getElementsByClassName('parallax');
	  new simpleParallax(image, {
		  overflow: false,
		  scale: 1.2,
		  delay: 0,
	  });*/
  
  
	  // Anchor scrolling
	  if ($(window).width() > 769) {
		  $(document).on('click', '.averge-reviews a, #pd-intro a', function(event) {
			  event.preventDefault();
			  $('html, body').animate({
				  scrollTop: $($.attr(this, 'href')).offset().top + -100
			  }, 1000);
		  });
	  }
  
	  if ($(window).width() < 768) {
		  $(document).on('click', '.averge-reviews a, #pd-intro a', function(event) {
			  event.preventDefault();
			  $('html, body').animate({
				  scrollTop: $($.attr(this, 'href')).offset().top + -80
			  }, 1000);
		  });
	  }
  });
  
  if($('.checkout-column-right').length > 0){
	  // Sidebar
	  var sidebar = new StickySidebar('.checkout-column-right', {
		  topSpacing: 90,
		  bottomSpacing: 90,
		  containerSelector: '.checkout-columns',
		  innerWrapperSelector: '.checkout-column-right-inner'
	  });
  }
  