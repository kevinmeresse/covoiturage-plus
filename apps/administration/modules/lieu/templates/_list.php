<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="liste lieu">
    <thead>
        <tr>
            <th>Type</th>
            <th>
                <?php if ($tab_ville_autoc['evenement'] == 0): ?>
                    Lieu
                <?php else: ?>
                    Evènement
                <?php endif; ?>
            </th>      
            <th>Ville</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>

    <?php foreach ($lieux as $i => $lieu): ?>
        <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
            <td><?php echo $lieu->getLieuType()->getLibelleLieuType() ?></td>
            <td class="location">
                <?php echo $lieu->getLibelleLieu() ?>
            </td>

            <td><?php echo $lieu->getExtractNomVille($lieu->getCodeInsee()) ?></td>
            <?php if ($lieu->getLieuType()->getEvenement() == 0): ?>
                <td class="tab-center edit"><a href="<?php echo url_for('lieu/edit?id_lieu=' . $lieu->getIdLieu()) ?>" title="Editer"><?php echo $lieu->getIdLieu() ?></a></td>                
                <td class="tab-center suppr"><?php echo link_to('Supprimer le lieu', 'lieu/delete?id_lieu=' . $lieu->getIdLieu(), array('method' => 'delete', 'confirm' => 'Etes vous sur?', 'title' => 'Supprimer')) ?></td>
            <?php else: ?>
                <td class="tab-center edit"><a href="<?php echo url_for('lieu/editEvenement?id_lieu=' . $lieu->getIdLieu()) ?>" title="Editer"><?php echo $lieu->getIdLieu() ?></a></td>
                <td class="tab-center suppr"><?php echo link_to('Supprimer le lieu', 'lieu/deleteEvenement?id_lieu=' . $lieu->getIdLieu(), array('method' => 'deleteEvenement', 'confirm' => 'Etes vous sur?', 'title' => 'Supprimer')) ?></td>
            <?php endif; ?>
        </tr>

    <?php endforeach; ?>
</table>