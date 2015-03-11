<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="liste trajet-date">
    <thead>
        <tr>
            <th>Inscrit</th>
            <th>départ / destination</th>
            <th>Type du trajet</th>
            <th>Statut</th>
            <th>Date création</th>
            <th>Equipagé</th>
        </tr>
    </thead>
    <?php foreach ($trajets as $i => $trajet): ?>
        <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

            <td class="location">

            <?php
                echo link_to($trajet->getCovoitureur(), 'covoitureur/show?popup=1&id_utilisateur=' . $trajet->getCovoitureur()->getIdUtilisateur(), array(
                    'popup' => array('Covoiturage_Plus_Visualisation_covoitureur', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                    'target' => '_blank'
                ))
            ?>
            </td>

            <td class="company">
                <?php
                        echo link_to($trajet->getVilleDepartDestTrajet(), 'trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_trajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                            'target' => '_blank'
                        ))
                        ?>
            </td>
            <td class="company">
                <?php if ($trajet->getIdTypeTrajet() == 2): ?>
                    <?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDate())) ?>
                <?php elseif ($trajet->getIdTypeTrajet() == 3): ?>
                    PSA
                <?php else: ?>
                    Régulier
                <?php endif; ?>
            </td>

            
            <?php 
                $valImage = sfConfig::get('app_coul_action_defaut');
                if($trajet->getCpTypeActionStatutId() != null ){
                    $valImage = $trajet->getCpTypeActionStatut()->getCpTypeActionStatutCouleur();
                }
            ?>
           <td ><?php echo image_tag('action/'. $valImage .'.png') ?></td>
                    
            <td class="company">
                <?php //if($trajet->getIdTypeTrajet() ==)  ?>
                <?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?>
            </td>

            <?php if ($trajet->getIdEquipage() != 0): ?>
                        <td class="<?php echo $trajet->getClassEtatTrajetCss() ?>"><?php echo link_to('OUI', 'equipage/show?id_equipage=' . $trajet->getIdEquipage()) ?> </td>
            <?php else: ?>
                <td>NON</td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>