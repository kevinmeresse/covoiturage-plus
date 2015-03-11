<h1>Modifier mon profil </h1>
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?><br></div>
<?php endif ?>
<?php include_partial('formCovoitureurProfil', array('form' => $form, 'tab_covoitureur_autoc' => $tab_covoitureur_autoc, 'tab_ville_autoc' => $tab_ville_autoc, 'covoitureur' => $covoitureur)) ?>
