var idRDV = "";

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

	function affichageRDV(date, depart, fin){
		var heure_depart = depart.substr(0,2);
		var minute_depart = depart.substr(3,2);
		console.log(heure_depart);
		console.log(minute_depart);
		var heure_fin = fin.substr(0,2);
		var minute_fin = fin.substr(3,2);
		var duree = heure_fin - heure_depart + (minute_fin - minute_depart)/60;
		console.log(heure_fin);
		console.log(minute_fin);
		console.log(duree);
		var duree_horaire = duree*34+1;
		var top = (heure_depart - 8 + minute_depart/60)*34;
		var couleur = "green";
		if(duree_horaire > 20)
			var int_Grille = "<div class='Grille_RDV_dispo' style='background-color:" + couleur + ";'></div><p class='Grille_RDV_p'>" + heure_depart + "/" + minute_depart + "-" + heure_fin + "/" + minute_fin +"</p>";
		else
			var int_Grille = "";
		console.log(duree_horaire);
		console.log(top);
		$('#Grille_horaire_calendrier').append("<div class='Grille_RDV' id='" + date + "/" + depart + "' style='top: " + top + "px;height:" + duree_horaire + "px;'>" + int_Grille + "</div>");
	}

$(document).ready(function(){

	$(document).on("click","#but_calendrier", function(){
		var date = $('#textcalendrie').val();
		document.getElementById("textcalendrie_modifier").value=date;
		$('#demander_RDV').hide();
		console.log(date);
		$('.Grille_RDV').remove();
		if(date.length == 10){
			var day = date.substr(6,4) + "-" + date.substr(3,2) + "-" + date.substr(0,2);
			console.log(day);
			$.ajax({
				url : 'libs/dataRole.php',
				type : 'POST',
				dataType: 'json',
				data : {"action":"list","date":day},
				success : function(oRep){
					console.log("oui list");
					console.log(oRep);
					console.log(oRep.length);
					var length = oRep.length;
					for(var i=0; i<length; i++){
						console.log(oRep[i]);
						affichageRDV(oRep[i].date, oRep[i].heure_depart, oRep[i].heure_fin);
					}
				},
				error : function(oRep){
					console.log("non list");
					console.log(oRep);
				},
			});
		}
	});


	$(document).on("click","#but_calendrier_modifier", function(){
		$('#demander_RDV').hide();
		idRDV = "";
		$('#modifier_RDV').css("display","inline-block");
	});


	$(document).on("click","#but_supprimer_RDV", function(){
		console.log(idRDV);
		var day = idRDV.substr(0,10);
		var depart = idRDV.substr(11,8);
		console.log(day);
		console.log(depart);
		$.ajax({
			url : 'libs/dataRole.php',
			type : 'POST',
			dataType: 'json',
			data : {"action":"delete","date":day,"depart":depart},
			success : function(oRep){
				console.log("oui delete");
				console.log(oRep);
				var elem = document.getElementById(idRDV);
				elem.remove();
			},
			error : function(oRep){
				console.log("non delete");
				console.log(oRep);
			},
		});
	});


	$(document).on("click",".Grille_RDV", function(){
		console.log("aa");
		$('#modifier_RDV').hide();
		var day = (this.id).substr(0,10);
		var depart = (this.id).substr(11,8);
		console.log(day);
		console.log(depart);
		$.ajax({
			url : 'libs/dataRole.php',
			type : 'POST',
			dataType: 'json',
			data : {"action":"select","date":day,"depart":depart},
			success : function(oRep){
				console.log("oui select");
				console.log(oRep);
				var date = (oRep[0].date).substr(8,2) + "/" + (oRep[0].date).substr(5,2) + "/" + (oRep[0].date).substr(0,4);
				var horaire = (oRep[0].heure_depart).substr(0,5) + " à " + (oRep[0].heure_fin).substr(0,5);
				console.log(date);
				$('.demander_RDV_select').remove();
				$('#demander_RDV').prepend("<p class='demander_RDV_select'>Prise de rendez-vous.<br>Jour : " + date + "<br>Horaire : " + horaire + "</p>");
				idRDV = oRep[0].date + "/" + oRep[0].heure_depart;
			},
			error : function(oRep){
				console.log("non select");
				console.log(oRep);
			},
		});
		$('#demander_RDV').css("display","inline-block");
	});


	$(document).on("click","#but_creer_RDV", function(){
		var heure_depart = $('#select_heure_depart').val();
		var minute_depart = $('#select_minute_depart').val();
		var heure_fin = $('#select_heure_fin').val();
		var minute_fin = $('#select_minute_fin').val();
		var date = $('#textcalendrie_modifier').val();
		if(verifH(heure_depart) && verifM(minute_depart) && verifH(heure_fin) && verifM(minute_fin) && date.length == 10){
			console.log("nice");
			if(heure_depart < heure_fin || heure_depart == heure_fin && minute_depart < minute_fin){
				console.log("nice2");
				var depart = heure_depart + ":" + minute_depart + ":00";
				var fin = heure_fin + ":" + minute_fin + ":00";
				var day = date.substr(6,4) + "-" + date.substr(3,2) + "-" + date.substr(0,2);
				console.log(depart);
				console.log(fin);
				console.log(date);
				console.log(day);
				$.ajax({
					url : 'libs/dataRole.php',
					type : 'POST',
					dataType: 'json',
					data : {"action":"add","date":day,"depart":depart,"fin":fin},
					success : function(oRep){
						console.log("oui add");
						affichageRDV(day, depart, fin);
					},
					error : function(oRep){
						console.log("non add");
					},
				});
			}
			else{
				console.log("non2");
			}
		}
	});

});




















