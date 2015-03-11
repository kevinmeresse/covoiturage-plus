<h3>Liste des trajets</h3>
<form action="<?php echo url_for('trajet/editEquipage?id_trajet_init=' . $id_trajet_init . '&id_covoitureur_demandeur=' . $id_covoitureur_demandeur) ?>" method="post" >
    <input id="id_trajet_init" type="hidden" value="<?php echo $id_trajet_init ?>" name="trajet[id_trajet_init]"></input>
    <input id="id_covoitureur_demandeur" type="hidden" value="<?php echo $id_covoitureur_demandeur ?>" name="trajet[id_covoitureur_demandeur]"></input>
    <input id="id_mer" type="hidden" value="<?php echo $id_mer ?>" name="trajet[id_mer]"></input>
    <div>
        <table class="liste trajet-covoit">

            <thead>
                <tr>

                    <th>Ville départ</th>
                    <th>Ville destination</th>                
                    <th>Date</th>
                    <th>Equipagé</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($trajets as $trajet): ?>
                    <?php if ($trajet->getIdEquipage() != 0): ?>
                        <?php if ($trajet->getIdEquipage() == $id_equipage): ?>
                            <?php $indTrajetEquipageEnCours = true; ?>
                            <tr class="trajet-equipage-actif">
                            <?php else: ?>
                            <tr>
                            <?php endif; ?>
                            <?php $indTrajetEquipage = true; ?>
                        <?php endif; ?>

                        <td><?php echo $trajet->getDepartVille() ?></td>
                        <td><?php echo $trajet->getDestinationVille() ?></td>
                        <td><?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?></td>
                        <?php if ($trajet->getIdEquipage() != 0): ?>


                            <td><?php echo link_to('OUI', 'equipage/show?id_equipage=' . $trajet->getIdEquipage()) ?></td>
                        <?php else: ?>
                            <td>NON</td>
                        <?php endif; ?>

                        <td  class="view">
                            <?php
                            echo link_to('Détails', 'trajet/showTrajetCovoitureurPopup?id_trajet=' . $trajet->getIdTrajet(), array(
                                'popup' => array('Covoiturage_Plus', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0')
                            ))
                            ?>
                        </td>
                        <?php if (!$indTrajetEquipageEnCours && $etat_mer == 1 ): ?>
                            <?php if ($trajet->getIdEquipage() != 0): ?>
                                <td>&nbsp;</td>
                            <?php else: ?>
                                <td  class=""><input id="trajet_etat_<?php echo $trajet->getIdTrajet() ?>" type="radio" value="<?php echo $trajet->getIdTrajet() ?>" name="trajet[attach_trajet]"></td>
                            <?php endif; ?>
                        <?php else: ?>  
                            <td>&nbsp;</td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
                <?php if (!$indTrajetEquipageEnCours && $etat_mer == 1): ?>
                    <tr>
                        <td colspan="5">Nouveau trajet</td>
                        <td  class=""><input id="trajet_etat_new" type="radio" value="new" name="trajet[attach_trajet]"></td>

                    </tr>
                <?php endif; ?>
            </tbody>
            <?php if (!$indTrajetEquipageEnCours && $etat_mer == 1): ?>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <input type="submit" value="Rattacher le trajet à l'équipage" />
                        </td>
                    </tr>
                </tfoot>
            <?php endif; ?>
        </table>

        <br class="clear"/>
    </div>
</form>