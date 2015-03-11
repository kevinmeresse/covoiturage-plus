<h1>Liste des trajets</h1>

<table class="list trajet">
  <thead>
    <tr>
      <th>Id trajet</th>
      <th>Depart ville</th>
      <th>Destination ville</th>
      <th>Date </th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($trajets as $trajet): ?>
    <tr>
      <td><a href="<?php echo url_for('trajet/edit?id_trajet='.$trajet->getIdTrajet()) ?>"><?php echo $trajet->getIdTrajet() ?></a></td>
      
      <td><?php echo $trajet->getDepartVille() ?></td>
      
      <td><?php echo $trajet->getDestinationVille() ?></td>
     
      <td></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('trajet/new') ?>">Nouveau</a></p>
  <br class="clear"/>
