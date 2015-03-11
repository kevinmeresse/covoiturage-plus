<?php use_helper('JavascriptBase', 'GMap') ?>
<?php use_helper('jQuery'); ?>
<h1>Visualisation de la raison sociale</h1>

<table class="etablissementRS-edit">
    <tfoot>
        <tr>
            <td colspan="2">

                <?php if ($popup == 1): ?>
                    <p>
                    <FORM>
                        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                    </FORM>
                    </p>
                    <p class="modifier"><?php echo link_to('Modifier', 'cp_etablissement/editSociete?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId()) ?></p>

                    <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement/deleteSociete?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

                <?php else: ?>
                    <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/indexSociete') ?>">Retour &agrave; la liste</a></p>
                    <p class="modifier"><?php echo link_to('Modifier', 'cp_etablissement/editSociete?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId()) ?></p>

                    <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement/deleteSociete?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

                <?php endif; ?>



            </td>
        </tr>
    </tfoot>
    <tbody>

        <tr>
            <th>Raison sociale</th>
            <td>
                <?php echo $cp_etablissement->getCpEtablissementRaisonSocial() ?>

            </td>
        </tr>

        <tr>
            <th>Statut</th>
            <td>
                <?php echo $cp_etablissement->getCpEtablissementStatut() != null ? $cp_etablissement->getCpEtablissementStatut() : '' ?>
            </td>
        </tr>

        <tr>
            <th>Commentaires</th>
            <td>
                <?php echo $cp_etablissement->getCpEtablissementCommentaire() ?>

            </td>
        </tr>



    </tbody>
</table>

<br>

<?php include_component('cp_etablissement', 'listeEtablissementPourRs', array('idRs' => $cp_etablissement->getCpEtablissementId())) ?>

<br class="clear"/>
<hr />
<table class="ss-tab">
    <tr>
        <td class="partage2"><?php include_component('cp_contact', 'listeContactEtb', array('etb' => $cp_etablissement->getCpEtablissementId(), 'popup' => isset($popup) ? $popup : 0, 'listeIntegre' => isset($listeIntegre) ? $listeIntegre : 0, 'prov' => 'rs')) ?></td>
        <td>&nbsp;</td>
        <td class="partage2"><?php include_component('cp_action_etb', 'listeActionEtb', array('etb' => $cp_etablissement->getCpEtablissementId(), 'popup' => isset($popup) ? $popup : 0, 'listeIntegre' => isset($listeIntegre) ? $listeIntegre : 0, 'prov' => 'rs')) ?></td>
    </tr>
</table>


