<h1>Covoitureur vehicules List</h1>

<table class="liste covoit-vehicule-id">
  <thead>
    <tr>
      <th>Id vehicule</th>
      <th>Cle</th>
      <th>Etat</th>
      <th>Date creation</th>
      <th>Id utilisateur</th>
      <th>Id marque</th>
      <th>Id modele</th>
      <th>Id motorisation</th>
      <th>Annee</th>
      <th>Couleur</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureur_vehicules as $covoitureur_vehicule): ?>
    <tr>
      <td><a href="<?php echo url_for('covoitureur_vehicule/edit?id_vehicule='.$covoitureur_vehicule->getIdVehicule()) ?>"><?php echo $covoitureur_vehicule->getIdVehicule() ?></a></td>
      <td><?php echo $covoitureur_vehicule->getCle() ?></td>
      <td><?php echo $covoitureur_vehicule->getEtat() ?></td>
      <td><?php echo $covoitureur_vehicule->getDateCreation() ?></td>
      <td><?php echo $covoitureur_vehicule->getIdUtilisateur() ?></td>
      <td><?php echo $covoitureur_vehicule->getIdMarque() ?></td>
      <td><?php echo $covoitureur_vehicule->getIdModele() ?></td>
      <td><?php echo $covoitureur_vehicule->getIdMotorisation() ?></td>
      <td><?php echo $covoitureur_vehicule->getAnnee() ?></td>
      <td><?php echo $covoitureur_vehicule->getCouleur() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('covoitureur_vehicule/new') ?>">Nouveau</a></p>
  
  <br class="clear"/>
