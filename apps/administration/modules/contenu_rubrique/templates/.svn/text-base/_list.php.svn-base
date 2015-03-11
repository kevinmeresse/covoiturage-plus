
<table class="liste rubriques-cms">
  <thead>
    <tr>
      <th>Etat</th>
      <th>Rubrique parente</th>
      <th>Titre</th>
      <th>Priorité</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenu_rubriques as $contenu_rubrique): ?>
    <tr>
      <td><?php echo $contenu_rubrique->getEtat() ?></td>
      <td><?php echo $contenu_rubrique->getContenuRubrique()->getFrTitre() ?></td>
      <td><?php echo $contenu_rubrique->getFrTitre() ?></td>
      <td><?php echo $contenu_rubrique->getPriorite() ?></td>
      <td class="view"><a href="<?php echo url_for('contenu_rubrique/show?id_rubrique='.$contenu_rubrique->getIdRubrique()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('contenu_rubrique/edit?id_rubrique='.$contenu_rubrique->getIdRubrique()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
