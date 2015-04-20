//var ADD_TO_CART = 'cart/ajax/cart-aj.php?code=del';
$(document).ready(function(){
	$(".QEm").colorbox({'href':'ajax/email-quote.php',  onLoad: function() { $('#cboxClose').show(); }});
	$.ajax({url: 'ajax/cart-aj.php?code=getCurrency', type:'post',dataType:'json',success:	function(){} });
	$('.glyphicon-trash').click(function(){
		var postData = {key:$(this).attr('ref')};
		$.ajax({url: 'add_cart?code=del', data:postData, type:'post',dataType:'json',cache:true,success:	postDel });
	});
	
	$('.glyphicon-pencil').click(function(){
		var tlink = "";
		switch($(this).attr('refp')){
			case "wristband":
				tlink = "order.php?ed="+$(this).attr('ref');
			break;
			case "lanyard":
				tlink = "ly-order.php?ed="+$(this).attr('ref');
			break;
		}
		location.href = tlink;
	});
	
  $('.aplyCoupon').click(function(){
	    var tcoupon = $.trim($('.coupon').val());
	  	if(tcoupon == ""){
			alert("Please enter valid coupon code.");
			return false;	
		}
	  
		var postData = {coupon:tcoupon};
		$.ajax({url: 'ajax/cart-aj.php?code=addCoupon', data:postData, type:'post',dataType:'json',cache:true,success:	postCoupon });
	});
	
	
	
	$('.rmCoupon').click(function(){
		$.ajax({url: 'ajax/cart-aj.php?code=rmCoupon', type:'post',dataType:'json',cache:true,success:	postDel });
	});
	
});



function postDel(d){
	if(d.success == 1){	location.href = "add_cart";}	
}

function postCoupon(d){
	if(d.success == 1){location.href = location.href;}else{alert(d.err);}	
}