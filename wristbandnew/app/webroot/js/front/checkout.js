var DIR_WB = '/wristbandnew';
var c = {
	visa: /^4/,
	mastercard: /^5[1-5]/,
	discover: /^6011/,
	amex: /^3[47]/
}, d = function (a) {
		var a = a.replace(/[ \-]*/g, "");
		for (type in c) if (c[type].test(a)) return type;
		return "placeholder"
};
var gCardType = "placeholder";
$(document).ready(function(){
$('.colorbox').colorbox(); 

$("#class_cc_num input").bind("keyup change", function () {
	var tval = $(this).val();
	gCardType = d(tval);
	$("#class_cc_num .type").css({
		"background-image": "url("+DIR_WB+"/img/" + gCardType + ".png)"
	});

	if(gCardType=='discover' || gCardType=='visa' || gCardType=='mastercard'){
		$("#CSC").attr('maxlength',3);
		$("#CCNumber").attr('maxlength',16);
	}
	if(gCardType=='amex'){
		$("#CSC").attr('maxlength',4);
		$("#CCNumber").attr('maxlength',15);
	}
});

$('.btn-blue').click(function(){
	//$('select[name="ship_country"]').
	$('input[name="bill_company_name"]').val($('input[name="ship_company_name"]').val());
	$('input[name="bill_first_name"]').val($('input[name="ship_first_name"]').val());
	$('input[name="bill_last_name"]').val($('input[name="ship_last_name"]').val());
	$('input[name="bill_address"]').val($('input[name="ship_address"]').val());
	$('input[name="bill_suite"]').val($('input[name="ship_suite"]').val());
	$('input[name="bill_city"]').val($('input[name="ship_city"]').val());
	$('select[name="bill_state"]').val($('select[name="ship_state"]').val());
	$('input[name="bill_state2"]').val($('input[name="ship_state2"]').val());
	$('input[name="bill_zipcode"]').val($('input[name="ship_zipcode"]').val());
	$('select[name="bill_country"]').val($('select[name="ship_country"]').val());
	$('input[name="bill_phone"]').val($('input[name="ship_phone"]').val());
	$('input[name="bill_faxnumber"]').val($('input[name="ship_faxnumber"]').val());
	$('input[name="bill_emailaddress"]').val($('input[name="ship_emailaddress"]').val());
	$('select[name="bill_country"]').trigger("change");
	$('input[name="card_name"]').val($('input[name="bill_first_name"]').val()+' '+$('input[name="bill_last_name"]').val());
});

$('select[name="ship_country"]').change(function(){
	if($(this).val() == 'US'){$('#shipState2').hide();$('#shipState1').show();}else{$('#shipState2').show();$('#shipState1').hide();
	resetTexas();
	
	}
	
	if($(this).val() != COUNTRY_CODE){	$('.interS').show();$('#confirm1').prop("checked",true);}else{ $('.interS').hide(); }
});
$('select[name="bill_country"]').change(function(){
	if($(this).val() == 'US'){$('#billState2').hide();$('#billState1').show();}else{$('#billState2').show();$('#billState1').hide();}
});
$('select[name="ship_country"]').trigger('change');
$('select[name="bill_country"]').trigger('change');


$('.Payment').click(function(){
	
	tclass = "Payment";
	$('.'+tclass).find('[type=radio]').prop("checked",false);
	$('.'+tclass).removeClass('on');
	$(this).find('[type=radio]').prop("checked",true);
	$(this).addClass('on');
	tval = $('input[name="paymentMethod"]:checked').val();
	switch(tval){
		case "cc":
		$('.ccform').slideDown(300);$('.poform').slideUp('fast');break;
		case "pp":
		$('.ccform, .poform').slideUp('fast');break;
		case "po":
		$('.ccform').hide();$('.poform').slideDown(200);break;	
	}

});

$('#taxexempt').click(function(){
	if($(this).prop('checked')){
		$('#nCost').hide();
		$('#oCost').show();
	}else{
		$('#oCost').hide();
		$('#nCost').show();
	}
});

$('#confirm2').click(function(){
	$('[name="ship_country"]').val(COUNTRY_CODE);
	$('.interS').hide();
	$('select[name="ship_country"]').trigger('change');
});

$('[name="ship_state"]').change(function(){
	if($('[name="ship_state"]').val() == 'Texas'){$('.texasP').fadeIn(400);}else{$('.texasP').fadeOut(400);	}
});


$('.ChkFrm').validate({
	submitHandler: function(form){
	$.ajax({
		url: 'checkout?code=submit',
		type: 'post',
		dataType: 'json',
		data: $('.ChkFrm input[type="text"], .ChkFrm input[type="radio"]:checked, .ChkFrm select'),
		beforeSend:	function(){
			/* Conditions For Texas Starts*/ 
			var taxExChecked = 0;
			var taxExVal = '';
			if($('[name="ship_country"]').val() == "US"){
				if($('[name="ship_state"]').val() == "Texas"){
					if($('#taxexempt').attr('checked')){
						taxExChecked = 1;
						taxExVal = $('#taxnumber').val();
						if($('#taxnumber').val() == ""){
							alert('Please enter Tax Exemption Number.');
							$('#taxnumber').focus();
							return false;
						}
						if(isNaN($('#taxnumber').val())){
							alert('Please enter valid Tax Exemption Number.');
							$('#taxnumber').val('')
							$('#taxnumber').focus();
							return false;
						}
					}
				}
			}
			/* Conditions For Texas Ends*/
			
			
			$('.accepted input[name="btnCheckout"]').attr('disabled',true).hide();
			$('.checkLoad').show();
		},
		complete: function(){
			$('.accepted input[name="btnCheckout"]').attr('disabled',false).show();
			$('.checkLoad').hide();
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		},
		success: function(json){
			if(json.redirect){
				window.location = json.redirect;
				return false;
			}else if(json.pp_form){
				$('.ChkFrm').after(json.pp_form);
				$('#pp_form').submit();
			}else if(json.status == false || json.error){
				alert(json.error);
				//notice('warning',json.error);
			}
		}
	})
	return false;
}
});
});

function isNumberCheck(dd){
	if($('#taxexempt').attr('checked')){
		if(isNaN($('#taxnumber').val())){
			alert('Please enter valid Tax Exemption Number.');
			$('#taxnumber').val('')
			$('#taxnumber').focus();
			return false;
		}
	}
}

function resetTexas(){
	$('[name="ship_state"]').val('');
	$('[name="ship_state"]').trigger('change');
	$('#taxexempt').prop('checked',false);	
	$('#taxnumber').val('');
	$('#oCost').hide();	$('#nCost').show();

}