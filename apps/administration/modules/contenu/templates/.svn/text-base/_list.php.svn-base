

<table class="liste contenu-lie-detail">
  <thead>
    <tr>
      <th>Etat</th>
      <th>Visible</th>
      <th>Date création</th>
      <th>Date modification</th>
      <th>Titre</th>
      <th>Rubrique parente</th>
      <th>Priorité</th>
      <th>Date publication</th>
      <th>Date dépublication</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenus as $contenu): ?>
    <tr>

      <td><?php echo $contenu->getEtat() ?></td>
      <td><?php echo $contenu->getVisible() ?></td>
      <td><?php echo $contenu->getDateCreation() ?></td>
      <td><?php echo $contenu->getDateModification() ?></td>
      <td><?php echo $contenu->getFrTitre() ?></td>
     
      <td><?php echo ($contenu->getIdRubriqueParente()!=null? $contenu->getContenuRubrique():"") ?></td>
      <td><?php echo $contenu->getPriorite() ?></td>
      <td><?php echo $contenu->getDatePublication() ?></td>
      <td><?php echo $contenu->getDateDepublication() ?></td>

      <td class="view"><a href="<?php echo url_for('contenu/show?id_contenu='.$contenu->getIdContenu()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('contenu/edit?id_contenu='.$contenu->getIdContenu()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


