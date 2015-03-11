<h1>Ma liste de véhicules </h1>

<table class="liste covoit-vehicule">
    <thead>
    <tr>
      <th>Marque</th>
      <th>Modèle</th>
      <th>Année</th>
      <th>Couleur</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>

    <?php foreach ($covoitureur_vehicule_liste as  $covoitureur_vehicule): ?>
    <tr>
        
        <td><?php echo $covoitureur_vehicule->getVehiculeMarque()->getNomMarque() ?></td>
        <td><?php echo $covoitureur_vehicule->getVehiculeModele()->getNomModele() ?></td>
        <td><?php echo $covoitureur_vehicule->getAnnee() ?></td>
        <td><?php echo $covoitureur_vehicule->getCouleur() ?></td>
        
        <td class="edit"><a href="<?php echo url_for('covoitureur/editVehicule?id_vehicule='.$covoitureur_vehicule->getIdVehicule()) ?>">
            Editer
        </a>
        </td>
		<td class="suppr">
        <a href="<?php echo url_for('covoitureur/deleteVehicule?id_vehicule='.$covoitureur_vehicule->getIdVehicule()) ?>">
            Supprimer
        </a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
    <p class="nouveau"><a href="<?php echo url_for('covoitureur/newVehicule') ?>">nouveau</a></p>





  
