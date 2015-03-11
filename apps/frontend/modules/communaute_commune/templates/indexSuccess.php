<?php use_helper('JavascriptBase', 'GMap') ?>
<div id="annuaire">
    <h1>Annuaire des communautés de commmunes</h1>  			

    <p class="chapo">Vous êtes de plus en plus nombreux, au sein d’entreprises ou collectivités, à vouloir développer le covoiturage comme moyen de faire face à la flambée du prix du pétrole.<br />
Vous êtes de plus en plus nombreux également à solliciter notre intervention. Ces raisons nous amènent donc à produire cet annuaire des collectivités qui adhèrent à Covoiturage+.<br />
Vous avez aussi accès aux pages dédiées que nous proposons aux collectivités pour souligner leur implication dans le covoiturage.</p>


    <?php include_map($gMap, array('width' => '512px', 'height' => '400px')); ?>

    <!-- Javascript included at the bottom of the page -->
    <?php include_map_javascript($gMap); ?>
</div>
