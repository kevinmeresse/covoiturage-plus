<?php use_helper('JavascriptBase','GMap') ?>
<?php use_helper('jQuery'); ?>
<h1>Nouvel établissement</h1>
<?php
$popup_value = isset($popup)?$popup:0;
?>
<?php include_partial('formFromRs', array('form' => $form, 'tab_ville_autoc' => $tab_ville_autoc,  'popup' => isset($popup)?$popup:0)) ?>
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