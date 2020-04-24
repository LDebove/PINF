var timer = undefined;

$(document).ready(function(){
	timer = setInterval(nextImage, 10000);
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
		$(".slide-1").fadeOut(300, function(){
			$(".slide-2").fadeIn(300);
			resetTimer();
		});
	}
	else if($(".slide-2").hasClass("active")){
		$(".slide-2").removeClass("active");
		$(".slide-3").addClass("active");
		$(".slide-2").fadeOut(300, function(){
			$(".slide-3").fadeIn(300);
			resetTimer();
		});
	}
	else if($(".slide-3").hasClass("active")){
		$(".slide-3").removeClass("active");
		$(".slide-1").addClass("active");
		$(".slide-3").fadeOut(300, function(){
			$(".slide-1").fadeIn(300);
			resetTimer();
		});
	}
}

function previousImage(){
	if($(".slide-1").hasClass("active")){
		$(".slide-1").removeClass("active");
		$(".slide-3").addClass("active");
		$(".slide-1").fadeOut(300, function(){
			$(".slide-3").fadeIn(300);
			resetTimer();
		});
	}
	else if($(".slide-2").hasClass("active")){
		$(".slide-2").removeClass("active");
		$(".slide-1").addClass("active");
		$(".slide-2").fadeOut(300, function(){
			$(".slide-1").fadeIn(300);
			resetTimer();
		});
	}
	else if($(".slide-3").hasClass("active")){
		$(".slide-3").removeClass("active");
		$(".slide-2").addClass("active");
		$(".slide-3").fadeOut(300, function(){
			$(".slide-2").fadeIn(300);
			resetTimer();
		});
	}
}

function resetTimer(){
	clearInterval(timer);
	timer = setInterval(nextImage, 10000);
}