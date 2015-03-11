<h1>Visualisation des détails de l'action </h1>
<?php 
    if (isset($prov)){
        $destProv = $prov;
    }else{
        $destProv = 'etb';
    }

?>
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
                        <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/edit?cp_etablissement_id=' . $etb_id.'&prov='.$destProv) ?>">Retour &agrave; la liste</a></p>
                <?php endif; ?>
                        <p class="modifier"><?php echo link_to('Modifier', 'cp_action_etb/editEtb?popup=1&cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId().'&prov='.$destProv) ?></p>

                        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_etb/delete?popup=1&cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

                    </td>
                </tr>
            </tfoot>
            <tbody>

                <tr>
                    <th>Etablissement / RS</th>
                    <td>
                        <?php echo $cp_action_etb->getCpEtablissement()." (".$cp_action_etb->getCpEtablissement()->getRSEtablissementRaisonSociale().")" ?>
                    </td>
                </tr>
                <tr>
                    <th>Type d'action</th>
                    <td>
                <?php echo $cp_action_etb->getCpTypeAction() ?>
                    </td>
                </tr>
                <tr>
                    <th>Date d'échéance</th>
                    <td>
                <?php echo date("d-m-Y", strtotime($cp_action_etb->getCpActionEtbDateEcheance())) ?>
                    </td>
                </tr>
                <tr>
                    <th>Intervenant C+</th>
                    <td>
                <?php echo $cp_action_etb->getUser() ?>
                    </td>
                </tr>

                <tr>
                    <th>Contact</th>
                    <td>
                <?php echo $cp_action_etb->getCpContact() ?>
                    </td>
                </tr>
                <tr>
                    <th>Détail</th>
                    <td>
                <?php echo $cp_action_etb->getCpActionEtbDetail() ?>
            </td>
        </tr>



    </tbody>
</table>

