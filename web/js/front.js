$(document).ready(function(){
						   
    $("#tableresultat tr:odd").addClass("odd");
    $("#tableresultat tr:not(.odd)").hide();
    $("#tableresultat tr:first-child").show();			
    $("#tableresultat tr.odd").click(function(){
        $(this).next("tr").toggle();
    });
	
	
    
    if($("#alerte")) {
		
        $("#alerte").click ( function () {
			
            $("#form-alerte").toggle("slow");
            return false;
			
        });
		
    }
    //Gestion des préférences du depot de trajet
    if($("#jaccepte").length){
			
        //Gestion des animaux
        if($("#valueAnimaux").attr("value") == "0" || $("#valueAnimaux").attr("value") == ""){
            
            $("#animaux img.oui").hide();
        }else{
            $("#animaux img.non").hide();
        }  
        
        $("#animaux").click (function () {
            $(this).children("img").toggle();
            if($("#valueAnimaux").attr("value") == "0" || $("#valueAnimaux").attr("value") == ""){
                $("#valueAnimaux").attr("value", "1");
            }else{
                $("#valueAnimaux").attr("value", "0"); 
            }
        });
        
        //Gestion des fumeurs
        if($("#valueFumeur").attr("value") == "0" || $("#valueFumeur").attr("value") == ""){
            $("#fumeur img.oui").hide();
        }else{
            $("#fumeur img.non").hide();
        }
        $("#fumeur").click (function () {
            $(this).children("img").toggle();
            if($("#valueFumeur").attr("value") == "0" || $("#valueFumeur").attr("value") == ""){
                $("#valueFumeur").attr("value", "1");
            }else{
                $("#valueFumeur").attr("value", "0"); 
            }
        });
        
        //Gestion de la musique
        if($("#valueMusique").attr("value") == "0" || $("#valueMusique").attr("value") == ""){
            $("#musique img.oui").hide();
        }else{
            $("#musique img.non").hide();
        }
        $("#musique").click (function () {
            $(this).children("img").toggle();
            if($("#valueMusique").attr("value") == "0" || $("#valueMusique").attr("value") == ""){
                $("#valueMusique").attr("value", "1");
            }else{
                $("#valueMusique").attr("value", "0"); 
            }
        });
        
        //Gestion de la dicussion
        if($("#valueDiscu").attr("value") == "0" || $("#valueDiscu").attr("value") == ""){
            $("#discu img.oui").hide();
        }else{
            $("#discu img.non").hide();
        }
        $("#discu").click (function () {
            $(this).children("img").toggle();
            if($("#valueDiscu").attr("value") == "0" || $("#valueDiscu").attr("value") == ""){
                $("#valueDiscu").attr("value", "1");
            }else{
                $("#valueDiscu").attr("value", "0"); 
            }
        });
	
        //Gestion des bagages	
        if($("#valueVolumeBagage").attr("value") == "0" || $("#valueVolumeBagage").attr("value") == ""){
            $("#taille-bagage").hide();
        }else{
            $("#taille-bagage").show();
        }
        
        
        $("#trajet_tolerance_2_0").click (function () {
            $("#taille-bagage").hide();
            $("#valueVolumeBagage").attr("value", "0");
        });
        $("#trajet_tolerance_2_1").click (function () {
            $("#taille-bagage").show();
            $("#petit img.oui").hide();
            $("#petit img.non").show();
            $("#moyen img.oui").show();					
            $("#moyen img.non").hide();					
            $("#gros img.oui").hide();
            $("#gros img.non").show();
            $("#valueVolumeBagage").attr("value", "2");
        });
        
        
        if($('input[type=radio][name=trajet[tolerance_2]]:checked').attr('value') == '0' || $('input[type=radio][name=trajet[tolerance_2]]:checked').attr('value') == ''){
            $("#taille-bagage").hide();
        }else{
            $("#taille-bagage").show();
        }
    

        switch ($("#valueVolumeBagage").attr("value")) {
            case "0":
                $("#petit img.oui").hide();
                $("#moyen img.oui").hide();					
                $("#gros img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.non").show();					
                $("#gros img.non").show();

                break;
            case "1":
                $("#petit img.oui").show();
                $("#moyen img.oui").hide();					
                $("#gros img.oui").hide();
                $("#petit img.non").hide();
                $("#moyen img.non").show();					
                $("#gros img.non").show();

                break;
            
            case "2":
                $("#petit img.oui").hide();
                $("#moyen img.oui").show();					
                $("#gros img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.non").hide();					
                $("#gros img.non").show();

                break;
            
            case "3":
                $("#petit img.oui").hide();
                $("#moyen img.oui").hide();					
                $("#gros img.oui").show();
                $("#petit img.non").show();
                $("#moyen img.non").show();					
                $("#gros img.non").hide();

                break;
            
            default:
                $("#petit img.oui").hide();
                $("#moyen img.oui").hide();					
                $("#gros img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.non").show();					
                $("#gros img.non").show();

                
                break;
        };
            
        $("div#petit").click (function () {
										 
            if ($("#valueVolumeBagage").attr("value") == 1) {
                $("#petit img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.oui").hide();					
                $("#moyen img.non").show();					
                $("#gros img.oui").hide();
                $("#gros img.non").show();
                $("#valueVolumeBagage").attr("value", "0");
            } else {
                $("#petit img.oui").show();
                $("#petit img.non").hide();
                $("#moyen img.oui").hide();					
                $("#moyen img.non").show();					
                $("#gros img.oui").hide();
                $("#gros img.non").show();
                $("#valueVolumeBagage").attr("value", "1");
            }
        });
		
        $("div#moyen").click (function () {
										 
            if ($("#valueVolumeBagage").attr("value") == 2) {
                $("#petit img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.oui").hide();					
                $("#moyen img.non").show();					
                $("#gros img.oui").hide();
                $("#gros img.non").show();
                $("#valueVolumeBagage").attr("value", "0");
            } else {
                $("#petit img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.oui").show();					
                $("#moyen img.non").hide();					
                $("#gros img.oui").hide();
                $("#gros img.non").show();
                $("#valueVolumeBagage").attr("value", "2");
            }
        });
		
        $("div#gros").click (function () {
										 
            if ($("#valueVolumeBagage").attr("value") == 3) {
                $("#petit img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.oui").hide();					
                $("#moyen img.non").show();					
                $("#gros img.oui").hide();
                $("#gros img.non").show();
                $("#valueVolumeBagage").attr("value", "0");
            } else {
                $("#petit img.oui").hide();
                $("#petit img.non").show();
                $("#moyen img.oui").hide();					
                $("#moyen img.non").show();					
                $("#gros img.oui").show();
                $("#gros img.non").hide();
                $("#valueVolumeBagage").attr("value", "3");
            }
        });
		
		
    }
	
	
	

    // navigation principale 
	
    if($("#nav").length){
			
        $("#nav ul li.niveau-un").mouseover (function () {
				
            $(this).children("ul").addClass("visible");	
            $(this).children("ul").removeClass("cache");	
				
        });
			
        $("#nav ul li.niveau-un").mouseleave (function () {
				
            $(this).children("ul").removeClass("visible");	
            $(this).children("ul").addClass("cache");				
				
        });
    }
	
						   
    if($('#ticker').length){
        $('#ticker').bxSlider({
            infiniteLoop: true,
            auto: true,
            pager: false,
            controls:false,
            tickerSpeed:10000
        });
    }
    if($('#listepartenaire').length){
        $('#listepartenaire').bxSlider({
            infiniteLoop: true,
            auto: true,
            pager: false,
            controls:false,
            tickerSpeed:15000
        });
    }
    if($('.btnavancee').length){			
        $(".btnavancee").click(function () {
            $("#depart_ville2").attr("value", $("#trajet_depart_ville").attr("value"));
            $("#destination_ville2").attr("value", $("#trajet_destination_ville").attr("value"));
            $("#rechercheavancee").show("fast");
            $("#recherche").hide("fast");
        });
    }
			
    if($('.btnrecherchestandard').length){			
        $(".btnrecherchestandard").click(function () {
            $("#trajet_depart_ville").attr("value", $("#depart_ville2").attr("value"));
            $("#trajet_destination_ville").attr("value", $("#destination_ville2").attr("value"));
            $("#rechercheavancee").hide("fast");
            $("#recherche").show("fast");
        });
    }

    //Gestion du formulaire de depot de trajet		
    
    if($("#autoroute-oui").length){
        if($("#autoroute-oui").attr("checked")){
            $("#cout-peage").show();
        }
        $("#autoroute-oui").click(function() {
            $("#cout-peage").show();
        });
    }
    
    
    if($("#autoroute-non").length){
        $("#autoroute-non").click(function() {
            $("#cout-peage").hide();										 
        });
    }
	
    if($("#partage-frais-oui").length){
        $("#partage-frais-oui").click(function() {
            $("#cout-trajet").show();
        });
    }
        
    if($("#partage-frais-non").length){
        $("#partage-frais-non").click(function() {
            $("#cout-trajet").hide();	
            $("#trajet_cout_passager").val("");
        });
    }
	
    if($("#trajet_cout_passager").attr("value") != ""){
        $("#cout-trajet").show();
        $("#partage-frais-oui").attr("checked", "checked");
    }else{
        $("#cout-trajet").hide();
        $("#partage-frais-non").attr("checked", "checked");
    }
        
	
    if($("#ville-etape-non").length){
        $("#ville-etape-non").click(function() {
            $("#ville-etape").hide();										 
        });
    }
    
    
	
    if($("#ville-etape-oui").length){
        if($("#trajet_etape1_ville").val() != ""){
            $("#ville-etape-oui").attr("checked", "checked"); 
            $("#ville-etape").show();
        }else{
            $("#ville-etape-non").attr("checked", "checked"); 
            $("#ville-etape").hide();
        }
        $("#ville-etape-oui").click(function() {
            $("#ville-etape").show();
        });
    }
    
	



    //Gestion des Valeurs par défaut du formulaire
    
    if($("#trajet_depart_ville").length) {
        if($("#trajet_depart_ville").val()==""){
            $("#trajet_depart_ville").val("Ville");
        }
		
        $("#trajet_depart_ville").click ( function () {
            if($(this).val()=="Ville"){
                $(this).val("");
            }
        });
		
    }
    
    if($("#trajet_destination_ville").length) {
        if($("#trajet_destination_ville").val()==""){
            $("#trajet_destination_ville").val("Ville");
        }
        $("#trajet_destination_ville").click ( function () {
            if($(this).val()=="Ville"){
                $(this).val("");
            }
        });
		
    }
    
    if($("#depart_ville2").length) {
        
        $("#depart_ville2").val("Ville");
		
        $("#depart_ville2").click ( function () {
            if($(this).val()=="Ville"){
                $(this).val("");
            }
        });
		
    }
    
    if($("#destination_ville2").length) {
        
        $("#destination_ville2").val("Ville");
		
        $("#destination_ville2").click ( function () {
            if($(this).val()=="Ville"){
                $(this).val("");
            }
        });
		
    }
    
    
    
    
    //Gestion du texte par défaut dans le log
    if($("#CovoitureurIdentification_mail").length) {
        $("#CovoitureurIdentification_mail").click ( function () {
            if($(this).val()=="Entrez votre mail"){
                $(this).val(""); 
            }
        });
		
    }
    
    //Gestion du texte par défaut dans l'alerte

    if($("#creation-alerte").length) {
        $("#creation-alerte").val("Entrez votre mail");
        $("#creation-alerte").click ( function () {
            if($(this).val()=="Entrez votre mail"){
                $(this).val("");
            }
        });
		
    }
    
    

        
	
    // pagination 
	

    if($('.pagination').length){
	
        if($('.un-message').length){
	
            var largeurLien = 16;
            var largeurMessage = $('.un-message').outerWidth();
            var nblien = $('.pagination > a').size();
            var largeurPagination = largeurLien * nblien + (nblien*6) + 6 ;
            $('.pagination').css ("width" , largeurPagination );
									
            $('.pagination').css ("margin-left" , ((largeurTable/2) - (largeurPagination/2)));
	
        }
        if($('table').length){
			
            var largeurLien = 16;
            var largeurTable = $('.two-thirds').children('div').children('table').outerWidth();
            var nblien = $('.pagination > a').size();
            var largeurPagination = largeurLien * nblien + (nblien*6) + 6 ;
			
            $('.pagination').css ("width" , largeurPagination );
									
            $('.pagination').css ("margin-left" , ((largeurTable/2) - (largeurPagination/2)));
					
        }
    }




	
	
	
    // accordion 
    if($('#faq').length){
        $("#faq").accordion({
            header: "h3",
            autoHeight:false,
            active: 0
        });
    } 
			
			
    if($('#depottrajet').length){
        $("#depottrajet").accordion( {
            header: "h3",
            autoHeight:false,
            active: 0
        } );
    }
	
    if($("#inscription").length){
        $("#inscription").accordion( {
            header: "h3",
            autoHeight:false,
            active: 0
        } );
    }
    if($("#modif-profil").length){
        $("#modif-profil").accordion( {
            header: "h3",
            autoHeight:false,
            active: 0
        } );
    }
    if($("#depot-trajet").length){
        $("#depot-trajet").accordion( {
            header: "h3",
            autoHeight:false,
            active: 0
        } );
    }
    
    if($("#goto-etape-deux").length){		
        $("div#etape2").hide();
        $("#goto-etape-deux").click(function(){
            $("#inscription").accordion("activate" , 1);	
            $("#modif-profil").accordion("activate" , 1);	
            $("#depot-trajet").accordion("activate" , 1);
        });	
    }
		
		
    if($("#goto-etape-trois").length){
        $("div#etape2").hide();
        $("div#etape3").hide();
        $("#goto-etape-trois").click(function(){
            $("#inscription").accordion("activate" , 2);
            $("#modif-profil").accordion("activate" , 2);
            $("#depot-trajet").accordion("activate" , 2);
        });	
    }
	
    // calendar
	
    if($('.datepicker').length){
        $( ".datepicker" ).datepicker({
            dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa']
        });
    }
	


    
	
    //Fiche annuaire
    if($("#detailfiche").length){
        $('#detailfiche').tabs();
    }
	
	
    // Depot de trajet occasionnel/regulier 
     if($("#trajet_id_type_trajet_1").length){
        if($("#trajet_id_type_trajet_1").is(":checked")) {
            $("#trajet-regulier").show();
            $("#trajet-occasionnel").hide();
            $("#tolerances").hide();
            $("#bagages").hide();
        }else{
            $("#trajet-occasionnel").show();
            $("#trajet-regulier").hide();
            $("#tolerances").show();
            $("#bagages").show();
        }
     }
    
    if($("#trajet_id_type_trajet_1").length){
        $("#trajet_id_type_trajet_1").click(function() {
            $("#trajet-regulier").show();
            $("#trajet-occasionnel").hide();
            $("#tolerances").hide();
            $("#bagages").hide();
        });
    }
	
    if($("#trajet_id_type_trajet_2").length){
        $("#trajet_id_type_trajet_2").click(function() {
            $("#trajet-occasionnel").show();
            $("#trajet-regulier").hide();
            $("#tolerances").show();
            $("#bagages").show();
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
    
    
    //Gestion de l'acces direct à un onglet
    //On passe dans l'url # et le numéro de l'onglet que l'on désire affciher(#3)
    
    if($("#detailfiche").length){
        $detailFicheTabs = $("#detailfiche").tabs();
        var currentLocation = $(location).attr('href');
        var lengthCurrentLocation = currentLocation.length; 
        if(currentLocation.charAt(lengthCurrentLocation - 2)=="#"){
            $detailFicheTabs.tabs('select', currentLocation.charAt(lengthCurrentLocation - 1)); 
            return false;   
        }
        var map = null;

        //Correction bug jquery ui / google maps
        $detailFicheTabs.bind('tabsshow', function(event, ui) {
            if (ui.panel.id == 'map_tab' && !map)
            {
                $("#map-direction").html("");
                map = initialize();
                
            }
        

        });

    }
    
    //Gestion du buton itineraire de la fiche trajet
    if($("#itineraire").length){
        $("#itineraire").click(function(){
            if ($("#map-direction").css("display") == 'none') {
                $("#map-direction").show(300);
                $("#itineraire").attr("title", "Cacher l'itinéraire");
            } else {
                $("#map-direction").hide(300);
                $("#itineraire").attr("title", "Afficher l'itinéraire");
            }
            return false
        });
    }
    
    if($("#covoitureurFront_ss_mail_0").length){
        $('#covoitureurFront_ss_mail_0').click(function() {
            $("#nomailtext").show(300);
            $("#nomailzone").hide(300);
        });
    }
    if($("#covoitureurFront_ss_mail_1").length){
        $('#covoitureurFront_ss_mail_1').click(function() {
            $("#nomailtext").hide(300);
            $("#nomailzone").show(300);
        });
    }
	
	
    //Gestion de l'éco-calculateur'
    if($("#submit_annu").length){
        $("#submit_annu").click(function(){
					
            /* on recupere la valeur du kilometrage journalier */							 
            var nb_km = $("#nb_km").attr("value");
            if (nb_km!= parseInt(nb_km)){
                var nb_km = parseInt(nb_km);
            }
            /* nombre de personnes dans la voiture */
            if($("#nb_pers") && ($("#nb_pers").attr("value")!="")){
			
                var nb_pers = $("#nb_pers").attr("value");	
			
                if (nb_pers!= parseInt(nb_pers)){
                    var nb_pers = parseInt(nb_pers);
                }
			
            }
            if($("#nb_pers").attr("value")==""){
			
                var nb_pers = 2;	
			
            }
            /* frais en €/km */
            var frais = 0.82;
            /* nombre de jours ouvrés moyen par an */
            var nb_jour = 251;
            /* emmission moyenne de CO2 kg/km */
            var emmission = 0.515;
            /* consommation moyenne L/km */ 
            var conso = 0.2;
            /* kilometrage annuel */
            var km_annu = nb_km * nb_jour;
            /* calcul du coût annuel */				
            var cout_annu = km_annu * frais;	
            /* calcul des emmissions annuelles de gaz à effet de serre */
            var gaz_annu = km_annu * emmission;							
            /* calcul de la consommation annuelle de carburant */
            var conso_annu = km_annu*conso;
            /* calcul du cout annuel par covoitureur */
            var cout_annu_covoit = cout_annu / nb_pers;					
            /* calcul de l'emission annuelle de gaz à effet de serre par covoitureur*/
            var gaz_annu_covoit = gaz_annu / nb_pers;					
            /* calcul de la consomation annuelle de carburant*/
            var conso_annu_covoit = conso_annu / nb_pers;
            /* variable pour arrondir à deux décimales */
            var decimale = 100;					
            /* integration des resultat dans le tableau */
            $("#perso_cout").val(Math.round(cout_annu * decimale)/decimale);
            $("#perso_effet_serre").val(Math.round(gaz_annu * decimale)/decimale);
            $("#perso_energie").val(Math.round(conso_annu * decimale)/decimale);
            $("#coov_cout").val(Math.round(cout_annu_covoit * decimale)/decimale);
            $("#coov_effet_serre").val(Math.round(gaz_annu_covoit * decimale)/decimale);
            $("#coov_energie").val(Math.round(conso_annu_covoit * decimale)/decimale);
            return false; 
					
					
        });
    }
    if($("#submit_trajet").length){			
        $("#submit_trajet").click(function(){
			
					
            /* on recupere la valeur du kilometrage journalier */							 
            var nb_km = $("#nb_km").attr("value");
            if (nb_km!= parseInt(nb_km)){
                var nb_km = parseInt(nb_km);
            }
            /* nombre de personnes dans la voiture */
            if($("#nb_pers") && ($("#nb_pers").attr("value")!="")){
			
                var nb_pers = $("#nb_pers").attr("value");	
			
                if (nb_pers!= parseInt(nb_pers)){
                    var nb_pers = parseInt(nb_pers);
                }
			
            }
            if($("#nb_pers").attr("value")==""){
			
                var nb_pers = 2;	
			
            }
            
            /* frais en €/km */
            var frais = 0.82;
            /* emmission moyenne de CO2 kg/km */
            var emmission = 0.515;
            /* consommation moyenne L/km */ 
            var conso = 0.2;
            /* calcul du coût ponctuel */				
            var cout_ponctu = nb_km * frais;	
            /* calcul des emmissions ponctuel de gaz à effet de serre */
            var gaz_ponctu = nb_km * emmission;							
            /* calcul de la consommation ponctuel de carburant */
            var conso_ponctu = nb_km * conso;
            /* calcul du cout ponctuel par covoitureur */
            var cout_ponctu_covoit = cout_ponctu / nb_pers;					
            /* calcul de l'emission ponctuel de gaz à effet de serre par covoitureur*/
            var gaz_ponctu_covoit = gaz_ponctu / nb_pers;					
            /* calcul de la consomation ponctuel de carburant*/
            var conso_ponctu_covoit = conso_ponctu / nb_pers;
            /* variable pour arrondir à deux décimales */
            var decimale = 100;
            /* integration des resultat dans le tableau */
            $("#perso_cout").val(Math.round(cout_ponctu * decimale)/decimale);
            $("#perso_effet_serre").val(Math.round(gaz_ponctu * decimale)/decimale);
            $("#perso_energie").val(Math.round(conso_ponctu * decimale)/decimale);
            $("#coov_cout").val(Math.round(cout_ponctu_covoit * decimale)/decimale);
            $("#coov_effet_serre").val(Math.round(gaz_ponctu_covoit * decimale)/decimale);
            $("#coov_energie").val(Math.round(conso_ponctu_covoit * decimale)/decimale);
            return false; 
					
					
        });
    }
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
    //gestion type de covoiturage
    if($("#trajet_id_type_trajet").length){
        if($("#trajet_id_type_trajet").attr("value") == "0"){
            $("#regulier").hide();
            $("#ponctuel").hide();
            $("#psa").hide();
        } else if($("#trajet_id_type_trajet").attr("value") == "1"){
            $("#regulier").show();
            $("#ponctuel").hide();
            $("#psa").hide();
        } else if($("#trajet_id_type_trajet").attr("value") == "2") {
            $("#regulier").hide();
            $("#ponctuel").show();
            $("#psa").hide();
        } else {
            $("#regulier").hide();
            $("#ponctuel").hide();
            $("#psa").show();
        }
        $("#trajet_id_type_trajet").change(function() {
            if($("#trajet_id_type_trajet").attr("value") == "0"){
                $("#regulier").hide();
                $("#ponctuel").hide();
                $("#psa").hide();
            } else if($("#trajet_id_type_trajet").attr("value") == "1"){
                $("#regulier").show();
                $("#ponctuel").hide();
                $("#psa").hide();
            } else if($("#trajet_id_type_trajet").attr("value") == "2") {
                $("#regulier").hide();
                $("#ponctuel").show();
                $("#psa").hide();
            } else {
                $("#regulier").hide();
                $("#ponctuel").hide();
                $("#psa").show();
            }
        });
    }
    
    //Gestion de PSA
    if($("#covoitureurFront_cp_etablissement_id").length){
        if($("#covoitureurFront_cp_etablissement_id").attr("value") == "21"){
            $("#psa").show();
        }else{
            $("#psa").hide();
        }
        $("#covoitureurFront_cp_etablissement_id").change(function() {
            if($("#covoitureurFront_cp_etablissement_id").attr("value") == "21"){
                $("#psa").show();
            }else{
                $("#psa").hide();
            }
        });
    }
    
    if($("#trajet_id_etablissement").length){
        if($("#trajet_id_etablissement").attr("value") == "21"){
            $("#psa").show();
        }else{
            $("#psa").hide();
        }
        $("#trajet_id_etablissement").change(function() {
            if($("#trajet_id_etablissement").attr("value") == "21"){
                $("#psa").show();
            }else{
                $("#psa").hide();
            }
        });
    }    
    
    
});


