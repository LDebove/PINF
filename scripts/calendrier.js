	function verifH(heure){
		var i=8;
		for(i;i<25;i++) {
			if(i==heure) return true;
		}
		return false;
	}

	function verifM(minute){
		var i=0;
		for(i;i<60;i=i+5) {
			if(i==minute) return true;
		}
		return false;
	}

	function affichageRDV(){
			var duree = 2;
			console.log(duree);
			var duree_horaire = duree*34.1;
			var couleur = "green";
			console.log(duree_horaire);
		$('#Grille_horaire_calendrier').append("<div class='Grille_RDV' style='height:" + duree_horaire + "px;'><div class='Grille_RDV_dispo' style='background-color:" + couleur + ";'><p class='Grille_RDV_p'></div>aaaaaaaaa</p></div>");
	}

$(document).ready(function(){

	$(document).on("click","#but_calendrier", function(){
		var date = $('#textcalendrie').val();
		console.log(date);
		$('.Grille_RDV').remove();
		if(date == "30/04/2020"){
			affichageRDV();
		}
	});


	$(document).on("click","#but_calendrier_modifier", function(){
		$('#demander_RDV').hide();
		$('#modifier_RDV').css("display","inline-block");
	});


	$(document).on("click",".Grille_RDV", function(){
		console.log("aa");
		$('#modifier_RDV').hide();
		$('#demander_RDV').css("display","inline-block");
		$.ajax({
			url : 'modele.php',
			type : 'POST',
			dataType : 'text',
			data : {"action":"connect", "pass": ..., "username":...}
			success : fonction{
				console.log("oui");
			},
			error : fonction{
				console.log("non");
			}
		});
	});


	$(document).on("click","#but_creer_RDV", function(){
		var select_heure_depart = $('#select_heure_depart').val();
		var select_minute_depart = $('#select_minute_depart').val();
		var select_heure_fin = $('#select_heure_fin').val();
		var select_minute_fin = $('#select_minute_fin').val();
		console.log(select_heure_depart);
		console.log(select_minute_depart);
		console.log(select_heure_fin);
		console.log(select_minute_fin);
		if(verifH(select_heure_depart) && verifM(select_minute_depart) && verifH(select_heure_fin) && verifM(select_minute_fin)){
			console.log("nice");
		}
	});

});
