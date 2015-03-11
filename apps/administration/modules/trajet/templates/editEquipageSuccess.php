<?php use_helper('jQuery'); ?>
<?php echo jq_add_plugins_by_name(array('ui')) ?>

<h1>Trajet <i><?php echo $depart_ville ?> - <?php echo $destination_ville ?> </i></h1>


    <?php include_partial('formAttacchEquipage', array('form' => $form,'covoitureur' => $covoitureur,'id_utilisateur' => $id_utilisateur, 'tab_ville_autoc' => $tab_ville_autoc, 'id_mer' => $id_mer, 'id_equipage' => $id_equipage)) ?>


