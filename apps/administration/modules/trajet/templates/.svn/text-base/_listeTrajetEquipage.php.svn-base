<h3>Liste des derniers trajets</h3>
<div>
  <table class="liste trajet-covoit">
  <thead>
    <tr>
      
      <th>Ville départ</th>
      <th>Ville destination</th>
      <th>Covoitureur</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trajets as $trajet): ?>
    <tr>
      <td><?php echo $trajet->getDepartVille() ?></td>
      <td><?php echo $trajet->getDestinationVille() ?></td>
      <td><?php echo $trajet->getCovoitureur() ?></td>
      <td><?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?></td>

      <td  class="equipage-nouveau"><?php echo link_to('Nouvel equipage', 'equipage/newEquipageTrajet?id_trajet='.$trajet->getIdTrajet(), array('title' => 'nouvel équipage pour ce trajet')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>
