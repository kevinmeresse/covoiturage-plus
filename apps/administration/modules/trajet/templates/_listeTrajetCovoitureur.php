<h3>Liste des trajets</h3>
<div>
    <table class="liste trajet-covoit">
        <thead>
            <tr>

                <th colspan="2">Départ - Arrivée</th>
                <th>Date</th>
                <th>Type trajet</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($trajets as $trajet): ?>
                <tr>
                    <?php 
                        $valImage = sfConfig::get('app_coul_action_defaut');
                        if($trajet->getCpTypeActionStatutId() != null ){
                            $valImage = $trajet->getCpTypeActionStatut()->getCpTypeActionStatutCouleur();
                        }
                    ?>
                    <td ><?php echo image_tag('action/'. $valImage .'.png') ?></td>
                    <td><?php $depDest =  $trajet->getDepartVille()." - ".$trajet->getDestinationVille() ?>
                    <?php
                        echo link_to($depDest, 'trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_trajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                            'target' => '_blank'
                        ))
                        ?>

                    </td>
                    <td><?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?></td>
                    
                    <td>
                        <?php 
                            if($trajet->getIdTypeTrajet() != 0 ){
                                echo $trajet->getTrajetTypeCovoiturage();
                            }else{
                                echo "non défini";
                            }
                         
                                
                                ?>
                        
                    </td>        
                            
                            

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p class="nouveau">
        <?php
            echo link_to('Nouveau', 'trajet/newCovoitureurTrajet?popup=1&id_utilisateur=' . $id_utilisateur, array(
                'popup' => array('Covoiturage_Plus_creation_trajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                'target' => '_blank'
            ))
        ?>
        </p>

    <br class="clear"/>
</div>
