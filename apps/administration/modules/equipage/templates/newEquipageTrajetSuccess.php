<?php use_helper('jQuery'); ?>
<h1>Nouvel Equipage</h1>

<?php if($messageInfo != ''): ?>
    <?php echo $messageInfo; ?>
<?php endif; ?>

<?php include_partial('form', array('form' => $form, 'tab_ville_autoc' => $tab_ville_autoc, 'id_trajet' => $id_trajet, 'popup' => isset($popup)?$popup:0)) ?>
