$(document).ready(show);
function show()
{	
		selectedPage = 1;
		selectedBtn = 1;
		
		$("#button2").click(updateSelectPart1)
		$("#button3").click(updateSelectPart2)
		$("#solid").click(show1);
	    $("#Swirl").click(show2);
		$("#Segmented").click(show3);
		$("#step-1").fadeIn("slow");
	    $("#solid").addClass("selected");
		$("#pra1").fadeIn("slow");
		$("#pra2").fadeOut("slow");
	    $("#pra3").fadeOut("slow");
		$("#button1").css("background-color","#7a0172");
		$("#button1").val("Lavender PMS 513");
		$("#button1").addClass("select");
		//$("#band3").click(changecolor1);
	
}

var show_22 = false;
var show_33 = false;
var show_44 = false;	
var show_55 = false;	
function updateSelectPart1()
{
	selectedBtn = 1;
}
function updateSelectPart2()
{
	selectedBtn = 2;
}
function updateSelectPart3()
{
	selectedBtn = 3;
}	
function show1()
{
	selectedPage = 1;
	$("#step-1").fadeIn("slow");
	$("#step-2").fadeOut("slow");
	$("#step-3").fadeOut("slow");
	$("#Swirl").removeClass("selected");
	$("#Segmented").removeClass("selected");
	$("#solid").addClass("selected");
	$("#pra1").fadeIn("slow");
	$("#pra2").fadeOut("slow");
	$("#pra3").fadeOut("slow");
}

function show2()
{
	selectedPage = 2;
	$("#step-1").fadeOut("slow");
	$("#step-2").fadeIn("slow");
	$("#step-3").fadeOut("slow");
	$("#Swirl").addClass("selected");
	$("#Segmented").removeClass("selected");
	$("#solid").removeClass("selected");
	
	$("#2color1").click(show_seg11);
	$("#3color1").click(show_seg22);
	$("#seg_22").fadeOut("slow");
	$("#seg_11").fadeIn("slow");
	$("#2color1").addClass("selected11");
	$("#3color1").removeClass("selected11");
    $("#pra2").fadeIn("slow");
	$("#pra3").fadeOut("slow");
	$("#pra1").fadeOut("slow");
	
	
	if(show_22 == false)
	{
		show_22 = true;
		updateColor("#0434b2")
		$("#button11").val("Blue Reflex Blue");
				$("#button11").css("background-color","#0434b2");
		selectedBtn = 2;
		updateColor("#000000")
		 $("#button22").val("Black");
				$("#button22").css("background-color","#000000");
		selectedBtn = 1;
	}
	       
				
				$("#button11").addClass("select");
	                $("#button22").removeClass("select");	
					
					$(".area9").click(pickcolor8);
					$(".area8").click(pickcolor9);
				
}
function show_seg11()
{
	selectedPage = 2;
	$("#seg_11").fadeIn("slow");
	$("#seg_22").fadeOut("slow");
	$("#2color1").addClass("selected11");
	$("#3color1").removeClass("selected11");
	$("#pra2").fadeIn("slow");
    $("#pra3").fadeOut("slow");
	$("#pra1").fadeOut("slow");
	//$(".area9").click(pickcolor8);
	//				$(".area8").click(pickcolor9);
}

function pickcolor8()
{
	//alert("test8");
	//selectedBtn = 1;
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#000000";
	$("#button11").click();
	
	
		
}
function pickcolor9()
{
	//alert("test9");
	$("#button22").click();
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#000000";
	
	
		
}

function show_seg22()
{
	selectedPage = 5;
	$("#seg_22").fadeIn("slow");
	$("#seg_11").fadeOut("slow");
	$("#3color1").addClass("selected11");
	$("#2color1").removeClass("selected11");
	$("#pra2").fadeIn("slow");
	$("#pra3").fadeOut("slow");
    $("#pra1").fadeOut("slow");
	if(show_33 == false)
	{
		show_33 = true;
		
		selectedBtn = 3;
		updateColor("#000000")
	 $("#button_seg11").val("Yellow Pantone Yellow");
      $("#button_seg11").css("background-color","#fff700");
	   $("#button_seg11").css("color","#8e8e8e")
		
		selectedBtn = 2;
		
		updateColor("#0434b2")
		 $("#button_seg33").val("black");
      $("#button_seg33").css("background-color","#000000");	
		selectedBtn = 1;
		
		updateColor("#fff700")
		 $("#button_seg22").val("Blue Reflex Blue");
      $("#button_seg22").css("background-color","#0434b2");
		
	}
	 
     
	 
	  $("#button_seg11").addClass("select");
	                $("#button_seg22").removeClass("select");	
					$("#button_seg33").removeClass("select");
					
					$(".area12").click(pickcolor11);
					$(".area11").click(pickcolor12);
					$(".area13").click(pickcolor13);	
}

function pickcolor11()
{
	
//	selectedBtn = 1;
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#f20018";
	$("#button_seg11").click()
	

		
}
function pickcolor12()
{
	
	//selectedBtn = 2;
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#0434b2";
	
$("#button_seg22").click()
		
}
function pickcolor13()
{
	
	//selectedBtn = 3;
	//alert(3)
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#000000";
	
	$("#button_seg33").click()
		
}

function show3()
{
	

	selectedPage = 3;
	
	$("#step-1").fadeOut("slow");
	$("#step-2").fadeOut("slow");
	$("#step-3").fadeIn("slow");
	$("#Swirl").removeClass("selected");
	$("#Segmented").addClass("selected");
	$("#solid").removeClass("selected");
	
	$("#2color").click(show_seg1);
	$("#3color").click(show_seg2);
	$("#seg_2").fadeOut("slow");
	$("#seg_1").fadeIn("slow");
	$("#2color").addClass("selected1");
	$("#3color").removeClass("selected1");
	 $("#pra3").fadeIn("slow");
	 $("#pra2").fadeOut("slow");
	  $("#pra1").fadeOut("slow");
	  if(show_44 == false)
	{
		show_44 = true;
		
		selectedBtn = 1;
		updateColor("#fb7901")
		 $("#button3").val("Black");
		$("#button3").css("background-color","#000000");
		
		
		
		selectedBtn = 2;
		updateColor("#000000")
		$("#button2").val("Orange 021");
		$("#button2").css("background-color","#fb7901");
	}
	       
			
				$("#button2").addClass("select");
	                $("#button3").removeClass("select");	
					
					$("#area1").click(pickcolor1)
		            $("#area2").click(pickcolor2)
}
function show_seg1()
{
	selectedPage = 3;
	$("#seg_1").fadeIn("slow");
	$("#seg_2").fadeOut("slow");
	$("#2color").addClass("selected1");
	$("#3color").removeClass("selected1");
    $("#pra3").fadeIn("slow");
	$("#pra2").fadeOut("slow");
	$("#pra1").fadeOut("slow");
	
	$(function() {
		
        $('.map').maphilight();
        $('#squidheadlink').mouseover(function(e) {
            $('#squidhead').mouseover();
        }).mouseout(function(e) {
            $('#squidhead').mouseout();
        }).click(function(e) { e.preventDefault(); });
		
		});
		
		
		//$("#area1").click(pickcolor1)
		//$("#area2").click(pickcolor2)
}

function pickcolor1()
{
	
	//selectedBtn = 1;
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	
	$("#button2").click()
		
}
					
		
function pickcolor2()
{
		//selectedBtn = 2;
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);	
 $("#button3").click()
}
function show_seg2()
{
	selectedPage = 4;
	if(show_55 == false)
	{
		show_55 = true;
		
		selectedBtn = 3;
	    
		updateColor("#000000")
		
			 $("#button_seg1").val("Red PMS 185");
                 $("#button_seg1").css("background-color","#f20018");
			
		
		selectedBtn = 2;
		
		updateColor("#0434b2")
			 $("#button_seg3").val("black");
      $("#button_seg3").css("background-color","#000000");
				
		
	
		selectedBtn = 1;
			updateColor("#f20018")
		 $("#button_seg2").val("Blue Reflex Blue");
      $("#button_seg2").css("background-color","#0434b2");   
		
		
	}
	$("#seg_2").fadeIn("slow");
	$("#seg_1").fadeOut("slow");
	$("#3color").addClass("selected1");
	$("#2color").removeClass("selected1");
    $("#pra3").fadeIn("slow");
	$("#pra2").fadeOut("slow");
    $("#pra1").fadeOut("slow");
	
	
	
	 
	   $("#button_seg1").addClass("select");
	                $("#button_seg2").removeClass("select");	
					$("#button_seg3").removeClass("select");	
					
					$("#area4").click(pickcolor3);
					$("#area5").click(pickcolor4);
					$("#area6").click(pickcolor5);
					
}

function pickcolor3()
{
	
//	selectedBtn = 1;
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#f20018";
	$("#button_seg1").click()
	

		
}
function pickcolor4()
{
	
	//selectedBtn = 2;
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#0434b2";
	
$("#button_seg2").click()
		
}
function pickcolor5()
{
	
	//selectedBtn = 3;
	
	//changeColor("#0434b2","101");
	//changeColor(currentClr,currentTxt);
	//currentClr = "#000000";
	
	$("#button_seg3").click()
		
}