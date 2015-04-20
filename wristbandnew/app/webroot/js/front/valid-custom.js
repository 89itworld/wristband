var SUBMIT_FORM = true;
var expressAlert = false;
$('.btnAddToCart').on('click',function(){
	//validMinQty();//not used
	
	if(!wrist.refStyle){
		alert('Please select wristband style!');
                scrolFocus('.row .select-wristband-style');
		return false;
	}
	if(!wrist.refSize){
		alert('Please select wristband size!');
                scrolFocus('.row .select-wristband-size');
		return false;
	}
	/*if(!wrist.refType){
		alert('Please select wristband color style!');
                scrolFocus('.box .wType.grid');
		return false;
	}*/
	if(SALE_USER){
		if(wrist.totalQty<1){
			alert('Minimum Order Quantity is 1!');
					scrolFocus('.Cfill');
			return false;
		}
	}else{
		if(wrist.totalQty<wrist.refMinQty){
			alert('Minimum Order Quantity is '+wrist.refMinQty+'!');
					scrolFocus('.Cfill');
			return false;
		}
	}
	if(!checkQtyTextColor()){
		alert('Please correct errors in Step 4 (Marked in Red).');
                scrolFocus('.Cfill');
		return false;
	}
	if(!SALE_USER){
		if(!checkCustomMinQty()){
		 alert('You must select a min of 20pcs if you wish to have a custom color.');
                 scrolFocus('.Cfill');
		 return false;
		}
	}
	if(!checkCustomFont()){
		alert('Please enter custom font name.');
                scrolFocus('#txtCustomFont');
		return false;
	}
	if(!checkUploads()){
		alert('Please upload clipart images.');
                scrolFocus('#txtCustomFont');
		return false;
    }
	
	if($("#chkKeychain").is(":checked")){
		if(!$("input[name=keyOpt]").is(":checked")){
			$(".keychainOption").addClass("keyErr");
			alert("Please choose one upgrade key option");
			scrolFocus('.extraHolder');
			return false;
		}
		if($("input[name=keyOpt]:checked").val() == "2"){
			if($.trim($(".keyQty").val()) == ""){
				$(".keychainOption").addClass("keyErr");
				$(".keyQty").addClass("error");
				alert("Please add additional Keychain qty.");
				scrolFocus('.extraHolder');
				return false;	
			}	
			
			if($.trim($(".keyQty").val()) < 25){
				$(".keychainOption").addClass("keyErr");
				$(".keyQty").addClass("error");
				alert("Minimum Keychain qty should be 25 or more");
				scrolFocus('.extraHolder');
				return false;	
			}	
		}
	}
	
	if(!wrist.curProduction.day||!wrist.curProduction.text){
		alert('Please select production time!');
                scrolFocus('#drpProdTime');
		return false;
	}
	if(!wrist.curShipping.day||!wrist.curShipping.text){
		alert('Please select shipping time!');
                scrolFocus('#drpShipTime');
		return false;
	}
	tS = true;
	if(express){
		tS = confirm("100 free does not qualify for next day order.");
		
	}
	
	if(SUBMIT_FORM && tS){
		submitForm();
		SUBMIT_FORM = false;
	}
});
var deleteFiles = true;
function submitForm(){
    var colorData = getBandFontStr();
	var kQty = 0;
	/*if($('input[name=keyOpt]').is(":checked")){
		if($('input[name=keyOpt]:checked').val() == "3"){
			kQty = "Free";
		}else if($('input[name=keyOpt]:checked').val() == "2"){
			kQty = $('.keyQty').val();
		}else if($('input[name=keyOpt]:checked').val() == "1"){
			kQty = "Full";
		}
	}*/
    var postData = {
    cartImage: $('.wstyle div.xselected img.cached').attr('src'),
    styleImg: wrist.styleImg,
    styleID: wrist.rStyle,
    style: wrist.refStyleTitle,
    typeID: wrist.pvType,
    type: getTypeName(wrist.pvType),
    sizeID: wrist.rSize,
    size: getFontSize(),
    band_size: wrist.refSizeTitle,
    advVal: ($('#chkAdvertise').is(':checked'))?1:0,
    frontmsg: $('#fronttxtmsg').val(),
    internalmsg: $('#txtinternal').val(),
    backmsg: $('#backtxtmsg').val(),
    comments: $('.txtcomments:visible').val(),
    fontname: (wrist.curFont.title=='Use Custom Font')?$('#txtCustomFont').val():wrist.curFont.title,
    bandcolor: colorData.bandcolor.join(' '),
    fontcolor: colorData.fontcolor.join(' '),

    curClipart: wrist.curClipart,
    UploadedFile: wrist.UploadedFile,

    qty: wrist.totalQty,
    price: wrist.totalPrice,
    prodIndex: wrist.curProduction.day,
    production: wrist.curProduction.text,
    shipIndex: wrist.curShipping.day,
    shipping: wrist.curShipping.text,
    deliveryDate: wrist.deliveryDate,
    proof: $('#drpDigital').val(),
    keychain: ($('#chkKeychain').is(':checked'))?'Yes':'No',
	keyQty: ($('input[name=keyOpt]').is(":checked"))?kQty:0,
    wrapper: ($('#chkWrapped').is(':checked'))?'Yes':'No',
    page: 'order',
    madein:	chkImg(),
    shapeLogo:'',//used for figured
    shapeName:'',//used for figured
    customBands: getCustomBands(),
    fixBands:	getFixBands(),
    curFont:	wrist.curFont,
	newBandStyle: $('body').data('typeQtys'),
	newBandType:  colorData.bandtypename.join('||'),
    messageStyle: $('input[type="radio"][name="msgStyle"]:checked').val(),
    fsLogo:	getFSart(),
    feLogo: getFEart(),
    bsLogo: getBSart(),
    beLogo: getBEart(),
    Product:'wristband',
    isFigured: 'No',
    isOneInch: 'No',
    is3_4Inch: 'No',
	express:express,
    giftCode: (wrist.totalQty>=100 && !express)?'G0000':'',
    giftQty: (wrist.totalQty>=100 && !express)?'100':'',
    giftName: (wrist.totalQty>=100 && !express)?'Wristbands':'',
	extraQty:extraQty,
    interShip: getInterShip(),
    curShipping: wrist.curShipping,
    curProduction: wrist.curProduction
    };

    deleteFiles = false;
    $('.ximgLoading').show();
    $.ajax({
        url:ADD_TO_CART,
        dataType:'json',
        data:postData,
        type:'post',
        success:function(json){
            if(json.success==true){
               window.location = HTTP_SERVER+MY_CART_URL;
            }else if(json.success == 'edit'){
				 location.href = json.url;
			}else{
                alert('Error: while adding to cart');
            }
            $('.imgLoading').hide();
        }
    });
}
function getBandFontStr(){
	var obj = { bandcolor: [], fontcolor: [], bandtypename:[]};
	$('.Cfill input.txtQty').each(function(){
		if($(this).val() != ''){
		var name = $(this).attr('refname');
		var reft = $(this).attr('reft');
		var reftype = $(this).attr('reftype');
		var refid = $(this).attr('refid');
		var qty = $(this).val();
		var select = $('.drpColor[refid="'+ refid +'"][reft="'+ reft +'"]');
		if(name == 'Custom'){
			name = $('.txtPms[refid="'+ refid +'"]').val();
		}
		obj.bandcolor.push('('+ name +'['+ qty + reft.substr(0,1) +'])');
		obj.bandtypename.push(getTypeName(reftype).toLowerCase());
		if(select){
		drpcolor = select.find('option:selected').html();
			if(drpcolor){
			if(drpcolor == 'Other'){
				drpcolor = $('.txtOther[refid="'+ refid +'"][reft="'+ reft +'"]').val();
			}
			obj.fontcolor.push('('+ drpcolor +'['+qty+reft.substr(0,1)+'])');
			}
		}
		}
	});
	return obj;
}
function validMinQty(){
	$('.txtQty').each(function(){
	if($(this).val()!=''){
	var val = parseInt($(this).val()*1);
	$(this).val(val);
	if(val>0){
		if(val<wrist.refMinQty){
			$(this).addClass('error');
			$(this).focus();
		}else{
			$(this).removeClass('error');
		}
	}
	}
	});
}
function checkCustomMinQty(){
    var valid=true;
    $('.CusBands .txtQty').each(function(){
       if($(this).val()!=''){
           var val = parseInt($(this).val()*1);
           $(this).val(val);
           if(val<20){
               valid = false;
               $(this).addClass('error');
           }
       } 
    });
    return valid;
}
function checkQtyTextColor(){
    var valid = true;
    if(wrist.text_color==1){
    $('.txtQty').each(function(){
       if($(this).val()!=''){
           var val = parseInt($(this).val()*1);
           $(this).val(val);
           if(val>0){
               var id = $(this).attr('refid');
               var type = $(this).attr('reft');
               var drp = $('.drpColor[refid="'+ id +'"][reft="'+ type +'"]');
               if(drp.val()==''){
                   drp.addClass('error');
                   valid = false;
               }else{
                   if(drp.val()=='Other'){
                       var txtOther = $('.txtOther[refid="'+ id +'"][reft="'+ type +'"]');
                       if(txtOther.val()==''){
                           txtOther.addClass('error');
                           valid = false;
                       }
                   }
               }
           }
       }
    });
    }
    if(valid && !checkPmsQty()){
        valid = false;
    }
    return valid;
}
function checkPmsQty(){
    var valid=true;
    $('.CusBands .txtQty').each(function(){
       if($(this).val()!=''){
           var id = $(this).attr('refid');
           var par = $('.txtPms[refid="'+ id +'"]');
           if(par.val()==''){
               par.addClass('error');
               valid = false;
           }
       } 
    });
    return valid;
}
function checkCustomFont(){
var valid = true;
if(wrist.curFont.title == "Use Custom Font"){
    var txt = $('#txtCustomFont');
    if(txt.val()==''){
        txt.addClass('error');
        valid = false;
    }
}
return valid;
}
function checkUploads(){
    var valid = true;
    if(wrist.curClipart.fs.title == "Upload Clipart" && wrist.UploadedFile.fs.name==""){
        $('#fsfile').addClass('error');
        valid = false;
    }
    if(wrist.curClipart.fe.title == "Upload Clipart" && wrist.UploadedFile.fe.name==""){
        $('#fefile').addClass('error');
        valid = false;
    }
    if(wrist.curClipart.bs.title == "Upload Clipart" && wrist.UploadedFile.bs.name==""){
        $('#bsfile').addClass('error');
        valid = false;
    }
    if(wrist.curClipart.be.title == "Upload Clipart" && wrist.UploadedFile.be.name==""){
        $('#befile').addClass('error');
        valid = false;
    }
    return valid;
}
function getCustomBands(){
var custom = {txtPms:[],customImage:[],txtQty:[],refid:[],reftype:[],drpColor:[]};
	$('.CusBands').each(function(){
		var refid = $(this).attr('refid');
		custom.refid.push(refid);
		var txtPms = $('.txtPms[refid="'+ refid +'"]');
		var txtPmsArr = {val:'',ref:''};
		var txtPmsVal = txtPms.val();
		if(txtPmsVal!=''){
			var ref = txtPms.attr('ref');var reftype = txtPms.attr('reftype');
			txtPmsArr.val = txtPmsVal;
			txtPmsArr.ref = ref;
			txtPmsArr.reftype = reftype;
			custom.txtPms.push(txtPmsArr);
			custom.customImage.push($('.customImage[refid="'+ refid +'"]').attr('src'));
			
			var txtQty = {val:[],reft:[],reftype:[]};
			$('.txtQty[refname="Custom"][refid="'+ refid +'"]').each(function(){
				if($(this).val()!=''){
					txtQty.val.push($(this).val());
					txtQty.reft.push($(this).attr('reft'));
					txtQty.reftype.push($(this).attr('reftype'));
				}
			});
			custom.txtQty.push(txtQty);
			
			var drpColor = {reft:[],val:[],ref:[],reftype:[],other:[]};
			$('.drpColor[refname="Custom"][refid="'+ refid +'"]').each(function(){
				if($(this).val()!=''){
				var reft = $(this).attr('reft');
				var reftype = $(this).attr('reftype');
				var other = {val:'',ref:''};
				if($(this).val() == 'Other'){
					var txtOther = $('.txtOther[refname="Custom"][reft="'+ reft +'"][reftype="'+ reftype +'"][refid="'+ refid +'"]');
					other.val=txtOther.val();
					other.ref=txtOther.attr('ref');
					other.reftype=txtOther.attr('reftype');
				}
				var txtColor = $(this).find('option:selected').attr('ref');
				drpColor.val.push($(this).val());
				drpColor.ref.push(txtColor);
				drpColor.other.push(other);
				drpColor.reft.push(reft);
				drpColor.reftype.push(reftype);
				}
			});
			custom.drpColor.push(drpColor);
		}
	});
return custom;
}
function getFixBands(){
var fixbands = {qty:[],refid:[],reft:[],reftype:[],refname:[],drpColor:[],txtOther:[],txtOtherRef:[]};
	$('.NorBands .txtQty').each(function(){
		if($(this).val()!=''){
			var qty = $(this).val();
			var refid = $(this).attr('refid');
			var reft = $(this).attr('reft');
			var reftype = $(this).attr('reftype');
			var refname = $(this).attr('refname');
			fixbands.qty.push(qty);
			fixbands.refid.push(refid);
			fixbands.reft.push(reft);
			fixbands.reftype.push(reftype);
			fixbands.refname.push(refname);
			
			var drpColor = $('.drpColor[refid="'+ refid +'"][reft="'+ reft +'"][reftype="'+ reftype +'"]').val();
			fixbands.drpColor.push(drpColor);
			
			var txtOther = $('.txtOther[refid="'+ refid +'"][reft="'+ reft +'"][reftype="'+ reftype +'"]').val();
			fixbands.txtOther.push(txtOther);
			var txtOtherRef = $('.txtOther[refid="'+ refid +'"][reft="'+ reft +'"]').attr('ref');
			fixbands.txtOtherRef.push(txtOtherRef);
			
		}
	});
return fixbands;
}
function chkImg(){
var madein = '';
	if(getFSart()==''&&getFEart()==''&&getBSart()==''&&getBEart()==''){
		madein = 'N';
	}else{
		madein = 'Y';
	}
	return madein;
}
function getFSart(){
var path='';
if(wrist.curClipart.fs.src && wrist.refStyle != 'blank'){
	if(wrist.curClipart.fs.src!=''){
		if(wrist.curClipart.fs.title == 'Upload Clipart'){
		path = wrist.UploadedFile.fs.file;
		}else{
		path = wrist.curClipart.fs.src
		}
	}
}
return path;
}
function getFEart(){
var path='';
if(wrist.curClipart.fe.src && wrist.refStyle != 'blank'){
	if(wrist.curClipart.fe.src!=''){
		if(wrist.curClipart.fe.title == 'Upload Clipart'){
		path = wrist.UploadedFile.fe.file;
		}else{
		path = wrist.curClipart.fe.src
		}
	}
}
return path;
}
function getBSart(){
var path='';
if(wrist.curClipart.bs.src && wrist.refStyle != 'blank'){
	if(wrist.curClipart.bs.src!=''){
		if(wrist.curClipart.bs.title == 'Upload Clipart'){
		path = wrist.UploadedFile.bs.file;
		}else{
		path = wrist.curClipart.bs.src
		}
	}
}
return path;
}
function getBEart(){
var path='';
if(wrist.curClipart.be.src && wrist.refStyle != 'blank'){
	if(wrist.curClipart.be.src!=''){
		if(wrist.curClipart.be.title == 'Upload Clipart'){
		path = wrist.UploadedFile.be.file;
		}else{
		path = wrist.curClipart.be.src
		}
	}
}
return path;
}
function getFontSize(){
var adultQty = 0;
$('.txtQty[reft="Adult"]').each(function(){
    if($(this).val()!=''){
        adultQty+=($(this).val()*1)
    }
});

var youthQty = 0;
$('.txtQty[reft="Youth"]').each(function(){
    if($(this).val()!=''){
        youthQty+=($(this).val()*1)
    }
});

var toddlerQty = 0;
$('.txtQty[reft="Toddler"]').each(function(){
    if($(this).val()!=''){
        toddlerQty+=($(this).val()*1)
    }
});
var str = '';
if(adultQty>0){
	str += 'Adult('+adultQty+')';
}
if(youthQty>0){
	str += 'Youth('+youthQty+')';
}
if(toddlerQty>0){
	str += 'Toddler('+toddlerQty+')';
}
return str;
}
function getInterShip(){
	var ship = {val:'',text:'',ref:''};
	var drp = $('#drpShipTime option').last();
	ship.val = drp.val();
	ship.text = drp.text();
	ship.ref = drp.attr('ref');
	return ship;
}
function scrolFocus(e){
    $('html, body').animate({ scrollTop: $(e).offset().top - 60 }, 800);    
}