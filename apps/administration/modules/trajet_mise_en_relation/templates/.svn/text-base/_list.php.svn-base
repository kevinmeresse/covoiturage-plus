
<table class="mise-relation-date liste">
  <thead>
    <tr>      
      <th>Trajet</th>
      <th>Demandeur</th>
      <th>Dépositaire</th>
      <th>Date envoi</th>
      <th>Etat</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trajet_mise_en_relations as $trajet_mise_en_relation): ?>
    <tr>
      <td><?php echo $trajet_mise_en_relation->getTrajet()->getVilleDepartDestTrajet() ?></td>
      <td><?php echo $trajet_mise_en_relation->getDemandeurIdentite() ?></td>
      <td><?php echo $trajet_mise_en_relation->getCreateurIdentite() ?></td>
      <?php if ($trajet_mise_en_relation->getDateEnvoi() != "0000-00-00 00:00:00"): ?>
            <td><?php echo date("d-m-Y", strtotime($trajet_mise_en_relation->getDateEnvoi())) ?></td>
      <?php else: ?>
            <td>&nbsp;</td>
      <?php endif; ?>
      
      <td><?php 
      switch($trajet_mise_en_relation->getEtat()):
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
      echo $text ?></td>
      <td class="view"><a href="<?php echo url_for('trajet_mise_en_relation/show?id_trajet_mise_en_relation='.$trajet_mise_en_relation->getIdTrajetMiseEnRelation()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('trajet_mise_en_relation/edit?id_trajet_mise_en_relation='.$trajet_mise_en_relation->getIdTrajetMiseEnRelation()) ?>">Editer</a></td>     
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
