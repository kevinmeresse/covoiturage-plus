<h3>Liste des inscrits rattaché à cet équipage</h3>
<div>
    <table class="liste trajet-covoit">
        <thead>
            <tr>

                <th>Identité</th>
                <th colspan="2">Trajet</th>
                <th>Type de trajet</th>
                <th>Date création</th>
            </tr>
        </thead>
        <tbody>
    <?php if ($trajets!= null): ?>
            <?php foreach ($trajets as $trajet): ?>
                <tr>
                    <td><?php $identite =  $trajet->getCovNom()." ".$trajet->getCovPrenom() ?>
                    <?php
                        echo link_to($identite, 'covoitureur/show?popup=1&id_utilisateur=' . $trajet->getIdUtilisateur(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_covoitureurEquipage', 'width=' . sfConfig::get('app_larg_popup_covoitureur') . ',height=' . sfConfig::get('app_haut_popup_covoitureur') . ',left=320,top=0,scrollbars=yes'),
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
                    <td><?php $depDest =  $trajet->getDepartVille()." - ".$trajet->getDestinationVille() ?>
                         <?php
                        echo link_to($depDest, 'trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_trajetEquipage', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                            'target' => '_blank'
                        ))
                        ?>
                    </td>
                    <td><?php echo $trajet->getTrajetTypeCovoiturage() ?></td>
                    <td><?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?></td>
                </tr>
            <?php endforeach; ?>
    <?php endif; ?>
        </tbody>
    </table>

    
</div>
