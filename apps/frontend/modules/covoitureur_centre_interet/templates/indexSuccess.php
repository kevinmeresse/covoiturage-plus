<h1>Covoitureur centre interets List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id centre interet</th>
      <th>Id utilisateur</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureur_centre_interets as $covoitureur_centre_interet): ?>
    <tr>
      <td><a href="<?php echo url_for('covoitureur_centre_interet/show?id='.$covoitureur_centre_interet->getId()) ?>"><?php echo $covoitureur_centre_interet->getId() ?></a></td>
      <td><?php echo $covoitureur_centre_interet->getIdCentreInteret() ?></td>
      <td><?php echo $covoitureur_centre_interet->getIdUtilisateur() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('covoitureur_centre_interet/new') ?>">New</a>
