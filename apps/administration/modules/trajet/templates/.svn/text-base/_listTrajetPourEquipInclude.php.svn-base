<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div>
    <table class="liste trajet-corres">
        <thead>
            <tr>
                <th>Inscrit</th>
                <th colspan="2">Trajet</th>
                <th>Type trajet</th>
                <th>Date création</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = true; $class = "odd"; ?>
            <?php foreach ($trajets as $trajet): ?>
            <?php if($i == true){$class = "odd"; $i = false;}else{$class = "even"; $i = true;} ?>
                <tr class="<?php echo $class; ?>">
                    <td>
                        <?php if($trajet->getCovoitureur()){
                            echo link_to($trajet->getCovoitureur(), 'covoitureur/show?popup=1&id_utilisateur=' . $trajet->getCovoitureur()->getIdUtilisateur(), array(
                                'popup' => array('Covoiturage_Plus_Visualisation_covoitureur', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                                'target' => '_blank'
                            ));
                        }else{
                            echo 'Pas de covoitureur';
                        }
                        ?>
                    </td>
                    <?php 
                        $valImage = sfConfig::get('app_coul_action_defaut');
                        if($trajet->getCpTypeActionStatutId() != null ){
                            $valImage = $trajet->getCpTypeActionStatut()->getCpTypeActionStatutCouleur();
                        }
                    ?>
                    <td ><?php echo image_tag('action/'. $valImage .'.png') ?></td>
                    <td>
                        
                        <?php $depDest =  $trajet->getDepartVille()." - ".$trajet->getDestinationVille() ?>
                        <?php
                            echo link_to($depDest, 'trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
                                'popup' => array('Covoiturage_Plus_Visualisation_trajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                                'target' => '_blank'
                            ))
                        ?>
                    </td>
                    <td>
                        <?php if ($trajet->getIdTypeTrajet() == 2): ?>
                    <?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDate())) ?>
                <?php elseif ($trajet->getIdTypeTrajet() == 3): ?>
                    PSA
                <?php else: ?>
                    Régulier
                <?php endif; ?>

                    </td>
                    <td><?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?></td>

                    <?php if($trajet->getIdEquipage() != 0):  ?>
                    <td  class="trajet-ajout-existe"><p></p></td>
                    <?php else: ?>
                        <td  class="trajet-ajout"><?php echo link_to('Ajouter', 'trajet/trajetEquipageAjout?id_trajet=' . $trajet->getIdTrajet() . "&id_equipage=" . $id_equipage,'title="Ajouter le trajet à l\'équipage"') ?></td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>