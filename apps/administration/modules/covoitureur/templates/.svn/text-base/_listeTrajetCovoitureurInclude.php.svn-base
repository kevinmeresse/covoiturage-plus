<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="trajet_liste_include">

    <?php if (count($trajets) > 0): ?>
        <?php foreach ($trajets as $i => $trajet): ?>
            <tr>
                <?php 
                        $valImage = sfConfig::get('app_coul_action_defaut');
                        if($trajet->getCpTypeActionStatutId() != null ){
                            $valImage = $trajet->getCpTypeActionStatut()->getCpTypeActionStatutCouleur();
                        }
                    ?>
                    <td ><?php echo image_tag('action/'. $valImage .'.png') ?></td>
                
                <td >

                    <?php
                        echo link_to($trajet->getDepartVille() . " / " . $trajet->getDestinationVille(), 'trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_trajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0'),
                            'target' => '_blank'
                        ))
                    ?>
                </td>

            </tr>
        <?php endforeach; ?>
    <?php else: ?>

        <tr>
            <td >
                <?php echo " Pas de trajet "; ?>

            </td>

        </tr>
    <?php endif; ?>

</table>