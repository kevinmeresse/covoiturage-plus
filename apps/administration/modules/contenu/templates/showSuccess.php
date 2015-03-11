

<table class="liste page-liee-detail">
  <tbody>
    
    <tr>
      <th>Etat:</th>
      <td><?php echo $contenu->getEtat() ?></td>
    </tr>
    <tr>
      <th>Visible:</th>
      <td><?php echo $contenu->getVisible() ?></td>
    </tr>
    <tr>
      <th>Date creation:</th>
      <td><?php echo $contenu->getDateCreation() ?></td>
    </tr>
    <tr>
      <th>Date modification:</th>
      <td><?php echo $contenu->getDateModification() ?></td>
    </tr>
    <tr>
      <th>Fr titre:</th>
      <td><?php echo $contenu->getFrTitre() ?></td>
    </tr>
    <tr>
      <th>Nombre visualisation:</th>
      <td><?php echo $contenu->getNombreVisualisation() ?></td>
    </tr>
    <tr>
      <th>Id createur:</th>
      <td><?php echo $contenu->getIdCreateur() ?></td>
    </tr>
    <tr>
      <th>Fr contenu html:</th>
      <td><?php echo $contenu->getFrContenuHtml(ESC_RAW) ?></td>
    </tr>
    <tr>
      <th>Id rubrique parente:</th>
      <td><?php echo $contenu->getIdRubriqueParente() ?></td>
    </tr>
    <tr>
      <th>Priorite:</th>
      <td><?php echo $contenu->getPriorite() ?></td>
    </tr>
    <tr>
      <th>Date publication:</th>
      <td><?php echo $contenu->getDatePublication() ?></td>
    </tr>
    <tr>
      <th>Date depublication:</th>
      <td><?php echo $contenu->getDateDepublication() ?></td>
    </tr>
    
  </tbody>
</table>



<p class="modifier"><a href="<?php echo url_for('contenu/edit?id_contenu='.$contenu->getIdContenu()) ?>">Modifier</a></p>

<p class="retour-liste"><a href="<?php echo url_for('contenu/index') ?>">Retour à la liste</a></p>

<br class="clear"/>