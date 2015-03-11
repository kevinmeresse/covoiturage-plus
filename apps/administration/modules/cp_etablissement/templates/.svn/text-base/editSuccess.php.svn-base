<?php use_helper('jQuery'); ?>
<h1>Modification de l'établissement</h1>
<?php include_partial('form', array('form' => $form, 'popup' => isset($popup)?$popup:0,'raison_sociale' => $raison_sociale)) ?>
<script>
    $(function() {
        //var addresspicker = $( "#addresspicker" ).addresspicker();
        var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
            elements: {
                map:      "#map",
                lat:      "#cp_etablissement_cp_etablissement_latitude",
                lng:      "#cp_etablissement_cp_etablissement_longitude",
                route:    '#cp_etablissement_cp_etablissement_adresse1',
                locality: '#cp_etablissement_ville',
                postal_code: '#cp_etablissement_cp_etablissement_code_postal'
            }
        });
        var gmarker = addresspickerMap.addresspicker( "marker");
        gmarker.setVisible(true);
        addresspickerMap.addresspicker( "updatePosition");
		
    });
</script>    

