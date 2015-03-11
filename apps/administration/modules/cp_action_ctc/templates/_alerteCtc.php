<div>

    <h3>Actions liées aux contacts</h3>

    <table class="liste action-assoc-etab">
        <thead>
            <tr>      
                <th>Date échéance</th>
                <th>Contact</th>
                <th>Etablissement/RS</th>
                <th>Type action</th>    
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cp_action_ctcs as $cp_action_ctc): ?>
                <tr>
                    <td><?php echo date("d-m-Y", strtotime($cp_action_ctc->getCpActionCtcDateEcheance()))   ?></td>
                    <td><?php echo $cp_action_ctc->getCpContact() ?></td>
                    <td><?php echo $cp_action_ctc->getCpContact()->getCpEtablissement()." (".$cp_action_ctc->getCpContact()->getCpEtablissement()->getRSEtablissementRaisonSociale().")"; ?></td>
                    <td><?php echo $cp_action_ctc->getCpTypeAction() ?></td>
                    <td class="edit"><a href="<?php echo url_for('cp_action_ctc/editCtc?cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId()) ?>" title="Edition">Edition</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br></br>
</div>


