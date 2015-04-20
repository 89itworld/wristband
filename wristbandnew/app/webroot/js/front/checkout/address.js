var autocomplete1, autocomplete2;
function initialize1() { autocomplete1 = new google.maps.places.Autocomplete(
	(document.getElementById('ship_address')),
	{ types: ['geocode'] });
	google.maps.event.addListener(autocomplete1, 'place_changed', function() {
    fillInAddress1();
  });
}
var address = {country: 'US', street_number:'',route:'',city:'',state:'',zip_code:'',sublocality:''};
function fillInAddress1() {
  var place = autocomplete1.getPlace();
  
$(place.address_components).each(function(i,e){
    $(e.types).each(function(x,y){
        if(y == 'country'){
            address.country = e.short_name;
						/*if(e.short_name == 'GB'){
							address.country = 'GB';
						}*/
        }
        if(y == 'street_number'){
            address.street_number = e.long_name;
        }
        if(y == 'route'){
            address.route = e.long_name;
        }
        if(y == 'locality'){
            address.city = e.long_name;
        }
        if(y == 'administrative_area_level_1'){
            address.state = e.long_name;
        }
        if(y == 'postal_code'){
            address.zip_code = e.long_name;
        }
        if(y == 'sublocality'){
            address.sublocality = e.long_name;
        }
    });
    });    
    if(address.country){ $('select[name="ship_country"]').val(address.country);$('select[name="ship_country"]').trigger("change");}
    if(address.state){ if(address.country == 'US'){$('select[name="ship_state"]').val(address.state);$('select[name="ship_state"]').trigger("change");}else{$('input[name="ship_state2"]').val(address.state);}}
	
    if(address.city){ $('input[name="ship_city"]').val(address.city); }
    if(address.zip_code){ $('input[name="ship_zipcode"]').val(address.zip_code); }
    setTimeout(function(){
    var hno = [];
    if(address.street_number){ hno.push(address.street_number); }
    if(address.route){ hno.push(address.route); }
    if(address.sublocality){ hno.push(address.sublocality); }
    $('input[name="ship_address"]').val(hno.join(' '));
		$('input,select').removeClass('error');
    },500);
}

function initialize2() { autocomplete2 = new google.maps.places.Autocomplete(
	(document.getElementById('bill_address')),
	{ types: ['geocode'] });
	google.maps.event.addListener(autocomplete2, 'place_changed', function() {
    fillInAddress2();
  });
}
function fillInAddress2() {
  var place = autocomplete2.getPlace();
  var address = {country: 'UK', street_number:'',route:'',city:'',state:'',zip_code:'',sublocality:''};
	$(place.address_components).each(function(i,e){
	    $(e.types).each(function(x,y){
	        if(y == 'country'){
	            address.country = e.short_name;
					if(e.short_name == 'GB'){
						address.country = 'UK';
					}
	        }
	        if(y == 'street_number'){
	            address.street_number = e.long_name;
	        }
	        if(y == 'route'){
	            address.route = e.long_name;
	        }
	        if(y == 'locality'){
	            address.city = e.long_name;
	        }
	        if(y == 'administrative_area_level_1'){
	            address.state = e.long_name;
	        }
	        if(y == 'postal_code'){
	            address.zip_code = e.long_name;
	        }
	        if(y == 'sublocality'){
	            address.sublocality = e.long_name;
	        }
	    });
    });    

    if(address.country){ $('select[name="bill_country"]').val(address.country);}
    if(address.state){ $('input[name="bill_state"]').val(address.state);}
    if(address.city){ $('input[name="bill_city"]').val(address.city); }
    if(address.zip_code){ $('input[name="bill_zipcode"]').val(address.zip_code); }
    setTimeout(function(){
    var hno = [];
    if(address.street_number){ hno.push(address.street_number); }
    if(address.route){ hno.push(address.route); }
    if(address.sublocality){ hno.push(address.sublocality); }
    $('input[name="bill_address"]').val(hno.join(' '));
		$('input').removeClass('error');
    },1000);
}
// [END region_geolocation]
$(function(){
	initialize1();
	initialize2();
});