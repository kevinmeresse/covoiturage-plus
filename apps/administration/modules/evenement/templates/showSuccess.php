<?php use_helper('date'); ?> 
<table>
  <tbody>
    
    <tr>
      <th>Etat:</th>
      <td><?php echo $evenement->getEtat() ?></td>
    </tr>
    <tr>
      <th>Date creation:</th>
      <td><?php echo format_date($evenement->getDateCreation(), 'U', 'fr_FR'); ?></td>
    </tr>
    <tr>
      <th>Date modification:</th>
      <td><?php echo format_date($evenement->getDateModification(), 'U', 'fr_FR') ?></td>
    </tr>
    <tr>
      <th>Date publication:</th>
      <td><?php echo format_date($evenement->getDatePublication(), sfConfig::get("app_fr_format_date_long")); ?></td>
    </tr>
    <tr>
      <th>Date depublication:</th>
      <td><?php echo format_date($evenement->getDateDepublication("d/m/Y"), sfConfig::get("app_fr_format_date_long")) ?></td>
    </tr>
    <tr>
      <th>Libelle:</th>
      <td><?php echo $evenement->getLibelle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $evenement->getDescription() ?></td>
    </tr>
    <tr>
      <th>Id commune:</th>
      <td><?php echo $evenement->getVilleFr() ?></td>
    </tr>

  </tbody>
</table>

<hr />
<p class="editer">
<a href="<?php echo url_for('evenement/edit?id_evenement='.$evenement->getIdEvenement()) ?>">Modifier</a>
</p>
<p class="retour-liste">
<a href="<?php echo url_for('evenement/index') ?>">Retour &agrave; la liste</a>
</p>

<br class="clear"/>