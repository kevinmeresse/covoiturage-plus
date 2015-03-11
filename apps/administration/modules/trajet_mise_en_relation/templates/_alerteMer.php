<div>

    <h3>Dernières mise en relation</h3>

    <table class="mise-relation-date liste">
        <thead>
            <tr>      
                <th>Trajet</th>
                <th>Demandeur</th>
                <th>Créateur</th>
                <th>Date création</th>
                <th>Etat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mises_en_relations as $mises_en_relation): ?>
                <tr>
                    <td><?php echo $mises_en_relation->getTrajet()->getVilleDepartDestTrajet() ?></td>
                    <td><?php echo $mises_en_relation->getDemandeurIdentite() ?></td>
                    <td><?php echo $mises_en_relation->getCreateurIdentite() ?></td>
                    <td><?php echo date("d-m-Y", strtotime($mises_en_relation->getDateCreation())) ?></td>
                    <td>


                    <?php
                    switch ($mises_en_relation->getEtat()):
                        case 0:
                            $text = sfConfig::get('sf_desc_ind__mer_0');
                            break;
                        case 1:
                            $text = sfConfig::get('sf_desc_ind__mer_1');
                            break;
                        case 2:
                            $text = sfConfig::get('sf_desc_ind__mer_2');
                            break;
                        case 4:
                            $text = sfConfig::get('sf_desc_ind__mer_4');
                            break;
                        case 5:
                            $text = sfConfig::get('sf_desc_ind__mer_5');
                            break;
                        case 6:
                            $text = sfConfig::get('sf_desc_ind__mer_6');
                            break;
                        case 7:
                            $text = sfConfig::get('sf_desc_ind__mer_7');
                            break;
                        default:
                            $text = "non renseigné";
                            break;
                    endswitch;
                    echo $text ?>
                </td>
                <td class="edit"><a href="<?php echo url_for('trajet_mise_en_relation/edit?id_trajet_mise_en_relation=' . $mises_en_relation->getIdTrajetMiseEnRelation()) ?>" title="Edition">Editer</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
