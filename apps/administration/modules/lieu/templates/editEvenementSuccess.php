<?php use_helper('jQuery'); ?>

<h1>Modification de l'évènement</h1>

<?php include_partial('form', array('form' => $form, 'tab_ville_autoc' => $tab_ville_autoc)) ?>


<script>
    $(function() {
        //var addresspicker = $( "#addresspicker" ).addresspicker();
        var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
            elements: {
                map:      "#map",
                lat:      "#lieu_latitude",
                lng:      "#lieu_longitude",
                route:    '#lieu_adresse',
                locality: '#lieu_ville',
                postal_code: '#lieu_code_postal'
            }
        });
        var gmarker = addresspickerMap.addresspicker( "marker");
        gmarker.setVisible(true);
        addresspickerMap.addresspicker( "updatePosition");
		
    });
</script>    

