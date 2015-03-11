<?php use_helper('jQuery'); ?>

<?php //echo $message; ?>
<h1>Modification d'une communauté de communes</h1>

<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?><br></div>
<?php endif ?>

<?php include_partial('form', array('form' => $form, 'ville_ref' => $ville_ref)) ?>
<br></br>
<?php include_component('communaute_commune','listeVilleLiee', array('id_cc' => $id_cc,'addCcForm' => $addCcForm)) ?>


