<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $covoitureur_centre_interet->getId() ?></td>
    </tr>
    <tr>
      <th>Id centre interet:</th>
      <td><?php echo $covoitureur_centre_interet->getIdCentreInteret() ?></td>
    </tr>
    <tr>
      <th>Id utilisateur:</th>
      <td><?php echo $covoitureur_centre_interet->getIdUtilisateur() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('covoitureur_centre_interet/edit?id='.$covoitureur_centre_interet->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('covoitureur_centre_interet/index') ?>">List</a>
