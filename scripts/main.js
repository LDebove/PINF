$(document).ready(function(){
	setInterval(nextImage, 10000);
});

function responsiveMenu(){
  if($("#myTopMenu").hasClass("responsive")){
  		$("a:first").show();
		$("#myTopMenu").removeClass("responsive");
  }
  else{
  		$("a:first").hide();
  		$("#myTopMenu").addClass("responsive");
  }
}

function nextImage(){
	if($(".slide-1").hasClass("active")){
		$(".slide-1").removeClass("active");
		$(".slide-2").addClass("active");
		$(".slide-1").hide();
		$(".slide-2").show();
	}
	else if($(".slide-2").hasClass("active")){
		$(".slide-2").removeClass("active");
		$(".slide-3").addClass("active");
		$(".slide-2").hide();
		$(".slide-3").show();
	}
	else if($(".slide-3").hasClass("active")){
		$(".slide-3").removeClass("active");
		$(".slide-1").addClass("active");
		$(".slide-3").hide();
		$(".slide-1").show();
	}
}

function previousImage(){
	if($(".slide-1").hasClass("active")){
		$(".slide-1").removeClass("active");
		$(".slide-3").addClass("active");
		$(".slide-1").hide();
		$(".slide-3").show();
	}
	else if($(".slide-2").hasClass("active")){
		$(".slide-2").removeClass("active");
		$(".slide-1").addClass("active");
		$(".slide-2").hide();
		$(".slide-1").show();
	}
	else if($(".slide-3").hasClass("active")){
		$(".slide-3").removeClass("active");
		$(".slide-2").addClass("active");
		$(".slide-3").hide();
		$(".slide-2").show();
	}
}