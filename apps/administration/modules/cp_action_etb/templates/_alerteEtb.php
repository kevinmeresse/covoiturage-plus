<div>

    <h3>Actions liées aux établissements</h3>

    <table class="liste action-assoc-etab">
        <thead>
            <tr>      
                <th>Date échéance</th>
                <th>Etablissement</th>
                <th>Type action</th>    
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cp_action_etbs as $cp_action_etb): ?>
                <tr>
                    <td><?php echo  date("d-m-Y", strtotime($cp_action_etb->getCpActionEtbDateEcheance())) ?></td>
                    <td><?php echo $cp_action_etb->getCpEtablissement() ?></td>
                    <td><?php echo $cp_action_etb->getCpTypeAction() ?></td>
                    <td class="edit"><a href="<?php echo url_for('cp_action_etb/editEtb?cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId()) ?>" title="Edition">Edition</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br></br>
</div>


