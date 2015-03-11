<?php use_helper('jQuery'); ?>
<?php echo jq_add_plugins_by_name(array('ui')) ?>
<h1>Edit Evenement</h1>

<?php include_partial('form', array('form' => $form,'tab_ville_autoc' => $tab_ville_autoc)) ?>
