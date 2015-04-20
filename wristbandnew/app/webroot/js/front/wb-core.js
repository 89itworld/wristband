var HTTP_SUB_DIR = '/';
var PROTO = window.location.protocol;
var HOST = window.location.host;
var HTTP_SERVER = PROTO+'//'+HOST;
var URL = PROTO+'//'+HOST;
var DIR_WB = 'wristbandnew/';
var LoadColors = false;
var LoadPr = false;
var LoadExPr = false;
var CURRENCY = '$';
var MY_CART_URL = '/wristbandnew/orders/add_cart';
var ADD_TO_CART = 'cart_items?code=add&prod=wristband';
var DIR_CLIPART_UPLOAD = DIR_WB + 'img/cliparts/uploads/';
var DIR_CLIPART = DIR_WB +'img/cliparts/';
//var DIR_CLIPART = HTTP_SERVER+DIR_WB +'gd/load/?_route_=clipart';
var DIR_FONT = HTTP_SERVER+'/'+DIR_WB +'orders/fontEffects?_route_=font';
var DIR_GD_CLIPART =HTTP_SERVER+'/'+DIR_WB+'orders/effects?_route_=clipart';
var DIR_GD_STYLE = HTTP_SERVER+'/'+DIR_WB+'orders/effectPager?_route_=type';
var DIR_GD_CUSTOM = HTTP_SERVER+'/'+DIR_WB+'orders/imageEffects?_route_=custom';
var baseroot = 'wristband/ajax/';
var DIGITAL_PRICE = 10;
var ADVERTISE_PRICE = 5;
var COLOR_FEE = 10;
var MOLD_FEE = 40;
var QTY_LIMIT = 100;
var ADVERT_LIMIT = 100;
var FREE_QTY = 100;
var FREE_QTY_TXT = ' + 100 FREE';
var FM_LIMIT = 22;
var BM_LIMIT = 22;
var IM_LIMIT = 22;
var FONT_SIZE = 30;
var GIFT_QTY = "";
var extraQty = 0;
var BandUnitPrice = 0;
var ADVERT_MSG = 'www.brandnex.com (###) - ### - ####';
var wbdata = {};
var autofill = {};
autofill = {txtQty:{val:[],refname:[],reft:[],reftype:[]},drpColor:{val:[],refname:[],reft:[],reftype:[],other: []}};
var wrist = {pvType:0,
curClipart: { fs: {title:'',src:'',ref_id:0}, fe: {title:'',src:'',ref_id:0}, bs: {title:'',src:'',ref_id:0}, be: {title:'',src:'',ref_id:0} },
UploadedFile: { fs: {name:'',file:''}, fe: {name:'',file:''}, bs: {name:'',file:''}, be: {name:'',file:''} },
curFont: {title: 'Arial bold',ref:'4897462015-03-27arialbd.ttf',color:'222222'},
curShipping: {day:'',price:'',text:''},
curProduction: {day:'',price:'',text:''},
totalQty:0,
totalPrice:0.00,
frontMessage:'FRONT MESSAGE',
backMessage:'BACK MESSAGE',
internalMessage:'INTERNAL MESSAGE'
};
$(document).ready(function(){
	getdumb();
	$('.colorbox').colorbox();
	$('.wlrg').colorbox({fixed:true,maxWidth:750, maxHeight:600});
	$.ajax({url: URL+'/wristbandnew/orders/colors' ,dataType:'json',cache:true,success:	postColors });
	$.ajax({url: URL+'/wristbandnew/orders/prices',dataType:'json',cache:true,success:	postPr });
	$.ajax({url: URL+'/wristbandnew/orders/extraPrices',dataType:'json',cache:true,success:	postExPr });
	//$.post(baseroot+"wristbands-aj.php?code=colors", {}, postColors, "json");
	//$.post(baseroot+"wristbands-aj.php?code=pr", {}, postPr, "json");
	//$.post(baseroot+"wristbands-aj.php?code=exPr", {}, postExPr, "json");
	$('.wstyle').click(function(){ 
			setSteps('wstyle', this);
			setTimeout(function(){ setSteps('wsize', $('.wsize:visible').eq(1)); }, 5);
			
			autoFillGet();
			//$('.Cfill').html('<p align="center"><img src="/wristbandnew/img/wload.gif" /></p>');
		 	commonFunc();
		 $('.TypeClick:eq(0)').trigger('click');
		 
		 //if(wrist.refStyle != 'dual_layer'){$('.colorsSel, .btnAddMore').show();}else{$('.colorsSel, .btnAddMore').hide();}
		 $('.select-size .porduct-item').hide();
		 $('.Cfill .porduct-item').hide();
		 wrist.sizeID = $('[name=rStyle]:checked').val();
		 $('.CusBands').show();
		 $('.SZ'+wrist.sizeID).show();
		 $('.SZ'+wrist.sizeID).css('display','block');
	});
	
	$('.wsize').click(function(){  setSteps('wsize', this); autoFillGet();	 commonFunc(); });
	$('.btnAddMore').click(function(){  createCustom(1)});
	
	$('.wristForm .clipart li a.ownart').click(function(){
		var li = $(this).parent('div').parent('li');
		li.find('.drpMenuItems').trigger('click');
		$('.drpMenuItems_clipart').hide();
		li.find('.clipart-div ul li a[title="Upload Clipart"]').trigger('click');
	});
	
});

$('.TypeClick').on("click", function(){
	
	//console.log(wrist.rStyle);
	//return false;
	$('.TypeClick').find('[type=radio]').prop("checked",false);
	$('.TypeClick').removeClass('on');
	$(this).find('[type=radio]').prop("checked",true);
	$(this).addClass('on');
	wrist.typeID = $('[name=rpType]:checked').val();
	$('.Cfill .porduct-item').hide();
	if(wrist.typeID == 0){
		$('.Cfill .SZ'+wrist.rStyle).show();
	}else if(wrist.typeID == 4){
		//$('.Cfill .porduct-item').hide();
		$('.B'+wrist.typeID+'.SZ'+wrist.rStyle).show();
	}else{
		$('.B'+wrist.typeID+'.SZ'+wrist.rStyle).show();
	}
	$('.Bx').show();
});

/*
$('.SizeClick').on("click", function(){

	//$('.SizeClick').find('[type=radio]').prop("checked",false);
	//$('.SizeClick').removeClass('on');
	//$(this).find('[type=radio]').prop("checked",true);
	//$(this).addClass('on');
	wrist.sizeID = $('[name=rStyle]:checked').val();
	console.log(wrist.sizeID);
	if(wrist.sizeID != 2){$('.colorsSel, .btnAddMore').show();}else{$('.colorsSel, .btnAddMore').hide();}
	$('.select-size .porduct-item').hide();
	$('.Cfill .porduct-item').hide();
	$('.SZ'+wrist.sizeID).show();
	//return false;
});
*/

$('body').on('click', '.Cbtn', function() {

    $(this).parent().remove();
    calculatePrice();
});


function createColorChart(){
var str = '<ul>';
if(wrist.chart){
	$(wrist.chart).each(function(i,e){
		str += '<li ref="'+ i +'" refCode="'+ e.colorCode +'" refTitle="'+ e.colorTitle +'"><a><img src="/wristbandnew/img/band.png" style="background-color:#'+ e.colorCode +'" />';
		str += '<b>'+ e.colorTitle +'</b></a>';
		str += '</li>';
	});
}
str += '</ul>';
$('#colorChart .colors').html(str);
}



var curElement;
var pmsMax = 3;
function openColorChart(selector){
checkPMSLength(selector);
curElement = selector;
//pmsMax = len;
createColorChart();
createPmsTextbox();
$.colorbox({
   inline:  true,
   href: '#colorChart',
   maxWidth: 720,
   maxHeight: 480,
   width:	'100%',
   height: '100%',
   fixed:  true,
   title: 'Scroll Down to View More Colors'
});
/*Priyank Preselect Code*/
/*setTimeout(function(){
	if(!gOtherTxt){
		tvx = curElement.parents('.customHolder');
		if(tvx.length == 0){jx = 1;}else{jx = tvx.find(".txtQty:eq(0)").attr('reftype');}
		$('.customType').val(jx);
		$('.customType').trigger("change")
	}
	
}, 300);*/
/*Priyank Preselect Code*/
}


function checkPMSLength(selector){
	tid = selector.attr('reftype');
	pmsMax = getNumberColors(tid);
	xstr = "";tArr = ['Solid', 'Segmented', 'Swirl'];
	for(xi=1;xi<=3;xi++){
		tsel = "";
		if(tid == xi){
			tsel = 'selected="selected"';
		}
		txi = xi - 1;
		xstr += '<option value="'+xi+'" '+tsel+'>'+tArr[txi]+'</option>';
	}
	$('.customType').html(xstr);
	$('.csType').show();
	if(gOtherTxt){
		$('.csType').hide();
		$('.customType').val(1);
	}
	
}

function createPmsTextbox(){
	var str = '';
	if(pmsMax<=1){ str += '<h3>Select Color</h3>'; }else{ str += '<h3>Select Colors</h3>';}
	str += '<ul>';
	for(var i=0; i<pmsMax; i++){ str += '<li><input type="text" placeholder="PMS#" refid="'+ i +'" /></li>'; }
	str += '</ul>';
	str += '<a class="btnDone">Done</a>';
	str += '<div style="width: 100%; float: left; font-size: 12px;">Please click on color(s) below or simply type in the color code in the PMS box. Then select Done.</div>';
	$('.selectedColors').html(str);
}

$('body').on('click', '#colorChart .colors ul li a', function() {
    var id = $(this).parent().attr('ref');
	checkColorChart(id);
});

/*
$('#colorChart .colors ul li a').on('click',function(){
	console.log('sadfsd');
var id = $(this).parent().attr('ref');
checkColorChart(id);
});
*/

$('.selectedColors ul li input').on('change',function(){
	addPMScode($(this));
});
$('.customType').on('change',function(){
	pmsMax = getNumberColors($(this).val());
	createPmsTextbox();
	$('.colors ul li.selected').find('span').remove();
	$('.colors ul li.selected').removeClass('selected');
	arrPMSids = [];
		
});

function getNumberColors(tid){
var n = 1;
if(tid == 1){ n = 1; }
if(tid == 2){ n = 6; }
if(tid == 3){ n = 3; }
return n;
}
function addPMScode(txt){
	var id = getColorChart(txt.val());
	var refid = txt.attr('refid');
	if(id){
		checkColorChart(id);
	}else{
		txt.removeAttr('ref');
		txt.parent('li').removeAttr('style');
		arrPMSids.splice(refid,1);
	}
	if(txt.val()==''){
		arrPMSids.splice(refid,1);
		createPmsPreview();
	}
}
function getColorChart(str){
var id = false;
if(wrist.chart){
$(wrist.chart).each(function(i,e){
	if(str.toLowerCase() == e.colorTitle.toLowerCase()){
		id = i.toString();
		return false;
	}
});
}
return id;
}
var curCustomType = 1;
$('body').on('click', '.selectedColors .btnDone',function(){

if(pmsMax == 1){
	if(arrPMSids.length<=0){
		alert('Please select color!');
		return false;
	}
}
if(pmsMax == 3 || pmsMax == 6){
	if(arrPMSids.length<=1){
		alert('Please select more than 1 color!');
		return false;
	}
}
var arrPms = [];
var arrHex = [];
$('.selectedColors ul li input').each(function(){
	if($(this).val() !== ''){
	arrPms.push($(this).val());
	arrHex.push($(this).attr('ref'));
}
});
if(arrHex.length >=1){
arrPms.join(',');
arrHex.join(',');
curElement.val(arrPms);
curElement.attr('ref',arrHex);
curElement.removeClass('error');
arrPMSids = [];
createPmsPreview();
curCustomType = 1;
if($('.csType').is(':visible')){
	curCustomType = $('.customType').val();
	var tx = curElement.parents('.to-highlight');
	var tx2 = $('.customType').val();
	curElement.attr('reftype',tx2);
	tx.find('.txtQty').attr('reftype',tx2).attr('ref',arrHex);
	tx.find('select').attr('reftype',tx2);
	changeCustomImage(curElement,arrHex);
}



$.colorbox.close();
wrist.curFont.color = arrHex;
changeBandText();
calculatePrice();

var refid = curElement.attr('refid');
$('.txtQty[refid="'+ refid +'"]').each(function(){
    if($(this).val()!=''){
        changeStyle($(this));
        return false;
    }
});

}else{
   alert('Please enter valid PMS Code/Name!');
   return false;
}
});

var arrPMSids = [];
function checkColorChart(id){
var i = $.inArray(id,arrPMSids);
if(i<0){
    if(arrPMSids.length < pmsMax){
	arrPMSids.push(id);
    }else{
        arrPMSids.shift();
        arrPMSids.push(id);
    }
}else{
    arrPMSids.splice(i,1);
}
arrPMSids = unique(arrPMSids);
createPmsPreview();
}
function changeCustomImage(curElement,arrHex){
	
	var trefType = getTypeName(curCustomType).toLowerCase();
	
//if(wrist.refType){
	setTimeout(function(){ 
		curElement.parents('.to-highlight').find('img').attr('src',DIR_GD_CUSTOM+'&style='+ trefType +'&color='+arrHex+'&type='+wrist.refSize); 
	}, 500);
	
//}
}
function createPmsPreview(){
	$('#colorChart .colors > ul li').removeClass('selected');
	$('#colorChart .colors > ul li span').remove();
	var n = 0;
	$('.selectedColors ul li input').val('');
	$('.selectedColors ul li input').removeAttr('ref');
	$('.selectedColors ul li').removeAttr('style');
	$(arrPMSids).each(function(i,e){
		var li = $('#colorChart .colors > ul li[ref='+ e +']');
		li.addClass('selected');
		li.prepend('<span></span>');
		$('.selectedColors ul li:eq('+ n +') input').val(li.attr('reftitle'));
		$('.selectedColors ul li:eq('+ n +') input').attr('ref', li.attr('refcode'));
		$('.selectedColors ul li:eq('+ n +')').css('background-color','#'+li.attr('refcode'));
		n++;
	});
}

function postColors(json){
	wrist.colors = json.band;
	wrist.text = json.text;
	wrist.chart = json.colors;
	wrist.clipart = json.clipart;
	wrist.font = json.font;
	wrist.typeImages = json.typeImages;
	wrist.metallicFee = json.metallicFee;
	wrist.glitterTextFee = json.glitterTextFee;
	LoadColors = true;
	startup();
}

function postPr(json){
	wrist.prodShipQty = json.prodShipQty;
	wrist.shipping = json.shipping;
	wrist.shipPrice = json.shipPrice;
	wrist.production = json.production;
	wrist.prodPrice = json.prodPrice;		
	wrist.priceQty = json.priceQty;
	wrist.bandPrice = json.bandPrice;
	LoadPr = true;
	startup();
}
function postExPr(json){
	wrist.extraQty = json.extraPriceQty;
	wrist.otherPrice = json.otherPrice;
	wrist.extraData = getExtraData();
	LoadExPr = true;
	startup();
}

function startup(){
	
	if(LoadColors && LoadPr && LoadExPr){
		if(typeof(editOrder)==='function'){ editOrder();  /*calling edit function */  }else{ initSystem();  } 
	}	
}

function commonFunc(){checkDualLayer();setWristData();fillColors();resetDrpMenu(); changeBandText(); calculatePrice(); }

function initSystem(){

	if(SEO_KEYWORD == ""){
		wrist.type_id = 1;
		wrist.size_id = 3;
		setSteps('wstyle', $('.wstyle:eq(0)'));
		setSteps('wsize', $('.wsize:eq(1)'));
		commonFunc();
	}else{
		preSelectedItems();	
		//commonFunc();
	}
	
}

function resetDrpMenu(){
	
$('.drpMenuItems_fonts').fadeOut(300);
$('.drpMenuItems_fonts').removeClass('open');
$('.drpMenuItems_fonts').addClass('closex');

$('.drpMenuItems_clipart').fadeOut(300);
$('.wristForm .clipart li a').removeClass('open');
$('.wristForm .clipart li a').addClass('closex');
}
$('input').on('focus',function(){
resetDrpMenu();
});


$('.clipart .drpMenuItems').on('click',function(){
$('.clipart li').removeAttr('style');
if($(this).hasClass('closex')){
	resetDrpMenu();
	$(this).removeClass('closex');
$(this).addClass('open');
	$(this).parent().find('.drpMenuItems_clipart').fadeIn(800);
}else{
	$(this).removeClass('open');
	$(this).addClass('closex');
	$('.drpMenuItems_clipart').fadeOut(300);
}
});


$('#btnSelectFont').on('click',function(){
if($(this).hasClass('closex')){
	resetDrpMenu();
	$(this).removeClass('closex');
	$(this).addClass('open');
	$('.drpMenuItems_fonts').fadeIn(800);
}else{
	$(this).removeClass('open');
	$(this).addClass('closex');
	$('.drpMenuItems_fonts').fadeOut(300);
}
	openFontPopup(wrist.curFont.title);		
});



$('.wristForm .clipart li a').on('click',function(){
openClipart($(this));
});



$('body').on('click', '#fontHolder ul li a', function() {
$('#fontHolder ul li').removeClass('selected');
$('#fontHolder ul li span').remove();
var li = $(this).parent('li');
li.addClass('selected');
li.prepend('<span></span>');
wrist.curFont.title = $(this).attr('title');
wrist.curFont.ref = $(this).attr('ref');
changeFont();
changeBandText();
changePreviewNote();
});


$('body').on('click', '.clipart-div ul li a', function(){
	addClipart($(this));
});

function addClipart(clipArt){
$('.clipart-div ul li').removeClass('selected');
$('.clipart-div ul li span').remove();
var li = clipArt.parent('li');
li.addClass('selected');
li.prepend('<span></span>');

var a = li.parent('ul').parent('.clipart-div').parent('.drpMenuItems_clipart').prev('a');
var file = li.parent('ul').parent('.clipart-div').parent('.drpMenuItems_clipart').parent('li').find('input[type="file"]:eq(0)');
var title = clipArt.attr('title');
var ref = clipArt.attr('ref');
var reft = clipArt.attr('reft');

file_remove_btn = li.parent('ul').parent('.clipart-div').parent('.drpMenuItems_clipart').parent('li').find('.uploadedFile span');
if(file_remove_btn.attr('ref')){
	file_remove_btn.click();//this remove the uploaded file
}

if(title == 'None'){
	a.html(a.attr('default'));
	a.removeAttr('title');
	a.removeAttr('ref');
	a.removeAttr('reft');
	a.removeAttr('reft');
	file.hide();
}else{
	if(title == 'Upload Clipart'){
		file.show(function(){
			$(this).click();
		});
	}else{
		file.hide();
	}
	a.attr('title',title);
	a.attr('ref',ref);
	a.attr('reft',reft);
	a.html(clipArt.html());
}

a.html(a.html()+'<span></span>');
resetDrpMenu();
changeBandText();
calculatePrice();
}

$('.colorList li .btnCloseCustom').on('click',function(){
$(this).parent('li').remove();
});

var clipState = true;


function createClipartPopup(selector){

clipState = false;
if(clipState){
var str = '<ul>';
if(wrist.clipart){
	$(wrist.clipart).each(function(i,e){
		str += '<li><a title="'+e.title+'" ref="'+ e.image +'" reft="'+ e.ref_id +'"><img src="'+ DIR_CLIPART + e.image +'" />';
		str += '<b>'+ e.title +'</b></a>';
		str += '</li>';
	});
}
str += '</ul>';
$('.clipart-div').html(str);
clipState = false;
}
var li = $('.clipart-div ul li a[title="'+ selector.attr('title') +'"][ref="'+ selector.attr('ref') +'"]').parent('li');
li.addClass('selected');
li.prepend('<span></span>');
}


function openClipart(selector,len){
createClipartPopup(selector);
}

var popState = true;
function createFontPopup(selector){
if(popState){
var str = '<ul>';
if(wrist.font){
$(wrist.font).each(function(i,e){
	str += '<li><a title="'+e.title+'" ref="'+ e.image +'"><img src="'+ DIR_FONT +'&size=20&name='+ e.image +'&effect=printed&color=222222&text='+ e.title +'" />';
	str += '</a>';
	str += '</li>';
});
}
str += '</ul>';
$('#fontHolder').html(str);
	popState = false;
}
var li = $('#fontHolder ul li a[title="'+ selector +'"]').parent('li');
li.addClass('selected');
li.prepend('<span></span>');
}


function openFontPopup(selector){
	createFontPopup(selector);
}

function changeFont(){
$('.fontForm #btnSelectFont img').attr('src',DIR_FONT + '&size=20&name='+wrist.curFont.ref+'&effect=printed&color=222222&text='+wrist.curFont.title);
if(wrist.curFont.title == 'Use Custom Font'){
	$('.fontForm #txtCustomFont').fadeIn(800);
}else{
	$('.fontForm #txtCustomFont').fadeOut(300);
	$('.fontForm #txtCustomFont').val('');
}

$('.fontForm #btnSelectFont').removeClass('open');
$('.fontForm #btnSelectFont').addClass('closex');
$('.drpMenuItems_fonts').fadeOut(300);
}
$('input').on('focus',function(){
    $(this).removeClass('error');
});

function setSteps(tclass, tthis){
	
	$('.'+tclass).find('[type=radio]').prop("checked",false);
	$('.'+tclass).find('.ffRadioWrapper').removeClass('on');
	
	$(tthis).find('[type=radio]').prop("checked",true);
	$(tthis).find('.ffRadioWrapper').addClass('on');
	switch(tclass){
		case "wstyle":
			$('.'+tclass).find('.product').removeClass('xselected');
			$(tthis).find('.product').addClass('xselected');
		break;	
		case "wsize":
			$('.'+tclass).find('.to-highlight').removeClass('selected');
			$(tthis).find('.to-highlight').addClass('selected');
		break;	
	}
}



function setWristData(){
	wrist.styleImg = $('input[name=rStyle]:checked').parents('.to-highlight').find('img').attr('src');
	wrist.rStyle = $('input[name=rStyle]:checked').val();
	wrist.refStyle = $('input[name=rStyle]:checked').attr('ref');
	wrist.refStyleTitle = $('input[name=rStyle]:checked').attr('reft');
	wrist.refMinQty = $('input[name=rStyle]:checked').attr('refm');
	wrist.text_color = $('input[name=rStyle]:checked').attr('text_color');
	wrist.rSize = ($('input[name=rSize]:checked').val())?$('input[name=rSize]:checked').val():3;
	wrist.refSize = $('input[name=rSize]:checked').attr('ref');
	wrist.refSizeTitle = $('input[name=rSize]:checked').attr('reft');
	wrist.rType = ($('input[name=rType]:checked').val())?$('input[name=rType]:checked').val():1;
	wrist.refType = $('input[name=rType]:checked').attr('ref');
	wrist.refTypeTitle = $('input[name=rType]:checked').attr('reft');
	$('.bandPreview').parent('.previewHolder').attr('class','previewHolder '+wrist.refSize);

}

function getdumb(){
	var tx = $("#colorCode").html();
	wrist.htmlColors = tx;
	tx = $("#PMSBox").html();
	wrist.htmlPMS = tx;
	tx = $("#BandType").html();
	wrist.htmlType = tx;
	tx = $('#TxtColor').html();
	wrist.htmlTxtDrp = tx;
	$("#colorCode, #PMSBox, #BandType, #TxtColor").remove();	
}


function fillColors(){

	var tstr, tx, txPms, txBtype, tdraw, xtxt;
	tstr = '';xtxt='';
	
	/*
	$.each(wrist.colors, function(kk,e){
		//console.log(vv.ref_size_id + " - " + vv.ref_type_id);
		tx = wrist.htmlColors;
		txPms = wrist.htmlPMS;
		txBtype = wrist.htmlType;
		txTxtDrp = wrist.htmlTxtDrp;
		tdraw = false;
		if(wrist.refStyle == 'dual_layer' && wrist.rSize == e.ref_size_id && e.no_layers == 2){
			tdraw = true;
		}else if(wrist.refStyle != 'dual_layer' && wrist.rSize == e.ref_size_id && e.no_layers == 1){
			tdraw = true;
		}
		
		if(tdraw){
			//console.log(getTypeName(e.ref_type_id))
			if(wrist.text_color ==1){
				tx = tx.replace(/#TextDrp#/g, txTxtDrp);
				xtxt = createTextColorDrp(e.title);
				tx = tx.replace(/#addOpt#/g, xtxt);
			}else{
				tx = tx.replace(/#TextDrp#/g, "");
			}
			txBtype = txBtype.replace(/#typeName#/g, getTypeName(e.ref_type_id));
			tx = tx.replace(/#bandclass#/g, 'NorBands');
			tx = tx.replace(/#title#/g, e.title);
			tx = tx.replace(/#Cbtn#/g, '');
			tx = tx.replace(/#img#/g, e.image);
			tx = tx.replace(/#customImage#/g, "normalImage");
			tx = tx.replace(/#metallic#/g, e.metallic_color);
			tx = tx.replace(/#refType#/g, e.ref_type_id);
			tx = tx.replace(/#refID#/g, e.color_id);
			tx = tx.replace(/#colorcode#/g, e.hex_color_code);
			tx = tx.replace(/#PMSBOX#/g, txBtype);
			tstr = tstr + tx;
		}
	});	
	*/
	
	//if(tstr != ""){$('.Cfill').html(tstr);}
	if(wrist.refStyle != 'dual_layer'){ /*createCustom(1);*/ $('.colorsSel, .btnAddMore').show();}else{$('.colorsSel, .btnAddMore').hide(); }
	if(wrist.text_color == 1){$('.page.order-page .select-wristband-color .product-info .porduct-item .product .to-highlight').css('height','308px');}
	autoFillSet();
}


function autoFillGet(){
autofill = {txtQty:{val:[],refname:[],reft:[],reftype:[]},drpColor:{val:[],refname:[],reft:[],reftype:[],other: []}};

$('.txtQty').each(function(){
var txt = $(this);
    if(txt.val()!==''){
        autofill.txtQty.val.push(txt.val());
        autofill.txtQty.refname.push(txt.attr('refname'));
        autofill.txtQty.reft.push(txt.attr('reft'));
		autofill.txtQty.reftype.push(txt.attr('reftype'));
    }
});

$('.drpColor').each(function(){
var drp = $(this);
    if(drp.val()!==''){
        autofill.drpColor.val.push(drp.val());
        autofill.drpColor.refname.push(drp.attr('refname'));
        autofill.drpColor.reft.push(drp.attr('reft'));
		autofill.drpColor.reftype.push(drp.attr('reftype'));
        var oth = { refname:'',reft:'',reftype:'',ref:'',val:'' };
        if(drp.val() == 'Other'){
        var refid = drp.attr('refid');
        var other = $('.txtOther[refid="'+ refid +'"][reft="'+ drp.attr('reft') +'"]');
            oth.refname = other.attr('refname');
            oth.reft = other.attr('reft');
            oth.ref = other.attr('ref');
			oth.reftype = other.attr('reftype');
            oth.val = other.val();
        }
        autofill.drpColor.other.push(oth);
    }
})
}
function autoFillSet(){
$.each(autofill.txtQty.val,function(i,e){
    var refname = autofill.txtQty.refname[i];
    var reft = autofill.txtQty.reft[i];
	 var reftype = autofill.txtQty.reftype[i];
    var val = autofill.txtQty.val[i];
	tUID = $('.txtQty[refname="'+ refname +'"][reft="'+ reft +'"][reftype="'+ reftype +'"]');
    tUID.val(val);
	setColorBoxSelected(tUID);
});
$.each(autofill.drpColor.val,function(i,e){
    var refname = autofill.drpColor.refname[i];
    var reft = autofill.drpColor.reft[i];
	var reftype = autofill.drpColor.reftype[i];
    var val = autofill.drpColor.val[i];
    $('.drpColor[refname="'+ refname +'"][reft="'+ reft +'"][reftype="'+ reftype +'"]').val(val);
    if(val == 'Other'){
    var other = autofill.drpColor.other[i];
        txt = $('.txtOther[refname="'+ refname +'"][reft="'+ reft +'"][reftype="'+ reftype +'"]');
		console.log(txt);
        txt.parent('div').show();
        txt.val(autofill.drpColor.other[i].val);
        txt.attr('ref',autofill.drpColor.other[i].ref);
    }
});
}


var gOtherTxt = false;
var cxid = 8000;
function createCustom(tn){
	var tstr, tx, txPms, txBtype, xtxt;
	tstr = "";xtxt="";
	//cImg = "wristbands/colors/custom.jpg";
	for(ti=1;ti<=tn;ti++){
		cxid = cxid + ti;
		tx = wrist.htmlColors;
		txPms = wrist.htmlPMS;
		txTxtDrp = wrist.htmlTxtDrp;
		tx = tx.replace(/#PMSBOX#/g, txPms);
		if(wrist.text_color==1){
			tx = tx.replace(/#TextDrp#/g, txTxtDrp);
			xtxt = createTextColorDrp('Custom');
			tx = tx.replace(/#addOpt#/g, xtxt);
		}else{
			tx = tx.replace(/#TextDrp#/g, "");
		}
		tx = tx.replace(/#bandclass#/g, 'CusBands');
		tx = tx.replace(/#title#/g, 'Custom');
		tx = tx.replace(/#Cbtn#/g, 'Cbtn');
		tx = tx.replace(/#img#/g, "custom.jpg");
		tx = tx.replace(/#customImage#/g, "customImage");
		tx = tx.replace(/#metallic#/g, "2");
		tx = tx.replace(/#refType#/g, "x");
		tx = tx.replace(/#refID#/g, cxid);
		tx = tx.replace(/#colorcode#/g, "ffffff");
		tstr = tstr + tx;
	}
	if(tstr != ""){$('.Cfill').prepend(tstr);}
	$('.custon-color input').unbind('focus');
	$('.pickcolor').unbind('click');
	
	$('body').on('focus', '.custon-color input', function() {
		gOtherTxt = false;
		openColorChart($(this));	
	}); 
	
	$('body').on('click', '.pickcolor', function() {
	
	    tthis = $(this).parents('.custon-color');
		tthis = tthis.find('.cmsColor');
		gOtherTxt = false;
		openColorChart(tthis);
	});
	
	/*
	$('.pickcolor').on('click',function(){
			tthis = $(this).parents('.custon-color');
			tthis = tthis.find('.cmsColor');
			gOtherTxt = false;
			openColorChart(tthis);
	});
	*/
}

$('body').on('focus', '.custon-color input', function() {
	gOtherTxt = false;
	openColorChart($(this));	
});

$('body').on('click', '.pickcolor', function() {
	
    tthis = $(this).parents('.custon-color');
	tthis = tthis.find('.cmsColor');
	gOtherTxt = false;
	openColorChart(tthis);
});

function createTextColorDrp(cur){
var str = '';
$(wrist.text).each(function(i,e){
	if(e.colorTitle !== cur && e.colorTitle !== cur + ' Glitter'){
		tx = 1;
		if(wrist.refStyle != "color_filled" && e.metallic_color == 3){
			tx = 0;
		}else if(wrist.refStyle == "color_filled" && e.metallic_color == 3 && wrist.refSize == 'inch_1_4'){
			tx = 0 ;	
		} 
		if(tx == 1){
		str += '<option ref="'+ e.colorCode +'" style="background-color: #E8E8E8;color:#'+ e.colorCode +'" metallic="'+ e.metallic_color +'">'+ e.colorTitle +'</option>';
		}
	}
});
str += '<option style="background-color: #B3B2B2;color:#000000">Other</option>';
return str;
}

$('.Cfill .to-highlight select').on('change',function(){
if($(this).val() == 'Other'){
   $(this).next('.other').fadeIn(800);
   gOtherTxt = true;
	openColorChart($(this).next('.other').children('input'),1);
	//$('.csType').hide();
	//eventForSelBox();
}else{
   $(this).next('.other').fadeOut(300);
   $(this).next('.other').val('');
   changeBandText();
   calculatePrice();
   var refid = $(this).attr('refid');
	$('.txtQty[refid="'+ refid +'"]').each(function(){
		if($(this).val()!=''){
			changeStyle($(this));
			return false;
		}
	});
   //eventForSelBox();
}
});

$('.Cfill .to-highlight select').on('change',function(){
	var refid = $(this).attr('refid');
	var reft = $(this).attr('reft');
	var txtqty = $('.txtQty[refid="'+refid+'"][reft="'+ reft +'"]').val();
	if(txtqty){
	wrist.curFont.color = $(this).find('option:selected').attr('ref');
	changeBandText();
	calculatePrice();
    }
	$(this).removeClass('error');
});


function getTypeName(tid){
	if(tid == 1 || tid == 'x'){
		return "Solid";
	}else if(tid == 2){
		return "Segmented";
	}else if(tid == 3){
		return "Swirl";
	}else if(tid == 4){
		return "Glow";
	}else if(tid == 5){
		return "Dual Layer";
	}
	
}

$('input[type="radio"][name="msgStyle"]').on('click',function(){
	$('.wristForm p span label.checked').removeClass('checked');
	changeMessageStyle($(this))
});
function changeMessageStyle(chkstyle){
	chkstyle.next('label').addClass('checked');
    $('.frontMsg').attr('class','frontMsg '+chkstyle.val());

    if(chkstyle.val() == 'continuous'){
		$('.wristForm .form td.center').addClass('conti');
		$('.rightLabelLogo').hide(800);
		$('#fronttxtmsg').attr('placeholder','Enter Continuous Message');
		$('#backtxtmsg').val('');
        $('.back_msg_con').hide();
        $('.lblMsgStyle').html('Continuous');
        $('.backClipart').hide();
        $('.wristForm .clipart li a#dropSmenu').attr('default','Start Clipart');
        $('.wristForm .clipart li a#dropSmenu').html('<img height="27px;"><small>Start Clipart</small><span></span>');
        $('.wristForm .clipart li a#dropSmenu').removeAttr('title');
        $('.wristForm .clipart li a#dropSmenu').removeAttr('ref');
        $('.wristForm .clipart li a#dropEmenu').attr('default','End Clipart');
        $('.wristForm .clipart li a#dropEmenu').html('<img height="27px;"><small>End Clipart</small><span></span>');
        $('.wristForm .clipart li a#dropEmenu').removeAttr('title');
        $('.wristForm .clipart li a#dropEmenu').removeAttr('ref');
        $('.bandPreview tr td.backMsg').hide();
        wrist.frontMessage = 'CONTINUOUS MESSAGE';
    }else{
		$('.wristForm .form td.center').removeClass('conti');
		$('.rightLabelLogo').show(300);
		$('#fronttxtmsg').attr('placeholder','Enter Front Message');
        wrist.frontMessage = 'FRONT MESSAGE';
        $('.bandPreview tr td.backMsg').show();
        $('.back_msg_con').show();
        $('.lblMsgStyle').html('Front');
        $('.backClipart').show();
        $('.wristForm .clipart li a#dropSmenu').attr('default','Front Start Clipart');
        $('.wristForm .clipart li a#dropSmenu').html('<img height="27px;"><small>Front Start Clipart</small><span></span>');
        $('.wristForm .clipart li a#dropEmenu').attr('default','Front End Clipart');
        $('.wristForm .clipart li a#dropEmenu').html('<img height="27px;"><small>Front End Clipart</small><span></span>');
    }
    changeBandText();
}

function changeBandText(){
	createInternalMessage();   
	createBackMessage();
	createFrontMessage();
}
function getFmExtraPrice(){
var price=0;
if($('#fronttxtmsg').val().length > FM_LIMIT){
	$('.extraFrontMsg').fadeIn(800);
	price = wrist.extraData.front_msg_extra;
}else{
	$('.extraFrontMsg').fadeOut(300);
}
$('.fmExtraPrice').html('(+'+ price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}
function getBmExtraPrice(){
var price=0;
if($('#backtxtmsg').val().length > 0){
	$('.extraBackMsg').fadeIn(800);
	price = wrist.extraData.back_msg;
}else{
	$('.extraBackMsg').fadeOut(300);
}
$('.bmExtraPrice').html('(+'+ price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}
function getBmExtraPrice2(){
var price=0;
if($('#backtxtmsg').val().length > BM_LIMIT){
	$('.extraBackMsg2').fadeIn(800);
	price = wrist.extraData.back_msg_extra;
}else{
	$('.extraBackMsg2').fadeOut(300);
}
$('.bmExtraPrice2').html('(+'+ price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}
function getImExtraPrice(){
var price=0;
if($('#txtinternal').val().length > 0 && $('#txtinternal').val()!=ADVERT_MSG){
	$('.extraIntMsg').fadeIn(800);
	price = wrist.extraData.internal_msg;
}else{
	$('.extraIntMsg').fadeOut(300);
}
$('.imExtraPrice').html('(+'+ price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}
function getImExtraPrice2(){
var price=0;
if($('#txtinternal').val().length > BM_LIMIT && $('#txtinternal').val()!=ADVERT_MSG){
	$('.extraIntMsg2').fadeIn(800);
	price = wrist.extraData.internal_msg_extra;
}else{
	$('.extraIntMsg2').fadeOut(300);
}
$('.imExtraPrice2').html('(+'+ price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}

$('#fronttxtmsg').on('keyup',function(){
   createFrontMessage();
   calculatePrice();
});
$('#backtxtmsg').on('keyup',function(){
   createBackMessage();
   calculatePrice();
});
$('#txtinternal').on('keyup',function(){
   createInternalMessage();
   calculatePrice();
});

$('#drpProdTime,#drpShipTime,#drpDigital,#chkAdvertise,#chkKeychain,#chkWrapped').on('change', calculatePrice);

function createFrontMessage(){
	
    var font = wrist.curFont.ref;
    var effect = wrist.refStyle;
    var color = wrist.curFont.color;

    if($('#fronttxtmsg').val() != ''){
        wrist.frontMessage = encodeURIComponent($('#fronttxtmsg').val());
    }else{
        wrist.frontMessage = ($('input[type="radio"][name="msgStyle"]:checked').val()=='continuous')?'CONTINUOUS MESSAGE':'FRONT MESSAGE';
    }
    var text = wrist.frontMessage;
    var html = '<img src="'+DIR_FONT+'&size='+ FONT_SIZE +'&name='+font+'&effect='+ effect +'&color='+ color +'&text='+ text +'" class="txtmsg" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />';
    $('.bandPreview tr td.frontMsg .innerTbl .tdcenter').html(html);
	frontStartClipart();
	frontEndClipart();
	
	$('.bandPreview tr td.frontMsg .innerTbl .tdcenter .txtmsg').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});
	setTimeout(function(){$('.bandPreview tr td.frontMsg .innerTbl .tdcenter .txtmsg').fadeIn(800)},5000);
	
}
function createBackMessage(){
    var font = wrist.curFont.ref;
    var color = wrist.curFont.color;
    var effect = wrist.refStyle;
    if($('#backtxtmsg').val()!=''){
        wrist.backMessage = encodeURIComponent($('#backtxtmsg').val());
    }else{
        wrist.backMessage = 'BACK MESSAGE';
    }
    var text = wrist.backMessage;
    var html = '<img src="'+DIR_FONT+'&size='+ FONT_SIZE +'&name='+font+'&effect='+ effect +'&color='+ color +'&text='+ text +'" class="txtmsg" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />';
    $('.bandPreview tr td.backMsg .innerTbl .tdcenter').html(html);
	backStartClipart();
	backEndClipart();

	$('.bandPreview tr td.backMsg .innerTbl .tdcenter .txtmsg').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});	
}

function createPager(){
	var xstyle = wrist.refStyle;
	var ntimes = 0;
	var pager = '';
	pager += '<ul>';
	var img_src;
	$('.Cfill input.txtQty').each(function(){
		var val = $(this).val()*1;
		if(val!=''){
		var color = $(this).attr('ref');
		var reft = $(this).attr('reft');
		var reftype = $(this).attr('reftype');
		reftype = getTypeName(reftype).toLowerCase();
		txtcolor = getAdjustColor($(this));
		txtcolor = (txtcolor)?txtcolor:'000000';
		
		var custColor = getCustomColor($(this));
		if(custColor){
			color = custColor;
		}
		
		if(xstyle == 'dual_layer'){
			var arr = color.split(',');
			wrist.curFont.color = arr[1];
			color = arr[0];
			txtcolor = arr[1];
			changeBandText();
		}
		img_src = DIR_GD_STYLE+'&style='+reftype+'&color='+color;
pager+= '<li><a href="javascript:void(0);" reft="'+ reft +'" title="'+ val +'-'+ reft +'" txtcolor="'+ txtcolor +'"><em style="color:#'+ txtcolor +'">'+ reft.substr(0,1) +'</em><img src="'+img_src+'" alt="'+ val +'"><span style="color:#'+ txtcolor +'">['+ val +']</span></a></li>';
		
		++ntimes;
		}
	});
	pager += '</ul>';
	$('.wristPager').html(pager);
	updatePagerForFree(ntimes);
/*	if(img_src){
	$('.bandPreview').css('background-image','url("'+img_src+'")');
	}else{
	$('.bandPreview').css('background-image','none');
	}*/
}

function updatePagerForFree(ntimes){
	totalQty = wrist.totalQty;
    if(totalQty >= QTY_LIMIT){
        var totalFree = FREE_QTY;
        var d = Math.floor(totalFree/ntimes);
        var dif = totalFree - (d*ntimes);
        for(var i=0; i<ntimes; i++){
            var anchor = $('.wristPager ul li:eq('+i+') a');
             var title = anchor.attr('title');
            if(i == 0){ //  adjustment to first item
                title += ' [+'+ (dif+d) +' FREE]';
                anchor.append('<i><u>FREE</u> +'+ (dif+d) +'</i>');
            }else{
                title += ' [+'+d+' FREE]';
                anchor.append('<i>+'+ d +'</i>');
            }
            anchor.attr('title',title);
        }
    }
}

$('body').on('click', '.wristPager ul li a', function() {

	$('.wristPager ul li img').removeClass('cur');
	var img = $(this).find('img').addClass('cur');
	wrist.curFont.color = $(this).attr('txtcolor');
	$('.bandPreview').css('background-image','url("'+img.attr('src')+'")');
	changeBandText();
});
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

function createInternalMessage(){
    var font = '4897462015-03-27arialbd.ttf';
    var effect = 'embossed';
    if($('#txtinternal').val()!=''){
        wrist.internalMessage = encodeURIComponent($('#txtinternal').val());
    }else{
        wrist.internalMessage = 'INTERNAL MESSAGE';
    }
    var text = wrist.internalMessage;
    var html = '<img src="'+DIR_FONT+'&size='+ FONT_SIZE +'&name='+font+'&effect='+ effect +'&text='+ text +'" class="txtmsg" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />';
    $('.bandPreview tr td.interMsg').html(html);
		
	$('.bandPreview tr td.interMsg .txtmsg').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});
}

function frontStartClipart(){

	wrist.curClipart.fs.title = $('#dropSmenu').attr('title');
	wrist.curClipart.fs.src = $('#dropSmenu').attr('ref');
	wrist.curClipart.fs.ref_id = $('#dropSmenu').attr('reft');
	var color = wrist.curFont.color;
	var art = wrist.curClipart.fs.src;
	var effect = wrist.refStyle;
	
	var html = (art)?'<img src="'+ DIR_GD_CLIPART +'&effectClipart='+effect+'&name='+ art +'&color='+color+'" class="art" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />':'';
	$('.bandPreview tr td.frontMsg .innerTbl .tdleft').html(html);
	
	$('.bandPreview tr td.frontMsg .innerTbl .tdleft .art').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});	
}
function frontEndClipart(){
	wrist.curClipart.fe.title = $('#dropEmenu').attr('title');
	wrist.curClipart.fe.src = $('#dropEmenu').attr('ref');
	wrist.curClipart.fe.ref_id = $('#dropEmenu').attr('reft');
	var color = wrist.curFont.color;
	var art = wrist.curClipart.fe.src;
	var effect = wrist.refStyle;
	var html = (art)?'<img src="'+ DIR_GD_CLIPART +'&effectClipart='+effect+'&name='+ art +'&color='+color+'" class="art" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />':'';
	$('.bandPreview tr td.frontMsg .innerTbl .tdright').html(html);
	$('.bandPreview tr td.frontMsg .innerTbl .tdright .art').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});
}
function backStartClipart(){
	wrist.curClipart.bs.title = $('#dropBSmenu').attr('title');
	wrist.curClipart.bs.src = $('#dropBSmenu').attr('ref');
	wrist.curClipart.bs.ref_id = $('#dropBSmenu').attr('reft');
	var color = wrist.curFont.color;
	var art = wrist.curClipart.bs.src;
	var effect = wrist.refStyle;
	var html = (art)?'<img src="'+ DIR_GD_CLIPART +'&effectClipart='+effect+'&name='+ art +'&color='+color+'" class="art" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />':'';
	$('.bandPreview tr td.backMsg .innerTbl .tdleft').html(html);
	$('.bandPreview tr td.backMsg .innerTbl .tdleft .art').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});
}
function backEndClipart(){
	wrist.curClipart.be.title = $('#dropBEmenu').attr('title');
	wrist.curClipart.be.src = $('#dropBEmenu').attr('ref');
	wrist.curClipart.be.ref_id = $('#dropBEmenu').attr('reft');
	var color = wrist.curFont.color;
	var art = wrist.curClipart.be.src;
	var effect = wrist.refStyle;
	var html = (art)?'<img src="'+ DIR_GD_CLIPART +'&effectClipart='+effect+'&name='+ art +'&color='+color+'" class="art" style="display:none;" /><img src="' + HTTP_SERVER + '/wristbandnew/img/wload.gif" class="wload" />':'';
	$('.bandPreview tr td.backMsg .innerTbl .tdright').html(html);
	$('.bandPreview tr td.backMsg .innerTbl .tdright .art').load(function(e){
		$(this).next('.wload').remove();
		$(this).fadeIn(800);
	});	
}
function changeBandText(){
	createInternalMessage();   
	createBackMessage();
	createFrontMessage();
}

function hideShowMinQty(){
	//console.log(wrist.refMinQty+' - '+wrist.totalQty+' - '+QTY_LIMIT);
	if(wrist.refMinQty>1 && wrist.totalQty<QTY_LIMIT){
		$('.minQtyValue').html(wrist.refMinQty);
		$('.minQty').show();
	}else{
		$('.minQty').hide();
	}
}
function checkFreeQty(){
    if(wrist.totalQty>=QTY_LIMIT && !express){
			if(wrist.refSize == 'inch_1_5' || wrist.refSize == 'inch_2'){
				FREE_QTY = 100;
				FREE_QTY_TXT = ' + 100 FREE';
			}else{
				FREE_QTY = 100;
				FREE_QTY_TXT = ' + 100 FREE';
			}
			GIFT_QTY = 100;
            $('.freeQty').html(FREE_QTY_TXT);
            $('.freeQty').show();
    }else{
			GIFT_QTY = "";
            $('.freeQty').html('');
            $('.freeQty').hide();
    }
}
function getShipPrice(ship_id){
var qty_id = getClosetQty(wrist.prodShipQty,wrist.totalQty);
var price;
//console.log(wrist.rStyle+' - '+wrist.rSize+' - '+wrist.pvType+' - '+qty_id.quantity_id+' - '+ship_id);
$(wrist.shipPrice).each(function(i,e){
	if(e.style_id == wrist.rStyle && e.size_id == wrist.rSize && e.type_id == wrist.pvType && e.qty_id == qty_id.quantity_id && e.ship_id == ship_id){
	price = e.price;
	return false;
	}
});
return price;
}

var shipIndex = 0;
function setShipDrp(){
var str = '';
	shipIndex = $('#drpShipTime option:selected').index();
	str += '<option value="" ref="0">Please Select Shipping</option>';
$(wrist.shipping).each(function(i,e){
	var price = getShipPrice(e.shipping_id);
	var str_price = (price==0.00)?'Free':'$'+price;
	if(wrist.totalQty >= 100 && e.ship_days == 6){
		var tpr = price - 1;
		tpr = tpr.toFixed(2);
		if(wrist.refStyle == 'color_filled' || wrist.refStyle == 'printed'){
			str += '<option value="5" ref="'+ price +'">5 Days ('+ str_price +')</option>';	
		}else{
			//str += '<option value="7" ref="'+ tpr +'">7 Days ($'+ tpr +')</option>';
			str += '<option value="'+ e.ship_days +'" ref="'+ price +'">'+ e.ship_title +' ('+ str_price +')</option>';
			
		}
		
	}else if(wrist.refStyle == 'embossed_printed' && e.ship_days == 1){
		str += '';
	}else if(wrist.refStyle == 'debossed' && (wrist.totalQty >= 1 && wrist.totalQty <= 500)  && e.ship_days == 1){
		tstr_price = parseFloat(price) * 2;
		tstr_price = tstr_price.toFixed(2);
		str += '<option value="'+ e.ship_days +'" ref="'+ price +'">'+ e.ship_title +' ('+ str_price +')</option>';
		str += '<option value="0" ref="'+ tstr_price +'">1/2 Day ($'+ tstr_price +')</option>';
	}else if(wrist.refStyle != 'debossed' && (wrist.totalQty >= 1 && wrist.totalQty <= 99)  && e.ship_days == 1){
		tstr_price = parseFloat(price) * 2;
		tstr_price = tstr_price.toFixed(2);
		str += '<option value="'+ e.ship_days +'" ref="'+ price +'">'+ e.ship_title +' ('+ str_price +')</option>';
		str += '<option value="0" ref="'+ tstr_price +'">1/2 Day ($'+ tstr_price +')</option>';
	}else{
		str += '<option value="'+ e.ship_days +'" ref="'+ price +'">'+ e.ship_title +' ('+ str_price +')</option>';
	}
});
$('#drpShipTime').html(str);
$('#drpShipTime option:eq('+ shipIndex +')').attr('selected','selected');
wrist.curShipping.day = $('#drpShipTime option:eq('+ shipIndex +')').attr('value');
wrist.curShipping.price = $('#drpShipTime option:eq('+ shipIndex +')').attr('ref');
wrist.curShipping.text = $('#drpShipTime option:eq('+ shipIndex +')').text();
}

function getProdPrice(prod_id){
var qty_id = getClosetQty(wrist.prodShipQty,wrist.totalQty);
var price;
$(wrist.prodPrice).each(function(i,e){
	if(e.style_id == wrist.rStyle && e.size_id == wrist.rSize && e.type_id == wrist.pvType && e.qty_id == qty_id.quantity_id && e.prod_id == prod_id){
	price = e.price;
	return false;
	}
});
return price;
}
var prodIndex = 0;
function setProdDrp(){
var str = '';
	prodIndex = $('#drpProdTime option:selected').index();
	str += '<option value="" ref="0">Please Select Production</option>';
	//console.log(e.production_id);
$(wrist.production).each(function(i,e){
	var price = getProdPrice(e.production_id);
	var str_price = (price==0.00)?'Free':'$'+price;
	if(wrist.refStyle == 'embossed_printed' && e.prod_days == 1){
		str += '';
	}else if(wrist.refStyle == 'debossed' && (wrist.totalQty >= 1 && wrist.totalQty <= 500)  && e.prod_days == 1){
		tstr_price = parseFloat(price) * 2;
		tstr_price = tstr_price.toFixed(2);
		str += '<option value="'+ e.prod_days +'" ref="'+ price +'">'+ e.prod_title +' ('+ str_price +')</option>';
		str += '<option value="0" ref="'+ tstr_price +'">1/2 Day ($'+ tstr_price +')</option>';
	}else if(wrist.refStyle != 'debossed' && (wrist.totalQty >= 1 && wrist.totalQty <= 99)  && e.prod_days == 1){
		tstr_price = parseFloat(price) * 2;
		tstr_price = tstr_price.toFixed(2);
		str += '<option value="'+ e.prod_days +'" ref="'+ price +'">'+ e.prod_title +' ('+ str_price +')</option>';
		str += '<option value="0" ref="'+ tstr_price +'">1/2 Day ($'+ tstr_price +')</option>';
	}else{
		str += '<option value="'+ e.prod_days +'" ref="'+ price +'">'+ e.prod_title +' ('+ str_price +')</option>';
	}
	//str += '<option value="'+ e.prod_days +'" ref="'+ price +'">'+ e.prod_title +' ('+ str_price +')</option>';
});
$('#drpProdTime').html(str);
$('#drpProdTime option:eq('+ prodIndex +')').attr('selected','selected');
wrist.curProduction.day = $('#drpProdTime option:eq('+ prodIndex +')').attr('value');
wrist.curProduction.price = $('#drpProdTime option:eq('+ prodIndex +')').attr('ref');
wrist.curProduction.text = $('#drpProdTime option:eq('+ prodIndex +')').text();
}

function calculatePrice(){
	
	getTotalQuantity();	
	setProdDrp();
	setShipDrp();
	setPrice();
	calculateDate();
	hideShowMinQty();
	checkFreeQty();
	checkExtraQty(); 
	checkInternalMsg();
	createPager();
	checkBlank();
	renameSteps();
	changePreviewNote();
}

function getBandPrice(){
var qty_id = getClosetQty(wrist.priceQty,wrist.totalQty);
var price;
BandUnitPrice = 0;
//console.log(wrist.rStyle+' - '+wrist.rSize+' - '+wrist.pvType+' - '+qty_id.quantity_id);
$(wrist.bandPrice).each(function(i,e){
	if(e.style_id == wrist.rStyle && e.size_id == wrist.rSize && e.type_id == wrist.pvType && e.qty_id == qty_id.quantity_id){
	price = e.price;
	return false;
	}
});
if(wrist.totalQty > 0){BandUnitPrice = price;}
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}

function getMetallicPrice(){
var metalCost = 0;
if(wrist.metallicFee){
var metallicQty = 0;
var refid = [];
$('.Cfill input.txtQty[metallic="1"]').each(function(){
   if($(this).val()!=''){
       metallicQty += ($(this).val()*1);
       refid.push($(this).attr('refid'));
   }
});
var farr = {price:0,qty:0};
$(wrist.metallicFee).each(function(i,e){
    if(metallicQty<e.qty){
	var d = (i-1);
	d = (d<=0)?0:d;
	farr = wrist.metallicFee[d];
	return false;
    }else{
	farr = wrist.metallicFee[i];
    }
});
refid = unique(refid);
$('.porduct-item .metallicFee').remove();
$(refid).each(function(i,e){
    $('.porduct-item[refid="'+ e +'"]').prepend('<span class="metallicFee">(+$'+ farr.price +'/each)</span>');
});
metalCost = metallicQty*farr.price;
}
return checkNan(metalCost);
}
function getMetallicTextPrice(){
var metalCost = 0;
if(wrist.metallicFee){
var metalTextQty = 0;
var arrid = [];
$('.Cfill select.drpColor').each(function(){
    if($(this).val()!=''){
    var refid = $(this).attr('refid');
    var reft = $(this).attr('reft');
    var txtQty = $('.txtQty[refid="'+ refid +'"][reft="'+ reft +'"]');
    if(txtQty.val()!=''){
        var opt = $(this).find('option:selected');
        if(opt.attr('metallic') == 1){
            metalTextQty += (txtQty.val()*1);
            arrid.push(refid);
        }
    }
    }
});
var farr = {price:0,qty:0};
$(wrist.metallicFee).each(function(i,e){
    if(metalTextQty<e.qty){
	var d = (i-1);
	d = (d<=0)?0:d;
	farr = wrist.metallicFee[d];
	return false;
    }else{
	farr = wrist.metallicFee[i];
    }
});
arrid = unique(arrid);
$('.porduct-item .metallicTextFee').remove();
$(arrid).each(function(i,e){
    $('.porduct-item[refid="'+ e +'"]').prepend('<span class="metallicTextFee">(+$'+ farr.price +'/each)</span>');
});
metalCost = metalTextQty*farr.price;
}
return checkNan(metalCost);
}

function getGlitterTextPrice(){
var metalCost = 0;
if(wrist.glitterTextFee){
var metalTextQty = 0;
var arrid = [];
$('.Cfill select.drpColor').each(function(){
    if($(this).val()!=''){
    var refid = $(this).attr('refid');
    var reft = $(this).attr('reft');
    var txtQty = $('.txtQty[refid="'+ refid +'"][reft="'+ reft +'"]');
    if(txtQty.val()!=''){
        var opt = $(this).find('option:selected');
        if(opt.attr('metallic') == 3){
            metalTextQty += (txtQty.val()*1);
            arrid.push(refid);
        }
    }
    }
});
var farr = {price:0,qty:0};
$(wrist.glitterTextFee).each(function(i,e){
    if(metalTextQty<e.qty){
	var d = (i-1);
	d = (d<=0)?0:d;
	farr = wrist.glitterTextFee[d];
	return false;
    }else{
	farr = wrist.glitterTextFee[i];
    }
});
arrid = unique(arrid);
$('.porduct-item .glitterTextFee').remove();
$(arrid).each(function(i,e){
    $('.porduct-item[refid="'+ e +'"]').prepend('<span class="glitterTextFee">(+$'+ farr.price +'/each)</span>');
});
metalCost = metalTextQty*farr.price;
}
return checkNan(metalCost);
}


function calculateDate(){
if($('#drpProdTime').val()!='' || $('#drpShipTime').val()!=''){
var total_days = ($('#drpProdTime').val()*1) + ($('#drpShipTime').val()*1);
express = false;
if(total_days == 0){
	express = true;	
}
wrist.deliveryDate = getDeliveryDate(total_days);
$('.deliverDate').html(wrist.deliveryDate);
}
}
function setPrice(){
var price = 0.00;
price += (getBandPrice()*1);
price += (getMetallicPrice()*1);
price += (getMetallicTextPrice()*1);
price += (getGlitterTextPrice()*1);
price += (getFmExtraPrice()*1);
price += (getBmExtraPrice()*1);
price += (getBmExtraPrice2()*1);
price += (getImExtraPrice()*1);
price += (getImExtraPrice2()*1);
price += (getShipProdPrice()*1);
price += (getKeyChainPrice()*1);
price += (getWarppedPrice()*1);
price += (getClipartPrice()*1);
price += (getDigitalPrice()*1);
price += (getColorFee()*1);
price += (getMoldFee()*1);
price -= (getAdvertisePrice()*1);
if(isNaN(price) || price<=0){
	price = 0.00;
}
	price=price.toFixed(2);
	wrist.totalPrice = price;
	$('.wristPrice').html(price);
        $('.txtSales').val(price);
        $('.txtSales').attr('ref',price);
		
	if(pv1QtyLogic){
		$('.wristPrice').html(pvprice);
		wrist.totalPrice = pvprice;
		$('#drpShipTime').find('option:selected').html('6 Days (Free)');
		//SUBMIT_FORM = false;
	}
}


function getTotalQuantity(){
var qty = 0;
wrist.pvType = 1;
$('body').data("typeQtys", {});
$('input.txtQty').each(function(){
	tqty = $(this).val()*1;
	ttype = $(this).attr('reftype')*1;
	qty += tqty;
	if(tqty > 0){
		if($('body').data('typeQtys')[ttype] == undefined){
			$('body').data('typeQtys')[ttype] = tqty;	
		}else if(ttype != undefined){
			$('body').data('typeQtys')[ttype] += tqty;	
		}
	}
	if(wrist.pvType < ttype && tqty > 0){
		wrist.pvType = ttype;
	}
});
wrist.totalQty = qty;
$('.wristQty').html(qty);
wrist.extraData = getExtraData();

}


function getClosetQty(arr,qty){
var farr;
$(arr).each(function(i,e){
if(qty<e.qty_value){
	var d = (i-1);
	d = (d<=0)?0:d;
	farr = arr[d];
	return false;
}else{
	farr = arr[i];
}
});
return farr;
}

function getExtraData(){
var price;
var qty_id = getClosetQty(wrist.extraQty,wrist.totalQty);

//console.log(wrist.rStyle+' -- '+wrist.rSize+' -- '+wrist.pvType+' -- '+qty_id.quantity_id);
$(wrist.otherPrice).each(function(i,e){
if(e.style_id == wrist.rStyle && e.size_id == wrist.rSize && e.type_id == wrist.pvType && e.qty_id == qty_id.quantity_id){
	price = e;return false;}
});
return price;
}
var pv1QtyLogic = false;
$('input.txtQty').on('keyup',function(){
	
	var val = parseInt($(this).val()*1);
	$(this).val(val);
	if(val<=0 || isNaN(val)){
        $(this).val('') 
	}
	$(this).removeClass('error');
	if(($(this).val()*1)>0){
		ttype = ($(this).attr('reftype')*1);
		setColorBoxSelected($(this));
		changeStyle($(this));
		if(!$('input[name=rSize]').is(':checked')){
			/*$('.box .wSize input[name="rSize"][ref="regular_size"]').prop('checked',true);
			$('.box .wSize input[name="rSize"][ref="regular_size"]').closest('li').addClass('selected');*/
			wrist.refSize = 'regular_size';
			wrist.refSizeTitle = "1/2 Inch";
			wrist.refType = 'solid';
			wrist.refTypeTitle = "Solid";
			wrist.rType = '1';
		}
	
	}
		// temp code
		wrist.refType = 'solid';
		wrist.refTypeTitle = "Solid";
		wrist.rType = '1';
	if(pv1QtyLogic){
		pv1QtyLogic = false;
		SUBMIT_FORM = true;
	}
	calculatePrice();
});

function setColorBoxSelected(tthis){
	if(tthis.parents('.product').hasClass('xselected') == false){
			tthis.parents('.product').addClass('xselected');
			tthis.parents('.text-holder').find('.ffRadioWrapper').addClass('on');
	}
}

$('.Cfill .product .ffRadioWrapper').on('click', function(){
	tthis = $(this);
	setColorBoxSelected(tthis);
	tthis.parents('.text-holder').find('input[type=text][reft=Adult]').focus();	
});

function changeStyle(txtQty){
	//var style = wrist.refType;
	var xstyle = wrist.refStyle;
	var style = txtQty.attr('reftype');
	style = getTypeName(style).toLowerCase();
	var color = txtQty.attr('ref');
	var txtcolor = getAdjustColor(txtQty);
	txtcolor = (txtcolor)?txtcolor:'000000';
	var custColor = getCustomColor(txtQty);
	if(custColor){
		color = custColor;
	}
	wrist.curFont.color = txtcolor;
	if(xstyle == 'dual_layer'){
		var arr = color.split(',');
		wrist.curFont.color = arr[1];
		color = arr[0];
	}
	changeBandText();
	$('.bandPreview').css('background-image','url("'+DIR_GD_STYLE+'&style='+style+'&color='+color+'")');
}

function getAdjustColor(txtQty){
var reft = txtQty.attr('reft');
var refid = txtQty.attr('refid');
var drpColor = $('.drpColor[refid="'+ refid +'"][reft="'+ reft +'"]');
var txtcolor;
if(drpColor.val()!=''){
	txtcolor = drpColor.find('option:selected').attr('ref');
if(drpColor.val() == 'Other'){
	txtcolor = $('.txtOther[refid="'+ refid +'"][reft="'+ reft +'"]').attr('ref');
}
}
return txtcolor;
}
function getCustomColor(inp){
	var refid = inp.attr('refid');
	var ref = inp.attr('ref');
	var color;
	if(ref=='custom'){
		color = $('.txtPms[refid="'+ refid +'"]').attr('ref');
	}
	return color;
}

function checkInternalMsg(){
    if(wrist.totalQty>=QTY_LIMIT && wrist.refStyle != 'dual_layer'){
        $('.internal_msg_con').show();
        $('.internalMsg').show();
    }else{
        $('.internal_msg_con').hide();
        $('.internalMsg').hide();
        $('#txtinternal').val('');
    }
}
function getColorFee(){
    var n_colors=[];
    $('.Cfill input.txtQty').each(function(){
        if($(this).val()){
            n_colors.push($(this).attr('ref'));
        }
    });
    n_colors = unique(n_colors);
    return (n_colors.length>1)?COLOR_FEE:0;
}
function getMoldFee(){
    var n_mold = 0;
    $('.Cfill input[name="txtAdult"]').each(function(){
        if($(this).val()){
            n_mold++;
            return false;
        }
    });
    $('.Cfill input[name="txtYouth"]').each(function(){
        if($(this).val()){
            n_mold++;
            return false;
        }
    });
    $('.Cfill input[name="txtToddler"]').each(function(){
        if($(this).val()){
            n_mold++;
            return false;
        }
    });

	return (n_mold-1)*MOLD_FEE;
}
function getShipProdPrice(){
var price = (($('#drpProdTime option:selected').attr('ref')*1)+($('#drpShipTime option:selected').attr('ref')*1)).toFixed(2);
return checkNan(price); 
}

function getDigitalPrice(){
return ($('#drpDigital').val()=='Yes')?DIGITAL_PRICE:0;
}
function getAdvertisePrice(){
    var adv_price = 0;
if(wrist.totalQty>=ADVERT_LIMIT && wrist.refStyle != 'dual_layer' && wrist.refStyle != 'blank' && ($('#txtinternal').val()=='' || $('#txtinternal').val() == ADVERT_MSG)){
	//$('.advertise').show(800);
        if($('#chkAdvertise').is(':checked')){
            adv_price = ADVERTISE_PRICE;
            $('#txtinternal').val(ADVERT_MSG);
        }else{
            $('#txtinternal').val('');
            adv_price = 0;
        }
        createInternalMessage();
	return adv_price;
}else{
	//$('.advertise').hide(300);
        createInternalMessage();
	return 0;
}
}
function checkFreeQty(){
    if(wrist.totalQty>=QTY_LIMIT && !express){
			if(wrist.refSize == 'inch_1_5' || wrist.refSize == 'inch_2'){
				FREE_QTY = 100;
				FREE_QTY_TXT = ' + 100 FREE';
			}else{
				FREE_QTY = 100;
				FREE_QTY_TXT = ' + 100 FREE';
			}
			GIFT_QTY = 100;
            $('.freeQty').html(FREE_QTY_TXT);
            $('.freeQty').show();
    }else{
			GIFT_QTY = "";
            $('.freeQty').html('');
            $('.freeQty').hide();
    }
}
function getClipartPrice(){
var price=0;
if(wrist.curClipart.fs.title || wrist.curClipart.fe.title || wrist.curClipart.bs.title || wrist.curClipart.be.title){
	$('.extraLogoMsg').fadeIn(800);
	price = wrist.extraData.logo;
}else{
	$('.extraLogoMsg').fadeOut(300);
}
$('.logoExtraPrice').html('(+'+ price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}

function checkDualLayer(){
	
    wrist.curFont.color = '222222';
/*   
if($('input[name=rStyle]:checked').attr('ref') == 'dual_layer'){
	//$('.wType li').hide();
	//$('.wType li a[ref="dual_layer"]').parent().show();
	$('input[name="rType"][ref="dual_layer"]').attr('checked','checked');
        //$('.step3').hide();        
       $('.wsize input[name="rSize"]').each(function(){
	       if($(this).attr('ref')=='inch_1_4' || $(this).attr('ref')=='inch_1_5' || $(this).attr('ref')=='inch_2'){
	          var sizeLi = $(this).parents('.wsize');
	          sizeLi.hide();
	       }
       });
}else{
	//$('.wType li').show();
	//$('.wType li a[ref="dual_layer"]').parent().hide();
	/*if($('input[name="rType"][ref="dual_layer"]').attr('checked')){
        $('input[name="rType"][ref="solid"]').attr('checked','checked');
	}*/
        //$('.step3').show();
      /*  $('.wsize').show();
}
*/
$('.bandPreview').css('background-image','none');
}

function checkBlank(){
    if(wrist.refStyle == 'blank'){
        $('.step5').hide();
        $('.blankComments').fadeIn(800);
        $('#fronttxtmsg').val('');
        $('#backtxtmsg').val('');
        $('#txtinternal').val('');
        wrist.curFont.title = '';
    }else{
        $('.step5').show();
        $('.blankComments').fadeOut(300);
        $('.blankComments textarea').val('');
    }
}
function renameSteps(){
    $('.sRename:visible').each(function(i){ 
        $(this).html(i+1);
    });
}

function changePreviewNote(){
if(wrist.refType == 'glow'){
    $('.previewHolder .note p.glow').show(800);
}else{
    $('.previewHolder .note p.glow').hide(300);
}
if(wrist.refStyle == 'embossed' || wrist.refStyle == 'debossed'){
    $('.previewHolder .note p.embossed').show(800);
}else{
    $('.previewHolder .note p.embossed').hide(300);
}
if(wrist.internalMessage!='' && wrist.internalMessage!='INTERNAL MESSAGE'){
    $('.previewHolder .note p.inter').show(800);
}else{
    $('.previewHolder .note p.inter').hide(300);
}
if(wrist.refType=='swirl'){
    $('.previewHolder .note p.swirl').show(800);
}else{
    $('.previewHolder .note p.swirl').hide(300);
}
if(wrist.curFont.title =='Use Custom Font'){
    $('.previewHolder .note p.customFont').show(800);
}else{
    $('.previewHolder .note p.customFont').hide(300);
}
if(wrist.totalQty<QTY_LIMIT && (wrist.refStyle == 'debossed' || wrist.refStyle == 'color_filled')){
    $('.previewHolder .note p.lessthan').show(800);
}else{
    $('.previewHolder .note p.lessthan').hide(300);
}
if(wrist.totalQty<QTY_LIMIT){
    $('.previewHolder .note p.freemsg').hide(800);
}else{
    $('.previewHolder .note p.freemsg').show(800);
}
if($('#chkKeychain').is(':checked')==true){
    $('.previewHolder .note p.keychain').show(800);
}else{
    $('.previewHolder .note p.keychain').hide(300);
}
}

function getKeyChainPrice(){
	var price=0;
	if(wrist.refSize=='regular_size' && wrist.refStyle!='dual_layer' && wrist.refStyle!='figured' && wrist.totalQty>=QTY_LIMIT){
		$('.keychainOption').show();
	if($('#chkKeychain').is(':checked')){
		$('.extraKeyChain').show();
		$('.keychainOption').addClass("keyDWid");
		$(".keyOptDiv").show();
		//setTimeout(function(){}, 1000);
		if($("input[name=keyOpt]").is(":checked")){
			price = wrist.extraData.keychain;
		}
	}else{
		$('.extraKeyChain').hide();
		$('input[name=keyOpt]').prop("checked", false);
		$(".keyOptDiv").hide();
		$('.keychainOption').removeClass("keyDWid");
	}
	$('.extraKeyChainPrice').html('(+$'+ price +'/each)');

	if($("#chkKeychain").is(":checked") && $("input[name=keyOpt]:checked").val() == "2" && $.trim($(".keyQty").val()) != ""){
		var tkeyQty = ($('.keyQty').val()*1);
		price = ((tkeyQty* BandUnitPrice) + (tkeyQty*price)).toFixed(2);
		//showGiftOptionAndRenameSteps();
	}else if($("#chkKeychain").is(":checked") && $("input[name=keyOpt]:checked").val() == "3" ){
		price = (100*price).toFixed(2);
		//hideGiftOptionAndRenameSteps();
	}else  if($("#chkKeychain").is(":checked") && $("input[name=keyOpt]:checked").val() == "1" ){
		tprice = (wrist.totalQty*price);
		if(GIFT_QTY == 100){
		 tprice = (GIFT_QTY*price) + tprice;
		}
		price = tprice.toFixed(2);
		//showGiftOptionAndRenameSteps();
	}
		if($("input[name=keyOpt]:checked")){
			$(".keychainOption .product").removeClass("error");	
		}
	}else{
		$('.keychainOption').hide();
		$('#chkKeychain').removeAttr('checked');
		$('.keyQty').val("");
		
	}
	return checkNan(price);
}


function checkExtraQty(){
	var ttQy = wrist.totalQty;
	if(GIFT_QTY == 100){
		ttQy = wrist.totalQty + GIFT_QTY;	
	}
	if(wrist.refSize == 'inch_3_4'){
		if(wrist.refStyle == 'debossed' || wrist.refStyle == 'embossed'){
			if(ttQy >115 && ttQy < 200){ ttQy = 200; }else if(ttQy >250 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >352 && ttQy < 400){ ttQy = 400;	}else if(ttQy >432 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >790 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1784 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2916 && ttQy < 3000){ ttQy = 3000; }else if(ttQy >4760 && ttQy < 5000){
				ttQy = 5000;	
			}else if(ttQy >8990 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19551 && ttQy < 20000){
				ttQy = 20000;	
			}
		}	
		
		if(wrist.refStyle == 'printed'){
			if(ttQy >129 && ttQy < 200){ ttQy = 200; }else if(ttQy >252 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >363 && ttQy < 400){ ttQy = 400;	 }else if(ttQy >450 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >879 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1870 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2922&& ttQy < 3000){ ttQy = 3000; }else if(ttQy >4911 && ttQy < 5000){
				ttQy = 5000;	
			}else if(ttQy >9828 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19451 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
		
		if(wrist.refStyle == 'color_filled'){
			if(ttQy >121 && ttQy < 200){ ttQy = 200; }else if(ttQy >253 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >359 && ttQy < 400){ ttQy = 400;	}else if(ttQy >442 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >797 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1794 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2931 && ttQy < 3000){ ttQy = 3000; }else if(ttQy >4764 && ttQy < 5000){
				ttQy = 5000;	
			}else if(ttQy >9422 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >18780 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
	}else{
		if(wrist.refStyle == 'debossed' || wrist.refStyle == 'embossed'){
			if(ttQy >115 && ttQy < 200){ ttQy = 200; }else if(ttQy >250 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >352 && ttQy < 400){ ttQy = 400;	}else if(ttQy >432 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >790 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1784 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2916 && ttQy < 3000){ ttQy = 3000; }else if(ttQy >4760 && ttQy < 5000){
				ttQy = 5000;	
			}else if(ttQy >8990 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19551 && ttQy < 20000){
				ttQy = 20000;	
			}
		}	
	
		if(wrist.refStyle == 'printed'){
			if(ttQy >129 && ttQy < 200){ ttQy = 200; }else if(ttQy >252 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >363 && ttQy < 400){ ttQy = 400;	 }else if(ttQy >450 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >879 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1870 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2922&& ttQy < 3000){ ttQy = 3000; }else if(ttQy >4911 && ttQy < 5000){
				ttQy = 5000;	
			}else if(ttQy >9828 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19451 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
		
		if(wrist.refStyle == 'color_filled'){
			if(ttQy >121 && ttQy < 200){ ttQy = 200; }else if(ttQy >253 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >359 && ttQy < 400){ ttQy = 400;	}else if(ttQy >442 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >797 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1794 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2931 && ttQy < 3000){ ttQy = 3000; }else if(ttQy >4764 && ttQy < 5000){
				ttQy = 5000;	
			}else if(ttQy >9422 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >18780 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
	
		if(wrist.refStyle == 'embossed_printed'){
			if(ttQy > 125 && ttQy < 200){ ttQy = 200; }else if(ttQy >267 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >350 && ttQy < 400){ ttQy = 400;	}else if(ttQy >465 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >808 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1810 && ttQy < 2000){


				ttQy = 2000;	
			}else if(ttQy >4869 && ttQy < 5000){ 
				ttQy = 5000;	
			}else if(ttQy >9460 && ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19429 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
		
		if(wrist.refStyle == 'dual_layer' && $('#txtinternal').val().length == 0){
			if(ttQy > 150 && ttQy < 200){ ttQy = 200; }else if(ttQy >278 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >381 && ttQy < 400){ ttQy = 400;	}else if(ttQy >475 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >930 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1939 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2978 && ttQy < 3000){ ttQy = 3000; }else if(ttQy >4939 && ttQy < 5000){ 
				ttQy = 5000;	
			}else if(ttQy >9751	&& ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19898 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
		
		if(wrist.refStyle == 'dual_layer' && $('#txtinternal').val().length > 0){
			if(ttQy > 161 && ttQy < 200){ ttQy = 200; }else if(ttQy >284 && ttQy < 300){
				ttQy = 300;	
			}else if(ttQy >388 && ttQy < 400){ ttQy = 400;	}else if(ttQy >483 && ttQy < 500){
				ttQy = 500;	
			}else if(ttQy >951 && ttQy < 1000){ ttQy = 1000; }else if(ttQy >1959 && ttQy < 2000){
				ttQy = 2000;	
			}else if(ttQy >2986 && ttQy < 3000){ ttQy = 3000; }else if(ttQy >4959 && ttQy < 5000){ 
				ttQy = 5000;	
			}else if(ttQy >9834	&& ttQy < 10000){ ttQy = 10000;	}else if(ttQy >19933 && ttQy < 20000){
				ttQy = 20000;	
			}
		}
	}
	extraQty = 0;
	if(ttQy == 200 || ttQy == 300 || ttQy == 400 || ttQy == 500 || ttQy == 1000 || ttQy == 2000 || ttQy == 5000 || ttQy == 10000 || ttQy == 20000 ){
		extraQty = ttQy - (wrist.totalQty);
		if(GIFT_QTY == 100){
			extraQty = extraQty - 100;
		}
	}

}


function getWarppedPrice(){
var price=0;
	if($('#chkWrapped').is(':checked')){
		price = wrist.extraData.warpper;
		$('.extraWrappedPrice').fadeIn(300);
	}else{
		$('.extraWrappedPrice').fadeOut(500);
	}
	$('.extraWrappedPrice').html('(+'+ CURRENCY +  price +'/each)');
price = (wrist.totalQty*price).toFixed(2);
return checkNan(price);
}

$('.extra-options .product').on('click', function(){
	if($('#chkWrapped').is(':checked')){
		$(this).find('.ffRadioWrapper').removeClass('on');
		$('#chkWrapped').prop('checked',false);
	}else{
		$(this).find('.ffRadioWrapper').addClass('on');
		$('#chkWrapped').prop('checked',true);
	}
	calculatePrice();
});

$('input').on('focus',function(){
    $(this).removeClass('error');
});

function checkNan (price) {
	
	if (isNaN(price)) {
		return 0.00;
	} else {
		return price;
	}
}