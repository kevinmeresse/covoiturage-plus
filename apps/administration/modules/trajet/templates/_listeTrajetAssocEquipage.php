<h3>Liste des trajets composant l'équipage</h3>

<br>
<div>
    <table class="liste trajet-covoit">
        
        <tbody>
            <?php foreach ($trajets as $trajet): ?>

            <thead>
                <tr>

                    <th>Trajet</th>
                    <th>Covoitureur</th>
                    <th colspan="2">Statut/Action</th>
                    <th>Date dernière action</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <?php 
            /*
             * affichage de la ligne trajet en fonction de la l'etat de la mer (mise en relation) associée
             * si mer
             *      etat = 2:           refusée
             *      etat = 5:           annulée par dépositaire trajet
             *      etat = 6:           annulée par demandeur MER
             *      => la ligne trajet est en rouge
             * 
             * si mer
             *      etat = 0:           en attente
             *      etat = 4:           sans réponse
             *      => la ligne trajet est en gris
             * 
             * si mer
             *      etat = 1:           sans réponse
             *      etat = 7:           équipagée
             *      => la ligne trajet est affichée normallement
             */
            
            /*
             * affichage de la ligne trajet en fonction du trajet
             *  => si trajet origine (dans enregistrement equipage) => affichage normal
             *  => si trajet associé                                => affichage italique
             */
            
            /*
            if ($trajet->getTmerid() ){//MER associée
                if ($trajet->getTmeretat() == 1 || $trajet->getTmeretat() == 7  ){
                    echo "<tr class=\"mer-normal\">";
                }elseif ($trajet->getTmeretat() == 2 || $trajet->getTmeretat() == 5  || $trajet->getTmeretat() == 6  ){
                    echo "<tr class=\"mer-refus\">";
                }else{
                    echo "<tr class=\"mer-attente\">";
                }
            }else{//pas de mer => affichage normal
                echo "<tr class=\"mer-normal\">";
            }
             * 
             */
            
            if($trajet->getIdTrajet() == $id_trajet_origine){
                echo "<tr class=\"trajet-origine\">";
            }else{
                echo "<tr class=\"trajet-associe\">";
            }
            

                ?>

                    <td>
                        <?php
                        echo link_to($trajet->getVilleDepartDestTrajet(), 'trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_trajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                            'target' => '_blank'
                        ))
                        ?>
                    </td>
                    <td>
                        <?php
                            echo link_to($trajet->getCovoitureur(), 'covoitureur/show?popup=1&id_utilisateur=' . $trajet->getCovoitureur()->getIdUtilisateur(), array(
                                'popup' => array('Covoiturage_Plus_Visualisation_covoitureur', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                                'target' => '_blank'
                            ))
                        ?>
                    </td>
                    <?php 
                        $valImage = sfConfig::get('app_coul_action_defaut');
                        if($trajet->getCpTypeActionStatutId() != null ){
                            $valImage = $trajet->getCpTypeActionStatut()->getCpTypeActionStatutCouleur();
                        }
                    ?>
                    <td ><?php echo image_tag('action/'. $valImage .'.png') ?></td>

                    <td><?php include_component('cp_action_cv','statutActionForm', array('id_utilisateur' => $trajet->getCovoitureur()->getIdUtilisateur(), 'id_statut' => $trajet->getCpTypeActionStatutId(), 'id_equipage' => $trajet->getIdEquipage(), 'id_trajet' => $trajet->getIdTrajet())) ?></td>
                    
                    <td>
                            <?php 
                            if(!is_null($trajet->getLastDateActionCv())){
                                echo date("d-m-Y", strtotime($trajet->getLastDateActionCv()));
                            }else{
                                echo "Non définie";
                            }

                                    
                                    ?>
                    
                    
                    
                    </td>

                    
                    <td class="suppr">
                        <?php if (isset($popup) && $popup == 1): ?>    
                            <?php echo link_to('Supprimer', 'trajet/deleteAssocUnTrajetEquipage?popup=1&id_trajet=' . $trajet->getIdTrajet() . '&id_equipage=' . $trajet->getIdEquipage(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?>
                        <?php else: ?>
                            <?php echo link_to('Supprimer', 'trajet/deleteAssocUnTrajetEquipage?id_trajet=' . $trajet->getIdTrajet() . '&id_equipage=' . $trajet->getIdEquipage(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?>
                        <?php endif; ?>
                    </td>
       
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

</div>
