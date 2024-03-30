let timeoutCheckAddress, addressLoader;

$(function(){
	addressLoader = $(".address-loader");
    console.log('pc-api-init');
	loadTriggers();
	getAddress();
	// getDeliverAddress();
});

function loadTriggers(){
	$("#form_postalcode, #form_number").keyup(function(e){
        console.log('check pc');
		clearTimeout(timeoutCheckAddress);
		getAddress();
	});

    
	$('#check-address-manual').click(function(){
        console.log('check-address-manual');
		toggleInvoiceFields();
	});
}

function toggleInvoiceFields(){
	if(!$('#check-address-manual').prop("checked")){
		$('#form_street').addClass("disabled").attr("readonly",true);
		$('#form_city').addClass("disabled").attr("readonly",true);
		$('#form_country').addClass("disabled").find('option:not(:selected)').prop('disabled', true);
	}else{
        $('#form_street').removeClass("disabled").removeAttr("readonly");
		$('#form_city').removeClass("disabled").removeAttr("readonly");
		$('#form_country').removeClass("disabled").find('option:not(:selected)').prop('disabled', false);
	}
	
}

function getAddress(){	
	if ($('#form_postalcode').val().length > 4 &&
		 $('#form_number').val().length > 0 &&
		 $('#form_street').hasClass('disabled') && 
		 $('#form_city').hasClass('disabled')) {
		timeoutCheckAddress = setTimeout(function(){ 
			fetchAddress(false,$('#form_street'),$('#form_city'),$('#form_postalcode'),$('#form_number'),''); 
		}, 1000);
	}else{
		$('#form_postalcode').val();
		$('#form_number').val();
	}
}

function fetchAddress(delivery = false,street,city,zipcode,number){
    console.log('fetchAddress');
	addressLoader.show();
	$.ajax({
		url: '/postcode-api?postalcode=' + zipcode.val() + '&number=' + number.val()
	}).done(function(response){
		error = $("#postalcode-error");
		if(error.length > 0){
			error.remove();
		}
		console.log(response);
		console.log(response.address);
		if (response && response.address){
			street.val(response.address);
			city.val(response.city);
		}
		addressLoader.hide();
	})/* .error(function(){
		addressLoader.hide();
		let zipcode;
		if(delivery){
			zipcode = $('#deliver_postalcode');
		}else{
			zipcode = $('#postalcode');
		}
		
		error = $("#postalcode-error");
		if(error.length > 0){
			error.remove();
		}
		var msg = '<div class="error address-error alert-danger pl-3 mb-2" id="postalcode-error"><small>Kan adresgegevens niet ophalen. Probeer het nogmaals of vul het adres handmatig in.</small></div>';
		$(msg).insertAfter(zipcode.parent().parent());			
	}) */;	
}