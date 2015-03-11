$(document).ready(function() {
  //Gestion de la duplication des parametres de jours ouvrables

    if($("#jour_ouvrable")) {
        $("#jour_ouvrable").click ( function () {
            var tabJour = ["mardi","mercredi","jeudi","vendredi"];

            //Gestion de l'etat
            if ($("#trajet_lundi_etat").is(":checked")) {
                for(var i= 0; i < tabJour.length; i++){
                    $("#trajet_"+tabJour[i]+"_etat").attr('checked', true);
                }
            }else{
                for(var i= 0; i < tabJour.length; i++){
                    $("#trajet_"+tabJour[i]+"_etat").attr('checked', false);
                }
            }
            //gestion du statut, prise de service et fin de service
            //gestion lorsque les heure et minute étaient en combo séparee
            /*
            for(var i= 0; i < tabJour.length; i++){
                $("#trajet_"+tabJour[i]+"_type_cov").val($("#trajet_lundi_type_cov").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_min_hour").val($("#trajet_CpTrajet_lundi_prise_service_min_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_min_minute").val($("#trajet_CpTrajet_lundi_prise_service_min_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_max_hour").val($("#trajet_CpTrajet_lundi_prise_service_max_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_max_minute").val($("#trajet_CpTrajet_lundi_prise_service_max_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_min_hour").val($("#trajet_CpTrajet_lundi_fin_service_min_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_min_minute").val($("#trajet_CpTrajet_lundi_fin_service_min_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_max_hour").val($("#trajet_CpTrajet_lundi_fin_service_max_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_max_minute").val($("#trajet_CpTrajet_lundi_fin_service_max_minute").val());
            }
            */
           //gestion lorsque les heure et minute sont dans le meme combo
            for(var i= 0; i < tabJour.length; i++){
                $("#trajet_"+tabJour[i]+"_type_cov").val($("#trajet_lundi_type_cov").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_min").val($("#trajet_CpTrajet_lundi_prise_service_min").val());
                //$("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_min_minute").val($("#trajet_CpTrajet_lundi_prise_service_min_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_max").val($("#trajet_CpTrajet_lundi_prise_service_max").val());
                //$("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_max_minute").val($("#trajet_CpTrajet_lundi_prise_service_max_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_min").val($("#trajet_CpTrajet_lundi_fin_service_min").val());
                //$("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_min_minute").val($("#trajet_CpTrajet_lundi_fin_service_min_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_max").val($("#trajet_CpTrajet_lundi_fin_service_max").val());
                //$("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_max_minute").val($("#trajet_CpTrajet_lundi_fin_service_max_minute").val());
            }

            return false;
        });

    }
    
    
    // Depot de trajet occasionnel/regulier
    if($("#trajet_id_type_trajet_1").length){
        if($("#trajet_id_type_trajet_1").is(":checked")) {
            $("#trajet-regulier").show();
            $("#trajet-regulier-alt-veh").show();
            $("#trajet-occasionnel").hide();
            $("#trajet-psa").hide();
        }else if($("#trajet_id_type_trajet_2").is(":checked")){
            $("#trajet-occasionnel").show();
            $("#trajet-regulier").hide();
            $("#trajet-regulier-alt-veh").hide();
            $("#trajet-psa").hide();
        }else{
            $("#trajet-psa").show();
            $("#trajet-regulier").hide();
            $("#trajet-regulier-alt-veh").show();
            $("#trajet-occasionnel").hide();
        }
    }
    
    if($("#trajet_id_type_trajet_1").length){
        $("#trajet_id_type_trajet_1").click(function() {
            $("#trajet-regulier").show();
            $("#trajet-regulier-alt-veh").show();
            $("#trajet-occasionnel").hide();
            $("#trajet-psa").hide();
            $("#trajet-occas-cout-global").hide();
            
        });
    }
	
    if($("#trajet_id_type_trajet_2").length){
        $("#trajet_id_type_trajet_2").click(function() {
            $("#trajet-occasionnel").show();
            $("#trajet-regulier").hide();
            $("#trajet-regulier-alt-veh").hide();
            $("#trajet-psa").hide();
            
            //gestion de l'affichage des couts
            if(($("#trajet_jour_unique_type_cov_0").is(":checked") || $("#trajet_jour_unique_type_cov_1").is(":checked")) && $("#trajet_cout").is(":checked")){
                $("#trajet-occas-cout-global").show();
            }else{
                $("#trajet-occas-cout-global").hide();
            }
        });
    }
    
    if($("#trajet_id_type_trajet_3").length){
        $("#trajet_id_type_trajet_3").click(function() {
            $("#trajet-psa").show();
            $("#trajet-regulier").hide();
            $("#trajet-regulier-alt-veh").show();
            $("#trajet-occasionnel").hide();
            $("#trajet-occas-cout-global").hide();
        });
    }


    //gestion de l'affichage du retour
    
    if($("#trajet_jour_unique_retour_0").length){
        if($("#trajet_jour_unique_retour_0").is(":checked")) {
            $("#form-depot-trajet-retour").hide();
        }else if($("#trajet_jour_unique_retour_1").is(":checked")){
            $("#form-depot-trajet-retour").show();
        }
    }
    
    if($("#trajet_jour_unique_retour_0").length){
        $("#trajet_jour_unique_retour_0").click(function() {
            $("#form-depot-trajet-retour").hide();
        });
    }
	
    if($("#trajet_jour_unique_retour_1").length){
        $("#trajet_jour_unique_retour_1").click(function() {
            $("#form-depot-trajet-retour").show();
        });
    }
    
    //getsion de la visualisation du champ participation au frais si conducteur
    // ou indifferent (trajet occasionnel)
    if($("#trajet_jour_unique_type_cov_0").length){
        if($("#trajet_jour_unique_type_cov_0").is(":checked")) {
            $("#trajet-regulier-part-frais").show();

        }else if($("#trajet_jour_unique_type_cov_1").is(":checked")){
            $("#trajet-regulier-part-frais").show();
        }else{
            $("#trajet-regulier-part-frais").hide();

        }
    }
    
    //desactivation des champs si alternace de véhicule
    if($("#trajet_CpTrajet_alternance_vehicule").is(":checked")){
       $("#trajet-occas-cout-global").hide(); 
       $("#trajet_cout").attr('checked', false);
   }
   
   $("#trajet_CpTrajet_alternance_vehicule").click(function() {
       if($("#trajet_CpTrajet_alternance_vehicule").is(":checked")){
           $("#trajet-occas-cout-global").hide(); 
            $("#trajet_cout").attr('checked', false);
       };
   });
 /*******************************************************************/   
 /* affichage des champs liés aux couts si  participation aux frais */   
 /*******************************************************************/ 
    
    //affichage des champs liés aux couts si  participation aux frais 
    //  ET trajet occasionnel

   //la condition est que le champ vehicule soit activé
   if($("#trajet_presence_vehicule").is(":checked")){
       $("#trajet-occas-cout-global").show(); 
       
       $("#trajet-affich-vehicule").show(); 
       if($("#trajet_id_type_trajet_1").is(":checked") || $("#trajet_id_type_trajet_3").is(":checked") ) {
           $("#trajet-regulier-alt-veh").show();
       }else if($("#trajet_id_type_trajet_2").is(":checked")){
           $("#trajet-regulier-alt-veh").hide();
       }
   }else{
       $("#trajet-occas-cout-global").hide();
       $("#trajet-regulier-alt-veh").hide();
       $("#trajet-affich-vehicule").hide();
   }
   
   //gestion du click sur presence vehicule
   $("#trajet_presence_vehicule").click(function() {
       if($("#trajet_presence_vehicule").is(":checked")){
          // $("#trajet-occas-cout-global").show(); 
           if($("#trajet_id_type_trajet_2").is(":checked") 
               && ($("#trajet_jour_unique_type_cov_0").is(":checked") || $("#trajet_jour_unique_type_cov_1").is(":checked")) 
               && $("#trajet_cout").is(":checked")){  
                    $("#trajet-occas-cout-global").show();
           }else{
                    $("#trajet-occas-cout-global").hide();
           }
           $("#trajet-regulier-alt-veh").show();
           $("#trajet-affich-vehicule").show();
       }else{
           $("#trajet-occas-cout-global").hide();
           $("#trajet-regulier-alt-veh").hide();
           $("#trajet-affich-vehicule").hide();
       }
   });
   
   //gestion de l'affichage quand le trajet est occasionnel et conducteur ou indifferenet et particpation au frais
   if($("#trajet_id_type_trajet_2").is(":checked") 
       && ($("#trajet_jour_unique_type_cov_0").is(":checked") || $("#trajet_jour_unique_type_cov_1").is(":checked")) 
       && $("#trajet_cout").is(":checked")){  
            $("#trajet-occas-cout-global").show();
   }else{
            $("#trajet-occas-cout-global").hide();
   }
   
   //gestion de l'affichage en fonction du clic
   if($("#trajet_jour_unique_type_cov_0").length){ // role indifferent
        $("#trajet_jour_unique_type_cov_0").click(function() {
            if($("#trajet_id_type_trajet_2").is(":checked") && $("#trajet_cout").is(":checked")){
                $("#trajet-occas-cout-global").show();
            }else{
                $("#trajet-occas-cout-global").hide();
            }
            
        });
    }
    if($("#trajet_jour_unique_type_cov_1").length){  // role conducteur
        $("#trajet_jour_unique_type_cov_1").click(function() {
            if($("#trajet_id_type_trajet_2").is(":checked") && $("#trajet_cout").is(":checked")){
                $("#trajet-occas-cout-global").show();
            }else{
                $("#trajet-occas-cout-global").hide();
            }
        });
    }
    if($("#trajet_jour_unique_type_cov_2").length){ // role passager
        $("#trajet_jour_unique_type_cov_2").click(function() {
            $("#trajet-occas-cout-global").hide();
        });
    }
   
   
    
    if($("#trajet_id_type_trajet_2").is(":checked") 
        && ($("#trajet_jour_unique_type_cov_0").is(":checked") || $("#trajet_jour_unique_type_cov_1").is(":checked"))){
        $("#trajet_cout").click(function() {
            if($("#trajet_cout").is(":checked") == true){
               $("#trajet-occas-cout-global").show(); 
            }else{
                $("#trajet-occas-cout-global").hide();
            }

        });
    }
    
    $("#trajet_cout").click(function() {
        if($("#trajet_id_type_trajet_2").is(":checked")  
            && ($("#trajet_jour_unique_type_cov_0").is(":checked") || $("#trajet_jour_unique_type_cov_1").is(":checked"))
            && $("#trajet_presence_vehicule").is(":checked")){
                if($("#trajet_cout").is(":checked") == true){
                   $("#trajet-occas-cout-global").show(); 
                }else{
                    $("#trajet-occas-cout-global").hide();
                }
        }else{
            $("#trajet-occas-cout-global").hide();
        }
            
        });
    
    
    if($("#trajet_autoroute").is(":checked") && $("#trajet_cout").is(":checked")){
        $("#trajet-occas-cout-global-autoroute").show();
    }else{
        $("#trajet-occas-cout-global-autoroute").hide();
    }
    
    $("#trajet_autoroute").click(function() {
            if($("#trajet_autoroute").is(":checked") && $("#trajet_cout").is(":checked")){
                $("#trajet-occas-cout-global-autoroute").show();
            }else{
                $("#trajet-occas-cout-global-autoroute").hide();
            }
        });
        
        //ecocalculateur fiche trajet   
    if($("#calcul-prix").length){		
        $("#calcul-prix").click(function(){
            $('body').gmap3({
                action:'getDistance',
                options:{ 
                    origins:[$('#trajet_depart_ville').val()], 
                    destinations:[$('#trajet_destination_ville').val()],
                    travelMode: google.maps.TravelMode.DRIVING
                },
                callback: function(results){
                    var mesure = '';
                    if (results){
                        for (var i = 0; i < results.rows.length; i++){
                            var elements = results.rows[i].elements;
                            for(var j=0; j<elements.length; j++){
                                switch(elements[j].status){
                                    case google.maps.DistanceMatrixStatus.OK:
                                        mesure = elements[j].distance.value;
                                        break;
                    
                                }
                            }
                        } 
                    } else {
                        mesure = '';
                    }
            
            
            
                    var nb_km = mesure/1000;

                    var nb_pers = 3;
                    var prix_essence = 1.40;
                    if(nb_km < 5000) {
                        var indice1 = 0.498;
                        var indice2 = 0;
                    } else if(nb_km > 5001 && nb_km < 20000) {
                        var indice1 = 0.278;
                        var indice2 = 1100/220;
                    } else if(nb_km > 20000) {
                        var indice1 = 0.333;
                        var indice2 = 0;
                    }
                    /**/
                    var perso_cout1 = (nb_km/100*7)*prix_essence;
                    var perso_cout = perso_cout1 + (nb_km*indice1)+indice2;

                    var peage = 0;
                    if($("#trajet_autoroute_cout") && $("#trajet_autoroute_cout").attr("value")!="Coût" && ($("#trajet_autoroute_cout").attr("value")!="")){
                        peage = $("#trajet_autoroute_cout").attr("value");
                        if (peage!= parseInt(peage)){
                            peage = parseInt(peage);
                        }
						
                    }
                    
                    peage = peage / 4;
                    $("#trajet_cout_passager").val(Math.round(((perso_cout/nb_pers)/4)+peage));
        
                }
            });
        });
    }

    
    //Gestion de la duplication des parametres de jours ouvrables
    
    if($("#jour_ouvrable").length) {
        $("#jour_ouvrable").click ( function () {
            var tabJour = ["mardi","mercredi","jeudi","vendredi"];
            
            //Gestion de l'etat
            if ($("#trajet_lundi_etat").is(":checked")) { 
                for(var i= 0; i < tabJour.length; i++){
                    $("#trajet_"+tabJour[i]+"_etat").attr('checked', true);
                }
            }else{
                for(var i= 0; i < tabJour.length; i++){
                    $("#trajet_"+tabJour[i]+"_etat").attr('checked', false);
                }
            }
            //gestion du statut, prise de service et fin de service
            for(var i= 0; i < tabJour.length; i++){
                $("#trajet_"+tabJour[i]+"_type_cov").val($("#trajet_lundi_type_cov").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_min_hour").val($("#trajet_CpTrajet_lundi_prise_service_min_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_min_minute").val($("#trajet_CpTrajet_lundi_prise_service_min_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_max_hour").val($("#trajet_CpTrajet_lundi_prise_service_max_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_prise_service_max_minute").val($("#trajet_CpTrajet_lundi_prise_service_max_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_min_hour").val($("#trajet_CpTrajet_lundi_fin_service_min_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_min_minute").val($("#trajet_CpTrajet_lundi_fin_service_min_minute").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_max_hour").val($("#trajet_CpTrajet_lundi_fin_service_max_hour").val());
                $("#trajet_CpTrajet_"+tabJour[i]+"_fin_service_max_minute").val($("#trajet_CpTrajet_lundi_fin_service_max_minute").val());
            }
           
            return false;    
        });
		
    }
    
    
    
    
  
  //formulaire de recherche trajet
  // gestion de l'affichage des champs horaire et secteur pour PSA
  
    if($("#trajet_id_type_trajet").length){
        if($("#trajet_id_type_trajet").attr("value") == 0) {//choix indifférent
            $("#trajet_form_part2_inclu_regulier").hide();
            $("#trajet_form_part2_inclu_ponctuel").hide();
            $("#trajet_form_part2_inclu_psa").hide();
        }else if($("#trajet_id_type_trajet").attr("value") == 1){//choix trajet régulier
            $("#trajet_form_part2_inclu_regulier").show();
            $("#trajet_form_part2_inclu_ponctuel").hide();
            $("#trajet_form_part2_inclu_psa").hide();
        }else if($("#trajet_id_type_trajet").attr("value") == 2){//choix trajet ponctuel
            $("#trajet_form_part2_inclu_regulier").hide();
            $("#trajet_form_part2_inclu_ponctuel").show();
            $("#trajet_form_part2_inclu_psa").hide();
        }else if($("#trajet_id_type_trajet").attr("value") == 3){//choix trajet PSA
            $("#trajet_form_part2_inclu_regulier").hide();
            $("#trajet_form_part2_inclu_ponctuel").hide();
            $("#trajet_form_part2_inclu_psa").show();
        };
    };
    
    if($("#trajet_id_type_trajet").length){
        $("#trajet_id_type_trajet").change(function() {

                 if($("#trajet_id_type_trajet").attr("value") == 0) {//choix indifférent
                    $("#trajet_form_part2_inclu_regulier").hide();
                    $("#trajet_form_part2_inclu_ponctuel").hide();
                    $("#trajet_form_part2_inclu_psa").hide();
                }else if($("#trajet_id_type_trajet").attr("value") == 1){//choix trajet régulier
                    $("#trajet_form_part2_inclu_regulier").show();
                    $("#trajet_form_part2_inclu_ponctuel").hide();
                    $("#trajet_form_part2_inclu_psa").hide();
                }else if($("#trajet_id_type_trajet").attr("value") == 2){//choix trajet ponctuel
                    $("#trajet_form_part2_inclu_regulier").hide();
                    $("#trajet_form_part2_inclu_ponctuel").show();
                    $("#trajet_form_part2_inclu_psa").hide();
                }else if($("#trajet_id_type_trajet").attr("value") == 3){//choix trajet PSA
                    $("#trajet_form_part2_inclu_regulier").hide();
                    $("#trajet_form_part2_inclu_ponctuel").hide();
                    $("#trajet_form_part2_inclu_psa").show();
                };
            });
        };
        
        
});

