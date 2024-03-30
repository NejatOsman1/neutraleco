let timeoutCheckAddress,$addressLoader;
let $objAddressManual,$objZipcode,$objNumber,$objNumberAddition,$objStreet,$objCity,$objCountry;
let $objDeliverAddressManual,$objDeliverZipcode,$objDeliverNumber,$objDeliverNumberAddition,$objDeliverStreet,$objDeliverCity,$objDeliverCountry;

// Post NL API
$(function(){
	prepareFields();
	setInvoiceFields();
	setDeliveryFields();
	setAddressManual();
	getAddress();
});

function getAddress(){	
	if ($objZipcode.val().length > 4 &&
		 $objNumber.val().length > 0 &&
		 $objStreet.hasClass('disabled') && 
		 $objCity.hasClass('disabled')) {
		timeoutCheckAddress = setTimeout(function(){ 
			getAddressFromPostNlApi(false,$objStreet,$objCity,$objZipcode,$objNumber,$objNumberAddition); 
		}, 1000);
	}else{
		$objZipcode.val();
		$objNumber.val();
	}
}

function getDeliverAddress(){	
	if ($objDeliverZipcode.val().length > 4 &&
		 $objDeliverNumber.val().length > 0 &&
		 $objDeliverStreet.hasClass('disabled') && 
		 $objDeliverCity.hasClass('disabled')) {
		timeoutCheckAddress = setTimeout(function(){ 
			getAddressFromPostNlApi(true,$objDeliverStreet,$objDeliverCity,$objDeliverZipcode,$objDeliverNumber,$objDeliverNumberAddition); 
		}, 1000);
	}else{
		$objDeliverZipcode.val();
		$objDeliverNumber.val();
	}
}

function setAddressManual(){
	$objAddressManual.click(function(){
		setInvoiceFields();
	});
	$objDeliverAddressManual.click(function(){
		setDeliveryFields();
	});
}

function setInvoiceFields(){
	if(!$objAddressManual.prop("checked")){
		$objStreet.addClass("disabled").attr("readonly",true);
		$objCity.addClass("disabled").attr("readonly",true);
		$objCountry.addClass("disabled").find('option:not(:selected)').prop('disabled', true);
	}else{
		$objStreet.removeClass("disabled").removeAttr("readonly");
		$objCity.removeClass("disabled").removeAttr("readonly");
		$objCountry.removeClass("disabled").find('option:not(:selected)').prop('disabled', false);
	}
	
}

function setDeliveryFields(){	
	if(!$objDeliverAddressManual.prop("checked")){
		$objDeliverStreet.addClass("disabled").attr("readonly",true);
		$objDeliverCity.addClass("disabled").attr("readonly",true);
		$objDeliverCountry.addClass("disabled").find('option:not(:selected)').prop('disabled', true);
	}else{
		$objDeliverStreet.removeClass("disabled").removeAttr("readonly");
		$objDeliverCity.removeClass("disabled").removeAttr("readonly");
		$objDeliverCountry.removeClass("disabled").find('option:not(:selected)').prop('disabled', false);
	}
}

function prepareFields(){
	$addressLoader = $(".address-loader");
	
	$objAddressManual = $("input[name='invoice_address_manual']");
	$objZipcode = $("input[name='postalcode']");
	$objNumber = $("input[name='number']");
	$objStreet = $("input[name='street']");
	$objCity = $("input[name='city']");	
	$objCountry = $("select[name='country']");
	$objNumberAddition = $("select[name='number_add']");
	// $objZipcode.parent().insertBefore($objNumber.parent());
	// $objStreet.parent().insertBefore($objCity.parent());
	// $objStreet.parent().removeClass("col-md-7").addClass("col-md-6");
	// $objCity.parent().removeClass("col-md-8").addClass("col-md-6");
		
	$objDeliverAddressManual = $("input[name='deliver_address_manual']");
	$objDeliverZipcode = $("input[name='deliver_postalcode']");
	$objDeliverNumber = $("input[name='deliver_number']");
	$objDeliverStreet = $("input[name='deliver_street']");
	$objDeliverCity = $("input[name='deliver_city']");	
	$objDeliverCountry = $("select[name='deliver_country']");
	$objDeliverNumberAddition = $("select[name='number_add']");
	// $objDeliverZipcode.parent().insertBefore($objDeliverNumber.parent());
	// $objDeliverStreet.parent().insertBefore($objDeliverCity.parent());
	// $objDeliverStreet.parent().removeClass("col-md-7").addClass("col-md-6");
	// $objDeliverCity.parent().removeClass("col-md-8").addClass("col-md-6");
	
	$("#postalcode, #number, #number_add").keyup(function(e){
		clearTimeout(timeoutCheckAddress);
		getAddress();
	});
	
	$("#deliver_postalcode, #deliver_number, #deliver_number_add").keyup(function(e){
		clearTimeout(timeoutCheckAddress);
		getDeliverAddress();
	});
}

function getAddressFromPostNlApi($delivery = false,$street,$city,$zipcode,$number,$numberAddition){
	var proxyUrl = '';//'https://cors-anywhere.herokuapp.com/';
	var serviceUrl = "/checkout/postcodecheck"

	var payload = {
		postcode: $zipcode.val(),
		houseNumber: $number.val(),
		houseNumberAddition: ($numberAddition.length > 0 ? $numberAddition.val() : "")
	};
	
	$addressLoader.show();
	$.ajax({
		url: proxyUrl+serviceUrl,
		type: 'GET',
		async: false,
		global: false,
		contentType: "application/json",
		crossDomain: true,
		data: payload,
		complete: function($data) {
			$response = $data.responseJSON;
			
			$error = $("#"+$zipcode.attr("name")+"-error");
			if($error.length > 0){
				$error.remove();
			}
			
			if ($response && $response["street"]){
				$street.val($response["street"]);
				$city.val($response["city"]);
				
				if($("#check-invoicelocation").prop("checked")){
					$objDeliverStreet.val($response["street"]);
					$objDeliverCity.val($response["city"]);
				}
			}else{
				if($response && $response["error"]){
					if($response["error"]["exceptionId"] == "PostcodeNl_Service_PostcodeAddress_AddressNotFoundException"){
						var msg = '<div class="error address-error alert-danger pl-3 mb-2" id="'+$zipcode.attr("name")+'-error"><small>Adres combinatie ongeldig.</small></div>';
						$(msg).insertAfter($zipcode.parent().parent());
					}
					if($response["error"]["exceptionId"] == "PostcodeNl_Controller_Address_InvalidHouseNumberParameterException"){
						var msg = '<div class="error address-error alert-danger pl-3 mb-2" id="'+$zipcode.attr("name")+'-error"><small>Huisnummer invalide en mag alleen bestaan uit cijfers.</small></div>';
						$(msg).insertAfter($zipcode.parent().parent());
					}
					if($response["error"]["exceptionId"] == "PostcodeNl_Controller_Plugin_HttpBasicAuthentication_ApiRestServiceCredentials_InvalidUsernameException"){
						var msg = '<div class="error address-error alert-danger pl-3 mb-2" id="'+$zipcode.attr("name")+'-error"><small>Kan geen gegevens ophalen. Controleer de API credentials</small></div>';
						$(msg).insertAfter($zipcode.parent().parent());
					}
				}
			}
			$addressLoader.hide();
		},
		error: function (xhr, status, errorThrown) {
			$addressLoader.hide();
			let $street,$city,$zipcode;
			if($delivery){
				$zipcode = $objDeliverZipcode;
			}else{
				$zipcode = $objZipcode;
			}
			
			$error = $("#"+$zipcode.attr("name")+"-error");
			if($error.length > 0){
				$error.remove();
			}
			var msg = '<div class="error address-error alert-danger pl-3 mb-2" id="'+$zipcode.attr("name")+'-error"><small>Kan adresgegevens niet ophalen. Probeer het nogmaals of vul het adres handmatig in.</small></div>';
			$(msg).insertAfter($zipcode.parent().parent());			
		}
	});	
}