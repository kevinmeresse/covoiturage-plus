<h1>Visualisation des détails de l'action </h1>
<table  class="action-assoc-etab">
    <tfoot>
        <tr>
            <td colspan="2">

                <?php if (isset($popup) && $popup == 1): ?>
                    <p>
                    <FORM>
                        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                    </FORM>
                    </p>

                <?php else: ?>
                        <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/edit?cp_etablissement_id=' . $etb_id) ?>">Retour &agrave; la liste</a></p>
                <?php endif; ?>
                        <p class="modifier"><?php echo link_to('Modifier', 'cp_action_cv/edit?popup=1&cp_action_cv_id=' . $cp_action_cv->getCpActionCvId()) ?></p>

                        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_cv/delete?popup=1&cp_action_cv_id=' . $cp_action_cv->getCpActionCvId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

                    </td>
                </tr>
            </tfoot>
            <tbody>

                <tr>
                    <th>Inscrit</th>
                    <td>
                        <?php echo $cp_action_cv->getCovoitureur() ?>
                    </td>
                </tr>
                <tr>
                    <th>Type d'action</th>
                    <td>
                        <?php echo $cp_action_cv->getCpTypeAction() ?>
                    </td>
                </tr>
                <tr>
                    <th>Détail</th>
                    <td>
                        <?php echo $cp_action_cv->getCpActionCvDetail(ESC_RAW) ?>
                    </td>
                </tr>
                <tr>
                    <th>Date d'échéance</th>
                    <td>
                <?php echo $cp_action_cv->getCpActionCvDateEcheance() ?>
                    </td>
                </tr>
                <tr>
                    <th>Intervenant C+</th>
                    <td>
                        <?php echo $cp_action_cv->getUser() ?>
                    </td>
                </tr>

    </tbody>
</table>

