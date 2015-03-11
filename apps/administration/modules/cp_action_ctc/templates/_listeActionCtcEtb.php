<br>
<h3>Liste des actions menées auprès des contacts de l'établissement</h3>

<?php if ($liste_vide != 0): ?>
    <?php include_partial('cp_action_ctc/formlisteActionCtcEtb', array('cp_action_ctcs' => $cp_action_ctcs)) ?>
<?php else: ?>
    <div> Pas d'enregistrements</div>
<?php endif; ?>


