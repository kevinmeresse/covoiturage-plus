
<table class="liste evenement">
  <thead>
    <tr>
      <th>Etat</th>
      <th>Date creation</th>
      <th>Date modification</th>
      <th>Date publication</th>
      <th>Date depublication</th>
      <th>Libelle</th>
      <th>Description</th>
      <th>Commune</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($evenements as $evenement): ?>
    <tr>
      
      <td><?php echo $evenement->getEtat() ?></td>
      <td><?php echo $evenement->getDateCreation() ?></td>
      <td><?php echo $evenement->getDateModification() ?></td>
      <td><?php echo $evenement->getDatePublication() ?></td>
      <td><?php echo $evenement->getDateDepublication() ?></td>
      <td><?php echo $evenement->getLibelle() ?></td>
      <td><?php echo $evenement->getDescription() ?></td>
      <td><?php echo $evenement->getVilleFr() ?></td>
      <td><a href="<?php echo url_for('evenement/show?id_evenement='.$evenement->getIdEvenement()) ?>">Visualiser</a></td>
      <td><a href="<?php echo url_for('evenement/show?id_evenement='.$evenement->getIdEvenement()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

