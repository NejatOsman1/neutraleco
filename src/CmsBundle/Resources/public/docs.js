$('nav a').click(function(e){
	e.preventDefault();
	var hash = this.href.split("#")[1] || null;

	$('#doc-loader').html('');
	$('.lds-ellipsis').show();
	
	$('nav a').removeClass('active');
	$(this).addClass('active');

	$.ajax(loaderUrl + hash).done(function(r){
		$('#doc-loader').html(r);
		$('.lds-ellipsis').hide();
	}.bind(this));
});