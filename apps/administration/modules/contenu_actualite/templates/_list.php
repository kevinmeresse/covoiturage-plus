

<table class="liste contenu-actu">
  <thead>
    <tr>
      <th>Etat</th>
      <th>Date création</th>
      <th>Date modification</th>
      <th>Nombre visualisation</th>
      <th>Titre</th>
      <th>Créateur</th>
      <th>Rubrique</th>
      <th>Envoi via newsletter</th>
      <th>Position</th>
      <th colspan="2">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenu_actualites as $contenu_actualite): ?>
    <tr>
      <td><?php echo $contenu_actualite->getEtat() ?></td>
      <td><?php echo $contenu_actualite->getDateCreation() ?></td>
      <td><?php echo $contenu_actualite->getDateModification() ?></td>
      <td><?php echo $contenu_actualite->getNombreVisualisation() ?></td>
      <td><?php echo $contenu_actualite->getFrTitre() ?></td>
      <td><?php echo $contenu_actualite->getSfGuardUser() ?></td>      
      <td><?php echo $contenu_actualite->getContenuActualiteRubrique()->getFrTitre() ?></td>
      <td><?php echo $contenu_actualite->getEnvoiViaNewsletter() ?></td>
      <td><?php echo $contenu_actualite->getPosition() ?></td>
      <td class="view"><a href="<?php echo url_for('contenu_actualite/show?id_actualite='.$contenu_actualite->getIdActualite()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('contenu_actualite/edit?id_actualite='.$contenu_actualite->getIdActualite()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

