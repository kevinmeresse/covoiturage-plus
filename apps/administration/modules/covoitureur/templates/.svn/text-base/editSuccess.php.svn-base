<?php use_helper('jQuery'); ?>
<?php echo jq_add_plugins_by_name(array('ui')) ?>
<h1>Compte Inscrit</h1>

<?php include_partial('form', array('form' => $form, 'covoitureur' => $covoitureur, 'tab_ville_autoc' => $tab_ville_autoc, 'popup' => isset($popup)?$popup:0)) ?>

<br>
<?php include_component('cp_action_cv', 'listeActionCovoitureur', array('id_utilisateur' => $id_utilisateur)) ?>
