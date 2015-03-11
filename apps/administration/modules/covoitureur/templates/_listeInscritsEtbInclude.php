<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table id="covoitureur" class="covoitureurs liste">
    <thead>
        <tr>
            <th>Inscrits</th>
            <th>Trajets</th>

        </tr>
    </thead>
    
        <?php foreach ($covoitureurs as $covoitureur): ?>
    <tbody>
            <tr>
                <td class="location">
                <?php
                $identite_covoitureur = '';
                $identite_covoitureur .= $covoitureur->getNom() . " ";
                $identite_covoitureur .= $covoitureur->getPrenom() . " ";
                if ($covoitureur->getMail() != '') {
                    $identite_covoitureur .= "(" . $covoitureur->getMail() . ")";
                }
                ?>

                <?php
                echo link_to($identite_covoitureur, 'covoitureur/show?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur(), array(
                    'popup' => array('Covoiturage_Plus_Visualisation_covoitureur', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                    'target' => '_blank'
                ))
                ?>
            </td>
            

            <td>
                <?php include_partial('covoitureur/listeTrajetCovoitureurInclude', array('trajets' => $covoitureur->getListeTrajetsAssocies())) ?>

                </td>

                </tr>
            
</tbody>
        <?php endforeach; ?>
    
    
</table>