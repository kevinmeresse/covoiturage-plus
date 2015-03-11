<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="trajets-front liste">
    <thead>
        <tr>
            <th colspan="3">Actions</th>
            <th>Activer/Désactiver</th>            
            <th>Ville de départ</th>
            <th>Ville d'arrivée</th>
            <th>Type de trajet</th>
            <!--<th>Equipage</th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($trajets as $i => $trajet): ?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?> <?php echo ($trajet->getActif() == 0) ? 'inactif' : 'actif' ?>">
                <td class="view">
                    <a href="<?php echo url_for('trajet/view?id_trajet='.$trajet->getIdTrajet().'&from=pref') ?>" title="Visualiser le trajet"><?php echo $trajet->getIdTrajet() ?></a>
                </td>
                <td class="edit">
                    <a href="<?php echo url_for('trajet/editTrajetCovoitIdent?id_trajet=' . $trajet->getIdTrajet()) ?>" title="Modifier le trajet"><?php echo $trajet->getIdTrajet() ?></a>
                </td>
                <td class="suppr" title="Supprimer le trajet">
                    <?php echo link_to('Supprimer le trajet', 'trajet/deleteTrajetCovoitIdent?id_trajet=' . $trajet->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Etes vous sur?')) ?>
                </td>
                <?php if ($trajet->getActif() == 0): ?>
                    <td class="active">
                        <?php echo link_to('Activer', 'trajet/activeTrajetCovoitIdent?id_trajet=' . $trajet->getIdTrajet()) ?>
                    </td>  
                <?php elseif ($trajet->getActif() == 1): ?>
                    <td class="desactive">
                        <?php echo link_to('Désactiver', 'trajet/desactiveTrajetCovoitIdent?id_trajet=' . $trajet->getIdTrajet()) ?>
                    </td>
                <?php endif; ?>
                
                <td>
                    <?php echo $trajet->getDepartVille() ?>
                </td>

                <td>
                    <?php echo $trajet->getDestinationVille() ?>
                </td>
                <td>
                    <?php echo $trajet->getTypeTrajet() ?>
                </td>
                <!--
                <?php if ($trajet->getIdEquipage() == 0): ?>
                    <td class="active">
                        &nbsp;
                    </td>  
                <?php else: ?>
                    <td class="desactive">
                        <?php echo link_to('Equipage', 'equipage/showCovoitureurEquipage?id_equipage=' . $trajet->getIdEquipage()) ?>
                    </td>
                <?php endif; ?>
                -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br class="clear"/>
<br/>