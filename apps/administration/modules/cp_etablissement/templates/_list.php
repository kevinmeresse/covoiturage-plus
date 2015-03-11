<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="liste etablissements-liste">
    <thead>
        <tr>
            <th>Raison sociale</th>
            <th>Nom établissement </th>
            <th>Nb salariés</th>
            <th>Ville</th>
            <th>Zone</th>
            <th>Statut</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($cp_etablissements as $cp_etablissement): ?>
            <tr>
                <?php if ($cp_etablissement->getCpEtablissementTypeSociete() == 1): ?>
                    <td class="soc_rs"><?php echo $cp_etablissement->getCpEtablissementRaisonSocial() ?></td>
                <?php else: ?>
                    <td class="etb_rs"><?php echo $cp_etablissement->getCpEtablissement()->getCpEtablissementRaisonSocial() ?></td>
                <?php endif; ?>
                <td>
                <?php
                    echo link_to($cp_etablissement->getCpEtablissementEtablissementNom(), 'cp_etablissement/visu?popup=1&listeIntegre=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(), array(
                        'popup' => array('Covoiturage_Plus_Visualisation', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0,scrollbars=yes'),
                        'target' => '_blank'
                    ))
                    ?>
                </td>
                <td><?php echo $cp_etablissement->getCpEtablissementNbSalarie() ?></td>
                <td><?php echo $cp_etablissement->getVilleFr() ?></td>

                <td><?php echo $cp_etablissement->getLieu()->getLibelleLieu() ?><?php //echo $cp_etablissement->getCpEtablissementZoneId()  ?></td>
                <td><?php echo $cp_etablissement->getCpEtablissementStatut()->getCpEtablissementStatutNom() ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="nouveau">
<?php
                    echo link_to('Nouveau', 'cp_etablissement/new?popup=1', array(
                        'popup' => array('Covoiturage_Plus_Creation', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0'),
                        'target' => '_blank'
                    ))
                    ?>
</p>
<br class="clear"/>