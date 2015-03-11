
<table class="liste rubriques-actu">
  <thead>
    <tr>
      <th>Etat</th>
      <th>Date création</th>
      <th>Date modification</th>
      <th>Nombre visualisation</th>
      <th>Titre</th>
      <th>Créateur</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenu_actualite_rubriques as $contenu_actualite_rubrique): ?>
    <tr>      
      <td><?php echo $contenu_actualite_rubrique->getEtat() ?></td>
      <td><?php echo $contenu_actualite_rubrique->getDateCreation() ?></td>
      <td><?php echo $contenu_actualite_rubrique->getDateModification() ?></td>
      <td><?php echo $contenu_actualite_rubrique->getNombreVisualisation() ?></td>
      <td><?php echo $contenu_actualite_rubrique->getFrTitre() ?></td>
      <td><?php echo $contenu_actualite_rubrique->getSfGuardUser() ?></td>
      <td class="view"><a href="<?php echo url_for('contenu_actualite_rubrique/show?id_actualite_rubrique='.$contenu_actualite_rubrique->getIdActualiteRubrique()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('contenu_actualite_rubrique/edit?id_actualite_rubrique='.$contenu_actualite_rubrique->getIdActualiteRubrique()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

