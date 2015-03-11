<?php use_helper('jQuery'); ?>
<?php echo jq_add_plugins_by_name(array('ui')) ?>

<h1>New Trajet</h1>

<?php include_partial('form_1', array('form' => $form, 'tab_ville_autoc' => $tab_ville_autoc, 'popup' => isset($popup)?$popup:0)) ?>
