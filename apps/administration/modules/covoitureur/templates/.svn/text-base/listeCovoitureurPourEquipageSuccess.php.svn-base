<h3>Liste des covoitureurs recherchés</h3>


<div>
  <table class="liste covoit-recherche">
  <thead>
    <tr>
      
      <th>Nom Prénom</th>
      <th>Mail</th>
      <th>Tél.</th>
      <th>Domiciliation</th>
      <th>Entreprise</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureurs as $covoitureur): ?>
    <tr>
      <td><?php echo $covoitureur->getNom()." ".$covoitureur->getPrenom() ?></td>
      <td><?php echo $covoitureur->getMail() ?></td>
      <td><?php echo $covoitureur->getTelephone() ?></td>
      <td><?php echo $covoitureur->getVille() ?></td>
      <td><?php echo $covoitureur->getSociete()  ?></td>
      <td><?php echo link_to('Ajouter', 'covoitureur/covoitureurEquipageAjout?id_covoitureur='.$covoitureur->getIdUtilisateur()."&id_equipage=".$id_equipage) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>