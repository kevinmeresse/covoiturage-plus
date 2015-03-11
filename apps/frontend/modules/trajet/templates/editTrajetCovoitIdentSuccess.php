<?php use_helper('jQuery'); ?>
<?php echo jq_add_plugins_by_name(array('ui')) ?>
<h1>Modifier le trajet</h1>
<?php //echo "TEST : ".$test; ?><br>
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?><br></div>
<?php endif ?>
<?php include_partial('formTrajetCovoitureur', array('form' => $form, 'tab_ville_autoc' => $tab_ville_autoc)) ?>
