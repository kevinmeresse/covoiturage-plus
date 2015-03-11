<h1>Visualisation d'action auprès de <i><?php echo $ctc_name ?></i></h1>

<table>

    <tbody>

        <tr>
            <th>Type d'action</th>
            <td>
                <?php echo $cp_action_ctc->getCpTypeAction() ?>
            </td>
        </tr>
        <tr>
            <th>Date d'échéance</th>
            <td>
                <?php echo  date("d-m-Y", strtotime($cp_action_ctc->getCpActionCtcDateEcheance())) ?>
            </td>
        </tr>
        <tr>
            <th>Intervenant C+</th>
            <td>
                <?php echo $cp_action_ctc->getUser() ?>
            </td>
        </tr>
        <tr>
            <th>Détail</th>
            <td>
                <?php echo $cp_action_ctc->getCpActionCtcDetail() ?>
            </td>
        </tr>





    </tbody>
</table>
</div> 



<?php if (isset($popup) && $popup == 1): ?>

                    <p>
                    <FORM>
                        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                    </FORM>
                    </p>


<?php endif; ?>
                    <p class="modifier"><?php echo link_to('Modifier', 'cp_action_ctc/editCtc?popup=1&cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId()) ?></p>

                    <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_ctc/delete?popup=1&cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

