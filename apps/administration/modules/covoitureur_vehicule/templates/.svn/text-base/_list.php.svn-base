<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="covoit-vehicule liste">
    <thead>
    <tr>
      <th>Covoitureur</th>
      <th>Marque</th>
      <th>Modèle</th>
      <th>Motorisation</th>
      <th>Année</th>
      <th>Couleur</th>

      <th>Action</th>

    </tr>
  </thead>
  <?php foreach ($covoitureurVehicules as $i => $covoitureurVehicule): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">
        <?php //echo $covoitureurVehicule->getCovoitureur()->getNom() ?>
          <?php echo $covoitureurVehicule->getCovoitureur()->getNom() ?>
          &nbsp;
          <?php //echo $covoitureurVehicule->getCovoitureur()->getPrenom() ?>
          <?php echo $covoitureurVehicule->getCovoitureur()->getPrenom() ?>
      </td>
      <td><?php echo $covoitureurVehicule->getVehiculeMarque()->getNomMarque() ?></td>
      <td><?php echo ($covoitureurVehicule->getIdModele() != 0) ? $covoitureurVehicule->getVehiculeModele()->getNomModele() : ''; ?></td>
      <td><?php echo $covoitureurVehicule->getVehiculeMotorisation()->getNomMotorisation() ?></td>
      <td><?php echo $covoitureurVehicule->getAnnee() ?></td>
      <td><?php echo $covoitureurVehicule->getCouleur() ?></td>

      <td class="tab-center edit"><a href="<?php echo url_for('covoitureur_vehicule/edit?id_vehicule=' . $covoitureurVehicule->getIdVehicule()) ?>"><?php echo $covoitureurVehicule->getIdVehicule() ?></a></td>

    </tr>


  <?php endforeach; ?>
</table>