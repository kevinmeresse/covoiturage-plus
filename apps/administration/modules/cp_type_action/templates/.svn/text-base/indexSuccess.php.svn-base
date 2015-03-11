<h1>Paramétrage des types d'action</h1>

<table class="liste type-actions">
    <thead>
        <tr>

            <th>Nom</th>
            <th>Ordre d'affichage</th>
            <th>Associée à</th>
            <th>Actions </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cp_type_actions as $cp_type_action): ?>
            <tr>
                <td><?php echo $cp_type_action->getCpTypeActionNom() ?></td>
                <td><?php echo $cp_type_action->getCpTypeActionOrdre() ?></td>
                <td>
                    <?php if ($cp_type_action->getCpTypeActionCible() == 0): ?>
                        contact/etablissement/inscrit
                    <?php elseif($cp_type_action->getCpTypeActionCible() == 1): ?>
                        trajet (avec statut)
                    <?php else: ?>
                        aucun
                    <?php endif; ?>

                </td>
                <td class="edit"><a href="<?php echo url_for('cp_type_action/edit?cp_type_action_id=' . $cp_type_action->getCpTypeActionId()) ?>"><?php echo $cp_type_action->getCpTypeActionId() ?></a></td>


            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="nouveau"><a href="<?php echo url_for('cp_type_action/new') ?>">Nouveau</a></p>

<br class="clear"/>