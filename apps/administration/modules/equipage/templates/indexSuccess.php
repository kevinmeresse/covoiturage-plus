<h1>Equipages List</h1>

<table class="liste equipages-id">
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
    </tr>
  </thead>
  <tbody>
    <?php foreach ($equipages as $equipage): ?>
    <tr>
      <td><a href="<?php echo url_for('equipage/edit?id_equipage='.$equipage->getIdEquipage()) ?>"><?php echo $equipage->getIdEquipage() ?></a></td>
      <td><?php echo $equipage->getIdTrajet() ?></td>
      <td><?php echo $equipage->getIdCreateur() ?></td>
      <td><?php echo $equipage->getIdSite() ?></td>
      <td><?php echo $equipage->getCle() ?></td>
      <td><?php echo $equipage->getEtat() ?></td>
      <td><?php echo $equipage->getDateCreation() ?></td>
      <td><?php echo $equipage->getNomEquipage() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('equipage/new') ?>">New</a>
