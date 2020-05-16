var id_RDV = "";


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



function ajax_verif_creerRDV(day, depart, fin, heure_depart, minute_depart, heure_fin, minute_fin){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"list","date":day},
		success : function(oRep){
			var length = oRep.length;
			var flag = 1;
			for(var i=0; i<length; i++){
				if(heure_depart > oRep[i].heure_depart.substr(0,2) || heure_depart == oRep[i].heure_depart.substr(0,2) && minute_depart > oRep[i].heure_depart.substr(3,2)){
					if(heure_depart > oRep[i].heure_fin.substr(0,2) || heure_depart == oRep[i].heure_fin.substr(0,2) && minute_depart >= oRep[i].heure_fin.substr(3,2))
						flag = 1;
					else {
						flag = 0;
					}
				}
				else if(heure_depart < oRep[i].heure_depart.substr(0,2)|| heure_depart == oRep[i].heure_depart.substr(0,2) && minute_depart < oRep[i].heure_depart.substr(3,2)){
					if(heure_fin < oRep[i].heure_depart.substr(0,2)|| heure_fin == oRep[i].heure_depart.substr(0,2) && minute_fin <= oRep[i].heure_depart.substr(3,2))
						flag = 1;
					else{
						flag = 0;
					}
				}
				else{
					flag = 0;
				}
			}
			if(flag){
				ajax_creerRDV(day, depart, fin);
			}
		},
	});
}



function ajax_creerRDV(day, depart, fin){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"add","date":day,"depart":depart,"fin":fin},
		success : function(oRep){
			affichageRDV("green",day, depart, fin);
		},
	});
}



function ajax_couleurRDV(id,date, depart, fin){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"couleur","id":id},
		success : function(oRep){
			var length = oRep.length;
			var rep = 0;
			if(oRep.length > 0){
				for(var i=0; i<length; i++){
					if(oRep[i].accepte == 1)
						rep = 1;
				}
			}
			if(rep == 0){
				affichageRDV("green",date, depart, fin);
			}
			if(rep == 1){
				affichageRDV("red",date, depart, fin);
			}
		},
	});
}



function affichageRDV(couleur,date, depart, fin){
	var heure_depart = depart.substr(0,2);
	var minute_depart = depart.substr(3,2);
	var heure_fin = fin.substr(0,2);
	var minute_fin = fin.substr(3,2);
	var duree = heure_fin - heure_depart + (minute_fin - minute_depart)/60;
	var duree_horaire = duree*34+1;
	var top = (heure_depart - 8 + minute_depart/60)*34;
	if(duree_horaire > 20)
		var int_Grille = "<div class='Grille_RDV_dispo' style='background-color:" + couleur + ";'></div><p class='Grille_RDV_p'>" + heure_depart + "/" + minute_depart + "-" + heure_fin + "/" + minute_fin +"</p>";
	else
		var int_Grille = "";
	$('#Grille_horaire_calendrier').append("<div class='Grille_RDV' id='" + date + "/" + depart + "' style='top: " + top + "px;height:" + duree_horaire + "px;'>" + int_Grille + "</div>");
}



function ajax_idusers(){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"selectIDusers"},
		success : function(oRep){
			var idusers = oRep[0].id;
			var day = id_RDV.substr(0,10);
			var depart = id_RDV.substr(11,8);
			ajax_idRDV(idusers, day, depart);
		},
	});
}



function ajax_idRDV(idusers, day, depart){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"selectIDrdv","date":day,"depart":depart},
		success : function(oRep){
			var idRDV = oRep[0].id;
			ajax_verif_demandeRDV(idusers, idRDV);
		},
	});
}



function ajax_demandeRDV(idusers, idRDV){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"demande","idusers":idusers,"idRDV":idRDV},
		success : function(oRep){
			$('#but_demander_RDV').before("<p class='demander_RDV_select'>Votre demande de rendez-vous a bien été prise en compte.</p>");
			$('#but_demander_RDV').hide();
			
		},
	});
}



function ajax_verif_demandeRDV(idusers, idRDV){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verif_demande","idusers":idusers,"idRDV":idRDV},
		success : function(oRep){
				if(oRep == 0){
					ajax_demandeRDV(idusers, idRDV);
				}
		},
	});
}



function ajax_affichageRDV(day){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"list","date":day},
		success : function(oRep){
			var length = oRep.length;
			for(var i=0; i<length; i++){
				ajax_couleurRDV(oRep[i].id,oRep[i].date, oRep[i].heure_depart, oRep[i].heure_fin);
			}
		},
	});
}



function ajax_deleteRDV(day, depart){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"delete","date":day,"depart":depart},
	});
}



function ajax_selectRDV(day, depart){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"select","date":day,"depart":depart},
		success : function(oRep){
			$('#but_demander_RDV').show();
			var date = (oRep[0].date).substr(8,2) + "/" + (oRep[0].date).substr(5,2) + "/" + (oRep[0].date).substr(0,4);
			var horaire = (oRep[0].heure_depart).substr(0,5) + " à " + (oRep[0].heure_fin).substr(0,5);
			var possible = "";
			var d = new Date();
			if((d.getFullYear()) > (oRep[0].date).substr(0,4) || (d.getFullYear()) == (oRep[0].date).substr(0,4) && (d.getMonth()+1) > (oRep[0].date).substr(5,2) || (d.getFullYear()) == (oRep[0].date).substr(0,4) && (d.getMonth()+1) == (oRep[0].date).substr(5,2) && (d.getDate()) > (oRep[0].date).substr(8,2)){
				possible = "<br>Vous ne pouvez pas demander ce rendez-vous.<br>Cette date est déjà passée.<br>";
				$('#but_demander_RDV').hide();
			}
			$('.demander_RDV_select').remove();
			$('#demander_RDV').prepend("<p class='demander_RDV_select'>Prise de rendez-vous.<br>Jour : " + date + "<br>Horaire : " + horaire + possible + "</p>");
			$('#demander_RDV').css("display","inline-block");
			id_RDV = oRep[0].date + "/" + oRep[0].heure_depart;
		},
	});
}



function ajax_selectRDV_dispoID(day, depart){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"selectIDrdv","date":day,"depart":depart},
		success : function(oRep){
			ajax_selectRDV_dispo(oRep[0].id);
		},
	});
}



function ajax_selectRDV_dispo(id){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"couleur","id":id},
		success : function(oRep){
			var length = oRep.length;
			var rep = 0;
			if(oRep.length > 0){
				for(var i=0; i<length; i++){
					if(oRep[i].accepte == 1)
						rep = 1;
				}
			}
			if(rep == 0){
				ajax_selectRDV_deja_demande(id);
			}
			if(rep == 1){
				$('#but_demander_RDV').hide();
				ajax_selectRDV_dispo_ad_user(id);
			}
		},
	});
}



function ajax_selectRDV_deja_demande(id){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verif_deja_demande","id_rdv":id},
		success : function(oRep){
			if(oRep == 1){
				$('#but_demander_RDV').before("<p class='demander_RDV_select'>Vous avez déjà demandé ce rendez-vous.</p>");
				$('#but_demander_RDV').hide();
			}	
		},
	});
}



function ajax_selectRDV_dispo_ad_user(id){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verif_user"},
		success : function(oRep){
			if(oRep == 1)
				ajax_selectRDV_dispo_ad(id);
			else
				ajax_selectRDV_dispo_client(id);
		},
	});
}



function ajax_selectRDV_dispo_client(id){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verifRDV_client","id_rdv":id},
		success : function(oRep){
			if(oRep == 1)
				$('#but_demander_RDV').before("<p class='demander_RDV_select'>Vous avez déjà réservé ce rendez-vous.</p>");
			else
				$('#but_demander_RDV').before("<p class='demander_RDV_select'>Le rendez-vous est deja reservé.</p>");
		},
	});
}



function ajax_selectRDV_dispo_ad(id){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"selectRDV_dispo_ad","id":id},
		success : function(oRep){
			$('#but_supprimer_RDV').before("<p class='demander_RDV_select'>Le rendez-vous est reservé par " + oRep[0].nom + " " + oRep[0].prenom + ".</p>");
		},
	});
}



function ajax_afficherDemandeRDV(){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"affiche_demande"},
		success : function(oRep){
			var length = oRep.length;
			for(var i=0; i<length; i++){
				ajax_selectUsers(oRep[i].id_users, oRep[i].id_rdv);
			}
		},
	});
}



function ajax_mailRDV(id_users, id_rdv){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"mail","id_users":id_users,"id_rdv":id_rdv},
	});
}



function ajax_selectUsers(id_users, id_rdv){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"selectUsers","id_users":id_users},
		success : function(oRep){
			var personne = oRep[0].nom + " " + oRep[0].prenom;
			ajax_selectRDVByID(personne, id_rdv, id_users);
		},
	});
}



function ajax_selectRDVByID(personne, id_rdv, id_users){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"selectRDVByID","id_rdv":id_rdv},
		success : function(oRep){
			var date = (oRep[0].date).substr(8,2) + "/" + (oRep[0].date).substr(5,2) + "/" + (oRep[0].date).substr(0,4);
			var horaire = (oRep[0].heure_depart).substr(0,5) + " à " + (oRep[0].heure_fin).substr(0,5);
			$('#div_accepter_RDV').append("<p class='accepter_RDV' id='" + id_rdv + "/" + id_users + "'>Demande de prise de rendez-vous.<br>De : " + personne + "<br>Jour : " + date + "<br>Horaire : " + horaire + "<br><input type='button'  value='Accepter' id='but_accepter_RDV'/><input type='button'  value='Refuser' id='but_refuser_RDV'/></p>");
		},
	});
}



function ajax_accepter_demandeRDV_verif(id_rdv, id_users){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"couleur","id":id_rdv},
		success : function(oRep){
			var length = oRep.length;
			var rep = 0;
			if(oRep.length > 0){
				for(var i=0; i<length; i++){
					if(oRep[i].accepte == 1)
						rep = 1;
				}
			}
			if(rep == 0){
				ajax_accepter_demandeRDV(id_rdv, id_users);
			}
			if(rep == 1){
				ajax_delete_demandeRDV_erreur(id_rdv, id_users);
			}
		},
	});
}



function ajax_accepter_demandeRDV(id_rdv, id_users){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"accepter_demande","id_rdv":id_rdv,"id_users":id_users},
		success : function(oRep){
			ajax_delete_demandeRDV(id_rdv, id_users);
			ajax_mailRDV(id_users, id_rdv);
		},
	});
}



function ajax_refuser_demandeRDV(id_rdv, id_users){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"refuser_demande","id_rdv":id_rdv,"id_users":id_users},
	});
}



function ajax_delete_demandeRDV(id_rdv, id_users){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"delete_demande","id_rdv":id_rdv,"id_users":id_users},
	});
}



function ajax_delete_demandeRDV_erreur(id_rdv, id_users){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"delete_demande_erreur","id_rdv":id_rdv,"id_users":id_users},
	});
}



function ajax_verif_client(){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verif_user"},
		success : function(oRep){
			if(oRep==1){
				ajax_afficherDemandeRDV();
				$('.ad').css("display","inline-block");
			}
		},
	});
}



function ajax_verif_modifier(){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verif_user"},
		success : function(oRep){
			if(oRep==1){
				$('#demander_RDV').hide();
				id_RDV = "";
				$('#modifier_RDV').css("display","inline-block");
			}
		},
	});
}



function ajax_verif_supprimer(){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"verif_user"},
		success : function(oRep){
			if(oRep==1){
				var day = id_RDV.substr(0,10);
				var depart = id_RDV.substr(11,8);
				ajax_deleteRDV_demande_verif(day, depart);
			}
		},
	});
}



function ajax_deleteRDV_demande_verif(day, depart){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'text',
		data : {"action":"deleteRDV_demande_verif","date":day,"depart":depart},
		success : function(oRep){
			ajax_deleteRDV_demande(day, depart);
			ajax_deleteRDV(day, depart);
		},
	});
}



function ajax_deleteRDV_demande(day, depart){
	$.ajax({
		url : 'libs/dataRole.php',
		type : 'POST',
		dataType: 'json',
		data : {"action":"deleteRDV_demande","date":day,"depart":depart},
	});
}


$(document).ready(function(){


	ajax_verif_client();


	$(document).on("click","#but_demander_RDV", function(){
		ajax_idusers();
	});


	$(document).on("click","#but_accepter_RDV", function(){
		var ID = $(this).parent('p').attr('id');
		var length = ID.length;
		for(var i=0; i<length; i++){
			if(ID.substr(i,1) == '/'){
				var I = i;
			}
		}
		var id_rdv = ID.substr(0,I);
		var id_users = ID.substr(I+1);
		$($(this).parent('p')).remove();
		ajax_accepter_demandeRDV_verif(id_rdv, id_users);
		var elements = $('[id^="' + id_rdv + '/"]')
		$(elements).remove();
	});


	$(document).on("click","#but_refuser_RDV", function(){
		var ID = $(this).parent('p').attr('id');
		var length = ID.length;
		for(var i=0; i<length; i++){
			if(ID.substr(i,1) == '/'){
				var I = i;
			}
		}
		var id_rdv = ID.substr(0,I);
		var id_users = ID.substr(I+1);
		$($(this).parent('p')).remove();
		ajax_refuser_demandeRDV(id_rdv, id_users);
	});


	$(document).on("click","#but_calendrier", function(){
		var date = $('#textcalendrie').val();
		document.getElementById("textcalendrie_modifier").value=date;
		$('#demander_RDV').hide();
		$('.Grille_RDV').remove();
		if(date.length == 10){
			var day = date.substr(6,4) + "-" + date.substr(3,2) + "-" + date.substr(0,2);
			ajax_affichageRDV(day);
		}
	});


	$(document).on("click","#but_calendrier_modifier", function(){
		ajax_verif_modifier();
	});


	$(document).on("click","#but_supprimer_RDV", function(){
		var elem = document.getElementById(id_RDV);
		elem.remove();
		$('#demander_RDV').hide();
		ajax_verif_supprimer();
	});


	$(document).on("click",".Grille_RDV", function(){
		$('#modifier_RDV').hide();
		var day = (this.id).substr(0,10);
		var depart = (this.id).substr(11,8);
		ajax_selectRDV(day, depart);
		ajax_selectRDV_dispoID(day, depart);
	});


	$(document).on("click","#but_creer_RDV", function(){
		var heure_depart = $('#select_heure_depart').val();
		var minute_depart = $('#select_minute_depart').val();
		var heure_fin = $('#select_heure_fin').val();
		var minute_fin = $('#select_minute_fin').val();
		var date = $('#textcalendrie_modifier').val();
		if(verifH(heure_depart) && verifM(minute_depart) && verifH(heure_fin) && verifM(minute_fin) && date.length == 10){
			if(heure_depart < heure_fin || heure_depart == heure_fin && minute_depart < minute_fin){
				var depart = heure_depart + ":" + minute_depart + ":00";
				var fin = heure_fin + ":" + minute_fin + ":00";
				var day = date.substr(6,4) + "-" + date.substr(3,2) + "-" + date.substr(0,2);
				ajax_verif_creerRDV(day, depart, fin, heure_depart, minute_depart, heure_fin, minute_fin);
			}
		}
	});


});




















