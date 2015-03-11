<?php use_helper('jQuery'); ?>
<h1>Modification de l'équipage</h1>

<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?><br></div>
<?php endif ?>
<?php include_partial('form', array('form' => $form, 'tab_ville_autoc' => $tab_ville_autoc, 'popup' => isset($popup)?$popup:0)) ?>
<br>
<?php include_component('trajet','listeTrajetAssocEquipage', array('id_equipage' => $id_equipage, 'id_trajet_origine' => $id_trajet_origine, 'popup' => isset($popup)?$popup:0)) ?>
<br>
<?php include_component('trajet','listeTrajetPourEquipage', array('id_equipage' => $id_equipage, 'popup' => isset($popup)?$popup:0)) ?>
