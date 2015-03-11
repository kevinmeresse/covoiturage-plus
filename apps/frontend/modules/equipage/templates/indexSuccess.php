<h1>Equipages List</h1>

<table>
  <thead>
    <tr>
      <th>Id equipage</th>
      <th>Id trajet</th>
      <th>Id createur</th>
      <th>Id site</th>
      <th>Cle</th>
      <th>Etat</th>
      <th>Date creation</th>
      <th>Nom equipage</th>
      <th>Id ville origine</th>
      <th>Id ville destination</th>
      <th>Date modification</th>
      <th>Id profil</th>
      <th>Commentaires</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($equipages as $equipage): ?>
    <tr>
      <td><a href="<?php echo url_for('equipage/show?id_equipage='.$equipage->getIdEquipage()) ?>"><?php echo $equipage->getIdEquipage() ?></a></td>
      <td><?php echo $equipage->getIdTrajet() ?></td>
      <td><?php echo $equipage->getIdCreateur() ?></td>
      <td><?php echo $equipage->getIdSite() ?></td>
      <td><?php echo $equipage->getCle() ?></td>
      <td><?php echo $equipage->getEtat() ?></td>
      <td><?php echo $equipage->getDateCreation() ?></td>
      <td><?php echo $equipage->getNomEquipage() ?></td>
      <td><?php echo $equipage->getIdVilleOrigine() ?></td>
      <td><?php echo $equipage->getIdVilleDestination() ?></td>
      <td><?php echo $equipage->getDateModification() ?></td>
      <td><?php echo $equipage->getIdProfil() ?></td>
      <td><?php echo $equipage->getCommentaires() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('equipage/new') ?>">New</a>
