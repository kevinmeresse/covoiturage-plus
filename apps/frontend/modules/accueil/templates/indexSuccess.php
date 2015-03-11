<?php use_helper('jQuery'); ?>

<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
  <br class="clear">
<?php endif ?>
  
<?php include_component('trajet', 'formRecherche') ?>
<?php if (!$sf_user->hasAttribute('id_covoitureur') || $sf_user->getAttribute('id_covoitureur') == 0): ?>
    <?php include_partial('accueil/inscritAccueil') ?>
<?php endif; ?>
<br class="clear">
<div class="sixteen column spacer">&nbsp;</div>
<br class="clear">
<?php include_component('actualite', 'infoAccueil') ?>
