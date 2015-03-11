<div>
    <table class="liste action-assoc-etab">
        <thead>
            <tr>
                <th>Contact</th>
                <th>Type action</th>
                <th>Date échéance</th>
                <th>Intervenant C+</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cp_action_ctcs as $cp_action_ctc): ?>
                <tr>
                    <td><?php echo $cp_action_ctc->getCpContact() ?></td>
                    <td><?php echo $cp_action_ctc->getCpTypeAction()->getCpTypeActionNom() ?></td>
                    <td><?php echo date("d-m-Y", strtotime($cp_action_ctc->getCpActionCtcDateEcheance())) ?></td>
                    <td><?php echo $cp_action_ctc->getIntervenantCp() ?></td>
                    <td class="edit"><a href="<?php echo url_for('cp_action_ctc/editCtc?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId()) ?>">Edit</a></td>
                    <td class="suppr"><?php echo link_to('Delete', 'cp_action_ctc/delete1?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

