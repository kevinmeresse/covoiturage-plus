<h1>Modification du contact</h1>

<?php include_partial('form1', array('form' => $form, 'etb_name' => $etb_name, 'etb_id' => $etb_id, 'popup' => $popup, 'prov' => isset($prov) ? $prov : 'etb')) ?>

<?php include_component('cp_action_ctc','listeActionCtc', array('ctc' => $ctc)) ?>
