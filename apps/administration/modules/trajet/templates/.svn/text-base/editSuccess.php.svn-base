<?php use_helper('jQuery'); ?>
<?php //echo jq_add_plugins_by_name(array('ui')) ?>


<h1>Trajet <i><?php echo $depart_ville ?> - <?php echo $destination_ville ?> </i></h1>


<?php if($form->getObject()->isNew()): ?>
    <?php include_partial('form_1', array('form' => $form, 'popup' => isset($popup)?$popup:0)) ?>
<?php else: ?>
    <?php include_partial('form_1', array('form' => $form,'covoitureur' => $covoitureur,'id_utilisateur' => $id_utilisateur, 'tab_ville_autoc' => $tab_ville_autoc, 'popup' => isset($popup)?$popup:0)) ?>
<?php endif ;?>


