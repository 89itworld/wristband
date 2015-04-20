function unique(list) {
  var result = [];
  $.each(list, function(i, e) {
    if ($.inArray(e, result) == -1) result.push(e);
  });
  return result;
}
var express = false;
function getDeliveryDate(n){
var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
if(express && S_HOURS <= 13){
	n = 1;
}else if(express && S_HOURS > 13){
	n = 2;
}else{
	n = (n<=2)?3:n;
}
for(var i=1; i<=n; i++){
var d2 = new Date(S_YEAR, S_MONTH, S_DAY, S_HOURS, S_MINUTES, S_SECONDS);
d2.setDate(d2.getDate()+i);
if(d2.getDay() === 0||d2.getDay()===6)n++;
}

/*if(subpage == 'lanyard'){
	if( d2.getDate() >= 13 && d2.getDate() <= 28 && (d2.getMonth() == 1 )){
		//tnow.setDate(26);
		d2 = new Date(2015,2,10);
	}
	
	if( d2.getDate() >= 1 && d2.getDate() <= 9 && (d2.getMonth() == 2 )){
		//tnow.setDate(26);
		d2 = new Date(2015,2,10);
	}
}*/

/*if(subpage == 'wristband'){
	if( d2.getDate() >= 13 && d2.getDate() <= 28 && (d2.getMonth() == 1 )){
		//tnow.setDate(26);
		d2 = new Date(2015,2,3);
	}
	
	if( d2.getDate() >= 1 && d2.getDate() <= 3 && (d2.getMonth() == 2 )){
		//tnow.setDate(26);
		d2 = new Date(2015,2,3);
	}
}*/


var d = m_names[d2.getMonth()]+" "+d2.getDate()+", "+d2.getFullYear();
if(d == 'April 6, 2015' || d == 'April 7, 2015' || d == 'October 3, 2014'){
	d = 'April 8, 2015';
}
return d;
}
$(document).ready(function(e) {
	$('.dropdown').hover(function(){ 
  		$('.dropdown-toggle', this).trigger('click'); 
	});
});