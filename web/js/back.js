

$(document).ready(function() {
						   
    $("#covoitureur tr:odd").addClass("odd");
    $("#covoitureur tr:not(.odd)").hide();
    $("#covoitureur tr:first-child").show();
    $("#covoitureur tr.odd").click(function(){
										
        $(this).next("tr").toggle();

    });



    if($('#contenu')){
        var largeurTable = $('#contenu').children('table').outerWidth();
		
    }

    if($('.pagination')){
			
        var largeurLien = 16;
        var nblien = $('.pagination > a').size();
        var largeurPagination = largeurLien * nblien + 50 + (nblien*6) + 6 ;
			
        $('.pagination').css ("width" , largeurPagination );
        if ((largeurTable/2) < largeurPagination ) {
            $('.pagination').css ("margin-left" , ((largeurTable/2) - (largeurPagination/2)));
        }
        else {
            $('.pagination').css ("margin-left" , ((largeurTable/2) - (largeurPagination)));
        }
			
			
    }

    if($("#ville-etape-non")){
        $(".etape").hide();
        $("#ville-etape-non").click(function() {
            $(".etape").hide();
        });
    }
	
    if($("#ville-etape-oui")){
        $("#ville-etape-oui").click(function() {
            $(".etape").show();
        });
    }
	
	
     /*****************************************************/
     /***           Formulaire type action              ***/
     /*****************************************************/
    // gestion de l'affichage des champs du formulaire de type d'action
    if($("#cp_type_action_cp_type_action_cible_0").length){
        if($("#cp_type_action_cp_type_action_cible_0").is(":checked")) {
            $("#statut-action-form").hide();
        }else if($("#cp_type_action_cp_type_action_cible_1").is(":checked")){
            $("#statut-action-form").show();
            
        }
    }
    
    if($("#cp_type_action_cp_type_action_cible_0").length){
        $("#cp_type_action_cp_type_action_cible_0").click(function() {
            $("#statut-action-form").hide();
        });
    }
    
    if($("#cp_type_action_cp_type_action_cible_1").length){
        $("#cp_type_action_cp_type_action_cible_1").click(function() {
            $("#statut-action-form").show();
        });
    }
  
  


});